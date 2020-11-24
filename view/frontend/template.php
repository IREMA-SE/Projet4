<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blog JF</title>
        <title>JF Blog | Accueil </title>
        <link rel="icon" type="image/png" sizes="16x16" href="public/images/favicon-16x16.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="public/css/style.css?v=2" rel="stylesheet" /> 
    </head>
        
    <body>

		<!--JS FOR TEXT EDITOR-->
		<script src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.1/tinymce.min.js"></script>
        <script type="text/javascript">
    			tinymce.init({
					selector: '#txtarea'
				});
		</script>
		
		<!--//BODY SECTION TOP HEADER MENU-->
		<div class="container">
        		<div class="topbanner"> 
        			<a href="index.php">JF</a>
        		</div>
        		<!--BODY SECTION HEADER MENU-->
        		
                <header class="header">

                    <a href="" class="logo"><h1>Jean Forteroche</h1>
                    <p id="fonction-jf">Acteur et Ecrivain</p>
                    </a>
                    <input class="menu-btn" type="checkbox" id="menu-btn" />
                    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
                    <ul class="menu">
					<li><a href="index.php">Accueil</a></li>
        			<?php
        				if(isset($_SESSION["logged"]) && $_SESSION["logged"] == 1){
        					if($user["level"] == 1){
        						?>
        						<li><a href="index.php?action=users">Les utilisateurs</a></li>
        						<li><a href="index.php?action=listcomments">Commentaires à valider</a></li>
        						<?php
        					}
        					?>
        					<li><a href="index.php?action=logout">Se déconnecter</a></li>
        					<?php
        				}else{
        					?>
        					<li><a href="index.php?action=register">S'inscrire</a></li>
        					<li><a href="index.php?action=login">Se connecter</a></li>
        					<?php
        				}
        			?>
										
                    </ul>
				</header>
        		
        		<!--BODY SECTION MAIN TOP-->
        		<?php if (isset($_SESSION['user']['username'])) { ?>
        		<div class="logged_in_info">
        				<span>Bonjour et Bienvenue <?php echo $_SESSION['user']['username'] ?></span>
        				|
        				<span><a href="logout.php">logout</a></span>
        		</div>
        		<?php }else{ ?>
        		<div class="banner">
        				<div class="welcome_msg">
							<div class="welcome-txt">
								<span id="letitreduroman">Billet simple pour l'Alaska</span><br>
									Billet simple pour l'Alaska est le titre de mon prochain roman sur lequel<br> 
									je travaille actuellement. Je vais le publier par épisode sur ce blog. <br>Bonne lecture!
							</div>
							<div class="welcome-img">
								<img src="public//images/jf.png" alt="Photo portrait de Jean Forteroche">
							</div>
        				</div>
        		</div>
                
                
                
                <!--DEBUT CONTENT-->
                  <?php 
                  }
                  
                  if(isset($_GET["error"]) && $_GET["error"]){
					echo '<p class="error">'.$_GET["error"].'</p>';
				}
                  
                  
                  echo $content; ?>
				<!--FIN CONTENT-->
                
                
                
        		<!--BODY SECTION FOOTER-->
        		<div class="footer">
        			<p>Blog Jean Forteroche &copy; <?php echo date('Y'); ?></p>
        		</div>
        </div>
		<!-- // footer -->
    </body>
</html>