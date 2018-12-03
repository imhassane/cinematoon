<?php
    include_once "header.php";
?>

<div id="body">

    <div id="content">

        <?php

            if($_SESSION['prf_statut'] == 'M' || $_SESSION['prf_statut'] == 'G') {

                if(isset($_POST['submit'])) {
                    $sjt_intitule = htmlspecialchars(trim($_POST['sjt_intitule']));
            
                    if(strlen($sjt_intitule) < 4) {
                        echo "<p style='color: red; padding: 1%; border: 1px solid red;'>L'intitulé doit contenir au moins 5 caractères</p>";
                    }else {
                        $sql = "SELECT @id := MAX(sjt_numero) FROM t_sujet_sjt;";
                        $sql .= "INSERT INTO t_sujet_sjt VALUES (@id+1, '$sjt_intitule', NOW(), '" . $_SESSION['usr_pseudo'] . "')";
                        $req = $mysqli->multi_query($sql);

                        if($req) {
                            echo "<p style='color: green; padding: 1%; border: 1px solid green;'>Le sujet a été ajouté avec succès</p>";
                        }else {
                            echo $mysqli->error;
                        }
                    }
                }

        ?>

        <h2>Ajout d'un nouveau sujet</h2>

        <form action="#" method="post">
        
            <div class="form-fields">

                <label for="sjt_intitule">Intitulé du sujet</label>
                <input type="text" name="sjt_intitule" id="sjt_intitule" placeholder="Ex: Billeterie..."/>
            
            </div>

            <input type="submit" value="Ajouter le nouveau sujet" name="submit" />    
        
        </form>

        <?php
            } else {
                echo "<p>Votre statut ne vous permet pas d'ajouter ou de modifier du contenu.</p>";
            }

        ?>

    </div>

</div>

<?php
    include_once "footer.php";
?>