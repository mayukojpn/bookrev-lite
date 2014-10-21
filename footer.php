<footer id="main-footer" class="">

    <div class="upper-footer clearfix">
        <div class="container">
<?php if(is_active_sidebar('book_rev_lite_footer_sidebar')): ?>
            <?php dynamic_sidebar('book_rev_lite_footer_sidebar'); ?>
<!-- end .upper-footer -->
<?php else: ?>
<?php the_widget("WP_Widget_Recent_Comments","title=Recent comments"); ?>
<?php the_widget("WP_Widget_Recent_Posts","title=Recent reviews"); ?>
<?php endif; ?>
        </div><!-- end .container -->
    </div>
    <div class="lower-footer clearfix">
        <div class="container">
            <div class="footer-logo">
                <a href="<?php echo home_url(); ?>">
                    <?php
                        $display_footer_logo = get_theme_mod("mp_display_footer_logo_image",true);
                        if($display_footer_logo)
                        {
                            $footer_logo = get_theme_mod("footer-logo-upload");
                            if($footer_logo != "")
                            {
                                echo "<img src='" . $footer_logo . "'/>";
                            } else {
                                echo "<img src='" .  get_template_directory_uri() . "/img/footerlogo.png'/>";
                            }
                        }
                    ?>
                </a>
            </div><!-- end .footer-logo -->

            <div class="copyright-info">
                <p><?php echo get_theme_mod( 'copyright_textbox', 'Bookrev Lite powered by WordPress' ); ?></p>
            </div><!-- end .copyright-info -->
        </div><!-- end .container -->
    </div><!-- end .lower-footer -->



</footer><!-- end .main-footer -->
<?php
    // Gets and includes the custom body code.
    //echo book_rev_lite("book_rev_lite_custom_body_code");
    wp_footer();
?>
</body>
</html>