<?php include_once('header.php'); ?>
<div id="body">
    <h2 style="padding: 2%">Gestion des utilisateurs</h2>

    <?php
        if(isset($_SESSION['is_admin'])) {
            ?>
            <div style="text-align: center; width: 100%;">
                <p style="width: 50%; margin: auto;">
                    Vous êtes connectés en tant que gestionnaire <span style='color: gray'>(<?=$_SESSION['usr_pseudo'];?>)</span>.
                    Vous êtes donc responsables de toute modification des données du site.
                </p>
            </div>
            <?php
        }
    ?>

    <div>
        <ul style="display: flex; flex-wrap: wrap; list-style: none;">
        <?php

            $action = $_GET['action'];

            if(!$action) {
                header('Location: ../index.php');
            }else {
                if($action == 'new_users') {
                    $sql = "SELECT * FROM t_utilisateur_usr JOIN t_profil_prf USING (usr_pseudo) WHERE prf_valide!='A'";
                    $res = $mysqli->query($sql);
                    
                    if($res) {
                        while($user = $res->fetch_assoc()) {
                        ?>
                            <li style="width: 40%; margin: 1%; padding: 1%; border: 1px solid green;">
                                <div>
                                    <h3><?=$user['usr_pseudo']; ?></h3>
                                    <a href="#">Voir ce profil</a>
                                    <a href="manage_user.php?action=activate&usr_pseudo=<?=$user['usr_pseudo'];?>">Activer ce compte</a>
                                </div>
                            </li>
                        <?php
                        }
                    }
                }else if($action == 'activate' && $usr_pseudo = $_GET['usr_pseudo']) {
                    // On active le compte de l'utilisateur.
                    $sql = "UPDATE t_profil_prf SET prf_valide = 'A' WHERE usr_pseudo = '$usr_pseudo'";
                    $res = $mysqli->query($sql);

                    header('Location: manage_user.php?action=new_users');

                }else if($action == 'desactivate' && $usr_pseudo = $_GET['usr_pseudo']){
                    // On active le compte de l'utilisateur.
                    $sql = "UPDATE t_profil_prf SET prf_valide = 'D' WHERE usr_pseudo = '$usr_pseudo'";
                    $res = $mysqli->query($sql);

                    header('Location: manage_user.php?action=new_users');

                }else {
                    header('Location: users.php');
                }
            }

        ?>
        </ul>
    </div>

<?php include_once('footer.php'); ?>