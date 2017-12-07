<?php
# For database connection

function db_connect(){
	try {
		$result = mysqli_connect("127.0.0.1","root","981440","tips4u");
		#mysqli_select_db('tips4u');
	} catch (Exception $e) {
		echo $e->message;
		exit;
	}
	if (!$result) {
		return false;
	}
	return $result;
}

function get_writer_record($username){
	$handle = db_connect();
	$query = "select * from writers where username = '$username'";
	$result = mysqli_query($handle,$query);
	//echo $result['writers'].',';
	return mysqli_fetch_assoc($result);
}

function get_story_record($story){
	$handle = db_connect();
	$query = "select * from stories where id = '$story'";
	$result = mysqli_query($handle,$query);
	return mysqli_fetch_assoc($result);
}

function query_select($name, $query, $default=''){
	$handle = db_connect();

	$result = mysqli_query($handle,$query);

	if (!$result) {
		# code...
		return('');
	}

	$select = "<select name = '$name'>";
	$select .='<option value=""';
	if ($default == '') {
		# code...	
		$select .= ' selected';
	}
	$select .= '>-- Choose --</option>';

	for ($i=0; $i < mysqli_num_rows($result) ; $i++) { 
		$option = mysqli_fetch_array($result);
		$select .= "<option value='{$option[0]}'";
		if ($option[0] == $default) {
			$select .= 'selected';
		}
		$select .= ">[{$option[0]}] {$option[1]}</option>";
	}
	$select .= "</select>\n";

	return($select);
}
?>