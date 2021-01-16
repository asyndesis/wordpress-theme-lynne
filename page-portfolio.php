<?php
/* Template Name: Portfolio */
?>
<?php get_header(); ?>
<div id="scrollContent" class="portfolio">
    <?php include TEMPLATEPATH . "/inc/loop.php"; ?>
    <?php $loop = new WP_Query(
    "post_type=portfolio&orderby=menu_order&order=ASC&posts_per_page=999"
  ); ?>
    <?php while ($loop->have_posts()): $loop->the_post(); ?>
    <?php
      $theFields = get_fields();
      $defaultHeight = 380;
      $defaultWidth = 480;
      $theThumb = get_template_directory_uri() . "/images/reel.jpg";
      $theItem = '';
      $theType = '';
      if (!empty($theFields['the_image'])) {
        $theType = 'image';
        $theThumb = ['','','']; 
        $theItem = ['','',''];
        $wpImage = wp_get_attachment_image_src(
          get_field("the_image"),
          "medium"
        );
        if (!empty($wpImage)){
          $theThumb = $wpImage;
          $theItem = $wpImage;
        }
      }
      if (!empty($theFields['the_video'])) {
        $theType = 'video';
        $theItem = get_field('the_video');
      }
      if (!empty($theFields['the_audio'])) {
        $theType = 'audio';
        $theItem = get_field('the_audio');
        $defaultHeight = 72;
      }
      if (!empty($theFields['the_embed'])) {
        $theType = 'embed';
        $theItem = get_field('the_embed');
      }
      if (!empty($theFields['the_iframe'])) {
        $theType = 'iframe';
        $theItem = get_field('the_iframe');
      }
    ?>

    <div class="post folio" id="post-<?php the_ID(); ?>">
        <div style="display:none;">
            <?php var_dump($theFields); ?>
        </div>
        <div>
            <?php if ($theType == 'video') { ?>
            <textarea class="theImageURL" height="<?php echo $defaultHeight;?>" width="<?php echo $defaultWidth;?>">
          <div style="background:#000 url('<?php bloginfo("template_url"); ?>/images/loadingBlack.gif') center center no-repeat;">
            <video width="100%" height="100%" poster="<?php echo $theThumb; ?>" controls autoplay>
              <source src="<?php echo $theItem[0]; ?>" type="video/mp4">
            </video>
          </div>
       </textarea>
            <?php } else if ($theType === "audio") { ?>
            <textarea class="theImageURL" height="<?php echo $defaultHeight;?>" width="<?php echo $defaultWidth;?>">
          <div style="background:#000 url('<?php bloginfo("template_url"); ?>/images/loadingBlack.gif') center center no-repeat;">
            <audio width="100%" height="100%" controls>
              <source src="<?php echo $theItem; ?>" type="audio/mpeg">
            </audio>
          </div>
        </textarea>
            <?php } else if ($theType === "embed" || $theType === "iframe") { ?>
            <textarea class="theImageURL">
            <?php echo $theItem; ?>
          </textarea>
            <?php } else if ($theType === "image") { ?>
            <textarea class="theImageURL" height="<?php echo $theItem[2]; ?>"
                width="<?php echo $theItem[1]; ?>"><?php echo $theItem[0]; ?></textarea>
            <?php } ?>
        </div>
        <!--/entryInfo-->
        <div class="entry">
            <h3 style="padding-top:8px">
                <?php if (!empty($theType)) { ?>
                <span style="margin-top:-3px" class="<?php echo $theType ?> "></span>
                <?php } ?>
                <?php the_title();?>
            </h3>
            <?php if (get_the_content() !== '') { 
              the_content();
            } else{
              the_excerpt();
            } ?>
        </div>
        <!--/entry-->
    </div>
    <!--/post-->
    <?php
  endwhile; ?>
    <?php wp_reset_postdata(); ?>
</div>
<!--/scrollContent-->
<?php get_footer(); ?>