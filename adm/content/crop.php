<?php 
$bild = $_REQUEST['tocrop'];
$datasize = explode("x",$_REQUEST['datasize']);
$prefix="";
if(isset($_REQUEST['public'])){
	$prefix="adm/";
}
?>
<div id="btn">
<div id="properties"></div>
	<div class="row">
	<div class="col col-lg-7">
		<button id="reset"><i class="fa fa-arrow-left fa-fw"></i> zurück</button>
		<button id="undo"><i class="fa fa-undo fa-fw"></i> verwerfen</button>
        <button id="crop"><i class="fa fa-check fa-fw"></i> ausschneiden</button>
		<button id="savecrop"><i class="fa fa-floppy-o fa-fw"></i> speichern</button>
	</div>
	<div class="col col-lg-5">
		<div class="row">
        <input class="form-control col-2 mr-1" id="custom-width"  placeholder="Bildbreite(px)" value="1400">
		<input class="form-control col-2 mr-1" id="custom-height" placeholder="Bildhöhe(px)" value="900">
		<button id="setsize">ok</button>
		<span id="isSize" class="ml-4 pt-2 text-light small">
		<?=
		"original: ".$datasize[0]."x".$datasize[1]."px";
		?></span>
		</div>
		
	</div>
	</div>
		

    </div>
	<div id="alert"><div class="alert-success p-2 m-1 rounded text-center">Ausschnitt gespeichert</div></div>
	<div id="div-cropbox">
        <img src="<?=$prefix;?>pic/<?=$bild;?>" id="cropbox" class="img" /><br />
    </div>
    <div  id="div-cropbox_img">
        <img src="#" id="cropped_img" style="display: none;">
    </div>
	