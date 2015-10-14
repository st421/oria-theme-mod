<?php
/**
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Oria
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<h1 class="archive-title">Category: <?php single_cat_title(); ?></h1>
<?php
// Check if there are any posts to display
if ( have_posts() ) : ?>
<header class="archive-header">

<h1 class="archive-title">Category: <?php single_cat_title( '', false ); ?></h1>
<?php
// Display optional category description

 if ( category_description() ) : ?>

<div class="archive-meta"><?php echo category_description(); ?></div>

<?php endif; 

$args = array('child_of' => get_cat_id(single_cat_title());
$categories = get_categories($args);
<?php foreach ( $categories as $category ) { ?>
	<div class="slide">
		<?php if (function_exists('z_taxonomy_image')) : ?>
			<?php if(z_has_taxonomy_image($category->term_id)):  ?>
				<?php z_taxonomy_image($category->term_id, 'oria-carousel'); ?>
					<?php else : ?>
						<?php echo '<img src="' . get_stylesheet_directory_uri() . '/images/placeholder.png"/>'; ?>
					<?php endif; ?>
			<?php else : ?>
				<?php echo '<img src="' . get_stylesheet_directory_uri() . '/images/placeholder.png"/>'; ?>
			<?php endif; ?>
							
			<?php echo '<h3 class="slide-title"><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a></h3>'; ?>
	</div>
<?php } ?>

</header>

<?php
// The Loop

while ( have_posts() ) : the_post(); ?>

<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

<small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>

<div class="entry">
<?php the_content(); ?>
 <p class="postmetadata"><?php
  comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments closed');

?></p>
</div>
<?php endwhile;
else: ?>

<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>
		

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
