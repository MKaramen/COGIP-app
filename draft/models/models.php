<?php
function getCompany()
{
    try{
        $bdd = new PDO('mysql:host=database;dbname=cogip;charset=utf8', 'root', 'root');
    }
    catch{
        die('Erreur : '.$e->getMessage());
    }

$req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');

	return $req;
}
?>