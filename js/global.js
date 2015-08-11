(function($){

	
	$(".toggle-nav").click( function(){
		$(this).toggleClass('active');
		
	});

	// burger icon
	var Menu = {

		el: {
			ham: $('.menu'),
			menuTop: $('.menu-top'),
			menuMiddle: $('.menu-middle'),
			menuBottom: $('.menu-bottom')
		},

		init: function() {
			Menu.bindUIactions();
		},

		bindUIactions: function() {
			Menu.el.ham
			.on(
				'click',
				function(event) {
					Menu.activateMenu(event);
					event.preventDefault();
				}
				);
		},

		activateMenu: function() {
			Menu.el.menuTop.toggleClass('menu-top-click');
			Menu.el.menuMiddle.toggleClass('menu-middle-click');
			Menu.el.menuBottom.toggleClass('menu-bottom-click'); 
			$('.main-navigation').toggleClass("open");
		}
	};

	Menu.init();

	$(document).ready(function(){

		// need to be able to close this here
		$( ".overlay-close" ).click(function(e) {
			e.preventDefault();
			$('.main-navigation').removeClass("open");
			$(".toggle-nav").removeClass("active");
			$('.menu-top').removeClass('menu-top-click');
			$('.menu-middle').removeClass('menu-middle-click');
			$('.menu-bottom').removeClass('menu-bottom-click');

		});



	});


})(jQuery)