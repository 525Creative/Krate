$(".open").click(function (event) {
	event.preventDefault();
	if ($(this).hasClass("isClosed")) {
		$(".content").animate({marginLeft: "275px"}, 200);


		$(function () {

			var $elie = $(".rotate");
			rotate(90);

			function rotate(degree) {
				// For webkit browsers: e.g. Chrome
				$elie.css({WebkitTransform: 'rotate(' + degree + 'deg)'});
				// For Mozilla browser: e.g. Firefox
				$elie.css({'-moz-transform': 'rotate(' + degree + 'deg)'});
			}
		});
		$(this).removeClass("isClosed");
	} else {
		$(".content").animate({marginLeft: "0px"}, 200);

		$(function () {

			var $elie = $(".rotate");
			rotate(0);

			function rotate(degree) {
				// For webkit browsers: e.g. Chrome
				$elie.css({WebkitTransform: 'rotate(' + degree + 'deg)'});
				// For Mozilla browser: e.g. Firefox
				$elie.css({'-moz-transform': 'rotate(' + degree + 'deg)'});
			}
		});

		$(this).addClass("isClosed");
	}
});


//this is a dirty fix. I will need to find a better way of doing this
$(".close-button").click(function () {
	$(".content").animate({'margin-left': '0px'}, 250);
	$(function () {

		var $elie = $(".rotate");
		rotate(0);

		function rotate(degree) {
			// For webkit browsers: e.g. Chrome
			$elie.css({WebkitTransform: 'rotate(' + degree + 'deg)'});
			// For Mozilla browser: e.g. Firefox
			$elie.css({'-moz-transform': 'rotate(' + degree + 'deg)'});
		}
	});

	$(this).addClass("isClosed");
});