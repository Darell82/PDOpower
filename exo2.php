<?php


?>

<!DOCTYPE html>
<html>
<head>
<a href="formulaire.php">RETOUR</a>
   <link rel="stylesheet" type="text/css" href="style/css/style1.css">
   <title>Ajout client</title>
</head>
<body>
<h1>Ajout de spectacles</h1>
       
   <form method="post" action="">
       <input type="text" name="titre" placeholder="Quelle titre" maxlength="45" id="nom">
       <input type="text" name="artiste" placeholder="nom de l'artiste" maxlength="45" id="prenom">
       <label for="date">Date du spectacle</label>
       <input type="date" name="date" id="date">
       <label for="time">time</label>
       <input type="time" name="Time">
       <select name="genre1">
         <option value="">choix catégorie1</option>
       </select>
        <select name="genre2">
         <option value="">choix categorie2</option>
       </select>
       <label for="duree">Durée du spectacle</label>
       <input type="time" name="duree">
       <button type="submit">ok</button>
   </form>


</body>
</html>