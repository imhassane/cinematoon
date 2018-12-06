<?php include('header.php'); ?>
<div id="body">
	<div id="content">
		<h1>Liste des sujets</h1>
		<?php
			if(isset($_SESSION['is_admin']) && $_SESSION['is_admin']) {
				?>
				<div>
				
				</div>
				<?php
			}
		?>
		<h3><strong>Nous vous proposons nos sujets</strong></h3>
		<p>
			Les sujets sont publiés par les membres du site web cinematoon.
		</p>
		<h2>Liste des sujets</h2>
		<ul style="list-style: none;">
			<?php
				$sql = "SELECT * FROM t_sujet_sjt ORDER BY sjt_numero DESC";

				if(!$results = $mysqli->query($sql)) {
					echo "Impossible de récuperer les sujets.";
				}else{
					while($sujet = $results->fetch_assoc()){
						?>
							<li style="width: 50%">
								<div>
									<h3 style=""><?=$sujet['sjt_intitule']; ?></h3>
								</div>
							</li>
						<?php
					}
				}
			?>
		</ul>
	</div>
</div>

<?php include('footer.php'); ?>