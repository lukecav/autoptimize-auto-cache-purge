<?php
/**
 * Plugin Name:          Autoptimize Auto Cache Purge
 * Plugin URI:           https://github.com/lukecav/autoptimize-auto-cache-purge
 * Description:          Automatically clear Autoptimize cache if it goes beyond 2GB.
 * Version:              1.0.0
 * Author:               Luke Cavanagh
 * Author URI:           https://github.com/lukecav
 * License:              GPL2
 * License URI:          https://www.gnu.org/licenses/gpl-2.0.html
 *
 * WC requires at least: 3.0.0
 * WC tested up to:      3.3.3
 *
 * @package Autoptimize_Auto_Cache_Purge
 * @author  Luke Cavanagh
 */
 
// Automatically clear Autoptimize cache if it goes beyond 2GB
if (class_exists('autoptimizeCache')) {
    $myMaxSize = 2000000; # You may change this value to lower like 500000 for 500MB if you have limited server space
    $statArr=autoptimizeCache::stats(); 
    $cacheSize=round($statArr[1]/1024);
    
    if ($cacheSize>$myMaxSize){
       autoptimizeCache::clearall();
       header("Refresh:0"); # Refresh the page so that autoptimize can create new cache files and it does breaks the page after clearall.
    }
}
