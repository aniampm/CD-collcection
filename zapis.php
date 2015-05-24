<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<!--<link href="css/style.css" rel="stylesheet" type="text/css">-->
</head>
<body>
	<?php
		//sprawdzenie, czy został dodany jakiś rekord
		if(isset($_POST['tytul'])){
		
		//ZAPIS DANYCH DO PLIKU
		$tytul = ($_POST['tytul']);
		$wykonawca = $_POST['wykonawca'];
		$opis = $_POST['opis'];
		$miejsce = $_POST['miejsce'];

		//sprawdź, czy folder "rekordy" istnieje, jeśli nie, utwórz taki
		if (!file_exists("rekordy")) {
			mkdir("rekordy", 0777);
			chmod("rekordy", 0777);//na serwerze pfiga nie działa bez tego chmoda - brak uprawnien
		}

		//utworzenie pliku o nazwie tytul i zapis danych do niego
		//tworzenie nazwy pliku
		$przechowuj = $tytul.".txt";
		
		//usuwanie spacji i ukośników z tytułu
		$przechowuj = str_replace(" ","",$przechowuj);
		$przechowuj = str_replace("/", "", $przechowuj);

		//jeśli więcej niż jedna płyta o tej samej nazwie, nie nadpisuj tylko zmien nazwę
		$i = 0;
		while (file_exists("rekordy/$przechowuj")) {
			$przechowuj = $tytul.$i.".txt";
			$przechowuj = str_replace(" ","",$przechowuj);
			$przechowuj = str_replace("/", "", $przechowuj);
			$i++;
		}

		//zapis danych z formularza do pliku
		$nazwaPliku = fopen("rekordy/$przechowuj", "w+");
		$a = fwrite($nazwaPliku, '#'.$tytul.'#'.$wykonawca.'#'.$opis.'#'.$miejsce);
		fclose($nazwaPliku);
		$odczytaj = file_get_contents("rekordy/$przechowuj");
		}
	?>
	
	<h1> Prywatna kolekcja płyt</h1>

	<?php
	//wydobycie danych z plików i ułożenie ich w tabelce
	?>
	<table>    
	<thead>
		<tr>
			<th>Nazwa płyty</th>
			<th>Wykonawca</th>
			<th>Dodatkowy opis</th>
			<th>Która półka?</th>
			<th>Usuwanie </th>
			<th>Edycja </th>
		</tr>
	</thead>
	<tbody>
		
	<?php
	//wydobycie danych z plików
	$pliki = glob("rekordy/*.txt");
	foreach ($pliki as $plik){
	$zawartosc = file($plik);
	$pojedyncza = $zawartosc[0];
	$tab = explode("#", $pojedyncza);
	
	//ułożenie danych w tabeli
	echo '<tr>';
	for($i=1;$i<sizeof($tab);$i++){
	 echo '<td>'.$tab[$i].'</td>';
	}
	//usuniecie
	echo '<td><a href="usuniete.php?file='.$plik.'"><button class="vsmall">usuń</button></a></td>';

	//edycja
	echo '<td><a href="edycja.php?file='.$plik.'"><button class="vsmall">edytuj</button></a></td>';
	echo '</tr>';
	}
	?>	
	</tbody>
	</table>

	<a href="kolekcja.php"><button class="vsmall">dodaj nowy rekord</button></a>
</body>
</html>