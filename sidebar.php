
<aside id="main-sidebar" class="primary-sidebar widget-area" role="complementary">
<?php if(is_active_sidebar('book_rev_lite_primary_sidebar')): ?>
        <?php dynamic_sidebar('book_rev_lite_primary_sidebar'); ?>
<?php else: ?>

    <?php  the_widget( 'WP_Widget_Search',"title=Search" ); ?>
    <?php  the_widget( 'WP_Widget_Calendar',"title=Calendar" ); ?>
    <?php the_widget( 'WP_Widget_Archives' ,"title=Archives"); ?>
<?php  endif; ?>

</aside><!-- end #main-sidebar -->