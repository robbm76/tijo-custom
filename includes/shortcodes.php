<?php
/***********************************************************************************
* shortcodes
***********************************************************************************/

/* accordion
----------------------------------*/

add_shortcode( 'accordion_section', 'accordion_shortcode_wrapper' );
function accordion_shortcode_wrapper( $atts, $content = 'null' ) {
  ob_start();
  // Load necessary scripts only when shortcode is used
  wp_enqueue_script( 'jquery-ui-accordion' );
  ?>

  <div class="gb-accordion">
    <?php echo do_shortcode($content); ?>
  </div>

  <?php
  $gb_accordion_wrapper = ob_get_clean();
  return $gb_accordion_wrapper;
}

add_shortcode( 'accordion', 'accordion_shortcode_section' );
function accordion_shortcode_section( $atts, $content = 'null' ) {
  extract( shortcode_atts( array(
    'title' => '',
    ),
  $atts, 'gb_accordion_section' ) );
  ob_start();
  ?>
    <p class="gb-accordion-trigger"><?php echo $title; ?></p>
    <div class="gb-accordion-content">
      <?php
        do_action( 'gb_before_accordion_content');
        echo do_shortcode($content);
        do_action( 'gb_after_accordion_content' );
      ?>
    </div>
  <?php
  $gb_accordion_section = ob_get_clean();
  return $gb_accordion_section;
}

/* accordion
----------------------------------*/

function tab_shortcode( $atts, $content = null ) {
// Load necessary scripts only when shortcode is used
  wp_enqueue_script( 'jquery-ui-tabs' );
    extract( shortcode_atts( array(
        'title' => ''
    ), $atts ) );
    return '<div id="tabs-'. sanitize_title( $title ) .'">'. do_shortcode( $content ) .'</div>';
}
add_shortcode( 'tab', 'tab_shortcode' );

// Tabs Container
function tabs_container_shortcode( $atts, $content = null ) {

    preg_match_all( '/tab title="([^\"]+)"/i', $content, $matche, PREG_OFFSET_CAPTURE );

    $tab_title = array();

    if( isset($matche[1]) ) {
        $tab_title = $matche[1];
    }

    $output = '';

    if( count($tab_title) ) {
        $output .= '<div id="tabs">';
        $output .= '<ul class="nav clearfix">';
        foreach( $tab_title as $tab ){
            $output .= '<li><a href="#tabs-'. sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
        }
        $output .= '</ul>' . do_shortcode( $content ) . '</div>';
    } else {
        $output .= do_shortcode( $content );
    }

    return $output;

}
add_shortcode( 'tabs_container', 'tabs_container_shortcode' );

/* column classes
----------------------------------*/
function tijo_genesis_column_shortcode( $atts, $content = 'null' ) {
  extract( shortcode_atts( array(
    'size' => '',
    'position' => ''
    ),
  $atts, 'col' ) );

  $col_atts = $size;
  
  if ( $position == 'first' ) {
    $col_atts .= ' first'; 
  }

  $col = '<div class="'.$col_atts.'">'.do_shortcode($content).'</div>';
  
  return $col;
}

add_shortcode( 'col', 'tijo_genesis_column_shortcode' );
