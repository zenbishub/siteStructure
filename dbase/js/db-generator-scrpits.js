jQuery.fn.clickToggle = function(a, b) {
  return this.on("click", function(ev) { [b, a][this.$_io ^= 1].call(this, ev) })
};

function conifgNotComplete(){
	
	$('#saveCreate').click(function(){
		if(!confirm("Konfiguration speichern?")){
			return false;
			}
		});
	
	}
	
function addNotComplete(){
	
	$('#toConfig').click(function(){
		if($('#table_name').val()===""){
			confirm("Bitte Tabellenname eingeben!");
			return false;
			}
		else if($('#qaunti_rows').val()===""){
			confirm("Bitte Spaltenanzahl eingeben!");
			return false;
			}
		else{return true;}
		});
	
	}	
	
	function saveRow(){
	
		if(!confirm("Konfiguration speichern?")){
			return false;
			}
	
	}
	
	function deleteRow(tbl,clmn){
	
		if(!confirm("Kolumn "+clmn+" löschen?")){
			return false;
			}
			location.href="?drop_column="+tbl+"&column="+clmn;
	
	}
function orderrows(){
	$(".orderrows").click(function(){
		var a = $(this);
		var tb = $(this).attr("href");
		var field = $(this).attr("alt");
		var order = $(this).attr("data");
			switch(order){
				case "ASC":
				a.attr("data","DESC");
				break;
				case "DESC":
				a.attr("data","ASC");
				break;
				case "":
				a.attr("data","ASC");
				break;
				
			}
		var neworder = $(this).attr("data");
		location.href="index.php?tb="+tb+"&order="+neworder+"&by="+field;
		
		return false;
	
	});
	
}	

$(function(){
	
	conifgNotComplete();
	addNotComplete();
	orderrows();
	});