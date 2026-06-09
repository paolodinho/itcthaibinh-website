<?php
/**
 * ITC Thái Bình - functions.php
 */

if (!defined('ABSPATH')) exit;

define('ITC_VER', '10.10.0');

/* ----------------------------------------------------------
 * Theme setup
 * -------------------------------------------------------- */
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('automatic-feed-links');
    add_theme_support('responsive-embeds');

    register_nav_menus([
        'primary'       => 'Menu chính (header)',
        'footer_duhoc'  => 'Footer – Cột Du học',
        'footer_daotao' => 'Footer – Cột Đào tạo',
    ]);
});

/* ----------------------------------------------------------
 * Assets
 * -------------------------------------------------------- */
add_action('wp_enqueue_scripts', function () {
    // Google Fonts: Lora + Be Vietnam Pro (subset Vietnamese)
    wp_enqueue_style(
        'itc-fonts',
        'https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700;800&family=Lora:ital,wght@1,500;1,600&display=swap',
        [],
        null
    );
    wp_enqueue_style('itc-main', get_template_directory_uri() . '/assets/css/main.css', [], ITC_VER);
    wp_enqueue_script('itc-main', get_template_directory_uri() . '/assets/js/main.js', [], ITC_VER, true);
    wp_enqueue_script('itc-interactive', get_template_directory_uri() . '/assets/js/interactive.js', [], ITC_VER, true);
}, 5);

// Preconnect cho Google Fonts
add_action('wp_head', function () {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}, 1);

/* ----------------------------------------------------------
 * Helper: đọc giá trị từ Customizer (theme_mod) có fallback
 * -------------------------------------------------------- */
function itc_mod($key, $default = '') {
    $v = get_theme_mod($key, $default);
    return ($v === '' || $v === null) ? $default : $v;
}
// Đánh dấu chữ đỏ trong nội dung bằng [r]...[/r], [br] = xuống dòng
function itc_hl($text) {
    $text = esc_html($text);
    $text = str_replace(['[br]', '[BR]'], '<br>', $text);
    $text = preg_replace('/\[r\](.*?)\[\/r\]/u', '<span class="r">$1</span>', $text);
    return $text;
}

function itc_contact($key) {
    $defaults = [
        'hotline'      => '0985 653 868',
        'hotline_raw'  => '0985653868',
        'email'        => 'info@itcthaibinh.vn',
        'address'      => 'LK09-34, Đại lộ Kỳ Đồng, Phường Trần Hưng Đạo, Tỉnh Hưng Yên',
        'zalo'         => 'https://zalo.me/0985653868',
        'facebook'     => 'https://www.facebook.com/duhocitcthaibinh',
        'fb_duhoc'     => 'https://www.facebook.com/duhocitcthaibinh',
        'fb_hoangu'    => 'https://www.facebook.com/TrungTamITCThaiBinh',
        'working_hours'=> '8:00 – 17:30 (T2 – T7)',
        'map_embed'    => '',
    ];
    return itc_mod('itc_' . $key, $defaults[$key] ?? '');
}

/* ----------------------------------------------------------
 * CUSTOM POST TYPES: Cảm nghĩ học viên + Câu hỏi (FAQ)
 * -------------------------------------------------------- */
add_action('init', function () {
    register_post_type('itc_review', [
        'labels' => ['name' => 'Cảm nghĩ học viên', 'singular_name' => 'Cảm nghĩ',
            'add_new_item' => 'Thêm cảm nghĩ', 'edit_item' => 'Sửa cảm nghĩ', 'menu_name' => 'Cảm nghĩ HV'],
        'public' => false, 'show_ui' => true, 'show_in_rest' => true, 'menu_icon' => 'dashicons-format-quote',
        'menu_position' => 5, 'supports' => ['title', 'editor', 'thumbnail'],
    ]);
    register_post_type('itc_faq', [
        'labels' => ['name' => 'Câu hỏi (FAQ)', 'singular_name' => 'Câu hỏi',
            'add_new_item' => 'Thêm câu hỏi', 'edit_item' => 'Sửa câu hỏi', 'menu_name' => 'FAQ'],
        'public' => false, 'show_ui' => true, 'show_in_rest' => true, 'menu_icon' => 'dashicons-editor-help',
        'menu_position' => 6, 'supports' => ['title', 'editor'],
    ]);
    register_taxonomy('faq_topic', 'itc_faq', [
        'labels' => ['name' => 'Chủ đề FAQ', 'singular_name' => 'Chủ đề', 'menu_name' => 'Chủ đề FAQ'],
        'public' => false, 'show_ui' => true, 'show_in_rest' => true, 'hierarchical' => true,
    ]);
});

// Meta box: vai trò học viên cho Cảm nghĩ
add_action('add_meta_boxes', function () {
    add_meta_box('itc_review_role', 'Vai trò / khóa học', function ($post) {
        $v = get_post_meta($post->ID, '_itc_role', true);
        wp_nonce_field('itc_review', 'itc_review_nonce');
        echo '<input type="text" name="itc_role" value="' . esc_attr($v) . '" style="width:100%" placeholder="VD: Du học Đài Loan - Hệ Ngôn ngữ">';
        echo '<p class="description">Ảnh đại diện học viên: đặt ở "Ảnh đại diện" bên phải.</p>';
    }, 'itc_review', 'normal');
    // Meta box SEO cho page + post + faq
    add_meta_box('itc_seo', 'SEO (Tiêu đề & Mô tả)', function ($post) {
        wp_nonce_field('itc_seo', 'itc_seo_nonce');
        $t = get_post_meta($post->ID, '_itc_seo_title', true);
        $d = get_post_meta($post->ID, '_itc_seo_desc', true);
        echo '<p><label><b>Tiêu đề SEO</b> (≤60 ký tự, để trống = dùng tiêu đề trang)<br>';
        echo '<input type="text" name="itc_seo_title" value="' . esc_attr($t) . '" style="width:100%"></label></p>';
        echo '<p><label><b>Mô tả SEO</b> (140–155 ký tự)<br>';
        echo '<textarea name="itc_seo_desc" rows="3" style="width:100%">' . esc_textarea($d) . '</textarea></label></p>';
    }, ['page', 'post'], 'normal', 'high');
});
add_action('save_post', function ($id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (isset($_POST['itc_review_nonce']) && wp_verify_nonce($_POST['itc_review_nonce'], 'itc_review'))
        update_post_meta($id, '_itc_role', sanitize_text_field($_POST['itc_role'] ?? ''));
    if (isset($_POST['itc_seo_nonce']) && wp_verify_nonce($_POST['itc_seo_nonce'], 'itc_seo')) {
        update_post_meta($id, '_itc_seo_title', sanitize_text_field($_POST['itc_seo_title'] ?? ''));
        update_post_meta($id, '_itc_seo_desc', sanitize_text_field($_POST['itc_seo_desc'] ?? ''));
    }
});

