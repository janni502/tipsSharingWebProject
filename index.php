<?php

session_start();
include_once('db_fns.php');
include_once('header.php');

$handle = db_connect();
if (!$handle) {
	# If access into the database failed
	echo 'Did not access to the database';
}

$pages_sql = 'select * from pages order by code';
$pages_result = mysqli_query($handle,$pages_sql);

echo '<table border = "0" width = "800">';

while ($pages = mysqli_fetch_assoc($pages_result)) {
	$story_sql = "select * from stories where page = '{$pages['code']}' 
					and published is not null order by published desc";
	$story_result = mysqli_query($handle,$story_sql);
	if (mysqli_num_rows($story_result)) {
		$story = mysqli_fetch_assoc($story_result);
		echo "
			<tr>
			<td>
				<h2>{$pages['description']}</h2>
				<p>{$story['headline']}</p>
				<p align = 'right' class='morelink'>
					<a href = 'page.php?page={$pages['code']}'>
					Read more {$pages['code']} ...
					</a>
				</p>
			</td>
			<td width = '100'>
		";
		if ($story['picture0']) {
			echo '<img src="resize_image.php?image=';
			echo urlencode($story['picture']);
			echo '&max_width=80&max_height=60" />';
		}

		echo '</td></tr>';
	}
}
echo '</table>';

include_once('footer.php');

?>