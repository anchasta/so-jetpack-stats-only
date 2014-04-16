<div class="wrap">
	<h2><?php _e( 'Network Settings', 'jetpack' ); ?></h2>
	<form action="edit.php?action=jetpack-network-settings" method="POST">
		<h3><?php _e( 'Global', 'jetpack' ); ?></h3>
		<p><?php _e( 'These settings affect all sites on the network.', 'jetpack' ); ?></p>
		<table class="form-table">
			<tr valign="top">
				<th scope="row"><label for="sub-site-override"><?php _e( 'Sub-site override', 'jetpack' ); ?></label></th>
				<td>
					<input type="checkbox" name="sub-site-connection-override" id="sub-site-override" value="1" <?php checked($options['sub-site-connection-override']); ?> />
					<label for="sub-site-override"><?php _e( 'Allow individual site administrators to manage their own connections (connect and disconnect) to <a href="//wordpress.com">WordPress.com</a>', 'jetpack' ); ?></label>
				</td>
			</tr>
		</table>

		<?php submit_button(); ?>

	</form>
</div>
