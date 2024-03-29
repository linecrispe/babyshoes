<?php
/**
 * Template for related trips.
 *
 * @since __next_version__
 */
$section_title = __( 'Related trips you might interested in', 'travelscape' );
$related_trips = new \WP_Query();
extract( $args );
?>
<div class="wte-related-trips-wrapper1 container">
	<div class="row">
		<h2 class="wte-related-trips__heading"><?php echo esc_html( $section_title ); ?></h2>
	</div>
	<div class="row">
	<div class="wte-related-trips category-grid wte-d-flex wte-col-3 wpte-trip-list-wrapper">
		<?php
		while ( $related_trips->have_posts() ) {
			$related_trips->the_post();
			$user_wishlists            = wptravelengine_user_wishlists();
			$details                   = wte_get_trip_details( get_the_ID() );
			$related_query             = array(
				'related_query' => true,
			);
			$details                   = array_merge( $details, $related_query );
			$details['user_wishlists'] = $user_wishlists;
			wte_get_template( 'content-related-trip.php', $details );
		}
		wp_reset_postdata();
		?>
	</div>
	</div>
</div>
