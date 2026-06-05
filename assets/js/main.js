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

  /* ---- Header shadow on scroll ---- */
  var header = document.querySelector('.site-header');
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
  var revealEls = document.querySelectorAll('.reveal');
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
