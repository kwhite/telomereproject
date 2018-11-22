<?php
/**
 * @package 	WordPress
 * @subpackage 	EcoNature
 * @version		1.3.0
 * 
 * Comments Template
 * Created by CMSMasters
 * 
 */


if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
    die(__('Please do not load this page directly. Thanks!', 'econature'));
}


if (post_password_required()) { 
	echo '<p class="nocomments">' . __('This post is password protected. Enter the password to view comments.', 'econature') . '</p>';
	
	
    return;
}


if (comments_open()) {
	if (have_comments()) {
		echo '<aside id="comments" class="post_comments">' . "\n" . 
			'<h1>';
		
		comments_number(__('No Comments', 'econature'), __('Comment', 'econature') . ' (1)', __('Comments', 'econature') . ' (%)');
		
		echo '</h1>' . "\n";
		
		
		if (get_previous_comments_link() || get_next_comments_link()) {
			echo '<aside class="project_navi" role="navigation">' . "\n\t" . 
				'<span class="fl">' . "\n\t\t";
			
			previous_comments_link('&larr; ' . __('Older Comments', 'econature'));
			
			echo "\n\t" . '</span>' . "\n\t" . 
			'<span class="fr">' . "\n\t\t";
			
			next_comments_link(__('Newer Comments', 'econature') . ' &rarr;');
			
			echo "\n\t" . '</span>' . "\r" . 
			'</aside>' . "\n";
		}
		
		
		echo '<ol class="commentlist">' . "\n";
		
		
		wp_list_comments(array( 
			'type' => 'comment', 
			'callback' => 'mytheme_comment' 
		));
		
		
		echo '</ol>' . "\n";
		
		
		if (get_previous_comments_link() || get_next_comments_link()) {
			echo '<aside class="project_navi" role="navigation">' . "\n\t" . 
				'<span class="fl">' . "\n\t\t";
			
			previous_comments_link('&larr; ' . __('Older Comments', 'econature'));
			
			echo "\n\t" . '</span>' . "\n\t" . 
			'<span class="fr">' . "\n\t\t";
			
			next_comments_link(__('Newer Comments', 'econature') . ' &rarr;');
			
			echo "\n\t" . '</span>' . "\r" . 
			'</aside>' . "\n";
		}
		
		
		echo '</aside>';
	}
	
	
	$form_fields =  array( 
		'author' => '<p class="comment-form-author">' . "\n" . 
			'<input type="text" id="author" name="author" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . ((isset($aria_req)) ? $aria_req : '') . ' placeholder="' . __('Name', 'econature') . (($req) ? ' (' . __('Required', 'econature') . ')' : '') . '" />' . "\n" . 
		'</p>' . "\n", 
		'email' => '<p class="comment-form-email">' . "\n" . 
			'<input type="text" id="email" name="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . ((isset($aria_req)) ? $aria_req : '') . ' placeholder="' . __('Email', 'econature') . (($req) ? ' (' . __('Required', 'econature') . ')' : '') . '" />' . "\n" . 
		'</p>' . "\n", 
		'url' => '<p class="comment-form-url">' . "\n" . 
			'<input type="text" id="url" name="url" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" placeholder="' . __('Website', 'econature') . '" />' . "\n" . 
		'</p>' . "\n" 
	);
	
	
	echo "\n\n";
	
	
	comment_form(array( 
		'fields' => 			apply_filters('comment_form_default_fields', $form_fields), 
		'comment_field' => 		'<p class="comment-form-comment">' . 
									'<textarea name="comment" id="comment" cols="60" rows="10"></textarea>' . 
								'</p>', 
		'must_log_in' => 		'<p class="must-log-in">' . 
									__('You must be', 'econature') . 
									' <a href="' . wp_login_url(apply_filters('the_permalink', get_permalink())) . '">' 
										. __('logged in', 'econature') . 
									'</a> ' 
									. __('to post a comment', 'econature') . 
								'.</p>' . "\n", 
		'logged_in_as' => 		'<p class="logged-in-as">' . 
									__('Logged in as', 'econature') . 
									' <a href="' . admin_url('profile.php') . '">' . 
										$user_identity . 
									'</a>. ' . 
									'<a class="all" href="' . wp_logout_url(apply_filters('the_permalink', get_permalink())) . '" title="' . __('Log out of this account', 'econature') . '">' . 
										__('Log out?', 'econature') . 
									'</a>' . 
								'</p>' . "\n", 
		'comment_notes_before' => 	'<p class="comment-notes">' . 
										__('Your email address will not be published.', 'econature') . 
									'</p>' . "\n", 
		'comment_notes_after' => 	'', 
		'id_form' => 				'commentform', 
		'id_submit' => 				'submit', 
		'title_reply' => 			__('Leave a Reply', 'econature'), 
		'title_reply_to' => 		__('Leave your comment to', 'econature'), 
		'cancel_reply_link' => 		__('Cancel Reply', 'econature'), 
		'label_submit' => 			__('Submit Comment', 'econature') 
	));
}

