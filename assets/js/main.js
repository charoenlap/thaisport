(function($) {
  'use strict';
  $(document).ready(function() {

    /* Microsoft Smooth Scroll Disabler */
    var menu_mobile, mobile_menu, mobile_toggle, shop, sidebar, sidebar_toggle, url, wishlist;
    if ($.browser.msie) {
      $('#ct-js-wrapper').on('mousewheel', function() {
        event.preventDefault();
        window.scrollTo(0, window.pageYOffset - event.wheelDelta / 2);
      });
    }

    /* Browsers */
    if ($.browser.mozilla) {
      el_html.addClass('browser-mozilla');
    }
    if ($.browser.msie) {
      el_html.addClass('browser-msie');
    }
    if ($.browser.webkit) {
      el_html.addClass('browser-webkit');
    }
    if ($.browser.safari) {
      el_html.addClass('browser-safari');
    }

    /* Magical Slick */
    $('.ct-js-gallery-slider').each(function() {
      var that;
      that = $(this);
      return that.slick({
        customPaging: function(slider, i) {
          return '<button><img src=' + $(slider.$slides[i]).find('img').attr('src') + '></img></button>';
        }
      });
    });

    /* Text Color */
    set_text_color();

    /* Font Size */
    set_font_size();

    /* Background Color */
    set_background();

    /* Height */
    set_height();

    /* Show */

    /* Line Height */
    set_line_height();

    /* Scrollspy */
    if ($('.ct-menu--onepager')) {
      $('body').scrollspy({
        target: '.ct-menu--onepager .navbar',
        offset: 120
      });
    }

    /* Tooltip */
    $('[data-toggle="tooltip"]').tooltip({
      placement: "right"
    });

    /* Page Scroll */
    $('[data-scroll]').on('click', function(e) {
      var scroll;
      if ($(this).attr('href') === '#') {
        e.preventDefault();
      }
      scroll = $(this).attr('data-scroll');
      if (scroll === 'up') {
        return $('html, body').animate({
          scrollTop: 0
        }, 900, 'swing');
      } else if (scroll.charAt(0) === '#') {
        if (device.mobile()) {
          return $('html, body').animate({
            scrollTop: $(scroll).offset().top - 55
          }, 900, 'swing');
        } else {
          return $('html, body').animate({
            scrollTop: $(scroll).offset().top - 110
          }, 900, 'swing');
        }
      }
    });

    /* Skrollr Parallax */
    if (!device.mobile() && !device.tablet()) {
      $('[data-parallax]').each(function() {
        var attr, that;
        that = $(this);
        attr = that.attr('data-parallax');
        that.attr('data-top-bottom', 'background-position: 50% -' + attr + 'px');
        that.attr('data-bottom-top', 'background-position: 50% ' + attr + 'px');
        that.attr('data-center', 'background-position: 50% 0px');
      });
    }

    /* Selectize */
    if ($().selectize) {
      $('.ct-select').each(function() {
        $(this).selectize({
          create: true
        });
      });
    }

    /* Navbar Active Class */
    url = window.location;
    $('.ct-menu .nav-item').find('a').filter(function() {
      return this.href === location.href.replace(/#.*/, "");
    }).closest('.nav-item').addClass('active');
    $('.ct-menu .dropdown-menu').find('a').filter(function() {
      return this.href === location.href.replace(/#.*/, "");
    }).addClass('active');

    /* Mobile Menu */
    (menu_mobile = function() {
      menu_mobile = $('.ct-mobile-menu');
      if (menu_mobile.length) {

        /* Mobile Menu Toggle */
        $('.ct-mobile-navbar__toggle').on('click', function(e) {
          e.preventDefault();
          el_html.addClass('mobile-open');
          return false;
        });

        /* Menu Mobile */
        menu_mobile.hammer().bind('swiperight', function() {
          return el_html.addClass('mobile-open');
        });
        el_body.hammer().bind('swipeleft', function() {
          return el_html.removeClass('mobile-open');
        });

        /* Mobile Dropdown */
        return menu_mobile.find('.dropdown > a, .submenu > a').each(function() {
          var parent, that;
          that = $(this);
          parent = that.parent();
          return that.on('click', function(e) {
            if (!parent.hasClass('active')) {
              e.preventDefault();
              parent.addClass('active');
              return false;
            } else {
              return window.open(this.href, '_self');
            }
          });
        });
      }
    })();
    mobile_menu = $('.ct-menu-mobile');
    mobile_toggle = $('.ct-mobile-toggle');
    mobile_toggle.find('a').each(function() {
      return $(this).on('click', function(e) {
        e.preventDefault();
        el_html.toggleClass('mobile-open');
        return false;
      });
    });

    /* Sidebar */
    if (el_body.hasClass('is-sidebar') && device_width < 992 && (device.mobile() || device.tablet())) {

      /* Sidebar Toggle */
      sidebar_toggle = $('.ct-sidebar__mobile-toggle');
      sidebar_toggle.on('click', function(e) {
        e.preventDefault();
        if (el_html.hasClass('sidebar-open')) {
          el_html.removeClass('sidebar-open');
        } else {
          el_html.addClass('sidebar-open');
        }
        return false;
      });

      /* Sidebar */
      sidebar = $('.ct-sidebar');
      sidebar.hammer().bind('swiperight', function() {
        return el_html.addClass('sidebar-open');
      });
      el_body.hammer().bind('swipeleft', function() {
        return el_html.removeClass('sidebar-open');
      });
    }

    /* Navbar Search */
    $('.ct-search-toggle').each(function() {
      return $(this).find('a').on('click', function(e) {
        e.preventDefault();
        $('#nav-search').addClass('is-active');
        $('#nav-search-input').focus();
        return false;
      });
    });
    $('#nav-search-close').on('click', function(e) {
      e.preventDefault();
      $('#nav-search').removeClass('is-active');
      return false;
    });

    /* Close Stuff on click */
    $(document).on('click touchend', function(event) {

      /* Close Mobile Menu */
      if (!$(event.target).closest('.ct-menu-mobile').length && el_html.hasClass('mobile-open')) {
        el_html.removeClass('mobile-open');
      }

      /* Close Sidebar */
      if (el_html.hasClass('sidebar-open')) {
        if (!$(event.target).closest('.ct-sidebar').length) {
          el_html.removeClass('sidebar-open');
        }
      }
    });

    /* Newsletter Form */
    $('.ct-newsletter__form').on('submit', function(e) {
      var that;
      that = $(this);
      that.addClass('newsletter-subscribed');
      return false;
    });

    /* Slick Main */
    $('.ct-slick--main').each(function() {
      var that;
      that = $(this);
      return that.on('afterChange', function() {
        var active;
        active = that.find('.slick-active');
        if (active.attr('data-light') !== void 0) {
          return el_nav.removeClass('navbar-default').addClass('navbar-inverse');
        } else {
          return el_nav.removeClass('navbar-inverse').addClass('navbar-default');
        }
      });
    });

    /* nst Slider */

    /* Paypal plugin */
    (shop = function() {
      var cart_number, count_items, wishlist_number;
      cart_number = $('.ct-cart-number');
      wishlist_number = $('.ct-wishlist-number');
      count_items = function() {
        var cart, wishlist;
        cart = $('.ct-cart ol').find('li').length;
        wishlist = $('.ct-wishlist ol').find('li').length;
        cart_number.html(cart);
        return wishlist_number.html(wishlist);
      };
      return $('body').ctshop({
        product: 'ct-product',
        product_title: 'ct-product__title',
        product_price: 'ct-product__price',
        product_button: 'ct-product__add-to-cart',
        product_wishlist: 'ct-product__wishlist',
        product_image: 'ct-product__img',
        init: function() {
          return count_items();
        },
        after_value_changes: function() {
          return count_items();
        },
        after_clear_cart: function() {
          return count_items();
        },
        before_add_to_cart: function() {},
        after_add_to_wishlist: function() {
          return count_items();
        },
        remove_item_from_wishlist: function() {
          return count_items();
        }
      });
    })();

    /* Wishlist */
    (wishlist = function() {
      return wishlist = $('.ct-wishlist');
    })();
  });
  $(window).on('scroll load', function() {
    var button_up, scroll;
    scroll = $(window).scrollTop();

    /* Percent */
    set_percent();

    /* Counter */
    set_counter();

    /* Navbar Class */
    if (device.mobile() && scroll > 75) {
      el_body.addClass('page-scrolled');
    } else if (!device.mobile() && scroll > 90) {
      el_body.addClass('page-scrolled');
    } else {
      el_body.removeClass('page-scrolled');
    }
    if ($('.ct-js-infinite').length) {
      $('.ct-js-infinite').each(function() {
        var offset, that;
        that = $(this);
        offset = parseInt(that.offset().top);
        if (that.visible()) {
          return that.trigger('click');
        }
      });
    }
    $('.ct-circular-progress').each(function() {});

    /* Button Scroll Up */
    (button_up = function() {
      var button;
      button = $('.ct-btn--scroll-up');
      if (scroll > $(window).height() * 1.5) {
        return button.addClass('visible');
      } else {
        return button.removeClass('visible');
      }
    })();
  });
  $(window).on('load', function() {
    var isotope_gallery, magnific_popup, preloader, read_more_wrapper, skroll;
    $('.flickr_badge_image a').each(function() {
      return $(this).attr('target', '__blank');
    });

    /* Magnific Popup Init */
    (magnific_popup = function() {
      var mfp_ajax, mfp_image, mfp_video;
      if ($().magnificPopup) {
        mfp_ajax = $('.mfp-ajax');
        mfp_image = $('.mfp-image');
        mfp_video = $('.mfp-video');
        mfp_ajax.magnificPopup({
          type: 'ajax'
        });
        mfp_image.magnificPopup({
          type: 'image',
          gallery: {
            enabled: true
          }
        });
        return mfp_video.magnificPopup({
          type: 'iframe'
        });
      }
    })();

    /* Party Read More */
    (read_more_wrapper = function() {
      var box;
      box = $('.ct-party-box--simple, .ct-feature-box');
      if (box.length) {
        return box.each(function() {
          return show_more($(this));
        });
      }
    })();

    /* Preloader */
    (preloader = function() {
      var spinner;
      preloader = $('.ct-preloader');
      spinner = preloader.find('.ct-preloader__spinner');
      if (preloader.length) {
        spinner.animate({
          opacity: 0
        }, 200, 'swing');
        return preloader.animate({
          opacity: 0
        }, 400, 'swing', function() {
          return preloader.remove();
        });
      }
    })();

    /* Isotope */
    (isotope_gallery = function() {
      if ($().isotope) {
        isotope_gallery = $('.ct-isotope-gallery');
        if (isotope_gallery.length) {
          return isotope_gallery.isotope({
            itemSelector: '.ct-isotope-item, .flickr_badge_image',
            percentPosition: true,
            masonry: {
              columnWidth: '.isotope-grid-sizer'
            }
          });
        }
      }
    })();

    /* Prevent "#" Clicks */
    $('[href="#"]').on('click', function(e) {
      e.preventDefault();
      return false;
    });

    /* Form Control Filled */
    $('.form-control').each(function() {
      var that;
      that = $(this);
      return that.on('change blur focus', function() {
        var value;
        value = that.val();
        if (value !== '') {
          return that.addClass('form-control--filled');
        } else {
          return that.removeClass('form-control--filled');
        }
      });
    });

    /* Skrollr */
    if (!device.mobile() && !device.tablet() && !el_html.hasClass('ie8')) {
      skroll = skrollr.init({
        forceHeight: false,
        smoothScrolling: false
      });
    }
  });
  $(window).on('load resize', function() {

    /* Magic Line */
    var magic_line;
    (magic_line = function() {
      var active, nav_item, navbar_nav;
      if (el_nav) {
        navbar_nav = $('.navbar-nav');
        nav_item = navbar_nav.find('.nav-item > a');
        navbar_nav.append('<li id="navbar-magic-line"></li>');
        active = navbar_nav.find('> .active');
        magic_line = $('#navbar-magic-line');
        if (active.length > 0) {
          magic_line.width(active.width()).css('left', active.position().left).data('origin_left', magic_line.position().left).data('origin_width', magic_line.width());
          $(window).on('scroll', function() {
            var left_position, new_active, new_width;
            new_active = navbar_nav.find('> .active');
            left_position = new_active.position().left;
            new_width = new_active.width();
            return magic_line.stop().animate({
              left: left_position,
              width: new_width
            }, 250);
          });
          nav_item.hover(function() {
            var left_position, new_width, that;
            that = $(this);
            left_position = that.parent().position().left;
            new_width = that.parent().width();
            return magic_line.stop().animate({
              left: left_position,
              width: new_width
            }, 250);
          }, function() {
            return magic_line.stop().animate({
              left: magic_line.data('origin_left'),
              width: magic_line.data('origin_width')
            }, 250);
          });
          return $('.dropdown-menu').hover(function() {
            var left_position, new_width, that;
            that = $(this).parent().find('>  a');
            left_position = that.parent().position().left;
            new_width = that.parent().width();
            return magic_line.stop().animate({
              left: left_position,
              width: new_width
            }, 250);
          }, function() {
            return magic_line.stop().animate({
              left: magic_line.data('origin_left'),
              width: magic_line.data('origin_width')
            }, 250);
          });
        }
      }
    })();
    return;
  });
})(jQuery);
