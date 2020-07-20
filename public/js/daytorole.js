$(document).ready( function () {
	displayMenu();
	addActiveClass();
	displayHomeStyle();
	scrollBackToTop();
})

$(function () {
  $('[data-toggle="tooltip"]').tooltip();
})

function displayMenu() {
 	$('.header-container .banner .menu-icon').on('click', function(){
		$('.header-container .nav-bar').css('display', 'block');
	});

	$('.header-container .nav-bar .close-icon').on('click', function(){
		$('.header-container .nav-bar').css('display', 'none');
	});
} 

function addActiveClass() {
    var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/"));
    $(".nav-bar ul li a").each(function(){
        if($(this).attr("href") == pgurl || $(this).attr("href") == '' ) {
        	$(this).addClass("active");
        }      
    })
};


function displayHomeStyle() {
	if ($('.header-container .nav-bar .house .daytorole-link').hasClass('active')) {
		$('.header-container .nav-bar .house .home-icon').attr('src', '/images/house-hover.png');
	}

	$('.header-container .nav-bar .house .daytorole-link').on('mouseover focusin', function() {
		$('.header-container .nav-bar .house .home-icon').attr('src', '/images/house-hover.png');
	});
	
	$('.header-container .nav-bar .house .daytorole-link').on('click', function() {
		$('.header-container .nav-bar .house .home-icon').attr('src', '/images/house-active.png');
	});

	$('.header-container .nav-bar .house .daytorole-link').on('mouseout focusout', function() {
		$('.header-container .nav-bar .house .home-icon').attr('src', '/images/house.png');
	});
}

function scrollBackToTop() {
	var btn = $('#top-btn');

	$(window).scroll(function() {
	  if ($(window).scrollTop() > 300) {
	    btn.addClass('show');
	  } else {
	    btn.removeClass('show');
	  }
	});

	btn.on('click', function(e) {
	  e.preventDefault();
	  $('html, body').animate({ scrollTop: 0 }, '300');
	});
} 
