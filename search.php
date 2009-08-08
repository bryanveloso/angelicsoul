<?php get_header(); ?>
	
	<div id="content" class="widecolumn">
	
	<?php if (have_posts()) : ?>
		
		<h2 class="title"><?php _e('Search Results', 'chaoticsoul'); ?></h2>
		
		<?php while (have_posts()) : the_post(); ?>
		
			<div <?php post_class(); ?>>
				<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'chaoticsoul'), get_the_title()); ?>"><?php the_title(); ?></a></h2>
				&bull; <?php the_time(get_option('date_format')) ?>
				<p class="postmetadata">Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>	 <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
			</div>
		
		<?php endwhile; ?>
		
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link(__('&laquo; Previous Entries', 'chaoticsoul')) ?></div>
			<div class="alignright"><?php previous_posts_link(__('Next Entries &raquo;', 'chaoticsoul')) ?></div>
		</div>
		
	<?php else : ?>
		
		<h2 class="center"><?php _e('No posts found. Try a different search?', 'chaoticsoul'); ?></h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		
	<?php endif; ?>
	
	</div>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>