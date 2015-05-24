<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<!--<link href="css/style.css" rel="stylesheet" type="text/css">-->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
</head>
<body>
	<?php
	//sprawdzenie, który plik został poddany edycji i wydobycie danych z niego
	if(isset($_GET['file'])){
		$file = $_GET['file'];
		$a = file($file);
		$pojedyncza = $a[0];
		$tab = explode("#", $pojedyncza);
	?>
	
    <h1> Prywatna kolekcja płyt CD</h1>
    <form action ="zapis.php" method="POST" enctype="multipart/form-data">
         <h3><label>Tytuł płyty  <input type="text" name="tytul" value="<?php echo $tab[1];?>" size="40" required></label><br/>
            <label>Nazwa wykonawcy  <input type="text" name="wykonawca" value="<?php echo $tab[2];?>" size="40" required ></label><br/>
            <label>Dodatkowy opis  <input type="text" name="opis" value="<?php echo $tab[3];?>" size="300" ></label><br/>
            <label>Gdzie znajduje się płyta 
				<div>
					<select name="miejsce" size="6" required >
						<optgroup label="szafa czerwona">
							<option <?php if($tab[4]=="czerwona 1.1.") echo 'selected'; ?> >czerwona 1.1.</option>
							<option <?php if($tab[4]=="czerwona 1.2.") echo 'selected'; ?> >czerwona 1.2.</option>
							<option <?php if($tab[4]=="czerwona 1.3.") echo 'selected'; ?> >czerwona 1.3.</option>
						</optgroup>
						<optgroup label="szafa zielona">
							<option <?php if($tab[4]=="zielona 1.1.") echo 'selected'; ?> >zielona 1.1.</option>
							<option <?php if($tab[4]=="zielona 1.2.") echo 'selected'; ?> >zielona 1.2.</option>
							<option <?php if($tab[4]=="zielona 1.3.") echo 'selected'; ?> >zielona 1.3.</option>
						</optgroup>
						<optgroup label="szafa niebieska">
							<option <?php if($tab[4]=="niebieska 1.1.") echo 'selected'; ?> >niebieska 1.1.</option>
							<option <?php if($tab[4]=="niebieska 1.2.") echo 'selected'; ?> >niebieska 1.2.</option>
							<option <?php if($tab[4]=="niebieska 1.3.") echo 'selected'; ?> >niebieska 1.3.</option>
						</optgroup>
						<option <?php if($tab[4]=="pawlacz") echo 'selected'; ?> >pawlacz</option>
						<option <?php if($tab[4]=="strych") echo 'selected'; ?> >strych</option>
						<option <?php if($tab[4]=="piwnica") echo 'selected'; ?> >piwnica</option>
					</select>
                </div>
			</label>
        <input CLASS="play" type="submit" name="submit" value="zapisz">
		</h3>
    </form>
	
	<?php
		//usunięcie pliku zastępowanego
		unlink($file);
		}

	?>
</body>
</html>