<?php 
    $arg = [
        'cat' => '<span class="niotitle">'.esc_html__('Category','gosofie').'</span>',
        'tag' => '<span  class="niotitle">'.esc_html__('Tag','gosofie').'</span>',
        'author' => '<span  class="niotitle">'.esc_html__('Author','gosofie').'</span>',
        'year' => '<span  class="niotitle">'.esc_html__('Year','gosofie').'</span>',
        'notfound' => '<span  class="niotitle">'.esc_html__('Not found','gosofie').'</span>',
        'search' => '<span  class="niotitle">'.esc_html__('Search for','gosofie').'</span>',
        'marchive' => '<span  class="niotitle">'.esc_html__('Monthly archive','gosofie').'</span>',
        'yarchive' => '<span  class="niotitle">'.esc_html__('Yearly archive','gosofie').'</span>',
    ];
?>

<header class="check-header">
  <div class="khb_nav_row">
      <div class="khb_nav_left khb_nav_normal">
        <?php gosofie_logo();?>
      </div>
      <div class="khb_nav_right khb_nav_grow">
        <div class="khb_nav_alignright">

            <?php
                wp_nav_menu( array(
                    'container' => false,
                    'theme_location' => 'primary',
                    'fallback_cb'=> 'gosofie_no_main_nav',
                    'items_wrap' => '<ul class="khb-navbox">%3$s</ul>',
                ));         
            ?>  
            <i class="khbtap dashicons dashicons-menu"></i>
        </div>

      </div>
  </div>

</header><!-- /.header -->

<section class="unit-test-breadcumb">
  <div class="background-overlay"></div>
  <div class="container">
    <div class="breadcrumb_list headline ul-li">
      <h2 class="breadcrumb_title"><?php echo gosofie_single_title($arg); ?></h2>
      <?php gosofie_unit_breadcumb();?>
    </div>
  </div> 
</section>

<div class="khb-mobile">
<i aria-hidden="true" class="khbclose dashicons dashicons-no-alt"></i>
<div class="sidebar">
    <?php
        wp_nav_menu( array(
            'container' => false,
            'theme_location' => 'primary',
            'fallback_cb'=> 'gosofie_no_main_nav',
            'items_wrap' => '<ul class="khb-mobilenav">%3$s</ul>',
        ));         
    ?> 
</div>

</div>
