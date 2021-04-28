<?php 
require_once "model/class_public.php";
class termine extends publicController{

public function getValuesTermineAOW(){
	$ensembles=$this->select("SELECT * FROM zb_ensembles ORDER BY ensembel_id ASC");
	print_r($ensembles);
	$i=1;
	foreach($ensembles as $ensemble){
		$q = "SELECT * FROM zb_termine_aow WHERE wer_spielt ='".$ensemble['ensembelname']."'
		AND timestamp>".time()." AND active=1 ORDER BY timestamp ASC LIMIT 0,5";
		$arr = self::select($q);
		
		if(!empty($arr[0]['id'])){
	echo "<h3>".$ensemble["ensembelname"]."</h3>"; 
	echo '<div id="accordion">';
			foreach($arr as $termin){
			echo '
			<div class="card mb-1"> 
			<div class="card-header p-0" id="headingOne">
			<span class="float-right fa fa-calendar mt-3 mr-1 fa-fw text-secondary"></span>
					<h4><button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne'.$i.'" aria-expanded="false" aria-controls="collapseOne">
					'.date("d.m.Y",$termin['timestamp']).' '.$termin['ueberschrift'].'
				</button></h4>
			</div>
					<div id="collapseOne'.$i.'" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
					<div class="card-body" style="position:relative">';
					echo '<span class="fa fa-calendar fa-fw"></span> '.$termin['beschreibung'];
					echo $this->publicEditIcon($termin["id"]."-zb_termine_aow-termine_aowa");
			  echo '</div>
			</div>
			</div>';
			$i++;
		} 
	echo '</div>';
		}
	}
}
}

    
      

    
      