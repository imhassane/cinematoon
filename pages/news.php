<?php include('header.php'); ?>
<div id="body">
	<div id="content">

		<div class="articles-container">

			<div class="articles">
				<?php
					$sql = "SELECT * FROM t_actualite_act WHERE act_etat='V'";
					if(!$res = $mysqli->query($sql)) {

					} else {
						while($act = $res->fetch_assoc()) {
							?>
							<div id="article">
								<h2><?= $act['act_titre']; ?></h2>
								<span><?= $act['act_date_aj']; ?></span>
								<span>Publié par: <?= $act['usr_pseudo']; ?></span>
								<p>
									<?= $act['act_titre']; ?>
								</p>
								<p>
									<a href="article.php?id=<?=$act['act_numero']; ?>">Lire la suite</a>
								</p>
								<hr />
							</div>
							<?php
						}
					}
				?>
			</div>
			<div id="sidebar">
				<div>
					<h3>Dernieres news</h3>
					<ul>
						<?php
							$sql = "SELECT act_titre, act_numero FROM t_actualite_act WHERE act_etat='V' ORDER BY act_numero DESC LIMIT 3";
							if(!$res = $mysqli->query($sql)) {

							} else {
								while($act = $res->fetch_assoc()) {
									?>
									<li>
										<a href="article.php?id=<?=$act['act_numero']; ?>"><?= $act['act_titre']; ?></a>
									</li>
									<?php
								}
							}
						?>
					</ul>
				</div>
				<div>
					<h3>Archives</h3>
					<ul>
						<li>
							<a href="article.html">2018</a>
						</li>
						<li>
							<a href="article.html">2017</a>
						</li>
						<li>
							<a href="article.html">2016</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('footer.php'); ?>