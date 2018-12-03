<div id="footer">
				<div>
						<div>
							<h1>Hyperliens</h1>
							<ul>
								<?php
									$sql = "SELECT * FROM t_hyperlien_hln ORDER BY hln_numero DESC LIMIT 3";
									
									// Si il y a des erreurs.
									if(!$result = $mysqli->query($sql)) {
										echo $mysqli->error;
									}else {
										while($hyperlien = $result->fetch_assoc()) {
											?>
												<li style="border-bottom: 1px solid silver; padding: 5px">
													<a href="<?=$hyperlien['hln_url'];?>"><?=$hyperlien['hln_nom'];?></a>
												</li>
											<?php
										}
									}
								?>
							</ul>
						</div>
						<div>
							<h1>Tags</h1>
							<ul>
								<?php
									$sql = "SELECT * FROM t_tag_tag ORDER BY tag_numero DESC LIMIT 3";
									
									// Si il y a des erreurs.
									if(!$result = $mysqli->query($sql)) {
										echo $mysqli->error;
									}else {
										while($tag = $result->fetch_assoc()) {
											?>
												<li style="border-bottom: 1px solid silver; padding: 5px">
													<a href="tags.php"><?=$tag['tag_label'];?></a>
												</li>
											<?php
										}
									}
								?>
							</ul>
						</div>
						<div>
							<h1>Sujets</h1>
							<ul>
								<?php
									$sql = "SELECT * FROM t_sujet_sjt ORDER BY sjt_date_aj DESC LIMIT 3";
									
									// Si il y a des erreurs.
									if(!$result = $mysqli->query($sql)) {
										echo $mysqli->error;
									}else {
										while($sujet = $result->fetch_assoc()) {
											?>
												<li style="border-bottom: 1px solid silver; padding: 5px">
													<a href="sujet.php"><?=$sujet['sjt_intitule'];?></a>
												</li>
											<?php
										}
									}
								?>
							</ul>
						</div>
						<div>
							<h1>Connect</h1>
							<a href="http://www.freewebsitetemplates.com/misc/contact" target="_blank" id="mail">Email us</a>
							<a href="http://freewebsitetemplates.com/go/facebook/" target="_blank" id="facebook">Facebook</a>
							<a href="http://freewebsitetemplates.com/go/twitter/" target="_blank" id="twitter">Twitter</a>
							<a href="http://freewebsitetemplates.com/go/googleplus/" target="_blank" id="googleplus">Google&#43;</a>
						</div>
					</div>
			<p>
				Cinematoon &copy; 2018  | Tous droits réservés
			</p>
		</div>
	<?php closeConnection($mysqli); ?>

    </div>
</body>
</html>