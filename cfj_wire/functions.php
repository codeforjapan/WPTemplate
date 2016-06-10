<?php

add_action( 'init', 'create_post_type' );
function create_post_type() {

  register_post_type( 'story',
    array(
      'labels' => array(
        'name' => __( 'ストーリー' ),
        'singular_name' => __( 'ストーリー' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );

  register_post_type( 'fellowship',
    array(
      'labels' => array(
        'name' => __( 'フェローシップ' ),
        'singular_name' => __( 'フェローシップ' )
      ),
      'public' => true,
      'has_archive' => true,
      )
  );

  register_post_type( 'faq',
    array(
      'labels' => array(
        'name' => __( 'FAQ' ),
        'singular_name' => __( 'FAQ' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );

  register_post_type( 'brigade',
    array(
      'labels' => array(
        'name' => __( 'ブリゲード' ),
        'singular_name' => __( 'ブリゲード' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );

}

?>
