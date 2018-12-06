<?php
    include_once "header.php";

    if(!isset($_GET['tag_numero'])) {
        header('Location: tags.php');

    } else if(isset($_GET['action'])) {
        if($_GET['action']=="delete") {

            $tag_numero = $_GET['tag_numero'];

            $sql = "DELETE FROM tj_tag_lien WHERE tag_numero = $tag_numero;";
            $sql .= "DELETE FROM t_tag_tag WHERE tag_numero = $tag_numero";

            $req = $mysqli->multi_query($sql);
            if($req) {
                header('location: tags.php');
            }
        }
    } else {
        $sjt_numero = 0;
        $tag_numero = $_GET['tag_numero'];
        $sql = "SELECT *
            FROM t_tag_tag
            JOIN t_sujet_sjt USING (sjt_numero)
            LEFT JOIN tj_tag_lien USING (tag_numero)
            LEFT JOIN t_hyperlien_hln USING (hln_numero)
            WHERE tag_numero = $tag_numero";
        $req = $mysqli->query($sql);
?>

<div id="body">

    <div id="content">

        <?php

            if($req) {
                while($tag = $req->fetch_assoc()) {
                    $sjt_numero = $tag['sjt_numero'];
                    ?>
                    <div class="tag-info">
                        <div>
                            <p>
                                Ce tag est publié dans le sujet <?=$tag['sjt_intitule'];?>.
                                <a href="sujets.php">Voir les autres sujets</a>
                            </p>
                        </div>
                        <div>
                            <h2><?= $tag['tag_label'];?></h2>
                            <div class="img-container">
                                <img src="<?=$tag['tag_image'];?>" alt="<?=$tag['tag_label'];?>" />
                            </div>
                            <p class="texte"><?=nl2br($tag['tag_contenu']);?></p>
                        </div>
                    </div>
                    <h3>Tags du même sujet</h3>
                    <div class="tags">
                        <?php
                            $sql = "SELECT * FROM t_tag_tag JOIN t_sujet_sjt USING (sjt_numero) WHERE tag_etat='A' AND sjt_numero=$sjt_numero AND tag_numero != $tag_numero ORDER BY tag_numero DESC LIMIT 4";
                            $req = $mysqli->query($sql);

                            if($req) {
                                while($tag = $req->fetch_assoc()) {
                                ?>
                                <div class="tag-container">
                                    <div>
                                        <a href="tag.php?tag_numero=<?=$tag['tag_numero']; ?>"><?=$tag['tag_label']; ?></a>
                                    </div>
                                    <div>
                                        <img src="<?=$tag['tag_image'];?>" alt="<?=$tag['tag_label'];?>" width="100" height="100" />
                                    </div>
                                </div>
                                <?php
                                }
                            }
                        ?>
                    </div>
                    <?php
                        $sql = "SELECT * FROM t_tag_tag LEFT JOIN tj_tag_lien USING (tag_numero) LEFT JOIN t_hyperlien_hln USING (hln_numero) WHERE tag_numero='$tag_numero'";
                        $req = $mysqli->query($sql);

                        if($req) {
                    ?>
                    <div>
                        <h3>Hyperliens associés au tag</h3>
                        <?php
                            while($hln = $req->fetch_assoc()) {
                                ?>
                                <div class="hyperlien">
                                    <a href=""><?=$hln['hln_url']; ?></a>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                    <?php
                        }
                }
            }

        ?>

    </div>

</div>

<?php
    }
    include_once "footer.php";
?>