$(document).ready( function () {
	displayMenu();
	displayHomeStyle();
})

function displayMenu() {
 	$('.header-container .banner .menu-icon').on('click', function(){
		$('.header-container .nav-bar').css('display', 'block');
	});

	$('.header-container .nav-bar .close-icon').on('click', function(){
		$('.header-container .nav-bar').css('display', 'none');
	});
} 

function displayHomeStyle() {
	$('.header-container .nav-bar .house .daytorole-link').on('click', function() {
		$('.header-container .nav-bar .house .home-icon').attr('src', './images/house-active.png');
	});

	$('.header-container .nav-bar .house .daytorole-link').on('mouseover focusin', function() {
		$('.header-container .nav-bar .house .home-icon').attr('src', './images/house-hover.png');
	});

	$('.header-container .nav-bar .house .daytorole-link').on('mouseout focusout', function() {
		$('.header-container .nav-bar .house .home-icon').attr('src', './images/house.png');
	});
}