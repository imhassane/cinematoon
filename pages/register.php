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
            $pseudo = htmlspecialchars(trim($_POST['pseudo']));
            $email = htmlspecialchars(trim($_POST['email']));
            $password = htmlspecialchars(trim($_POST['password']));
            $rptpassword = htmlspecialchars(trim($_POST['rptpassword']));

            if($password != $rptpassword || strlen($password) < 3) {
                echo "  <p style='text-align: center; margin: 2%; padding: 2%; background-color: silver; color: red;'>
                            Vos mots de passes ne sont pas identiques.
                        </p>";
            } else if(strlen($pseudo) < 5) {
                echo "  <p style='text-align: center; margin: 2%; padding: 2%; background-color: silver; color: red;'>
                            Votre pseudo doit contenir au moins 5 caractères.
                        </p>";
            }else {
                $sql1 = "INSERT INTO t_utilisateur_usr VALUES ('$pseudo', MD5('$password'))";
                $sql2 = "INSERT INTO t_profil_prf(prf_valide, prf_statut, usr_pseudo, prf_email, prf_date_aj) VALUES ('D', 'M', '$pseudo', '$email', NOW())";
                
                $res1 = $mysqli->query($sql1);
                $res2 = $mysqli->query($sql2);

                if(!($res1 && $res2)) {
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

        <div>
            <label for="pseudo">Entrez votre pseudo</label>
            <input type="text" name="pseudo" id="pseudo" />
        </div>

        <div>
            <label for="email">Entrez votre adresse email</label>
            <input type="email" name="email" id="email" />
        </div>

        <div>
            <label for="password">Entrez votre mot de passe</label>
            <input type="password" name="password" id="password" />
        </div>

        <div>
            <label for="rptpassword">Repetez votre mot de passe</label>
            <input type="password" name="rptpassword" id="rptpassword" />
        </div>

        <div>
            <input type="submit" name="submit" value="Créer un nouvel utilisateur" />
        </div>

    </form>

</div>

<?php include('footer.php'); ?>