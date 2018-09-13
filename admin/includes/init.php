<?php 



defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define ('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].DS.'gallery');

defined('LIB_PATH') ? null : define ('LIB_PATH',SITE_ROOT.DS.'admin'.DS.'includes');


require_once(LIB_PATH.DS."functions.php");
require_once(LIB_PATH.DS."new_config.php");
require_once(LIB_PATH.DS."database.php");
require_once(LIB_PATH.DS."db_object.php");
require_once(LIB_PATH.DS."user.php");
require_once(LIB_PATH.DS."photo.php");
require_once(LIB_PATH.DS."session.php");
require_once(LIB_PATH.DS."comment.php");
require_once(LIB_PATH.DS."paginate.php");
require_once(LIB_PATH.DS."kategori.php");
//require_once("login.php");

 ?>