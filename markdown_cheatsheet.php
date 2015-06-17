<?php
/*
Plugin Name: Markdown_Cheatsheet
Plugin URI: http://www.recodele.net
Description: For markdown beginner, able to check Markdown Cheatsheet in wordpress edit.php.
Version: 0.1.1
Author: recodele( Shohei Komori )
Author URI: http://www.recodele.net
License: GPL2  
*/


	add_action('admin_menu', 'markdown_cheatsheet_plugin_menu');
	
	function markdown_cheatsheet_plugin_menu() {
	  add_options_page('Markdown Cheatsheet Plugin Options', 'Markdown Cheatsheet', 8, __FILE__, 'markdown_cheatsheet_options_page');
	}

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
		$tag .= $tb . "\t\t\t" . '<li>line break = 2 spaces</li>' . "\n";
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
	
	
	// mt_options_page()はTest Optionsサブメニューのコンテンツを表示する。
	function markdown_cheatsheet_options_page() {
	
		// フィールドと設定項目名のための変数
		$opt_name = 'mc_display_page_type';
		$hidden_field_name = 'mc_submit_hidden';
		$data_field_name = 'mc_display_page_type';
		$tag = '';
		$tb = "";
		
		// データベースから既存の設定値を読み込む
		$opt_val = get_option( $opt_name );
		
		// ユーザが何かの情報を投稿したかどうかをチェックする
		// 投稿していれば、このhiddenフィールドの値は'Y'にセットされる
		if( $_POST[ $hidden_field_name ] == 'Y' ) {
			// 投稿された値を読む
			$opt_val = $_POST[ $data_field_name ];
			
			// データベースに値を設定する
			update_option( $opt_name, $opt_val );
			
			// 画面に更新されたことを伝えるメッセージを表示
			$tag .= $tb . "" . '<div class="updated"><p><strong>' . __('Options saved.', 'markdown_cheatsheet_trans_domain' ) . '</strong></p></div>' . "\n";
		}
		
		// 設定変更画面を表示する		
		$tag .= $tb . "" . '<div class="wrap">' . "\n";		
		$tag .= $tb . "\t" . '<h2>' . __( 'Markdown Cheatsheet Plugin Options', 'markdown_cheatsheet_trans_domain' ) . '</h2>' . "\n";
		
		// 設定用フォーム
		$tag .= $tb . "\t" . '<form name="form1" method="post" action="' . str_replace( '%7E', '~', $_SERVER['REQUEST_URI']) . '">' . "\n";
		$tag .= $tb . "\t\t" . '<input type="hidden" name="' . $hidden_field_name . '" value="Y">' . "\n";
		
		$tag .= $tb . "\t\t" . '<p>' . __("Favorite Color:", 'markdown_cheatsheet_trans_domain' ) . "\n";
		$tag .= $tb . "\t\t\t" . '<input type="checkbox" name="' . $data_field_name . '" value="' . $opt_val . '" size="20">' . "\n";
		$tag .= $tb . "\t\t" . '</p><hr />' . "\n";
		
		$tag .= $tb . "\t\t" . '<p class="submit">' . "\n";
		$tag .= $tb . "\t\t\t" . '<input type="submit" class="button button-primary" name="Submit" value="' . __('Update Options', 'markdown_cheatsheet_trans_domain' ) . '" />' . "\n";
		$tag .= $tb . "\t\t" . '</p>' . "\n";
		
		$tag .= $tb . "\t" . '</form>' . "\n";
		$tag .= $tb . "" . '</div>' . "\n";
		echo $tag;
	
	}

?>