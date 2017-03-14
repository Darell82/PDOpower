<?php
    $pdo = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    $statement = $pdo->query("SELECT * FROM clients WHERE lastName like 'M%'");
    $resultatExo1 = $statement->fetchAll();

    $statement = $pdo->query("
    	SELECT type, genres.genre AS firstGenre, secGenres.genre AS secGenre
    	FROM showTypes, genres, genres AS secGenres
    	WHERE showTypes.id = genres.showTypesId AND showTypes.id = secGenres.showTypesId
    	ORDER BY genres.id
    	");
    $resultatExo2 = $statement->fetchAll();


    $statement =$pdo->query("
    	SELECT lastName, firstName 
    	FROM clients 
    	WHERE lastName 
    	LIKE 'm%'
    	ORDER BY lastName
    	");


	$resultatExo5 = $statement->fetchAll();

	$statement =$pdo->query("
    	SELECT date, startTime, performer, title
    	FROM shows
    	ORDER BY title
    	");

		$resultatExo6 = $statement->fetchAll();

		$statement =$pdo->query("
    	SELECT *
    	FROM clients
    	");

		$resultatExo7 = $statement->fetchAll();


    $pdo = null;
    
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style/css/style.css" />
    <title>Test pdo</title>
</head>
<body>
    <h2>Exercice 1 + 2</h2>
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
		<h2>Exercice 5</h2>
		<?php foreach ($resultatExo5 as $value) : ?>
		<p><u>Nom <?= $value->lastName; ?></u><u> Prénom <?= $value->firstName; ?></u></p>

		<?php endforeach; ?>

		<h2>Exercice 6</h2>


		<?php foreach ($resultatExo6 as $value) : ?>

		 <p>le spectacle<?= $value->title; ?> par <?= $value->performer; ?> le <?= $value->date; ?> à <?= $value->startTime; ?></p>

		<?php endforeach; ?>

		<h2>Exercice 7</h2>

		<?php foreach ($resultatExo7 as $value) : ?>
			<p>nom <?= $value->lastName; ?> prenom <?= $value->firstName; ?> date de naisssance <?= $value->birthDate; ?> carte de fidélitée
			<?php
			if ($value->card==1){
				echo 'oui '.$value->cardNumber;
				}else{
					echo 'non ';
				} endforeach?>




		


</body>
