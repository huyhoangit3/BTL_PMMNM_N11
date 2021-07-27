<?php

/** This file is part of KCFinder project
  *
  *      @desc Browser calling script
  *   @package KCFinder
  *   @version 2.51
  *    @author Pavel Tzonkov <pavelc@users.sourceforge.net>
  * @copyright 2010, 2011 KCFinder Project
  *   @license http://www.opensource.org/licenses/gpl-2.0.php GPLv2
  *   @license http://www.opensource.org/licenses/lgpl-2.1.php LGPLv2
  *      @link http://kcfinder.sunhater.com
  */

include('../../../app/config/global.php');
require "core/autoload.php";
$http = 'https://';
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
    $http = 'http://';
}
$root = $_SERVER['HTTP_HOST'];
$script = str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
$script = explode( '/', rtrim($script, '/') );
$root .= '/' . $script[1];
$cookie = $_COOKIE['cms_cookie_login_'.preg_replace('/[^a-zA-Z0-9]+/i', '', base64_encode($http.$_SERVER['HTTP_HOST'].'/'))];
$cookie = substr($cookie, 25);
$cookie = json_decode(base64_decode($cookie), TRUE);
if(!isset($cookie['username'])){ echo "Truy cap bi tu choi"; die; };
$browser = new browser();
$browser->action();

?>