// CPT "Tuyển dụng" - có trang chi tiết riêng (/viec-lam/<slug>/)
add_action('init', function () {
    register_post_type('itc_job', [
        'labels' => ['name' => 'Tuyển dụng', 'singular_name' => 'Tin tuyển dụng', 'add_new_item' => 'Thêm tin tuyển dụng',
            'edit_item' => 'Sửa tin tuyển dụng', 'menu_name' => 'Tuyển dụng', 'all_items' => 'Tất cả tin'],
        'public' => true, 'has_archive' => false, 'show_in_rest' => true, 'menu_icon' => 'dashicons-businessperson',
        'menu_position' => 8, 'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'],
        'rewrite' => ['slug' => 'viec-lam'],
    ]);
}, 11);
add_action('add_meta_boxes', function () {
    add_meta_box('itc_job_meta', 'Thông tin tuyển dụng', function ($post) {
        wp_nonce_field('itc_job', 'itc_job_nonce');
        $f = fn($k) => esc_attr(get_post_meta($post->ID, $k, true));
        echo '<p><label><b>Địa điểm</b><br><input type="text" name="job_loc" value="' . $f('_job_loc') . '" style="width:100%" placeholder="Hưng Yên"></label></p>';
        echo '<p><label><b>Hình thức</b><br><input type="text" name="job_type" value="' . $f('_job_type') . '" style="width:100%" placeholder="Toàn thời gian"></label></p>';
        echo '<p><label><b>Mức lương</b><br><input type="text" name="job_salary" value="' . $f('_job_salary') . '" style="width:100%" placeholder="Thỏa thuận"></label></p>';
        echo '<p><label><b>Số lượng</b><br><input type="text" name="job_qty" value="' . $f('_job_qty') . '" style="width:100%" placeholder="2"></label></p>';
        echo '<p><label><b>Hạn nộp</b><br><input type="text" name="job_deadline" value="' . $f('_job_deadline') . '" style="width:100%" placeholder="31/12/2026"></label></p>';
    }, 'itc_job', 'side');
});
add_action('save_post_itc_job', function ($id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (isset($_POST['itc_job_nonce']) && wp_verify_nonce($_POST['itc_job_nonce'], 'itc_job')) {
        foreach (['job_loc'=>'_job_loc','job_type'=>'_job_type','job_salary'=>'_job_salary','job_qty'=>'_job_qty','job_deadline'=>'_job_deadline'] as $k=>$m)
            update_post_meta($id, $m, sanitize_text_field($_POST[$k] ?? ''));
    }
});

// CPT "Thẻ nội dung" - các khối card trên trang (USP, dịch vụ, vì sao, lộ trình…)
add_action('init', function () {
    register_post_type('itc_card', [
        'labels' => ['name' => 'Thẻ nội dung', 'singular_name' => 'Thẻ', 'add_new_item' => 'Thêm thẻ',
            'edit_item' => 'Sửa thẻ', 'menu_name' => 'Thẻ nội dung'],
        'public' => false, 'show_ui' => true, 'show_in_rest' => true, 'menu_icon' => 'dashicons-screenoptions',
        'menu_position' => 7, 'supports' => ['title', 'editor', 'thumbnail', 'page-attributes'],
    ]);
    register_taxonomy('card_group', 'itc_card', [
        'labels' => ['name' => 'Nhóm thẻ', 'singular_name' => 'Nhóm', 'menu_name' => 'Nhóm thẻ'],
        'public' => false, 'show_ui' => true, 'show_in_rest' => true, 'hierarchical' => true,
    ]);
}, 11);

add_action('add_meta_boxes', function () {
    add_meta_box('itc_card_meta', 'Tùy chọn thẻ', function ($post) {
        wp_nonce_field('itc_card', 'itc_card_nonce');
        $icon = get_post_meta($post->ID, '_itc_icon', true);
        $link = get_post_meta($post->ID, '_itc_link', true);
        $icons = ['cap','shield','plane','network','phone','thumb','check','star','compass','medal','doc','tower','fuji','torii','arrow'];
        echo '<p><label><b>Icon</b> (chọn biểu tượng):<br><select name="itc_icon" style="width:100%"><option value="">- không -</option>';
        foreach ($icons as $ic) echo '<option value="' . $ic . '"' . selected($icon, $ic, false) . '>' . $ic . '</option>';
        echo '</select></label></p>';
        echo '<p><label><b>Liên kết</b> (tùy chọn, vd /du-hoc-dai-loan/):<br><input type="text" name="itc_link" value="' . esc_attr($link) . '" style="width:100%"></label></p>';
        echo '<p class="description">Ảnh thẻ (cho card dịch vụ): đặt ở "Ảnh đại diện". Mô tả: ô nội dung. Thứ tự: "Thứ tự" (Page Attributes).</p>';
    }, 'itc_card', 'side');
});
add_action('save_post_itc_card', function ($id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (isset($_POST['itc_card_nonce']) && wp_verify_nonce($_POST['itc_card_nonce'], 'itc_card')) {
        update_post_meta($id, '_itc_icon', sanitize_text_field($_POST['itc_icon'] ?? ''));
        update_post_meta($id, '_itc_link', sanitize_text_field($_POST['itc_link'] ?? ''));
    }
});

// Lấy danh sách thẻ theo nhóm → mảng [icon,title,desc,img,link]; rỗng = trả [] để template dùng fallback
function itc_cards($group) {
    $q = new WP_Query(['post_type' => 'itc_card', 'posts_per_page' => 20, 'orderby' => 'menu_order date', 'order' => 'ASC',
        'tax_query' => [['taxonomy' => 'card_group', 'field' => 'slug', 'terms' => $group]]]);
    if (!$q->have_posts()) return [];
    $out = [];
    while ($q->have_posts()) { $q->the_post();
        $out[] = [
            'icon'  => get_post_meta(get_the_ID(), '_itc_icon', true),
            'title' => get_the_title(),
            'desc'  => wp_strip_all_tags(get_the_content()),
            'img'   => has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'medium_large') : '',
            'link'  => get_post_meta(get_the_ID(), '_itc_link', true),
        ];
    }
    wp_reset_postdata();
    return $out;
}

// Lấy FAQ theo chủ đề (CPT) - fallback về mảng cứng nếu chưa có dữ liệu
function itc_faq_items($topic, $fallback = []) {
    $q = new WP_Query(['post_type' => 'itc_faq', 'posts_per_page' => 20, 'orderby' => 'menu_order date', 'order' => 'ASC',
        'tax_query' => [['taxonomy' => 'faq_topic', 'field' => 'slug', 'terms' => $topic]]]);
    if (!$q->have_posts()) return $fallback;
    $out = [];
    while ($q->have_posts()) { $q->the_post(); $out[] = [get_the_title(), wp_strip_all_tags(get_the_content())]; }
    wp_reset_postdata();
    return $out;
}

/* ----------------------------------------------------------
 * CPT "Cơ sở" - danh sách chi nhánh (địa chỉ + map + SĐT)
 * -------------------------------------------------------- */
