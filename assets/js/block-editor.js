wp.domReady(() => {
	/**
	 * Disable all embed variations except for those listed.
	 */
  var enabledEmbeds = ['youtube', 'vimeo', 'twitter'];

  var embedBlock = wp.blocks.getBlockVariations('core/embed');
  if (embedBlock) {
      embedBlock.forEach(function(el) {
          if (!enabledEmbeds.includes(el.name)) {
              wp.blocks.unregisterBlockVariation('core/embed', el.name);
          }
      })
  }

	/**
	 * Disable block styles.
	 *
	 * This is heavy-handed and disables all styles for all blocks. But, it protects against WordPress adding new block
	 * styles in future updates, that we would need to remove.
	 *
	 * Block styles can be allowed by adding them to enabledStyles.
	 *
	 */
	var enabledStyles = {
		'core/quote': ['plain'],
	};
	wp.blocks.getBlockTypes().forEach((block) => {
		block['styles'].forEach(style => {
			if (!enabledStyles[block.name]?.includes(style.name)) {
				wp.blocks.unregisterBlockStyle( block.name, style.name );
				console.log(`Unregistered block style: ${block.name} - ${style.name}`);
			} else {
				console.log(`Active block style: ${block.name} - ${style.name}`);
			}
		});
	});

	/**
	 * Register block styles.
	 */
	wp.blocks.registerBlockStyle( 'core/button', [
		{
			name: 'primary',
			label: 'Primary',
			isDefault: true,
		},
		{
			name: 'secondary',
			label: 'Secondary',
			isDefault: false,
		}
	]);

	/**
	 * Disable inline formatting options.
	 *
	 * @link https://github.com/WordPress/gutenberg/tree/trunk/packages/format-library/src
	 */
	 wp.richText.unregisterFormatType('core/text-color'); // highlight
	 wp.richText.unregisterFormatType('core/code');
});
