<?php

file_get_contents('readme.txt');		// On récupère le contenu de readme.txt

file_put_contents('nouveau_fichier_vide.txt', null);	// On écrit rien dans nouveau_fichier_vide.txt

file_put_contents('nouveau_fichier.txt', 'J\'ai écrit ça avec PHP' . PHP_EOL);	// On écrit dans nouveau_fichier.txt


file_put_contents('nouveau_fichier.txt', 'Regardez j\'ai écrit ça à la suite !', FILE_APPEND);	// On écrit (en ajoutant à la fin) dans nouveau_fichier.txt

if (file_exists('fichier_a_detruire.txt')) {	// Si fichier_a_detruire.txt existe
	unlink('fichier_a_detruire.txt');			// On détruit fichier_a_detruire.txt
}

if (file_exists('fichier_qui_existe_pas.txt')) {		// Si fichier_qui_existe_pas.txt existe
	file_get_contents('fichier_qui_existe_pas.txt');
	// On récupère le contenu de fichier_qui_existe_pas.txt
}

mkdir('test_bis'); 	// Crée un dossier test_bis

if (file_exists('test_bis')) {	// Si test_bis existe
	if (is_dir('test_bis')) {	// Si test_bis est un dossier
		rmdir('test_bis');		// On supprime le dossier test_bis
	}
}

touch('test.txt');		// Crée (s'il existe pas) le fichier test.txt