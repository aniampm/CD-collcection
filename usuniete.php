<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<!--<link href="css/style.css" rel="stylesheet" type="text/css">-->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
</head>
<body>
<?php
	//sprawdzenie, który plik został przeznaczony do usunięcia i usunięcie go
	if(isset($_GET['file'])){
		$file = $_GET['file'];
		echo "<h3>Rekord został usunięty</h3>";
		unlink ($file);
		echo '<br/><a href="zapis.php"><button class="small">powróć do swojej kolekcji </button></a>';
	}
?>
</body>
</html>