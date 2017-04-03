<?php 
	function sort_group($db){
		$where_group = NULL;
	  $where_ns = NULL;
	   	$place = $_GET['filterTo'];
	  	$where_ns = '';
	  	$str_search = $_GET['searchPlace'];
	  	if (isset($place_search)) {
	  		$where_ns.= "WHERE {$place} LIKE '%".$good."%'";
	  	}
	  	if ($place == 'faculty') {
	  		if (isset($str_search)) {
			  		$where_ns.= "WHERE name LIKE '%$str_search%' ";
			  	}
	  		switch ($_GET['firstLetter']) {
		  		case 1:
		  			$where_ns .= 'ORDER BY name DESC';
		  			break;
		  		
		  		case 2	:
		  			$where_ns .= 'ORDER BY name ASC';
		  			break;
		  		default:
		  			$where_ns .= 'ORDER BY id ASC';
		  			break;
		  	}	  		
	  		$queryS = mysqli_query($db,"SELECT * FROM faculty {$where_ns}");
	  		$arrIdFaculty = [];
	  		while ($row = mysqli_fetch_array($queryS)) {
	  			array_push($arrIdFaculty, $row[0]);
	  		}
	  		$strFacultId = implode($arrIdFaculty, ",");
	  		$queryK= mysqli_query($db,"SELECT * FROM chair WHERE faculty IN(".$strFacultId.") ORDER BY FIND_IN_SET(faculty, '".$strFacultId."')");
	  		$arrIdChair = [];
	  		while ($row = mysqli_fetch_array($queryK)) {
	  			array_push($arrIdChair, $row[0]);
	  		}
	  		$strChairId = implode($arrIdChair, ",");
	  		switch ($_GET['firstLetter']) {
			  		case 2:
			  			$str = implode($arrIdChair, ",");
			  			return $where_group .= 'WHERE chair IN('.$strChairId.') ORDER BY FIND_IN_SET(chair, \''.$strChairId.'\')';
			  			break;
			  		
			  		case 1:
			  			$str = implode($arrIdChair, ",");
			  			return $where_group .= 'WHERE chair IN('.$strChairId.') ORDER BY FIND_IN_SET(chair, \''.$strChairId.'\')';
			  			break;
			  		default:
			  			break;
		  	}
	  	}
	  	elseif ($place == 'chair') {
	  			if (isset($str_search)) {
			  		$where_ns.= "WHERE name LIKE '%$str_search%' ";
			  	}
		  		switch ($_GET['firstLetter']) {
			  		case 2:
			  			$where_ns .= 'ORDER BY name DESC';
			  			break;
			  		
			  		case 1:
			  			$where_ns .= 'ORDER BY name ASC';
			  			break;
			  		default:
			  			$where_ns .= 'ORDER BY id ASC';
			  			break;
			  	}	  		
		  		$queryS = mysqli_query($db,"SELECT * FROM chair {$where_ns}");
		  		$arrIdChair = [];
		  		while ($row = mysqli_fetch_array($queryS)) {
		  			array_push($arrIdChair, $row[0]);
		  		}
		  		switch ($_GET['firstLetter']) {
				  		case 2:
				  			$str = implode($arrIdChair,",");
				  			return $where_group .= 'WHERE chair IN('.$str.') ORDER BY FIND_IN_SET(chair, \''.$str.'\')';
				  			break;
				  		
				  		case 1:
				  			$str = implode($arrIdChair, ",");
				  			return $where_group .= 'WHERE chair IN('.$str.') ORDER BY FIND_IN_SET(chair,\''.$str.'\')';
				  			break;
				  		default:
				  			break;
			  	}
	  	}
	  	else
	  	{
		  		if (isset($str_search)) {
			  		$where_group.= "WHERE {$place} LIKE '%$str_search%' ";
			  	}
	  			switch ($_GET['firstLetter']) {
			  		case 1:
			  			return $where_group .= 'ORDER BY '.$place.' DESC';
			  			break;
			  		
			  		case 2:
			  			return $where_group .= 'ORDER BY '.$place.' ASC';
			  			break;
			  		default:
			  			break;
		  		}
	  	}	  		
	}
	function sort_chair($db){
		$where_group = NULL;
		$where_ns = NULL;
	   	$place = $_GET['filterTo'];
	  	$where_ns = '';
	  	$str_search = $_GET['searchPlace'];
	  	if (isset($place_search)) {
	  		$where_ns.= "WHERE {$place} LIKE '%".$good."%'";
	  	}
		if ($place == 'faculty') {
	  			if (isset($str_search)) {
			  		$where_ns.= "WHERE name LIKE '%$str_search%' ";
			  	}
		  		switch ($_GET['firstLetter']) {
			  		case 2:
			  			$where_ns .= 'ORDER BY name DESC';
			  			break;
			  		
			  		case 1:
			  			$where_ns .= 'ORDER BY name ASC';
			  			break;
			  		default:
			  			$where_ns .= 'ORDER BY id ASC';
			  			break;
			  	}	  		
		  		$queryS = mysqli_query($db,"SELECT * FROM faculty {$where_ns}");
		  		$arrIdChair = [];
		  		while ($row = mysqli_fetch_array($queryS)) {
		  			array_push($arrIdChair, $row[0]);
		  		}
		  		switch ($_GET['firstLetter']) {
				  		case 2:
				  			$str = implode($arrIdChair,",");
				  			return $where_group .= 'WHERE faculty IN('.$str.') ORDER BY FIND_IN_SET(faculty, \''.$str.'\')';
				  			break;
				  		
				  		case 1:
				  			$str = implode($arrIdChair, ",");
				  			return $where_group .= 'WHERE faculty IN('.$str.') ORDER BY FIND_IN_SET(faculty,\''.$str.'\')';
				  			break;
				  		default:
				  			break;
			  	}
	  	}
	  	else
	  	{
		  		if (isset($str_search)) {
			  		$where_group.= "WHERE name LIKE '%$str_search%' ";
			  	}
	  			switch ($_GET['firstLetter']) {
			  		case 2:
			  			return $where_group .= 'ORDER BY name DESC';
			  			break;
			  		
			  		case 1:
			  			return $where_group .= 'ORDER BY name ASC';
			  			break;
			  		default:
			  			break;
		  		}
	  	}	  		
	}
	function sort_faculty($db){
				$where_group = NULL;
				$where_ns = NULL;
			  	$where_ns = '';
			  	$str_search = $_GET['searchPlace'];
	 
		  		if (isset($str_search)) {
			  		$where_group.= "WHERE name LIKE '%$str_search%' ";
			  	}
	  			switch ($_GET['firstLetter']) {
			  		case 2:
			  			return $where_group .= 'ORDER BY name DESC';
			  			break;
			  		
			  		case 1:
			  			return $where_group .= 'ORDER BY name ASC';
			  			break;
			  		default:
			  			break;
		  		}
	  	}	  		

 ?>