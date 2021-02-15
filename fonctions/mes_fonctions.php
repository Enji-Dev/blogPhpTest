<?php


function resume($article) {
	return substr($article['contenu'], 0, 200) . '...';
}

function affichage($article) { ?>


	<article class="list-group-item list-group-item-action" aria-current="true">
		<div class="d-flex w-100 justify-content-between">
			<h2 class="mb-1">
				<?php echo $article['titre']; ?>
			</h2>
			<small>
				<?php echo $article['date']; ?>
			</small>
		</div>
		<p class="mb-1">
			<?php echo resume($article); ?>
		</p>
		<small class="text-muted"><a href="<?php echo 'article.php?id=' . $article['id']; ?>">Lire l'article.</a></small>
	</article>


	<?php }

/**
 * Crée la session qui correspond à l'utilisateur
 */
function createSession($utilisateur) {
	$_SESSION['is_connected'] = true;
	$_SESSION['pseudo'] = $utilisateur['pseudo'];
	$_SESSION['image'] = $utilisateur['image'];
	$_SESSION['email'] = $utilisateur['email'];
}

/**
 * Affiche l'erreur qui se trouve dans $_SESSION
 * et la supprime ensuite pour éviter qu'elle s'affiche partout
 */
function printError() {
	if (!empty($_SESSION['erreur'])) { ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Fermer</span>
			</button>
			<strong>Erreur : </strong> <?php echo $_SESSION['erreur']; ?>
		</div>

<?php
		unset($_SESSION['erreur']);
	}
}

function addCommentaire() {

	$bdd = connectDB();

	if (
		!empty($_POST['pseudo']) 
		&& !empty($_POST['contenu'])
	) 
	{
		$statement = $bdd->prepare(
			'INSERT INTO commentaires (pseudo, contenu, date, article_id) VALUE (?,?,?,?)');
			
		$date = date('Y-m-d');

		// $statement->bindParam(1,$_POST['titre']);
		// $statement->bindParam(2,$_POST['image']);
		// $statement->bindParam(3,$_POST['image_alt']);
		// $statement->bindParam(4,$_POST['image_copyright']);
		// $statement->bindParam(5,$_POST['contenu']);
		// $statement->bindParam(6,$date);

		$header = 'article.php?id=' . $_POST['article_id'];



		$statement->execute(
			array(
				$_POST['pseudo'],
				$_POST['contenu'],
				$date,
				$_POST['article_id']

			)
		);

		header('location:' . $header);

		echo 'Commentaire Ajouté !';
	}
	else {
	echo 'Tu as oublié des champs..';
	}
}
function affichageCommentaire($commentaire) { ?>


	<article class="list-group-item list-group-item-action" aria-current="true">
		<div class="d-flex w-100 justify-content-between">
			<h2 class="mb-1">
				<?php echo $commentaire['pseudo']; ?>
			</h2>
			<small>
				<?php echo $commentaire['date']; ?>
			</small>
		</div>
		<div>
		<p class="mb-1">
			<?php echo $commentaire['contenu']; ?>
		</p>
		</div>
	</article>


<?php }
function getCommentaire() {


	$bdd = connectDB();

	$id = $_GET['id'];

	$statement = $bdd->prepare('SELECT C.pseudo,C.contenu,C.date,C.article_id FROM commentaires C
								JOIN articles A ON A.id = C.article_id 
								WHERE C.article_id = ?');

	
	$statement->bindParam(1,$id);

	$statement->execute();

	$commentaire_id = $statement->fetchAll();

	return $commentaire_id;

}