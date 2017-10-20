<?php
	if (!isset($_REQUEST['story'])) {
		header('Location:index.php');
		exit;
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
	}
	//echo $query;
	$result = mysqli_query($handle,$query);

	//while ($story = mysqli_fetch_assoc($result)) {
	$story = mysqli_fetch_assoc($result);
		// headline
		echo "<h2>{$story['headline']}</h2>";
		

		//the main picture
		if ($story['picture0']) {
						//echo '<div style = "float:left; margin: 0px 0px 6px 6px;">';
        	echo '<br /><p class="byline">';
						echo '<img src = "resize_image.php?image=';
						echo urlencode($story['picture0']);
						echo '&max_width=200&max_height=120" aling = left/>';
			echo '</p>';
			}

		// byline
		$w = get_writer_record($story['writer']);
		echo '<br /><p class="byline">';
		//echo $w[full_name].', ';
		echo $w['full_name'],', '; 
		echo date('M d, H: i', $story['modified']);
		echo '</p>';


		 
                        
            
                echo $story['story_text'];
           
		
		

     for($i =1;$i<17;$i++)
     {
     	$picture ='picture'.$i;
     	$step = 'step'.$i;

        if ($story[$picture]) {
						//echo '<div style = "float:left; margin: 0px 0px 6px 6px;">';
        	echo '<br /><p class="byline">';
						echo '<img src = "resize_image.php?image=';
						echo urlencode($story[$picture]);
						echo '&max_width=200&max_height=120" aling = left/>';
			echo '</p>';
			}
		echo '<p class="byline">';
			echo $story[$step];
		echo '</p>';

	 }
		
		
	include_once('footer.php');
?>