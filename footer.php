<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */


?>

<footer class="container-fluid bg-dark text-white py-3 text-center">
    <div class="container">
        <div class="row mb-2">

            <!-- ******************* Site Info Col ******************* -->
            <div class="col-12 col-lg-4 pb-2 mb-3">
                <h4 class="mb-2" style="font-size:1.15rem">
                    <a  rel="home"
                        href="<?php echo esc_url( home_url( '/' ) ); ?>"
                        title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
                    >
                        <?php bloginfo( 'name' ); ?>
                    </a>
                </h4>

                <p class="mb-2"> Made in Austin, TX </p>

                <?php if( get_field('settings_footer_callout', 'option') ) {?>
                    <img class="footer-callout" style="max-height: 90px;" src=" <?php the_field('settings_footer_callout', 'option'); ?>" />
                <?php } ?>


            </div>

            <!-- ******************* Contact Info Col ******************* -->
            <div class="col-12 col-lg-4 pb-2">

                <ul class="footer-contact list-unstyled text-lg-left" style="display:inline-block">

                    <?php //Check for Email Address
                    if( get_field('settings_email', 'option') ) {?>
                        <li class="contact pb-2">
                            <i class="fa fa-envelope pr-2"></i>
                            <a href="mailto:<?php the_field('settings_email', 'option'); ?>">
                                Email Us
                            </a>
                        </li>
                    <?php }
                    ?>

                    <?php //Check for Phone No.
                    if( get_field('settings_phone1', 'option') ) {?>
                        <li class="contact pb-2">
                            <i class="fa fa-phone pr-2"></i>
                            <a href="tel:<?php the_field('settings_phone1', 'option'); ?>">
                                <?php the_field('settings_phone1', 'option'); ?>
                            </a>
                        </li>
                    <?php }
                    ?>

                    <?php //Check for Alt Phone No.
                    if( get_field('settings_phone2', 'option') ) {?>
                        <li class="contact pb-2">
                            <i class="fa fa-phone pr-2"></i>
                            <a href="tel:<?php the_field('settings_phone2', 'option'); ?>">
                                <?php the_field('settings_phone2', 'option'); ?>
                            </a>
                        </li>
                    <?php }
                    ?>

                </ul>

            </div><!--col end -->

            <!-- ******************* Blog Info Col ******************* -->
            <div class="col-12 col-lg-4 pb-2">

                    <ul class="social-icons list-inline" style="font-size:1.25rem">

                        <?php //Check for Twitter URL
                        if( get_field('settings_twitter', 'option') ) {?>
                            <li class="social list-inline-item">
                                <a href="<?php the_field('settings_twitter', 'option'); ?>">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                        <?php }
                        ?>

                        <?php //Check for Yelp URL
                        if( get_field('settings_yelp', 'option') ) {?>
                            <li class="social list-inline-item">
                                <a href="<?php the_field('settings_yelp', 'option'); ?>">
                                    <i class="fa fa-yelp"></i>
                                </a>
                            </li>
                        <?php }
                        ?>

                        <?php //Check for Facebook URL
                        if( get_field('settings_facebook', 'option') ) {?>
                            <li class="social list-inline-item">
                                <a href="<?php the_field('settings_facebook', 'option'); ?>">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                        <?php }
                        ?>

                        <?php //Check for Pinterest URL
                        if( get_field('settings_pinterest', 'option') ) {?>
                            <li class="social list-inline-item">
                                <a href="<?php the_field('settings_pinterest', 'option'); ?>">
                                    <i class="fa fa-pinterest"></i>
                                </a>
                            </li>
                        <?php }
                        ?>

                        <?php //Check for Pinterest URL
                        if( get_field('settings_linkedin', 'option') ) {?>
                            <li class="social list-inline-item">
                                <a href="<?php the_field('settings_linkedin', 'option'); ?>">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            </li>
                        <?php }
                        ?>

                        <?php //Check for Pinterest URL
                        if( get_field('settings_google', 'option') ) {?>
                            <li class="social list-inline-item">
                                <a href="<?php the_field('settings_google', 'option'); ?>">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                        <?php }
                        ?>

                        <?php //Check for Pinterest URL
                        if( get_field('settings_trip_advisor', 'option') ) {?>
                            <li class="social list-inline-item">
                                <a href="<?php the_field('settings_trip_advisor', 'option'); ?>">
                                    <i class="fa fa-tripadvisor"></i>
                                </a>
                            </li>
                        <?php }
                        ?>


                    </ul>

                </div><!--col end -->

            </div><!-- row end -->


            <?php
            //Footer Nav Menu
            wp_nav_menu(
                array(
                    'theme_location'  => 'footer',
                    'container_class' => 'row',
                    'container_id'    => '',
                    'menu_class'      => 'footer-nav col-12 text-center list-inline',
                    'fallback_cb'     => '',
                    'menu_id'         => '',
                    'walker'          => new Nav_Footer_Walker(),
                )
            );
            ?>

            <?php //Check for Copyright Text
            if( get_field('settings_copyright', 'option') ) {?>
                <div class="row">
                    <div class="col-12 copyright small text-center">
                        <?php the_field('settings_copyright', 'option'); ?>
                    </div>
                </div>
            <?php }
            ?>

        </div>


</footer><!-- wrapper end -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>