add_action('init', function () {
    register_post_type('itc_branch', [
        'labels' => ['name' => 'Cơ sở', 'singular_name' => 'Cơ sở', 'add_new_item' => 'Thêm cơ sở',
            'edit_item' => 'Sửa cơ sở', 'menu_name' => 'Cơ sở (chi nhánh)', 'all_items' => 'Tất cả cơ sở'],
        'public' => false, 'show_ui' => true, 'show_in_rest' => true, 'menu_icon' => 'dashicons-location-alt',
        'menu_position' => 9, 'supports' => ['title', 'page-attributes'],
    ]);
}, 11);
add_action('add_meta_boxes', function () {
    add_meta_box('itc_branch_meta', 'Thông tin cơ sở', function ($post) {
        wp_nonce_field('itc_branch', 'itc_branch_nonce');
        $f = fn($k) => esc_attr(get_post_meta($post->ID, $k, true));
        echo '<p><label><b>Địa chỉ</b><br><textarea name="branch_addr" rows="2" style="width:100%">' . esc_textarea(get_post_meta($post->ID, '_branch_addr', true)) . '</textarea></label></p>';
        echo '<p><label><b>SĐT (tùy chọn)</b><br><input type="text" name="branch_phone" value="' . $f('_branch_phone') . '" style="width:100%" placeholder="0985 653 868"></label></p>';
        echo '<p><label><b>Mã nhúng Google Map (iframe)</b> - để định vị chính xác cơ sở<br><textarea name="branch_map" rows="3" style="width:100%" placeholder="&lt;iframe src=...&gt;&lt;/iframe&gt; - lấy ở Google Maps &gt; Chia sẻ &gt; Nhúng bản đồ">' . esc_textarea(get_post_meta($post->ID, '_branch_map', true)) . '</textarea></label></p>';
        echo '<p><label><b>Hướng dẫn đường đi chi tiết</b> - mốc gần, rẽ ở đâu, dấu hiệu nhận biết<br><textarea name="branch_directions" rows="4" style="width:100%" placeholder="VD: Từ trung tâm TP đi theo đường... đến ngã tư... rẽ phải, cơ sở nằm cạnh...">' . esc_textarea(get_post_meta($post->ID, '_branch_directions', true)) . '</textarea></label></p>';
        echo '<p class="description">Tên cơ sở đặt ở ô Tiêu đề (vd: Cơ sở 1). Thứ tự hiển thị: ô "Thứ tự" (Page Attributes).</p>';
    }, 'itc_branch', 'normal');
});
add_action('save_post_itc_branch', function ($id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (isset($_POST['itc_branch_nonce']) && wp_verify_nonce($_POST['itc_branch_nonce'], 'itc_branch')) {
        update_post_meta($id, '_branch_addr', sanitize_textarea_field($_POST['branch_addr'] ?? ''));
        update_post_meta($id, '_branch_phone', sanitize_text_field($_POST['branch_phone'] ?? ''));
        update_post_meta($id, '_branch_map', wp_kses($_POST['branch_map'] ?? '', ['iframe'=>['src'=>[],'width'=>[],'height'=>[],'style'=>[],'loading'=>[],'allowfullscreen'=>[],'referrerpolicy'=>[],'title'=>[]]]));
        update_post_meta($id, '_branch_directions', sanitize_textarea_field($_POST['branch_directions'] ?? ''));
    }
});
// Danh sách cơ sở - CPT hoặc fallback 3 cơ sở mặc định
function itc_branches() {
    $q = new WP_Query(['post_type' => 'itc_branch', 'posts_per_page' => 20, 'orderby' => 'menu_order title', 'order' => 'ASC']);
    if ($q->have_posts()) {
        $out = [];
        while ($q->have_posts()) { $q->the_post();
            $out[] = ['name' => get_the_title(), 'addr' => get_post_meta(get_the_ID(), '_branch_addr', true), 'phone' => get_post_meta(get_the_ID(), '_branch_phone', true),
                'map' => get_post_meta(get_the_ID(), '_branch_map', true), 'directions' => get_post_meta(get_the_ID(), '_branch_directions', true)];
        }
        wp_reset_postdata();
        return $out;
    }
    return [
        ['name' => 'Cơ sở 1', 'addr' => 'LK09-34, Đại lộ Kỳ Đồng, Phường Trần Hưng Đạo, Tỉnh Hưng Yên', 'phone' => '', 'map' => '', 'directions' => ''],
        ['name' => 'Cơ sở 2', 'addr' => 'Số 25 Trần Phú, Phường Trần Hưng Đạo, Tỉnh Hưng Yên', 'phone' => '', 'map' => '', 'directions' => ''],
        ['name' => 'Cơ sở 3', 'addr' => 'Hưng Long Nam, Xã Tiền Hải, Tỉnh Hưng Yên', 'phone' => '', 'map' => '', 'directions' => ''],
    ];
}

/* ----------------------------------------------------------
 * CPT "Thư viện ảnh" - gallery phân mục (photo_cat)
 * -------------------------------------------------------- */
add_action('init', function () {
    register_post_type('itc_photo', [
        'labels' => ['name' => 'Thư viện ảnh', 'singular_name' => 'Ảnh', 'add_new_item' => 'Thêm ảnh',
            'edit_item' => 'Sửa ảnh', 'menu_name' => 'Thư viện ảnh', 'all_items' => 'Tất cả ảnh'],
        'public' => false, 'show_ui' => true, 'show_in_rest' => true, 'menu_icon' => 'dashicons-format-gallery',
        'menu_position' => 10, 'supports' => ['title', 'thumbnail', 'page-attributes'],
    ]);
    register_taxonomy('photo_cat', 'itc_photo', [
        'labels' => ['name' => 'Danh mục ảnh', 'singular_name' => 'Danh mục', 'menu_name' => 'Danh mục ảnh'],
        'public' => false, 'show_ui' => true, 'show_in_rest' => true, 'hierarchical' => true,
    ]);
}, 11);
// Gallery gom theo danh mục - CPT hoặc fallback ảnh có sẵn của theme
function itc_photo_groups() {
    $terms = get_terms(['taxonomy' => 'photo_cat', 'hide_empty' => true]);
    if (!is_wp_error($terms) && $terms) {
        $out = [];
        foreach ($terms as $t) {
            $q = new WP_Query(['post_type' => 'itc_photo', 'posts_per_page' => 60, 'orderby' => 'menu_order date', 'order' => 'ASC',
                'tax_query' => [['taxonomy' => 'photo_cat', 'field' => 'term_id', 'terms' => $t->term_id]]]);
            $items = [];
            while ($q->have_posts()) { $q->the_post();
                if (has_post_thumbnail()) $items[] = ['img' => get_the_post_thumbnail_url(null, 'large'), 'cap' => get_the_title()];
            }
            wp_reset_postdata();
            if ($items) $out[] = ['slug' => $t->slug, 'name' => $t->name, 'items' => $items];
        }
        if ($out) return $out;
    }
    // Fallback: ảnh thật có sẵn trong theme, gom theo nhóm
    $img = get_template_directory_uri() . '/assets/images';
    $g = fn($file, $cap) => ['img' => "$img/$file", 'cap' => $cap];
    return [
        ['slug' => 'co-so', 'name' => 'Cơ sở & Lớp học', 'items' => [
            $g('about.jpg','Văn phòng tư vấn ITC'), $g('why-photo.jpg','Không gian lớp học'),
            $g('gal-1.jpg','Lớp học tại ITC'), $g('gal-2.jpg','Phòng học hiện đại'),
            $g('gal-6.jpg','Góc học tập'), $g('gal-9.jpg','Cơ sở vật chất ITC'),
        ]],
        ['slug' => 'doi-ngu', 'name' => 'Đội ngũ giáo viên', 'items' => [
            $g('about-team.jpg','Đội ngũ ITC'), $g('lang-chinese.jpg','Giáo viên tiếng Trung'),
            $g('lang-japanese.jpg','Giáo viên tiếng Nhật'), $g('gal-8.jpg','Tư vấn viên ITC'),
        ]],
        ['slug' => 'hoat-dong', 'name' => 'Hoạt động & Sự kiện', 'items' => [
            $g('act-1.jpg','Ngày hội nhập học'), $g('act-2.jpg','Hoạt động ngoại khóa'),
            $g('act-3.jpg','Sự kiện ITC'), $g('act-4.jpg','Giao lưu học viên'),
            $g('act-5.jpg','Workshop định hướng'), $g('act-6.jpg','Lễ khai giảng'),
        ]],
        ['slug' => 'du-hoc-sinh', 'name' => 'Du học sinh & Lễ bay', 'items' => [
            $g('student-1.jpg','Du học sinh ITC'), $g('student-2.jpg','Tiễn bay du học'),
            $g('student-3.jpg','Học viên đỗ visa'), $g('study-taiwan.jpg','Du học Đài Loan'),
            $g('study-japan.jpg','Du học Nhật Bản'), $g('gal-3.jpg','Học viên ITC'),
            $g('gal-7.jpg','Kỷ niệm du học'), $g('gal-11.jpg','Học viên & ITC'),
        ]],
    ];
}

