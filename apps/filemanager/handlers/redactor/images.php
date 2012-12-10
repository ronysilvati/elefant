<?php

/**
 * List available images for the wysiwyg editor.
 */

$page->layout = false;

$this->require_admin ();

$images = array ();

$glob = array (
	glob ('files/*.{png,jpg,gif,jpeg}', GLOB_BRACE),
	glob ('files/*/*.{png,jpg,gif,jpeg}', GLOB_BRACE),
	glob ('files/*/*/*.{png,jpg,gif,jpeg}', GLOB_BRACE),
	glob ('files/*/*/*/*.{png,jpg,gif,jpeg}', GLOB_BRACE)
);

foreach ($glob as $list) {
	if (is_array ($list)) {
		foreach ($list as $item) {
			$images[] = array (
				'thumb' => '/' . $item,
				'image' => '/' . $item,
				'folder' => str_replace ('/', ' / ', dirname (str_replace ('files/', '', $item)))
			);
		}
	}
}

echo stripslashes (json_encode ($images));

?>