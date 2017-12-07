<?php
	if (!isset($_REQUEST['page']) && !isset($_REQUEST['story'])) {
		header('Location:index.php');
		exit;
	}

	//$page = null;
	if(isset($_REQUEST['page']) && $_REQUEST['page']!="")
	{
 		$page = $_REQUEST['page'];
	}

	$story = null;
	if(isset($_REQUEST['story']) && $_REQUEST['story']!="")
	{
 		$story=intval($_REQUEST['story']);
	}
	//$story = intval($_REQUEST['story']);
	//$story = $_REQUEST['story'];
	include_once('db_fns.php');
	include_once('header.php');

	$handle = db_connect();

	if ($story&& $story!=null) {
		$query = "select * from stories where id = '$story' and 
			published is not null";
	}else{
		$query = "select * from stories where page = '$page' and 
			published is not null 
			order by published desc";
	}
	//echo $query;
	$result = mysqli_query($handle,$query);

	while ($story = mysqli_fetch_assoc($result)) {
		// headline
		//echo "<a href='tippage.php?story={$story['id']}'>";
		echo "<h2><a href='tippage.php?story={$story['id']}'> {$story['headline']} </a></h2>";
		// picture
		if ($story['picture0']) {
			# code...
			echo '<div style = "float:right; margin: 0px 0px 6px 6px;">';
			echo '<img src = "resize_image.php?image=';
			echo urlencode($story['picture0']);
			echo '&max_width=200&max_height=120" aling = right/></div>';
		}
		// byline
		$w = get_writer_record($story['writer']);
		echo '<br /><p class="byline">';
		//echo $w[full_name].', ';
		echo $w['full_name'],', '; 
       // echo date_default_timezone_set('M d, H: i', $story['modified']);
		//echo date('M d, H: i', $story['modified']);
		echo '</p>';

		// main text
		echo $story['story_text'];

	}
	include_once('footer.php');
?>