/* ----------------------------------------------------------
 * CPT "Trường đối tác" - logo các trường ĐH đối tác (no-code up logo)
 * -------------------------------------------------------- */
add_action('init', function () {
    register_post_type('itc_partner', [
        'labels' => ['name' => 'Trường đối tác', 'singular_name' => 'Trường', 'add_new_item' => 'Thêm trường',
            'edit_item' => 'Sửa trường', 'menu_name' => 'Trường đối tác', 'all_items' => 'Tất cả trường'],
        'public' => false, 'show_ui' => true, 'show_in_rest' => true, 'menu_icon' => 'dashicons-bank',
        'menu_position' => 11, 'supports' => ['title', 'thumbnail', 'page-attributes'],
    ]);
}, 11);
add_action('add_meta_boxes', function () {
    add_meta_box('itc_partner_meta', 'Thông tin trường', function ($post) {
        wp_nonce_field('itc_partner', 'itc_partner_nonce');
        $link = get_post_meta($post->ID, '_partner_link', true);
        echo '<p><label><b>Website trường (tùy chọn)</b><br><input type="url" name="partner_link" value="' . esc_attr($link) . '" style="width:100%" placeholder="https://..."></label></p>';
        echo '<p class="description">Logo trường đặt ở "Ảnh đại diện". Tên trường ở ô Tiêu đề. Thứ tự: ô "Thứ tự".</p>';
    }, 'itc_partner', 'side');
});
add_action('save_post_itc_partner', function ($id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (isset($_POST['itc_partner_nonce']) && wp_verify_nonce($_POST['itc_partner_nonce'], 'itc_partner'))
        update_post_meta($id, '_partner_link', esc_url_raw($_POST['partner_link'] ?? ''));
});
// Trả mảng logo đối tác (rỗng nếu chưa up)
function itc_partners() {
    $q = new WP_Query(['post_type' => 'itc_partner', 'posts_per_page' => 40, 'orderby' => 'menu_order title', 'order' => 'ASC']);
    $out = [];
    while ($q->have_posts()) { $q->the_post();
        if (has_post_thumbnail()) $out[] = ['name' => get_the_title(), 'logo' => get_the_post_thumbnail_url(null, 'medium'), 'link' => get_post_meta(get_the_ID(), '_partner_link', true)];
    }
    wp_reset_postdata();
    return $out;
}

/* ----------------------------------------------------------
 * CPT "Đội ngũ" - thành viên/ban lãnh đạo (no-code: ảnh + tên + chức vụ)
 * -------------------------------------------------------- */
add_action('init', function () {
    register_post_type('itc_member', [
        'labels' => ['name' => 'Đội ngũ', 'singular_name' => 'Thành viên', 'add_new_item' => 'Thêm thành viên',
            'edit_item' => 'Sửa thành viên', 'menu_name' => 'Đội ngũ', 'all_items' => 'Tất cả thành viên'],
        'public' => false, 'show_ui' => true, 'show_in_rest' => true, 'menu_icon' => 'dashicons-groups',
        'menu_position' => 12, 'supports' => ['title', 'thumbnail', 'page-attributes'],
    ]);
}, 11);
add_action('add_meta_boxes', function () {
    add_meta_box('itc_member_meta', 'Thông tin thành viên', function ($post) {
        wp_nonce_field('itc_member', 'itc_member_nonce');
        $role = get_post_meta($post->ID, '_member_role', true);
        echo '<p><label><b>Chức vụ / Vai trò</b><br><input type="text" name="member_role" value="' . esc_attr($role) . '" style="width:100%" placeholder="VD: Giám đốc / Tư vấn viên / Giáo viên tiếng Trung"></label></p>';
        echo '<p class="description">Ảnh đại diện thành viên đặt ở "Ảnh đại diện". Tên ở ô Tiêu đề. Thứ tự: "Thứ tự".</p>';
    }, 'itc_member', 'side');
});
add_action('save_post_itc_member', function ($id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (isset($_POST['itc_member_nonce']) && wp_verify_nonce($_POST['itc_member_nonce'], 'itc_member'))
        update_post_meta($id, '_member_role', sanitize_text_field($_POST['member_role'] ?? ''));
});
function itc_members() {
    $q = new WP_Query(['post_type' => 'itc_member', 'posts_per_page' => 20, 'orderby' => 'menu_order title', 'order' => 'ASC']);
    $out = [];
    while ($q->have_posts()) { $q->the_post();
        if (has_post_thumbnail()) $out[] = ['name' => get_the_title(), 'photo' => get_the_post_thumbnail_url(null, 'medium_large'), 'role' => get_post_meta(get_the_ID(), '_member_role', true)];
    }
    wp_reset_postdata();
    return $out;
}

/* ----------------------------------------------------------
 * CUSTOMIZER - Nội dung sửa được không cần code (Giao diện > Tùy biến)
 * -------------------------------------------------------- */
