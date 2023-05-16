/**
 * @file
 * Global utilities.
 *
 */
(function ($, Drupal) {

  'use strict';

  Drupal.behaviors.consultancy_plus = {
    attach: function (context, settings) {
      $(document).ready(function(){ 
      // navbar-active class
      $( '.nav-sticky .navbar-nav .nav-item > a' ).on( 'click', function () {
        $( '.nav-sticky .navbar-nav' ).find( 'li.active' ).removeClass( 'active' );
        $( this ).parent( '.nav-item' ).addClass( 'active' );
      });
      // HAMBER ICON AND CLOSE ICON
      $('.hamber-icon').click(function(){
        $('.hamber-icon').addClass('dnone');
        $('.close-icon ').removeClass('dnone');
        
      });
      $('.close-icon').click(function(){
          $('.close-icon').addClass('dnone');
          $('.hamber-icon').removeClass('dnone');
      });
      // STICKY NAVBAR
      // $('#Check1').click(function(){
      //   if($(this).is(":checked")){
      //     $('.header_type .nav-sticky').addClass('header-fixed');
      //     $('#page_content').addClass('stick-page-header')
      //   }
      //   else if($(this).is(":not(:checked)")){
      //     $('.header_type .nav-sticky').removeClass('header-fixed');
      //   }
      // });
        // STICKY NAVBAR
      $(function () {
        $(document).scroll(function () {

          if($('#Check1').is(":checked")){
            var $nav = $(".header_type .nav-sticky");
            $('#page_content').addClass('stick-page-header')
            $nav.toggleClass("header-fixed", $(this).scrollTop() > 100);
          }
          else if($('#Check1').is(":not(:checked)")){
            var $nav = $(".header_type .nav-sticky");
            $nav.removeClass('header-fixed');
          }
        });
      });
        // HEADER 4 RESPONSIVE
        $('.hamber-icon').click(function(){
          $('.nav-sticky').toggleClass('header4-nav-bg');
          $('.header-contacts').toggleClass('header5-top-none');
          
      })
        // $('.hamber-icon.dnone').parent().parent().parent().parent().parent('.nav-sticky').addClass('newClass');
        $('.close-icon').click(function(){
          $('.nav-sticky').removeClass('header4-nav-bg');
          $('.header-contacts').removeClass('header5-top-none')

        })


        $('.dropdown-submenu').click(function(){

          $(this).toggleClass('act')
        })
        // Accordian

        $('.accordion-block .collapse').on('shown.bs.collapse', function(){
          $(this).parent().find(".svg-minus").removeClass("d-none").addClass("d-block");
          $(this).parent().find(".svg-plus").removeClass("d-block").addClass("d-none");
          $(this).parent().find(".content").addClass("acc");
          $(this).parent().addClass("acc-open");
          console.log(1);
        }).on('hidden.bs.collapse', function(){
            $(this).parent().find(".svg-plus").removeClass("d-none").addClass("d-block");
            $(this).parent().find(".svg-minus").removeClass("d-block").addClass("d-none");
            $(this).parent().removeClass("acc-open")
            // console.log(2);
        });

        // CODE_BLOCK
        var $code_block =  $("pre").attr("class");
        // console.log($code_block);
        if($code_block == "language-markup")
        {
        var elementCopy = document.getElementsByClassName("language-markup");
          if(typeof(elementCopy) != 'undefined' && elementCopy != null){ 
              var clipboard = new ClipboardJS('.clipboard');   
              clipboard.on('success', function (e) {
              e.trigger.textContent = 'Copied';
              window.setTimeout(function() {
                  e.trigger.textContent = 'Copy to Clipboard';
              }, 8000);
              console.log(e);
              });
              clipboard.on('error', function (e) {
              // console.log(e);
              });
          }
        }

        // carousels-1
        $(".carousels-1").owlCarousel({
          slideBy: 1,
          center:true,
          loop:true,
          margin: 10,
          nav: true,
          dots: false,
          navText: ['<div class="slider-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="88" height="150" viewBox="0 0 88 150"><path id="Path_40740" data-name="Path 40740" d="M88,136.591,74.578,150,0,75,74.653,0,88,13.409,26.694,75Z" fill="#1b1f29"/></svg> </div>', '<div class="slider-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="88" height="150" viewBox="0 0 88 150"><path  data-name="Path 40741" d="M0,13.409,13.422,0,88,75,13.347,150,0,136.591,61.306,75Z" fill="#1b1f29"/></svg></div>'],
          // autoHeight:true,
          // responsiveClass: true,
          responsive: {
            0:{
              items: 1,
            },
            480:{
              items: 1
            },
            769:{
              items: 1
            },
            1024:{
              items: 2
            }
          }
        });
        // carousels-2
        $(".carousels-2").owlCarousel({
          slideBy: 1,
          center:true,
          margin: 10,
          dots: true,
          navText: ['<div class="slider-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="88" height="150" viewBox="0 0 88 150"><path id="Path_40740" data-name="Path 40740" d="M88,136.591,74.578,150,0,75,74.653,0,88,13.409,26.694,75Z" fill="#1b1f29"/></svg> </div>', '<div class="slider-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="88" height="150" viewBox="0 0 88 150"><path  data-name="Path 40741" d="M0,13.409,13.422,0,88,75,13.347,150,0,136.591,61.306,75Z" fill="#1b1f29"/></svg></div>'],
          responsive: {
            0:{
              items: 1,
            },
            480:{
              items: 1
            },
            769:{
              items: 1
            },
            1024:{
              items: 1
            }
          }
        });

         // carousels-3
         $(".carousels-3").owlCarousel({
          slideBy: 1,
          margin: 30,
          dots: true,
          nav:false,
          // navText: ['<div class="slider-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="88" height="150" viewBox="0 0 88 150"><path id="Path_40740" data-name="Path 40740" d="M88,136.591,74.578,150,0,75,74.653,0,88,13.409,26.694,75Z" fill="#1b1f29"/></svg> </div>', '<div class="slider-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="88" height="150" viewBox="0 0 88 150"><path  data-name="Path 40741" d="M0,13.409,13.422,0,88,75,13.347,150,0,136.591,61.306,75Z" fill="#1b1f29"/></svg></div>'],
          responsive: {
            0:{
              items: 1,
            },
            480:{
              margin: 30,
              items: 2
            },
            769:{
              margin: 30,
              items: 2
            },
            1024:{
              margin: 30,
              items: 3
            },
            1200:{
              items: 3
            }
          }
        });
      // carousels-5
      $(".carousels-5").owlCarousel({
        slideBy: 1,
        margin: 10,
        autoplay:true,
        loop :true,
        dots: false,
        // nav:true,
        responsive: {
          0:{
            items: 1,
          },
          480:{
            items: 2
          },
          769:{
            items: 2
          },
          1024:{
            margin: 70,
            items: 3
          },
          1200:{
            margin: 80,
            items: 4
          }
        }
      });
      // carousels-6
      $(".carousels-6").owlCarousel({
        slideBy: 1,
        margin: 10,
        dots: false,
        nav:true,
        navText: ['<div class="slider-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="88" height="150" viewBox="0 0 88 150"><path id="Path_40740" data-name="Path 40740" d="M88,136.591,74.578,150,0,75,74.653,0,88,13.409,26.694,75Z" fill="#1b1f29"/></svg> </div>', '<div class="slider-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="88" height="150" viewBox="0 0 88 150"><path  data-name="Path 40741" d="M0,13.409,13.422,0,88,75,13.347,150,0,136.591,61.306,75Z" fill="#1b1f29"/></svg></div>'],
        responsive: {
          0:{
            items: 1,
          },
          480:{
            items: 1
          },
          769:{
            items: 1
          },
          1024:{
            margin: 10,
            items: 1
          },
          1200:{
            margin: 10,
            items: 1
          }
        }
      });
      // carousels-9
      $(".carousels-9").owlCarousel({
        slideBy: 1,
        margin: 15,
        dots: true,
        nav:true,
        navText: ['<div class="slider-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="88" height="150" viewBox="0 0 88 150"><path id="Path_40740" data-name="Path 40740" d="M88,136.591,74.578,150,0,75,74.653,0,88,13.409,26.694,75Z" fill="#1b1f29"/></svg> </div>', '<div class="slider-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="88" height="150" viewBox="0 0 88 150"><path  data-name="Path 40741" d="M0,13.409,13.422,0,88,75,13.347,150,0,136.591,61.306,75Z" fill="#1b1f29"/></svg></div>'],
        responsive: {
          0:{
            items: 1,
          },
          480:{
            items: 1
          },
          768:{
            items: 2
          },
          1024:{
            margin: 50,
            items: 2
          },
          1200:{
            margin: 50,
            items: 2
          }
        }
      });
      // carousels-10
      $(".carousels-10").owlCarousel({
        slideBy: 1,
        margin: 10,
        dots: true,
        nav:false,
        responsive: {
          0:{
            items: 1,
          },
          480:{
            items: 1
          },
          768:{
            items: 1
          },
          1024:{
            items: 1
          },
          1200:{
            items: 1
          }
        }
      });
      $(".carousels-testimonial-5").owlCarousel({
        slideBy: 1,
        margin: 30,
        autoplay:false,
        dots: false,
        nav:true,
        navText: ['<div class="slider-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="88" height="150" viewBox="0 0 88 150"><path id="Path_40740" data-name="Path 40740" d="M88,136.591,74.578,150,0,75,74.653,0,88,13.409,26.694,75Z" fill="#1b1f29"/></svg> </div>', '<div class="slider-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="88" height="150" viewBox="0 0 88 150"><path  data-name="Path 40741" d="M0,13.409,13.422,0,88,75,13.347,150,0,136.591,61.306,75Z" fill="#1b1f29"/></svg></div>'],
        responsive: {
          0:{
            items: 1,
          },
          480:{
            items: 1
          },
          768:{
            items: 1
          },
          1024:{
            items: 2
          },
          1200:{
            items: 2
          }
        }
      });
      // carousels-11
      $(".carousels-11").owlCarousel({
        slideBy: 1,
        margin: 30,
        dots: true,
        nav:false,
        responsive: {
          0:{
            items: 1,
          },
          480:{
            items: 1
          },
          768:{
            items: 2
          },
          1024:{
            items: 3
          },
          1200:{
            items: 3
          }
        }
      });
      // carousels-12
      $(".carousels-12").owlCarousel({
        slideBy: 2,
        margin: 1,
        autoplay:true,
        autoplayTimeout:1500,
        dots: false,
        loop:true,
        nav:false,
        responsive: {
          0:{
            items: 1,
          },
          480:{
            items: 2
          },
          768:{
            items: 2
          },
          1024:{
            items: 3
          },
          1200:{
            items: 3
          }
        }
      });
      // carousel-client
      $(".carousels-client").owlCarousel({
        slideBy: 2,
        margin: 1,
        autoplay:true,
        dots: false,
        loop:true,
        // autoplayTimeOut:1500,
        nav:false,
        // stagePadding:20,
        responsive: {
          0:{
            items: 1,
          },
          480:{
            items: 1,
            margin:0,
          },
          768:{
            items: 2
          },
          1024:{
            items: 4
          },
          1200:{
            items: 4
          }
        }
      });
      $(".carousels-client-3").owlCarousel({
        slideBy: 2,
        margin: 1,
        autoplay:true,
        dots: false,
        loop:true,
        // autoplayTimeOut:1000,
        nav:false,
        // stagePadding:20,
        responsive: {
          0:{
            items: 1,
          },
          480:{
            items: 1,
            margin:0,
          },
          768:{
            items: 2
          },
          1024:{
            items: 3
          },
          1200:{
            items: 3
          }
        }
      });
      // TOOLTIPS PAGE
      $(function(){
        $('[data-tooltip]').tooltip();
      })
      // Filter
      $('.portfolio .filtering').isotope({
        // options
        itemSelector: '.item',
        layoutMode: 'fitRows',
      });
      //Portfolio

      $('.masonry-1 .row').isotope({
        // options
        itemSelector: '.item1',
        masonry: {
            columnWidth: 1
         }
      });
      $('.masonry2 .row').isotope({
        // options
        itemSelector: '.item2',
        masonry: {
            columnWidth: 1
         }
      });
      // Portfolio filter
      $( '.portfolio .menu-link' ).on( 'click', function () {
        $( '.portfolio' ).find( 'li.active' ).removeClass( 'active' );
        $( this ).parent( 'li' ).addClass( 'active' );

        var selector = $(this).attr('data-filter');
        $('.filter-item').isotope({
            filter: selector
        });
        return false;
      });
    });
    // home-slider-1
    $(function(){
      var owl = $('.home-slider-1');
      owl.owlCarousel({
        autoplay: false,
        items:1,
        dots:true,
        // nav:true,
        // navText: ['<div class="arrows-left"><p><span></span></p></div>', '<div class="arrows-right"><p><span></span></p></div>'],
        loop: false,
        responsive: {
              0:{
                items: 1,
                nav:false,
                dots:true,
              },
              480:{
                items: 1,
                dots:true,
                nav: false,
              },
              769:{
                items: 1
              },
              1024:{
                items: 1
              }
            },
        onInitialized  : counter, //When the plugin has initialized.
        onTranslated : counter //When the translation of the stage has finished.
      });
      
        function counter(event) {
          //  var element   = event.target;         // DOM element, in this example .owl-carousel
          //   var items     = event.item.index + 2;     // Number of items
            var item      = event.item.index + 1;     // Position of the current item
            // var las = event.item.index.lastChild;
            // var pre = event.item.index - 1;
            
            $('.home-slider-1 .owl-dot span').html("<p>"+"0"+item+"</p>");
          
        }
      });

           // home-slider-2
           $(".home-slider-2").owlCarousel({
            slideBy: 1,
            margin: 0,
            dots: false,
            nav:true,
            // rewind: true,
            navText: ['<div class="arrows-left"><svg xmlns="http://www.w3.org/2000/svg" width="150" height="88" viewBox="0 0 150 88"><path id="Path_40742" data-name="Path 40742" d="M0,13.409,13.422,0,88,75,13.347,150,0,136.591,61.306,75Z" transform="translate(150) rotate(90)" fill="#1b1f29"/></svg></div>', '<div class="arrows-right"><svg xmlns="http://www.w3.org/2000/svg" width="150" height="88" viewBox="0 0 150 88"><path id="Path_40742" data-name="Path 40742" d="M0,13.409,13.422,0,88,75,13.347,150,0,136.591,61.306,75Z" transform="translate(150) rotate(90)" fill="#1b1f29"/></svg></div>'],
            // stagePadding:20,
            responsive: {
              0:{
                items: 1,
              },
              480:{
                items: 1
              },
              768:{
                items: 1
              },
              1024:{
                items: 1
              },
              1200:{
                items: 1
              }
            }
          });


          // home-slider-3
          $(".home-slider-3").owlCarousel({
            slideBy: 1,
            margin: 0,
            dots: false,
            nav:true,
            // rewind: true,
            navText: ['<div class="arrows-left"><svg xmlns="http://www.w3.org/2000/svg" width="150" height="88" viewBox="0 0 150 88"><path id="Path_40742" data-name="Path 40742" d="M0,13.409,13.422,0,88,75,13.347,150,0,136.591,61.306,75Z" transform="translate(150) rotate(90)" fill="#1b1f29"/></svg></div>', '<div class="arrows-right"><svg xmlns="http://www.w3.org/2000/svg" width="150" height="88" viewBox="0 0 150 88"><path id="Path_40742" data-name="Path 40742" d="M0,13.409,13.422,0,88,75,13.347,150,0,136.591,61.306,75Z" transform="translate(150) rotate(90)" fill="#1b1f29"/></svg></div>'],
            // stagePadding:20,
            responsive: {
              0:{
                items: 1,
              },
              480:{
                items: 1
              },
              768:{
                items: 1
              },
              1024:{
                items: 1
              },
              1200:{
                items: 1
              }
            }
          });
          // home-slider-4
          $(".home-slider-4").owlCarousel({
            slideBy: 1,
            margin: 0,
            autoplay: true,
            loop:true,
            dots: false,
            nav:true,
            navText: ['<div class="arrows-left"><svg xmlns="http://www.w3.org/2000/svg" width="150" height="88" viewBox="0 0 150 88"><path id="Path_40742" data-name="Path 40742" d="M0,13.409,13.422,0,88,75,13.347,150,0,136.591,61.306,75Z" transform="translate(150) rotate(90)" fill="#1b1f29"/></svg></div>', '<div class="arrows-right"><svg xmlns="http://www.w3.org/2000/svg" width="150" height="88" viewBox="0 0 150 88"><path id="Path_40742" data-name="Path 40742" d="M0,13.409,13.422,0,88,75,13.347,150,0,136.591,61.306,75Z" transform="translate(150) rotate(90)" fill="#1b1f29"/></svg></div>'],
            responsive: {
              0:{
                items: 1,
              },
              480:{
                items: 1
              },
              768:{
                items: 1
              },
              1024:{
                items: 1
              },
              1200:{
                items: 1
              }
            }
          });
          // HOME SLIDER 5
          $(function(){
            var owl = $('.home-slider-5');
            owl.owlCarousel({
              autoplay: false,
              items:1,
              
              dots:false,
              nav:true,
              navText: ['<div class="arrows-left"><p><span></span></p></div>', '<div class="arrows-right"><p><span></span></p></div>'],
              loop: false,
              responsive: {
                    0:{
                      items: 1,
                     
                    },
                    480:{
                      items: 1,
                      
                    },
                    769:{
                      items: 1
                    },
                    1024:{
                      items: 1
                    }
                  },
              onInitialized  : counter, 
              onTranslated : counter 
            });
            
            function counter(event) {
               var element   = event.target;         // DOM element, in this example .owl-carousel
                var items     = event.item.index + 2;     // Number of items
                var item      = event.item.index ;     // Position of the current item
                var las = event.item.index.lastChild;
                var pre = event.item.index - 1
                var item = items-1
              // it loop is true then reset counter from 1
              if(item > items) {
                item = item - items
              }
              
             
              if (item > element) {
                $('.home-slider-5 .arrows-right span').html("");
              }
               else if (item == "1") {
                $('.home-slider-5 .arrows-left span').html("00");
                $('.home-slider-5 .arrows-right span').html('0'+items);
              }
              else if (item == las){
                $('.home-slider-5 .arrows-right span').html('00');
    
              }
              else{
                
                $('.home-slider-5 .arrows-left span').html('0'+item);
                $('.home-slider-5 .arrows-right span').html('0'+items);
                }
                $('.home-slider-5 .owl-next.disabled .arrows-right span').html("00")
            }
            $('.home-slider-5 .owl-next').click(function(){
              $('.home-slider-5 .arrows-left span').html(item);
            })
            $('.home-slider-5 .owl-next.disabled .arrows-right span').html("00")
            });
                // COMING SOON PAGE
          // var $coming_soon =  $(".coming-soon #timer-wrapper").attr("class");
          // if($coming_soon == "timer-wrapper"){
          //     let dayItem = document.querySelector("#day");
          //     let hourItem = document.querySelector("#hour");
          //     let minuteItem = document.querySelector("#minute");
          //     let secondItem = document.querySelector("#second");
          //     let comingEndDate = document.querySelector('.comming-soon-date').innerHTML
          //     let comme = comingEndDate.replace('-'," ")
          //     let dates = comme.replace('-'," ")
          //     let countDown = () =>{
          //         let futureDate = new Date(dates);
          //         let currentDate = new Date();
          //         let myDate = futureDate - currentDate;

          //         let days = Math.floor(myDate / 1000 / 60 / 60 /24);
          //         let hours = Math.floor(myDate / 1000 / 60 / 60) % 24;
          //         let minutes = Math.floor(myDate / 1000 / 60) % 60;
          //         let seconds = Math.floor(myDate / 1000) % 60;

          //         dayItem.innerHTML = days;
          //         hourItem.innerHTML = ('0'+hours).slice(-2);
          //         minuteItem.innerHTML =('0'+ minutes).slice(-2);
          //         secondItem.innerHTML =('0'+ seconds).slice(-2);
          //         console.log(days)
          //         if (days <= 0) {
          //           clearInterval(timeinterval);
          //           document.getElementById("clockdiv").innerHTML = settings.custom_message_dateExpired;
          //         }
          //     }
               
          //     countDown()
          //     setInterval(countDown, 1000)
          //   }
          //   else{
          //     console.log("Error");
          //   }
            function getTimeRemaining(endtime) {
              var t = Date.parse(settings.custom_date) - Date.parse(new Date());
              var seconds = Math.floor((t / 1000) % 60);
              var minutes = Math.floor((t / 1000 / 60) % 60);
              var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
              var days = Math.floor(t / (1000 * 60 * 60 * 24));
              return {
                'total': t,
                'days': days,
                'hours': hours,
                'minutes': minutes,
                'seconds': seconds
              };
            }
            function initializeClock(id, endtime) {
              var clock = document.getElementById(id);
              var daysSpan = clock.querySelector('.days');
              var hoursSpan = clock.querySelector('.hours');
              var minutesSpan = clock.querySelector('.minutes');
              var secondsSpan = clock.querySelector('.seconds');
              function updateClock() {
                var t = getTimeRemaining(endtime);
                daysSpan.innerHTML = t.days;
                hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
                minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
                secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);
                if (t.total <= 0) {
                  clearInterval(timeinterval);
                  document.getElementById("clockdiv").innerHTML = settings.custom_message_dateExpired;
                }
              }
              updateClock();
              var timeinterval = setInterval(updateClock, 1000);
            }
            var deadline = new Date(Date.parse(new Date()));
            if ($("#clockdiv").length) {
              initializeClock('clockdiv', deadline);
            }
            // GO TO TOP
            $(document).scroll(function(){
             if( $(this).scrollTop() > 100){
              $(".back-to-top").fadeIn()
             }
             else {
              $(".back-to-top").fadeOut()
             }
            })
            $(".back-to-top").click(function(){
              $('html,body').animate({
                scrollTop:0
            },100)
            })
      // Back to top
      $(window).scroll(function () {
          if ($(this).scrollTop() > 100) {
              $('.scroll-top').fadeIn();
          } else {
              $('.scroll-top').fadeOut();
          }
      });
      $('.scroll-top').click(function () {
          $("html, body").animate({
              scrollTop: 0
          }, 100);
          return false;
      });

      function validate(){
        var cnv = $('form.comment-form textarea').val();
        if (!$.trim(cnv)) {
          $(once('comment_validate','form.comment-form textarea')).after('<strong class="error">This field is required</strong>');
            return false;
        } else { return true; }
      }
      $(once('commentform_validate','form.comment-form')).submit(validate);

        //Job form Validation
        $(window).on('load',function(){
          var element = document.querySelector(".career-list .modal .error");
          if(element){
            // console.log(element);
            do {
              element = element.parentElement;
            } while (!$(element).hasClass('modal'));
            var id = $(element).attr('id');
            console.log(id);
            var myModal = new bootstrap.Modal(document.getElementById(id), {
              keyboard: false
            });
            var modalToggle = document.getElementById(id) // relatedTarget
            myModal.show(modalToggle);
          }
        });

        $(".alerts-block .close").click(function(){
          $(this).parent(".alert-area").fadeOut();
      })
        // Page Loader
        $(window).on('load', () => {
          $('#loading').fadeOut();
          $('.canvas').delay(350).fadeOut('slow', function() {
            $(this).remove();
          });
          $('body').delay(350).css({'overflow':'visible'});
        });
      
      }
      
    
  };

})(jQuery, Drupal);
