<?php
    include_once "header.php";

    // On récupère l'identifiant de l'utilisateur.
    if(!isset($_GET['pseudo'])) {
        header('Location: users.php');
    }

    $pseudo = $_GET['pseudo'];

    $sql = "SELECT * FROM t_utilisateur_usr JOIN t_profil_prf USING (usr_pseudo) WHERE usr_pseudo='$pseudo'";
    $req = $mysqli->query($sql);

    if(!$req) {
        echo $mysqli->error;
        die();
    } else {
?>

<div id="body">

    <div id="content">

        <?php

            while($user = $req->fetch_assoc()) {

            ?>
                <div id="profil-block">
                    <div id="profil-resume">
                        <h2>Nom d'utilisateur: <?= $user['usr_pseudo']; ?></h2>
                        <p>Inscrit dépuis: <?= $user['prf_date_aj']; ?></p>
                    </div>
                    <div id="profil-info">

                        <div id="sujets">
                            <?php
                                $sql = "SELECT * FROM t_sujet_sjt WHERE usr_pseudo='$pseudo'";
                                $req = $mysqli->query($sql);

                                if($req) {
                                    ?>
                                    <h3>Sujets publiés par <?=$pseudo;?> [<?=$req->num_rows;?> sujet(s) publié(s)]</h3>
                                    <?php
                                        if($req->num_rows == 0) {
                                            echo "<p>Aucun sujet n'a été publié par $pseudo</p>";
                                        }else {
                                            while($sujet = $req->fetch_assoc()) {
                                                ?>
                                                <div>
                                                    <h4><?=$sujet['sjt_intitule'];?></h4>
                                                </div>
                                                <?php
                                            }
                                        }
                                    ?>
                                    <?php
                                }
                            ?>
                        </div>

                    </div>
                </div>
            <?php
            }
        ?>
    
    </div>

</div>

<?php
    }
    include_once "footer.php";
?>