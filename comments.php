<div id="comments">
	<?php
	if ( isset( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
		die ( '请不要直接加载该页面，谢谢！' );
	}

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e( 'This article requires a password, enter the password to access.' ); ?></p>
		<?php
		return;
	}
	?>

	<?php if ( have_comments() ) : ?>
		<div class="comments-data">
			评论 (<?php echo $post->comment_count;?>)
		</div>
		<div class="comments-container">
			<ol class="commentlist clearfix">
				<?php wp_list_comments( 'type=comment&callback=mutheme_comment' ); ?>
			</ol>
			<div class="comments-data comments-data-footer clearfix">
				<?php if ( 'open' != $post->comment_status ) : ?>
					<h2 class="comments-title">Comments Closed.</h2>
				<?php else : ?>
					<h2 class="comments-title">Leave a reply</h2>
					<div class="comment-topnav"><?php paginate_comments_links( 'prev_text=«&next_text=»' ); ?></div>
				<?php endif; ?>
			</div>
		</div>
	<?php else : ?>
		<?php if ( 'open' != $post->comment_status ) : ?>
			<h2 class="comments-title">Comments Closed.</h2>
		<?php endif; ?>
	<?php endif; ?>
	<?php if ( comments_open() ) : ?>
		<div id="respond" class="respond">
		<form method="post" action="" id="comment_form">
		<div id="cancel-comment-reply"><?php cancel_comment_reply_link() ?></div>
		<?php if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) : ?>
			<p class="title welcome"><?php printf( __( '你需要 <a href="%s">登录</a> 才可以回复.' ), wp_login_url( get_permalink() ) ); ?></p>
		<?php else : ?>
			<?php if ( is_user_logged_in() ) : ?>
				<p class="title welcome"><?php printf( __( '欢迎 <a href="%1$s">%2$s</a> 归来，' ), get_option( 'siteurl' ) . '/wp-admin/profile.php', $user_identity ); ?>
					<a href="<?php echo wp_logout_url( get_permalink() ); ?>"
					   title="<?php _e( 'Log out of this account' ); ?>"><?php _e( '退出 »' ); ?></a></p>
			<?php else : ?>
				<?php if ( $comment_author != "" ): ?>
					<p class="title welcome">
						<?php _e( '欢迎 ' ); ?><?php printf( __( '<strong>%s</strong>.' ), $comment_author ) ?><?php _e( ' 归来, ' ); ?>
						<a id="edit_author"><?php _e( '编辑 »' ); ?></a>
						<span class="cancel-comment-reply"><?php cancel_comment_reply_link() ?></span>
					</p>
					<div id="author_info" class="author_hide">
					<script type="text/javascript">document.getElementById('edit_author').onclick = function () {
							document.getElementById('author_info').style.display = "block"
						};</script>
				<?php else : ?>
					<div id="author_info">
				<?php endif; ?>
				<p>
					<label for="author">
						<small><?php _e( '昵称 *' ); ?></small>
					</label>
					<input type="text" name="author" id="author" class="text" size="15"
					       value="<?php echo $comment_author; ?>"/>
				</p>
				<p>
					<label for="mail">
						<small><?php _e( '邮箱 *' ); ?></small>
					</label>
					<input type="text" name="email" id="mail" class="text" size="15"
					       value="<?php echo $comment_author_email; ?>"/>
				</p>
				<p>
					<label for="url">
						<small><?php _e( '网站' ); ?></small>
					</label>
					<input type="text" name="url" id="url" class="text" size="15"
					       value="<?php echo $comment_author_url; ?>"/>
				</p>
				</div>
			<?php endif; ?>
			<div id="author_textarea">
				<textarea name="comment" id="comment" class="textarea" rows="5" tabindex="4"
				          onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
			</div>
			<p><input id="submit" type="submit" name="submit" value="<?php _e( '确认提交 / Ctrl+Enter' ); ?>"
			          class="submit"/></p>
			<?php comment_id_fields(); ?>
			<?php do_action( 'comment_form', $post->ID ); ?>
			</form>
			</div>
		<?php endif; ?>
	<?php endif; ?>

</div>