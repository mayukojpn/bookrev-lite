        <section id="highlight-day" class="newsblock clearfix">
            <header>
                <h2><?php book_rev_lite_string_template_category_replace('mp_hotd_title', 'mp_hotd_cat', 'category_selected'); ?></h2>
            </header>
            <?php
            $sticky = get_option( 'sticky_posts' );
            $query = new WP_Query(array('cat' => get_theme_mod('mp_hotd_cat'),'posts_per_page' => 1,'post__in' => $sticky));
            if(isset($sticky[0])):
                if($query->have_posts()) :
                    while($query->have_posts()):
                        $query->the_post(); ?>

            <div class="highlight-inner">
                <div class="featured-image">
                    <img src="<?php book_rev_lite_get_post_feat_image_url(get_the_ID()); ?>">
                    <span class="comments">
                        <i class="fa fa-comments"></i>
                        <?php comments_number("0", "1", "%"); ?>
                    </span><!-- end .comments -->
                </div><!-- end .featured-image -->

                <div class="article-details">
                    <h2 class="title"><a href="<?php echo get_permalink(get_the_ID()); ?>"><?php the_title(); ?></a></h2>
                    <div class="meta">
                        <span class="categ"><?php book_rev_lite_get_post_categories(get_the_ID(), 1); ?></span>
                        <span class="date"><?php echo the_date(); ?></span>
                    </div><!-- end .meta -->
                </div><!-- end .article-details -->

                <p><?php book_rev_lite_get_limited_content(get_the_id(), 450, '...'); ?></p>
            </div><!-- end .highlight-inner -->

            <?php endwhile;endif;endif; ?>



        </section><!-- end #highlight-day -->