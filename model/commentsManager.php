<?php

//namespace OpenClassrooms\Blog\Model;

require_once("manager.php");

class CommentManager extends Manager
{
	
     public function getComments($postId)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, author,  post_id, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin\') AS comment_date_fr FROM comments WHERE post_id = ? AND approved = ? ORDER BY comment_date DESC');
		$comments->execute(array($postId, 1));

		return $comments;
	}

	 public function getallcomments(){
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT comments.id, comments.author, comments.comment, comments.approved, posts.title FROM comments INNER JOIN posts ON posts.id = comments.post_id WHERE comments.approved = 0');
		$comments->execute(array( ));

		return $comments;
	}


	 public function postComment($postId, $author, $comment)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
		$affectedLines = $comments->execute(array($postId, $author, $comment));

		return $affectedLines;
	}



	 public function appovcomment($id, $act){
		$db = $this->dbConnect();
		
		if($act == 2){
			
			$affectedLines = $db->query('DELETE FROM comments WHERE id = ' . $id);
		}else if($act == 1 || $act == 0){
			$affectedLines = $db->query('UPDATE comments SET approved = "'. $act . '" WHERE id = ' . $id);
		}
		
		 
		return $affectedLines;
	}
}