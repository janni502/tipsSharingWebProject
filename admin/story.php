<?php
	# Script User to Create or Edit a Story
	include_once('include_fns.php');

	$story = null ;
	if(isset($_REQUEST['story']) && $_REQUEST['story']!="")
	{
		$story = get_story_record($_REQUEST['story']);
	}


?>

<form action = "story_submit.php" method = "POST" enctype="multipart/form-data">
	<input type = "hidden" name="story" value = "<?php if(isset($_REQUEST['story']) && $_REQUEST['story']!="") {echo $_REQUEST['story'];}?>">
	<input type = "hidden" name = "destination"
			value = "<?php echo $_SERVER['HTTP_REFERER']; ?>">

	<table>
		<tr>
			<td>Headline</td>
		</tr>

		<tr>
			<td><input size="80" name="headline"
						value ="<?php echo $story['headline'];?>" ></td>
		</tr>

		<tr>
			<td>Page</td>
		</tr>

		<tr>
			<td>
				<?php
					if (isset($_REQUEST['story'])) {
						# code...
						$query = "select p.code, p.description 
								from pages p, writer_permissions wp, stories s 
								where p.code = wp.page
									  and wp.writer = s.writer
									  and s.id = ".$_REQUEST['story']; 
					}else{
						$query = "select p.code, p.description 
								  from pages p, writer_permissions wp 
								  where p.code = wp.page 
								  		and wp.writer = '{$_SESSION['auth_user']}'";
					}
					echo query_select('page', $query , $story['page']);
				?>
			</td>
		</tr>

		<tr>
			<td>Story text (can contain HTML tags)</td>
		</tr>

		<tr>
			<td>
				<textarea cols = "60" rows="7" name="story_text" wrap="virtual">
<?php echo $story['story_text'];?>
				</textarea>
			</td>
		</tr>

<!-- 		<tr>
			<td>
				Or upload HTML file
			</td>
		</tr> -->

	<!-- 	<tr>
			<td>
				<input type = "file" name = "html" size="40">
			</td>
		</tr> -->

		<tr>
			<td>cover picture</td>
		</tr>
		<tr>
			<td><input type="file" name= "picture[0]" size="40"></td>
		</tr>
		<?php
			if ($story['picture0']) {
				$size = getimagesize('../'.$story['picture0']);
				$width = $size[0];
				$height = $size[1];
		?>

			<tr>
				<td>
					<img src="<?php echo '../'.$story['picture0'];?>"
						 	width="<?php echo $width;?>" height="<?php echo $height;?>">
				</td>
			</tr>
		<?php
		}
		?>

		<tr>
			<td>step 1: </td>
		</tr>
		<tr>
			<td><input type="file" name= "picture[1]" size="40"></td>
		</tr>
		<?php
			if ($story['picture1']) {
				$size = getimagesize('../'.$story['picture1']);
				$width = $size[0];
				$height = $size[1];
		?>

			<tr>
				<td>
					<img src="<?php echo '../'.$story['picture1'];?>"
						 	width="<?php echo $width;?>" height="<?php echo $height;?>">
				</td>
			</tr>
		<?php
		}
		?>
		<tr>
			<td>
				<textarea cols = "80" rows="5" name="step1" wrap="virtual">
<?php echo $story['step1'];?>
				</textarea>
			</td>
		</tr>

		<tr>
			<td>step 2: </td>
		</tr>
		<tr>
			<td><input type="file" name= "picture[2]" size="40"></td>
		</tr>
		<?php
			if ($story['picture2']) {
				$size = getimagesize('../'.$story['picture2']);
				$width = $size[0];
				$height = $size[1];
		?>

			<tr>
				<td>
					<img src="<?php echo '../'.$story['picture2'];?>"
						 	width="<?php echo $width;?>" height="<?php echo $height;?>">
				</td>
			</tr>
		<?php
		}
		?>
		<tr>
			<td>
				<textarea cols = "80" rows="5" name="step2" wrap="virtual">
<?php echo $story['step2'];?>
				</textarea>
			</td>
		</tr>
		<tr>
			<td>step 3: </td>
		</tr>
		<tr>
			<td><input type="file" name= "picture[3]" size="40"></td>
		</tr>
		<?php
			if ($story['picture3']) {
				$size = getimagesize('../'.$story['picture3']);
				$width = $size[0];
				$height = $size[1];
		?>

			<tr>
				<td>
					<img src="<?php echo '../'.$story['picture3'];?>"
						 	width="<?php echo $width;?>" height="<?php echo $height;?>">
				</td>
			</tr>
		<?php
		}
		?>
		<tr>
			<td>
				<textarea cols = "80" rows="5" name="step3" wrap="virtual">
<?php echo $story['step3'];?>
				</textarea>
			</td>
		</tr>

