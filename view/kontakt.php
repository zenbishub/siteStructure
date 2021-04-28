<?php
 
require_once "controller/".$_REQUEST["controller"].".php";
$o=new $_REQUEST["controller"]();
$arr = $o->getValues();
echo "<div class=\"container mb-4 mt-4\">
<h2>".ucfirst($arr[0]["ueberschrift"])."</h2><hr> ";

echo $arr[0]["textinhalt"];
echo "</div>";
echo "<div class=\"container pb-4 mb-4 mt-4\">";
echo "<h5>Schreiben Sie uns <br><span class='small'>gern beantworten wir Ihre Fragen</span></h5>";
echo "<hr>";
echo $o->kontktSended();
echo "<form method=\"post\" action=\"".connect::$base."model/actions.php\"><div class=\"form-group\">
<label for=\"anrede\">Anrede</label>
<select class=\"form-control col-12 col-md-6\" name=\"anrede\" required> 
		<option value=\"\">Anrede*</option>
		<option value=\"Frau\">Frau</option>
		<option value=\"Herr\">Herr</option>
		</select></div>
		<div class=\"form-group\">
		<label for=\"Name\">Name</label><input type=\"text\" name=\"Name\" class=\"form-control col-12 col-md-6 Name\"   placeholder=\"Name*\" required>
		</div><div class=\"form-group\">
		<label for=\"Vorname\">Vorname</label><input type=\"text\" name=\"Vorname\" class=\"form-control col-12 col-md-6 Vorname\"  placeholder=\"Vorname*\" required>
		</div><div class=\"form-group\">
		<label for=\"E-Mail\">E-Mail</label><input type=\"email\" name=\"email\" class=\"form-control col-12 col-md-6\" id=\"E-Mail\" placeholder=\"E-Mail*\" required>
		</div><div class=\"form-group\"><label for=\"Nachricht\">Nachricht</label><textarea class=\"editor form-control col-12 col-md-10 \" name=\"Nachricht\" id=\"Nachricht\" rows=\"3\" placeholder=\"Nachricht*\" required></textarea></div>
		<label for=\"hinweis\"><span class='small' id='hinweis'>* Pflichtfelder bitte ausfüllen</span></label>
		<div class=\"form-group\">
		<button class=\"btn btn-info\" id=\"kontaktform\" >senden</button> 
		<input type='hidden' name='cptoken' id='cp-token'>
		<input type='hidden' name='sendKontakt' value='1'>
		</div>
		</form> ";
		echo "</div>";
?>
<script> 
      function onVerify() {
		
			
			grecaptcha.ready(function() {
          		grecaptcha.execute('6Led4rAZAAAAAEBoHYklTtqBhLeE2_qUfw0egZZ8', {action: 'submit'}).then(function(token) {
					var cptocken = $("#cp-token");
				   cptocken.val(token);
			   $("#kontaktform").click(function(){
				   
				 if(cptocken.val()!=""){
					$(this).submit();
				}
			});	
          });
        });
			
}
	 $(function(){
		 onVerify();
		 });
  </script>
  
  