add_action('customize_register', function ($wp) {
    $panel = 'itc_content';
    $wp->add_panel($panel, ['title' => 'ITC – Nội dung website', 'priority' => 1]);

    $add = function ($wp, $sec, $id, $label, $type = 'text', $default = '') {
        $wp->add_setting($id, ['default' => $default, 'sanitize_callback' => $type === 'textarea' ? 'wp_kses_post' : ($type === 'url' ? 'esc_url_raw' : 'sanitize_text_field')]);
        $wp->add_control($id, ['label' => $label, 'section' => $sec, 'type' => $type === 'textarea' ? 'textarea' : ($type === 'url' ? 'url' : 'text')]);
    };

    // 1. LIÊN HỆ
    $wp->add_section('itc_sec_contact', ['title' => 'Thông tin liên hệ', 'panel' => $panel]);
    $add($wp, 'itc_sec_contact', 'itc_hotline', 'Hotline (hiển thị)', 'text', '0985 653 868');
    $add($wp, 'itc_sec_contact', 'itc_hotline_raw', 'Hotline (số gọi, không dấu cách)', 'text', '0985653868');
    $add($wp, 'itc_sec_contact', 'itc_email', 'Email', 'text', 'info@itcthaibinh.vn');
    $add($wp, 'itc_sec_contact', 'itc_address', 'Địa chỉ (cơ sở chính)', 'textarea', 'LK09-34, Đại lộ Kỳ Đồng, Phường Trần Hưng Đạo, Tỉnh Hưng Yên');
    $add($wp, 'itc_sec_contact', 'itc_working_hours', 'Giờ làm việc', 'text', '8:00 – 17:30 (T2 – T7)');
    $add($wp, 'itc_sec_contact', 'itc_zalo', 'Link Zalo', 'url', 'https://zalo.me/0985653868');
    $add($wp, 'itc_sec_contact', 'itc_facebook', 'Link Facebook (chính)', 'url', 'https://www.facebook.com/duhocitcthaibinh');
    $add($wp, 'itc_sec_contact', 'itc_fb_duhoc', 'Fanpage Du học ITC', 'url', 'https://www.facebook.com/duhocitcthaibinh');
    $add($wp, 'itc_sec_contact', 'itc_fb_hoangu', 'Fanpage Hoa ngữ ITC (tiếng Trung)', 'url', 'https://www.facebook.com/TrungTamITCThaiBinh');
    $add($wp, 'itc_sec_contact', 'itc_map_embed', 'Mã nhúng Google Map (iframe)', 'textarea', '');

    // 2. HERO TRANG CHỦ
    $wp->add_section('itc_sec_hero', ['title' => 'Hero trang chủ', 'panel' => $panel, 'description' => 'Dùng [r]...[/r] để tô chữ đỏ, [br] để xuống dòng.']);
    $add($wp, 'itc_sec_hero', 'itc_hero_kicker', 'Dòng nhỏ phía trên', 'text', 'Tư vấn du học Đài Loan · Nhật Bản & đào tạo ngoại ngữ');
    $add($wp, 'itc_sec_hero', 'itc_hero_title', 'Tiêu đề lớn', 'textarea', 'Chạm tới [r]giảng đường quốc tế[/r][br]- tương lai gần hơn bạn nghĩ');
    $add($wp, 'itc_sec_hero', 'itc_hero_sub', 'Mô tả', 'textarea', 'ITC đồng hành trọn vẹn từ học tiếng, định hướng ngành nghề đến hoàn tất hồ sơ visa - minh bạch chi phí, tận tâm tới ngày bạn nhập học.');
    $add($wp, 'itc_sec_hero', 'itc_hero_cta', 'Nút CTA', 'text', 'Đăng ký tư vấn ngay');

    // 3. SỐ LIỆU NỔI BẬT
    $wp->add_section('itc_sec_stats', ['title' => 'Số liệu nổi bật', 'panel' => $panel]);
    $stats = [['10','+','Năm kinh nghiệm'],['2000','+','Học viên du học'],['98','%','Tỉ lệ đậu visa'],['50','+','Trường đối tác']];
    foreach ($stats as $i => $s) { $n = $i + 1;
        $add($wp, 'itc_sec_stats', "itc_stat{$n}_num", "Số liệu $n – con số", 'text', $s[0]);
        $add($wp, 'itc_sec_stats', "itc_stat{$n}_suf", "Số liệu $n – ký hiệu (+, %)", 'text', $s[1]);
        $add($wp, 'itc_sec_stats', "itc_stat{$n}_label", "Số liệu $n – nhãn", 'text', $s[2]);
    }

    // 4. CTA & ĐĂNG KÝ
    $wp->add_section('itc_sec_cta', ['title' => 'CTA & Form đăng ký', 'panel' => $panel]);
    $add($wp, 'itc_sec_cta', 'itc_ctaband_title', 'CTA giữa trang – tiêu đề', 'text', 'Sẵn sàng bắt đầu hành trình du học của bạn?');
    $add($wp, 'itc_sec_cta', 'itc_ctaband_sub', 'CTA giữa trang – mô tả', 'text', 'Để lại thông tin, đội ngũ ITC sẽ gọi lại tư vấn miễn phí trong vòng 24 giờ.');
    $add($wp, 'itc_sec_cta', 'itc_reg_title', 'Form đăng ký – tiêu đề', 'textarea', 'Để lại thông tin,[br]ITC gọi lại tư vấn miễn phí');
    $add($wp, 'itc_sec_cta', 'itc_reg_sub', 'Form đăng ký – mô tả', 'textarea', 'Đội ngũ tư vấn của ITC sẽ liên hệ trong vòng 24 giờ, giải đáp mọi thắc mắc về du học và lộ trình học ngoại ngữ phù hợp với bạn.');

    // 5. FOOTER
    $wp->add_section('itc_sec_footer', ['title' => 'Chân trang (Footer)', 'panel' => $panel]);
    $add($wp, 'itc_sec_footer', 'itc_footer_about', 'Giới thiệu ngắn ở footer', 'textarea', 'Tư vấn du học Đài Loan – Nhật Bản & đào tạo tiếng Trung, tiếng Nhật uy tín tại Thái Bình. Đồng hành cùng học viên từ định hướng đến khi đặt chân tới giảng đường quốc tế.');
});

/* ----------------------------------------------------------
 * ACF Options Page (thông tin liên hệ chỉnh từ admin)
 * -------------------------------------------------------- */
add_action('acf/init', function () {
    if (!function_exists('acf_add_options_page')) return;

    acf_add_options_page([
        'page_title' => 'Cấu hình ITC',
        'menu_title' => 'Cấu hình ITC',
        'menu_slug'  => 'itc-settings',
        'capability' => 'manage_options',
        'icon_url'   => 'dashicons-admin-settings',
        'position'   => 2,
    ]);

    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group([
            'key' => 'group_itc_contact',
            'title' => 'Thông tin liên hệ',
            'fields' => [
                ['key'=>'f_hotline','label'=>'Hotline (hiển thị)','name'=>'hotline','type'=>'text','placeholder'=>'0985 653 868'],
                ['key'=>'f_hotline_raw','label'=>'Hotline (số gọi tel:)','name'=>'hotline_raw','type'=>'text','placeholder'=>'0985653868'],
                ['key'=>'f_email','label'=>'Email','name'=>'email','type'=>'email'],
                ['key'=>'f_address','label'=>'Địa chỉ','name'=>'address','type'=>'textarea','rows'=>2],
                ['key'=>'f_working','label'=>'Giờ làm việc','name'=>'working_hours','type'=>'text'],
                ['key'=>'f_zalo','label'=>'Link Zalo','name'=>'zalo','type'=>'url'],
                ['key'=>'f_fb','label'=>'Link Facebook','name'=>'facebook','type'=>'url'],
                ['key'=>'f_map','label'=>'Mã nhúng Google Map (iframe)','name'=>'map_embed','type'=>'textarea','rows'=>3],
            ],
            'location' => [[['param'=>'options_page','operator'=>'==','value'=>'itc-settings']]],
        ]);
    }
});

/* ----------------------------------------------------------
 * SVG icon set (line style, sang trọng - không emoji)
 * -------------------------------------------------------- */
