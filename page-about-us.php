<?php
/**
 * The About Us page template file
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portfolio_Victoria
 */

get_header();
?>

<body>
  <div class="container">
    <div class="nav-wrapper">
      <div class="left-side">
        <div class="nav-link-wrapper">
          <a href="/index.php">Home</a>
        </div>

        <div class="nav-link-wrapper active-nav-link">
          <a href="about-us">About</a>
        </div>
      </div>

      <div class="right-side">
        <div class="brand">
          <?php echo get_bloginfo( 'description', 'display' );?>
        </div>
      </div>
    </div>

    <div class="content-wrapper">
      <div class="two-column-wrapper">
        <div class="profile-image-wrapper">
          <?php portfolio_victoria_post_thumbnail(); ?>
        </div>

        <div class="profile-content-wrapper">
        <?php
	    	if ( have_posts() ) :
				?>
					<h1><?php single_post_title(); ?></h1>
				<?php

			  /* Start the Loop */
			  while ( have_posts() ) :
			  	the_post();

			  	the_content();

			  endwhile;

		  	the_posts_navigation();

		    else :

			  get_template_part( 'template-parts/content', 'none' );

		    endif;
		    ?>
        </div>
      </div>
    </div>
  </div>

  <?php

get_footer();