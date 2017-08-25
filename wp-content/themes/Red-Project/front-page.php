<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<header class="flex flex-jus-space-between"> 

      <section class="banner">

      <div ="logo-image">
           <img src=<?php echo get_template_directory_uri() . "/assets/logos/inhabitent-logo-full.svg";?>>
      </div>
      <div ="tent-image">
           <img src=<?php echo get_template_directory_uri() . "/assets/logos/inhabitent-logo-tent.svg";?>>
      </div>
      <div ="background-image">
           <img src=<?php echo get_template_directory_uri() . "/assets/home-hero.jpg";?>>
      </div>

      </section> 

      <?php
 
$args = array(
    'post_type' => 'adventures'
);

  $journal = new WP_Query(array(
        "post_type" => "post",
        "posts_per_page" => 3,
    ));
 

$query = new WP_Query( $args );
 

if ( $query->have_posts() ) {
 
    
    while ( $query->have_posts() ) {
 
        $query->the_post();
 
        ?>
 
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'left' ); ?>>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            </a>
            <?php the_post_thumbnail("large"); ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_title(); ?>
            </a>
            <?php the_excerpt(); ?>
        </article>
 
        <?php
 
   }
   }   ?>

    
    <div class="fp-journal-posts-container row">
        <?php
            while($journal->have_posts()):$journal->the_post();
                get_template_part("template-parts/content",get_post_type());
            endwhile; 
        ?>
    </div>
 
}?>

 
<?php wp_reset_postdata(); ?>

</header>

  
  	  </main>

   <?php 

        $Terms =  get_terms(array(
        "taxonomy" => "taxonomy",
        'hide-empty'=> false,
    ));
   // echo "<pre>";print_r($populateTaxonomies); echo "</pre>";//

    ?>
    
    


    // Loop for retrieving the Product->Terms 


    <div class="taxonomy-container">

        <?php
            foreach($Terms as $term){ ?>

                <div class="home-taxonomy">


                        <div class="taxonomy-img">
                            <img src="<?php echo get_template_directory_uri().'. "/assets/product-type-icons/'.$term->slug.'.svg'; ?>" />
                        </div>              
                

                        <div class="taxonomy-desc">
                            <?php echo $term->description; ?>                           
                        </div>

                        <a href='<?php echo get_term_link($term, "taxonomy"); ?>'>
                            <button class="taxonomy-btn"><?php echo $term->name." STUFF"; ?></button>
                        </a>

                </div>

            <?php } ?>
    </div>

    ?>

    <div class="contact-low">
    <img src=<?php echo get_template_directory_uri() . "/asets/dark-wood@2x.png";?>>
    </div>


    
    


<?php get_footer(); ?>

