<?php
if(!function_exists('bookrev_comments')) {
	function bookrev_comments($comment, $args, $depth) {
			$GLOBALS['comment'] = $comment;
			if(get_comment_type() == 'pingback' || get_comment_type() == 'trackback') : ?>

			<li class="pingback" id="comment-<?php comment_ID(); ?>">
				<div <?php comment_class('comment-body'); ?>>
					<cite><?php echo "Pingback:"; ?></cite>
					<p class="pb-body"><?php comment_author_link(); ?></p><!-- end .pb-body -->
				</div><!-- end .comment-body -->
			</li><!-- end .pingback -->

			<?php elseif (get_comment_type() == "comment") : ?>

			<li id="comment-<?php comment_ID(); ?>" class="comment clearfix">
                <div <?php comment_class('comment-inner-wrapper clearfix'); ?>>
                    <div class="author-avatar">
                    	<?php echo get_avatar($comment->user_id, 65, "http://www.gravatar.com/avatar");?>
                    </div><!-- end .author-avatar -->

					<div class="comment-reply">
						<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
					</div><!-- end .comment-reply -->

					<div class="comment-details">
						<div class="comment-head clearfix vcard">
							<span class="author-name"><?php comment_author_link(); ?></span>
							<span class="comment-date"><?php comment_date(); _e(" at ", "book_rev_lite"); comment_time(); ?></span>
						</div><!-- end .comment-head -->
						<div class="comment-body">
							<?php if($comment->comment_approved == 0): ?>
								<p class="under-moderation"><?php _e("Your comment is awaiting moderation.", "book_rev_lite"); ?></p>
							<?php endif; ?>
							<p><?php comment_text(); ?></p>
						</div><!-- end .comment-body -->

					</div><!-- end .comment-details -->
				</div><!-- end .comment-inner-wrapper -->
			</li>

			<?php endif;
		}
	}
?>