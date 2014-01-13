<?php
/**
 * "Learn More" information blocks for all modules live in this file.
 *
 * jetpack_module_more_info_<module-slug> hooks are for pre-connection information
 * jetpack_module_more_info_connected_<module-slug> hooks are used once the user
 * 		is connected to show them links to admin panels, usage info etc.
 */

// WordPress.com Stats
function stats_more_info() { ?>
	<div class="jp-info-img">
		<a href="http://en.support.wordpress.com/stats/">
			<img class="jp-info-img" src="<?php echo plugins_url( basename( dirname( dirname( __FILE__ ) ) ) . '/_inc/images/screenshots/stats.png' ) ?>" alt="<?php esc_attr_e( 'Jetpack Stats Module', 'so-jetpack-stats-only' ) ?>" width="300" height="150" />
		</a>
	</div>

	<h4><?php esc_html_e( 'Jetpack Stats Module', 'so-jetpack-stats-only' ); ?></h4>
	<p><?php esc_html_e( 'There are many plugins and services that provide statistics, but data can be overwhelming. WordPress.com Stats makes the most popular metrics easy to understand through a clear and attractive interface.', 'so-jetpack-stats-only' ) ?></p>
<?php
}
add_action( 'jetpack_module_more_info_stats', 'stats_more_info' );

function stats_more_info_connected() { ?>
	<div class="jp-info-img">
		<a href="http://en.support.wordpress.com/stats/">
			<img class="jp-info-img" src="<?php echo plugins_url( basename( dirname( dirname( __FILE__ ) ) ) . '/_inc/images/screenshots/stats.png' ) ?>" alt="<?php esc_attr_e( 'Jetpack Stats Module', 'so-jetpack-stats-only' ) ?>" width="300" height="150" />
		</a>
	</div>

	<h4><?php esc_html_e( 'Jetpack Stats Module', 'so-jetpack-stats-only' ); ?></h4>
	<p><?php esc_html_e( 'There are many plugins and services that provide statistics, but data can be overwhelming. WordPress.com Stats makes the most popular metrics easy to understand through a clear and attractive interface.', 'so-jetpack-stats-only' ) ?></p>
	<?php
	// Only show link to stats dashboard when stats has been activated already.
	//if ( ( defined( 'IS_WPCOM' ) ) && function_exists( 'stats_get_csv' ) ) {
	if ( function_exists( 'stats_admin_bar_head' ) ) {
		printf( '<p>' . __( 'You can <a href="%s">view your stats dashboard here</a>.', 'so-jetpack-stats-only' ) . '</p>', admin_url( 'admin.php?page=stats' ) );
	}	
}
add_action( 'jetpack_module_more_info_connected_stats', 'stats_more_info_connected' );

function stats_load_more_link( $description ) {
	echo '<a class="button-secondary more-info-link" href="http://en.support.wordpress.com/stats/">' . esc_html__( 'Learn More', 'so-jetpack-stats-only' ) . '</a>';
}
add_filter( 'jetpack_learn_more_button_stats', 'stats_load_more_link' );
