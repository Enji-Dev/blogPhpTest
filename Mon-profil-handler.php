<?php

session_start();

include './fonctions/fonctions_bdd.php';
include './fonctions/mes_fonctions.php';

$utilisateur = getUtilisateurByPseudo($_SESSION['pseudo']);

if (
!empty(password_verify($_POST['password-old'], $utilisateur['password']))
&& !empty($_POST['password-new'])
&& strlen($_POST['password-new']) >= 6
) {
    $bdd = connectDB();
    $password = password_hash($_POST['password-new'], PASSWORD_DEFAULT);

        $requete=$bdd->prepare('UPDATE utilisateurs 
                                SET password = ? 
                                WHERE id = ?');
        
        $requete->execute(array(
            $password,
            $utilisateur['id']
            )
        );
    return header('location: index.php');

}

if (!empty($_POST['image-modif'])) {

    $bdd = connectDB();

        $requete=$bdd->prepare('UPDATE utilisateurs 
                        SET image = ? 
                        WHERE id = ?');
        
        $requete->execute(array(
            $_POST['image-modif'],
            $utilisateur['id']
            )
        );
    $_SESSION['image'] = $_POST['image-modif'];
    return header('location: index.php');

} 

if (!empty($_POST['pseudo-modif'])) {

    $bdd = connectDB();

        $requete=$bdd->prepare('UPDATE utilisateurs 
                        SET pseudo = ? 
                        WHERE id = ?');
        
        $requete->execute(array(
            $_POST['pseudo-modif'],
            $utilisateur['id']
            )
        );
    $_SESSION['pseudo'] = $_POST['pseudo-modif'];
    return header('location: index.php');

}

if (!empty($_POST['email-modif'])) {

    $bdd = connectDB();

        $requete=$bdd->prepare('UPDATE utilisateurs 
                        SET email = ? 
                        WHERE id = ?');
        
        $requete->execute(array(
            $_POST['email-modif'],
            $utilisateur['id']
            )
        );
    $_SESSION['email'] = $_POST['email-modif'];
    return header('location: index.php');

}