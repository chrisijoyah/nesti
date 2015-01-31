$(function(){
	
    $('.slider').noUiSlider({
      start: [ 200, 600 ],
      step: 10,
      range: {
        'min': 0,
        'max': 2000
      }
    });

$(".slider").Link('lower').to($('#rent-min'));
$(".slider").Link('upper').to($('#rent-max'));

	$('.amenity-btn').click(function(){
    var new_class = $(this).attr('data-class') + '-selected';
		$(this).toggleClass(new_class);
		//var amenity = $(this).attr('data-amenity');
		//window.location = '?amenity[]=' + amenity;
	});


});

