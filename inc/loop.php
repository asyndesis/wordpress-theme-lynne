<?php if (have_posts()): ?>
<?php while (have_posts()): ?>
<?php the_post(); ?>
<h2><?php the_title(); ?></h2>
<?php endwhile; ?>
<?php endif; ?>