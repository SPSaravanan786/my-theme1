<aside>
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?php else : ?>
		<!-- This is displayed if there are no widgets defined in the sidebar. -->
		<p>Please add some widgets to this area.</p>
	<?php endif; ?>
</aside>
