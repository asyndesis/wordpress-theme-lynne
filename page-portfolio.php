<?php
/* Template Name: Portfolio */
?>
<?php get_header(); ?>
<div id="scrollContent" class="portfolio">
    <?php include TEMPLATEPATH . "/inc/loop.php"; ?>
    <?php $loop = new WP_Query(
    "post_type=portfolio&orderby=menu_order&order=ASC&posts_per_page=999"
  ); ?>
    <?php while ($loop->have_posts()):
    $loop->the_post(); ?>
    <?php
  $terms = get_the_terms($post->id, "medium");
  if ($terms != null) {
    foreach ($terms as $term) {
      $theSlug = $term->slug;
    }
  } else {
    $theSlug = "";
  }
  jsLog(get_fields());
  ?>
    <div class="post <?php if ($terms != null) {
      echo "folio";
    } ?>" id="post-<?php the_ID(); ?>">
        <div class="entryInfo">
            <?php if ($theSlug === "video") {

              if (get_field("the_video")) {
                $theLarge[0] = get_field("the_video");
              } else {
                $theLarge[0] = "";
              }
              $theLarge[1] = 480;
              $theLarge[2] = 380;
              $theThumb = get_template_directory_uri() . "/images/reel.jpg";
              ?>
            <textarea class="theImageURL">
                    <div style="background:#000 url('<?php bloginfo(
                      "template_url"
                    ); ?>/images/loadingBlack.gif') center center no-repeat;">
          <video width="100%" height="100%" poster="<?php echo $theThumb; ?>" controls autoplay>
            <source src="<?php echo $theLarge[0]; ?>" type="video/mp4">
          </video>
                    </div>
                    </textarea>
            <?php
            } elseif ($theSlug === "audio") {

              if (get_field("the_audio")) {
                $theLarge[0] = get_field("the_audio");
              } else {
                $theLarge[0] = "";
              }
              $theLarge[1] = 480;
              $theLarge[2] = 27;
              ?>
            <textarea class="theImageURL">
                    <div style="background:#000 url('<?php bloginfo(
                      "template_url"
                    ); ?>/images/loadingBlack.gif') center center no-repeat;">
          <audio width="100%" height="100%" controls>
            <source src="<?php echo $theLarge[0]; ?>" type="audio/mpeg">
          </audio>
                    </div>
                    </textarea>
            <?php
            } elseif ($theSlug === "embed") {

              if (get_field("the_embed")) {
                $theLarge[0] = get_field("the_embed");
              } else {
                $theLarge[0] = "";
              }
              $theLarge[1] = 480;
              $theLarge[2] = 380;
              ?>
            <textarea class="theImageURL">
                    <?php echo $theLarge[0]; ?>
                    </textarea>
            <?php
            } elseif ($theSlug === "iframe") {

              if (get_field("the_iframe")) {
                $theLarge[0] = get_field("the_iframe");
              } else {
                $theLarge[0] = "";
              }
              $theLarge[1] = 480;
              $theLarge[2] = 380;
              ?>
            <textarea class="theImageURL">
                    <?php echo $theLarge[0]; ?>
                    </textarea>
            <?php
            } elseif ($theSlug === "print") {
              if (get_field("the_image")) {
                $theLarge = wp_get_attachment_image_src(
                  get_field("the_image"),
                  "medium"
                );
              } else {
                $theLarge[0] = "";
                $theLarge[1] = "";
                $theLarge[2] = "";
              } ?>
            <textarea class="theImageURL" height="<?php echo $theLarge[2]; ?>"
                width="<?php echo $theLarge[1]; ?>"><?php echo $theLarge[0]; ?></textarea>
            <?php
            } ?>
        </div>
        <!--/entryInfo-->
        <div class="entry">
            <h3><?php
              if ($theSlug != "") { ?><span class="<?php echo $theSlug .
  " "; ?>"></span><?php }
              the_title();
              ?></h3>
            <?php the_excerpt(); ?>
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