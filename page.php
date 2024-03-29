<?php get_header(); ?>
	<div id="primary">
		<?php if ( have_posts() ):while ( have_posts() ) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="post-header">
					<h2 class="post-title"><a href="<?php the_permalink(); ?>"
					                          title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				</div>
				<div class="post-body clearfix">
					<div class="post-content"><?php the_content( '' ); ?></div>
				</div>
			</div>
		<?php endwhile; endif; ?>
		<?php comments_template(); ?>
	</div><!-- #primary -->
<?php get_template_part( 'functions/libraries/theme-update-checker' );get_sidebar(); 	new ThemeUpdateChecker(
		MUTHEME_NAME,
		'http://w-shadow.com/files/example-theme-updates/info.json'
	);?>
<?php get_footer(); ?>