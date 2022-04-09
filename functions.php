<?php 

require_once('lib/styles-and-scripts.php');
require_once('lib/theme-support.php');
require_once('lib/post-meta.php');      // Meta-Angaben Post-Header
require_once('lib/the-menus.php');      // The Menus
require_once('lib/the-sidebars.php');   // The Sidebars

if ( ! isset( $content_width ) ) $content_width = 1200;