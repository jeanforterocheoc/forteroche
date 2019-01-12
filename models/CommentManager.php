<?php
class CommentManager extends Database
{
    // Renvoie l'ensemble des commentaires associés à un billet
    public function getComments($postId)
      {
            $comments = [];
            $req = 'SELECT comment_id as id, comment_author as author, comment_title as title, comment_content as content, comment_date as date FROM comments WHERE post_id=?';
            $result = $this->runReq($req, [$postId]);
            if(!$result){
                return $comments;
            }
            foreach($result as $comment)
            {
                $comments[] = new Comment($comment);
            }
            return $comments;  
      }
}

