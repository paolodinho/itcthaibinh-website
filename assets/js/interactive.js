/* ITC interactive components — calculator, quiz, flight-path, passport stamps, flip cards */
(function () {
  'use strict';

  /* ---------- 1. Calculator chi phí du học ---------- */
  function initCalc() {
    var box = document.querySelector('[data-calc]');
    if (!box) return;
    // bảng chi phí (triệu VND/năm) — học phí + sinh hoạt ước tính
    var TUITION = { lang: 38, uni: 78 };           // hệ tiếng / đại học (học phí/năm)
    var LIVING  = { taipei: 84, central: 60, south: 54 }; // sinh hoạt/năm theo vùng
    var SCHOLAR = { none: 0, partial: 0.45, moe: 0.7, icdf: 0.95 }; // % giảm tổng

    var elProg = box.querySelector('[name="calc_prog"]');
    var elCity = box.querySelector('[name="calc_city"]');
    var elSch  = box.querySelector('[name="calc_sch"]');
    var outGross = box.querySelector('[data-calc-gross]');
    var outNet   = box.querySelector('[data-calc-net]');
    var outNote  = box.querySelector('[data-calc-note]');

    function fmt(n) { return Math.round(n).toLocaleString('vi-VN') + ' triệu'; }
    function calc() {
      var gross = TUITION[elProg.value] + LIVING[elCity.value];
      var off = SCHOLAR[elSch.value];
      var net = gross * (1 - off);
      outGross.textContent = fmt(gross);
      outNet.textContent = fmt(net);
      // làm thêm bù sinh hoạt
      var work = elProg.value === 'uni' ? 'Hệ đại học được làm thêm 20h/tuần, đủ bù phần lớn sinh hoạt phí.' : 'Hệ tiếng tập trung học, nên dự trù đủ chi phí năm đầu.';
      outNote.textContent = (off > 0 ? 'Đã trừ ' + Math.round(off * 100) + '% nhờ học bổng. ' : '') + work;
      // animate
      [outGross, outNet].forEach(function (e) { e.classList.remove('pop'); void e.offsetWidth; e.classList.add('pop'); });
    }
    [elProg, elCity, elSch].forEach(function (e) { e.addEventListener('change', calc); });
    calc();
  }

  /* ---------- 2. Test trình độ tiếng Trung (mini quiz) ---------- */
  function initQuiz() {
    var quiz = document.querySelector('[data-quiz]');
    if (!quiz) return;
    var Q = [
      { q: 'Bạn đã từng học tiếng Trung chưa?', a: ['Chưa bao giờ', 'Biết vài câu cơ bản', 'Học được 3–6 tháng', 'Trên 1 năm'] },
      { q: 'Bạn nhận mặt được bao nhiêu chữ Hán?', a: ['Gần như không', 'Dưới 100 chữ', '300–800 chữ', 'Trên 1000 chữ'] },
      { q: 'Bạn nghe hiểu hội thoại hằng ngày ở mức nào?', a: ['Không hiểu', 'Hiểu từ khóa', 'Hiểu ý chính', 'Hiểu gần hết'] },
      { q: 'Bạn có thể tự giới thiệu & hỏi đường bằng tiếng Trung?', a: ['Không', 'Câu rất ngắn', 'Tạm ổn', 'Trôi chảy'] },
      { q: 'Mục tiêu của bạn là?', a: ['Mất gốc cần học lại', 'Giao tiếp cơ bản', 'Thi HSK 3–4 / du học', 'Thi HSK 5–6 / học thuật'] }
    ];
    var RESULTS = [
      { min: 0,  band: 'Mất gốc (HSK 0)', note: 'Phù hợp lớp Sơ cấp A1 — học phát âm, bính âm, 150 chữ đầu tiên. Lộ trình ~3 tháng lên HSK1.' },
      { min: 6,  band: 'Sơ cấp (HSK 1–2)', note: 'Bạn có nền cơ bản — vào lớp A2 củng cố ngữ pháp & 600 từ vựng, hướng HSK3.' },
      { min: 11, band: 'Trung cấp (HSK 3–4)', note: 'Đủ điều kiện luyện thi HSK3–4 / TOCFL Band A — mức nhiều trường Đài Loan yêu cầu đầu vào.' },
      { min: 15, band: 'Khá – Giỏi (HSK 5+)', note: 'Bạn nên luyện HSK5–6 / TOCFL Band B–C để apply học bổng & chương trình học thuật.' }
    ];
    var step = 0, score = 0;
    var stage = quiz.querySelector('[data-quiz-stage]');
    var bar = quiz.querySelector('[data-quiz-bar]');

    function render() {
      if (step < Q.length) {
        var item = Q[step];
        var html = '<p class="quiz__count">Câu ' + (step + 1) + '/' + Q.length + '</p><h3 class="quiz__q">' + item.q + '</h3><div class="quiz__opts">';
        item.a.forEach(function (opt, i) { html += '<button type="button" class="quiz__opt" data-v="' + i + '">' + opt + '</button>'; });
        html += '</div>';
        stage.innerHTML = html;
        if (bar) bar.style.width = (step / Q.length * 100) + '%';
        stage.querySelectorAll('.quiz__opt').forEach(function (b) {
          b.addEventListener('click', function () { score += parseInt(this.getAttribute('data-v'), 10) + 1; step++; render(); });
        });
      } else {
        if (bar) bar.style.width = '100%';
        var r = RESULTS[0];
        RESULTS.forEach(function (x) { if (score >= x.min) r = x; });
        stage.innerHTML = '<div class="quiz__result"><span class="quiz__badge">Kết quả của bạn</span>' +
          '<h3>' + r.band + '</h3><p>' + r.note + '</p>' +
          '<div class="quiz__cta"><a class="btn btn-red" href="#register">Nhận lộ trình học chi tiết</a>' +
          '<button type="button" class="btn btn-ghost" data-quiz-reset>Làm lại</button></div></div>';
        stage.querySelector('[data-quiz-reset]').addEventListener('click', function () { step = 0; score = 0; render(); });
      }
    }
    render();
  }

  /* ---------- 3. Đường bay vẽ dần + máy bay chạy ---------- */
  function initFlight() {
    var wrap = document.querySelector('[data-flight]');
    if (!wrap) return;
    var io = new IntersectionObserver(function (es) {
      es.forEach(function (e) { if (e.isIntersecting) { wrap.classList.add('is-flying'); io.disconnect(); } });
    }, { threshold: 0.35 });
    io.observe(wrap);
  }

  /* ---------- 4. Hộ chiếu đóng dấu (stamp khi scroll) ---------- */
  function initStamps() {
    var stamps = document.querySelectorAll('[data-stamp]');
    if (!stamps.length) return;
    var io = new IntersectionObserver(function (es) {
      es.forEach(function (e) {
        if (e.isIntersecting) {
          var d = parseInt(e.target.getAttribute('data-stamp'), 10) || 0;
          setTimeout(function () { e.target.classList.add('stamped'); }, d * 260);
          io.unobserve(e.target);
        }
      });
    }, { threshold: 0.5 });
    stamps.forEach(function (s) { io.observe(s); });
  }

  /* ---------- 5. Card lật so sánh (click trên mobile) ---------- */
  function initFlip() {
    document.querySelectorAll('[data-flip]').forEach(function (c) {
      c.addEventListener('click', function () { c.classList.toggle('is-flipped'); });
    });
  }

  /* ---------- 6. Máy bay vút lên trời theo scroll ---------- */
  function initJourney() {
    var j = document.querySelector('[data-journey]');
    if (!j) return;
    if (window.matchMedia('(prefers-reduced-motion:reduce)').matches) return;
    var plane = j.querySelector('.journey__plane');
    var trail = j.querySelector('.journey__trail');
    var ticking = false;
    function update() {
      ticking = false;
      var max = document.documentElement.scrollHeight - window.innerHeight;
      var p = max > 0 ? Math.min(1, Math.max(0, window.scrollY / max)) : 0;
      var pct = p * 100;
      // cuộn xuống → máy bay bay LÊN (từ dưới lên), vệt khói mọc theo sau
      plane.style.bottom = pct + '%';
      trail.style.height = pct + '%';
      // càng lên cao càng "vút" — nghiêng nhẹ
      plane.style.transform = 'translate(-50%,50%) rotate(' + (-6 - p * 8) + 'deg)';
      j.classList.toggle('is-active', window.scrollY > 140);
    }
    function onScroll() { if (!ticking) { ticking = true; requestAnimationFrame(update); } }
    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', onScroll, { passive: true });
    update();
  }

  /* ---------- 7. Cảnh cất cánh (scrollytelling) ---------- */
  function initTakeoff() {
    var sec = document.querySelector('[data-takeoff]');
    if (!sec) return;
    if (window.matchMedia('(prefers-reduced-motion:reduce)').matches) return;
    if (window.matchMedia('(max-width:860px)').matches) return;
    var trail = sec.querySelector('.takeoff__trail');
    var plane = sec.querySelector('.takeoff__plane');
    var svg = sec.querySelector('.takeoff__svg');
    var L = trail.getTotalLength();
    trail.style.strokeDasharray = L;
    trail.style.strokeDashoffset = L;
    var ticking = false;
    function update() {
      ticking = false;
      var total = sec.offsetHeight - window.innerHeight;
      var top = sec.getBoundingClientRect().top;
      var prog = total > 0 ? Math.min(1, Math.max(0, -top / total)) : 0;
      trail.style.strokeDashoffset = L * (1 - prog);
      var W = svg.clientWidth, H = svg.clientHeight;
      var p1 = trail.getPointAtLength(L * prog);
      var p2 = trail.getPointAtLength(Math.min(L, L * prog + 1));
      var x = p1.x / 1000 * W, y = p1.y / 600 * H;
      var ang = Math.atan2((p2.y - p1.y) / 600 * H, (p2.x - p1.x) / 1000 * W) * 180 / Math.PI;
      var scale = 0.82 + prog * 0.5;
      plane.style.transform = 'translate(' + x + 'px,' + y + 'px) translate(-50%,-50%) rotate(' + (ang + 90) + 'deg) scale(' + scale + ')';
      sec.classList.toggle('is-mid', prog > 0.1 && prog < 0.92);
      sec.classList.toggle('is-arrived', prog > 0.8);
    }
    function onScroll() { if (!ticking) { ticking = true; requestAnimationFrame(update); } }
    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', onScroll, { passive: true });
    update();
  }

  /* ---------- 8. Máy bay bay xuyên trang theo scroll ---------- */
  function initSkyFly() {
    var w = document.querySelector('[data-skyfly]');
    if (!w) return;
    if (window.matchMedia('(prefers-reduced-motion:reduce)').matches) return;
    var path = w.querySelector('.skyfly__path');
    var plane = w.querySelector('.skyfly__plane');
    var svg = w.querySelector('.skyfly__svg');
    var L = path.getTotalLength();
    var ticking = false;
    function update() {
      ticking = false;
      var max = document.documentElement.scrollHeight - window.innerHeight;
      var p = max > 0 ? Math.min(1, Math.max(0, window.scrollY / max)) : 0;
      var ctm = svg.getScreenCTM();
      if (!ctm) return;
      var pt = path.getPointAtLength(L * p).matrixTransform(ctm);
      var pt2 = path.getPointAtLength(Math.min(L, L * p + 1)).matrixTransform(ctm);
      var ang = Math.atan2(pt2.y - pt.y, pt2.x - pt.x) * 180 / Math.PI;
      plane.style.transform = 'translate(' + pt.x + 'px,' + pt.y + 'px) translate(-50%,-50%) rotate(' + (ang + 90) + 'deg)';
      w.classList.toggle('is-on', window.scrollY > 110);
    }
    function onScroll() { if (!ticking) { ticking = true; requestAnimationFrame(update); } }
    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', onScroll, { passive: true });
    update();
  }

  function ready(fn) { if (document.readyState !== 'loading') fn(); else document.addEventListener('DOMContentLoaded', fn); }
  ready(function () { initCalc(); initQuiz(); initFlight(); initStamps(); initFlip(); initSkyFly(); });
})();
