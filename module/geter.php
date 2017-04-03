<?php 
function geter_select($db,$table,$place,$where = NULL){
	$query = mysqli_query($db,"SELECT id , {$place} FROM {$table} {$where} ")or die();
	$html_lister = '';
	while ($row = mysqli_fetch_array($query)) {
		$html_lister.='<option value="'.$row[0].'">'.$row[1].'</option>';
	}
	echo $html_lister;
}
 ?>