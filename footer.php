<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h3>About Us</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at sapien et tellus porttitor aliquet. Aenean ultricies tellus elit, vel malesuada velit.</p>
			</div>
			<div class="col-md-4">
				<h3>Latest Posts</h3>
				<ul>
					<?php
						$args = array( 'posts_per_page' => 3 );
						$latest_posts = new WP_Query( $args );

						if ( $latest_posts->have_posts() ) :
							while ( $latest_posts->have_posts() ) :
								$latest_posts->the_post();
								echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
							endwhile;
						endif;

						wp_reset_postdata();
					?>
				</ul>
			</div>
			<div class="col-md-4">
				<h3>Contact Us</h3>
				<p>123 Main St.</p>
				<p>Anytown, USA 12345</p>
				<p>Phone: 555-555-5555</p>
				<p>Email: info@example.com</p>
			</div>
		</div>
	</div>
</footer>
