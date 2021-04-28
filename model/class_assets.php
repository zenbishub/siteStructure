<?php 
class asset{
	
public function image(string $src, string $class, string $size="", string $alt="", string $title=""){
		return "<img src='$src' width='$size' class='$class' alt='$alt' title='$title'>";
}
public function icon(string $class){
	return "<i class='fa $class fa-fw'></i>";
}	
public function button(string $text, string $id="" ,string $class="",string $alt="",string $title=""){
	return "<button id='$id' class='$class' alt='$alt' title='$title'>$text</button>";
}
public function linkto(string $src, string $text, string $id="" ,string $class="",string $alt="",string $title=""){
	return "<a href='$src' id='$id' class='$class' alt='$alt' title='$title'>$text</a>";
}
}