
jQuery(document).ready(function ($) {

   

  $('.tabs').click(function() {
    var classes = this.classList;
    //console.log($(this));
    //console.log(classes[0]);
    $('.drobdownTeam').each(function() {

      if ($(this).hasClass(classes[0])) {
        console.log('uraaaaa ?');
        $(this).slideToggle();
        $(this).addClass('dropdown-opened');

      } else {
        $(this).slideUp();
        // jQuery(this).removeClass('dropdown-opened');

        $('.tabs').not('.'+classes[0]).removeClass('dropdown-opened');
      }

    })
    $(this).toggleClass('dropdown-opened');
  })
    AOS.init({
          duration:700,
          offset:100
          
      });
      

    var maxHeight = 0;
    window.onresize = function() {
      dothis_resize();
    }
    function dothis_resize() {
      var maxHeight = 0;
      $('.box-info-hold').height('auto');
      $(".box-info-hold").each(function(){
         if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
      });
      console.log('uha');
      $(".box-info-hold").height(maxHeight);
      $('.tabs .row').height('auto');
      $(".tabs .row").each(function(){
         if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
      });
      console.log('uharow');
      $(".tabs .row").height(maxHeight);
    }
    
  dothis_resize();

  $('.quotes').slick({
      dots: true,
      arrows: false,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 6000,
      speed: 800,
      slidesToShow: 1,
      adaptiveHeight: true
  });
  $('.news-rotate').slick({
    dots: false,
    adaptiveHeight: true,
    infinite: true,
    speed: 800,
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: false,
    autoplay: false,
    autoplaySpeed: 6000,
    responsive: [
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
  var animation = 'rubberBand';
      
  $('.menu-icon').on('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      $('.header-menu').toggleClass('active-menu');
      $('.desktop-menu').toggleClass('show-menu');
      $(this).toggleClass('menu-icon--active');
      if ($(this).hasClass('menu-icon--active')) {
          //$('#menu-main-menu li').children('ul').hide();
          $('#menu-main-menu li').removeClass('clicked');
      }
  });
      
  $('.menu-icon').on('click', function () {
      $(this).addClass('animated ' + animation).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
      $(this).removeClass('animated ' + animation);
      });
  });

  // $('.main-menu li').not('.menu-item-object-custom').click(function (e) {
  //     $(this).addClass('clicked');
  //     $(this).closest('ul').find('.clicked').not(this).children('ul').slideUp();
  //     $(this).closest('ul').find('.clicked').not(this).removeClass('clicked');
  //     if ($(this).children('ul,p').is(':hidden') == true) {
  //         $(this).children('ul,p').slideToggle();
  //         e.preventDefault();
  //         return false;
  //     };
  // });
  // $('.menu-item-object-custom').click(function (e) {
  //     $(this).addClass('clicked');
  //     $('.menu-item-object-custom').not(this).removeClass('clicked');
  //     $('.menu-item-object-custom').not(this).find('.sub-menu').slideUp();
  //     $('.menu-item-object-custom').not(this).find('.sub-menu li').removeClass('clicked');
  //     if ($(this).children('ul,p').is(':hidden') == true) {
  //         $(this).children('ul,p').slideToggle();
  //         e.preventDefault();
  //         return false;
  //     };
  //     $('.header-menu').removeClass('active-menu');
  //     $('.desktop-menu').removeClass('show-menu');
  //     $('.menu-icon').removeClass('menu-icon--active');
  //     if ($(this).hasClass('clicked')) {
  //         $(this).children('ul,p').slideUp();
  //         $(this).removeClass('clicked');
  //         $(this).find('.sub-menu').slideUp();
  //         $(this).find('.sub-menu li').removeClass('clicked');
  //     };
  // });
  $('.header-content').click(function(e) {
      e.stopPropagation();
  });
  $('body,html').click(function(e) {
      // $('.desktop-menu').removeClass('show-menu');
      //$('.main-menu li').children('ul').slideUp();
      $('.main-menu li').removeClass('clicked');
  });

  $(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
      $('#back-to-top').fadeIn();
    } else {
      $('#back-to-top').fadeOut();
    }
  });
      // scroll body to 0px on click
  $('#back-to-top').click(function () {
    $('body,html').animate({
      scrollTop: 0
    }, 400);
    return false;
  });
  // NEWS BUTTON SHOW MORE WITH CALC OF COLUMN + WORK ON RESIZE
