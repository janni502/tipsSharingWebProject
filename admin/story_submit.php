<?php
	# add / modify story record
	include_once('include_fns.php');

	$handle = db_connect();

	$headline = $_REQUEST['headline'];
	$page = $_REQUEST['page'];
	$time = time();

	if ((isset($_FILES['html']['name']) && 
		(dirname($_FILES['html']['type']) == 'text') &&
		is_uploaded_file($_FILES['html']['tmp_name']) )) {
		// if user upload some files, then set the content of the files as the story_text
		$story_text = file_get_contents($_FILES['html']['tmp_name']);
	}else{
		$story_text = $_REQUEST['story_text'];
	}

	$story_text = addslashes($story_text);

	

	if (isset($_REQUEST['story']) && $_REQUEST['story']!='') {
		# it's an update
		$story = $_REQUEST['story'];

		$query = "update stories 
				  set headline = '$headline',
				  	  story_text = '$story_text',
				  	  page = '$page',
				  	  modified = $time
				  where id = $story";
	}else{
		// it's a new story
		$query = "insert into stories
				  (headline,story_text,page,writer,created,modified)
				  values
				  ('$headline','$story_text','$page','".$_SESSION['auth_user']."',
				  	$time,$time)";
	}

	$result = mysqli_query($handle,$query);

	if (!$result) {
		# code...
		echo "There was a database error when executing <pre>$query</pre>";
		echo mysqli_error();
		exit; 
	}
	
	for($i=0;$i<16;$i++)
	{
		$picture ='picture'.$i;
		echo $picture;

	if ((isset($_FILES['picture']['name'][$i]) && 
		is_uploaded_file($_FILES['picture']['tmp_name'][$i]))) {
		# there is uploaded picture
		echo 'i am here right'; 
		if (!isset($_REQUEST['story']) || $_REQUEST['story']=='') {
			$story = mysqli_insert_id($handle);
			// mysql_insert_id  return the auto generated id used in the last query
		}
		$type = basename($_FILES['picture']['type'][$i]);

		switch ($type) {
			case 'jpeg':
			case 'pjpeg':
			case 'png':
			case 'jpg':
				$filename = "images/$story".'-'."$i.jpg";

				move_uploaded_file($_FILES['picture']['tmp_name'][$i], '../'.$filename) or handle_error("the picture store wrong", "the moved file error" . "{$upload_filename}");
				$query = "update stories 
						  set $picture = '$filename'
						  where id = $story";
				$result = mysqli_query($handle,$query);
				break;
			
			default:
				echo 'Invalid picture format:'.$_FILES['picture']['type'][$i];
				break;
		}
	}else{
		// there is no image file to upload or didn't get the file's info
		
		echo 'Possible file upload attack:';
		echo "filename '".$_FILES['picture']['tmp_name'][$i]."'.";
	}

	}
	
	header('Location: '.$_REQUEST['destination']);


















?>