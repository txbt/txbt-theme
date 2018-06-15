<?php
/**
 * Template Name: Full Width Sections Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

get_header();
$hero = get_field('hero');
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php //HERO Section
			if( $hero ) {?>
				<section class="jumbotron bg-dark hero container-fluid py-5" style="background-image:url('<?php echo $hero['hero_image'] ?>'); background-position: center; background-size:cover;" role="banner">
					<div class="container">
                        <div class="content py-5 text-white">
                            <?php echo $hero['hero_content']; ?>
                        </div>
                    </div>
				</section>
			<?php } ?>

            <?php if( have_rows( 'carousel_sections' ) ): ?>
                <?php $counter = 0; ?>
                <?php while ( have_rows( 'carousel_sections' ) ): the_row(); ?>
                    <section class="container-fluid content-section py-5">
                        <div class="container">
                            <div class="row">
                                <script>
                                    jQuery( document ).ready(function() {
                                        jQuery('.section-carousel-<?php echo $counter; ?>').owlCarousel({
                                            loop:true,
                                            margin:10,
                                            nav:true,
                                            navContainer: '#sectionNav-<?php echo $counter; ?>',
                                            navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
                                            items: 1,
                                        });

                                    });
                                </script>
                                <?php if( have_rows( 'slider' ) ): ?>
                                    <div class="col-12 owl-theme">
                                        <div id="sectionNav-<?php echo $counter; ?>" class="owl-nav text-right"></div>
                                        <div class="section-carousel section-carousel-<?php echo $counter; ?> owl-carousel">
                                            <?php while ( have_rows( 'slider' ) ): the_row(); ?>
                                                 <div class="item">

                                                    <div class="card">
                                                        <div class="card-body p-0">
                                                            <div class="row">
                                                                <div class="content-copy col-12 col-lg-6 align-self-center">
                                                                    <?php the_sub_field('slider_item_content'); ?>
                                                                </div>
                                                                <div class="content-img col-12 col-lg-6 align-self-center">
                                                                    <img src="<?php the_sub_field('slider_item_image'); ?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                 </div>
                                            <?php endwhile; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php $counter++; ?>
                            </div>
                        </div>
                </section>
                <?php endwhile; ?>
            <?php endif; ?>

            <?php
            // Start Tour page query
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            query_posts( array( 'post_type' => 'tour_review', 'order' => 'desc', 'paged' => $paged, 'posts_per_page' => 3) );

            if ( have_posts() && get_field( 'reviews_carousel_enabled') ) : ?>
                <script>
                    jQuery( document ).ready(function() {

                        jQuery('.review-carousel').owlCarousel({
                            loop:true,
                            margin:10,
                            nav:true,
                            navContainer: '#reviewNav',
                            navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
                            items: 1,
                        });
                    });
                </script>
                <section class="container-fluid py-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 owl-theme">
                                <div id="reviewNav" class="owl-nav text-right"></div>
                                <div class="review-carousel owl-carousel">

                                <?php while ( have_posts() ) : the_post();

                                    global $post;
                                    $reviewID = $post->ID;

                                    // Get Review Info
                                    $tourDate = get_post_meta( $post->ID, '_cmb_review_tour_date', true );
                                    $authorName = get_post_meta( $post->ID, '_cmb_review_author', true );
                                    $reviewSource = get_post_meta( $post->ID, '_cmb_review_from', true );

                                    ?>


                                        <div class="item">
                                            <blockquote class="reviews">
                                                <h1 class="mt-3">
                                                    <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'texas_bike_tours' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
                                                        <?php echo get_the_title( $reviewID); ?>
                                                    </a>
                                                </h1>
                                                <p>
                                                    <?php echo wp_trim_words( get_the_content(), 125, '...' ); ?>
                                                </p>
                                                <p>
                                                    <?php echo $authorName ?>
                                                </p>
                                                <a class="btn btn-secondary btn-sm text-uppercase" style="font-size: 75%; font-weight:300;"href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'texas_bike_tours' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
                                                    Read More
                                                </a>
                                            </blockquote>
                                        </div>

                                    <?php endwhile; // end of the loop. ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <!-- Add the pagination functions here. -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
