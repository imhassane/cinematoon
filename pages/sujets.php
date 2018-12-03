<?php include('header.php'); ?>
<div id="body">
	<div id="content">
		<h1>Liste des sujets</h1>
		<h3><strong>Nous vous proposons nos sujets</strong></h3>
		<p>
			Etiam sed auctor turpis. Maecenas orci purus, ultrices eget rhoncus in, vestibulum a justo. Nunc in risus erat. Praesent sodales neque ut eros vulputate sagittis. Nullam risus mi, rhoncus in laoreet dapibus, ullamcorper eu nisi. Sed accumsan lacus sit amet nisl pulvinar bibendum. Phasellus eleifend fringilla gravida.
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