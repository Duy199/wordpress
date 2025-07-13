<?php get_header(); ?>
<h1><?php the_archive_title(); ?></h1>
<?php while(have_posts()) : the_post(); ?>
  <div>
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
  </div>
<?php endwhile; ?>
<?php get_footer(); ?>
