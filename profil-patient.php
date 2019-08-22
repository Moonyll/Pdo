<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>PDO</title>
</head>
<body>
<p><a href="index2.php">Accueil</a><a href="ajout-patient.php">Ajouter un patient</a></p>
<?php
if(isset($_POST['id']))
{
    $detail =(int)$_POST['id'];
}
else
{
    echo "détails patient inconnu...";
}
try
{
    // On se connecte à MySQL
	$bdd2 = new PDO('mysql:host=localhost;dbname=hospitalE2N;charset=utf8', 'stephane', 'pomme');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
// Si tout va bien, on peut continuer
// On récupère tout le contenu de la table
$reponse_profil = $bdd2->query('SELECT * FROM patients WHERE id =\'$detail\'');

while ($donnees_patients = $reponse_profil->fetch())
{
echo "<p> Nom : ".$donnees_patients['lastname']."</p>";
echo "<p> Prénom : ".$donnees_patients['firstname']."</p>";
echo "<p> Date de naissance : ".$donnees_patients['birthdate']."</p>";
echo "<p> Email : ".$donnees_patients['mail']."</p>";
echo "<p> Téléphone: ".$donnees_patients['phone']."</p>";
echo "***";
}
$reponse_profil->closeCursor(); // Termine le traitement de la requête
?>
</body>
</html>
