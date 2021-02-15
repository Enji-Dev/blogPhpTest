<?php
echo 'POST';
var_dump($_POST);

include './fonctions/fonctions_bdd.php';
include './fonctions/mes_fonctions.php';

$bdd = connectDB();
$article_id = $_POST['article_id'];

var_dump($_POST['article_id']);


addCommentaire();
?>