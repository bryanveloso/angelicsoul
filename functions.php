<?php
function angelicsoul_comment($comment, $args, $depth) { 
$GLOBALS['comment'] = $comment;	
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		<?php comment_text() ?>
		<p class="commentmetadata">
			<?php echo get_avatar( $comment, 32 ); ?>
			<small>
			<cite><?php comment_author_link() ?></cite> <?php _e('said this on', 'angelicsoul'); ?>
			<?php if ($comment->comment_approved == '0') : ?>
			<em><?php _e('Your comment is awaiting moderation.', 'angelicsoul'); ?></em>
			<?php endif; ?>
			<a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date(get_option('date_format')) ?> <?php _e('at', 'angelicsoul');?> <?php comment_time(get_option('time_format')) ?></a><?php echo comment_reply_link(array('depth' => $depth, 'max_depth' => $args['max_depth'], 'before' => ' | ')) ?> <?php edit_comment_link(__('edit', 'angelicsoul'),'(',')'); ?>
			</small>
		</p>
	</li>
<?php }

$themecolors = array(
	'bg' => 'e9ebef',
	'text' => '666666',
	'link' => '27282c',
	'border' => 'c9cbcf'
	);

$content_width = 497;

// Widgets FTW!
function widget_angelicsoul_links() {
	wp_list_bookmarks(array(
		'title_before' => '<h3>', 
		'title_after' => '</h3>', 
	));
}

function widget_angelicsoul_search() {
?>
	<form method="get" id="searchform" action="/index.php">
		<div><input type="text" value="<?php _e('Search', 'angelicsoul'); ?>" onblur="this.value=(this.value=='') ? '<?php _e('Search', 'angelicsoul'); ?>' : this.value;" onfocus="this.value=(this.value=='<?php _e('Search', 'angelicsoul'); ?>') ? '' : this.value;" name="s" id="s" /></div>
	</form>
<?php
}

function angelicsoul_widget_init() {
	register_sidebar(array(
  	'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	register_sidebar_widget(__('Links', 'widgets'), 'widget_angelicsoul_links', null, 'links');
	register_sidebar_widget(__('Search', 'widgets'), 'widget_angelicsoul_search', null, 'search');
}
add_action('widgets_init', 'angelicsoul_widget_init');

// Custom Header FTW!
define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE', '%s/images/headerimage.jpg'); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 760);
define('HEADER_IMAGE_HEIGHT', 151);
define('NO_HEADER_TEXT', true );

function admin_header_style() {
?>

<style type="text/css">
#headimg {
	height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
	width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
}

#headimg h1, #headimg #desc {
	display: none;
}
</style>

<?php }

add_custom_image_header('', 'admin_header_style');

?>