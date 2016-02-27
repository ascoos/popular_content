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
* @ File Name         : /blocks/popular_content/install.php
* @ File No.          : 1 - $release: 1.0 - $revision: 0 - $build: 0
* @ Created Date      : 2012-07-01 20:00:00 UTC+2 
* @ Updated Date      : 
* @ Author            : Drogidis Christos
* @ Author email      : webmaster@alexsoft.gr
* @ Author website    : www.alexsoft.gr
*/

defined ("ALEXSOFT_RUN_CMS") or die("Prohibition of Access.");

global $objInstaller;

// Adjust the installer to work at BLOCK and give the block that will handle
$objInstaller->setExtension('popular_content');

// We adjust the installer so that after installation, to take us or not part of the Block configuration.
$objInstaller->afterSetParams(false);

// If the block is not installed then run the installation.
if (!$objInstaller->isInstalled()) {
	// We create the path of the Block.
	$objInstaller->createPath();
	
	// If the installation files on the Server is successful
	if ( $objInstaller->extractPackage() )
	{
		// We export themes in internal path "fronts". !!!! Not Change for Blocks. !!!!
		$objInstaller->extractThemes('fronts');
		
		// We take the position id, show called "NOTHING".
		$block_pos = $objInstaller->getPosition('NOTHING');

		// We take the sort that will apply to the position.
		$block_order = $objInstaller->getOrderPosition('NOTHING');
	
		// Place the Block in the database.
		$objInstaller->addSQL("INSERT INTO #__blocks VALUES(NULL, '".$objInstaller->name."', '".$objInstaller->name."', '0', '0', '{\"en\":\"Popular\",\"el\":\"Δημοφιλέστερα\"}', '', '', '', '', ".$block_pos.", ".$block_order.", '', '0', '0', '0', '0', '{\"count\":5,\"all_lang\":0,\"show_hits\":1,\"theme\":\"cleargray\",\"type\":1}');");
		
		// pour the settings from the installer.
		$objInstaller->clear();
		
	} else {
		// else otherwise cancel the installation and pour the settings from the installer.
		$objInstaller->cancelInstallation();
	}
} else { // else pour the settings from the installer.
	$objInstaller->clear();
}
?>