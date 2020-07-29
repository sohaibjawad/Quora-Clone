<?php

	session_start();
	
	if(!isset($_SESSION['username']))
		header("Location:index.php");
	
	include ("../utilities/connect.php");
	$username = $_SESSION['username'];


	
	if(isset($_POST["submit"]))
	{
		$file = $_FILES['uploadFile'];
		$fileName = $_FILES['uploadFile']['name'];
		$fileTmpName = $_FILES['uploadFile']['tmp_name'];
		$fileSize = $_FILES['uploadFile']['size'];
		$fileError = $_FILES['uploadFile']['error'];
		$fileType = $_FILES['uploadFile']['type'];
		$fileExt = explode('.', $fileName);
		$actualExt = strtolower(end($fileExt));
		
		$allowed = array('jpg', 'jpeg' , 'png');

		if(in_array($actualExt, $allowed))
		{
			if($fileError === 0)
			{
				if($fileSize < 10000000) //bytes
				{
					$newFileName = uniqid('', true).".".$actualExt;
					$fileDestination = "../../frontend/img/".$newFileName;
					move_uploaded_file($fileTmpName, $fileDestination);
					// $qry = "INSERT INTO photos (image_url,username) VALUES ('".$fileDestination."','".$username."')";
					// $con->query($qry);


					// $qry = "SELECT * FROM photos WHERE image_url = '".$fileDestination."'";
					// $res = $con->query($qry);
					// $temp = $res->fetch_assoc();
					// $photoid = $temp['id'];
					// $qry = "INSERT INTO caption (caption_text, photo_id) VALUES ('".$_POST['caption']."', ".$photoid.")";
					// $con->query($qry);
					$qry = "UPDATE users SET img = '".$fileDestination."' WHERE username = '".$username."'";
					mysqli_query($con, $qry);
				}

				else
				{
					echo "File too large";
				}
			}

			else
			{
				echo "Error occured uploading the file";
			}
		}

		else
		{
			echo "You can't upload files of this type";
		}


	}
	header("Location:profile.php");

?>