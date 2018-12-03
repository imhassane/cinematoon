<?php include('header.php'); ?>
<div id="body">
	<div id="content">
		<h1>Contact</h1>
		<form action="index.php">
			<p>
				Laissez nous un message
			</p>
			<label for="name"><span>Name:</span><span>
				<input type="text" id="name">
				</span></label>
			<label for="address"><span>Address:</span><span>
				<input type="text" id="address">
				</span></label>
			<label for="telephone"><span>Telephone Number:</span><span>
				<input type="text" id="telephone">
				</span></label>
			<label for="subject"><span>Subject:</span><span>
				<input type="text" id="subject">
				</span></label>
			<label for="message"><span>Message:</span><span class="message">
				<textarea name="message" id="message" cols="30" rows="10"></textarea>
				</span></label>
			<input type="submit" id="send" value="Send">
		</form>
	</div>
</div>

<?php include('footer.php'); ?>