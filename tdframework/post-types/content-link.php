<?php
/**
 * The template for displaying posts in the Link post format.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if ( !is_single() ) : ?>
	<div class="grid col-twelve">

	<?php if ( core_options_get('meta') ) : ?>
	<div class="grid col-one">
		<div class="item-date ">
			<div class="item-day">
				<?php the_time('j'); ?>
			</div>
			<div class="item-month">
				<?php echo strtoupper(substr(get_the_time('F'), 0 ,3)); ?>
			</div>
			<?php /*?><div class="item-year">
				<?php the_time('Y'); ?>
			</div><?php */?>
		</div>
	</div>
	<?php endif; ?>

	<?php $column = core_options_get('meta') ? 'col-eleven' : 'col-twelve'; ?>
	<div class="item-content grid-right <?php echo $column; ?> fit">
	<?php endif; ?>

	<header class="entry-header">
		<?php if (core_options_get('titles') == true) : ?>
		<h1 class="entry-title">
			<?php if (is_single()) : ?> 
				<i class="icon-link pull-right"> </i>  <?php the_title(); ?> 
			<?php else : ?>
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', THEME_SLUG ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"> <?php the_title(); ?></a>
			<?php /*<a href="<?php echo esc_url( core_theme_get_link_url() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> */ ?>
			<?php endif; ?>
		</h1>
		<?php endif; ?>

		<?php if ( is_single() ) core_theme_breadcrumb(); ?>
		<?php //core_theme_hook_entry_header(); ?>
		<?php if ( !is_single() ) : ?>
		<div class="entry-meta-list">
			<?php core_theme_posted_in(); ?>
			<?php edit_post_link( __( 'Edit', THEME_SLUG ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
		</div>
		<?php endif; ?>

		<?php if ( is_single() && (core_options_get('titles') || core_options_get('breadcrumbs')) ) : ?>
		<div class="title-row"></div>
		<?php endif; ?>

	</header><!-- .entry-header -->

	<?php do_action('core_theme_hook_before_entry_content'); ?>

	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', THEME_SLUG ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', THEME_SLUG ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->

	<?php if ( is_single() ) : ?>
	<footer class="entry-meta">
		<?php core_theme_posted_in(); ?>
		<?php edit_post_link( __( 'Edit', THEME_SLUG ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
	<?php endif; // is_single() ?>

	<?php do_action('core_theme_hook_after_entry_content'); ?>

	<?php if ( !is_single() ) : ?>
		</div>
	</div>
	<div class="clear"></div>
	<?php endif; ?>

</article><!-- #post -->
