=== Canada Post Tracking Shortcode ===
Contributors: useStrict
Author URI: http://www.usestrict.net/
Plugin URI: 
Tags: canada post, shipping, tracking code, tracking link, tracking code link
Requires at least: 3.1
Tested up to: 4.1
Text Domain: usc_cp_tracking_shortcode
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Stable tag: 1.1.1
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=VLQU2MMXKB6S2

Generate a parcel-tracking URL using <strong>[cp_tracker_link]</strong> shortcode.

== Description ==
Generate a parcel-tracking URL using <strong>[cp_tracker_link]</strong> shortcode. This also works with WooCommerce Order Notes. 

Valid attributes:

 * <strong>tc</strong>: The actual tracking code
 * <strong>lang</strong>: Whether to display the page in English (en) or French (fr). Default is "en". These values are used by Canada Post, so don't try anything else.
 * <strong>target</strong>: If passed, will be the value used in the target attribute of the link.
 
 Example:
 
 [cp_tracker_link tc="123456789"]
 
 or
 
 [cp_tracker_link tc="123456789" lang="en" target="_new"]


== Installation ==

1. Upload the entire plugin folder via FTP to `/wp-content/plugins/`.
2. Activate the plugin through the 'Plugins' menu in WordPress.

== Frequently Asked Questions ==
 * Why does the shortcode not get transformed into a link when I add a WooCommerce Order Note?
 
 Order Notes are added via Ajax and the shortcode gets parsed in the back end. If you refresh the page, 
 you will see that the shortcode got transformed into the link. 

== Screenshots ==
There's no admin back-end. Just use the shortcode as stated in the Description section.

== Changelog ==
= 1.1.1 = 
 * Override WC hooks only if WC version is < 2.3.3

= 1.1 =
 * Applies a workaround for WooCommerce bug https://github.com/woothemes/woocommerce/issues/7349 which caused the clients to receive the comment with unparsed shortcode.

= 1.0 =
 * Initial Release

== Upgrade Notice ==
= 1.1 =
Please upgrade so that clients no longer receive an unparsed shortcode in the content of the comment email. See WooCommerce bug https://github.com/woothemes/woocommerce/issues/7349 for details.
