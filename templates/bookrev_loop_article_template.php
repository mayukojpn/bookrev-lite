            <article class="clearfix">
                <div class="feat-img">
                    <a href="<?php echo get_permalink(get_the_ID()); ?>">
                        <img src="<?php book_rev_lite_get_post_feat_image_url(get_the_ID()); ?>">
                    </a>
                    <div class="comment-count">
                        <i class="fa fa-comments"></i>
                        <a href="<?php echo get_comments_link(get_the_ID()); ?>"><?php comments_number("0", "1", "%"); ?></a>
                    </div><!-- end .comment-count -->
                    <?php $grade = book_rev_lite_get_review_grade($post->ID); ?>
                    <span class="grade <?php echo book_rev_lite_display_review_class($grade); ?>"> <?php if(!empty($grade)) book_rev_lite_display_review_grade($grade); ?> </span>
                </div><!-- end .feat-img -->
                <div class="content">
                    <header>
                        <a href="<?php echo get_permalink(get_the_ID()); ?>" class="title"><?php echo the_title(); ?></a>
                        <div class="meta">
                            <span class="categ"><?php book_rev_lite_get_post_categories($post->ID, 3); ?></span>
                            <span class="date">/ <?php echo get_the_date(); ?></span>
                        </div><!-- end .meta -->
                    </header>
                    <p><?php the_excerpt(); ?></p>
                </div><!-- end .content -->
            </article>