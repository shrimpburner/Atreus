<?php if (post_password_required()) { return; } ?>

<div id="comments" class="comments">
    <?php if ( have_comments() ) : ?>
		<p>
            <?php printf(_nx('One comment on "%2$s"', '%1$s comments on "%2$s"', get_comments_number(), 'comments title', 'atreus'), number_format_i18n(get_comments_number()), get_the_title() ); ?>
		</p>
        
        <?php wp_list_comments( array(
            'callback' => 'better_comments'
        ) ); ?>
	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments">
            <?php _e('Comments are closed.', 'atreus'); ?>
		</p>
    <?php endif; ?>
    
    <p class="alignleft"><?php next_comments_link( 'Newer comments' ); ?></p>
    <p class="alignright"><?php previous_comments_link( 'Older comments' ); ?></p>
    <br>
    <hr />
    <?php 
    $args = array(
        'fields' => apply_filters('comment_form_default_fields', array(
            'author' => '<div class="field"><label class="label">Name *</label><div class="control"><input class="input" id="author" name="author" type="text" placeholder="Text input" value="' . esc_attr($commenter['comment_author']) . '"' . $aria_req . ' /></div></div>',
            'email' => '<div class="field"> <label class="label">Email *</label> <div class="control"><input id="email" name="email" class="input" type="email" placeholder="e.g. alexsmith@gmail.com" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' /></div></div>'
        )),
        'comment_field' => '<div class="field"><label class="label">Comment *</label><div class="control"><textarea id="comment" name="comment" class="textarea" placeholder="e.g. I think this post is great!" aria-required="true"></textarea></div></div>',
        'class_submit' => 'button is-link'
        );

    comment_form($args); ?>
</div>