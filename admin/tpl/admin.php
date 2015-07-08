<div class="wrap" id="sow-widgets-page">

	<ul class="page-nav">
		<li class="active"><a href="#all">All</a></li>
		<li><a href="#enabled">Enabled</a></li>
		<li><a href="#disabled">Disabled</a></li>
	</ul>

	<div id="widgets-list">

		<?php foreach( $widgets as $id => $widget ): ?>
			<div class="so-widget-wrap">
				<div class="so-widget so-widget-is-<?php echo $widget['Active'] ? 'active' : 'inactive' ?>">

					<?php
					$banner = '';
					if( file_exists( dirname( $widget['File'] ) . '/assets/banner.svg' ) ) {
						$banner = dirname( $widget['File'] ) . '/assets/banner.svg';
						$banner = PS_dir_url($banner);
					}
					$banner = apply_filters('siteorigin_widgets_widget_banner', $banner, $widget);
					?>

					<img src="<?= sow_esc_url( !empty($banner) ? $banner : plugin_dir_url(__FILE__) . '../../banners/default.png' ) ?>" />

					<div class="so-widget-text">
						<label class="switch">
							<span class="dashicons dashicons-yes"></span>
							<input class="switch-input" type="checkbox" <?php checked( $widget['Active'] ) ?> data-url="<?php echo wp_nonce_url( admin_url('admin-ajax.php?action=so_widgets_bundle_manage&widget='.$widget['ID']), 'manage_so_widget' ) ?>">
							<span class="switch-label" data-on="On" data-off="Off"></span>
							<span class="switch-handle"></span>
						</label>

						<h4><?php echo esc_html($widget['Name']); ?></h4>
						<p class="so-widget-description">
							<?php echo $widget['Description'] ?>
						</p>
					</div>

				</div>
			</div>
		<?php endforeach; ?>

	</div>

</div>