jQuery.fn.clickToggle = function(a, b) {
  return this.on("click", function(ev) { [b, a][this.$_io ^= 1].call(this, ev) })
};
function uploadBackground(){
	
	$('form').click(function(){
		var form = $(this);
		
		form.unbind("click").submit(function(e) {	
	 	e.preventDefault();
			if($('#progress-div').length<1){
				$("<div id=\"progress-div\"><div id=\"progress-bar\"></div></div>").insertBefore(form);
				$("#progress-div").css({
					"background-color":"#fff",
					"padding":"0.1em 0em",
					"font-weight":"bold",
					"text-align":"center",
					"color": "#fff",
					"border":"1px solid #ccc"
				});
				$("#progress-bar").css({
					"background-color": "#12CC1A",
					"color": "#FFFFFF",
					"width": "0%",
					"margin": "0",
					"padding": "0",
					"-webkit-transition": "width .3s",
					"-moz-transition": "width .3s",
					"transition": "width .3s"
				});
			}
			
		$(this).ajaxSubmit({ 
		beforeSubmit: function() {$("#progress-bar").width('0%');},
		uploadProgress: function (event, position, total, percentComplete){	
			$("#progress-bar").width(percentComplete + '%');
			$("#progress-bar").html('<div id="progress-status"></div>');
			if(percentComplete>3){
				$("#progress-status").text(percentComplete +' %');
			}
			$("#progress-status").css({
				"background-color": "transparent",
				"padding": "0.1em 0em",
				"font-weight": "bold",
				"text-align": "center",
				"color": "#fff"
		});
		},
		resetForm: true, 								
		success:function() {
			location.href=location.href;
		}
			}); 
			
		});
	});
	
}
function deleteDialog(data){
	
$("body").append("<div id='dialog-confirm' title='Bitte löschen bestätigen!'><p><span class='ui-icon ui-icon-alert' style='float:left; margin:12px 12px 20px 0;'></span>Dieser Eintrag wird komplett gelöscht. Sind Sie sicher?</p></div>");
	$( "#dialog-confirm" ).dialog({
      resizable: false,
      height: "auto",
      width: 400,
      modal: true,
      buttons: {
        "ja": function() {
		$.post("../model/actions.php",{deleteEntry:1,id:data[0],tb:data[1]},function(){
			location.href=location.href;
		//$( this ).dialog( "close" );
		});
          
        },
        nein: function() {
          $( this ).dialog( "close" );
        }
      }
    });	
}
function activeDialog(action,data){
	console.log(action);
	var frage;
	if(action==1){
		frage = "Eintrag wird für Anzeige aktiviert ";
	}
	else if(action==2){
		frage = "Eintrag wird für Anzeige deaktiviert ";
	}
	else{
	frage = "Bitte bestätigen!";
	}
$("body").append("<div id='dialog-confirm' title='Bitte bestätigen!'><p><span class='ui-icon ui-icon-alert' style='float:left; margin:12px 12px 20px 0;'></span>"+frage+"</p></div>");
	$( "#dialog-confirm" ).dialog({
      resizable: false,
      height: "auto",
      width: 400,
      modal: true,
      buttons: {
        "ja": function() {

		$.post("../model/actions.php",{activeEntry:action,id:data[0],tb:data[1]},function(){
			location.href=location.href;
		//$( this ).dialog( "close" );
		});
          
        },
        nein: function() {
          $( this ).dialog( "close" );
        }
      }
    });	
}
function changeDialog(form){
	
$("body").append("<div id='dialog-confirm' title='Bitte Änderung bestätigen!'><p><span class='ui-icon ui-icon-alert' style='float:left; margin:12px 12px 20px 0;'></span>Achtung die Änderung beeinflüsst die Anzeige der Formelemente. Sind Sie sicher?</p></div>");
	$( "#dialog-confirm" ).dialog({
      resizable: false,
      height: "auto",
      width: 400,
      modal: true,
      buttons: {
        "ja": function() {
			form.submit();
		$( this ).dialog( "close" );
        },
        nein: function() {
          $( this ).dialog( "close" );
        }
      }
    });	
}
function changeDialog2(data){
	
$("body").append("<div id='dialog-confirm' title='Bitte Änderung bestätigen!'><p><span class='ui-icon ui-icon-alert' style='float:left; margin:12px 12px 20px 0;'></span>Achtung die Änderung beeinflüsst die Anzeige der Formelemente. Sind Sie sicher?</p></div>");
	$( "#dialog-confirm" ).dialog({
      resizable: false,
      height: "auto",
      width: 400,
      modal: true,
      buttons: {
        "ja": function() {
		$.post("../model/actions.php",{removeTypeFile:1,tb:data[0],column:data[1],value:data[2]},function(d){
			console.log(d);
			location.href=location.href;
		});
        },
        nein: function() {
          $( this ).dialog( "close" );
        }
      }
    });	
}
function editNavicons(){
	$(".edit-navicons").click(function(){
		var vals = $(this).attr("alt").split("-");
		location.href="../model/actions.php?setToNavi="+vals[0]+"&prop="+vals[1]+"&column="+vals[2];
		});
}
function deleteEntry(){
	$(".edit-item-bar-trash").click(function(){
		var data = $(this).attr("alt").split("-");
		deleteDialog(data);
	});
	
}
function activOrNotEntry(){
	$(".edit-item-bar-active").click(function(){
		var data = $(this).attr("alt").split("-");
		var status = $(this).children("i").hasClass("fa-toggle-on");
		var action;
		console.log(status);
		if(status===true){
			action = 2;
		}
		if(status===false){
			action = 1;
		}
		activeDialog(action,data);
	});
}
function removeTypefile(){
	$(".remove-file").click(function(){
		var data = $(this).attr("alt").split("-");
		
		changeDialog2(data);
	});
	
}
function changeEntry(form){
		changeDialog(form);
		return false;
}
function orderPages(){
 $(".orderpages,.container-entries, .tb-columns").sortable();
}
function savePageOrder(){
	$(".savepageorder").click(function(){
		var elem = $(this);
		var items = $(".itemsintable");
		
		$.each(items,function(i){
			var id=$(this).attr("alt");
			var tb = $(this).attr("title");
			var sortid = parseInt(i+1);
			$.post("../model/actions.php",{savepageorder:1,id:id,sortid:sortid,tb:tb},function(d){
				console.log(d);
			$(".meldung").remove();
			$("<div class='col meldung'><div class='alert alert-success text-center' role='alert'></div></div>").insertBefore(elem);
			$(".alert-success").text(sortid+" Reihenfolge gespeichert");
				});
				
			});
	});
}
function saveItemOrder(){
	$(".saveitemorder").click(function(){
		
		var elem = $(this);
		var items = $(".adm-entries");
		$.each(items,function(i){
			var data=$(this).attr("alt").split("-");
			var id=data[0];
			var tb = data[1]
			var sortid = parseInt(i+1);
			$.post("../model/actions.php",{saveitemorder:1,tb:tb,id:id,sortid:sortid},function(d){
				console.log(d);
			$(".meldung").remove();
			$("<div class='col meldung p-0'><div class='alert alert-success text-center' role='alert'></div></div>").insertBefore(elem);
			$(".alert-success").text("Reihenfolge gespeichert");
				});
				
			});
	});
}
function openItemEditor(){
	$(".edit-item-bar-edit").click(function(){
		var data = $(this).attr("alt").split("-");
		$("body").append("<div id='overlay'><div id='editor-frame'></div></div>");	
		$("#editor-frame").load("content/itemeditor.php",{id:data[0],tb:data[1],classname:data[2]},function(){
			
			cropFileFrame();
			$("#editor-frame").append("<span id='close-frame'><i class='fa fa-close fa-fw'></i></span>");
			$.getScript("../jquery/jte/jquery-te.min.js");
			loading();
			initEditor();
			removeTypefile();
			datePicker();
			checkFileValue();
			$("#close-frame").click(function(){
			$("#overlay").slideUp(1000).remove();	
		});
		});
		
	});
}
function viewFormPattern(){
	
	$(".viewformpattern").click(function(){
		var elem = $(this).attr("href");
		$("body").append("<div id='overlay'><div id='editor-frame'></div></div>");
		
		$("#editor-frame").load("content/formviewer.php",{viewform:1,formid:elem},function(){
			$("#editor-frame").append("<span id='close-frame'><i class='fa fa-close fa-fw'></i></span>");
			$("#close-frame").click(function(){
			$("#overlay").slideUp(1000).remove();	
		});
		});
		
		return false;	
	});
	
	$(".editformpattern").click(function(){
		var elem = $(this).attr("href");
		$("body").append("<div id='overlay'><div id='editor-frame'></div></div>");
		
		$("#editor-frame").load("content/formviewer.php",{editform:1,formid:elem},function(){
			$("#editor-frame").append("<span id='close-frame'><i class='fa fa-close fa-fw'></i></span>");
			$("#close-frame").click(function(){
			$("#overlay").slideUp(1000).remove();	
		});
		});
		
		return false;	
	});
	
}
function addColumnFrame(){
	$(".addcolumn").click(function(){
		var data = $(this).attr("href").split("-");
		var elem = data[0];
		var tb = data[1];
		$("body").append("<div id='overlay'><div id='editor-frame'></div></div>");
		
		$("#editor-frame").load("content/addcolumn.php",{lastcolname:elem,totable:tb},function(){
			$("#editor-frame").append("<span id='close-frame'><i class='fa fa-close fa-fw'></i></span>");
			$("#close-frame").click(function(){
			$("#overlay").slideUp(1000).remove();	
		});
		});

		return false;	
	});
	

}
function modifyColumn(){
	$(".modify-column").click(function(){
	var tb = $(this).attr("alt");
	var columns = $(this).next(".tb-columns").children(".column");
	var neworder = Array();
	$.each(columns,function(){
		var col = $(this).attr("alt");
		neworder.push(col);
	});
	
	$.post("../model/actions.php",{modifyColumns:1,tb:tb,neworder:neworder},function(d){
		console.log(d);
	});
	return false;
	});
}
function chooseKategorie(){
	$(".choosekat").on("change",function(){
		var elem = $(this);
		var val = elem.get(0).value;
		var id = elem.attr("alt");
		$.post("../model/actions.php",{tb:"zb_pages", kategorie:val,id:id},function(d){
			console.log(d);
		});
			
	});

}
function datePicker(){ 
	
	$(".eventzeit, .Geburtstag").datepicker({
		changeYear:true,
		yearRange: "1935:2050",
       prevText: '&#x3c;zurück', prevStatus: '',
        prevJumpText: '&#x3c;&#x3c;', prevJumpStatus: '',
        nextText: 'Vor&#x3e;', nextStatus: '',
        nextJumpText: '&#x3e;&#x3e;', nextJumpStatus: '',
        currentText: 'heute', currentStatus: '',
        todayText: 'heute', todayStatus: '',
        clearText: '-', clearStatus: '',
        closeText: 'schließen', closeStatus: '',
        monthNames: ['Januar','Februar','März','April','Mai','Juni',
        'Juli','August','September','Oktober','November','Dezember'],
        monthNamesShort: ['Jan','Feb','Mär','Apr','Mai','Jun',
        'Jul','Aug','Sep','Okt','Nov','Dez'],
        dayNames: ['Sonntag','Montag','Dienstag','Mittwoch','Donnerstag','Freitag','Samstag'],
        dayNamesShort: ['So','Mo','Di','Mi','Do','Fr','Sa'],
        dayNamesMin: ['So','Mo','Di','Mi','Do','Fr','Sa'],
      showMonthAfterYear: false,
      showOn: 'both',
      buttonImage: '../img/kalendar.png',
      buttonImageOnly: true,
	  buttonText : 'wert', 
      dateFormat:'dd.mm.yy' ,
	  onSelect: function(dateText){
           var stampinput = $(".timestamp");
		   var expl = dateText.split(".");
		   
		    var seconds = new Date(expl[2], expl[1]-1, expl[0], 0, 0, 0, 0).getTime() / 1000;
		   stampinput.val(seconds);
            }
        
    });
	$(".eventzeit, .Geburtstag").attr("autocomplete","off");
}
function loading(){
	$(".upd").click(function(){
		//var prop = $(this).attr("type");
		
	 $("body").append('<div class="modal fade show " id="loading" tabindex="-1" role="dialog" aria-labelledby="loading"style="display: block;" aria-modal="true"><div class="loading-spinner"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div></div>');
	 /*if(prop!=="submit"){
	 setTimeout(function(){$("#loading").remove();},2000);
	}*/
}); 
}
function setEntryOverview(){
	$(".btn-overview").click(function(){
		var view = $(this).attr("alt");
		
		$.post("../model/actions.php",{entryview:view},function(d){
			console.log(d);
			location.href=location.href;
		});
	});
}
function initEditor(){
	$(".editor").jqte();
	
	// settings of status
	var jqteStatus = true;
	$(".status").click(function()
	{
		jqteStatus = jqteStatus ? false : true;
		$('.editor').jqte({"status" : jqteStatus});
	});
}
function searchHits(){
	$("#searchinput").on("keyup",function(){
		var inp = $(this);
		
		var countletter = inp.val().length;
		var hits = $("#hits");
		var val = inp.val();
		if(countletter>0){
			$.post("../model/adm-actions.php",{searchstring:val},function(data){
				hits.html(data).show();
				var option = $("#hits > option");
				option.click(function(){
					var hit = $(this).val();
					var contentid = $("#contentid");
					console.log(hit);
					var text = $(this).text();
					//console.log(hit);
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
function cropFileFrame(){
	$(".crop-file").click(function(){
		var tocrop = $(this).attr("alt");
		var datasize = $(this).attr("data-size");
		$("body").append("<div id='crop-overlay'><span id='crop-overlay-close'><i class='fa fa-close fa-fw'></i></span><div id='crop-frame'></div></div>");
		$("#crop-frame").load("content/crop.php",{tocrop:tocrop,datasize:datasize},function(){
		cropImage();
		});
		$("#crop-overlay-close").click(function(){
			//$("#crop-overlay").remove();
			location.href=location.href;
		});
	});
}
function cropImage(){
	    var size;
		var width, height;
		var pw=$("#custom-width").val();
		var ph=$("#custom-height").val();
		var ipw = $("#custom-width");
		var iph = $("#custom-height");
	
			
        $('#cropbox').Jcrop({
          aspectRatio: 0,
          onSelect: function(c){
			  width=c.w;
			  height=c.h;
           size = {x:c.x,y:c.y,w:c.w,h:c.h};
		   $("#properties").show().html(width+"x"+height+"px");
		   ipw.val(width);
		   iph.val(height);
           $("#crop,#savecrop, #reset").css("visibility", "visible");
          },
		
        });
		
		$("#setsize").click(function(){
			
		var pw=$("#custom-width").val();
		var ph=$("#custom-height").val();
		var ipw = $("#custom-width");
		var iph = $("#custom-height");
			
			$('#cropbox').Jcrop({

                aspectRatio: 0,
                setSelect: [0,0,pw,ph],
				onSelect: function(c){
			  width=c.w;
			  height=c.h;
           size = {x:c.x,y:c.y,w:c.w,h:c.h};
		   $("#properties").show().html(width+"x"+height+"px");
		   ipw.val(width);
		   iph.val(height);
           $("#crop,#savecrop, #reset, #undo").css("visibility", "visible");
          },
            });
		});
     
        $("#crop").click(function(){
            var img = $("#cropbox").attr('src');
			$(".jcrop-holder").hide();
			
            $("#cropped_img").show();
			$("#undo").css("visibility", "visible");
			$("#div-cropbox").hide(); 
            $("#cropped_img").attr('src','content/imagecrop.php?preview=1&x='+size.x+'&y='+size.y+'&w='+size.w+'&h='+size.h+'&img='+img);
        });
		
		$("#savecrop").click(function(){
			var img = $("#cropbox").attr('src');
			$(".jcrop-holder").hide();
			
            $("#cropped_img").show();
			$("#undo").css("visibility", "visible");
			$("#div-cropbox").hide(); 
            $("#cropped_img").attr('src','content/imagecrop.php?savecrop=1&x='+size.x+'&y='+size.y+'&w='+size.w+'&h='+size.h+'&img='+img);
			$("#alert").show();
		});
		
		$("#undo").click(function(){
			$("#cropped_img").hide();
		$("#div-cropbox, .jcrop-holder").show();
		});
		
		$("#reset").click(function(){
		$("#crop-overlay").remove();
		});
	}
function checkFileValue(){
	$('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            var label = $(this).next(".custom-file-label");
			label.text(fileName);
        });
}
function hideNavi(){
	
var navicont = $(".leftside");
var pagecont = $(".rightside");
var rstitle = pagecont.children("h1");

var entries = $(".adm-entries");
	$("#widetrigger").clickToggle(function(){
		var elem= $(this);
		var parent = elem.parent("div");
		var navpos = navicont.outerWidth();
		elem.animate({"opacity":"0"});
		pagecont.animate({"opacity":"0"},function(){
		parent.removeClass("text-left").addClass("text-right");
		rstitle.addClass("ml-5");
		navicont.animate({"left":"-"+navpos+"px"},function(){
		elem.addClass("fadeNavi").css({"background-color": "#17a2b8", "color": "aliceblue"});
		elem.children("i").removeClass("fa-chevron-left").addClass("fa-chevron-right");
		entries.removeClass("col-md-6").removeClass("col-lg-4").removeClass("col-xl-3").addClass("col-lg-2");
		});
		$(this).removeClass("col-md-9").removeClass("rightside").delay(400).animate({"opacity":"1"});
		elem.animate({"opacity":"1"});
		});
		
		
		
	},
	function(){
		var elem= $(this);
		var parent = elem.parent("div");
		elem.animate({"opacity":"0"});
		pagecont.animate({"opacity":"0"},function(){
		parent.addClass("text-right").removeClass("text-left");
		
		navicont.animate({"left":"0px"},function(){
		elem.removeClass("fadeNavi").removeAttr("style");
		elem.children("i").removeClass("fa-chevron-right").addClass("fa-chevron-left");
		entries.removeClass("col-lg-2").addClass("col-md-6").addClass("col-lg-4").addClass("col-xl-3");
		pagecont.addClass("col-md-9").addClass("rightside").animate({"opacity":"1"});
		elem.animate({"opacity":"1"});
		});
		
		});
	
	});
}
$(function(){
	initEditor();
	editNavicons();
	deleteEntry();
	orderPages();
	savePageOrder();
	openItemEditor();
	uploadBackground();
	saveItemOrder();
	viewFormPattern();
	addColumnFrame();
	chooseKategorie();
	removeTypefile();
	datePicker();
	activOrNotEntry();
	modifyColumn();
	//loading();
	setEntryOverview();
	searchHits();
	checkFileValue();
	hideNavi();
});