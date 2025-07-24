<?php
/**
 * Plugin Name: Product Table by WBW
 * Plugin URI: https://woobewoo.com/plugins/table-woocommerce-plugin/
 * Description: Post your product easy in tables
 * Version: 2.2.0
 * Author: woobewoo
 * Author URI: https://woobewoo.com
 * Requires at least: 3.3
 * Text Domain: woo-product-tables
 * Domain Path: /languages
 * WC requires at least: 3.4.0
 * WC tested up to: 10.0
 * Requires Plugins: woocommerce
 **/

/**
 * Base config constants and functions.
 */
require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'config.php' ;
require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'functions.php' ;

/**
 * HPOS.
 */
add_action( 'before_woocommerce_init', function() {
	if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
		\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
	}
} );

/**
 * Connect all required core classes.
 */
if ( trueRequestWtbp() ) {

	importClassWtbp( 'DbWtbp' );
	importClassWtbp( 'InstallerWtbp' );
	importClassWtbp( 'BaseObjectWtbp' );
	importClassWtbp( 'ModuleWtbp' );
	importClassWtbp( 'ModelWtbp' );
	importClassWtbp( 'ViewWtbp' );
	importClassWtbp( 'ControllerWtbp' );
	importClassWtbp( 'HelperWtbp' );
	importClassWtbp( 'DispatcherWtbp' );
	importClassWtbp( 'FieldWtbp' );
	importClassWtbp( 'TableWtbp' );
	importClassWtbp( 'FrameWtbp' );

	/**
	 * Deprecated classes.
	 *
	 * @deprecated since version 1.0.1
	 */
	importClassWtbp( 'LangWtbp' );
	importClassWtbp( 'ReqWtbp' );
	importClassWtbp( 'UriWtbp' );
	importClassWtbp( 'HtmlWtbp' );
	importClassWtbp( 'ResponseWtbp' );
	importClassWtbp( 'FieldAdapterWtbp' );
	importClassWtbp( 'ValidatorWtbp' );
	importClassWtbp( 'ErrorsWtbp' );
	importClassWtbp( 'UtilsWtbp' );
	importClassWtbp( 'ModInstallerWtbp' );
	importClassWtbp( 'InstallerDbUpdaterWtbp' );
	importClassWtbp( 'DateWtbp' );

	/**
	 * Check plugin version - maybe we need to update database, and check global errors in request.
	 */
	InstallerWtbp::update();
	ErrorsWtbp::init();

	/**
	 * Start application.
	 */
	FrameWtbp::_()->parseRoute();
	FrameWtbp::_()->init();
	FrameWtbp::_()->exec();

}
