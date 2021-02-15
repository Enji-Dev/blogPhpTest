<?php


// Connexion + requête à la BDD

$user = [
	'pseudo'=> '2alheure',
	'email' => 'truc',
	'image' => null
];

setcookie('pseudo', $user['pseudo'] . ' ' . $user['email'], time() + 3 * 24 * 60 * 60);	 //On crée un cookie

// Ne fonctionne pas car $user['truc] n'esite pas
// setcookie('truc', $user['truc'], time() + 3 * 24 * 60 * 60);
setcookie('bidule', $user['pseudo'], time() + 3 * 24 * 60 * 60);		// On crée un autre cookie
setcookie('monster', $user['pseudo'], time() + 3 * 24 * 60 * 60);		// On crée un autre cookie

setcookie('pseudo',$_COOKIE['pseudo'], time() + 3 * 24 * 60 * 60);		// On redéfinit le cookie pseudo

$_COOKIE['pseudo'];


$_REQUEST;

$_SERVER;
