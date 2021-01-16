<?php /*
Template Name: Links
*/ ?>
<?php get_header(); ?>
<div id="scrollContent" class="home">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    	<h2><?php the_title(); ?></h2>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="entry">
				<?php the_content(); ?>
			</div><!--/entry-->
		</div><!--/post-->
	<?php endwhile; endif; ?>
 </div><!--/scrollContent-->
<?php get_footer(); ?>
