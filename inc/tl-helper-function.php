<?php
/*===========================================
* Generate param type "radioimage"
*===========================================*/
if(!function_exists('ptfwb_ParamRadioImage')) {
	function ptfwb_ParamRadioImage( $settings, $value ) {
	    $dependency = '';
	    $dependency = function_exists( 'vc_generate_dependencies_attributes' ) ? vc_generate_dependencies_attributes( $settings ) : '';
	    $param_name = isset( $settings['param_name'] ) ? $settings['param_name'] : '';
	    $type       = isset( $settings['type'] ) ? $settings['type'] : '';
	    $radios     = isset( $settings['options'] ) ? $settings['options'] : '';
	    $class      = isset( $settings['class'] ) ? $settings['class'] : '';
	    $output     = '<input type="hidden" name="' . $param_name . '" id="' . $param_name . '" class="wpb_vc_param_value ' . $param_name . ' ' . $type . '_field ' . $class . '" value="' . $value . '"  ' . $dependency . ' />';
	    $output     .= '<div id="' . $param_name . '_wrap" class="icon_style_wrap ' . $class . '" >';
	    if ( $radios != '' && is_array( $radios ) ) {
	        $i = 0;
	        foreach ( $radios as $key => $image_url ) {
	            $class   = ( $key == $value ) ? ' class="selected" ' : '';
	            $image   = '<img id="' . $param_name . $i . '_img' . $key . '" src="' . $image_url . '" ' . $class . '/>';
	            $checked = ( $key == $value ) ? ' checked="checked" ' : '';
	            $output  .= '<input name="' . $param_name . '_option" id="' . $param_name . $i . '" value="' . $key . '" type="radio" '
	                        . 'onchange="document.getElementById(\'' . $param_name . '\').value=this.value;'
	                        . 'jQuery(\'#' . $param_name . '_wrap img\').removeClass(\'selected\');'
	                        . 'jQuery(\'#' . $param_name . $i . '_img' . $key . '\').addClass(\'selected\');'
	                        . 'jQuery(\'#' . $param_name . '\').trigger(\'change\');" '
	                        . $checked . ' style="display:none;" />';
	            $output  .= '<label for="' . $param_name . $i . '">' . $image . '</label>';
	            $i ++;
	        }
	    }
	    $output .= '</div>';

	    return $output;
	}
}
vc_add_shortcode_param( 'radio_images', 'ptfwb_ParamRadioImage' );

