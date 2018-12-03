<?php
	session_start();
	
	include('../config.php');
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
    <link rel="stylesheet" href="../css/style.css">
    <title>Cinematoon</title>
</head>
<body>
	<?php
		if(isset($_SESSION['usr_pseudo'])){
			?>
			<div id="top-menu">
				<ul>
					<li>
						<a href="new_sujet.php">Ajouter un sujet</a>
					</li>
					<li>
						<a href="new_tag.php">Publier un tag</a>
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
					<a href="../index.php">Home</a>
				</li>
				<li class="current">
					<a href="about.php">About</a>
				</li>
				<li>
					<a href="sujets.php">Sujets</a>
				</li>
				<li>
					<a href="tags.php">Tags</a>
				</li>
				<li>
					<a href="news.php">News</a>
					<ul>
						<li>
							<a href="article.php">Article</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="users.php">Utilisateurs</a>
					<ul>
						<?php
							if(isset($_SESSION['usr_pseudo'])) {
								echo "
									<li>
										<a href='logout.php'>Déconnexion</a>
									</li>
								";
							}else {
								?>
								<li>
									<a href="login.php">Connexion</a>
								</li>
								<li>
									<a href="register.php">Inscription</a>
								</li>
								<?php
							}
						?>
					</ul>
				</li>
			</ul>
		</div>