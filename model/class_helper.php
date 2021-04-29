<?php 

class Helper{

public function image(string $src, string $class="", string $size="", string $alt="", string $title=""){
	return "<img src='".connect::$base."$src' class='$class' $size>";
}
public function tag(string $tag, string $html, string $class="", string $alt="", string $title=""){
		return "<".$tag." class='$class' alt='$alt' title='$title'>".$html."</".$tag.">";
}
public function timestamp(int $stamp,string $format){
		return date($format,$stamp);
}
public function addCss(string $src, string $media="media='all'"){
	return "<link rel='stylesheet' type='text/css' href='".connect::$base."$src' $media>";
}
public function addJs(string $src){
	return "<script src='".connect::$base."$src'></script>";
}
public function meta(string $name="",string $content="", string $charset=""){
	return "<meta $name $content $charset>";
}

public function formInput(string $name, string $type, string $class="", string $id="", string $placeholder="", string $label="",$values="",string $required=""){
	return "<div class='form-group'><label for='$id'>$label</label>
	<input type='$type' name='$name' class='form-control $class' id='$id' placeholder='$placeholder' value='$values' $required>
	</div>";
}
public function formSelect(string $name, string $class="", string $id="", string $placeholder="", string $label="",string $required="", array $options=[]){
	
	$select = "<div class='form-group'>
	<label for='$id'>$label</label>
    <select name='$name' class='form-control $class' id='$id' $required>
      <option value=''>$placeholder</option>";
	  foreach($options as $option):
	  	$select .="<option value='$option'>$option</option>";
	  endforeach;
   $select .= "</select></div>";
  return $select;
}
public function formTextarea(string $name, string $class="", string $id="", string $placeholder="", string $label="",string $required="", $values=""){
	$out = "<div class='form-group'>
    <label for='$id'>$label</label>
    <textarea name='$name' class='form-control $class' id='$id' rows='3' placeholder='$placeholder' $required>$values</textarea>
  </div>";
  return $out;
}
public function formRadio(string $name, string $class="", string $id="", string $label="", string $checked="", string $required=""){
	$out = "<div class='form-check'>
  <input class='form-check-input $class' type='radio' name='$name' id='$id' value='' $checked $required>
  <label class='form-check-label' for='$id'>
    $label
  </label>
</div>";
	return $out;
}
public function formCheckbox(string $name, string $class="", string $id="", string $label="", string $checked="", string $required=""){
	$out = "<div class='form-check'>
  <input class='form-check-input' type='checkbox' name='$name' value='' id='$id' $checked $required>
  <label class='form-check-label' for='$id'>
    $label
  </label>
</div>";
return $out;
}
public function card(string $header, string $body, string $footer=""){
	$out = "<div class='card'>
  	<div class='card-header'>$header</div>
  	<div class='card-body'>$body</div>";
  if($footer){
	  $out .="<div class='card-footer text-muted'>$footer</div>";
	}
	$out .="</div>";
return $out;
}
public function ytVideo($src, $class, $alt){
	$out = "<div class='row pb-2 border-bottom'>
	  <div class='col-lg-4 col-md-12  openvideo'alt='$alt'>
		<img class='img-fluid z-depth-1 rounded' src='$src' alt='video' data-toggle='modal' data-target='#videomodal'>
	  </div>";
	 return $out;
}
}