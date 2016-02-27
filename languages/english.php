<?php
/*
  __ _  ___  ___ ___   ___   ___     ____ _ __ ___   ___
 / _` |/  / / __/ _ \ / _ \ /  /    / __/| '_ ` _ \ /  /
| (_| |\  \| (_| (_) | (_) |\  \   | (__ | | | | | |\  \
 \__,_|/__/ \___\___/ \___/ /__/    \___\|_| |_| |_|/__/
                                                                  
*************************************************************************************
* @ Project ASCOOS                                                                  *
* @ Copyright (C) 2007 - 2012 AlexSoft Software.                                    *
* @ Address: Konstantinoupoleos 88, GR 68100, Alexandroupolis, Evros, Greece        *
* @ Tel: +30 2551 031999                                                            *
* @ Creator: Drogidis Christos                                                      *
* @ ASCOOS CMS Site: www.ascoos.com                                                 *
* @ Creator Site: www.alexsoft.gr                                                   *
* @ emails: webmaster@ascoos.com, webmaster@alexsoft.gr                             *
* @ license site: http://www.alexsoft.gr/licence/ascoos/index.php                   *
* @ Copyrighted Commercial Software                                                 *
* @ Program ASCOOS CMS Manager                                                      *
*************************************************************************************

* @ Package            : ASCOOS CMS - Frontend
* @ Subpackage         : Block Manager - Popular Contents 
* @ ASCOOS Version     : Lite - 1.0.0
* @ File Name          : /blocks/popular_conent/languages/greek.php
* @ File No.           : 7 - $release: 1.0 - $revision: 0 - $build: 0
* @ Created Date       : 2012-07-01 20:00:00 UTC+2 
* @ Updated Date       : 
* @ Author             : Drogidis Christos
* @ Author email       : webmaster@alexsoft.gr
* @ Author website     : www.alexsoft.gr
* @ Translator         : Kourtidis George
* @ Translator email   : 
* @ Translator website : 
* @ Translate Date     : 2012-07-01 20:00:00 UTC+2 
*/

defined ("ALEXSOFT_RUN_CMS") or die("Prohibition of Access.");

class TBlock_popular_content_Language extends TObject
{
	public $blockname = "Popular Content";

	public $APL_license = "Ascoos General License (AGL)";
	public $APL_author = "DROGIDIS CHRISTOS";
	public $APL_creation = "";
	public $APL_copyright = "ALEXSOFT SOFTWARE";
	public $APL_translator = "KOURTIDIS GEORGE";
	public $APL_translatorEmail = "";
	public $APL_translatorUrl = "";
	public $APL_desc = "Displays a box with the most popular site contents.";

	public $APL_paramgroup_general_label = "▼ &nbsp; General Configuration Options";
	public $APL_paramgroup_general_label_info = "<strong>GENERAL OPTIONS PARAMETERS</strong><br />--------------------------------------<br /><br />In this context you can choose from several general parameters and dynamically configure the block";
	public $APL_paramgroup_categories_label = "▼ &nbsp; Options Classes";
	public $APL_paramgroup_categories_label_info = "<strong>CHOICES OF CATEGORIES</strong><br />--------------------------------------<br /><br />In this frame you can shape the parameters of origin of content of block";
	public $APL_count_label = "Number of articles";
	public $APL_count_desc = "<strong>NUMBER OF ARTICLES</strong><br />--------------------------------------<br /><br />Here you must select the number of articles that will appear";
	public $APL_all_lang_label = "Showing regardless of language";
	public $APL_all_lang_desc = "<strong>APPEARANCE INDEPENDENT BY LANGUAGE OF SYNTAX</strong><br />--------------------------------------<br /><br />Want to include all articles, independent from the language that was drawn up?<br /><br />This will result to display all articles regardless of language syntax.<br /><br />For more information, on the left, will display a flag to specify the language syntax.";
	public $APL_show_hits_label = "Appearance of Projections";
	public $APL_show_hits_desc = "<strong>APPEARANCE OF PROJECTIONS</strong><br />--------------------------------------<br /><br />Want to presented the column with the total projections of content?";
	public $APL_theme_label = "Theme of appearance of Block";
	public $APL_theme_placeholder = "Select theme of appearance of block";
	public $APL_theme_desc = "<strong>THEME OF APPEARANCE OF BLOCK</strong><br />--------------------------------------<br /><br />Select the theme that will be implemented block &laquo;%s&raquo;.<br /><br />Each block has at least a predetermined theme, called &laquo;Default&raquo;";
	
	public $APL_type_label = "Types of Articles";
	public $APL_type_placeholder = "Select types of articles";
	public $APL_type_desc = "<strong>TYPES OF ARTICLES</strong><br />--------------------------------------<br /><br />What types of articles you want included? This will result in the appearance only of the articles are as a type of defined.";
	public $APL_cat_ids_label = "Categories that will be included";
	public $APL_cat_ids_placeholder = "Select Categories Articles";
	public $APL_cat_ids_desc = "<strong>CATEGORIES THAT WILL BE INCLUDED</strong><br />--------------------------------------<br /><br />Which categories do you want to include?<br /><br />This will result in only the articles have one of these categories appear in the list of recent articles.";
	public $APL_except_cat_ids_label = "Categories to be excluded";
	public $APL_except_cat_ids_placeholder = "Select article categories";
	public $APL_except_cat_ids_desc = "<strong>CATEGORIES TO BE EXCLUDED</strong><br />--------------------------------------<br /><br />Which categories you want to exclude?<br /><br />This will lead to sidestep all the articles belong to these categories.<br /><br />This choice reverses the category from the above parameter (included categories), if it is also given in this.";
}
?>