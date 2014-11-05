<?php
		// get publication data
	 				$isbn = get_post_meta($post->ID, 'wpcf-'.$type.'-isbn', true);
	 				$date = get_post_meta($post->ID, 'wpcf-'.$type.'-date', true);
	 				$publisher = get_post_meta($post->ID, 'wpcf-'.$type.'-publisher', true);
	 				$pages = get_post_meta($post->ID, 'wpcf-'.$type.'-pages', true);
	 				$cover = get_post_meta($post->ID, 'wpcf-'.$type.'-cover', true);
	 				$alt_links = get_post_meta($post->ID, 'wpcf-'.$type.'-links', true);
	 				
          if ($publisher != "" OR $isbn != "" OR $pages != "" OR $cover != ""):
					echo '<div class="publication">';
				  echo '<p><em>'.$name.'</em> published '; 
				  if ($date != "") { echo date('F Y', $date); } 
				  if ($publisher != "") { echo " by ".$publisher; } 
				  if ($isbn != "") { echo  "<br />ISBN ". $isbn; } 
				  if ($pages != "") { echo  "&nbsp;&bull;&nbsp;". $pages." pages"; } 
				  
				  if ($cover != "") { 
				  	if ($name == "Audiobook") { 
				  		echo  "&nbsp;&bull;&nbsp;Narrated by ". $cover; 
				  	} else {
				  		echo  "&nbsp;&bull;&nbsp;Cover art by ". $cover;
				  	} 
				  } 
				  if ($isbn != "") { include ('isbn.php'); echo "<br />" .$links;  } 
				  if ($alt_links != "") { echo "<br />Find it at " .$alt_links;  } 
				echo "</p></div>";
				
				endif; 
				
				
				
				?>
				
