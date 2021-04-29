<?php 
require_once "model/class_public.php";
class termine_aow extends publicController{
public function getClass(){
echo '<p class="h3 p-2">';
echo $this->asset->icon("fa-calendar");
 echo 'Aktuelle Termine</p>'; 

}
public function getValues(){
	$currentDay = time();
	$q = "SELECT * FROM zb_termine_aow WHERE  timestamp>=$currentDay AND active=1  ORDER BY sort ASC LIMIT 0,3";
	$arr = self::select($q);
	foreach($arr as $termin){
	echo '<div class="bg-light panel panel-default mb-2 termincards">';
	echo $this->publicEditIcon($termin["id"]."-zb_termine_aow-termine_aowa");
	echo '<div class="col-12 bg-dark text-light p-2"> 
  			'.$termin['ueberschrift'].'
			</div>';
	
  	echo '<div class="panel-body p-2 mt-0 ml-0">';
	if(!empty($termin['bilddatei'])){
		 echo '<div class="row">
		 <div class="col-sm-6 col-md-12 p-3 m-0">
                <a class="gallery-item" href="#" data-image-id="" data-toggle="modal" data-title="'.$termin["ueberschrift"].'"
                   data-image="'.self::$base.'adm/pic/'.$termin["bilddatei"].'"
                   data-target="#image-gallery">';
					echo $this->asset->image(self::$base."adm/pic/TN".$termin["bilddatei"], "img-thumbnail", "");
                echo '</a>
           	</div>
		   </div>';
		
	}

	echo "<p class='h2 col-12 pl-0 pr-0 '>".$termin['eventzeit']."</p>";
	if(!empty($termin['wer_spielt'])){
		echo "<p class='h5  pl-0 pr-0 '>".$termin['wer_spielt']."</p>";
	}
	echo $termin['beschreibung'].' 
	</div></div>';
}
}
public function selectData(){
	$selectArray=$o->select("SELECT * FROM zb_ensembles ORDER BY ensembel_id ASC");
	return $selectArray;
}
}

