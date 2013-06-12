<?php
/**
 * affiliates-is-referred.php
 *
 * Copyright (c) 2013 "kento" Karim Rahimpur www.itthinx.com
 *
 * This code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 *
 * This code is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This header and all notices must be kept intact.
 *
 * @author Karim Rahimpur
 * @package affiliates-is-referred
 * @since affiliates-is-referred 1.0.0
 *
 * Plugin Name: Affiliates Is Referred
 * Plugin URI: http://www.itthinx.com/plugins/affiliates-is-referred
 * Description: Adds shortcodes to show content conditionally based on whether a visitor was referred (or not) by an affiliate.  Requires <a href="http://www.itthinx.com/plugins/affiliates/">Affiliates</a>, <a href="http://www.itthinx.com/plugins/affiliates-pro/">Affiliates Pro</a> or <a href="http://www.itthinx.com/plugins/affiliates-enterprise/">Affiliates Enterprise</a>.
 * Version: 1.0.0
 * Author: itthinx
 * Author URI: http://www.itthinx.com
 * Donate-Link: http://www.itthinx.com
 * License: GPLv3
 */

/**
 * Provides the following shortcodes:
 * 
 * [affiliates_is_referred]
 * [affiliates_is_not_referred]
 */
class Affiliates_Is_Referred {

	/**
	 * Adds shortcodes.
	 */
	public static function init() {
		add_shortcode( 'affiliates_is_referred', array( __CLASS__, 'is' ) );
		add_shortcode( 'affiliates_is_not_referred', array( __CLASS__, 'is_not' ) );
	}

	/**
	 * Renders content if visitor was referred.
	 *
	 * @param array $atts keys : direct, affiliate_id
	 * @param string $content to render if referred
	 * @return string content if referred, otherwise empty string
	 * @see Affiliates_Is_Referred::is_referred() for $atts
	 */
	public static function is( $atts, $content = null ) {
		$output = '';
		if ( defined( 'AFFILIATES_FILE' ) ) {
			if ( self::is_referred( $atts ) ) {
				remove_shortcode( 'affiliates_is_referred' );
				$content = do_shortcode( $content );
				add_shortcode( 'affiliates_is_referred', array( __CLASS__, 'is' ) );
				$output .= $content;
			}
		}
		return $output;
	}

	/**
	 * Renders content if visitor was not referred.
	 * 
	 * @param array $atts keys : direct, affiliate_id
	 * @param string $content to render if not referred
	 * @return string content if not referred, otherwise empty string 
	 * @see Affiliates_Is_Referred::is_referred() for $atts
	 */
	public static function is_not( $atts, $content = null ) {
		$output = '';
		if ( defined( 'AFFILIATES_FILE' ) ) {
			if ( !self::is_referred( $atts ) ) {
				remove_shortcode( 'affiliates_is_not_referred' );
				$content = do_shortcode( $content );
				add_shortcode( 'affiliates_is_not_referred', array( __CLASS__, 'is_not' ) );
				$output .= $content;
			}
		}
		return $output;
	}

	/**
	 * Returns true if the visitor is referred, otherwise false.
	 * 
	 * $atts :
	 * 
	 * - direct : if true, direct is valid, default: false
	 * 
	 * - affiliate_id : comma-separated list of affiliate ids to take into
	 *   account, if given, referrer must be in the list, otherwise returns
	 *   false even when referred
	 * 
	 * @param array $atts
	 */
	public static function is_referred( $atts = array() ) {
		$options = shortcode_atts(
			array(
				'direct'        => false,
				'affiliate_id' => null
			),
			$atts
		);
		extract( $options );
		$result = false;
		require_once  AFFILIATES_CORE_LIB . '/class-affiliates-service.php';
		if ( $referrer_id = Affiliates_Service::get_referrer_id() ) {
			if ( $referrer_id ) {
				if ( $direct || $referrer_id !== affiliates_get_direct_id() ) {
					if ( !empty( $affiliate_id ) ) {
						foreach( explode( ',', $affiliate_id ) as $id ) {
							$id = intval( trim( $id ) );
							if ( $id == $referrer_id ) {
								$result = true;
								break;
							}
						}
					} else {
						$result = true;
					}
				}
			}
		}
		return $result;
	}
}
Affiliates_Is_Referred::init();
