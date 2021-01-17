<div id="sideBar">
  <?php $wloop = new WP_Query('post_type=widgets&orderby=menu_order&order=ASC&posts_per_page=999'); ?>
  <?php while ( $wloop->have_posts() ) : $wloop ->the_post(); ?>
    <?php $post_object = get_field('the_page'); ?>
    <?php if (is_page($post_object->ID)) : ?>
      <div class="widget">
        <div class="widgetPhoto">
          <?php if(get_field('the_image')): ?>
            <?php $theThumb = wp_get_attachment_thumb_url(get_field('the_image'), 'thumbnail'); ?>
            <?php $theLarge = wp_get_attachment_image_src( get_field('the_image'), 'medium' ); ?>
          <?php endif;?>
          <?php if(get_field('the_caption')): ?>
            <div class="widgetCaption">
              <p><?php echo get_field('the_caption'); ?></p>
            </div>
          <?php endif; ?>
          <?php if(get_field('the_video')): ?>
            <textarea class="theImageURL">
              <video width="100%" height="100%" poster="<?php echo $theThumb; ?>" controls preload="none">
                <source src="<?php the_field('the_video'); ?>" type="video/mp4">
              </video>
            </textarea>
          <?php elseif (get_field('the_image')): ?>
            <textarea class="theImageURL" style="height:<?php echo $theLarge[2]."px"; ?>; width:<?php echo $theLarge[1]."px"; ?>;">
              <?php echo $theLarge[0] ?>
            </textarea>
            <img src="<?php echo $theThumb; ?>" width='273' height='202' style="margin-top:8px;" />
          <?php endif; ?>
        </div>
        <img alt="Frame" class="frame fn" src="<?php bloginfo('template_url'); ?>/images/gildedFrameN.png" width="319" height="40" />
        <img alt="Frame" class="frame fw" src="<?php bloginfo('template_url'); ?>/images/gildedFrameW.png" width="34" height="185" />
        <img alt="Frame" class="frame fe" src="<?php bloginfo('template_url'); ?>/images/gildedFrameE.png" width="33" height="185" />
        <img alt="Frame" class="frame fs" src="<?php bloginfo('template_url'); ?>/images/gildedFrameS.png" width="319" height="38" />
      </div> <!--/widget-->
    <?php endif; //if (is_page($post_object->post_name)):?>
  <?php endwhile; ?>
  <?php wp_reset_postdata();?>
</div><!--/sideBar-->