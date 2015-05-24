<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<!--<link href="css/style.css" rel="stylesheet" type="text/css">-->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
</head>
<body>
    <h1> Prywatna kolekcja płyt</h1>
    <form action ="zapis.php" method="POST" enctype="multipart/form-data">
         <h3><label>Tytuł płyty  <input type="text" name="tytul" value="" size="40" required></label><br/>
            <label>Nazwa wykonawcy  <input type="text" name="wykonawca" value="" size="40" required></label><br/>
            <label>Dodatkowy opis  <input type="text" name="opis" value="" size="300"></label><br/>
            <label>Gdzie znajduje się płyta 
				<div>
					<select name="miejsce" size="6" required>
						<optgroup label="szafa czerwona">
							<option>czerwona 1.1.</option>
							<option>czerwona 1.2.</option>
							<option>czerwona 1.3.</option>
						</optgroup>
						<optgroup label="szafa zielona">
							<option>zielona 1.1.</option>
							<option>zielona 1.2.</option>
							<option>zielona 1.3.</option>
						</optgroup>
						<optgroup label="szafa niebieska">
							<option>niebieska 1.1.</option>
							<option>niebieska 1.2.</option>
							<option>niebieska 1.3.</option>
						</optgroup>
						<option>pawlacz</option>
						<option>strych</option>
						<option>piwnica</option>
					</select>
                </div>
			</label>

        
        <input class="play" type="submit" name="submit" value="zapisz">
		</h3>
    </form>

</body>
</html>
