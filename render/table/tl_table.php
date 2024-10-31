<?php
/**
 * Extends class from [PTFWB_PriceTableForWPBakery]
 * @return [null] [Load File]
 */
class PTFWB_PriceTable extends PTFWB_PriceTableForWPBakery {

    protected static $instance = null;
    public static function instance() {
        if ( null == self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'ptfwb_IntegrateMap' ) );
 
        // Use this when creating a shortcode addon
        add_shortcode( 'PTFWB_price_table', array( $this, 'ptfwb_RenderHtml' ) );

        // Register Admin CSS and JS
        add_action( 'admin_enqueue_scripts', array( $this, 'ptfwb_loadAdminCssAndJs' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'ptfwb_loadAddons_CssAndJs' ) );

    }
 
    public function ptfwb_IntegrateMap() {
        vc_map( array(
            "name"              => esc_html__("Pricing Table", 'themelayer'),
            "description"       => esc_html__("add a picing table", 'themelayer'),
            "base"              => "PTFWB_price_table",
            "class"             => "",
            "controls"          => "full",
            "icon"              => plugins_url('../../images/icon/Logo.png', __FILE__), 
            "category"          => esc_html__('TL Pricing Table', 'themelayer'),
            "params"            => ptfwb_VcMapLayout()

        ));

    }
    
    /**
    * [render_html]
    * @param  [array] $atts 
    * @return [markup]
    * Create Shortcode
    */
    public function ptfwb_RenderHtml( $atts, $content = null ) {
        extract( shortcode_atts(
            ptfwb_VcMapShortcode(),
        $atts ) );

        /**
        * [ptfwb_getFontsData]
        * @param  [array] 
        * @return [FontsData]
        * Create font Shortcode
        */
        $title_fonts    = $this->ptfwb_getFontsData( $title_font );
        $price_fonts    = $this->ptfwb_getFontsData( $price_font );
        $duration_fonts = $this->ptfwb_getFontsData( $duration_font );
        $button_fonts   = $this->ptfwb_getFontsData( $button_font );

        /**
        * [ptfwb_googleFontsStyles]
        * @param  [array] 
        * @return [FontsStyles]
        * Create font style Shortcode
        */
        $titlefont      = $this->ptfwb_googleFontsStyles( $title_fonts );   
        $pricefont      = $this->ptfwb_googleFontsStyles( $price_fonts );   
        $durationfont   = $this->ptfwb_googleFontsStyles( $duration_fonts );   
        $buttonfont     = $this->ptfwb_googleFontsStyles( $button_fonts );   
        /**
        * [ptfwb_enqueueGoogleFonts]
        * @param  [array] 
        * @return [GoogleFonts]
        * Create font Shortcode
        */
        $this->ptfwb_enqueueGoogleFonts( $title_fonts );
        $this->ptfwb_enqueueGoogleFonts( $price_fonts );
        $this->ptfwb_enqueueGoogleFonts( $duration_fonts );
        $this->ptfwb_enqueueGoogleFonts( $button_fonts );

        $content = wpb_js_remove_wpautop($content, true);
        /**
        * [tbl_value]
        * @param  [array]
        * @return [Table Data]
        * Create table field Shortcode
        */
        $tbl_value = array(
            // Table layout section.. 
            'table_layout'          => $table_layout,
            'table_bg_color'        => $table_bg_color,
            'table_border_radius'   => $table_border_radius,

            // Table Title section.. 
            'title'                 => $title,
            'title_style_check'     => $title_style_check,
            'title_font'            => $titlefont,
            'title_font_size'       => $title_font_size,
            'title_padding'         => $title_padding,
            'title_aligment'        => $title_aligment,
            'title_color'           => $title_color,
            'title_bg_color'        => $title_bg_color,

            // Table Features section..
            'content'               => $content,
            'content_size'          => $content_size,
            'content_color'         => $content_color,
            'content_padding'       => $content_padding,

            // Table Price section..
            'price'                 => $price,
            'price_style_check'     => $price_style_check,
            'price_font'            => $pricefont,
            'price_font_size'       => $price_font_size,
            'price_aligment'        => $price_aligment,
            'price_color'           => $price_color,
            'price_bg_color'        => $price_bg_color,
            'price_padding'         => $price_padding,
            'price_circle_border'    => $price_circle_border,
            'price_circle_color'    => $price_border_circle_color,

            // Table Currency section.. 
            'currency_style_check'  => $currency_style_check,
            'price_currency'        => $price_currency,
            'currency_font_size'    => $currency_font_size,
            'currency_color'        => $currency_color,

            // Table Duation section.. 
            'price_duration'        => $price_duration,
            'duation_style_check'   => $duation_style_check,
            'duration_font'         => $durationfont,
            'duration_font_size'    => $duration_font_size,
            'duration_color'        => $duration_color,

            // Table Action Button section..
            'button_text'           => $button_text,
            'button_link'           => $button_link,
            'footer_bg'             => $footer_bg,
            'footer_padding'        => $footer_padding,
            'button_style_check'    => $button_style_check,
            'button_font'           => $buttonfont,
            'button_aligment'       => $button_aligment,

            // Button Normal Style.. 
            'button_border'         => $button_border,
            'button_icon'           => $button_icon,
            'button_border_radius'  => $button_border_radius,
            'button_border_color'   => $button_border_color,
            'button_bg_color'       => $button_bg_color,
            'button_text_color'     => $button_text_color,

            // Button Hover Style.. 
            'button_text_hover_color'   => $button_text_hover_color,
            'button_bg_hover_color'     => $button_bg_hover_color,

            // Animation Style ...
            'animation'             => $animation,
            'animation_style'       => $animation_style,
            'animation_duration'    => $animation_duration,
            'animation_delay'       => $animation_delay,
        );
        ob_start();
        /**
        * [table_layout]
        * [switch] [case]
        * @return [Table layout] [break]
        * Create table layout Shortcode
        */
        switch ($table_layout) {
            case 'layout-1':
                $layout = 'layout-1';
                break;
            case 'layout-2':
                $layout = 'layout-2';
                break;
            case 'layout-3':
                $layout = 'layout-3';
                break;
            case 'layout-4':
                $layout = 'layout-4';
                break;
            case 'layout-5':
                $layout = 'layout-5';
                break;
            case 'layout-6':
                $layout = 'layout-6';
                break;
            case 'layout-7':
                $layout = 'layout-7';
                break;
            case 'layout-8':
                $layout = 'layout-8';
                break;
            case 'layout-9':
                $layout = 'layout-9';
                break;
            case 'layout-10':
                $layout = 'layout-10';
                break;
            case 'layout-11':
                $layout = 'layout-11';
                break;
            case 'layout-12':
                $layout = 'layout-12';
                break;
            default:
                $layout ='default';
                break;
        }
        /**
        * [ptfwb_get_template]
        * @param [array]
        * @return [Table layout] [ob_get_contents] [ob_end_clean]
        * table layout directory path 
        */ 
        ptfwb_get_template( $layout, array( 'params' => $tbl_value ), 'render/table/template/' );
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
    /**
    * [loadAdminCssAndJs] [loadAddonsCssAndJs]
    * @return [wp_enqueue_style]
    * Create table layout Shortcode
    */
    public function ptfwb_loadAdminCssAndJs(){
      wp_enqueue_style( 'pricing-Addons-Admin', plugins_url( 'css/tl_admin.css', __FILE__ ));
    }
    public function ptfwb_loadAddons_CssAndJs(){
      wp_enqueue_style( 'tl-price-table', plugins_url( 'css/tl_table.css', __FILE__ ));
    }

    /**
    * [fontsString]
    * [array]
    * @return [fontsData]
    * Build the string of values in an Array
    */
    protected function ptfwb_getFontsData( $fontsString ) {
        // Font data Extraction
        $googleFontsParam = new Vc_Google_Fonts();      
        $fieldSettings = array();
        $fontsData = strlen( $fontsString ) > 0 ? $googleFontsParam->_vc_google_fonts_parse_attributes( $fieldSettings, $fontsString ) : '';
        return $fontsData;
         
    }
     
    // Build the inline style starting from the data
    protected function ptfwb_googleFontsStyles( $fontsData ) {
        // Inline styles
        $fontFamily = (isset($fontsData['values']['font_family']) ? explode( ':', $fontsData['values']['font_family'] ) : '');
        $styles[] = (isset($fontFamily[0]) ? 'font-family:' . $fontFamily[0] : '');
        $fontStyles = (isset($fontsData['values']['font_style']) ? explode( ':', $fontsData['values']['font_style'] ) : '');
        $styles[] = (isset($fontStyles[1]) ? 'font-weight:' . $fontStyles[1] : '');
        $styles[] = (isset($fontStyles[2]) ? 'font-style:' . $fontStyles[2] : '');
         
        $inline_style = ''; 
        if(!empty($styles) && isset($styles))    
        foreach( $styles as $attribute ){           
            $inline_style .= $attribute.'; ';       
        }
        return $inline_style;
    }
     
    // Enqueue right google font from Googleapis
    protected function ptfwb_enqueueGoogleFonts( $fontsData ) {
        // Get extra subsets for settings (latin/cyrillic/etc)
        $settings = get_option( 'wpb_js_google_fonts_subsets' );
        if ( is_array( $settings ) && ! empty( $settings ) ) {
            $subsets = '&subset=' . implode( ',', $settings );
        } else {
            $subsets = '';
        }
        // We also need to enqueue font from googleapis
        if ( isset( $fontsData['values']['font_family'] ) ) {
            wp_enqueue_style( 
                'tl_price_table_google_fonts_' . vc_build_safe_css_class( $fontsData['values']['font_family'] ), 
                '//fonts.googleapis.com/css?family=' . $fontsData['values']['font_family'] . $subsets
            );
        }
         
    }
}
// Finally initialize code
PTFWB_PriceTable::instance();


