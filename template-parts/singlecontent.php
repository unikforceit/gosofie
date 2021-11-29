<div id="post-<?php the_ID(); ?>" <?php post_class('grid'); ?>>    
  
    <div class="entry-title-meta">
    	<?php the_title( '<h3>', '</h3>') ?>
        <div class="meta-info">
            <?php gosofie_single_category();?>
            <?php gosofie_post_author();?>
            <?php gosofie_post_date();?>
        </div>
    </div>
    <div class="entry-body">
        <?php the_content();?>
        <?php wp_link_pages();?> 
        
    </div>  
      <?php gosofie_share_tags();?>
	  <?php gosofie_navigation();?>
      <?php gosofie_related_post();?>
      <?php gosofie_authorbox();?>
	  <?php
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	  ?>    
</div>