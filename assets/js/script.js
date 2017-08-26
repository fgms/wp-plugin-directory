var gd = {};
function get_ajax_directory(){
  jQuery.ajax({
      type: 'post',
      url: ajax_url,
      data: {
        action : 'gd_ajax_handler'
      },
      success: function(response){
          console.log('The server responded: ' + response);
      }
    }
  );
}
jQuery(function($) {



  //google fonts
  WebFontConfig = {	google: { families: [ 'Open+Sans:400,300,700:latin' ] } };
  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })();

  gd.updateImages();
  gd.get_ajax_data_onscreen();
	//$('#image-side-scroll').css( { 'background-image': 'url("/assets/images/background.jpg")'});
  gd.analytics();
  // Sidebar Toggle
  $('.btn-navbar').click( function() {  $('html').toggleClass('expanded'); });

  // this is for smooth scrolling
  if ((typeof smoothScroll === 'object') && ( typeof smoothScroll.init() === 'function')){
    smoothScroll.init();
  }
  var cach_lasttop;
  var thisScrollTop = 0;
	var lastAnimate = 0;
	var animating_flag= false;
	var animate_position = -100;
	var touchEvent_flag = false;
  $(window).scroll(function(){
    var lasttop;
    var win_height = $(window).outerHeight();

    $('.module').each(function(){
      var id = $(this).attr('id');
      $('#' + id).isOnScreen(function(deltas){
        if ( (  deltas.top - win_height > -10 )   ) {
          lasttop = id;
          var top  = $('#'+lasttop).offset().top;
        }
      })
    });
    if (cach_lasttop !== lasttop){
      $('#nav li.active').removeClass('active');
    }
    $('a[href="#'+lasttop+'"]').closest('li').addClass('active');
    cach_lasttop = lasttop;

    // this is for sidebar images parallaxing
    var side_image_top = $(window).scrollTop() * 0.4 + $('#image-sdie-scroll').outerHeight();
    if (( Math.abs(($(window).scrollTop()) - thisScrollTop) > 400) && touchEvent_flag )  {
      $('#image-side-scroll').animate({'opacity' : 0.1}, 1000, function()  {
        $('#image-side-scroll').css({ 'transform': 'translate(0px,-'+side_image_top+'px)','-webkit-transform': 'translate(0px,-'+side_image_top+'px)'})
        $('#image-side-scroll').animate({'opacity' : 1},2000, 'easeInExpo')
      })
    }
    else  {
      $('#image-side-scroll').css({ 'transform': 'translate(0px,-'+side_image_top+'px)','-webkit-transform': 'translate(0px,-'+side_image_top+'px)'})
    }
    lastScrollTop = thisScrollTop ;
  })




/*


  mywindow.scroll(function ()
  	{

  		get_ajax_data_onscreen();


  		$('#last-animate').html($('#body-scroll').outerHeight());
  		$('#scroll-top-off').html(Math.abs((mywindow.scrollTop()) - thisScrollTop));

  		var side_image_top = mywindow.scrollTop() * 0.4 + $('#image-sdie-scroll').outerHeight();
  		if (( Math.abs((mywindow.scrollTop()) - thisScrollTop) > 400) && touchEvent_flag )
  		{
  			$('#image-side-scroll').animate({'opacity' : 0.1}, 1000, function()
  			{
  				$('#image-side-scroll').css({ 'transform': 'translate(0px,-'+side_image_top+'px)','-webkit-transform': 'translate(0px,-'+side_image_top+'px)'})
  				$('#image-side-scroll').animate({'opacity' : 1},2000, 'easeInExpo')
  			})

  		}
  		else
  		{
  			$('#image-side-scroll').css({ 'transform': 'translate(0px,-'+side_image_top+'px)','-webkit-transform': 'translate(0px,-'+side_image_top+'px)'})
  		}
  		// this is used to determin direction
  		thisScrollTop = $(this).scrollTop();
  		touchEvent_flag = false;

  		// this code is used to scroll to section when using scroll bar
  		if (chrome_flag) return;
  		$('.section').each(function()
  		{
  			var pos = $(this).offset().top - $(window).scrollTop();
  			if (((pos > 55) || ( pos < -55)) && !transition_flag)
  			{
  				$(this).removeClass('active');
  			}
  			//scroll up
  			if (lastScrollTop > thisScrollTop)
  			{
  				if  ((pos < 0) && (pos > -50) && (!$(this).hasClass('active')))
  				{
  					//console.log('position for '+ $(this).attr('id') + ' top ' + pos);
  					goToByScroll($(this).attr('data-section'), false);
  				}
  			}
  			//scroll down
  			else
  			{
  				if  ((pos > 0) && (pos < 50) && (!$(this).hasClass('active')))
  				{
  					//console.log('position for '+ $(this).attr('id') + ' top ' + pos);
  					goToByScroll($(this).attr('data-section'), false);
  				}
  			}


  		})
  		lastScrollTop = thisScrollTop ;
  		$(window).trigger('touchmove');

      });



*/


});


