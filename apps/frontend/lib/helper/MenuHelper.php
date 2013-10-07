<?php

function get_menu($user) {
  $arr = sfConfig::get('app_menus_frontend_menu');
  $menu = ioMenuItem::createFromArray($arr);
  return $menu->render();
}
?>
