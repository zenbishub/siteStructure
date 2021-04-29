<?php 
require_once "controller/".$_REQUEST["controller"].".php";
$o=new $_REQUEST["controller"]();
$limit = 10;
$arr=$o->getValues($limit);
$num = $o->countRows($limit);
echo "<div class=\"container mb-4 mt-4\">
<h2>".$o->getClass()."</h2>";
echo "<hr>";
echo "</div>";
echo "<div class=\"container mb-4 mt-4\">";
echo "<h5>Vereinmitglieder</h5>";
echo "<ul class='list-group'>";
foreach($arr as $items){
	if(empty($items["bilddatei"])){
		$personimg = $o->base."img/persondummy.jpg";
	}else{
		$personimg = $o->base."adm/pic/TN".$items["bilddatei"];
	}
	echo "<li class='list-group-item'>";
	echo "<div class='row'>";
		echo "<div class='col-lg-2 col-md-12'>
		<img class='img-thumbnail' src='$personimg' alt=''>
		</div>";
		echo "<div class='col-lg-8' col-md-12><span class='small font-italic'>Name:</span> ".$items['Vorname']." ".$items['Name']."
			<br><span class='small font-italic'>Funktion:</span> ".$items['funktion']."
		 	<br><span class='small font-italic'>Geburtstag:</span> ".$items['Geburtstag']."
			<br><span class='small font-italic'>Information:</span> ".$items['erreichbar']."</div>";
	echo "</div>";
	echo "</li>";
}
echo "</ul>";
echo "</div>";

if($num>1){
echo '<nav aria-label="Page navigation example" class="container"> 
  <ul class="pagination">';
  if($_REQUEST['param']>1){
    echo '<li class="page-item">
      <a class="page-link" href="'.$o->base.'/mitglieder/'.($_REQUEST['param']-1).'" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>';
  }
	$i=1;
	do{
    echo '<li class="page-item"><a class="page-link" href="'.$o->base.'/mitglieder/'.$i.'">'.$i.'</a></li>';
	$i++;
	}while($i<=$num);
	
    echo '<li class="page-item">
      <a class="page-link" href="'.$o->base.'/mitglieder/'.($_REQUEST['param']+1).'" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>';
}
