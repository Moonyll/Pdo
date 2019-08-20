<?php
try
{
    // On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'stephane', 'pomme');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
// Si tout va bien, on peut continuer
//
// On récupère tout le contenu de la table
$reponse_clients = $bdd->query('SELECT * FROM clients');
$reponse_clients_top_20 = $bdd->query('SELECT * FROM clients LIMIT 0,20');
$reponse_clients_with_card = $bdd->query('SELECT * FROM clients WHERE card != 0');
$reponse_clients_M = $bdd->query('SELECT * FROM clients WHERE lastName LIKE \'M%\' ORDER BY lastname ASC');
$reponse_shows = $bdd->query('SELECT * FROM showTypes');
// On affiche chaque entrée une à une
//
// Ex 1
echo "<h4>"."Ex.1 : Liste des clients <br/>"."</h4>";
echo "Prénom - Nom";
while ($donnees_clients = $reponse_clients->fetch())
{
echo "<p>".$donnees_clients['firstName']." ".$donnees_clients['lastName']."</p>";
}
$reponse_clients->closeCursor(); // Termine le traitement de la requête
// Ex 2
echo "<h4>"."Ex.2 : Type des spectacles disponibles <br/>"."</h4>";
while ($donnees_shows = $reponse_shows->fetch())
{
echo "<p>".$donnees_shows['type']."</p>";
}
$reponse_shows->closeCursor(); // Termine le traitement de la requête
// EX 3
echo "<h4>"."Ex.3 : 20 premiers clients <br/>"."</h4>";
while ($donnees_clients_top_20 = $reponse_clients_top_20->fetch())
{
echo "<p>".$donnees_clients_top_20['firstName']." ".$donnees_clients_top_20['lastName']."</p>";
}
$reponse_clients_top_20->closeCursor(); // Termine le traitement de la requête
// EX 4
echo "<h4>"."Ex.4 : Clients avec une carte de fidélité <br/>"."</h4>";
while ($donnees_clients_with_card = $reponse_clients_with_card->fetch())
{
echo "<p>".$donnees_clients_with_card['firstName']." ".$donnees_clients_with_card['lastName']." - N° Carte : ".$donnees_clients_with_card['cardNumber']."</p>";
}
$reponse_clients_with_card->closeCursor(); // Termine le traitement de la requête
// EX 5
echo "<h4>"."Ex.4 : Clients avec un nom commençant par M <br/>"."</h4>";
while ($donnees_clients_M = $reponse_clients_M->fetch())
{
echo "<p>"."Nom : ".$donnees_clients_M ['lastName']."</p>";
echo "<p>"."Prénom : ".$donnees_clients_M['firstName']."</p>";
}
$reponse_clients_M->closeCursor(); // Termine le traitement de la requête
?>

