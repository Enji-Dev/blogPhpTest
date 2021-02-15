<?php

$com = getCommentaire($_GET['id']);
$article_id = getArticle($_GET['id']);



 
        foreach ($com as $commentaire) {
            affichageCommentaire($commentaire);
        }



?>

<form class="w-50 m-auto" action="creer-commentaire-handler.php" method="post">
        <div class="form-group m-auto">
            <input type="hidden" name="article_id" id="article_id" value="<?php echo $_GET['id']; ?>">
        </div>

        <div class="form-group m-auto">
            <label for="pseudo">Pseudo</label>
            <input type="text" class="form-control" name="pseudo" id="pseudo" aria-describedby="titre-help" placeholder="Titre" required autofocus>
        </div>


        <div class="form-group">
            <label for="contenu">Contenu</label>
            <textarea class="form-control" name="contenu" id="contenu" aria-describedby="contenu-help" rows="5" required></textarea>
            <small id="contenu-help" class="form-text text-muted">Le contenu du commentaire</small>
        </div>

        <button type="submit" class="btn btn-primary mb-5">Nouveau Commentaire</button>
</form>


<footer class="bg-dark text-light rounded text-center my-4">&copy; 2alheure 2021</footer>


</div>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>