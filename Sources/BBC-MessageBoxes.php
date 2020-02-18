<?php

/**
 * @package BBC Message Boxes
 * @version 3.0
 * @author Diego Andrés <diegoandres_cortes@outlook.com>
 * @copyright Copyright (c) 2020, SMF Tricks
 * @license https://www.mozilla.org/en-US/MPL/2.0/
 */

if (!defined('SMF'))
	die('No direct access...');

class MessageBoxes
{
	public static function bbc_buttons(&$bbc_tags, &$editor_tag_map)
	{
		global $txt;

		// Message Boxes bits
		loadLanguage('mboxes/');
		loadCSSFile('mboxes.css', array('minimize' => true, 'default_theme' => true));
		loadJavaScriptFile('mboxes.js', array('minimize' => true, 'default_theme' => true));

		// Permission to use these?
		if (!allowedTo('mboxes_use'))
			return;

		$bbc_tags[count($bbc_tags)-1][] = array();
		$bbc_tags[count($bbc_tags)-1][] = array(
			'image' => 'error',
			'code' => 'error',
			'description' => $txt['error_bbc']
		);
		$bbc_tags[count($bbc_tags)-1][] = array(
			'image' => 'warning',
			'code' => 'warning',
			'description' => $txt['warning_bbc']
		);
		$bbc_tags[count($bbc_tags)-1][] = array(
			'image' => 'okay',
			'code' => 'okay',
			'description' => $txt['okay_bbc']
		);
		$bbc_tags[count($bbc_tags)-1][] = array(
			'image' => 'info',
			'code' => 'info',
			'description' => $txt['info_bbc']
		);
	}

	public static function bbc_code(&$codes)
	{
		global $modSettings;


		$codes[] = array(
			'tag' => 'error',
			'before' => '<div class="error_bbc'.(empty($modSettings['mboxes_style']) || $modSettings['mboxes_style'] == 'classic' ? '' : ' '.$modSettings['mboxes_style']). '">',
			'after' => '</div>',
			'block_level' => true,
		);
		$codes[] = array(
			'tag' => 'warning',
			'before' => '<div class="warning_bbc'.(empty($modSettings['mboxes_style']) || $modSettings['mboxes_style'] == 'classic' ? '' : ' '.$modSettings['mboxes_style']). '">',
			'after' => '</div>',
			'block_level' => true,
		);
		$codes[] = array(
			'tag' => 'okay',
			'before' => '<div class="okay_bbc'.(empty($modSettings['mboxes_style']) || $modSettings['mboxes_style'] == 'classic' ? '' : ' '.$modSettings['mboxes_style']). '">',
			'after' => '</div>',
			'block_level' => true,
		);
		$codes[] = array(
			'tag' => 'info',
			'before' => '<div class="info_bbc'.(empty($modSettings['mboxes_style']) || $modSettings['mboxes_style'] == 'classic' ? '' : ' '.$modSettings['mboxes_style']). '">',
			'after' => '</div>',
			'block_level' => true,
		);
	}

	public static function permissions(&$permissionGroups, &$permissionList, &$leftPermissionGroups, &$hiddenPermissions, &$relabelPermissions)
	{
		$permissions = [
			'mboxes_use' => true,
		];
		$permissionGroups['membergroup'] = ['mboxes'];
		foreach ($permissions as $p => $s) {
			$permissionList['membergroup'][$p] = [$s,'mboxes','mboxes'];
			$hiddenPermissions[] = $p;
		}
	}

	public static function settings(&$config_vars)
	{
		global $txt;

		loadLanguage('mboxes/');
		$config_vars += [
			['title', 'mboxes_settings'],
			['permissions', 'mboxes_use', 'subtext' => $txt['permissionhelp_mboxes_use']],
			['select', 'mboxes_style', $txt['mboxes_types']], 
		];
	}
}