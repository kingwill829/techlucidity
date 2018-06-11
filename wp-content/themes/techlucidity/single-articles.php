<?php get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<div class="container">
		<main class="col-md-8">
			<div class="content-body content-article">
				<h1><?php the_title(); ?></h1>
				<h2><?php the_field('sub_heading'); ?></h2>
				<p class="content-body__published"><?php echo get_the_date(); ?></p>
				<?php 
					$article_intro = get_field('article_intro');
					if ($article_intro) {
						echo "<p class='content-article__intro'>" . $article_intro . '</p>';
					}
					// Table of contents
					createContentsTable(); 
					// Content body
					createContentBody();
				?>
			</div>
		</main>

<?php get_sidebar(); ?>

	</div>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>