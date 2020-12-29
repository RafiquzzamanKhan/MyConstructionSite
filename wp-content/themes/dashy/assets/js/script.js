jQuery(document).ready(function ($) {
  'use strict';

  var winwidth = $(window).width();

  /*==================================
   key trapped
 ==================================*/

  var keyTrapped = function (elem) {
    var tabbable = elem
      .find('select, input, textarea, button, a')
      .filter(':visible');

    var firstTabbable = tabbable.first();
    var lastTabbable = tabbable.last();
    /*set focus on first input*/
    firstTabbable.focus();

    /*redirect last tab to first input*/
    lastTabbable.on('keydown', function (e) {
      if (e.which === 9 && !e.shiftKey) {
        e.preventDefault();
        firstTabbable.focus();
      }
    });

    /*redirect first shift+tab to last input*/
    firstTabbable.on('keydown', function (e) {
      if (e.which === 9 && e.shiftKey) {
        e.preventDefault();
        lastTabbable.focus();
      }
    });
    elem.on('keyup', function (e) {
      if (e.keyCode === 27) {
        elem.hide();
      }
    });
  };

  /*==================================
   Toggle Button
 ==================================*/
  $('a.open-button').on('click', function (e) {
    e.preventDefault();
    $('body').addClass('Is-toggle');
    keyTrapped($('.Is-toggle .main-navigation'));
  });

  function mainnavButton() {
    $('.open-button').clone().appendTo('.main-navigation .mobile-menu-toggle');
    $('.main-navigation .open-button').addClass('active');
    $('.active').on('click', function () {
      $('body').removeClass('Is-toggle');
    });
  }
  mainnavButton();

  $('.canvas-overlay').on('click', function (event) {
    event.preventDefault();
    $('.canvas-menu').removeClass('active');
    $('.canvas-open').removeClass('active');
  });

  $('.close-sidebar').on('click', function (event) {
    event.preventDefault();
    $('.canvas-menu').removeClass('active');
    $('.canvas-open').removeClass('active');
  });
  $('.canvas-button a.canvas-open').on('click', function (event) {
    event.preventDefault();
    $(this).toggleClass('active');
    $('.canvas-menu').toggleClass('active');
    keyTrapped($('.canvas-menu'));
  });

  /*==================================
   search bar show
 ==================================*/

  function searchToggle() {
    $('.search-toggle a').on('click', function (e) {
      e.preventDefault();
      $(this).closest('.search-toggle').toggleClass('show');
      $('.searchform').on(
        'transitionend MSTransitionEnd webkitTransitionEnd oTransitionEnd',
        function () {
          $('.show').find('input.search-field').focus();
        }
      );
    });
  }
  searchToggle();

  $(document)
    .not('.searchform form')
    .on('click', function () {
      $('.searchform').closest('.search-toggle').removeClass('show');
    });

  $('.search-toggle .search-submit').focusout(function () {
    $(this).closest('.search-toggle').removeClass('show');
  });

  /*==================================
    Responsive menu
  ==================================*/

  if (winwidth <= 991) {
    $(
      '.main-navigation li.menu-item-has-children,.main-navigation li.page-item-has-children'
    ).prepend(
      '<span class="dropdown-icon"><i class="fas fa-caret-down"><i></span>'
    );

    $(
      '.main-navigation li.menu-item-has-children span.dropdown-icon,.main-navigation li.page-item-has-children span.dropdown-icon'
    ).on('click', function (e) {
      e.preventDefault();
      $(this)
        .siblings(
          '.main-navigation li.menu-item-has-children ul.sub-menu,.main-navigation li.page-item-has-children ul.sub-menu'
        )
        .slideToggle(300);
    });
  } else {
    $(
      '.main-navigation li.menu-item-has-children, .main-navigation li.page-item-has-children'
    )
      .find('span')
      .css('display', 'none');
  }

  if ($('.category-post .row').children().length == 0) {
    $('.category-post').css('margin-bottom', '0');
  }
});