//       var maxCHeight = 0;
//       window.onresize = function() {
//         column_resize();
//       }

//   function column_resize() {
//     var maxCHeight = 0;
//     jQuery('.blogPostsLink').height('auto');
//     $(".blogPostsLink").each(function() {
//       if ($(window).width() > 767) {
//          if ($(this).height() > maxCHeight) { 
//             maxCHeight = $(this).height(); 
//             $('.row-current-height').css('height', maxCHeight * 3);
//         }
//       }
//       if ($(window).width() < 767) {
//          if ($(this).height() > maxCHeight) { 
//             maxCHeight = $(this).height(); 
//             $('.row-current-height').css('height', maxCHeight * 3);
//         }
//       }
       
//       $('.showMoreArticles').click(function () {
//           $('.row-current-height').addClass('full-h');
//           $('.showMoreArticles').hide();
//       });
//     });
//     console.log('eep');
//   }
//   column_resize();

  if ($(window).width() < 767) {
    $('.categories-title').append('<span class="lnr lnr-chevron-down"></span>');
    $('.categories-title').click(function(){
      $('.categories-title span').toggleClass('cat-opened');
      $('.cat-menu ul').slideToggle();
    })   
  }
  
//   News Blog On Click
    	jQuery('.row-current-height .calculate-col').hide();
    	jQuery('.row-current-height .calculate-col').slice(0,4).show();
        jQuery('.showMoreArticles').click(function () {
        	//jQuery('.row-current-height .calculate-col').addClass('aos-animate');
        	jQuery('.row-current-height .calculate-col').show();
        	$('.row-current-height .calculate-col').removeClass('aos-animate');
            	setTimeout(function() {
                $('.row-current-height .calculate-col').addClass('aos-animate');
            }, 400);
        	size_of_all_news = jQuery(".calculate-col:hidden").size();
        	console.log(size_of_all_news);
        	if (size_of_all_news === 0) {
        		jQuery('.showMoreArticles').hide();
        	}
        });
  
})
var tab_current_x=0;
var tabImages=[];
var oldtabImages=[];

tabImages[0] = "images/btn3-h.jpg";
tabImages[1] = "images/btn2-h.jpg";
tabImages[2] = "images/btn1-h.jpg";
jQuery(document).ready(function(){
	var selector = '#alltabs li a';
  jQuery(selector).on('click', function(){
      jQuery(selector).removeClass('active');
      jQuery(this).addClass('active');
  });
   
  jQuery('#alltabs li:first-child a').addClass('active');					   
						   
						  
						   
						   jQuery('#alltabs').find('a').each(function(n){
																 	
													oldtabImages.push(jQuery(this).find('img').eq(0).attr('src'));
													jQuery(this).attr('id','a_'+n);
													jQuery(this).bind('click',function(e){
																								  
													vanishAll();							  
													e.preventDefault();
																	
													jQuery('#alltabs').find('a').eq(tab_current_x).find('img').attr('src',oldtabImages[tab_current_x]);
													tab_current_x =  jQuery(this).attr('id').split("_")[1];							
													jQuery(this).find('img').eq(0).attr('src',tabImages[tab_current_x]);
													jQuery('.tabContent').eq(tab_current_x).fadeIn(1500);							
																									 
																									 
																									 });
																 
																 
																   })
						   
						    jQuery('#alltabs').find('a').eq(0).find('img').attr('src',tabImages[0])
						   });

function vanishAll()
{
  jQuery('.tabContent').hide();	
}

