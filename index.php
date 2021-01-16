<?php get_header(); ?>
<div id="scrollContent" class="home">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><?php the_title(); ?></h2>
			<?php /* include (TEMPLATEPATH . '/inc/meta.php' ); */ ?>
			<div class="entry">
				<?php the_content(); ?>
			</div><!--/entry-->
		</div><!--/post-->
	<?php endwhile; ?>
	<?php else : ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2>Page not found.</h2>
		</div><!--/post-->
	<?php endif; ?>
 </div><!--/scrollContent-->
<?php get_footer(); ?>
