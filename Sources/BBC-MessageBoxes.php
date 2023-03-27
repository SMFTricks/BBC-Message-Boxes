<?php

/**
 * @package BBC Message Boxes
 * @version 3.1
 * @author Diego Andrés <diegoandres_cortes@outlook.com>
 * @copyright Copyright (c) 2023, SMF Tricks
 * @license https://www.mozilla.org/en-US/MPL/2.0/
 */

if (!defined('SMF'))
	die('No direct access...');

class BBC_MessageBoxes
{
	/**
	 * @var array The BBC's
	 */
	private $_bbc_list = [
		'error',
		'warning',
		'info',
		'okay',
	];

	/**
	 * Initialize the mod
	 * 
	 * @return void
	 */
	public function initialize() : void
	{
		// Load hooks
		$this->hooks();
	}

	/**
	 * Load the hooks for the mod
	 * 
	 * @return void
	 */
	private function hooks() : void
	{
		add_integration_function('integrate_pre_css_output', 'BBC_MessageBoxes::css#', false);
		add_integration_function('integrate_load_permissions', 'BBC_MessageBoxes::permissions#', false);
		add_integration_function('integrate_general_mod_settings', 'BBC_MessageBoxes::settings#', false);
		add_integration_function('integrate_preparsecode', 'BBC_MessageBoxes::preparsecode#', false);
		add_integration_function('integrate_bbc_buttons', 'BBC_MessageBoxes::bbc_buttons#', false);
		add_integration_function('integrate_bbc_codes', 'BBC_MessageBoxes::bbc_codes#', false);
	}

	/**
	 * Load the CSS for the message boxes
	 * 
	 * @return void
	 */
	public function css() : void
	{
		loadCSSFile('mboxes.css', array('minimize' => true, 'default_theme' => true), 'smf_bbc_messageboxes');
	}

	/**
	 * Add some checks before the message is sent
	 * 
	 * @param string $message The message content
	 * @return void
	 */
	public function preparsecode(string &$message) : void
	{
		// Pattern
		$tag_patterns = array();
		foreach ($this->_bbc_list as $bbc)
			$tag_patterns[] = preg_quote($bbc) . '(?:(?!\]).)*?';
		$pattern = '/\[(?:' . implode('|', $tag_patterns) . ')\](.*?)\[\/(?:' . implode('|', $this->_bbc_list) . ')\]/';

		// If the user is not an admin, can't use any of the tags.
		if (!allowedTo('mboxes_use'))
			$message = preg_replace($pattern, '$1', $message);
	}

	/**
	 * Add the bbc to the editor toolbar
	 * 
	 * @param array $tags The bbc tags
	 * @return void
	 */
	public function bbc_buttons(array &$bbc_tags) : void
	{
		global $txt;

		// Permission to use these?
		if (!allowedTo('mboxes_use'))
			return;

		// Message Boxes bits
		loadLanguage('mboxes/');
		loadJavaScriptFile('mboxes.js', array('minimize' => true, 'default_theme' => true));

		// Add the BBCs
		$bbc_tags[count($bbc_tags)-1][] = [];
		foreach ($this->_bbc_list as $bbc)
		{
			$bbc_tags[count($bbc_tags)-1][] = [
				'image' => $bbc,
				'code' => $bbc,
				'description' => $txt[$bbc . '_bbc']
			];
		}
	}

	/**
	 * Attach the content to the bbc.
	 * 
	 * @param array $codes The bbc codes
	 * @param array $no_autolink_tags Disable autolink for these tags
	 * @return void
	 */
	public function bbc_codes(array &$codes, array &$no_autolink_tags) : void
	{
		global $modSettings;

		// Add the BBCs
		foreach ($this->_bbc_list as $bbc)
		{
			// Don't autolink this bbc
			$no_autolink_tags[] = $bbc;

			// Add the bbc
			$codes[] = [
				'tag' => $bbc,
				'before' => '<div class="' . $bbc . '_bbc' . (empty($modSettings['mboxes_style']) || $modSettings['mboxes_style'] == 'classic' ? '' : ' ' . $modSettings['mboxes_style']) . '">',
				'after' => '</div>',
				'block_level' => true,
				'disallow_children' => array_filter($this->_bbc_list, function($element) use ($bbc) {
					return $element !== $bbc;
				})
			];
		}
	}

	/**
	 * Ádd the permissions
	 * 
	 * @param array $permissionGroups List of all the groups dependant on the currently selected view
	 * @return void
	 */
	public function permissions(&$permissionGroups) : void
	{
		$permissionGroups['membergroup']['mboxes_use'] = [false, 'general', 'view_basic_info'];
	}

	/**
	 * Add the settngs
	 * 
	 * @param array $config_vars The settings array
	 * @return void
	 */
	public function settings(&$config_vars) : void
	{
		global $txt;

		// Language
		loadLanguage('mboxes/');

		// Settings
		$config_vars[] = ['title', 'mboxes_settings'];
		$config_vars[] = ['permissions', 'mboxes_use', 'subtext' => $txt['permissionhelp_mboxes_use'] . $txt['permissionname_mboxes_use_desc']];
		$config_vars[] = ['select', 'mboxes_style', $txt['mboxes_types']];
	}
}