<?php
/*
Plugin Name: Markdown_Cheatsheet
Plugin URI: http://www.recodele.net
Description: For markdown beginner, able to check Markdown Cheatsheet in edit.php.
Version: 0.1.1
Author: recodele( Shohei Komori )
Author URI: http://www.recodele.net
License: GPL2
*/

	add_action('admin_menu', 'markdown_cheatsheet_plugin_menu');
	
	function markdown_cheatsheet_meta_box_inside() {
		$tag = '';
		$tb = "\t\t\t\t\t";
		$tag .= $tb . "" . '<div id="markdown_cheatsheet_meta_box">' . "\n";
		$tag .= $tb . "\t" . '<div class="part">' . "\n";
		$tag .= $tb . "\t\t" . '<h4>Headers</h4>' . "\n";
		$tag .= $tb . "\t\t" . '<ul>' . "\n";
		$tag .= $tb . "\t\t\t" . '<li># H1</li>' . "\n";
		$tag .= $tb . "\t\t\t" . '<li>## H2</li>' . "\n";
		$tag .= $tb . "\t\t\t" . '<li>### H3</li>' . "\n";
		$tag .= $tb . "\t\t\t" . '<li>#### H4</li>' . "\n";
		$tag .= $tb . "\t\t\t" . '<li>##### H5</li>' . "\n";
		$tag .= $tb . "\t\t\t" . '<li>###### H6</li>' . "\n";
		$tag .= $tb . "\t\t" . '</ul>' . "\n";
		$tag .= $tb . "\t" . '</div>' . "\n";
		$tag .= $tb . "\t" . '<div class="part">' . "\n";
		$tag .= $tb . "\t\t" . '<h4>Text</h4>' . "\n";
		$tag .= $tb . "\t\t" . '<ul>' . "\n";
		$tag .= $tb . "\t\t\t" . '<li>line break( br ) = 2 spaces</li>' . "\n";
		$tag .= $tb . "\t\t\t" . '<li>paragraphs = one or more consecutive lines</li>' . "\n";
		$tag .= $tb . "\t\t\t" . '<li>Horizontal line = 3 or more *** / --- / ___</li>' . "\n";
		$tag .= $tb . "\t\t\t" . '<li>*emphasis*</li>' . "\n";
		$tag .= $tb . "\t\t\t" . '<li>**strong**</li>' . "\n";
		$tag .= $tb . "\t\t\t" . '<li>[LinkText](LinkAddress "optionalLinkTitle")</li>' . "\n";
		$tag .= $tb . "\t\t" . '</ul>' . "\n";
		$tag .= $tb . "\t" . '</div>' . "\n";
		$tag .= $tb . "\t" . '<div class="part">' . "\n";
		$tag .= $tb . "\t\t" . '<h4>Lists</h4>' . "\n";
		$tag .= $tb . "\t\t" . '<ul>' . "\n";
		$tag .= $tb . "\t\t\t" . '<li>* unorderList(+ / - is also)</li>' . "\n";
		$tag .= $tb . "\t\t\t" . '<li>1. numderList(any number)</li>' . "\n";
		$tag .= $tb . "\t\t" . '</ul>' . "\n";
		$tag .= $tb . "\t" . '</div>' . "\n";
		$tag .= $tb . "\t" . '<div class="part">' . "\n";
		$tag .= $tb . "\t\t" . '<h4>Images</h4>' . "\n";
		$tag .= $tb . "\t\t" . '<ul>' . "\n";
		$tag .= $tb . "\t\t\t" . '<li>![ImageName](ImageAddress)</li>' . "\n";
		$tag .= $tb . "\t\t" . '</ul>' . "\n";
		$tag .= $tb . "\t" . '</div>' . "\n";
		$tag .= $tb . "\t" . '<div class="part">' . "\n";
		$tag .= $tb . "\t\t" . '<h4>Code</h4>' . "\n";
		$tag .= $tb . "\t\t" . '<ul>' . "\n";
		$tag .= $tb . "\t\t\t" . '<li>Block display = 4 spaces</li>' . "\n";
		$tag .= $tb . "\t\t\t" . '<li>' . "'" . 'inline' . "'" . '</li>' . "\n";
		$tag .= $tb . "\t\t" . '</ul>' . "\n";
		$tag .= $tb . "\t" . '</div>' . "\n";
		$tag .= $tb . "" . '</div>' . "\n";
		echo $tag; 
	}
	 
	function markdown_cheatsheet_meta_box_output() {
			add_meta_box('markdown_cheatsheet_meta_box', 'Markdown Cheatsheet', 'markdown_cheatsheet_meta_box_inside', 'post', 'side', 'low' );
	}
	 
	add_action('admin_menu', 'markdown_cheatsheet_meta_box_output' );
	
?>