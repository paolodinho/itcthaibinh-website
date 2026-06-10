/* ITC Thái Bình — main.js (v2) */
(function () {
  'use strict';
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---- Mobile menu ---- */
  var toggle = document.querySelector('.nav-toggle');
  var nav = document.getElementById('primary-nav');
  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      var open = nav.classList.toggle('open');
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
      document.body.style.overflow = open ? 'hidden' : '';
    });
    nav.addEventListener('click', function (e) {
      if (e.target.tagName === 'A' && e.target.getAttribute('href') !== '#' && nav.classList.contains('open')) {
        nav.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      }
    });
  }

  /* ---- Hero slider (auto 2 banner) ---- */
  var hs = document.querySelector('.clx-hero--slider');
  if (hs) {
    var viewport = hs.querySelector('.clx-hero__viewport');
    var slides = hs.querySelectorAll('.clx-hero__slide');
    var dots = hs.querySelectorAll('.clx-hero__dots button');
    var cur = 0, total = slides.length, sdir = 1;
    var delay = parseInt(hs.getAttribute('data-autoplay'), 10) || 5000, timer = null;
    var go = function (k) {
      cur = Math.max(0, Math.min(total - 1, k));
      if (viewport) viewport.style.transform = 'translateX(-' + (cur * 100) + '%)';
      for (var s = 0; s < slides.length; s++) slides[s].classList.toggle('is-active', s === cur);
      for (var d = 0; d < dots.length; d++) dots[d].classList.toggle('is-active', d === cur);
    };
    var advance = function () {
      if (cur + sdir > total - 1 || cur + sdir < 0) sdir *= -1; // ping-pong, không nhảy giật
      go(cur + sdir);
    };
    var stop = function () { if (timer) { clearInterval(timer); timer = null; } };
    var start = function () { if (reduce || total < 2) return; stop(); timer = setInterval(advance, delay); };
    for (var x = 0; x < dots.length; x++) {
      (function (idx) { dots[idx].addEventListener('click', function () { sdir = idx > cur ? 1 : -1; go(idx); start(); }); })(x);
    }
    hs.addEventListener('mouseenter', stop);
    hs.addEventListener('mouseleave', start);
    go(0);
    start();
  }

  /* ---- Auto-scroll dải Hoạt động (carousel kiểu sharingtaiwan, dừng khi hover) ---- */
  var gal = document.querySelector('.clx-gal--scroll');
  if (gal && !reduce) {
    gal.style.scrollSnapType = 'none'; // snap mandatory chặn auto-scroll mượt
    var gdir = 1, gpaused = false;
    var pause = function () { gpaused = true; };
    var resume = function () { gpaused = false; };
    gal.addEventListener('mouseenter', pause);
    gal.addEventListener('mouseleave', resume);
    gal.addEventListener('touchstart', pause, { passive: true });
    gal.addEventListener('touchend', function () { setTimeout(resume, 2000); }, { passive: true });
    var galTick = function () {
      if (!gpaused && gal.scrollWidth > gal.clientWidth + 4) {
        gal.scrollLeft += gdir * 0.6;
        if (gal.scrollLeft + gal.clientWidth >= gal.scrollWidth - 1) gdir = -1;
        else if (gal.scrollLeft <= 0) gdir = 1;
      }
      requestAnimationFrame(galTick);
    };
    requestAnimationFrame(galTick);
  }

  /* ---- Hoạt động: carousel CENTER (thẻ giữa to lên) + auto 3s + mũi tên 2 đầu ---- */
  var acw = document.querySelector('.clx-acts__wrap');
  if (acw) {
    var avp = acw.querySelector('.clx-acts');
    var atrack = acw.querySelector('.clx-acts__track');
    var aprev = acw.querySelector('.clx-acts__arw--prev');
    var anext = acw.querySelector('.clx-acts__arw--next');
    var adots = acw.parentElement.querySelectorAll('.clx-acts__dots span');
    var aReal = Array.prototype.slice.call(atrack.querySelectorAll('.clx-acts__card'));
    var aN = aReal.length;
    /* Vòng lặp vô tận: nhân bản bộ thẻ ra 2 bên để hàng LUÔN đầy, không trống đầu/cuối */
    var aLoop = !reduce && aN >= 2;
    if (aLoop) {
      var aPre = document.createDocumentFragment(), aPost = document.createDocumentFragment();
      aReal.forEach(function (c) { var n = c.cloneNode(true); n.setAttribute('aria-hidden', 'true'); aPre.appendChild(n); });
      aReal.forEach(function (c) { var n = c.cloneNode(true); n.setAttribute('aria-hidden', 'true'); aPost.appendChild(n); });
      atrack.insertBefore(aPre, atrack.firstChild);
      atrack.appendChild(aPost);
    }
    var acards = atrack.querySelectorAll('.clx-acts__card');
    var aTotal = acards.length;
    var aBase = aLoop ? aN : 0;                 // chỉ số đầu của bộ thẻ "gốc" (giữa)
    var acur = aBase + Math.floor(aN / 2);      // thẻ đang ở giữa (index trong acards)
    var atimer = null, aBusy = false;
    var aApply = function (anim) {
      var c = acards[acur];
      var tx = avp.clientWidth / 2 - (c.offsetLeft + c.offsetWidth / 2);
      if (!anim) { atrack.style.transition = 'none'; }
      atrack.style.transform = 'translateX(' + tx + 'px)';
      if (!anim) { void atrack.offsetWidth; atrack.style.transition = ''; }
      var realIdx = (((acur - aBase) % aN) + aN) % aN;
      for (var k = 0; k < aTotal; k++) acards[k].classList.toggle('is-active', k === acur);
      for (var d = 0; d < adots.length; d++) adots[d].classList.toggle('on', d === realIdx);
    };
    var aSet = function (i) {
      acur = i;
      aApply(true);
      if (aLoop) {
        aBusy = true;
        setTimeout(function () {
          if (acur < aN || acur >= 2 * aN) {            // ra ngoài bộ gốc -> nhảy thầm về bộ gốc (thẻ trùng hình)
            acur = aBase + ((((acur - aBase) % aN) + aN) % aN);
            aApply(false);
          }
          aBusy = false;
        }, 600);
      }
    };
    var aStop = function () { if (atimer) { clearInterval(atimer); atimer = null; } };
    var aStart = function () { if (reduce || aN < 2) return; aStop(); atimer = setInterval(function () { if (!aBusy) aSet(acur + 1); }, 3000); };
    if (aprev) aprev.addEventListener('click', function () { if (!aBusy) { aSet(acur - 1); aStart(); } });
    if (anext) anext.addEventListener('click', function () { if (!aBusy) { aSet(acur + 1); aStart(); } });
    for (var ai = 0; ai < adots.length; ai++) {
      (function (idx) { adots[idx].addEventListener('click', function () { if (!aBusy) { aSet(aBase + idx); aStart(); } }); })(ai);
    }
    acards.forEach(function (c, i) { c.addEventListener('click', function (e) { if (i !== acur && !aBusy) { e.preventDefault(); aSet(i); aStart(); } }); });
    acw.addEventListener('mouseenter', aStop);
    acw.addEventListener('mouseleave', aStart);
    var aRT;
    window.addEventListener('resize', function () { clearTimeout(aRT); aRT = setTimeout(function () { aApply(false); }, 150); });
    aApply(false);
    aStart();
  }

  /* ---- Cảm nghĩ: lật trang 3D (giở như cuốn lưu bút) + dots + mũi tên + autoplay ---- */
  var tw = document.querySelector('.clx-tw');
  if (tw) {
    var tvp = tw.querySelector('.clx-tw__viewport');
    var tslides = Array.prototype.slice.call(tw.querySelectorAll('.clx-tw__slide'));
    var tdots = tw.querySelectorAll('.clx-tw__dots button');
    var tprev = tw.querySelector('.clx-tw__arw--prev');
    var tnext = tw.querySelector('.clx-tw__arw--next');
    var tn = tslides.length, tc = 0, tt = null, tbusy = false, TDUR = 800;
    var tdelay = parseInt(tw.getAttribute('data-autoplay'), 10) || 6000;
    var tSize = function () {
      var h = 0;
      for (var i = 0; i < tn; i++) h = Math.max(h, tslides[i].offsetHeight);
      if (h) tvp.style.height = h + 'px';
    };
    var tDots = function () { for (var i = 0; i < tn; i++) if (tdots[i]) tdots[i].classList.toggle('on', i === tc); };
    var tFlip = function (k, dir) {
      k = (k + tn) % tn;
      if (k === tc || tbusy) return;
      var outg = tslides[tc], inc = tslides[k];
      if (reduce) { outg.classList.remove('is-active'); inc.classList.add('is-active'); tc = k; tDots(); return; }
      tbusy = true;
      if (dir < 0) {
        // lùi: trang mới lật úp từ mép trái xuống chồng lên
        inc.classList.add('is-active', 'flip-start');
        void inc.offsetWidth;
        inc.classList.add('flip-in'); inc.classList.remove('flip-start');
        setTimeout(function () {
          outg.classList.remove('is-active');
          inc.classList.remove('flip-in');
          tc = k; tDots(); tbusy = false;
        }, TDUR);
      } else {
        // tiến: trang mới hé bên dưới, trang hiện tại giở sang trái lộ ra
        inc.classList.add('is-active', 'is-under');
        void inc.offsetWidth;
        outg.classList.add('flip-out');
        setTimeout(function () {
          outg.classList.remove('is-active', 'flip-out');
          inc.classList.remove('is-under');
          tc = k; tDots(); tbusy = false;
        }, TDUR);
      }
    };
    var tStop = function () { if (tt) { clearInterval(tt); tt = null; } };
    var tStart = function () { if (reduce || tn < 2) return; tStop(); tt = setInterval(function () { tFlip(tc + 1, 1); }, tdelay); };
    if (tprev) tprev.addEventListener('click', function () { tFlip(tc - 1, -1); tStart(); });
    if (tnext) tnext.addEventListener('click', function () { tFlip(tc + 1, 1); tStart(); });
    for (var twi = 0; twi < tdots.length; twi++) {
      (function (idx) { tdots[idx].addEventListener('click', function () { tFlip(idx, idx > tc ? 1 : -1); tStart(); }); })(twi);
    }
    tw.addEventListener('mouseenter', tStop);
    tw.addEventListener('mouseleave', tStart);
    tslides.forEach(function (s, i) { s.classList.toggle('is-active', i === 0); });
    tDots();
    tSize();
    window.addEventListener('load', tSize);
    var tRT; window.addEventListener('resize', function () { clearTimeout(tRT); tRT = setTimeout(tSize, 150); });
    tStart();
  }

  /* ---- Header shadow on scroll ---- */
  var header = document.querySelector('.twn-navwrap') || document.querySelector('.site-header');
  if (header) {
    var onScroll = function () { header.classList.toggle('scrolled', window.scrollY > 20); };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  /* ---- Smooth anchor with offset ---- */
  document.querySelectorAll('a[href^="#"]').forEach(function (a) {
    a.addEventListener('click', function (e) {
      var id = a.getAttribute('href');
      if (id.length > 1) {
        var el = document.querySelector(id);
        if (el) {
          e.preventDefault();
          var y = el.getBoundingClientRect().top + window.pageYOffset - 86;
          window.scrollTo({ top: y, behavior: reduce ? 'auto' : 'smooth' });
        }
      }
    });
  });

  /* ---- Scroll reveal (fade-up + stagger, kiểu Elementor) ---- */
  // Tự gắn hiệu ứng cho các phần tử dạng lưới/danh sách để toàn site "sống động" như reference
  var FX_SEL = '.svc, .usp__item, .proc, .tcard, .pcard, .gitem, .fig, .infocard, .job,' +
    ' .flist > li, .why__list > li, .sidebar__card';
  document.querySelectorAll(FX_SEL).forEach(function (el) {
    if (el.classList.contains('reveal')) return;
    el.classList.add('reveal', 'fx-auto');
    // stagger theo vị trí trong nhóm anh em cùng loại
    var sibs = el.parentElement ? Array.prototype.filter.call(el.parentElement.children, function (c) {
      return c.classList && c.classList.contains('fx-auto');
    }) : [];
    var idx = sibs.indexOf(el);
    if (idx > 0) el.style.transitionDelay = Math.min(idx, 6) * 0.08 + 's';
  });

  document.body.classList.add('has-fx');
  var revealEls = document.querySelectorAll('.reveal, .reveal-zoom');
  if (reduce || !('IntersectionObserver' in window)) {
    revealEls.forEach(function (el) { el.classList.add('in'); });
  } else {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) {
        if (en.isIntersecting) { en.target.classList.add('in'); io.unobserve(en.target); }
      });
    }, { threshold: 0.1, rootMargin: '0px 0px -6% 0px' });
    revealEls.forEach(function (el) { io.observe(el); });
  }

  /* ---- Study tabs ---- */
  var tabBtns = document.querySelectorAll('.tabs__btn');
  if (tabBtns.length) {
    tabBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        var key = btn.getAttribute('data-tab');
        tabBtns.forEach(function (b) {
          var on = b === btn;
          b.classList.toggle('is-active', on);
          b.setAttribute('aria-selected', on ? 'true' : 'false');
        });
        document.querySelectorAll('.tabs__panel').forEach(function (p) {
          p.classList.toggle('is-active', p.getAttribute('data-panel') === key);
        });
      });
    });
  }

  /* ---- Counter animation ---- */
  function animateCount(el) {
    var target = parseFloat(el.getAttribute('data-count'));
    var suffix = el.getAttribute('data-suffix') || '';
    var dur = 1600, start = null;
    function step(ts) {
      if (!start) start = ts;
      var p = Math.min((ts - start) / dur, 1);
      var eased = 1 - Math.pow(1 - p, 3);
      var val = target * eased;
      el.textContent = (Number.isInteger(target) ? Math.round(val) : val.toFixed(1))
        .toLocaleString('vi-VN') + suffix;
      if (p < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  }
  var counters = document.querySelectorAll('[data-count]');
  if (reduce || !('IntersectionObserver' in window)) {
    counters.forEach(function (el) {
      el.textContent = parseFloat(el.getAttribute('data-count')).toLocaleString('vi-VN') + (el.getAttribute('data-suffix') || '');
    });
  } else {
    var io2 = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) {
        if (en.isIntersecting) { animateCount(en.target); io2.unobserve(en.target); }
      });
    }, { threshold: 0.5 });
    counters.forEach(function (el) { io2.observe(el); });
  }
})();
