<?php
/**
 * Template Name: Thư viện ảnh (Gallery)
 * Gallery tổng hợp ảnh trung tâm, phân mục - sửa được qua menu "Thư viện ảnh".
 */
if (!defined('ABSPATH')) exit;
get_header();
itc_page_hero('Thư viện ảnh ITC', 'Khoảnh khắc thật tại ITC - lớp học, đội ngũ, sự kiện và hành trình du học của học viên.', 'hero-wide.jpg', true);
$groups = itc_photo_groups();
$total = 0; foreach ($groups as $gr) $total += count($gr['items']);
?>

<!-- Social proof strip -->
<section class="section section--alt" style="padding-block:46px">
  <div class="wrap">
    <div class="gstats reveal">
      <div class="gstat"><b><span data-count="13">0</span><i>K+</i></b><span>Lượt theo dõi fanpage</span></div>
      <div class="gstat"><b><span data-count="2000">0</span><i>+</i></b><span>Học viên đồng hành</span></div>
      <div class="gstat"><b><span data-count="100">0</span><i>%</i></b><span>Khách hàng đề xuất</span></div>
      <div class="gstat"><b><span data-count="3">0</span></b><span>Cơ sở tại Hưng Yên</span></div>
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="kicker">Khoảnh khắc ITC</span>
      <h2>Hình ảnh thật tại trung tâm</h2>
      <p class="lead"><?php echo (int)$total; ?> hình ảnh thực tế từ ITC - chọn danh mục để xem nhanh.</p>
    </div>

    <!-- Bộ lọc danh mục -->
    <div class="catbar gfilter reveal" data-delay="1">
      <button class="catbar__chip is-active" data-filter="all">Tất cả <span><?php echo (int)$total; ?></span></button>
      <?php foreach ($groups as $gr): ?>
        <button class="catbar__chip" data-filter="<?php echo esc_attr($gr['slug']); ?>"><?php echo esc_html($gr['name']); ?> <span><?php echo count($gr['items']); ?></span></button>
      <?php endforeach; ?>
    </div>

    <div class="gallery__masonry ggrid reveal" data-delay="2">
      <?php foreach ($groups as $gr): foreach ($gr['items'] as $it): ?>
        <figure class="gitem gitem--cap" data-cat="<?php echo esc_attr($gr['slug']); ?>">
          <img src="<?php echo esc_url($it['img']); ?>" alt="<?php echo esc_attr($it['cap']); ?>" loading="lazy" data-full="<?php echo esc_url($it['img']); ?>">
          <figcaption><span class="gitem__tag"><?php echo esc_html($gr['name']); ?></span><?php echo esc_html($it['cap']); ?></figcaption>
        </figure>
      <?php endforeach; endforeach; ?>
    </div>
  </div>
</section>

<!-- Flipbook lightbox -->
<div class="glb" id="glb" aria-hidden="true" role="dialog">
  <button class="glb__close" aria-label="Đóng">&times;</button>
  <button class="glb__nav glb__prev" aria-label="Ảnh trước">&#8249;</button>
  <div class="glb__book">
    <div class="glb__page">
      <figure class="glb__face glb__front"><img src="" alt=""><figcaption></figcaption></figure>
      <figure class="glb__face glb__back"><img src="" alt=""><figcaption></figcaption></figure>
    </div>
  </div>
  <button class="glb__nav glb__next" aria-label="Ảnh sau">&#8250;</button>
  <div class="glb__count"><b>1</b> / <span>1</span></div>
</div>

<script>
(function(){
  var chips=document.querySelectorAll('.gfilter .catbar__chip');
  var items=Array.prototype.slice.call(document.querySelectorAll('.ggrid .gitem'));
  chips.forEach(function(c){c.addEventListener('click',function(){
    chips.forEach(function(x){x.classList.remove('is-active');});c.classList.add('is-active');
    var f=c.getAttribute('data-filter');
    items.forEach(function(it){it.style.display=(f==='all'||it.getAttribute('data-cat')===f)?'':'none';});
  });});

  var lb=document.getElementById('glb');
  var book=lb.querySelector('.glb__book'), page=lb.querySelector('.glb__page');
  var front=lb.querySelector('.glb__front'), back=lb.querySelector('.glb__back');
  var countNow=lb.querySelector('.glb__count b'), countAll=lb.querySelector('.glb__count span');
  var visible=[], cur=0, busy=false;

  function meta(it){var im=it.querySelector('img');return{src:im.getAttribute('data-full'),cap:im.getAttribute('alt')||''};}
  function setFace(face,m){var img=face.querySelector('img'),cap=face.querySelector('figcaption');img.src=m.src;img.alt=m.cap;cap.textContent=m.cap;}

  function open(it){
    visible=items.filter(function(x){return x.style.display!=='none';});
    cur=visible.indexOf(it); if(cur<0)cur=0;
    setFace(front,meta(visible[cur])); back.querySelector('img').src='';
    countAll.textContent=visible.length; countNow.textContent=cur+1;
    page.style.transition='none'; page.style.transform='rotateY(0deg)';
    lb.classList.add('is-open'); lb.setAttribute('aria-hidden','false');
  }
  function close(){lb.classList.remove('is-open');lb.setAttribute('aria-hidden','true');}

  function go(dir){
    if(busy||visible.length<2)return; busy=true;
    var next=(cur+dir+visible.length)%visible.length;
    var m=meta(visible[next]);
    // ảnh mới đặt lên mặt sau, lật trang
    setFace(back,m);
    page.classList.toggle('flip-rev', dir<0);
    page.style.transition='transform .62s cubic-bezier(.2,.7,.2,1)';
    page.style.transform = dir>0 ? 'rotateY(-180deg)' : 'rotateY(180deg)';
    setTimeout(function(){
      // chốt: đưa ảnh mới về mặt trước, reset trang
      setFace(front,m);
      page.style.transition='none'; page.style.transform='rotateY(0deg)';
      cur=next; countNow.textContent=cur+1; busy=false;
    },620);
  }

  items.forEach(function(it){it.querySelector('img').addEventListener('click',function(){open(it);});});
  lb.querySelector('.glb__next').addEventListener('click',function(e){e.stopPropagation();go(1);});
  lb.querySelector('.glb__prev').addEventListener('click',function(e){e.stopPropagation();go(-1);});
  lb.addEventListener('click',function(e){if(e.target===lb||e.target.classList.contains('glb__close'))close();});
  document.addEventListener('keyup',function(e){
    if(!lb.classList.contains('is-open'))return;
    if(e.key==='Escape')close(); else if(e.key==='ArrowRight')go(1); else if(e.key==='ArrowLeft')go(-1);
  });
  // vuốt trên mobile
  var sx=0;
  lb.addEventListener('touchstart',function(e){sx=e.touches[0].clientX;},{passive:true});
  lb.addEventListener('touchend',function(e){var dx=e.changedTouches[0].clientX-sx;if(Math.abs(dx)>50)go(dx<0?1:-1);},{passive:true});
})();
</script>

<?php
itc_cta_band();
get_footer();
