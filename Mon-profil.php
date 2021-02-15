<?php

include './layout/header.php';

?>
<form action="Mon-profil-handler.php" class="container mt-5" method="post">

    <h4 class="mb-3">Mon pseudo</h4>
        <div class="form-group">
            <small class ="d-flex my-2">Votre ancien pseudo : <?php echo $_SESSION['pseudo']; ?></small>
            <label for="pseudo-modif">Changer votre Pseudo</label>
            <input class="form-control" type="text" name="pseudo-modif" id="pseudo-modif" placeholder="Votre nouveau pseudo">
        </div>

    <h4 class="mb-3">Mon image</h4>
        <div class="form-group">
            <small class ="d-flex my-2">Votre ancienne image: <?php if (!empty($_SESSION['image'])) echo $_SESSION['image']; ?></small>
            <label for="image-modif">Changer votre image de profil</label>
            <input class="form-control" type="url" name="image-modif" id="image-modif" placeholder="Votre nouvelle image">
        </div>

    <h4 class="mb-3">Mon e-mail</h4>
        <div class="form-group">
            <small class ="d-flex my-2">Votre ancien e-mail: <?php echo $_SESSION['email']; ?></small>
            <label for="email-modif">Changer email</label>
            <input class="form-control" type="email" name="email-modif" id="email-modif" placeholder="Votre nouvel e-mail">
        </div>

    <h4 class="mb-3">Mon mot de passe</h4>
        <div class="form-group">
            <label class ="m-2" for="password-old">Votre ancien mot de passe :</label>
            <input class="form-control" type="password" name="password-old" id="password-old" placeholder="Votre ancien mot de passe">
            <label class ="m-2" for="password-new">Votre nouveau mot de passe :</label>
            <input class="form-control" type="password" name="password-new" id="password-new" placeholder="Votre nouveau mot de passe">
        </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>


<?php
include './layout/footer.php';
?>