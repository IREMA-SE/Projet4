<?php

// \OpenClassrooms\Blog\Model\usersManager;

require_once("manager.php");

class usersManager extends Manager
{
    public function getUsers($userid)
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT * FROM users WHERE Id != '.$userid.' ORDER BY Id DESC LIMIT 0, 7');

		return $req;
	}
	
	public function get_user($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM users WHERE id = ?');
		$req->execute(array($id));
		$user = $req->fetch();
	
		return $user;
	}

    public function loginfun($email, $password)
	{
			$db = $this->dbConnect();
			
			$req = $db->query('SELECT * FROM users WHERE email = "'.$email.'"');
		   	$user = $req->fetch();
			
			if($user != null){
				if($user["password"] != md5($password)){
					return null;
				}
			}
			
			return $user;
	}
		
	public function addNewuser($id, $name, $email, $password, $userlevel){
			$db = $this->dbConnect();
            
            if($password != ""){
            	$password = md5($password);
            }
            
			//check first if record exist
			$exuser = $db->query('SELECT Id FROM users WHERE Id != '.$id.' AND email = "'.$email.'"');
	   
			$exuser = $exuser->fetch();
		
			if($exuser != null){
				return 0;
			}
		
			if($id > 0){
			
				//$db = dbConnect();
                if($password == ""){
                	$affectedLines = $db->query('UPDATE users SET name = "'. $name . '", email = "'.$email.'", level = '.$userlevel.' WHERE id = ' . $id);
                }else{
                	$affectedLines = $db->query('UPDATE users SET name = "'. $name . '", email = "'.$email.'",  password = "'.$password.'", level = '.$userlevel.' WHERE id = ' . $id);
                }
				
			
				return $affectedLines;
		}else{
			//$db = dbConnect();
			$comments = $db->prepare('INSERT INTO users( name, email, level, password) VALUES(?, ?, ?, ?)');
			$affectedLines = $comments->execute(array($name, $email, $userlevel, $password, ));
		
			return $affectedLines;
		}
	}
}

