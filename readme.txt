=== Affiliates Is Referred ===
Contributors: itthinx
Donate link: http://www.itthinx.com/plugins/affiliates-is-referred
Tags: affiliate, affiliates, shortcode
Requires at least: 3.3
Tested up to: 3.5.1
Stable tag: 1.0.0
License: GPLv3

Adds shortcodes to show content conditionally based on whether a visitor was referred (or not) by an affiliate.  Requires <a href="http://www.itthinx.com/plugins/affiliates/">Affiliates</a>, <a href="http://www.itthinx.com/plugins/affiliates-pro/">Affiliates Pro</a> or <a href="http://www.itthinx.com/plugins/affiliates-enterprise/">Affiliates Enterprise</a>.

== Description ==

Adds shortcodes to show content conditionally based on whether a visitor was referred (or not) by an affiliate.

This plugin requires:

Requires <a href="http://www.itthinx.com/plugins/affiliates/">Affiliates</a>, <a href="http://www.itthinx.com/plugins/affiliates-pro/">Affiliates Pro</a> or <a href="http://www.itthinx.com/plugins/affiliates-enterprise/">Affiliates Enterprise</a>.

This provides the following shortcodes:

- `[affiliates_is_referred]` to show content conditionally if a visitor has been referred
- `[affiliates_is_not_referred]` to show content conditionally if a visitor has not been referred

The shortcodes support the following attributes:

- direct : "yes" / "no" to take into the Direct affiliate or not; default: "no"
- affiliate_id : a comma-separated list of affiliate ids that restrict the referrers to which the shortcode applies

Example:

`[affiliates_is_referred affiliate_id="45,77"]Some content shown here conditionally ...[/affiliates_is_referred]`

== Installation ==

1. Upload or extract the `affiliates-is-referred` folder to your site's `/wp-content/plugins/` directory. You can also use the *Add new* option found in the *Plugins* menu in WordPress.
2. Enable the plugin from the *Plugins* menu in WordPress.

== Frequently Asked Questions ==

Nothing here yet.

== Screenshots ==

None available. Try it out.

== Changelog ==

= 1.0.0 =
* Provides two shortcodes.

== Upgrade Notice ==

= 1.0.0 =
* Initial release.
