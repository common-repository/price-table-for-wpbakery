<?php 
	//Pricing table style variable
	$tl_price_table_style 		='';
	$entry_price_style 			='';
	$pice_currency_style 		='';
	$table_price_style 			='';
	$table_price_duration_style ='';
	$entry_title_bg_style 		='';
	$entry_title_style 			='';
	$entry_content_style 		='';
	$entry_footer_style 		='';
	$entry_button_style 		='';
	$entry_button_text_style 	='';
	$pack_duration_h2_style 		='';

	//Pice Table
	if($params['table_bg_color']){
		$tl_price_table_style .= '
			background: '.$params['table_bg_color'].';
		';
	}	
	if($params['table_border_radius']){
		$tl_price_table_style .= '
			border-radius: '.$params['table_border_radius'].';
		';
	}	

	//pice Section	
	if($params['price_bg_color']){
		$entry_price_style .= '
				background: '.$params['price_bg_color'].';
		';
	}
	if($params['price_color']){
		$entry_price_style .= '
				color: '.$params['price_color'].';

		';
	}
	if($params['price_padding']){
		$entry_price_style .= '
				padding: '.$params['price_padding'].';

		';
	}


	//pice currency
	if($params['currency_font_size']){
		$pice_currency_style .= '
				font-size: '.$params['currency_font_size'].';
		';
	}
	if($params['currency_color']){
		$pice_currency_style .= '
				color: '.$params['currency_color'].';
		';
	}


	//Table Price
	if($params['price_font_size']){
		$table_price_style .= '
				font-size: '.$params['price_font_size'].';
		';
	}
	if($params['price_color']){
		$table_price_style .= '
				color: '.$params['price_color'].';
		';
	}

	//Table Price Duration
	if($params['duration_font_size']){
		$table_price_duration_style .= '
				font-size: '.$params['duration_font_size'].';
		';
	}
	if($params['duration_color']){
		$table_price_duration_style .= '
				color: '.$params['duration_color'].';
		';
	}
	
	//Table Title Background
	if($params['title_bg_color']){
		$entry_title_bg_style .= '
				background: '.$params['title_bg_color'].';
		';
	}

	//Table Title
	if($params['title_font']){
		$entry_title_style .= $params['title_font'];
	}
	if($params['title_font_size']){
		$entry_title_style .= '
				font-size: '.$params['title_font_size'].';
		';
	}
	if($params['title_color']){
		$entry_title_style .= '
				color: '.$params['title_color'].';
		';
	}
	if($params['title_padding']){
		$entry_title_style .= '
				padding: '.$params['title_padding'].';
		';
	}

	//Table Content
	if($params['content_size']){
		$entry_content_style .= '
				font-size: '.$params['content_size'].';
		';
	}
	if($params['content_color']){
		$entry_content_style .= '
				color: '.$params['content_color'].';
		';
	}
	if($params['content_padding']){
		$entry_content_style .= '
				padding: '.$params['content_padding'].';
		';
	}
	
	//Table Duration h2 style
	if($params['duration_color']){
		$pack_duration_h2_style .= '
				color: '.$params['duration_color'].';
		';
	}
	if($params['duration_font_size']){
		$pack_duration_h2_style .= '
				font-size: '.$params['duration_font_size'].';
		';
	}
	if($params['duration_font']){
		$pack_duration_h2_style .= $params['duration_font'];
	}
	
	//Table Footer
	if($params['footer_bg']){
		$entry_footer_style .= '
				background: '.$params['footer_bg'].';
		';
	}
	if($params['footer_padding']){
		$entry_footer_style .= '
				padding: '.$params['footer_padding'].';
		';
	}

	//Table Footer
	if($params['button_bg_color']){
		$entry_button_style .= '
				background: '.$params['button_bg_color'].';
		';
	}
	if($params['button_font']){
		$entry_button_text_style .= $params['button_font'];
	}
	if($params['button_text_color']){
		$entry_button_style .= '
				color: '.$params['button_text_color'].';
		';
	}
	if($params['button_border_radius']){
		$entry_button_style .= '
			    border-radius: '.$params['button_border_radius'].';
			    border: '.$params['button_border'].' solid '.$params['button_border_color'].';
		';
	}
	if($params['button_border']){
		$entry_button_style .= '
			    border: '.$params['button_border'].' solid '.$params['button_border_color'].';
		';
	}
	// Animation...
	$animat_style 		= (($params['animation'] == 1) ? ' wow '.$params['animation_style'] : '');
	$ani_style 			= (isset($animat_style) ? $animat_style : '');
	$animat_durations 	= (($params['animation'] == 1) ? 'data-wow-duration="'.$params['animation_duration'].'s" data-wow-delay="'.$params['animation_delay'].'s"' : '');
	$ani_duration 		= (isset($animat_durations) ? $animat_durations : '');


	// Pricing table class and style 
	$tl_price_table = 'class="tl-price-table text-center style-three style-nine'.$ani_style.'" '.$ani_duration.' '.(!empty($tl_price_table_style) ? 'style="'.$tl_price_table_style.'"' : '').'';
	$entry_price 	= 'class="entry-price '.$params['price_aligment'].'" '.(!empty($entry_price_style) ? 'style="'.$entry_price_style.'"' : '').'';
	$pice_currency 	= 'class="pice_currency" '.(!empty($pice_currency_style) ? 'style="'.$pice_currency_style.'"' : '').'';
	$table_price 	= 'class="table_price" '.(!empty($table_price_style) ? 'style="'.$table_price_style.'"' : '').'';
	$pack_duration 	= 'class="pack_duration" '.(!empty($table_price_duration_style) ? 'style="'.$table_price_duration_style.'"' : '').'';
	$entry_title_bg = 'class="entry-title-bg '.$params['title_aligment'].'" '.(!empty($entry_title_bg_style) ? 'style="'.$entry_title_bg_style.'"' : '').'';
	$entry_title 	= 'class="entry-title" '.(!empty($entry_title_style) ? 'style="'.$entry_title_style.'"' : '').'';
	$entry_content 	= 'class="entry-content" '.(!empty($entry_content_style) ? 'style="'.$entry_content_style.'"' : '').'';
	$entry_footer 	= 'class="entry-footer '.$params['button_aligment'].'" '.(!empty($entry_footer_style) ? 'style="'.$entry_footer_style.'"' : '').'';
	$entry_button 	= 'class="entry-button" '.(!empty($entry_button_style) ? 'style="'.$entry_button_style.'"' : '').'';
	$entry_button_text 	= (!empty($entry_button_text_style) ? 'style="'.$entry_button_text_style.'"' : '');
	$pack_duration_h2 	=  'class="pack_duration_h2" '.(!empty($pack_duration_h2_style) ? 'style="'.$pack_duration_h2_style.'"' : '').'';

