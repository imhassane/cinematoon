<?php
    include_once "header.php";

    
?>

<div id="body">

    <div id="content">

        <?php

            if($_SESSION['prf_statut'] == 'M' || $_SESSION['prf_statut'] == 'G') {

                if(isset($_POST['submit'])) {
                    $tag_label = htmlspecialchars(trim(addslashes($_POST['tag_label'])));
                    $tag_contenu = htmlspecialchars(trim(addslashes($_POST['tag_contenu'])));
                    $tag_sujet = htmlspecialchars(trim(addslashes($_POST['tag_sujet'])));
                    
                    $upload_dir = $IMAGE_UPLOAD_DIR . basename($_FILES['tag_image']['name']);

                    if(strlen($tag_label) < 5 || strlen($tag_contenu) < 10) {
                        echo "<p style='color: red; padding: 1%; border: 1px solid red'>Les informations saisies ne sont pas correctes.</p>";
                    } else {

                        if(move_uploaded_file($_FILES['tag_image']['tmp_name'], $upload_dir)) {

                                $sql = "SELECT @id := MAX(tag_numero) FROM t_tag_tag;";
                                $sql .= "INSERT INTO t_tag_tag VALUES (@id+1, '$tag_label', '$tag_contenu', '$upload_dir', 'A', '$tag_sujet')";
                                $req = $mysqli->multi_query($sql);

                                if($req) {
                                    echo "<p style='color: green; padding: 1%; border: 1px solid green'>Le tag a été ajouté avec succès</p>";
                                }else {
                                    echo $mysqli->error;
                                }
                        }
                    }
                }

        ?>

        <h2>Ajout d'un nouveau tag</h2>

        <form action="#" method="post" enctype="multipart/form-data">
        
            <div class="form-fields">

                <label for="tag_label">Label du tag</label>
                <input type="text" name="tag_label" id="tag_label" />
            
            </div>

            <div class="form-fields">

                <label for="tag_contenu">Contenu du tag</label>
                <textarea name="tag_contenu" id="tag_contenu" cols="30" rows="10">
                </textarea>

            </div>

            <div class="form-fields">

                <label for="tag_image">Image du tag</label>
                <input type="file" name="tag_image" id="tag_image" />

            </div>

            <div class="form-fields">
                
                <label for="tag_sujet">Sujet du tag</label>

                <select name="tag_sujet" id="tag_sujet">
                    <?php

                        $sql = "SELECT sjt_numero, sjt_intitule FROM t_sujet_sjt";
                        $req = $mysqli->query($sql);

                        if($req) {
                            while($sjt = $req->fetch_assoc()) {
                                echo "<option value=".$sjt['sjt_numero'] .">".$sjt['sjt_intitule'] ."</option>";
                            }
                        }

                    ?>
                </select>

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