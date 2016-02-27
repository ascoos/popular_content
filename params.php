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
* @ File No.          : 6 - $release: 1.0 - $revision: 0 - $build: 0
* @ Created Date      : 2012-07-01 20:00:00 UTC+2 
* @ Updated Date      : 
* @ Author            : Drogidis Christos
* @ Author email      : webmaster@alexsoft.gr
* @ Author website    : www.alexsoft.gr
*/

defined ("ALEXSOFT_RUN_CMS") or die("Prohibition of Access.");

global $ASCOOS, $apps_path;

require_once($apps_path."/articles/languages/".$ASCOOS['alang']->filename.".php");
$lngArticleTypes = new TArticleLanguage;

function getCategories()
{
	global $ASCOOS, $my, $objDatabase;

	$where = array();
	$where[] = "owner = 'articles'";
	$where[] = "groupid <= ".$my->groupid;
  	$where[] = "published=1";

	$query = "SELECT cat_id, title, access, groupid"
		. "\nFROM #__categories"
	   	. (count( $where ) ? "\nWHERE " . implode( ' AND ', $where ) : "")
		. "\nORDER BY cat_id ASC"
	;

	$objDatabase->setSQLQuery( $query );
	$rows = $objDatabase->getObjects();
	unset($where);

	$arr = array();
	foreach ($rows as $row)	$arr[$row->cat_id] = ascoos_langCorrectItem( $row->title, 'topic', true );

	unset($rows);
	return $arr;
}

$ASCOOS['extraParamFields']['ArticleTypes'] = $lngArticleTypes->article_types;
$cat = getCategories();
$ASCOOS['extraParamFields']['ArticleCategories'] = $cat;
$ASCOOS['extraParamFields']['ArticleExceptCategories'] = $cat;
?>