<?php 

/***********************************************************************************
* cpt/taxonomy
***********************************************************************************/

// Load CPT Helper
require_once( plugin_dir_path( __FILE__ ) . 'core-classes/CPT_Core/CPT_Core.php' );

// Load Taxonomy Helper
require_once( plugin_dir_path( __FILE__ ) . 'core-classes/Taxonomy_Core/Taxonomy_Core.php' );

/* Example

// CPT
register_via_cpt_core(
  array(
    'Single',
    'Plural',
    'cpt'
  ),
  array(
    'menu_icon' => 'dashicons-slides',
    'publicly_queryable' => false,
    'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' )
  )
);

// Tax
register_via_taxonomy_core(
  array(
    'Single',
    'Plural',
    'slug'
  ),
  array(),
  array(
    'CPT Name'
  )
);
*/