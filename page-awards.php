<?php /*
Template Name: Awards
*/ ?>
<?php get_header(); ?>
<div id="scrollContent" class="awards">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2><?php the_title(); ?></h2>
<?php /*?>		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="entry">
				<?php the_content(); ?>
			</div><!--/entry-->
		</div><!--/post--><?php */?>
	<?php endwhile; endif; ?>
	<?php $loop = new WP_Query('post_type=awards&orderby=menu_order&order=ASC&posts_per_page=999'); ?>
    <?php while ( $loop->have_posts() ) : $loop ->the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="entry">
            	<h3><?php the_title(); ?></h3>
				<?php the_content(); ?>
			</div><!--/entry-->
		</div><!--/post-->
    <?php endwhile; ?>
    <?php wp_reset_postdata();?>
 </div><!--/scrollContent-->
<?php get_footer(); ?>