/*===========================================
* VC map field render html shortcode section
*===========================================*/
if(!function_exists('ptfwb_VcMapLayout')) {
	function ptfwb_VcMapLayout(){
	    return array(
	               /*==========================================
								Table Layout Section
	               ==========================================*/ 
			    	array(
				        'type'          => 'radio_images',
				        'group'         => 'Layout',
				        'heading'       => esc_html__( 'Table Layout', 'themelayer' ),
				        'param_name'    => 'table_layout',
				        "options"           => array(
				        	// add pricing table layout
				            'layout-1'      => plugin_dir_url( __FILE__ ).'../images/layout_img/ly-1.png',
				            'layout-2'      => plugin_dir_url( __FILE__ ).'../images/layout_img/ly-2.png',
				            'layout-3'      => plugin_dir_url( __FILE__ ).'../images/layout_img/ly-3.png',
				            'layout-4'      => plugin_dir_url( __FILE__ ).'../images/layout_img/ly-4.png',
				            'layout-5'      => plugin_dir_url( __FILE__ ).'../images/layout_img/ly-5.png',
				            'layout-6'      => plugin_dir_url( __FILE__ ).'../images/layout_img/ly-6.png',
				            'layout-7'      => plugin_dir_url( __FILE__ ).'../images/layout_img/ly-7.png',
				            'layout-8'      => plugin_dir_url( __FILE__ ).'../images/layout_img/ly-8.png',
				            'layout-9'      => plugin_dir_url( __FILE__ ).'../images/layout_img/ly-9.png',
				            'layout-10'      => plugin_dir_url( __FILE__ ).'../images/layout_img/ly-10.png',
				            'layout-11'      => plugin_dir_url( __FILE__ ).'../images/layout_img/ly-11.png',
				            'layout-12'      => plugin_dir_url( __FILE__ ).'../images/layout_img/ly-12.png',
				        ),
				        "description" => esc_attr__( "Select type of style.", 'themelayer' )
				    ),
				    array(
				        'type'          => 'colorpicker',
				        'group'         => 'Layout',
				        'heading'       => esc_html__( 'Table Background Color', 'themelayer' ),
				        'description' 	=> esc_attr__( 'Add background color entire picing table ', 'themelayer' ),
				        'param_name'    => 'table_bg_color',
				        "dependency"    => array(
				            "element"       => 'table_layout',
				            "value"         => array('layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6', 'layout-7', 'layout-8', 'layout-9', 'layout-10', 'layout-11', 'layout-12'),
				        ),
				    ),
				    array(
				        'type'          => 'textfield',
				        'group'         => 'Layout',
				        'heading'       => esc_html__( 'Border Radius', 'themelayer' ),
				        'description' 	=> esc_attr__( 'Add border radius entire picing table like this example: 3px, 5px ', 'themelayer' ),
				        'param_name'    => 'table_border_radius',
				        "dependency"    => array(
				            "element"       => 'table_layout',
				            "value"         => array('layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6', 'layout-7', 'layout-8', 'layout-9', 'layout-10', 'layout-11', 'layout-12'),
				        ),
				    ),






	               /*==========================================
				 				Table Title Section
	               ==========================================*/ 
				    array(
				        'type'          => 'textfield',
				        'group'         => 'Title',
				        'heading'       => esc_html__( 'Package Title', 'themelayer' ),
				        'param_name'    => 'title',
				        'description' 	=> esc_attr__( 'Add any title like this example: Basic, Standard ', 'themelayer' ),
				        "dependency"    => array(
				            "element"       => 'table_layout',
				            "value"         => array('layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6', 'layout-7', 'layout-8', 'layout-9', 'layout-10', 'layout-11', 'layout-12'),
				        ),
				    ),
				    array(
				        'type'          => 'checkbox',
				        'group'         => 'Title',
				        'heading'       => esc_html__( 'Chose Style', 'themelayer' ),
				        'param_name'    => 'title_style_check',
				        'value'     	=> array(
				        	'Font Style' 		=> 1,
				        	'Color' 			=> 2,
				        	'Font Aligment' 	=> 3
				        ),
				        "dependency"    => array(
				            "element"       => 'table_layout',
				            "value"         => array('layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6', 'layout-7', 'layout-8', 'layout-9', 'layout-10', 'layout-11', 'layout-12'),
				        ),
				    ),
				    array(
				        'type'          => 'google_fonts',
				        'group'         => 'Title',
				        'param_name'    => 'title_font',
				        'weight' 		=> 0,
		                'settings' 		=> array(
		                    'fields' 		=> array(
		                        'font_family_description' 	=> __( 'Select a font family.', 'themelayer' ),
		                        'font_style_description' 	=> __( 'Select a font ftyle.', 'themelayer' ),
		                    ),
		                ), 
	                    'dependency'    => array(
	                        'element'   	=> 'title_style_check',
	                        'value'     	=> '1'
	                    )
				    ),
	                array(
	                    'type'      	=> 'textfield',
				        'group'     	=> 'Title',
	                    'heading'   	=> esc_html__( 'Font Size', 'themelayer' ),
				        'description' 	=> esc_attr__( 'Add font size like this example: 16px, 20px ', 'themelayer' ),
	                    'param_name'	=> 'title_font_size',
	                    'value'     	=> '',
	                    'dependency'    => array(
	                        'element'   => 'title_style_check',
	                        'value'     => '1'
	                    )
	                ),
	                array(
	                    'type'      	=> 'textfield',
				        'group'     	=> 'Title',
	                    'heading'   	=> esc_html__( 'Padding', 'themelayer' ),
				        'description' 	=> esc_attr__( 'Add padding like this example: 20px, 25px ', 'themelayer' ),
	                    'param_name'	=> 'title_padding',
	                    'value'     	=> '',
	                    'dependency'    => array(
	                        'element'   => 'title_style_check',
	                        'value'     => '1'
	                    )
	                ),
	                array(
	                    'type'      	=> 'dropdown',
				        'group'     	=> 'Title',
	                    'heading'   	=> esc_html__( 'Aligment', 'themelayer' ),
	                    'param_name'	=> 'title_aligment',
	                    'value'     	=> array(
		                    	'Center' 		=> 'text-center',
		                    	'Left' 			=> 'text-left',
		                    	'Right' 		=> 'text-right',
	                    	),
	                    'dependency'    => array(
	                        'element'   => 'title_style_check',
	                        'value'     => '3'
	                    )
	                ),
				    array(
				        'type'          => 'colorpicker',
				        'group'         => 'Title',
				        'heading'       => esc_html__( 'Chose Color', 'themelayer' ),
				        'description' 	=> esc_attr__( 'Add title text color ', 'themelayer' ),
				        'param_name'    => 'title_color',
				        'value'    		=> '',
	                    'dependency'    => array(
	                        'element'   => 'title_style_check',
	                        'value'     => '2'
	                    )

				    ),
				    array(
				        'type'          => 'colorpicker',
				        'group'         => 'Title',
				        'heading'       => esc_html__( 'Background Color', 'themelayer' ),
				        'description' 	=> esc_attr__( 'Add title backgound color ', 'themelayer' ),
				        'param_name'    => 'title_bg_color',
				        'value'    		=> '',
	                    'dependency'    => array(
	                        'element'   => 'title_style_check',
	                        'value'     => '2'
	                    )

				    ),








	               /*==========================================
				 				Table Features Section
	               ==========================================*/ 
				    array(
				        'type'          => 'textarea_html',
				        'group'         => 'Features',
				        'heading'       => esc_html__( 'Content', 'themelayer' ),
				        'param_name'    => 'content',
				        'value'    		=> '',
				        "dependency"    => array(
				            "element"       => 'table_layout',
				            "value"         => array('layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6', 'layout-7', 'layout-8', 'layout-9', 'layout-10', 'layout-11', 'layout-12'),
				        ),
				    ),
	                array(
	                    'type'      	=> 'textfield',
				        'group'     	=> 'Features',
	                    'heading'   	=> esc_html__( 'Padding', 'themelayer' ),
				        'description' 	=> esc_attr__( 'Add padding like this example: 20px 0px, 10px 0px 10px 0px.', 'themelayer' ),
	                    'param_name'	=> 'content_padding',
	                    'value'     	=> '',
				        "dependency"    => array(
				            "element"       => 'table_layout',
				            "value"         => array('layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6', 'layout-7', 'layout-8', 'layout-9', 'layout-10', 'layout-11', 'layout-12'),
				        ),
	                ),






	               /*==========================================
				 				Table Price Section
	               ==========================================*/ 
				    array(
				        'type'          => 'textfield',
				        'group'         => 'Price',
				        'heading'       => esc_html__( 'Package Price', 'themelayer' ),
				        'description' 	=> esc_attr__( 'Add picing like this example: 10, 30 ', 'themelayer' ),
				        'param_name'    => 'price',
				        "dependency"    => array(
				            "element"       => 'table_layout',
				            "value"         => array('layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6', 'layout-7', 'layout-8', 'layout-9', 'layout-10', 'layout-11', 'layout-12'),
				        ),
				    ),
				    array(
				        'type'          => 'checkbox',
				        'group'         => 'Price',
				        'heading'       => esc_html__( 'Chose Style', 'themelayer' ),
				        'param_name'    => 'price_style_check',
				        'value'     	=> array(
				        	'Font Style' 		=> 1,
				        	'Color' 			=> 2,
				        	'Aligment' 			=> 3,
				        	'Padding' 			=> 4,
				        ),
				        "dependency"    => array(
				            "element"       => 'table_layout',
				            "value"         => array('layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6', 'layout-7', 'layout-8', 'layout-9', 'layout-10', 'layout-11', 'layout-12'),
				        ),
				    ),
				    array(
				        'type'          => 'google_fonts',
				        'group'         => 'Price',
				        'param_name'    => 'price_font',
				        'weight' 		=> 0,
		                'settings' 		=> array(
		                    'fields' 		=> array(
		                        'font_family_description' 	=> __( 'Select Font Family.', 'themelayer' ),
		                        'font_style_description' 	=> __( 'Select Font Style.', 'themelayer' ),
		                    ),
		                ), 
	                    'dependency'    => array(
	                        'element'   	=> 'price_style_check',
	                        'value'     	=> '1'
	                    )
				    ),
	                array(
	                    'type'      	=> 'textfield',
				        'group'     	=> 'Price',
	                    'heading'   	=> esc_html__( 'Font Size', 'themelayer' ),
				        'description' 	=> esc_attr__( 'Add font size like this example: 25px ', 'themelayer' ),
	                    'param_name'	=> 'price_font_size',
	                    'value'     	=> '',
	                    'dependency'    => array(
	                        'element'   => 'price_style_check',
	                        'value'     => '1'
	                    )
	                ),
	                array(
	                    'type'      	=> 'dropdown',
				        'group'     	=> 'Price',
	                    'heading'   	=> esc_html__( 'Aligment', 'themelayer' ),
	                    'param_name'	=> 'price_aligment',
	                    'value'     	=> array(
		                    	'Center' 		=> '',
		                    	'Left' 			=> 'text-left',
		                    	'Right' 		=> 'text-right',
	                    	),
	                    'dependency'    => array(
	                        'element'   => 'price_style_check',
	                        'value'     => '3'
	                    )
	                ),
				    array(
				        'type'          => 'colorpicker',
				        'group'         => 'Price',
				        'heading'       => esc_html__( 'Text Color', 'themelayer' ),
				        'param_name'    => 'price_color',
				        'value'    		=> '',
	                    'dependency'    => array(
	                        'element'   => 'price_style_check',
	                        'value'     => '2'
	                    )

				    ),
				    array(
				        'type'          => 'colorpicker',
				        'group'         => 'Price',
				        'heading'       => esc_html__( 'Background Color', 'themelayer' ),
				        'param_name'    => 'price_bg_color',
				        'value'    		=> '',
	                    'dependency'    => array(
	                        'element'   => 'price_style_check',
	                        'value'     => '2'
	                    )

				    ),
				    array(
				        'type'          => 'textfield',
				        'group'         => 'Price',
				        'heading'       => esc_html__( 'Circle Border', 'themelayer' ),
				        'param_name'    => 'price_circle_border',
				        'value'    		=> '',
				        "dependency"    => array(
				            "element"       => 'table_layout',
				            "value"         => array('layout-11', 'layout-12'),
				        ),

				    ),
				    array(
				        'type'          => 'colorpicker',
				        'group'         => 'Price',
				        'heading'       => esc_html__( 'Circle Border Color', 'themelayer' ),
				        'param_name'    => 'price_border_circle_color',
				        'value'    		=> '',
				        "dependency"    => array(
				            "element"       => 'table_layout',
				            "value"         => array('layout-11', 'layout-12'),
				        ),

				    ),

				    array(
				        'type'          => 'textfield',
				        'group'         => 'Price',
				        'heading'       => esc_html__( 'Padding', 'themelayer' ),
				        'description' 	=> esc_attr__( 'Add padding like this example: 25px, 20px 0px', 'themelayer' ),
				        'param_name'    => 'price_padding',
				        'value'    		=> '',
	                    'dependency'    => array(
	                        'element'   => 'price_style_check',
	                        'value'     => '4'
	                    )

				    ),








	               /*==========================================
				 				Table Currency Section
	               ==========================================*/ 

				    array(
				        'type'          => 'checkbox',
				        'group'         => 'Currency',
				        'heading'       => esc_html__( 'Chose Style', 'themelayer' ),
				        'param_name'    => 'currency_style_check',
				        'value'     	=> array(
				        	'Currency' 		=> 1,
				        	'Color' 		=> 2,
				        ),
				        "dependency"    => array(
				            "element"       => 'table_layout',
				            "value"         => array('layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6', 'layout-7', 'layout-8', 'layout-9', 'layout-10', 'layout-11', 'layout-12'),
				        ),
				    ),
				    array(
				        'type'          => 'iconpicker',
				        'group'         => 'Currency',
				        'heading'       => esc_html__( 'Currency', 'themelayer' ),
				        'description' 	=> esc_attr__( 'Add price currency logo', 'themelayer' ),
				        'param_name'    => 'price_currency',
				        'value'    		=> 'fa fa-tag',
	                    'dependency'    => array(
	                        'element'   	=> 'currency_style_check',
	                        'value'     	=> '1'
	                    )
				    ),

				    array(
				        'type'          => 'textfield',
				        'group'         => 'Currency',
	                    'heading'   	=> esc_html__( 'Font Size', 'themelayer' ),
				        'description' 	=> __( 'add a custome font size like this example: 16px.', 'themelayer' ),
				        'param_name'    => 'currency_font_size',
	                    'dependency'    => array(
	                        'element'   	=> 'currency_style_check',
	                        'value'     	=> '1'
	                    )
				    ),
				    array(
				        'type'          => 'colorpicker',
				        'group'         => 'Currency',
				        'heading'       => esc_html__( 'Chose Color', 'themelayer' ),
				        'param_name'    => 'currency_color',
				        'value'    		=> '',
	                    'dependency'    => array(
	                        'element'   => 'currency_style_check',
	                        'value'     => '2'
	                    )

				    ),










	               /*==========================================
				 				Table Duation Section
	               ==========================================*/ 
				    array(
				        'type'          => 'textfield',
				        'group'         => 'Duration',
				        'heading'       => esc_html__( 'Package Duration', 'themelayer' ),
				        'description' 	=> esc_attr__( 'Add duration like this example: Per Day, Per Month, Per Year.', 'themelayer' ),
				        'param_name'    => 'price_duration',
				        "dependency"    => array(
				            "element"       => 'table_layout',
				            "value"         => array('layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6', 'layout-7', 'layout-8', 'layout-9', 'layout-10', 'layout-11', 'layout-12'),
				        ),
				    ),
				    array(
				        'type'          => 'checkbox',
				        'group'         => 'Duration',
				        'heading'       => esc_html__( 'Chose Style', 'themelayer' ),
				        'param_name'    => 'duation_style_check',
				        'value'     	=> array(
				        	'Font Style' 	=> 1,
				        ),
				        "dependency"    => array(
				            "element"       => 'table_layout',
				            "value"         => array('layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6', 'layout-7', 'layout-8', 'layout-9', 'layout-10', 'layout-11', 'layout-12'),
				        ),
				    ),
				    array(
				        'type'          => 'google_fonts',
				        'group'         => 'Duration',
				        'param_name'    => 'duration_font',
				        'weight' 		=> 0,
		                'settings' 		=> array(
		                    'fields' 		=> array(
		                        'font_family_description' 	=> __( 'Select Font Family.', 'themelayer' ),
		                        'font_style_description' 	=> __( 'Select Font Style.', 'themelayer' ),
		                    ),
		                ), 
	                    'dependency'    => array(
	                        'element'   	=> 'duation_style_check',
	                        'value'     	=> '1'
	                    )
				    ),
				    array(
				        'type'          => 'textfield',
				        'group'         => 'Duration',
	                    'heading'   	=> esc_html__( 'Font Size', 'themelayer' ),
				        'description' 	=> __( 'add a custome font size like this example: 16px.', 'themelayer' ),
				        'param_name'    => 'duration_font_size',
	                    'dependency'    => array(
	                        'element'   	=> 'duation_style_check',
	                        'value'     	=> '1'
	                    )
				    ),
				    array(
				        'type'          => 'colorpicker',
				        'group'         => 'Duration',
				        'heading'       => esc_html__( 'Chose Color', 'themelayer' ),
				        'param_name'    => 'duration_color',
				        'value'    		=> '',
	                    'dependency'    => array(
	                        'element'   => 'duation_style_check',
	                        'value'     => '1'
	                    )

				    ),











	               /*==========================================
				 				Table Action Button Section
	               ==========================================*/ 
				    array(
				        'type'          => 'textfield',
				        'group'         => 'Button',
				        'heading'       => esc_html__( 'Button Text', 'themelayer' ),
				        'description' 	=> esc_attr__( 'Add button text like this example: Buy Now, Purchase Now ', 'themelayer' ),
				        'param_name'    => 'button_text',
				        "dependency"    => array(
				            "element"       => 'table_layout',
				            "value"         => array('layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6', 'layout-7', 'layout-8', 'layout-9', 'layout-10', 'layout-11', 'layout-12'),
				        ),
				    ),
				    array(
				        'type'          => 'textfield',
				        'group'         => 'Button',
				        'heading'       => esc_html__( 'Button link', 'themelayer' ),
				        'description' 	=> esc_attr__( 'Add a page link.', 'themelayer' ),
				        'param_name'    => 'button_link',
				        "dependency"    => array(
				            "element"       => 'table_layout',
				            "value"         => array('layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6', 'layout-7', 'layout-8', 'layout-9', 'layout-10', 'layout-11', 'layout-12'),
				        ),
				    ),
				    array(
				        'type'          => 'colorpicker',
				        'group'         => 'Button',
				        'heading'       => esc_html__( 'Backgound', 'themelayer' ),
				        'param_name'    => 'footer_bg',
				        'value'    		=> '',
				        "dependency"    => array(
				            "element"       => 'table_layout',
				            "value"         => array('layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6', 'layout-7', 'layout-8', 'layout-9', 'layout-10', 'layout-11', 'layout-12'),
				        ),

				    ),
				    array(
				        'type'          => 'textfield',
				        'group'         => 'Button',
				        'heading'       => esc_html__( 'Padding', 'themelayer' ),
				        'param_name'    => 'footer_padding',
				        'value'    		=> '',
				        "dependency"    => array(
				            "element"       => 'table_layout',
				            "value"         => array('layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6', 'layout-7', 'layout-8', 'layout-9', 'layout-10', 'layout-11', 'layout-12'),
				        ),

				    ),// Footer section end...
				    array(
				        'type'          => 'checkbox',
				        'group'         => 'Button',
				        'heading'       => esc_html__( 'Chose Style', 'themelayer' ),
				        'param_name'    => 'button_style_check',
				        'value'     	=> array(
				        	'Font Style' 			=> 1,
				        	'Button Normal Style' 	=> 2,
				        	'Button Hover Style' 	=> 4,
				        	'Aligment' 				=> 3,
				        ),
				        "dependency"    => array(
				            "element"       => 'table_layout',
				            "value"         => array('layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6', 'layout-7', 'layout-8', 'layout-9', 'layout-10', 'layout-11', 'layout-12'),
				        ),
				    ),
				    array(
				        'type'          => 'google_fonts',
				        'group'         => 'Button',
				        'param_name'    => 'button_font',
				        'weight' 		=> 0,
		                'settings' 		=> array(
		                    'fields' 		=> array(
		                        'font_family_description' 	=> __( 'Select Font Family.', 'themelayer' ),
		                        'font_style_description' 	=> __( 'Select Font Style.', 'themelayer' ),
		                    ),
		                ), 
	                    'dependency'    => array(
	                        'element'   	=> 'button_style_check',
	                        'value'     	=> '1'
	                    )
				    ),
	                array(
	                    'type'      	=> 'dropdown',
				        'group'     	=> 'Button',
	                    'heading'   	=> esc_html__( 'Aligment', 'themelayer' ),
	                    'param_name'	=> 'button_aligment',
	                    'value'     	=> array(
		                    	'Center' 		=> '',
		                    	'Left' 			=> 'd-flex justify-content-start',
		                    	'Right' 		=> 'd-flex justify-content-end',
	                    	),
	                    'dependency'    => array(
	                        'element'   => 'button_style_check',
	                        'value'     => '3'
	                    )
	                ),
	                // Button Nomal area field start...
				    array(
				        'type'          => 'textfield',
				        'group'         => 'Button',
				        'heading'       => esc_html__( 'Button Border', 'themelayer' ),
				        'description' 	=> esc_html__('add button border like this example : 1px, 2px, 3px', 'themelayer'),
				        'param_name'    => 'button_border',
				        'value'    		=> '',
	                    'dependency'    => array(
	                        'element'   => 'button_style_check',
	                        'value'     => '2'
	                    )

				    ),
				    array(
				        'type'          => 'textfield',
				        'group'         => 'Button',
				        'heading'       => esc_html__( 'Border Radius', 'themelayer' ),
				        'description' 	=> esc_html__('add button border radious like this example : 1px, 2px, 3px', 'themelayer'),
				        'param_name'    => 'button_border_radius',
				        'value'    		=> '',
	                    'dependency'    => array(
	                        'element'   => 'button_style_check',
	                        'value'     => '2'
	                    )

				    ),
				    array(
				        'type'          => 'iconpicker',
				        'group'         => 'Button',
				        'heading'       => esc_html__( 'Button Icon', 'themelayer' ),
				        'param_name'    => 'button_icon',
				        'value'    		=> 'fa fa-opencart',
	                    'dependency'    => array(
	                        'element'   => 'button_style_check',
	                        'value'     => '2'
	                    )

				    ),
				    array(
				        'type'          => 'colorpicker',
				        'group'         => 'Button',
				        'heading'       => esc_html__( 'Border Color', 'themelayer' ),
				        'param_name'    => 'button_border_color',
				        'value'    		=> '',
	                    'dependency'    => array(
	                        'element'   => 'button_style_check',
	                        'value'     => '2'
	                    )

				    ),

				    array(
				        'type'          => 'colorpicker',
				        'group'         => 'Button',
				        'heading'       => esc_html__( 'Button Backgound Color', 'themelayer' ),
				        'param_name'    => 'button_bg_color',
				        'value'    		=> '',
	                    'dependency'    => array(
	                        'element'   => 'button_style_check',
	                        'value'     => '2'
	                    )

				    ),
				    array(
				        'type'          => 'colorpicker',
				        'group'         => 'Button',
				        'heading'       => esc_html__( 'text Color', 'themelayer' ),
				        'param_name'    => 'button_text_color',
				        'value'    		=> '',
	                    'dependency'    => array(
	                        'element'   => 'button_style_check',
	                        'value'     => '2'
	                    )

				    ),// Button Normal area field End...

				    // Button Hover area field start...
				    array(
				        'type'          => 'colorpicker',
				        'group'         => 'Button',
				        'heading'       => esc_html__( 'text Hover Color', 'themelayer' ),
				        'param_name'    => 'button_text_hover_color',
				        'value'    		=> '',
	                    'dependency'    => array(
	                        'element'   => 'button_style_check',
	                        'value'     => '4'
	                    )

				    ),
				    array(
				        'type'          => 'colorpicker',
				        'group'         => 'Button',
				        'heading'       => esc_html__( 'Background Hover Color', 'themelayer' ),
				        'param_name'    => 'button_bg_hover_color',
				        'value'    		=> '',
	                    'dependency'    => array(
	                        'element'   => 'button_style_check',
	                        'value'     => '4'
	                    )

				    ),// Button Hover area field end...













	               /*
	               * ==========================================
								Animation Section
	               * ==========================================
	               */ 
	                array(
	                    'type'      => 'dropdown',
				        'group'     => 'Animation',
	                    'heading'   => esc_html__( 'Animation', 'themelayer' ),
	                    'param_name'=> 'animation',
	                    'value'     => array('OFF' => 0, 'ON' => 1),
				        "dependency"    => array(
				            "element"       => 'table_layout',
				            "value"         => array('layout-1', 'layout-2', 'layout-3', 'layout-4', 'layout-5', 'layout-6', 'layout-7', 'layout-8', 'layout-9', 'layout-10', 'layout-11', 'layout-12'),
				        ),
	                ),
	                array(
	                    'type'          => 'animation_style',
				        'group'     	=> 'Animation',
	                    'heading'       => esc_html__( 'Animation Style', 'themelayer' ),
	                    'param_name'    => 'animation_style',
	                    'value'         => 'fadeInUp',
	                    'save_always'   => true,
	                    'dependency'    => array(
	                        'element'   => 'animation',
	                        'value'     => '1'
	                    )
	                ),
	                array(
	                    'type'          => 'textfield',
				        'group'     	=> 'Animation',
	                    'heading'       => esc_html__( 'Animation Duration', 'themelayer' ),
	                    'param_name'    => 'animation_duration',
	                    'value'         => '1.5',
	                    'save_always'   => true,
	                    'dependency'    => array(
	                        'element'   => 'animation',
	                        'value'     => '1'
	                    )
	                ),
	                array(
	                    'type'          => 'textfield',
				        'group'     	=> 'Animation',
	                    'heading'       => esc_html__( 'Animation Delay', 'themelayer' ),
	                    'param_name'    => 'animation_delay',
	                    'value'         => '0',
	                    'save_always'   => true,
	                    'dependency'    => array(
	                        'element'   => 'animation',
	                        'value'     => '1'
	                    )
	                ),// Animation section end...
			    );

	}
}
/* =========================================
* Shortcode logic how it should be rendered
* =========================================*/ 
if(!function_exists('ptfwb_VcMapShortcode')) {
	function ptfwb_VcMapShortcode(){
	    return array(
	    	// Table layout section.. 
	        'table_layout'          => '',
	        'table_bg_color'        => '',
	        'table_border_radius'   => '',

	    	// Table Title section.. 
	        'title'                 => '',
	        'title_style_check'  	=> '',
	        'title_font'           	=> '',
	        'title_font_size'       => '',
	        'title_padding'       	=> '',
	        'title_aligment'      	=> '',
	        'title_color'      		=> '',
	        'title_bg_color'      	=> '',

	    	// Table Price section.. 
	        'price'      			=> '',
	        'price_style_check'  	=> '',
	        'price_font'           	=> '',
	        'price_font_size'       => '',
	        'price_aligment'      	=> '',
	        'price_color'      		=> '',
	        'price_bg_color'      	=> '',
	        'price_padding'      	=> '',
	        'price_circle_border'  => '',
	        'price_border_circle_color'  => '',

	        // Table Features section..
	        'content_size'          => '',
	        'content_color'         => '',
	        'content_padding'       => '',

	    	// Table Currency section.. 
	        'currency_style_check'  => '',
	        'price_currency'        => '',
	        'currency_font_size'    => '',
	        'currency_color'    	=> '',

	    	// Table Duation section.. 
	        'price_duration'        => '',
	        'duation_style_check'   => '',
	        'duration_font'    		=> '',
	        'duration_font_size'    => '',
	        'duration_color'    	=> '',
	        
	    	// Table Action Button section.. 
	        'button_text'      		=> '',
	        'button_link'     		=> '',
	        'footer_bg'     		=> '',
	        'footer_padding'     	=> '',
	        'button_style_check'  	=> '',
	        'button_font'           => '',
	        'button_aligment'      	=> '',
	    	// Button Normal Style.. 
	        'button_border'      	=> '',
	        'button_icon'      		=> '',
	        'button_border_radius'  => '',
	        'button_border_color'   => '',
	        'button_bg_color'      	=> '',
	        'button_text_color'     => '',
	    	// Button Hover Style.. 
	        'button_text_hover_color'   => '',
	        'button_bg_hover_color'     => '',


	        // Animation Style ...
	        'animation' 			=> '',
	        'animation_style' 		=> '',
	        'animation_duration' 	=> '',
	        'animation_delay' 		=> '',

	        );
	}
}