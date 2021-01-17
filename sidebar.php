<div id="sideBar">
  <?php $wloop = new WP_Query('post_type=widgets&orderby=menu_order&order=ASC&posts_per_page=999'); ?>
  <?php while ( $wloop->have_posts() ) : $wloop ->the_post(); ?>
    <?php $post_object = get_field('the_page'); ?>
    <?php if (is_page($post_object->ID)) : ?>
      <div class="widget">
        <div class="widgetPhoto">
          <?php 
            $theThumb = get_template_directory_uri() . "/images/reel.jpg"; 
            $defaultHeight = 480;
            $defaultWidth = 720;
          ?>
          <?php if(get_field('the_image')): ?>
            <?php $theThumb = wp_get_attachment_thumb_url(get_field('the_image'), 'thumbnail'); ?>
            <?php $theItem = wp_get_attachment_image_src( get_field('the_image'), 'medium' ); ?>
          <?php endif;?>
          <?php if(get_field('the_caption')): ?>
            <div class="widgetCaption">
              <p><?php echo get_field('the_caption'); ?></p>
            </div>
          <?php endif; ?>
          <?php if(get_field('the_video')): ?>
            <textarea class="theImageURL">
              <div style="background:#000 url('<?php bloginfo("template_url"); ?>/images/loadingBlack.gif') center center no-repeat; height: <?php echo $defaultHeight;?>px; width:<?php echo $defaultWidth;?>px;">
                <video width="100%" height="100%" poster="<?php echo $theThumb; ?>" controls autoplay>
                  <source src="<?php echo get_field('the_video'); ?>" type="video/mp4">
                </video>
              </div>
            </textarea>
            <img src="<?php echo $theThumb; ?>" width='273' height='202' style="margin-top:8px;" />
          <?php elseif(get_field('the_iframe')) : ?>
            <textarea class="theImageURL">
              <?php echo get_field('the_iframe'); ?>
            </textarea>
            <img src="<?php echo $theThumb; ?>" width='273' height='202' style="margin-top:8px;" />
          <?php elseif(get_field('the_embed')) : ?>
            <textarea class="theImageURL">
              <?php echo get_field('the_embed'); ?>
            </textarea>
            <img src="<?php echo $theThumb; ?>" width='273' height='202' style="margin-top:8px;" />
          <?php elseif (get_field('the_image')): ?>
            <textarea class="theImageURL" height="<?php echo $theItem[2]; ?>" width="<?php echo $theItem[1]; ?>">
              <img src="<?php echo $theItem[0]; ?>" height="<?php echo $theItem[2]; ?>" width="<?php echo $theItem[1]; ?>" />
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