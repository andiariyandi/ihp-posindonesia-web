
   $(document).ready(function()
   {
     

      $("a[href*='#welcome']").click(function(event)
      {
         event.preventDefault();
         $('html, body').stop().animate({ scrollTop: $('#wb_welcome').offset().top }, 600, 'easeOutSine');
      });
      $("a[href*='#about']").click(function(event)
      {
         event.preventDefault();
         $('html, body').stop().animate({ scrollTop: $('#wb_about').offset().top }, 600, 'easeOutSine');
      });
      $("a[href*='#infoBlock3']").click(function(event)
      {
         event.preventDefault();
         $('html, body').stop().animate({ scrollTop: $('#wb_infoBlock3').offset().top }, 600, 'easeOutSine');
      });
      $("a[href*='#team']").click(function(event)
      {
         event.preventDefault();
         $('html, body').stop().animate({ scrollTop: $('#team').offset().top }, 600, 'easeOutSine');
      });
      $(document).on('click','.headerMenu-navbar-collapse.in',function(e)
      {
         if ($(e.target).is('a') && ($(e.target).attr('class') != 'dropdown-toggle'))
         {
            $(this).collapse('hide');
         }
      });
      function skrollrInit()
      {
         skrollr.init({forceHeight: false, mobileCheck: function() { return false; }, smoothScrolling: false});
      }
      skrollrInit();
      $("#RollOverText1").hover(function()
      {
         var y = $(this).height() - $(".caption", this).outerHeight();
         $(".caption", this).css("top", y);
         $(".caption", this).stop().animate({opacity: 0.60},{queue:false, duration:500});
      }, function()
      {
         $(".caption", this).stop().animate({opacity: 0},{queue:false, duration:500});
      });
      $("#RollOverText2").hover(function()
      {
         var y = $(this).height() - $(".caption", this).outerHeight();
         $(".caption", this).css("top", y);
         $(".caption", this).stop().animate({opacity: 0.60},{queue:false, duration:500});
      }, function()
      {
         $(".caption", this).stop().animate({opacity: 0},{queue:false, duration:500});
      });
      $("#RollOverText3").hover(function()
      {
         var y = $(this).height() - $(".caption", this).outerHeight();
         $(".caption", this).css("top", y);
         $(".caption", this).stop().animate({opacity: 0.60},{queue:false, duration:500});
      }, function()
      {
         $(".caption", this).stop().animate({opacity: 0},{queue:false, duration:500});
      });
      $("#RollOverText4").hover(function()
      {
         var y = $(this).height() - $(".caption", this).outerHeight();
         $(".caption", this).css("top", y);
         $(".caption", this).stop().animate({opacity: 0.60},{queue:false, duration:500});
      }, function()
      {
         $(".caption", this).stop().animate({opacity: 0},{queue:false, duration:500});
      });
      $("#RollOverText5").hover(function()
      {
         var y = $(this).height() - $(".caption", this).outerHeight();
         $(".caption", this).css("top", y);
         $(".caption", this).stop().animate({opacity: 0.60},{queue:false, duration:500});
      }, function()
      {
         $(".caption", this).stop().animate({opacity: 0},{queue:false, duration:500});
      });
      $("#RollOverText6").hover(function()
      {
         var y = $(this).height() - $(".caption", this).outerHeight();
         $(".caption", this).css("top", y);
         $(".caption", this).stop().animate({opacity: 0.60},{queue:false, duration:500});
      }, function()
      {
         $(".caption", this).stop().animate({opacity: 0},{queue:false, duration:500});
      });
   });
