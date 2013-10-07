<?php

function get_menu($user) {
  $menu = new ioMenuItem('My menu');
  $menu->addChild('home', '@homepage');
  $menu->addChild('login', '@sf_guard_signin');
  $menu->addChild('logout', '@sf_guard_signout');

  if ($user->isAuthenticated()) {
    if ($user->hasCredential('contabilidad')) {
        $menu->addChild('contabilidad', '@contabilidad');

        if ($user->hasCredential('impares')) {
          $menu['contabilidad']->addChild('option1', '@contabilidad_opcion1');
        }
        if ($user->hasCredential('pares')) {
          $menu['contabilidad']->addChild('option2', '@contabilidad_opcion2');
        }
        if ($user->hasCredential('impares')) {
          $menu['contabilidad']->addChild('option3', '@contabilidad_opcion3');
        }
        if ($user->hasCredential('pares')) {
          $menu['contabilidad']->addChild('option4', '@contabilidad_opcion4');
        }
    }

    if ($user->hasCredential('produccion')) {
      $menu->addChild('produccion', '@produccion');

      if ($user->hasCredential('impares')) {
        $menu['produccion']->addChild('option1', '@produccion_opcion1');
      }
      if ($user->hasCredential('pares')) {
        $menu['produccion']->addChild('option2', '@produccion_opcion2');
      }
      if ($user->hasCredential('impares')) {
        $menu['produccion']->addChild('option3', '@produccion_opcion3');
      }
      if ($user->hasCredential('pares')) {
        $menu['produccion']->addChild('option4', '@produccion_opcion4');
      }
    }

    if ($user->hasCredential('comercial')) {
      $menu->addChild('comercial', '@comercial');

      if ($user->hasCredential('impares')) {
        $menu['comercial']->addChild('option1', '@comercial_opcion1');
      }
      if ($user->hasCredential('pares')) {
        $menu['comercial']->addChild('option2', '@comercial_opcion2');
      }
      if ($user->hasCredential('impares')) {
        $menu['comercial']->addChild('option3', '@comercial_opcion3');
      }
      if ($user->hasCredential('pares')) {
        $menu['comercial']->addChild('option4', '@comercial_opcion4');
      }
    }

    if ($user->hasCredential('callcenter')) {
      $menu->addChild('callcenter', '@callcenter');
      if ($user->hasCredential('impares')) {
        $menu['callcenter']->addChild('option1', '@callcenter_opcion1');
      }
      if ($user->hasCredential('pares')) {
        $menu['callcenter']->addChild('option2', '@callcenter_opcion2');
      }
      if ($user->hasCredential('impares')) {
        $menu['callcenter']->addChild('option3', '@callcenter_opcion3');
      }
      if ($user->hasCredential('pares')) {
        $menu['callcenter']->addChild('option4', '@callcenter_opcion4');
      }
    }
  }


  $menu->addChild('comun', '@comun');
  if ($user->hasCredential('impares')) {
    $menu['comun']->addChild('option1', '@comun_opcion1');
  }
  if ($user->hasCredential('pares')) {
    $menu['comun']->addChild('option2', '@comun_opcion2');
  }
  if ($user->hasCredential('impares')) {
    $menu['comun']->addChild('option3', '@comun_opcion3');
  }
  if ($user->hasCredential('pares')) {
    $menu['comun']->addChild('option4', '@comun_opcion4');
  }


  return $menu->render();
}
?>