gd.updateImages = function() {
  var $ = jQuery;
  var $cwrapper = $('.directory-content');
  var $pwrapper = $('.ads');
  if ($('.ads').length > 0)  {
    this.imagesLoaded($('.ads img'), function(e, msg){
      if ($(window).outerWidth() > 768 ) {
        var multiplier = 0.8;
        //console.log('cwrap',$cwrapper.outerHeight(),'pwrap', $pwrapper.outerHeight(), 'cwrap/mult', $cwrapper.outerHeight()/multiplier);
        var repeat = Math.ceil($cwrapper.outerHeight()/multiplier / $pwrapper.outerHeight());
        if (repeat >= 1) {
            var $pChildren = $pwrapper.children();
            for ( i = 0; i < repeat; ++i) {
                $pChildren.clone().appendTo($pwrapper);
            }
        }
        if (typeof $().smoothZoom === 'function'){
          $('.directory-ad a img').smoothZoom({ navigationRight: '<i class=\"fa fa-angle-right\"></i>', navigationLeft: '<i class=\"fa fa-angle-left\"></i>', debug: false,'navigationButtons': false});
        }
      }
      else {
         if ( ($('.ads.directory-ad').length > 0) && ( $('#ads-for-768').length > 0) ){
            var $ads = $('.ads.directory-ad').children('.has-ad').clone();
            $ads.appendTo('#ads-for-768');
            $('.has-ad a').each(function(){
                $(this).attr('href', $(this).attr('href')+'&resources=true');
            });
         }
      }
    });
  }
}
gd.imagesLoaded = function($, fn) {
  var c = $.length;
  var msg = [];
	$.each(function(){
	  if (this.complete) {
  		--c;
  		if (c === 0) { fn({ e : { type: ''}},msg); }
	  }
	});
  $.on('load',action);
  $.on('error',action);
  function action(e){
    --c;
    if (e.type === 'error') {
        msg.push('Error Loading.. ' + e.target.src);
    }
    if (c === 0) { fn(e,msg); }
  }
}

gd.analytics = function() {
  var $ = jQuery;
  $('body').on('click','a:not(.sz-zoomed),button,input[type="submit"], .navigation li', function(){
     var gaCategory = $(this).closest('*[data-ga-category]').attr('data-ga-category');
     var gaAction = 'Link';
     if (($(this).hasClass('btn')) || ($(this).is('button'))){
        gaAction = 'Button';
     }
     if ($(this).hasClass('accordion-toggle')) {
        gaAction = 'Accordion'
     }
     var gaLabel = $(this).attr('data-ga-label');
     if ( (gaLabel == undefined) || (gaLabel.length == 0) ) {
        if ($(this).attr('data-activity') != undefined) {
         gaLabel = $(this).attr('data-activity');
        }
        else if ($(this).attr('data-title') != undefined) {
         gaLabel = $(this).attr('data-title');
        }
        // if this is a form lets get all the form data as label
        else if ($(this).closest('*[data-ga-category]').is('form')){
         gaLabel = $(this).closest('*[data-ga-category]').serialize();
        }
        else {
         gaLabel = $(this).text() ;
        }
     }
     if (gaCategory != undefined) {
       //console.log('Category: '+gaCategory+"\nAction: "+gaAction+"\nLabel: "+gaLabel);
       if (typeof ga === 'function') {
         ga('send', 'event', gaCategory, gaAction, gaLabel );
       }
       else {console.warn('Analytics Error - Cant track Event')}
     }
     else {
        console.warn('Analytics Error - No Category Defined ')
     }
  });
}
gd.get_ajax_data_onscreen = function () {
  var $ = jQuery;
  return;
  if (($('.section[data-section="5"]').isOnScreen() ) && ( $('html').data('section5_loaded') != true))
  {
    load_wp_module({post_type : 'activity', chunk : 'wp_onsite_dining_detail'},'#onsite-activities-ajax');
    ga('send','event','OnScreen','Show Content','Activities')
    $('html').data('section5_loaded',true);
  }
  if (($('.section[data-section="6"]').isOnScreen() ) && ( $('html').data('section6_loaded') != true))
  {
    load_wp_module({post_type : 'dining', permalink : 'sunset-cafe', chunk : 'wp_onsite_dining_detail'},'#onsite-dining-ajax');
    ga('send','event','OnScreen','Show Content','Dining')
    $('html').data('section6_loaded',true);
  }
  if (($('.section[data-section="8"]').isOnScreen() ) && ( $('html').data('section8_loaded') != true))
  {
    load_wp_module({post_type : 'condo-sales', chunk : 'wp_condo_sales_index'},'#condo-sales-table tbody');
    ga('send','event','OnScreen','Show Content','Condo Sales')
    $('html').data('section8_loaded',true);
  }
}

!function(a){a.fn.isOnScreen=function(b){var c=this.outerHeight(),d=this.outerWidth();if(!d||!c)return!1;var e=a(window),f={top:e.scrollTop(),left:e.scrollLeft()};f.right=f.left+e.width(),f.bottom=f.top+e.height();var g=this.offset();g.right=g.left+d,g.bottom=g.top+c;var h={top:f.bottom-g.top,left:f.right-g.left,bottom:g.bottom-f.top,right:g.right-f.left};return"function"==typeof b?b.call(this,h):h.top>0&&h.left>0&&h.right>0&&h.bottom>0}}(jQuery);
