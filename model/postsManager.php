<?php

//namespace OpenClassrooms\Blog\Model;

require_once("manager.php");


class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 10');

        return $req;
    }

	public function delPost($postId)
	{
		$db = $this->dbConnect();
		$affectedLines = $db->query('DELETE FROM posts WHERE id = ' . $postId);
		   
		return $affectedLines;
	}
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
	public function postBlog($id, $title, $content){
		
		$db = $this->dbConnect();
		
		if($id > 0){
			
			
			$affectedLines = $db->query('UPDATE posts SET title = "'. $title . '", content = "'.$content.'" WHERE id = ' . $id);
		   
			return $affectedLines;
		}else{
			$comments = $db->prepare('INSERT INTO posts( title, content, creation_date) VALUES(?, ?, NOW())');
			$affectedLines = $comments->execute(array($title, $content));
	 
			return $affectedLines;
		}
	}
}