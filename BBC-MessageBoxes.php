<?php

/**
 * @package BBC Message Boxes
 * @version 2.0
 * @author Diego Andrés <diegoandres_cortes@outlook.com>
 * @copyright Copyright (c) 2015, Diego Andrés
 * @license http://www.mozilla.org/MPL/MPL-1.1.html
 */

if (!defined('SMF'))
	die('No direct access...');

class BBCMessageBoxes
{
	public static function load_theme()
	{
		global $context, $settings, $topic;

		// Color picker
		if ((isset($_REQUEST['action']) && $_REQUEST['action'] == 'post') || (isset($_REQUEST['topic']) && !empty($topic)))
		{
			$context['html_headers'] .= '
				<link rel="stylesheet" type="text/css" href="'. $settings['default_theme_url']. '/css/mBox.css" />';
		}
	}
	public static function bbc_code(&$codes)
	{
		global $user_info, $txt;

		$codes[] = array(
			'tag' => 'error',
			'before' => '<div class="error_bbc">',
			'after' => '</div>',
			'block_level' => true,
		);
		$codes[] = array(
			'tag' => 'warning',
			'before' => '<div class="warning_bbc">',
			'after' => '</div>',
			'block_level' => true,
		);
		$codes[] = array(
			'tag' => 'okay',
			'before' => '<div class="okay_bbc">',
			'after' => '</div>',
			'block_level' => true,
		);
		$codes[] = array(
			'tag' => 'info',
			'before' => '<div class="info_bbc">',
			'after' => '</div>',
			'block_level' => true,
		);

	}

	public static function bbc_buttons(&$buttons)
	{
		global $txt;
		$buttons[count($buttons)-1][] = array();
		$buttons[count($buttons)-1][] = array(
			'image' => 'error',
			'code' => 'error',
			'before' => '[error]',
			'after' => '[/error]',
			'description' => $txt['error_bbc']
		);
		$buttons[count($buttons)-1][] = array(
			'image' => 'warning',
			'code' => 'warning',
			'before' => '[warning]',
			'after' => '[/warning]',
			'description' => $txt['warning_bbc']
		);
		$buttons[count($buttons)-1][] = array(
			'image' => 'okay',
			'code' => 'okay',
			'before' => '[okay]',
			'after' => '[/okay]',
			'description' => $txt['okay_bbc']
		);
		$buttons[count($buttons)-1][] = array(
			'image' => 'info',
			'code' => 'info',
			'before' => '[info]',
			'after' => '[/info]',
			'description' => $txt['info_bbc']
		);
	}
}