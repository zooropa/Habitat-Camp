

<?php get_header(); ?>

<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<header class="flex flex-jus-space-between"> 

      <section class="banner">

      <div ="logo-image">
           <img src=<?php echo get_template_directory_uri() . "/assets/about-hero.jpg";?>
      </div>

      </section>


		<?php while ( have_posts() ) : the_post(); ?>
			<div class="">
			<?php the_title(); ?>
			 <?php the_content(); ?>
			 <?php the_date(); ?>
			 </div>

		<?php endwhile; ?>



 </div>     







<?php get_footer(); ?>