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

* @ Package           : ASCOOS CMS - Frontend
* @ Subpackage        : Block Manager - Popular Content 
* @ ASCOOS Version    : Lite - 1.0.0
* @ File Name         : /blocks/popular_content/index.php
* @ File No.          : 5 - $release: 1.0 - $revision: 0 - $build: 0
* @ Created Date      : 2012-07-01 20:00:00 UTC+2 
* @ Updated Date      : 
* @ Author            : Drogidis Christos
* @ Author email      : webmaster@alexsoft.gr
* @ Author website    : www.alexsoft.gr
*/

defined ("ALEXSOFT_RUN_CMS") or die("Prohibition of Access.");

global $cms_site, $objDatabase, $ASCOOS, $my, $objDual;

// Get Value Block Parameters
$count 			= $block->getParam('int', 'count', 5 );
$all_lang		= $block->getParam('bool', 'all_lang', false );
$show_hits		= $block->getParam('bool', 'show_hits', false );
$type 			= $block->getParam('lstr', 'type', '');
$cat_ids 		= $block->getParam('lstr', 'cat_ids', '' );
$except_cat_ids = $block->getParam('lstr', 'except_cat_ids', '' );
$theme		 	= $block->getParam('lstr', 'theme', 'default' );

// load Block Theme
$block->loadTheme($theme);

$where = array();

if (!$all_lang) $where[] = "a.lang_id = ".$ASCOOS['lang']->id;
if ($type != '') $where[] = "a.type IN (".$type.")";
if ($cat_ids != '') $where[] = "a.cat_id IN (".$cat_ids.")";
if ($except_cat_ids != '') $where[] = "a.cat_id NOT IN (".$except_cat_ids.")";
$where[] = "a.published=1";
$where[] = "a.groupid <= ".$my->groupid;

$query = "SELECT a.id, a.article_id, a.title, a.lang_id, a.cat_id, a.created, a.hits, a.access, a.groupid, l.domain AS flag"
	. "\nFROM #__articles AS a"
	. "\n LEFT JOIN #__languages AS l ON l.id = a.lang_id"
	. (count( $where ) ? "\nWHERE " . implode( ' AND ', $where ) : "")
	. "\nORDER BY a.hits DESC"
	. "\nLIMIT ".$count;
$objDatabase->setSQLQuery( $query );
$rows = $objDatabase->getObjects();

unset($where);

if (count($rows)) {
	$text = '';
	$text .= "<div class=\"block-popular-content-".$theme."\">";
	if ($block->getVar('show_title')) { 
		$text .= "<div class=\"header\"><h3>".$block->getTitle()."</h3></div><div class=\"clear\"></div>";
	}
	$text .= "<div class=\"text\"><div class=\"table\">";
	foreach ( $rows as $row ) { 
		// If you do not have the user permissions to read the article $row, then dodging article.
		if (!$objDual->checkAccess($row)) {
			continue;
		} else { // .... else view article link
	       	$text .= "<div class=\"row\">";
			if ($all_lang) $text .= "<div class=\"cell\"><img src=\"".$cms_site."/images/kernel/flags/".$row->flag.".png\" alt=\"".$row->title."\" border=\"0\" /></div>";
    		$text .= "<div class=\"cell\"><a href=\"".asc2seo('index.php?p=articles&amp;t=view&amp;id='.$row->article_id)."\">".$row->title."</a></div>";
			if ($show_hits) $text .= "<div class=\"cell right\">".$row->hits."</div>";
    	    $text .= "</div>";
		}
    }
    $text .= "</div></div></div>";
	echo $text;
	unset($text);
	unset($rows);
}
?>