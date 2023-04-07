<?php get_header(); ?>

<main>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<article>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p class="post-meta">Posted on <?php the_date(); ?> by <?php the_author(); ?></p>
						<?php the_post_thumbnail(); ?>
						<?php the_content(); ?>
					</article>
				<?php endwhile; endif; ?>
			</div>
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>
