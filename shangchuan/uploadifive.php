<?php
session_start();
/*
UploadiFive
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
*/
//$con=mysql_connect('localhost','root','xjq981930');
// Set the uplaod directory
$uploadDir = '/uploads/';

// Set the allowed file extensions
$fileTypes = array('jpg', 'jpeg', 'gif', 'png'); // Allowed file extensions

$verifyToken = md5('unique_salt' . $_POST['timestamp']);
 

//$_POST['filename']=time().rand().$fn;

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	
	/******
	if($con)
	{
		$db=mysql_select_db('gczxbyjt',$con);
		$rs=mysql_db_query($db,"select * from gczx_byjt where id=".$_POST['id'],$con);
		print_r($rs);
	}
	******/
	
	$tempFile   = $_FILES['Filedata']['tmp_name'];
	$uploadDir  = $_SERVER['DOCUMENT_ROOT'] . $uploadDir;
	$_FILES['Filedata']['name']=$_SESSION['idd'].'_____'.rand(1000,9999).$_FILES['Filedata']['name'];
	$targetFile = $uploadDir . $_FILES['Filedata']['name'];
	
   $fn=$_FILES['Filedata']['name'];
	// Validate the filetype
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	if (in_array(strtolower($fileParts['extension']), $fileTypes)) {
       
		
		// Save the file
		move_uploaded_file($tempFile, $targetFile);
		header("Location:check-exists.php");
		exit();
		
		//session_destroy();
		//echo exit("<script>top.location.href='/xstj/public/index/index/successrs?fn=".$fn."&& id=".$id."' </script>");
		echo 1;

	} else {

		// The file type wasn't allowed
		echo 'Invalid file type.';

	}
}
?>