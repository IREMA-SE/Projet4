
<?php if (isset($_SESSION['user']['username'])) { ?>
	<div class="logged_in_info">
		<span>Bonjour et Bienvenue <?php echo $_SESSION['user']['username'] ?></span>
		|
		<span><a href="logout.php">logout</a></span>
	</div>
<?php }else{ ?>
	<div class="banner">
		<div class="welcome_msg">
			<h1>"Billet simple pour l'Alaska"</h1>
			<p> 
			    est mon prochain roman sur lequel <br> 
			    je travaille actuellement. <br> 
			    Je vais le publier par épisode<br>
			    sur ce site. Bonne lecture!
				<span></span>
			</p>
		</div>

		<div class="login_div">
			<form action="<?php echo BASE_URL . 'index.php'; ?>" method="post" >
				<h2>Se connecter</h2>
				<div style="width: 60%; margin: 0px auto;">
				</div>
				<input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username">
				<input type="password" name="password"  placeholder="Password"> 
				<button type="submit" class="btn" name="login_btn">Login</button>
				<a href="inscription.php" class="btn" id="inscription">Pas de compte? S'inscrire</a>
			</form>
		</div>
	</div>
<?php } ?>