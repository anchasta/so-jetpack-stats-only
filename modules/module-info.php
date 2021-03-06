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
			<img class="jp-info-img" src="<?php echo plugins_url( basename( dirname( dirname( __FILE__ ) ) ) . '/_inc/images/screenshots/stats.png' ) ?>" alt="<?php esc_attr_e( 'WordPress.com Stats', 'jetpack' ) ?>" width="300" height="150" />
		</a>
	</div>

	<h4><?php esc_html_e( 'WordPress.com Stats' , 'jetpack' ); ?></h4>
	<p><?php esc_html_e( 'There are many plugins and services that provide statistics, but data can be overwhelming. WordPress.com Stats makes the most popular metrics easy to understand through a clear and attractive interface.', 'jetpack' ) ?></p>
<?php
}
add_action( 'jetpack_module_more_info_stats', 'stats_more_info' );

function stats_more_info_connected() { ?>
	<div class="jp-info-img">
		<a href="http://en.support.wordpress.com/stats/">
			<img class="jp-info-img" src="<?php echo plugins_url( basename( dirname( dirname( __FILE__ ) ) ) . '/_inc/images/screenshots/stats.png' ) ?>" alt="<?php esc_attr_e( 'WordPress.com Stats', 'jetpack' ) ?>" width="300" height="150" />
		</a>
	</div>

	<h4><?php esc_html_e( 'WordPress.com Stats' , 'jetpack' ); ?></h4>
	<p><?php esc_html_e( 'There are many plugins and services that provide statistics, but data can be overwhelming. WordPress.com Stats makes the most popular metrics easy to understand through a clear and attractive interface.', 'jetpack' ) ?></p>
	<p><?php printf( __( 'You can <a href="%s">view your stats dashboard here</a>.', 'jetpack' ), admin_url( 'admin.php?page=stats' ) ); ?></p>
<?php
}
add_action( 'jetpack_module_more_info_connected_stats', 'stats_more_info_connected' );
