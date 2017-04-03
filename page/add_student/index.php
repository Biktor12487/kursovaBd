<?php 
	  include "../../config.ini";
	  include "../../module/nav.php";
	  include "../../module/function.php"; 
	  include "../../module/geter.php"; 
	  include "../../module/add_student.php"; 
	  $db = connect_db($hostName,$hostLogin,$hostPass,$nameDB);
	  if (isset($_POST['addStudent'])) {
	  	$result = add_user($db,$_POST['firstName'],$_POST['lastName'],$_POST['sureName'],$_POST['seriesPassport'],$_POST['numberPassport'],$_POST['special'],$_POST['medal']);
		  	if ($result == true) {
		  		refresh($siteName."/page/add_student/index.php",3);
		  	}
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
	<?php if (isset($result) && $result == true) {
		echo '<div class="section">
				<div class="container">
					<h2 align="center">Успішно додано</h2>
				</div>
			</div>
		</body>
	</html>';
	exit();
	} ?>
	<div class="section">
		<div class="container">
			<div class="sectorAddStudent">
				<form action="" method="post">
					<h2>Додавання студента</h2>
					<div class="rowAddStudent">
						<div class="labe">Прізвище</div>
						<input type="text" minlength="2" name="sureName" placeholder="Фамілія" required>
					</div>
					<div class="rowAddStudent">
						<div class="labe">Ім'я</div>
						<input type="text" minlength="2" name="firstName" placeholder="Ім'я" required>
					</div>
					<div class="rowAddStudent">
						<div class="labe">Побатькові</div>
						<input type="text" minlength="2" name="lastName" placeholder="Побатькові" required>
					</div>
					<div class="rowAddStudent">
						<div class="labe">Факультет</div>
						<select name="" id="">
							<?php geter_select($db,'faculty','name'); ?>
						</select>
					</div>
					<div class="rowAddStudent">
						<div class="labe">Спеціальність</div>
						<select name="special" id="">
							<?php geter_select($db,'chair','name'); ?>
						</select>
					</div>
					<div class="rowAddStudent seriaAndNumber">
						<div class="labe">Серія/Номер</div>
						<input type="text" name="seriesPassport" maxlength="2" minlength="2" placeholder="Серія" required>
						<input type="text" name="numberPassport" maxlength="6" minlength="6" placeholder="Номер" required>
					</div>
					<div class="rowAddStudent">
						<div class="labe">
							Медаль
						</div>
						<select name="medal" id="">
							<?php geter_select($db,'medal','name'); ?>
						</select>
					</div>
					<input type="submit" name="addStudent" value="Додати студента">
				</form>
			</div>
		</div>
	</div>
</body>
</html>