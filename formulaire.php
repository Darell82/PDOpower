<?php
   $message = [];
    $donnee = [];
   if(isset($_POST)&& !empty($_POST)){
     

       if(isset($_POST['nom']) && $_POST['nom']!='') {
           $donnee['lastName'] = $_POST['nom'];
       }else{
           $message['danger'][] = 'Merci de mettre un nom';
       }
       if(isset($_POST['prenom']) && $_POST['prenom']!='') {
           $donnee['firstName'] = $_POST['prenom'];
       }else{
           $message['danger'][] = 'Merci de mettre un prénom';
       }
       if(isset($_POST['date'])) {
           $donnee['birthDate'] = $_POST['date'];
       }else{
           $message['danger'][] = 'Merci de mettre une date de naissance';
       }
       if(isset($_POST['card'])) {
           $donnee['card'] = 1;
           if(isset($_POST['cardNumber'])){
               $donnee['cardNumber'] = $_POST['cardNumber'];
           }else{
               $message['danger'][] = 'Merci de mettre un numéro de carte';
           }
       }else{
           $donnee['card'] = 0;
           $donnee['cardNumber'] = null;
       }    
   

   if(empty($message)){
       $pdo= new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8','root','');
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

       $req = $pdo->prepare("  INSERT INTO clients
                               SET     lastName= :lastName,
                                       firstName= :firstName,
                                       birthDate= :birthDate,
                                       card= :card,
                                       cardNumber= :cardNumber
                           ");
       $req->execute($donnee);

       $message['success'][] = 'le client est bien ajouté';


      

   }
}
?>
<!DOCTYPE html>
<html>
<head>
<a href="exo1.php">exo1</a>
<a href="exo2.php">exo2</a>
<a href="exo3.php">exo3</a>
   <link rel="stylesheet" type="text/css" href="style/css/style1.css">
   <title>Ajout client</title>
</head>
<body>
<h1>Ajout Client</h1>
   <ul>
       <?php
            foreach ($message as $key => $tableau) {
                   foreach ($tableau as $value) {
                       echo "<li class=\"$key\">$value</li>";
               }
           }
       ?>
   </ul>
   <form method="post" action="">
       <label for="nom">Nom</label>
       <input type="text" name="nom" maxlength="45" id="nom">
       <label for="prenom">Prénom</label>
       <input type="text" name="prenom" maxlength="45" id="prenom">
       <label for="date">Date de naissance</label>
       <input type="date" name="date" id="date">
       <label for="card">Carte de fidélité</label>
       <input type="checkbox" name="card" id="card">Oui
       <input type="number" name="cardNumber" placeholder="numéro de carte">
       <button type="submit">ok</button>
   </form>


</body>
</html>