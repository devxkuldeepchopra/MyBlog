<?php 
	require_once('PostClass.php');
	include 'conn.php';
	$Post = new Post($conn);
	if (isset($_POST["action"])) {
		$action=$_POST["action"];
	}
	if (isset($_GET['action'])) { 
		$action = $_GET['action']; 
	}
	if ($action == 'GetPost') {
		$Data = $Post->GetPost($_POST['page'], $_POST['content']);
		echo json_encode($Data);
	}
	if ($action == 'GetPostByPath') {
		$Data = $Post->GetPostByPath($_POST['post-path']);
		echo json_encode($Data);
	}
	if ($action == 'InsertPost') {
		if ( $_FILES['file']['error'] > 0 ){
			$Data  = $_FILES['file']['error'];
			echo json_encode($Data);
		}
		else {
		   $d =	date("Y-m-d-h-i-s");
		   $newFile = $_POST['filename'].$d.".".$_POST['extension'];
			if(move_uploaded_file($_FILES['file']['tmp_name'], '../assets/images/uploads/' . $newFile))
			{
				$Data = $Post->InsertPost($_POST['title'],$_POST['description'],$_POST['mypost'],$_POST['url'],$newFile);
				echo json_encode($Data);
			}
		}	
	}
	if ($action == 'UpdatePost') {
		$Data = $Post->UpdatePost();
		echo json_encode($Data);
	}
	if ($action == 'DeletePost') {
		$Data = $Post->DeletePost();
		echo json_encode($Data);
	}
	if ($action == 'GetPostById') {
		$Data = $Post->GetPostById();
		echo json_encode($Data);
	}
	if ($action == 'PostPagination') {
		$Data = $Post->PostPagination();
		echo json_encode($Data);
	}
?>