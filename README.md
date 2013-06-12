# Affiliates Is Referred #

## Description ##

Adds shortcodes to show content conditionally based on whether a visitor was referred (or not) by an affiliate.

Requires [Affiliates(http://www.itthinx.com/plugins/affiliates/), [Affiliates Pro](http://www.itthinx.com/plugins/affiliates-pro/) or [Affiliates Enterprise](http://www.itthinx.com/plugins/affiliates-enterprise/).

This provides the following shortcodes:

- `[affiliates_is_referred]` to show content conditionally if a visitor has been referred
- `[affiliates_is_not_referred]` to show content conditionally if a visitor has not been referred

The shortcodes support the following attributes:

- direct : "yes" / "no" to take into the Direct affiliate or not; default: "no"
- affiliate_id : a comma-separated list of affiliate ids that restrict the referrers to which the shortcode applies

Example:

`[affiliates_is_referred affiliate_id="45,77"]Some content shown here conditionally ...[/affiliates_is_referred]`

## Installation ##

1. Upload or extract the `affiliates-is-referred` folder to your site's `/wp-content/plugins/` directory. You can also use the *Add new* option found in the *Plugins* menu in WordPress.
2. Enable the plugin from the *Plugins* menu in WordPress.


## Changelog ##

= 1.0.0 =
* Initial release. Provides the two shortcodes.
