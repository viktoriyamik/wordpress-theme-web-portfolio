<?php
/**
 * The front page template file
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
        <div class="nav-link-wrapper active-nav-link">
          <a href="index.php">Home</a>
        </div>

        <div class="nav-link-wrapper">
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
      <div class="portfolio-items-wrapper">

        <?php 
          $args = array(
            'post_type' => 'post',
            'category_name' => 'Gallery',
            'order'   => 'ASC'
          );  
          $the_query = new WP_Query( $args );
  
          if ( $the_query->have_posts() ) :
          // the loop 
          while ( $the_query->have_posts() ) : $the_query->the_post();  ?>
          
             
          <div class="portfolio-item-wrapper">
            <div class="portfolio-img-background" 
            style="background-image:url(       
              <?php 
              /* grab the url for the full size featured image */
              $featured_img_url = get_the_post_thumbnail_url(); 
              echo $featured_img_url; ?> )">

            </div>
            
             <div class="img-text-wrapper"> 
              <!--
              <div class="logo-wrapper">
                <img src="images/logos/quip.png" alt="">
              </div>
            -->
              <div class="subtitle">

              
              <?php
              /* link thumbnail to full size image for use with lightbox*/
              echo '<a href="'.esc_url(get_permalink()).'" rel="lightbox">'; 
              the_title();
              echo '</a>';
              ?>
              
              </div>
            </div> 
          </div>
  
  
          <?php endwhile; ?>
            <!-- end of the loop -->
            <?php wp_reset_postdata(); ?>
  
          <?php else : ?>
            <p><?php _e( 'Sorry, no data matched your criteria.' ); ?></p>
          <?php endif; ?>

        

      </div>
    </div>
  </div>

<!-- </body> -->

<script>
  const portfolioItems = document.querySelectorAll('.portfolio-item-wrapper');

  portfolioItems.forEach(portfolioItem => {
    portfolioItem.addEventListener('mouseover', () => {
      console.log(portfolioItem.childNodes[1].classList)
      portfolioItem.childNodes[1].classList.add('image-blur');
    });

    portfolioItem.addEventListener('mouseout', () => {
      console.log(portfolioItem.childNodes[1].classList)
      portfolioItem.childNodes[1].classList.remove('image-blur');
    });
  });

</script>

<!-- </html> -->

<?php

get_footer();