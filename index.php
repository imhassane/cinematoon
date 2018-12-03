<?php
	session_start();
	
	include('config.php');
	$mysqli = newConnection('localhost', 'root', '', 'zfl2-zsowth000');
	if($mysqli->connect_errno) {
		echo "Une erreur s'est produite lors de la connexion";
	}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Cinematoon</title>
</head>
<body>
<?php
		if(isset($_SESSION['usr_pseudo'])){
			?>
			<div id="top-menu">
				<ul>
					<li>
						<a href="pages/new_sujet.php">Ajouter un sujet</a>
					</li>
					<li>
						<a href="pages/new_tag.php">Publier un tag</a>
					</li>
				</ul>
			</div>
			<?php
		}
		?>
    <div id="page">
<div id="header">
			<h1><a href="index.php" id="logo" style="text-align: center; color: green; font-size: large; text-decoration: none;">Cinematoon</a></h1>
			<ul>
				<li>
					<a href="index.php">Home</a>
				</li>
				<li class="current">
					<a href="pages/about.php">About</a>
				</li>
				<li>
					<a href="pages/sujets.php">Sujets</a>
				</li>
				<li>
					<a href="pages/tags.php">Tags</a>
				</li>
				<li>
					<a href="pages/news.php">News</a>
					<ul>
						<li>
							<a href="pages/article.php">Article</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="pages/users.php">Utilisateurs</a>
					<ul>
					<?php
							if(isset($_SESSION['usr_pseudo'])) {
								echo "
									<li>
										<a href='pages/logout.php'>Déconnexion</a>
									</li>
								";
							}else {
								?>
								<li>
									<a href="pages/login.php">Connexion</a>
								</li>
								<li>
									<a href="pages/register.php">Inscription</a>
								</li>
								<?php
							}
						?>
					</ul>
				</li>
			</ul>
		</div>
		<div id="body">
			<div class="body">
				<h1>Derniers sujets</h1>
				<ul>
					<?php
						$sql = "SELECT * FROM t_sujet_sjt";
						if(!$results = $mysqli->query($sql)) {
							echo "Impossible d'afficher les sujets";
						}else {
							while($sujet = $results->fetch_assoc()){
								?>
								<li style="border: 1px solid silver; padding: 20px; margin: 5px;">
									<span><?= $sujet['sjt_intitule']; ?></span>
								</li>
								<?php
							}
						}
					?>
				</ul>
			</div>
			<div class="footer">
				<img width="320" src="https://www.cgrcinemas.fr/montauban/fichier/image/cap-cinema-Montauban-sd-1604074501-S-6436B.jpg" alt="Image">
				<div>
					<h1>Tags de la semaine</h1>
					<ol>
						<?php
							$sql = "SELECT * FROM t_tag_tag";
							if(!$results = $mysqli->query($sql)) {
								echo "Impossible d'afficher les tags";
							}else {
								while($tag = $results->fetch_assoc()){
									?>
									<li style="border: 1px solid silver; padding: 20px; margin: 5px;">
										<span><?= $tag['tag_label']; ?></span>
									</li>
									<?php
								}
							}
						?>
					</ol>
				</div>
			</div>
		</div>
		<?php include('pages/footer.php'); ?>
	</div>
</body>
</html>