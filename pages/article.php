<?php include('header.php'); ?>
<div id="body">
	<div id="content">
		<div id="article">
			<?php
				if(!isset($_GET['id'])) header('Location: index.php');

				$sql = "SELECT * FROM t_actualite_act WHERE act_numero='".$_GET['id']."'";

				if(!$res = $mysqli->query($sql)) {
					echo "Cet article n'existe pas";
				}else {
					while($act = $res->fetch_assoc()) {
						?>
							<h1><?=$act['act_titre']; ?></h1>
							<span>Date: <?=$act['act_date_aj']; ?></span>
							<span>Publié par: <?=$act['usr_pseudo']; ?></span>
							<p>
							<?=nl2br($act['act_text']); ?>
							</p>
						<?php
					}
				}
			?>
		</div>
		<div id="sidebar">
			<div>
				<h3>Recent Articles</h3>
				<ul>
					<li>
						<a href="article.html">Integer lobortis auctor dolor sed convallis nullam egestas...</a>
					</li>
					<li>
						<a href="article.html">Fusce fringilla blandit augue dapibus lobortis integer...</a>
					</li>
					<li>
						<a href="article.html">Maecenas ornare augue vitae adipiscing ultrices...</a>
					</li>
					<li>
						<a href="article.html">Class aptent taciti sociosqu ad litora torquent per conubia nostra, per</a>
					</li>
				</ul>
			</div>
			<div>
				<h3>Place Holder</h3>
				<p>
					Phasellus eleifend fringilla gravida. Etiam ultrices convallis sodales. Proin id quam ante, sed dignissim mi. Sed cursus nulla vel turpis convallis ultricies. Cras nec velit nec turpis aliquet aliquet id imperdiet libero.
				</p>
			</div>
		</div>
	</div>
</div>

<?php include('footer.php'); ?>