<?php 
function add_faculty($db,$name){
	if (!mysqli_fetch_array(mysqli_query($db,"SELECT * FROM faculty WHERE name='$name'"))) {
		if (mysqli_query($db,"INSERT INTO `faculty`(`id`, `name`) VALUES (NULL,'$name')")) {
			return false;
		}
	}
	else{
		return "<b>Факультет '".$name."' вже існує</b>";
	}

}
function add_chair($db,$name,$faculty){
	if (!mysqli_fetch_array(mysqli_query($db,"SELECT * FROM chair WHERE name='$name'"))) {
		if (mysqli_query($db,"INSERT INTO `chair`(`id`, `name`,`faculty`) VALUES (NULL,'$name','$faculty')")) {
			return false;
		}
	}
	else{
		return "<b>Кафедра '".$name."' вже існує</b>";
	}

}
function add_group($db,$name,$chair){
	if (!mysqli_fetch_array(mysqli_query($db,"SELECT * FROM group WHERE name='$name'"))) {
		if (mysqli_query($db,"INSERT INTO `group` (`id`, `name`,`chair`) VALUES (NULL,'$name','$chair')")) {
			return false;
		}
	}
	else{
		return "<b>Група '".$name."' вже існує</b>";
	}

}

 ?>