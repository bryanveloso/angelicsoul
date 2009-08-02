<?php get_header(); ?>
    
    <div id="content" class="widecolumn">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="post" id="post-<?php the_ID(); ?>">
        <h2 class="title"><?php the_title(); ?></h2>
            <div class="entrytext">
                <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
                <?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
            </div>
        </div>
    <?php endwhile; endif; ?>
    <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
    
    <?php if ( comments_open() ) comments_template(); ?>
    </div>
    
<?php get_sidebar(); ?>

<?php get_footer(); ?>