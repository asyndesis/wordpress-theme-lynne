<?php /*
Template Name: Comments
*/ ?>
<?php get_header(); ?>
<div id="scrollContent" class="contact">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    	<h2><?php the_title(); ?></h2>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="entry">
				<?php the_content(); ?>
			</div><!--/entry-->
		</div><!--/post-->
        <div class="post">
<?php comments_template(); ?>
</div>
	<?php endwhile; endif; ?>
 </div><!--/scrollContent-->
<?php get_footer(); ?>
