<?php include_once('header.php'); ?>
<div id="body">
    <h2 style="padding: 2%">Tous les utilisateurs</h2>

    <?php
        if(isset($_SESSION['is_admin'])) {
            ?>
            <div style="text-align: center; width: 100%;">
                <p style="width: 50%; margin: auto;">
                    Vous êtes connecté en tant que gestionnaire <span style='color: gray'>(<?=$_SESSION['usr_pseudo'];?>)</span>.
                    Vous êtes donc responsables de toute modification des données du site.
                </p>
            </div>
            <?php
        }
    ?>
    
    <?php
        // Si l'utilisateur est un administrateur.
        if($_SESSION['usr_pseudo'] && isset($_SESSION['is_admin'])) {
            ?>
            <div>
                <ul class="liste">
                    <li class="liste-li">
                        <a href="manage_user.php?action=new_users">Activer les comptes (<?php 
                            $sql = "SELECT COUNT(usr_pseudo) as nb_users FROM t_profil_prf WHERE prf_valide != 'A'";
                            $res = $mysqli->query($sql);

                            while($count=$res->fetch_assoc()) {
                                echo $count['nb_users'] . " non activés";
                            }
                        ?>)</a>
                    </li>
                </ul>
            </div>
            <?php   
        }
    ?>
    <div>
        <ul style="display: flex; flex-wrap: wrap; width: 100%; list-style: none;">
            <?php
                $sql = "SELECT * FROM t_utilisateur_usr JOIN t_profil_prf USING (usr_pseudo) WHERE prf_valide='A'";

                if(!$results = $mysqli->query($sql)) {
                    echo "Impossible de récupérer les utilisateurs.";
                }else {
                    while($user = $results->fetch_assoc()) {
                        ?>
                        <li style="width: 40%; margin: 1%; padding: 1%; border: 1px solid green;">
                            <div>
                                <h3><?=$user['usr_pseudo']; ?></h3>
                                <a href="profil.php?pseudo=<?=$user['usr_pseudo']; ?>">Voir ce profil</a>
                                <?php
                                    if(isset($_SESSION['is_admin'])) {
                                        ?>
                                        <a href="manage_user.php?action=desactivate&usr_pseudo=<?=$user['usr_pseudo'];?>">Désactiver ce compte</a>
                                        <?php
                                    }
                                ?>
                            </div>
                        </li>
                        <?php
                    }
                }
            ?>
        </ul>
    </div>
</div>
<?php include_once('footer.php'); ?>