function itc_icon($name, $size = 24) {
    $p = [
        'cap'      => '<path d="M2.5 8.5 12 4l9.5 4.5L12 13 2.5 8.5Z"/><path d="M21.5 8.5v5"/><path d="M6.5 10.5V15c0 1.4 2.5 2.8 5.5 2.8s5.5-1.4 5.5-2.8v-4.5"/>',
        'shield'   => '<path d="M12 3 5 5.8v5.4c0 4.3 2.9 7.4 7 8.8 4.1-1.4 7-4.5 7-8.8V5.8L12 3Z"/><path d="m9 11.5 2.2 2.2L15 10"/>',
        'plane'    => '<path d="M14.5 3.5c.8-.8 2-.8 2.2 0 .2.6-.1 1.3-.7 1.9l-3 3 1.2 6.4c.1.4-.1.7-.4.9l-.6.4-2.3-4.7-3 3 .1 2c0 .3-.2.5-.5.6l-.4.1-1.2-2.6L3 13.6l.1-.4c.1-.3.3-.5.6-.5l2 .1 3-3L4 7.5l.4-.6c.2-.3.5-.5.9-.4L11.7 7.7l3-3Z"/>',
        'network'  => '<circle cx="12" cy="5" r="2.4"/><circle cx="5" cy="18.5" r="2.4"/><circle cx="19" cy="18.5" r="2.4"/><path d="M11 7.1 6.4 16.3M13 7.1l4.6 9.2M7.4 18.5h9.2"/>',
        'phone'    => '<path d="M6.3 4h3l1.6 4-2 1.4a11 11 0 0 0 5.2 5.2l1.4-2 4 1.6v3a2 2 0 0 1-2.2 2A16.5 16.5 0 0 1 4.3 6.2 2 2 0 0 1 6.3 4Z"/>',
        'thumb'    => '<path d="M7 21V10M7 10l3.4-6.4a1.8 1.8 0 0 1 2.4 1.7L12 9h5.6a2 2 0 0 1 2 2.4l-1.1 6A2 2 0 0 1 16.5 19H7"/><path d="M3.5 10H7v11H3.5z"/>',
        'check'    => '<path d="m4.5 12.5 5 5 10-11"/>',
        'star'     => '<path d="M12 3.5 14.6 9l6 .8-4.4 4.2 1.1 6L12 17.2 6.7 20l1.1-6L3.4 9.8l6-.8L12 3.5Z"/>',
        'compass'  => '<circle cx="12" cy="12" r="9"/><path d="m15.5 8.5-2 5.5-5 2 2-5.5 5-2Z"/>',
        'medal'    => '<circle cx="12" cy="14.5" r="5"/><path d="m9 9.5-2.5-6M15 9.5l2.5-6M10.5 14.5 12 13l1.5 1.5-.5 2h-2l-.5-2Z"/>',
        'doc'      => '<path d="M7 3h7l4 4v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Z"/><path d="M14 3v4h4M9 12h6M9 16h6"/>',
        'tower'    => '<path d="M12 2v20"/><path d="M10.5 6h3M9.5 9.5h5M8.5 13h7M7.5 16.5h9"/><path d="M9 22h6"/>',
        'fuji'     => '<path d="M3 19 9 7l3 4.5L15 7l6 12H3Z"/><path d="m7.2 11.5 1.8 1.2 1.5-1 1.5 1 1.5-1 1.8 1.1"/>',
        'torii'    => '<path d="M4 7h16M5 9.5h14M7 7v13M17 7v13M3.5 7c2-2 15-2 17 0"/>',
        'arrow'    => '<path d="M1 7h15M11 1l5 6-5 6"/>',
    ];
    $d = $p[$name] ?? '';
    return '<svg width="'.$size.'" height="'.$size.'" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'.$d.'</svg>';
}

/* ----------------------------------------------------------
 * Excerpt tinh chỉnh
 * -------------------------------------------------------- */
add_filter('excerpt_length', fn() => 24);
add_filter('excerpt_more', fn() => '…');

/* ----------------------------------------------------------
 * Body class tiện ích
 * -------------------------------------------------------- */
add_filter('body_class', function ($c) {
    if (is_front_page()) $c[] = 'is-home';
    return $c;
});

/* ----------------------------------------------------------
 * Fallback menu khi chưa gán menu
 * -------------------------------------------------------- */
function itc_fallback_menu() {
    $items = [
        'Trang chủ' => home_url('/'),
        'Giới thiệu' => '#',
        'Du học' => '#',
        'Đào tạo ngoại ngữ' => '#',
        'Tin tức – Sự kiện' => '#',
        'Tuyển dụng' => '#',
        'Liên hệ' => '#contact',
    ];
    echo '<ul>';
    foreach ($items as $label => $url) {
        printf('<li><a href="%s">%s</a></li>', esc_url($url), esc_html($label));
    }
    echo '</ul>';
}

/* ----------------------------------------------------------
 * SEO: meta title / description / keywords theo từng trang
 * -------------------------------------------------------- */
