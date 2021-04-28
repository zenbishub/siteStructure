function userModal(selector){
	
$("body").append("<div class='modal fade' id='loginModal' tabindex='-1' role='dialog' aria-labelledby='loginModalLabel' aria-hidden='true'><div class='modal-dialog' role='document'><div class='modal-content'><div class='modal-header'><h5 class='modal-title' id='loginModalLabel'>Login für internen / admin Bereich</h5><button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div><div class='modal-body' id='userlogin'></div><div class='modal-footer'></div></div></div></div>");

}

function checkLoginForm(){
	
  'use strict';
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
}
function userLogin(){
	
	$(".userlogin").click(function(){
		userModal("loginModal");
		$("#userlogin").load("view/userlogin.php",function(){
		checkLoginForm();
	});
	});
	
}
function dsvgoConfirm(){
	
		var elem = $(".dgsvo-container");
		setTimeout(function(){elem.animate({"opacity":"1"},400, function(){
			$("#dsgvo-yes").click(function(){
				$.post("model/actions.php",{dgsvoconfirm:1},function(d){
					console.log(d);
				if(d==="1"){
					elem.slideUp(600);
				}
					});
				});
			});
				$("#dsgvo-no").click(function(){
				$.post("model/actions.php",{dgsvoconfirm:2},function(d){
					console.log(d);
				if(d==="2"){
					elem.slideUp(600);
				}
					});
				});
		
			
			},5000);
			
	
}
function dsgvoCheck(){
	$.post("model/actions.php",{dgsvocheck:1},function(d){
		
		if(d!=="1"){
			dsvgoConfirm();
		}
		
		});
}
function loading(){
 $("body").append('<div class="modal fade show " id="loading" tabindex="-1" role="dialog" aria-labelledby="loading"style="display: block;" aria-modal="true"><div class="loading-spinner"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div></div>');
 
 setTimeout(function(){$("#loading").remove();},2000);
}
function onTop(){
	$("body").append('<span id="ontop" class="bg-secondary text-light rounded"> <i class="fa fa-arrow-up fa-fw"></i></span>');
	var triggerH = $(window).height()/1.5;
	 $(window).scroll(function() {
		if($(window).scrollTop() >= triggerH ) {
			$("#ontop").show();
		}
		if($(window).scrollTop() <= triggerH ) {
			$("#ontop").hide();
		}
	});
$("#ontop").click(function(){
	$('html, body').animate({scrollTop:0}, 'slow');
	});	
}
function naviToTop(){
	var navcont = $('#mainnavigation');
	var nav = $('#navcnt').offset().top;
	
	
	var range = parseInt(nav);
		$(window).scroll(function() {  
		//console.log(nav); 
  	//position of the ele w.r.t window
			if($(window).scrollTop() >= range ) {
			  $('#navcnt').removeClass('container').addClass('fixed-top').addClass("bg-dark").addClass("pl-3").addClass("pr-3");
			  navcont.addClass("container");
			} 
			else if($(window).scrollTop() <= range) {
			   $('#navcnt').removeClass('fixed-top').removeClass('bg-dark').addClass('container').removeClass("pl-3").removeClass("pr-3"); 
			   navcont.removeClass("container"); 
			}
	});
}
function searchHits(){
	$("#searchinput").on("keyup",function(){
		var inp = $(this);
		
		var countletter = inp.val().length;
		var hits = $("#hits");
		var val = inp.val();
		
		if(countletter>0){
			$.post("model/adm-actions.php",{searchstring:val},function(data){
				hits.html(data).show();
				var option = $("#hits > option");
				option.click(function(){
					var hit = $(this).val();
					var contentid = $("#contentid");
					var text = $(this).text();
					inp.val(text);
					contentid.val(hit);
					hits.html("").removeAttr("style");
				});
			});
		}
		if(countletter==0){
			hits.hide();
		}
	});
}

$(function(){
	userLogin();
	dsgvoCheck();
	loading();
	onTop();
	naviToTop();
	searchHits();
});