<tr>
			<td>step 4: </td>
		</tr>
		<tr>
			<td><input type="file" name= "picture[4]" size="40"></td>
		</tr>
		<?php
			if ($story['picture4']) {
				$size = getimagesize('../'.$story['picture4']);
				$width = $size[0];
				$height = $size[1];
		?>

			<tr>
				<td>
					<img src="<?php echo '../'.$story['picture4'];?>"
						 	width="<?php echo $width;?>" height="<?php echo $height;?>">
				</td>
			</tr>
		<?php
		}
		?>
		<tr>
			<td>
				<textarea cols = "80" rows="5" name="step4" wrap="virtual">
<?php echo $story['step4'];?>
				</textarea>
			</td>
		</tr>


<tr>
			<td>step 5: </td>
		</tr>
		<tr>
			<td><input type="file" name= "picture[5]" size="40"></td>
		</tr>
		<?php
			if ($story['picture5']) {
				$size = getimagesize('../'.$story['picture5']);
				$width = $size[0];
				$height = $size[1];
		?>

			<tr>
				<td>
					<img src="<?php echo '../'.$story['picture5'];?>"
						 	width="<?php echo $width;?>" height="<?php echo $height;?>">
				</td>
			</tr>
		<?php
		}
		?>
		<tr>
			<td>
				<textarea cols = "80" rows="5" name="step5" wrap="virtual">
<?php echo $story['step5'];?>
				</textarea>
			</td>
		</tr>


		<tr>
			<td>step 6: </td>
		</tr>
		<tr>
			<td><input type="file" name= "picture[6]" size="40"></td>
		</tr>
		<?php
			if ($story['picture6']) {
				$size = getimagesize('../'.$story['picture6']);
				$width = $size[0];
				$height = $size[1];
		?>

			<tr>
				<td>
					<img src="<?php echo '../'.$story['picture6'];?>"
						 	width="<?php echo $width;?>" height="<?php echo $height;?>">
				</td>
			</tr>
		<?php
		}
		?>
		<tr>
			<td>
				<textarea cols = "80" rows="5" name="step6" wrap="virtual">
<?php echo $story['step6'];?>
				</textarea>
			</td>
		</tr>


		<tr>
			<td>step 7: </td>
		</tr>
		<tr>
			<td><input type="file" name= "picture[7]" size="40"></td>
		</tr>
		<?php
			if ($story['picture7']) {
				$size = getimagesize('../'.$story['picture7']);
				$width = $size[0];
				$height = $size[1];
		?>

			<tr>
				<td>
					<img src="<?php echo '../'.$story['picture7'];?>"
						 	width="<?php echo $width;?>" height="<?php echo $height;?>">
				</td>
			</tr>
		<?php
		}
		?>
		<tr>
			<td>
				<textarea cols = "80" rows="5" name="step7" wrap="virtual">
<?php echo $story['step7'];?>
				</textarea>
			</td>
		</tr>


		<tr>
			<td>step 8: </td>
		</tr>
		<tr>
			<td><input type="file" name= "picture[8]" size="40"></td>
		</tr>
		<?php
			if ($story['picture8']) {
				$size = getimagesize('../'.$story['picture8']);
				$width = $size[0];
				$height = $size[1];
		?>

			<tr>
				<td>
					<img src="<?php echo '../'.$story['picture8'];?>"
						 	width="<?php echo $width;?>" height="<?php echo $height;?>">
				</td>
			</tr>
		<?php
		}
		?>
		<tr>
			<td>
				<textarea cols = "80" rows="5" name="step8" wrap="virtual">
<?php echo $story['step8'];?>
				</textarea>
			</td>
		</tr>


		<tr>
			<td>step 9: </td>
		</tr>
		<tr>
			<td><input type="file" name= "picture[9]" size="40"></td>
		</tr>
		<?php
			if ($story['picture9']) {
				$size = getimagesize('../'.$story['picture9']);
				$width = $size[0];
				$height = $size[1];
		?>

			<tr>
				<td>
					<img src="<?php echo '../'.$story['picture9'];?>"
						 	width="<?php echo $width;?>" height="<?php echo $height;?>">
				</td>
			</tr>
		<?php
		}
		?>
		<tr>
			<td>
				<textarea cols = "80" rows="5" name="step9" wrap="virtual">
<?php echo $story['step9'];?>
				</textarea>
			</td>
		</tr>


		<tr>
			<td>step 10: </td>
		</tr>
		<tr>
			<td><input type="file" name= "picture[10]" size="40"></td>
		</tr>
		<?php
			if ($story['picture10']) {
				$size = getimagesize('../'.$story['picture10']);
				$width = $size[0];
				$height = $size[1];
		?>

			<tr>
				<td>
					<img src="<?php echo '../'.$story['picture10'];?>"
						 	width="<?php echo $width;?>" height="<?php echo $height;?>">
				</td>
			</tr>
		<?php
		}
		?>
		<tr>
			<td>
				<textarea cols = "80" rows="5" name="step10" wrap="virtual">
