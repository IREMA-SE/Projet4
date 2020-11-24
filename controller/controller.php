<?php
session_start();
require_once("model/postsManager.php");
require_once("model/commentsManager.php");
require_once("model/usersManager.php");

$pstmanger = new PostManager();
$usermanger = new usersManager();
$commentmanger = new CommentManager();
 
$user = getuser();

 function listPosts()
{
	global $pstmanger;
    $posts = $pstmanger->getPosts();
		
	global $user;
    require('view/frontend/listPostsView.php');
}

function listcomments(){
	global $user;
	if($user["level"] != 1){
		header("location:index.php?error=" . urlencode("Accès non autorisé!"));
	}
	
	global $commentmanger;
	$posts = $commentmanger->getallcomments();
	global $user;
    require('view/frontend/listCommentsView.php');
}

function disp($id, $postid){
	global $commentmanger;
	$commentmanger->appovcomment($id, 0);
	
	header("location:index.php?action=post&id=" . $postid . "&error=" . urlencode("Commentaire signalé comme non conforme et envoyé à l'administrateur."));
}
function delpost($id){
	global $user;
	$isauth = 0;
	
	if($user["level"] != 1){
		header("location:index.php?error=".urlencode("Accès non autorisé!"));
	}
	
	if($user['level'] == 1){
		$isauth = 1;
	}
	
	global $pstmanger;
	$pstmanger->delPost($_GET['id']);
	
	header("location:index.php?error=".urlencode("Contenu supprimé avec succès!"));
}
function post()
{
	global $user;
	$isauth = 0;
	if($user != null){
		$isauth = 1;
	}	
		global $commentmanger;
		global $pstmanger;
		$post = $pstmanger->getPost($_GET['id']);
		$comments = $commentmanger->getComments($_GET['id']);
		require('view/frontend/postView.php');
	//}
    
}
function logout(){
	global $user;
	$username = $user["name"];
	session_destroy();
    
	header("location:index.php?error=".urlencode($username."! A bientôt!"));
}

function showregister(){
	$error = '';
	$name = '';
	require('view/frontend/register.php');
}

function showlogin(){
	require('view/frontend/login.php');
}
function listusers(){
	global $user;
	if($user["level"] != 1){
		header("location:index.php?error=" . urlencode("Accès non autorisé!"));
	}else{
		global $usermanger;
		$posts = $usermanger->getUsers($user["Id"]);
		require('view/frontend/listUsersView.php');
	}
	
}

function dologin($email, $password){
	global $usermanger;
	$result = $usermanger->loginfun($email, $password);
	
	if($result != null){
		$logid = $result["Id"];
		$_SESSION["logid"] = $logid;
		$_SESSION["logged"] = 1;
		
		$username = $result["name"];
		
		header("location:index.php?error=" . urlencode("Héé ".$username."! Bienvenue!"));
	}else{
		showlogin();
	}
}

function getuser(){
	$user = null;
	
	if(isset($_SESSION["logged"]) && $_SESSION["logged"] > 0){
		global $usermanger;
		$user = $usermanger->get_user($_SESSION["logid"]);
	}
	return $user;
}

function adduserform($id=0){
	global $usermanger;
	global $user;
	$error = '';
	
	if($user["level"] != 1){
		header("location:index.php?error=" .urlencode("Accès non autorisé!"));
	}
	
	
	if($id != 0){
		$upuser = $usermanger->get_user($id);
		$userid = $upuser["Id"];
		$name = $upuser["name"];
		$email = $upuser["email"];
		$password = $upuser["password"];
		$userlevel = $upuser["level"];
	}else{
		$userid = 0;
		$name = "";
		$email = "";
		$password = "";
		$userlevel = 0;
	}
	require('view/frontend/userAdd.php');
	
}

function showaddblog(){
	global $user;
	
	if($user == null ){
		header("location:index.php?action=login");
	}
	
	if($user["level"] != 1){
		header("location:index.php?error=" . urlencode("Accès non autorisé!"));
	}
	
	
	if(isset($_GET["id"])){
		global $pstmanger;
		$post = $pstmanger->getPost($_GET['id']);
		$postid = $post["id"];
		$title = $post["title"];
		$content = $post["content"];
	}else{
		$postid = 0;
		$title = "";
		$content = "";
	}
	require('view/frontend/postAdd.php');
	
}
function approvecomment($id, $act){
	global $commentmanger;
	$apcmt = $commentmanger->appovcomment($id, $act);
	if($apcmt == false){
		throw new Exception('Impossible demettre à jour ce commentaire!');
	}else{
		header('Location: index.php?action=listcomments&error=' . urlencode('Commentaire validé et publié'));
	}
}

function registeruser($email, $password, $name){
	global $usermanger;
    
	$adduser = $usermanger->addNewuser(0, $name, $email, $password, 0, 0);
	$error = '';
	if($adduser == 0){
		$error = 'Cet email est déjà utilisé.';
		$userid = 0;
		$accesslevel = 0;
		require('view/frontend/register.php');
	}elseif ($adduser === false) {
        throw new Exception('Impossible d\'ajouter le blog !');
    }
    else {
        header('Location: index.php?action=login');
    }
}

function adduser($id, $name, $email, $password, $userlevel){
	global $usermanger;
	global $user;
	
	if($user["level"] != 1){
		header("location:index.php?error=" . urlencode("Accès non autorisé!"));
	}
	
	
	$adduser = $usermanger->addNewuser($id, $name, $email, $password, $userlevel);
	$error = '';
	if($adduser == 0){
		$error = 'Email already exist.';
		$userid = $id;
		$accesslevel = $access;
		require('view/frontend/userAdd.php');
	}elseif ($adduser === false) {
        throw new Exception('Impossible d\'ajouter le blog !');
    }
    else {
        header('Location: index.php?action=users');
    }
}

function addBlog($id, $title, $content){
	
	if($user["level"] != 1){
		header("location:index.php?error= ". urlencode("Accès non autorisé!"));
	}
	
    global $pstmanger;
    $affectedLines = $pstmanger->postBlog($id, $title, $content);
	
	$msg = "Article ajouté avec succès.";
	if($id > 0){
		$msg = "Mise à jour bien éffectuée.";
	}

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le blog !');
    }
    else {
        header('Location: index.php?error=' . urlencode($msg));
    }
}

function addComment($postId, $comment)
{	
	global $commentmanger;
	global $user;
	
	$author = $user["name"];
	
    $affectedLines = $commentmanger->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId."&error=". urlencode("Commentaire bien enregistré et publié."));
    }
}