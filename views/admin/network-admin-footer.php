			<div id="jp-footer">
				<p class="automattic"><?php _e( 'An <span>Automattic</span> Airline', 'jetpack' ) ?></p>
				<p class="small">
					<a href="http://jetpack.me/" target="_blank">Jetpack <?php echo esc_html( JETPACK__VERSION ); ?></a> |
					<a href="http://automattic.com/privacy/" target="_blank"><?php _e( 'Privacy Policy', 'jetpack' ); ?></a> |
					<a href="http://wordpress.com/tos/" target="_blank"><?php _e( 'Terms of Service', 'jetpack' ); ?></a> |
<?php if ( current_user_can( 'manage_options' ) ) : ?>
					<a href="<?php echo Jetpack::admin_url( array(	'page' => 'jetpack-debugger' ) ); ?>"><?php _e( 'Debug', 'jetpack' ); ?></a> |
<?php endif; ?>
					<a href="http://jetpack.me/support/" target="_blank"><?php _e( 'Support', 'jetpack' ); ?></a>
				</p>
			</div>
		</div>
