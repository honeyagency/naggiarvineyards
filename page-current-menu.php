<?php 
$currentMenu = get_field('current_menu');
wp_redirect( $currentMenu, 301 ); exit; ?>