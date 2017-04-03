<?php 
	function list_faculty($db,$where=NULL){
		$query = mysqli_query($db,"SELECT * FROM faculty {$where}");
		$list_html = '';
		while ($row = mysqli_fetch_array($query)) {
			$list_html.='<div class="row"><span>'.$row[1].'</span><a href="?delFaculty='.$row[0].'">Видал</a><a href="?editFaculty='.$row[0].'">Ред</a></div>';
		}
		if ($list_html == '') {
			$list_html = '<h5 align="center">Нічого не знайдено ...</h5>';
		}
		echo $list_html;
	}
	function list_chair($db,$where = NULL){
		$query = mysqli_query($db,"SELECT * FROM chair {$where}");
		$list_html = '';
		while ($row = mysqli_fetch_array($query)) {
			$facultyId = $row[2];
			$faculty = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM faculty WHERE id='$facultyId'"))[1];
			$list_html.='<div class="row"><span>'.$faculty.'</span><span>'.$row[1].'</span><a href="?delFaculty='.$row[0].'">Видал</a><a href="?editFaculty='.$row[0].'">Ред</a></div>';
		}
		if ($list_html == '') {
			$list_html = '<h5 align="center">Нічого не знайдено ...</h5>';
		}
		echo $list_html;
	}
	function list_group($db,$where = NULL){
		$query = mysqli_query($db,"SELECT * FROM `group`  {$where}");
		$list_html = '';
		while ($row = mysqli_fetch_array($query)) {
			$chairId = $row[2];
			$chair = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM chair WHERE id='$chairId'"));
			$facultyId = $chair[2];
			$faculty = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM faculty WHERE id='$facultyId'"))[1];
			$list_html.='<div class="row"><span>'.$faculty.'</span><span>'.$chair[1].'</span><span>'.$row[1].'</span><a href="?delFaculty='.$row[0].'">Видал</a><a href="?editFaculty='.$row[0].'">Ред</a></div>';
		}
		if ($list_html == '') {
			$list_html = '<h5 align="center">Нічого не знайдено ...</h5>';
		}
		echo $list_html;
	}


 ?>
