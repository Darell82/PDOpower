<?php
    $pdo = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    $statement = $pdo->query('SELECT * FROM clients');
    $resultatExo1 = $statement->fetchAll();

    $statement = $pdo->query("
    	SELECT type, genres.genre AS firstGenre, genres.genre AS secGenre
    	FROM showTypes, genres
    	WHERE showTypes.id = genres.showTypesId
    	");
    $resultatExo2 = $statement->fetchAll();


    $pdo = null;
    
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style/css/style.css" />
    <title>Test pdo</title>
</head>
<body>
    <h2>Exercice 1</h2>
    	<table>
	    	<thead>
		    	<tr>
		    		 <th>id</th>
		    		 <th>Nom</th>
		    		 <th>Prenom</th>
		    		 <th>date de naissance</th>
		    		 <th>Card</th>
		    		 <th>Card Number</th>
		    	</tr>
		    </thead>
		    <tbody>
		    <?php foreach ($resultatExo1 as $value) : ?>


		    	<tr>
		    		<td><?= $value->id; ?></td>
		    		<td><?= $value->lastName; ?></td>
		    		<td><?= $value->firstName; ?></td>
		    		<td><?= $value->birthDate; ?></td>
		    		<td><?= $value->card; ?></td>
		    		<td><?= $value->cardNumber; ?></td>
		    	</tr>
		    <?php endforeach; ?>
		    </tbody>
    	</table>


    	<h2>Exercice 2</h2>
    	<table>
	    	<thead>
		    	<tr>
		    		 <th>id</th>
		    		 <th>firstGenre</th>
		    		 <th>secGenre</th>
		    	</tr>
		    </thead>
		    <tbody>
		    <?php foreach ($resultatExo2 as $value) : ?>


		    	<tr>
		    		<td><?= $value->type; ?></td>
		    		<td><?= $value->firstGenre; ?></td>
		    		<td><?= $value->secGenre; ?></td>
		    	</tr>
		    <?php endforeach; ?>
		    </tbody>
    	</table>


</body>