function itc_seo_data() {
    return [
        'front' => [
            'title' => 'ITC Thái Bình | Du Học Đài Loan – Nhật Bản & Ngoại Ngữ',
            'desc'  => 'ITC Thái Bình – tư vấn du học Đài Loan, Nhật Bản & đào tạo tiếng Trung, tiếng Nhật. 10+ năm kinh nghiệm, 2.000+ học viên. Gọi 0985 653 868.',
            'keywords' => 'du học đài loan, du học nhật bản, học tiếng trung thái bình, học tiếng nhật thái bình, tư vấn du học, ITC Thái Bình',
        ],
        'gioi-thieu' => [
            'title' => 'Giới Thiệu ITC Thái Bình – Tư Vấn Du Học Uy Tín',
            'desc'  => 'ITC – Công ty CP Đầu tư Phát triển Quốc tế, đơn vị tư vấn du học Đài Loan, Nhật Bản & đào tạo ngoại ngữ uy tín tại Thái Bình. Hotline 0985 653 868.',
            'keywords' => 'ITC Thái Bình, giới thiệu ITC, công ty du học Thái Bình, tư vấn du học uy tín',
        ],
        'du-hoc-dai-loan' => [
            'title' => 'Du Học Đài Loan 2026: Chi Phí & Học Bổng | ITC',
            'desc'  => 'Du học Đài Loan 2026 cùng ITC Thái Bình: điều kiện, chi phí, học bổng, hệ vừa học vừa làm, lộ trình rõ ràng. Tư vấn miễn phí – Hotline 0985 653 868.',
            'keywords' => 'du học đài loan, du học đài loan 2026, chi phí du học đài loan, du học đài loan vừa học vừa làm, học bổng du học đài loan, điều kiện du học đài loan, du học đài loan thái bình',
        ],
        'du-hoc-nhat-ban' => [
            'title' => 'Du Học Nhật Bản 2026: Chi Phí, Điều Kiện | ITC',
            'desc'  => 'Du học Nhật Bản 2026 cùng ITC Thái Bình: tư vấn chọn trường, chi phí, học bổng, lộ trình visa rõ ràng. Gọi 0985 653 868 để được tư vấn miễn phí.',
            'keywords' => 'du học nhật bản, du học nhật bản thái bình, du học nhật bản vừa học vừa làm, chi phí du học nhật bản, điều kiện du học nhật bản, học bổng du học nhật bản',
        ],
        'tieng-trung' => [
            'title' => 'Học Tiếng Trung Thái Bình – Lộ Trình HSK | ITC',
            'desc'  => 'Học tiếng Trung tại ITC Thái Bình – lộ trình mất gốc đến HSK 6, TOCFL, lớp nhỏ, cam kết đầu ra. Gọi 0985 653 868 nhận tư vấn lộ trình miễn phí.',
            'keywords' => 'học tiếng trung thái bình, khóa học tiếng trung HSK, luyện thi HSK, luyện thi TOCFL, tiếng trung mất gốc, trung tâm tiếng trung thái bình',
        ],
        'tieng-nhat' => [
            'title' => 'Học Tiếng Nhật Thái Bình – Luyện Thi JLPT | ITC',
            'desc'  => 'Học tiếng Nhật Thái Bình tại ITC: lộ trình N5–N1, luyện thi JLPT, lớp nhỏ, cam kết đầu ra cho người mất gốc. Gọi 0985 653 868 đăng ký học thử.',
            'keywords' => 'học tiếng nhật thái bình, trung tâm tiếng nhật thái bình, luyện thi JLPT, tiếng nhật cho người mất gốc, khóa học tiếng nhật N5, JLPT N5 N3',
        ],
        'tuyen-dung' => [
            'title' => 'Tuyển Dụng – Gia Nhập ITC Thái Bình',
            'desc'  => 'Cơ hội nghề nghiệp tại ITC Thái Bình: tư vấn du học, giáo viên tiếng Trung – Nhật, xử lý hồ sơ visa. Gửi CV về info@itcthaibinh.vn.',
            'keywords' => 'tuyển dụng ITC, việc làm Thái Bình, tuyển giáo viên tiếng trung, tuyển tư vấn du học',
        ],
        'lien-he' => [
            'title' => 'Liên Hệ ITC Thái Bình – Tư Vấn Du Học Miễn Phí',
            'desc'  => 'Liên hệ ITC Thái Bình để được tư vấn du học Đài Loan, Nhật Bản & ngoại ngữ miễn phí. Hotline 0985 653 868, email info@itcthaibinh.vn.',
            'keywords' => 'liên hệ ITC, tư vấn du học thái bình, địa chỉ ITC thái bình, hotline du học',
        ],
        'tin-tuc-su-kien' => [
            'title' => 'Tin Tức – Sự Kiện Du Học | ITC Thái Bình',
            'desc'  => 'Cập nhật tin tức du học Đài Loan, Nhật Bản, học bổng và hoạt động mới nhất từ ITC Thái Bình. Hotline 0985 653 868.',
            'keywords' => 'tin tức du học, học bổng du học, sự kiện ITC thái bình',
        ],
    ];
}
function itc_current_seo() {
    $d = itc_seo_data();
    if (is_front_page()) return $d['front'] ?? null;
    if (is_page()) { $slug = get_post_field('post_name'); return $d[$slug] ?? null; }
    return null;
}
// Mô tả SEO: ưu tiên meta box > mảng > excerpt
function itc_seo_desc() {
    if (is_singular()) { $m = trim(get_post_meta(get_the_ID(), '_itc_seo_desc', true)); if ($m) return $m; }
    $s = itc_current_seo(); if (!empty($s['desc'])) return $s['desc'];
    if (is_single()) return trim(has_excerpt() ? get_the_excerpt() : wp_trim_words(wp_strip_all_tags(get_the_content()), 32, '…'));
    return '';
}
add_action('wp_head', function () {
    $desc = itc_seo_desc();
    $s = itc_current_seo();
    $is_post = is_single();
    $url = is_front_page() ? home_url('/') : (is_singular() ? get_permalink() : home_url('/'));
    if ($desc) echo '<meta name="description" content="' . esc_attr($desc) . '">' . "\n";
    if (!empty($s['keywords'])) echo '<meta name="keywords" content="' . esc_attr($s['keywords']) . '">' . "\n";
    echo '<meta property="og:type" content="' . ($is_post ? 'article' : 'website') . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr(is_singular() ? get_the_title() : ($s['title'] ?? get_bloginfo('name'))) . '">' . "\n";
    if ($desc) echo '<meta property="og:description" content="' . esc_attr($desc) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    $ogimg = (is_singular() && has_post_thumbnail()) ? get_the_post_thumbnail_url(null, 'large') : get_template_directory_uri() . '/assets/images/hero-wide.jpg';
    echo '<meta property="og:image" content="' . esc_url($ogimg) . '">' . "\n";
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
}, 2);
add_filter('document_title_parts', function ($parts) {
    if (is_singular()) {
        $m = trim(get_post_meta(get_the_ID(), '_itc_seo_title', true));
        if ($m) { $parts['title'] = $m; $parts['tagline'] = ''; $parts['site'] = ''; return $parts; }
    }
    $s = itc_current_seo();
    if ($s && !empty($s['title'])) { $parts['title'] = $s['title']; $parts['tagline'] = ''; $parts['site'] = ''; }
    return $parts;
});

/* ----------------------------------------------------------
 * FAQ accordion + FAQPage schema
 * -------------------------------------------------------- */
function itc_faq($faqs, $heading = 'Câu hỏi thường gặp') {
    if (empty($faqs)) return;
    echo '<section class="section faq-sec"><div class="wrap" style="max-width:880px">';
    echo '<div class="section-head section-head--center reveal"><span class="kicker">Giải đáp</span><h2>' . esc_html($heading) . '</h2></div>';
    echo '<div class="faq reveal" data-delay="1">';
    $schema = ['@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => []];
    foreach ($faqs as $f) {
        echo '<details class="faq__item"><summary>' . esc_html($f[0]) . '<i class="faq__ico" aria-hidden="true"></i></summary>';
        echo '<div class="faq__a">' . wpautop(wp_kses_post($f[1])) . '</div></details>';
        $schema['mainEntity'][] = ['@type' => 'Question', 'name' => $f[0],
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => wp_strip_all_tags($f[1])]];
    }
    echo '</div></div>';
    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_UNICODE) . '</script>';
    echo '</section>';
}

/* ----------------------------------------------------------
 * Ảnh đại diện bài viết (fallback theo danh mục nếu chưa có thumbnail)
 * -------------------------------------------------------- */
function itc_post_image_url($post_id = null) {
    $post_id = $post_id ?: get_the_ID();
    if (has_post_thumbnail($post_id)) return get_the_post_thumbnail_url($post_id, 'medium_large');
    $img = get_template_directory_uri() . '/assets/images';
    $map = ['duhoc-dailoan'=>'study-taiwan.jpg','duhoc-nhatban'=>'study-japan.jpg',
            'hoc-tieng-trung'=>'lang-chinese.jpg','hoc-tieng-nhat'=>'lang-japanese.jpg',
            'cam-nang-du-hoc'=>'act-5.jpg'];
    $cats = get_the_category($post_id);
    if ($cats) { $slug = $cats[0]->slug; if (isset($map[$slug])) return $img . '/' . $map[$slug]; }
    return $img . '/act-3.jpg';
}
// Khối "Cẩm nang liên quan" - link bài viết theo danh mục (pillar → cluster)
function itc_related_articles($cat_slug, $heading = 'Cẩm nang liên quan', $n = 3) {
    $q = new WP_Query(['post_type' => 'post', 'posts_per_page' => $n, 'category_name' => $cat_slug,
        'orderby' => 'date', 'order' => 'DESC', 'ignore_sticky_posts' => true]);
    if (!$q->have_posts()) { wp_reset_postdata(); return; }
    echo '<section class="section section--alt"><div class="wrap">';
    echo '<div class="section-head section-head--center reveal"><span class="kicker">Cẩm nang</span><h2>' . esc_html($heading) . '</h2></div>';
    echo '<div class="posts reveal" data-delay="1">';
    while ($q->have_posts()) { $q->the_post(); ?>
      <article class="pcard">
        <a class="pcard__media" href="<?php the_permalink(); ?>"><img src="<?php echo esc_url(itc_post_image_url()); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy"></a>
        <div class="pcard__body">
          <span class="pcard__date"><?php echo get_the_date('d/m/Y'); ?></span>
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        </div>
      </article>
    <?php }
    echo '</div>';
    echo '<p style="text-align:center;margin-top:30px"><a class="btn btn-outline" href="' . esc_url(home_url('/tin-tuc-su-kien/')) . '">Xem tất cả cẩm nang ' . itc_icon('arrow', 15) . '</a></p>';
    echo '</div></section>';
    wp_reset_postdata();
}
function itc_post_cat($post_id = null) {
    $cats = get_the_category($post_id ?: get_the_ID());
    return $cats ? $cats[0] : null;
}

