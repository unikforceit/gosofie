<?php

function gosofie_single_title($arg){

        if ( is_category() ) {
            /* translators: Category archive title. 1: Category name */
            $title = single_cat_title( $arg['cat'], 'gosofie',false);
        } elseif ( is_tag() ) {
            /* translators: Tag archive title. 1: Tag name */
            $title = single_cat_title( $arg['tag'], 'gosofie',false);
        } elseif ( is_author() ) {
            $title = sprintf( $arg['author'].'%s', '<span>' . get_the_author() . '</span>' );
            //$title = get_the_author( 'Author: ', true );
        } elseif ( is_year() ) {
            /* translators: Yearly archive title. 1: Year */
            $title = sprintf( $arg['yarchive'], '<span>' .get_the_date('F Y', 'yearly archives date format' ). '</span>' );
        } elseif ( is_month() ) {
            /* translators: Monthly archive title. 1: Month name and year */
            $title =  sprintf( $arg['marchive'], '<span>' .get_the_date('F Y', 'monthly archives date format' ). '</span>' );
        } elseif ( is_404() ) {
            /* translators: Daily archive title. 1: Date */
            $title = $arg['notfound'];
        }elseif ( is_post_type_archive() ) {
            /* translators: Post type archive title. 1: Post type name */
            $title = post_type_archive_title( '', false );
        } elseif ( is_tax() ) {
            $tax = get_taxonomy( get_queried_object()->taxonomy );
            /* translators: Taxonomy term archive title. 1: Taxonomy singular name, 2: Current taxonomy term */
            $title = single_term_title( '', false ) ;
        } elseif (is_search()){
            $title = sprintf( $arg['search'].'%s','<span>' . get_search_query() . '</span>' );
        }elseif( is_home() && is_front_page() ){
          $title = esc_html__( 'Home', 'gosofie' );
        } elseif( is_singular() ){
          $title = get_the_title();
        }else {
            $title = esc_html__( 'Archives','gosofie' );
        }

        return $title;
}

function gosofie_unit_breadcumb() {

  $delimiter = '<span class="sep">|</span>';
  $name = esc_attr( 'Blog home', 'gosofie' );
  $currentBefore = '<span class="current">';
  $currentAfter = '</span>';
  
  
    echo '<div id="crumbs">';
   
    global $post;
  
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo '<span class="current">' . '';
      single_cat_title();
      echo '' . '</span>';
  
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo '<span class="current">' . get_the_time('d') . '</span>';
  
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<span class="current">' . get_the_time('F') . '</span>';
  
    } elseif ( is_year() ) {
      echo '<span class="current">' . get_the_time('Y') . '</span>';
  
    } elseif ( is_single() && !is_attachment() ) {
      $cat = get_the_category(); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<span class="current">';
      the_title();
      echo '</span>';
  
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
      echo '<span class="current">';
      the_title();
      echo '</span>';
  
    } elseif ( is_page() && !$post->post_parent ) {
      echo '<span class="current">';
      the_title();
      echo '</span>';
  
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo gosofie_html($crumb) . ' ' . $delimiter . ' ';
      echo '<span class="current">';
      the_title(); 
      echo '</span>';
  
    } elseif ( is_search() ) {
      echo '<span class="current">' . esc_attr( 'Search for ', 'gosofie' ) . get_search_query() . '' . $currentAfter;
  
    } elseif ( is_tag() ) {
      echo '<span class="current">' . esc_attr( 'Posts tagged ', 'gosofie' );
      single_tag_title();
      echo '' . '</span>';
  
    } elseif ( is_author() ) {
      global $author;
      $userdata = get_userdata($author);
      echo '<span class="current">' . esc_attr( 'Post by ', 'gosofie' ) . $userdata->display_name . $currentAfter;
  
    } elseif ( is_404() ) {
      echo '<span class="current">' . esc_attr( 'Error 404', 'gosofie' ) . $currentAfter;
    } else {

      $home = esc_url(home_url( '/' ));
      echo '<a href="' . $home . '">' . $name . '</a> ';

    }
   
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo esc_attr('Page ','gosofie') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
  
    echo '</div>';
  
}
