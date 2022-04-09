<script type='text/template' id='mapp-tmpl-map'>
	<div class='mapp-wrapper'>
		<div class='mapp-content'>
			<# print(mapp.lib.template('map-header', { map : map })); #>
			<div class='mapp-main'>
				<# if (map.poiList && layout != 'inline') { print(mapp.lib.template('map-sidebar', { map : map })); } #>
				<# if (layout != 'inline') { #><div class='mapp-directions'></div><# } #>
				<div class='mapp-canvas-panel'>
					<div class='mapp-canvas'></div>
					<div class='mapp-menu'></div>
					<# if (mappl10n.options.ssl) { #>
						<div class='mapp-geolocate-control-wrapper'>
							<div class='mapp-geolocate-control' data-mapp-action='geolocate' title='<?php _e('Your Location', 'mappress-google-maps-for-wordpress');?>'></div>
						</div>
					<# } #>
					<div class='mapp-spinner-overlay'></div>
					<div class='mapp-spinner'></div>
				</div>
			</div>
			<# print(mapp.lib.template('map-footer', { map : map })); #>
		</div>
	</div>
	<# if (map.poiList && layout == 'inline') { print(mapp.lib.template('map-sidebar', { map : map })); } #>
	<# if (layout == 'inline') { #><div class='mapp-directions'></div><# } #>
</script>

<script type='text/template' id='mapp-tmpl-map-header'>
	<# const isFilterable = map.isFilterable(); #>
	<# const isSearchable = map.isSearchable(); #>
	<# if (isSearchable || isFilterable) { #>
		<div class='mapp-header'>
			<# if (isSearchable) { #>
				<div class='mapp-search-container'></div>
			<# } #>
			<# if (isFilterable && mappl10n.options.filtersPos == 'top') { #>
				<div class='mapp-filters'></div>
			<# } #>
		</div>
	<# } #>
</script>

<script type='text/template' id='mapp-tmpl-map-sidebar'>
	<div class='mapp-sidebar'>
		<div class='mapp-sidebar-toggle' data-mapp-action='sidebar-toggle'></div>
		<# if (map.isFilterable() && mappl10n.options.filtersPos == 'list') { #>
			<div class='mapp-filters'></div>
		<# } #>
		<div class='mapp-gt-inspector mapp-settings-container'></div>
		<div class='mapp-list'></div>
	</div>
</script>

<script type='text/template' id='mapp-tmpl-map-footer'>
	<# if ( (map.poiList || mappl10n.options.poiList) && map.layout != 'inline') { #>
		<div class='mapp-footer'>
			<div class='mapp-button mapp-view-list' data-mapp-action='view-list'><img src='<# print(mappl10n.options.baseurl + "/images/outline_format_list_bulleted_black_18dp.png"); #>'><?php _e('List', 'mappress-google-maps-for-wordpress'); ?></div>
			<div class='mapp-button mapp-view-map' data-mapp-action='view-map'><img src='<# print(mappl10n.options.baseurl + "/images/outline_map_black_18dp.png"); #>'><?php _e('Map', 'mappress-google-maps-for-wordpress'); ?></div>
		</div>
	<# } #>
</script>
