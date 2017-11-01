<?php
	if(post_password_required()) {
		return;
	}
?>
<div id="comments" class="comments-area">
		<div class="mdc-card mdcwp-card">
			<section class="mdc-card__primary">
				<h1 class="mdc-card__title mdc-card__title--large"><?php printf(esc_html(_nx('One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title')), number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>'); ?></h1>
			</section>
			<section class="mdc-card__supporting-text mdcwp-card--with-avatar">
				<ol class="comments-list">
					<?php wp_list_comments(array('style'=>'ol', 'avatar_size'=>32, 'reverse_top_level'=>true, 'reverse_children'=>true, 'echo'=>true, 'callback'=>'mdcwp_comment')); ?>
				</ol>
				<hr class="mdc-list-divider">
				<?php if(!comments_open() && get_comments_number()): ?>
					<p><?php esc_html_e('Comments are closed.'); ?></p>
				<?php endif;?>
			<?php $fields = array(
				'author'=>'<div class="mdc-textfield" data-mdc-auto-init="MDCTextfield" style="width: 100%;"><input type="text" style="width: 100%;" id="my-textfield" class="mdc-textfield__input" value="' . esc_attr( $commenter['comment_author'] ) . '" required name="author"><label class="mdc-textfield__label" for="my-textfield">Name</label><div class="mdc-textfield__bottom-line"></div></div>',
				'email'=>'<div class="mdc-textfield" data-mdc-auto-init="MDCTextfield" style="width: 100%;"><input type="text" style="width: 100%;" id="my-textfield" class="mdc-textfield__input" value="' . esc_attr( $commenter['comment_author_email'] ) . '" required name="email"><label class="mdc-textfield__label" for="my-textfield">Email</label><div class="mdc-textfield__bottom-line"></div></div>',
				'url'=>'<div class="mdc-textfield" data-mdc-auto-init="MDCTextfield" style="width: 100%;"><input type="text" style="width: 100%;" id="my-textfield" class="mdc-textfield__input" value="' . esc_attr( $commenter['comment_author_url'] ) . '" name="url"><label class="mdc-textfield__label" for="my-textfield">Website</label><div class="mdc-textfield__bottom-line"></div></div>'
			);
			$args = array('class_submit'=>'mdc-button mdc-button--raised', 'label_submit'=>__('Submit'), 'comment_field' =>
				'<div class="mdc-textfield mdc-textfield--textarea mdcwp--comment" data-mdc-auto-init="MDCTextfield"><textarea id="textarea" value="' . esc_attr( $commenter['comment_author'] ) . '" class="mdc-textfield__input" rows="10" cols="10" style="width: 100%;" name="comment"></textarea><label for="textarea" class="mdc-textfield__label" style="background-color: rgba(0,0,0,0);">Comment</label></div>', 'fields'=>apply_filters('comment_form_default_fields', $fields)); 
				comment_form($args); ?>
			</section>
</div>