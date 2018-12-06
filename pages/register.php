<?php include('header.php');?>
<?php
    // Si la session existe déjà, l'utilisateur ne peut plus se connecter.
    if($_SESSION['usr_pseudo']) {
    header('Location: ../index.php');
    }
?>

<div id="body" style="text-align: center">

    <?php
        // Si on soumet le formulaire.
        if(isset($_POST['submit'])) {
            $nom = htmlspecialchars(trim(addslashes($_POST['nom'])));
            $prenom = htmlspecialchars(trim(addslashes($_POST['prenom'])));
            $pseudo = htmlspecialchars(trim(addslashes($_POST['pseudo'])));
            $email = htmlspecialchars(trim(addslashes($_POST['email'])));
            $password = htmlspecialchars(trim(addslashes($_POST['password'])));
            $rptpassword = htmlspecialchars(trim(addslashes($_POST['rptpassword'])));

            // Vérification de l'adresse email.


            if(!preg_match("/^\w+@\w+\.\w+$/", $email)) {
                echo "  <p style='text-align: center; margin: 2%; padding: 2%; background-color: silver; color: red;'>
                            Votre adresse email n'est pas correcte.
                        </p>";
            } else if(strcmp($password, $rptpassword) != 0 || strlen($password) < 3) {
                echo "  <p style='text-align: center; margin: 2%; padding: 2%; background-color: silver; color: red;'>
                            Vos mots de passes ne sont pas identiques.
                        </p>";
            } else if(strlen($prenom) < 2 || strlen($nom) < 2) {
                echo "  <p style='text-align: center; margin: 2%; padding: 2%; background-color: silver; color: red;'>
                            Vos prenoms et noms doivent contenir 5 caractères au moins.
                        </p>";
            } else if(strlen($pseudo) < 5) {
                echo "  <p style='text-align: center; margin: 2%; padding: 2%; background-color: silver; color: red;'>
                            Votre pseudo doit contenir au moins 5 caractères.
                        </p>";
            }else {
                $sql1 = "INSERT INTO t_utilisateur_usr VALUES ('$pseudo', MD5('$password'))";
                $sql2 = "INSERT INTO t_profil_prf(prf_nom, prf_prenom, prf_valide, prf_statut, usr_pseudo, prf_email, prf_date_aj) VALUES ('$nom', '$prenom', 'D', 'M', '$pseudo', '$email', NOW())";
                
                $res1 = $mysqli->query($sql1);
                $res2 = $mysqli->query($sql2);

                if(!$res2) {
                    // Si la première requête a fonctionné, on supprime le compte qui a été créé.
                    if($res1) {
                        $mysqli->query("DELETE FROM t_utilisateur_usr WHERE usr_pseudo='$pseudo'");
                    }

                    // On affiche le message d'erreur.
                    echo "
                    <p style='text-align: center; margin: 2%; padding: 2%; background-color: silver; color: red;'>
                        Une erreur s'est produite lors de l'ajout de votre compte.
                    </p>
                    ";
                }else {
                    echo    "
                        <p style='text-align: center; margin: 2%; padding: 2%; background-color: silver; color: green'>
                            Votre compte a été crée avec succès.
                        </p>
                    ";
                }


            }
        }
    ?>

    <h2 style="color:white;">Création d'un nouveau profil</h2>

    <form action="#" method="post">

        <div class="form-fields">
            <label for="pseudo">Entrez votre nom de famille</label>
            <input type="text" name="nom" id="nom" value="<?=isset($_POST['nom']) ? $_POST['nom'] : ""?>" required/>
        </div>

        <div class="form-fields">
            <label for="pseudo">Entrez votre prenom</label>
            <input type="text" name="prenom" id="prenom" value="<?=isset($_POST['prenom']) ? $_POST['prenom'] : ""?>" required/>
        </div>

        <div class="form-fields">
            <label for="pseudo">Entrez votre pseudo</label>
            <input type="text" name="pseudo" id="pseudo" value="<?=isset($_POST['pseudo']) ? $_POST['pseudo'] : ""?>" required/>
        </div>

        <div class="form-fields">
            <label for="email">Entrez votre adresse email</label>
            <input type="text" name="email" id="email" value="<?=isset($_POST['email']) ? $_POST['email'] : ""?>" required/>
        </div>

        <div class="form-fields">
            <label for="password">Entrez votre mot de passe</label>
            <input type="password" name="password" id="password" required/>
        </div>

        <div class="form-fields">
            <label for="rptpassword">Repetez votre mot de passe</label>
            <input type="password" name="rptpassword" id="rptpassword" required/>
        </div>

        <input type="submit" name="submit" value="Créer un nouvel utilisateur" />

    </form>

</div>

<?php include('footer.php'); ?>