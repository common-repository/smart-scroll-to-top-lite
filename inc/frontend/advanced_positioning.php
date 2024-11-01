<?php defined('ABSPATH') or die('No scripts for you') ?>
<style type="text/css">
	<?php
		$top_array = array('top_left','top_middle','top_right','middle_left','middle_right');
		$left_array = array('top_left','top_middle','middle_left','bottom_left','bottom_middle');
	?>
	#sstt_element_<?=$id ?>{
		<?php
			if (in_array($position, $top_array)) {
				echo "top: " . esc_attr($vertical_distance) . "px;";
				echo "bottom: 0px;";
			}
			else{
				echo "bottom: ". esc_attr($vertical_distance) . "px;";
				echo "top: 0px;";
			}
		?>
		<?php
			if (in_array($position, $left_array)) {
				echo "left: " . esc_attr($horizontal_distance) . "px;";
				echo "right: 0px;";
			}
			else{
				echo "right: " . esc_attr($horizontal_distance) . "px;";
				echo "left: 0px;";
			}
		?>
	}
</style>