?>

<div <?php print $tl_price_table; ?>>
	<div class="entry-header">
		<?php if(!empty($params['title'])) :?>
			<div <?php print $entry_title_bg; ?>>
				<h2 <?php print $entry_title; ?>><?php print (isset($params['title']) ? $params['title'] : ''); ?></h2>
			</div>
		<?php endif;?>
	</div>
	<?php if(!empty($params['content'])) :?>
		<div <?php print $entry_content; ?>>
				<?php print (isset($params['content']) ? $params['content'] : '');  ?>
		</div>
	<?php endif;?>
		<div class="round_bg_footer_area">
			<?php if(!empty($params['price'])) :?>
					<div <?php print $pack_duration; ?>>
						<h5 <?php print $pack_duration_h2; ?>><?php print (isset($params['price_duration']) ? $params['price_duration'] : ''); ?></h5>
					</div>
				<div <?php print $entry_price; ?>>
					<div class="price-area">
						<i class="<?php print (isset($params['price_currency']) ? $params['price_currency'] : ''); ?>"></i>
						<span><?php print (isset($params['price']) ? $params['price'] : ''); ?><?php esc_html_e( '/', 'themelayer' ) ?></span>
					</div>
				</div>
			<?php endif;?>
			<?php if(!empty($params['button_text'])) :?>
				<div <?php print $entry_footer; ?>>
					<a 
					onmouseover="this.style.backgroundColor='<?php print $params['button_bg_hover_color'] ?>'" 
					onmouseout="this.style.backgroundColor='<?php print $params['button_bg_color'] ?>'"
					<?php print $entry_button; ?> 
					href="<?php print (isset($params['button_link']) ? $params['button_link'] : ''); ?>"
					>
						<span 
						<?php print $entry_button_text; ?> 
						onMouseOver="this.style.color='<?php print $params['button_text_hover_color'] ?>'" 
						onMouseOut="this.style.color='<?php print $params['button_text_color'] ?>'"
						>
							<i class="<?php print (isset($params['button_icon']) ? $params['button_icon'] : ''); ?>"></i> <?php print (isset($params['button_text']) ? $params['button_text'] : ''); ?>
						</span>
					</a>
				</div>
			<?php endif;?>
		</div>
</div>