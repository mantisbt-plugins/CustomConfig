<?php
class CustomConfigPlugin extends MantisPlugin {

	function register() {
		$this->name = plugin_lang_get( 'title' );
		$this->description = plugin_lang_get( 'description' );
		$this->version = '1.0.0';
		$this->requires = array( 'MantisCore' => '2.0.0', );
		$this->author = 'Cas Nuy';
		$this->contact = 'cas@nuy.info';
		$this->url = 'https://github.com/mantisbt-plugins/CustomConfig';
		$this->page = 'config';
	}

	function config() {
		return array(
			'allowed_user'			=> 0,		// Administrator
			'update_files'			=> OFF,
			);
	}

	function init() {
		plugin_event_hook( 'EVENT_MENU_MANAGE', 'managemenu' );
	}

	function managemenu() {
		return array('<a href="'. plugin_page( 'manage_CustomConfig_page.php' ) . '">' . plugin_lang_get( 'Custom' ) . '</a>' );
    }

}