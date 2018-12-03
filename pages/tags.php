<?php include('header.php'); ?>
<div id="body">
	<div id="content">
		<h1>Les tags</h1>
		<h3><strong>This is just a place holder, so you can see what the site would look like.</strong></h3>
		<p>
			Proin vel velit vitae nisl mattis aliquam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla scelerisque diam sit amet odio vestibulum porta. Ut aliquam accumsan augue, quis mollis purus pretium sit amet. Nullam dolor mi, tempus ullamcorper lobortis a, feugiat quis leo.
		</p>
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
					</div>
					<?php
					}
				}
			?>
		</ul>
	</div>
</div>

<?php include('footer.php'); ?>