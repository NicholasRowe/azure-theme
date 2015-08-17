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


		$("#commentform :input").each(function(index, elem) {
			var eId = $(elem).attr("id");
			var label = null;
			if (eId && (label = $(elem).parents("form").find("label[for="+eId+"]")).length == 1) {
				$(elem).attr("placeholder", $(label).text());
	        // uncomment if you want to remove the label
	        // it's best practive to keep the label, just visually hide it
	        //$(label).remove();
		    }
		});

		



	});


})(jQuery)