<?php include('header.php'); ?>
<div id="body">
	<div id="content">
		<h1>Les tags</h1>
		<h3><strong>Vous pouvez aussi utiliser les QR-CODE pour afficher un tag</strong></h3>
		<p>
			Les tags sont ajoutés par les membres de notre site et sont modérés par nos gestionnaires.
		</p>
		<h1>Liste des tags</h1>
		<ul class="tags">
			<?php
				$sql = "SELECT * FROM t_tag_tag JOIN t_sujet_sjt USING (sjt_numero) WHERE tag_etat='A' ORDER BY tag_numero DESC";
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
						<?php
							if(isset($_SESSION['is_admin']) && $_SESSION['is_admin']) {
						?>
						<div>
							<ul>
								<li>
									<a href="new_tag.php?action=update&tag_numero=<?=$tag['tag_numero'];?>">Modifier</a>
								</li>
								<li>
									<a href="tag.php?action=delete&tag_numero=<?=$tag['tag_numero'];?>">Supprimer</a>
								</li>
							</ul>
						</div>
						<?php
							}
						?>
					</div>
					<?php
					}
				}
			?>
		</ul>
	</div>
</div>

<?php include('footer.php'); ?>