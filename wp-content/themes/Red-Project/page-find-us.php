<?php get_header(); ?>

<body>

  <div class="find-us"><p><?php echo get_field('find_us');?></p></div>
     
  <div class="map">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2603.683305088019!2d-123.14035698431123!3d49.26344827932921!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x548673c79e1ac457%3A0x3aea6428fa30dc6a!2s1490+W+Broadway%2C+Vancouver%2C+BC+V6H!5e0!3m2!1sen!2sca!4v1503930424109" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
  </div>

		<?php while ( have_posts() ) : the_post(); ?>
			<div class="contact-form">
			
			 <div class="camping"> <p> <?php echo  get_field('secondary_title'); ?> </p> </div>
             <div class="inhab-camping"> <p> <?php echo get_field('contact_page_paragraph'); ?>  </p></div>
              <div class="send-us-email"> <p> <?php echo get_field('send_us_email'); ?></p></div>
		
		<?php the_content(); ?>
			 
			 </div>

		<?php endwhile; ?>

</body>

<?php get_sidebar(); ?>
<?php get_footer(); ?>