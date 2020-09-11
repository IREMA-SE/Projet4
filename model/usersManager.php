<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/manager.php");

class usersManager extends Manager
{
    public function getUsers($userid)
	{
		$db = dbConnect();
		$req = $db->query('SELECT * FROM users WHERE Id != '.$userid.' ORDER BY Id DESC LIMIT 0, 7');

		return $req;
	}

    public function loginfun($email, $password)
	{
		$db = dbConnect();
		
		$req = $db->query('SELECT * FROM users WHERE email = "'.$email.'" AND password = "'.$password.'"');
	   // $req->execute(array($email));
    $user = $req->fetch();

    return $user;
	}
	public function addNewuser($id, $name, $email, $password, $access, $userlevel){
	$db = dbConnect();
	//check first if record exist
	$exuser = $db->query('SELECT Id FROM users WHERE Id != '.$id.' AND email = "'.$email.'"');
   
	$exuser = $exuser->fetch();
	
	if($exuser != null){
		return 0;
	}
	
    if($id > 0){
        
        $db = dbConnect();
        $affectedLines = $db->query('UPDATE users SET name = "'. $name . '", email = "'.$email.'", level = 0, password = "'.$password.'", access_level='.$access.', level = '.$userlevel.' WHERE id = ' . $id);
        
		return $affectedLines;
    }else{
        $db = dbConnect();
        $comments = $db->prepare('INSERT INTO users( name, email, level, password, access_level) VALUES(?, ?, ?, ?, ?)');
        $affectedLines = $comments->execute(array($name, $email, $userlevel, $password, $access, ));
	
        return $affectedLines;
    }
}