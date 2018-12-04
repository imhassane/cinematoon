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
            $pseudo = htmlspecialchars(trim(addslashes($_POST['pseudo'])));
            $password = htmlspecialchars(trim(addslashes($_POST['password'])));

            if(strlen($pseudo) < 5 || strlen($password) < 5) {
                echo "  <p style='text-align: center; margin: 2%; padding: 2%; background-color: silver; color: red;'>
                            Votre pseudo ou mot de passe doit contenir au moins 5 caractères.
                        </p>";
            }else {
                $sql =  "SELECT * FROM t_utilisateur_usr JOIN t_profil_prf USING (usr_pseudo)".
                        "WHERE usr_pseudo='$pseudo' AND usr_mpasse=MD5('$password')";
                
                if(!$res = $mysqli->query($sql)) {
                    echo "
                    <p style='text-align: center; margin: 2%; padding: 2%; background-color: silver; color: red;'>
                        Une erreur s'est produite lors de la connexion à votre compte.
                    </p>
                    ";
                }else {
                    if(!$res->num_rows) {
                        echo "
                        <p style='text-align: center; margin: 2%; padding: 2%; background-color: silver; color: red;'>
                            Aucun compte ne correspond à ces identifiants.
                        </p>
                        ";
                    }

                    // On crée une session pour l'utiliateur.
                    while($user = $res->fetch_assoc()) {
                        if($user['prf_valide'] != 'A') {
                            echo "<p style='color: red; text-align: center; padding: 2%; border: 1px solid red'>Votre compte n'est pas actif</p>";

                        } else {
                            $_SESSION['usr_pseudo'] = $user['usr_pseudo'];
                            $_SESSION['prf_statut'] = $user['prf_statut'];

                            // Si l'utilisateur est un gestionnaire.
                            if(strtoupper($user['prf_statut'])=='G')
                                $_SESSION['is_admin'] = true;
                            
                            header('Location: ../index.php');
                        }
                    }
                }


            }
        }
    ?>

    <h2 style="color:white; text-align: center;">Connexion</h2>

    <form action="#" method="post">

        <div>
            <label for="pseudo">Entrez votre pseudo</label>
            <input type="text" name="pseudo" id="pseudo" />
        </div>

        <div>
            <label for="password">Entrez votre mot de passe</label>
            <input type="password" name="password" id="password" />
        </div>

        <div>
            <input type="submit" name="submit" value="Accéder à votre compte" />
        </div>

    </form>

</div>

<?php include('footer.php'); ?>