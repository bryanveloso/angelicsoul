<?php get_header(); ?>
	
	<div id="content" class="widecolumn">
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<h2 class="title"><a href="<?php echo get_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'chaoticsoul'), get_the_title()); ?>"><?php the_title(); ?></a></h2>
			
			<div class="entrytext">
				<?php the_content('<p class="serif">'.__('Read the rest of this entry &raquo;', 'chaoticsoul').'</p>'); ?>
				<?php link_pages('<p><strong>'.__('Pages:', 'chaoticsoul').'</strong> ', '</p>', 'number'); ?>
				<p class="authormeta">~ by <?php the_author(); ?> on <? the_date(); ?>.</p>
				<?php if (the_category(', ')): ?><p class="postmetadata"><?php printf(__('Posted in %s', 'chaoticsoul'), get_the_category_list(', ')); ?> | <?php edit_post_link(__('Edit this entry.', 'chaoticsoul'), '', ' | '); ?></p><?php endif; ?>
				<?php if (get_the_tags()): ?><p class="postmetadata"><?php the_tags('<br />' .  __( 'Tags' ) . ': ', ', ', '');  ?></p><?php endif; ?>
			</div>
		</div>
		
	<?php comments_template(); ?>
	
	<?php endwhile; else: ?>
	
		<p><?php _e('Sorry, no posts matched your criteria.', 'chaoticsoul'); ?></p>
	
	<?php endif; ?>
	
	</div>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>
