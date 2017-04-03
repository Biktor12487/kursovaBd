<?php 
	function add_user($db,$fName,$lName,$sName,$passportSeries,$passportNumber,$chair,$medal){
		if(mysqli_query($db,"INSERT INTO students (`id`, `firstName`, `lastName`, `sureName`, `passportSeries`, `passportNumber`, `chair`, `medal`) VALUES (NULL,'$fName','$lName','$sName','$passportSeries','$passportNumber','$chair','$medal')")){
			return true;
		}
		else
		{
			return false;
		}
	}	
 ?>