<?php echo $story['step10'];?>
				</textarea>
			</td>
		</tr>


		<tr>
			<td>step 11: </td>
		</tr>
		<tr>
			<td><input type="file" name= "picture[11]" size="40"></td>
		</tr>
		<?php
			if ($story['picture11']) {
				$size = getimagesize('../'.$story['picture11']);
				$width = $size[0];
				$height = $size[1];
		?>

			<tr>
				<td>
					<img src="<?php echo '../'.$story['picture11'];?>"
						 	width="<?php echo $width;?>" height="<?php echo $height;?>">
				</td>
			</tr>
		<?php
		}
		?>
		<tr>
			<td>
				<textarea cols = "80" rows="5" name="step11" wrap="virtual">
<?php echo $story['step11'];?>
				</textarea>
			</td>
		</tr>


		<tr>
			<td>step 12: </td>
		</tr>
		<tr>
			<td><input type="file" name= "picture[12]" size="40"></td>
		</tr>
		<?php
			if ($story['picture12']) {
				$size = getimagesize('../'.$story['picture12']);
				$width = $size[0];
				$height = $size[1];
		?>

			<tr>
				<td>
					<img src="<?php echo '../'.$story['picture12'];?>"
						 	width="<?php echo $width;?>" height="<?php echo $height;?>">
				</td>
			</tr>
		<?php
		}
		?>
		<tr>
			<td>
				<textarea cols = "80" rows="5" name="step12" wrap="virtual">
<?php echo $story['step12'];?>
				</textarea>
			</td>
		</tr>


		<tr>
			<td>step 13: </td>
		</tr>
		<tr>
			<td><input type="file" name= "picture[13]" size="40"></td>
		</tr>
		<?php
			if ($story['picture13']) {
				$size = getimagesize('../'.$story['picture13']);
				$width = $size[0];
				$height = $size[1];
		?>

			<tr>
				<td>
					<img src="<?php echo '../'.$story['picture13'];?>"
						 	width="<?php echo $width;?>" height="<?php echo $height;?>">
				</td>
			</tr>
		<?php
		}
		?>
		<tr>
			<td>
				<textarea cols = "80" rows="5" name="step13" wrap="virtual">
<?php echo $story['step13'];?>
				</textarea>
			</td>
		</tr>


		<tr>
			<td>step 14: </td>
		</tr>
		<tr>
			<td><input type="file" name= "picture[14]" size="40"></td>
		</tr>
		<?php
			if ($story['picture14']) {
				$size = getimagesize('../'.$story['picture14']);
				$width = $size[0];
				$height = $size[1];
		?>

			<tr>
				<td>
					<img src="<?php echo '../'.$story['picture14'];?>"
						 	width="<?php echo $width;?>" height="<?php echo $height;?>">
				</td>
			</tr>
		<?php
		}
		?>
		<tr>
			<td>
				<textarea cols = "80" rows="5" name="step14" wrap="virtual">
<?php echo $story['step14'];?>
				</textarea>
			</td>
		</tr>


		<tr>
			<td>step 15: </td>
		</tr>
		<tr>
			<td><input type="file" name= "picture[15]" size="40"></td>
		</tr>
		<?php
			if ($story['picture15']) {
				$size = getimagesize('../'.$story['picture15']);
				$width = $size[0];
				$height = $size[1];
		?>

			<tr>
				<td>
					<img src="<?php echo '../'.$story['picture15'];?>"
						 	width="<?php echo $width;?>" height="<?php echo $height;?>">
				</td>
			</tr>
		<?php
		}
		?>
		<tr>
			<td>
				<textarea cols = "80" rows="5" name="step15" wrap="virtual">
<?php echo $story['step15'];?>
				</textarea>
			</td>
		</tr>


		<tr>
			<td>step 16: </td>
		</tr>
		<tr>
			<td><input type="file" name= "picture[16]" size="40"></td>
		</tr>
		<?php
			if ($story['picture16']) {
				$size = getimagesize('../'.$story['picture16']);
				$width = $size[0];
				$height = $size[1];
		?>

			<tr>
				<td>
					<img src="<?php echo '../'.$story['picture16'];?>"
						 	width="<?php echo $width;?>" height="<?php echo $height;?>">
				</td>
			</tr>
		<?php
		}
		?>
		<tr>
			<td>
				<textarea cols = "80" rows="5" name="step16" wrap="virtual">
<?php echo $story['step16'];?>
				</textarea>
			</td>
		</tr>



		<tr>
			<td algin="center"><input type="submit" value="Submit"></td>
		</tr>
	</table> 
</form>













