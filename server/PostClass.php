<?php
class Post 
{
	private $conn;
	public function __construct($conn) 
	{
		$this->conn = $conn;
	}
	public function GetPost($page,$content){
		$limit = 0;
		$upto = $content;
		$data = array();
		if($page > 1){
			$limit = $page*$upto-$upto;
		}		
		$query = $this->conn->prepare("SELECT * FROM `post` LIMIT $limit,$upto");			
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		$data['post'] = $result;	
        return $data;
	}
	public function GetPostByPath($url){		
		$query = $this->conn->prepare("SELECT * FROM `post` WHERE `Url` = :url");	
		$query->bindParam(':url', $url);
		$query->execute();		
		$result = $query->fetchAll(PDO::FETCH_ASSOC);	
        return $result;
	}
	public function InsertPost($title,$description,$post,$url,$ImageUrl){		
		$query = $this->conn->prepare("INSERT INTO `post` (`Title`, `Description`, `Post`, `Url`, `ImageUrl`) VALUES (:title, :description, :post, :url, :imageUrl)");
		$query->bindParam(':title', $title);
		$query->bindParam(':description', $description);
		$query->bindParam(':post', $post);
		$query->bindParam(':url', $url);
		$query->bindParam(':imageUrl', $ImageUrl);
		$query->execute();
		return  $this->conn->lastInsertId();	
	}
	public function UpdatePost(){}
	public function DeletePost(){}
	public function GetPostById(){}

	public function PostPagination(){
		$query = $this->conn->prepare("SELECT COUNT(*) as total FROM `post`");
		$query->execute();
		$count = $query->fetchAll(PDO::FETCH_ASSOC);
		$data = $count;
		return $data;
	}

	public function ImageUpload($image){
		$query = $this->conn->prepare("INSERT INTO `post` (`ImageUrl`) VALUES (:ImageUrl);");
		$query->bindParam(':ImageUrl', $image);
		$query->execute();
		return  $this->conn->lastInsertId();	
	}
}
?>