/* ----------------------------------------------------------
 * Banner đầu trang con
 * -------------------------------------------------------- */
function itc_page_hero($title, $sub = '', $bg = '', $center = false) {
    $imgdir = get_template_directory_uri() . '/assets/images';
    $has_bg = $bg !== '';
    $style = $has_bg ? ' style="--bg:url(\'' . esc_url($imgdir . '/' . $bg) . '\')"' : '';
    $cls = 'page-hero' . ($has_bg ? ' page-hero--img' : '') . ($center ? ' page-hero--center' : '');
    echo '<section class="' . $cls . '"' . $style . '>';
    if ($has_bg) echo '<div class="page-hero__ov"></div>';
    echo '<div class="wrap">';
    echo '<h1>' . esc_html($title) . '</h1>';
    if ($sub) echo '<p>' . esc_html($sub) . '</p>';
    echo '<nav class="crumb" aria-label="Breadcrumb"><a href="' . esc_url(home_url('/')) . '">Trang chủ</a><span>/</span><b>' . esc_html($title) . '</b></nav>';
    echo '</div></section>';
    // Breadcrumb schema
    $bc = ['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Trang chủ', 'item' => home_url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => $title, 'item' => (is_singular() ? get_permalink() : home_url(add_query_arg([], $GLOBALS['wp']->request ?? '')))],
    ]];
    echo '<script type="application/ld+json">' . wp_json_encode($bc, JSON_UNESCAPED_UNICODE) . '</script>';
}

/* ----------------------------------------------------------
 * Section đăng ký (navy + form) - tái dùng cho landing
 * -------------------------------------------------------- */
function itc_register_section($title = '', $sub = '', $program = '') {
    $title = $title ? esc_html($title) : str_replace('[br]', '<br>', esc_html(itc_mod('itc_reg_title', 'Để lại thông tin, ITC gọi lại tư vấn miễn phí')));
    $sub   = $sub ?: itc_mod('itc_reg_sub', 'Đội ngũ tư vấn của ITC sẽ liên hệ trong vòng 24 giờ, giải đáp mọi thắc mắc và xây lộ trình phù hợp với bạn.');
    $tel = esc_attr(itc_contact('hotline_raw'));
    ?>
    <section class="section register" id="register">
      <div class="wrap register__grid">
        <div class="register__text reveal">
          <span class="kicker kicker--light">Đăng ký tư vấn</span>
          <h2><?php echo $title; ?></h2>
          <p class="lead" style="color:var(--muted)"><?php echo esc_html($sub); ?></p>
          <ul class="reg__contact">
            <li><span class="reg__ico"><?php echo itc_icon('phone',18); ?></span><div><small>Hotline</small><a href="tel:<?php echo $tel; ?>"><?php echo esc_html(itc_contact('hotline')); ?></a></div></li>
            <li><span class="reg__ico"><?php echo itc_icon('doc',18); ?></span><div><small>Email</small><a href="mailto:<?php echo esc_attr(itc_contact('email')); ?>"><?php echo esc_html(itc_contact('email')); ?></a></div></li>
            <li><span class="reg__ico"><?php echo itc_icon('compass',18); ?></span><div><small>Văn phòng</small><span><?php echo esc_html(itc_contact('address')); ?></span></div></li>
          </ul>
        </div>
        <form class="register__form reveal" data-delay="1" action="#" method="post" onsubmit="return false;">
          <h3>Nhận tư vấn miễn phí</h3>
          <div style="position:absolute;left:-9999px" aria-hidden="true"><label>Website<input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
          <div class="field"><label for="r-name">Họ và tên <i>*</i></label><input type="text" id="r-name" name="name" required autocomplete="name" placeholder="Nguyễn Văn A"></div>
          <div class="field"><label for="r-phone">Số điện thoại <i>*</i></label><input type="tel" id="r-phone" name="phone" required autocomplete="tel" inputmode="numeric" pattern="[0-9]{9,11}" placeholder="09xx xxx xxx"></div>
          <div class="field"><label for="r-program">Quan tâm tới</label>
            <select id="r-program" name="program">
              <?php
              $opts = ['Du học Đài Loan','Du học Nhật Bản','Học tiếng Trung','Học tiếng Nhật'];
              foreach ($opts as $o) printf('<option%s>%s</option>', ($o===$program?' selected':''), esc_html($o));
              ?>
            </select>
          </div>
          <button type="submit" class="btn btn-red btn-lg" style="width:100%">Gửi đăng ký <?php echo itc_icon('arrow',16); ?></button>
          <p class="register__note"><?php echo itc_icon('shield',15); ?> Thông tin của bạn được bảo mật tuyệt đối.</p>
        </form>
      </div>
    </section>
    <?php
}

/* ----------------------------------------------------------
 * Sidebar trang con (CTA tư vấn + liên kết nhanh)
 * -------------------------------------------------------- */
function itc_page_sidebar($active = '') {
    $links = [
        'du-hoc-dai-loan' => 'Du học Đài Loan',
        'du-hoc-nhat-ban' => 'Du học Nhật Bản',
        'tieng-trung'     => 'Học tiếng Trung',
        'tieng-nhat'      => 'Học tiếng Nhật',
        'tuyen-dung'      => 'Tuyển dụng',
    ];
    ?>
    <aside class="sidebar">
      <div class="sidebar__card is-blue">
        <h3>Cần tư vấn miễn phí?</h3>
        <p>Để lại thông tin hoặc gọi ngay, ITC sẽ đồng hành cùng bạn từ A–Z.</p>
        <a class="btn btn-red" style="width:100%;justify-content:center;margin-bottom:10px" href="<?php echo esc_url(home_url('/lien-he/')); ?>">Đăng ký tư vấn</a>
        <a class="btn btn-ghost" style="width:100%;justify-content:center" href="tel:<?php echo esc_attr(itc_contact('hotline_raw')); ?>"><?php echo itc_icon('phone',16); ?> <?php echo esc_html(itc_contact('hotline')); ?></a>
      </div>
      <div class="sidebar__card">
        <h3>Chương trình khác</h3>
        <nav class="sidebar__menu">
          <?php foreach ($links as $slug => $label) {
              $cls = ($slug === $active) ? ' class="active"' : '';
              printf('<a href="%s"%s>%s</a>', esc_url(home_url('/'.$slug.'/')), $cls, esc_html($label));
          } ?>
        </nav>
      </div>
    </aside>
    <?php
}

/* ----------------------------------------------------------
 * CTA band cuối trang con
 * -------------------------------------------------------- */
function itc_cta_band($title = '', $text = '') {
    $title = $title ?: itc_mod('itc_ctaband_title', 'Sẵn sàng bắt đầu hành trình du học của bạn?');
    $text  = $text ?: itc_mod('itc_ctaband_sub', 'Để lại thông tin, đội ngũ ITC sẽ gọi lại tư vấn miễn phí trong vòng 24 giờ.');
    $lh = home_url('/lien-he/');
    echo '<section class="ctaband ctaband--solid"><div class="wrap ctaband__inner reveal">';
    echo '<h2>' . esc_html($title) . '</h2><p>' . esc_html($text) . '</p>';
    echo '<a class="btn btn-red btn-lg" href="' . esc_url($lh) . '">Đăng ký tư vấn miễn phí ' . itc_icon('arrow', 16) . '</a>';
    echo '</div></section>';
}
