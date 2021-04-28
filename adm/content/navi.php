<?php 
$o = new admController();

echo "<div class='row fixed-left bg-info m-0 pb-3 navigation'>";
echo "<div class=' col mt-5'>";
echo '
<div id="nav-accordion">
  <div class="card mb-1">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-nav-accordion" aria-expanded="false" aria-controls="collapseOne">
          <i class="fa fa-file-text-o fa-fw"></i> HOMEPAGE
        </button>
      </h5>
    </div>

    <div id="collapse-nav-accordion" class="collapse show" aria-labelledby="headingOne" data-parent="#nav-accordion">
      <div class="card-body">';
	  foreach($o->getAllKategorie() as $kategorie){
		echo "<ul class='list-group'>
		<li class='list-group-item mb-2'>".$kategorie['kat_name']." <i class='fa fa-edit fa-fw'></i>";
        echo "<ul class='adm-navi-list list-group-flush p-0 nav flex-column'>";
		foreach($o->getPages($kategorie['kat_id']) as $page){
			 if(!empty($page['page'])){
			if($page['page']!="index")
				echo "<li class='list-group-item p-0'><a href='?p=".$page['page']."a'> <i class='fa fa-file-text-o fa-fw'></i> ".ucfirst($page['page'])."</a></li>";
		}
		}
		echo "</ul>
		</li>
		</ul>";
		  
	  
	  }
     	echo '</div>
    </div>
  </div>

<div class="card mb-1">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-nav-accordion2" aria-expanded="false" aria-controls="collapseTwo">
         <i class="fa fa-gears fa-fw"></i> Expertentool
        	</button>
      		</h5>
    	</div>
    			<div id="collapse-nav-accordion2" class="collapse" aria-labelledby="headingTwo" data-parent="#nav-accordion">
      				 <div class="card-body">';
			echo "<ul class='adm-navi-list list-group-flush p-0'>";
			echo "<li class='list-group-item p-1'><a href='?p=settingsa'> <i class='fa fa-edit fa-fw'></i> Verwalten</a></li>"; 
			echo "<li class='list-group-item p-1'><a href='?p=createa'> <i class='fa fa-wrench fa-fw'></i> Erstellen</a></li>";
			echo $o->getFormsNavi(); 
			echo "</ul>";
			echo "</div>
				</div>
			</div>";
			
if(isset($_SESSION['webmaster'])){		
	echo '<div class="card">
		<div class="card-header" id="headingThree">
		  <h5 class="mb-0">
			<button class="btn btn-link" data-toggle="collapse" data-target="#collapse-nav-accordion3" aria-expanded="false" aria-controls="collapseTwo">
			 <i class="fa fa-database fa-fw"></i> Datenbank
				</button>
				</h5>
			</div>
					<div id="collapse-nav-accordion3" class="collapse" aria-labelledby="headingThree" data-parent="#nav-accordion">
						 <div class="card-body">';
				echo "<ul class='adm-navi-list list-group-flush p-0'>";
				echo "<li class='list-group-item p-1'><a href='../dbase/index.php' target='_blank'> <i class='fa fa-database fa-fw'></i> Datenbank</a></li>"; 
				echo "</ul>";
				echo "</div>
					</div>
				</div>";			
}
		echo "</div>
	</div>
</div>";