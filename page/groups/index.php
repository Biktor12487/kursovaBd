<?php 
	  include "../../config.ini";
	  include "../../module/nav.php";
	  include "../../module/function.php"; 
	  include "../../module/geter.php"; 
	  include "../../module/add_struct.php"; 
	  include "../../module/geter_list_struct.php"; 
	  include "../../module/sort.php"; 
	  $db = connect_db($hostName,$hostLogin,$hostPass,$nameDB);
	  $result_facult = NULL;
	  $result_chair = NULL;
	  $result_group = NULL;
	  if (isset($_POST['addFaculty'])) {
	  	$result_facult = add_faculty($db,$_POST['facultyName']);
	  	if ($result_facult == false) {
	  		$result_facult = NULL;
	  		refresh($siteName."/page/groups/index.php",0);
	  	}
	  }
	  if (isset($_POST['addChair'])) {
	  	$result_chair = add_chair($db,$_POST['chairName'],$_POST['facultyName']);
	  		if ($result_chair == false) {
	  		$result_chair = NULL;
	  		refresh($siteName."/page/groups/index.php",0);
	  	}
	  }
	  if (isset($_POST['addGroup'])) {
	  		$result_group = add_group($db,$_POST['groupName'],$_POST['chairName']);
	  		if ($result_group == false) {
	  		$result_group = NULL;
	  		refresh($siteName."/page/groups/index.php",0);
	  	}
	  }
	  // 
	  $where_group = NULL;
	  $where_chair = NULL;
	  $where_faculty = NULL;
	  if (isset($_GET['filter']) && $_GET['filter'] == 'group') {
	  	$where_group = sort_group($db);
	  }
	  if (isset($_GET['filter']) && $_GET['filter'] == 'chair') {
	  	$where_chair = sort_chair($db);
	  }
	   if (isset($_GET['filter']) && $_GET['filter'] == 'faculty') {
	  	$where_faculty = sort_faculty($db);
	  }
	 ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<?php get_nav($siteName); ?>
<div class="section">
	<div class="container">
		<div class="listFaculty">
			<h2>Список факультетів</h2>
			<div class="sortPanel">
				<form action="" method="get">
					<input type="hidden" name="filter" value="faculty">
					<select name="firstLetter" id="">
						<option value="1">А-я</option>
						<option value="2">Я-а</option>
					</select>
					<input type="text" name="searchPlace" placeholder="Пошук...">
					<input type="submit"  value="Застосувати">
				</form>
			</div>
			<div>
				<?php list_faculty($db,$where_faculty); ?>
			</div>
		</div>
		<div class="addFaculty">
			<h2>Додати факультет</h2>
			<form action="" method="POST">
				<input type="text" name="facultyName" placeholder="КНІТ">
				<b><?php echo $result_facult; ?></b>
				<input type="submit" name="addFaculty" value="Додати факультет">
			</form>
		</div>
	</div>
</div>
<div class="section">
	<div class="container">
		<div class="listFaculty">
			<h2>Список кафедр</h2>
			<div class="sortPanel">
				<form action="" method="get">
					<input type="hidden" name="filter" value="chair">
					<select name="filterTo" id="">
						<option value="faculty">До факультету</option>
						<option value="chair">До кафедри</option>
					</select>
					<select name="firstLetter" id="">
						<option value="1">А-я</option>
						<option value="2">Я-а</option>
					</select>
					<input type="text" name="searchPlace" placeholder="Пошук...">
					<input type="submit"   value="Застосувати">
				</form>
			</div>
			<div>
				<?php list_chair($db,$where_chair); ?>
			</div>
		</div>
		<div class="addFaculty">
			<h2>Додати кафедру</h2>
			<form action="" method="post">
				<select  name="facultyName">
					<option value="0">Виберіть факультет</option>
					<?php geter_select($db,'faculty','name'); ?>
				</select>
				<input type="text" name="chairName" placeholder="Комптерних наук">
				<input type="submit" name="addChair" value="Додати кафедру">
			</form>
		</div>
	</div>
</div>
<div class="section">
	<div class="container">
		<div class="listFaculty">
			<h2>Список груп</h2>
			<div class="sortPanel">
				<form action="" method="get">
					<input type="hidden" name="filter" value="group">
					<select name="filterTo" id="">
						<option value="faculty">До факультету</option>
						<option value="chair">До кафедри</option>
						<option value="name">До групи</option>
					</select>
					<select name="firstLetter" id="">
						<option value="1">А-я</option>
						<option value="2">Я-а</option>
					</select>
					<input type="text" name="searchPlace" placeholder="Пошук...">
					<input type="submit"  value="Застосувати">
				</form>
			</div>
			<div>
				<?php list_group($db,$where_group); ?>
			</div>
		</div>
		<div class="addFaculty">
			<h2>Додати групу</h2>
			<form action="" method="post">
				<select  name="facultyName">
					<option value="0">Виберіть факультет</option>
					<?php geter_select($db,'faculty','name'); ?>
				</select>
				<select  name="chairName">
					<option value="0">Виберіть кафедру</option>
					<?php geter_select($db,'chair','name'); ?>
				</select>
				<input type="text" name="groupName" placeholder="Комптерних наук">
				<input type="submit" name="addGroup" value="Додати групу">
			</form>
		</div>
	</div>
</div>
