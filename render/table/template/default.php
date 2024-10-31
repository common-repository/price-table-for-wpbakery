<?php 
// Animation...
$animat_style = (($params['animation'] == 1) ? ' wow '.$params['animation_style'] : '');
$animat_durations = (($params['animation'] == 1) ? 'data-wow-duration="'.$params['animation_duration'].'s" data-wow-delay="'.$params['animation_delay'].'s"' : '');
$tl_price_table ='class="tl-price-table text-center '.(isset($animat_style) ? $animat_style : '').'" '.(isset($animat_durations) ? $animat_durations : '').'';
?>

<div <?php print $tl_price_table; ?>>
	<div class="entry-header">
		<div class="entry-price">
			<div class="price-area">
				<span class="pice_currency"><i class="fa fa-usd"></i></span>
				<span class="table_price"><?php esc_html_e( '10/', 'themelayer' ) ?></span>
				<span class="pack_duration"><?php esc_html_e( 'Per Day', 'themelayer' ) ?></span>
			</div>
		</div>
		<div class="entry-title-bg">
			<h2 class="entry-title"> <?php esc_html_e( 'Default', 'themelayer' ) ?> </h2>
		</div>
	</div>
	<div class="entry-content">
		<ul>
			<li><i class="fa fa-check"></i> <?php esc_html_e( 'Unlimited Websites', 'themelayer' ) ?></li>
			<li><i class="fa fa-check"></i> <?php esc_html_e( 'Unlimited Disk Space', 'themelayer' ) ?></li>
			<li><i class="fa fa-check"></i> <?php esc_html_e( 'Unlimited Bandwidth', 'themelayer' ) ?></li>
			<li><i class="fa fa-close"></i> <?php esc_html_e( 'Unlimited MySQL Database', 'themelayer' ) ?></li>
			<li><i class="fa fa-close"></i> <?php esc_html_e( 'Unlimited FTP User', 'themelayer' ) ?></li>
			<li><i class="fa fa-check"></i> <?php esc_html_e( 'Unlimited Email Account', 'themelayer' ) ?></li>
			<li><i class="fa fa-close"></i> <?php esc_html_e( 'Unlimited Website Builder', 'themelayer' ) ?></li>
			<li><i class="fa fa-check"></i> <?php esc_html_e( 'Unlimited website', 'themelayer' ) ?></li>
			<li><i class="fa fa-check"></i> <?php esc_html_e( 'FREE Marketing Tool', 'themelayer' ) ?></li>
		</ul>
	</div>
	<div class="entry-footer">
		<a class="entry-button" href="#"><span><i class="fa fa-shopping-cart"></i> <?php esc_html_e( 'Buy Now', 'themelayer' ) ?></span></a>
	</div>
</div>