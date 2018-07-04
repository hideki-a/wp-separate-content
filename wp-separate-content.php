<?php
/*
Plugin Name: WP Separate Content
Description: Separate content by more tag.
Version: 1.0.0
Author: Hideki Abe
Author URI: https://www.anothersky.pw/
Copyright: Hideki Abe
*/

if ( ! class_exists( 'WPSeparateContent' ) ) :

class WPSeparateContent {
	function __construct() {

		/* Do nothing here */

	}

	private function separate_content( $content ) {
		preg_match( '/([\w\W]*)<!--more(.*?)?-->([\w\W]*)/', $content, $matches );
		return $matches;
	}

	public static function the_content_of_body() {
		$post = get_post();
		$content = $post->post_content;
		$matches = self::separate_content( $content );

		if ( $matches ) {
			$content_of_body = $matches[1];

			if ( ! empty( $content_of_body ) ) {
				$content_of_body = apply_filters( 'the_content', $content_of_body );
				echo $content_of_body;
				return;
			}
		}

		$content_of_body = apply_filters( 'the_content', $content );
		echo $content_of_body;
	}

	public static function the_content_of_more() {
		$post = get_post();
		$content = $post->post_content;
		$matches = self::separate_content( $content );

		if ( $matches ) {
			$content_of_more = $matches[3];

			if ( ! empty( $content_of_more ) ) {
				$content_of_more = apply_filters( 'the_content', $content_of_more );
				echo $content_of_more;
				return;
			}
		}
	}
}

endif;
