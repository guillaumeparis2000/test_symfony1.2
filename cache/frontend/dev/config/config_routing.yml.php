<?php
// auto-generated by sfRoutingConfigHandler
// date: 2013/10/07 18:33:03
return array(
'contabilidad' => new sfRoute('/contabilidad', array (
  'module' => 'contabilidad',
  'action' => 'index',
), array (
), array (
)),
'contabilidad_opcion1' => new sfRoute('/contabilidad/opcion1', array (
  'module' => 'contabilidad',
  'action' => 'opcion1',
), array (
), array (
)),
'contabilidad_opcion2' => new sfRoute('/contabilidad/opcion2', array (
  'module' => 'contabilidad',
  'action' => 'opcion2',
), array (
), array (
)),
'contabilidad_opcion3' => new sfRoute('/contabilidad/opcion3', array (
  'module' => 'contabilidad',
  'action' => 'opcion3',
), array (
), array (
)),
'contabilidad_opcion4' => new sfRoute('/contabilidad/opcion4', array (
  'module' => 'contabilidad',
  'action' => 'opcion4',
), array (
), array (
)),
'produccion' => new sfRoute('/produccion', array (
  'module' => 'produccion',
  'action' => 'index',
), array (
), array (
)),
'produccion_opcion1' => new sfRoute('/produccion/opcion1', array (
  'module' => 'produccion',
  'action' => 'opcion1',
), array (
), array (
)),
'produccion_opcion2' => new sfRoute('/produccion/opcion2', array (
  'module' => 'produccion',
  'action' => 'opcion2',
), array (
), array (
)),
'produccion_opcion3' => new sfRoute('/produccion/opcion3', array (
  'module' => 'produccion',
  'action' => 'opcion3',
), array (
), array (
)),
'produccion_opcion4' => new sfRoute('/produccion/opcion4', array (
  'module' => 'produccion',
  'action' => 'opcion4',
), array (
), array (
)),
'comercial' => new sfRoute('/comercial', array (
  'module' => 'comercial',
  'action' => 'index',
), array (
), array (
)),
'comercial_opcion1' => new sfRoute('/comercial/opcion1', array (
  'module' => 'comercial',
  'action' => 'opcion1',
), array (
), array (
)),
'comercial_opcion2' => new sfRoute('/comercial/opcion2', array (
  'module' => 'comercial',
  'action' => 'opcion2',
), array (
), array (
)),
'comercial_opcion3' => new sfRoute('/comercial/opcion3', array (
  'module' => 'comercial',
  'action' => 'opcion3',
), array (
), array (
)),
'comercial_opcion4' => new sfRoute('/comercial/opcion4', array (
  'module' => 'comercial',
  'action' => 'opcion4',
), array (
), array (
)),
'callcenter' => new sfRoute('/callcenter', array (
  'module' => 'callcenter',
  'action' => 'index',
), array (
), array (
)),
'callcenter_opcion1' => new sfRoute('/callcenter/opcion1', array (
  'module' => 'callcenter',
  'action' => 'opcion1',
), array (
), array (
)),
'callcenter_opcion2' => new sfRoute('/callcenter/opcion2', array (
  'module' => 'callcenter',
  'action' => 'opcion2',
), array (
), array (
)),
'callcenter_opcion3' => new sfRoute('/callcenter/opcion3', array (
  'module' => 'callcenter',
  'action' => 'opcion3',
), array (
), array (
)),
'callcenter_opcion4' => new sfRoute('/callcenter/opcion4', array (
  'module' => 'callcenter',
  'action' => 'opcion4',
), array (
), array (
)),
'comun' => new sfRoute('/comun', array (
  'module' => 'comun',
  'action' => 'index',
), array (
), array (
)),
'comun_opcion1' => new sfRoute('/comun/opcion1', array (
  'module' => 'comun',
  'action' => 'opcion1',
), array (
), array (
)),
'comun_opcion2' => new sfRoute('/comun/opcion2', array (
  'module' => 'comun',
  'action' => 'opcion2',
), array (
), array (
)),
'comun_opcion3' => new sfRoute('/comun/opcion3', array (
  'module' => 'comun',
  'action' => 'opcion3',
), array (
), array (
)),
'comun_opcion4' => new sfRoute('/comun/opcion4', array (
  'module' => 'comun',
  'action' => 'opcion4',
), array (
), array (
)),
'sf_guard_signin' => new sfRoute('/login', array (
  'module' => 'sfGuardAuth',
  'action' => 'signin',
), array (
), array (
)),
'sf_guard_signout' => new sfRoute('/logout', array (
  'module' => 'sfGuardAuth',
  'action' => 'signout',
), array (
), array (
)),
'sf_guard_password' => new sfRoute('/request_password', array (
  'module' => 'sfGuardAuth',
  'action' => 'password',
), array (
), array (
)),
'homepage' => new sfRoute('/', array (
  'module' => 'content',
  'action' => 'index',
), array (
), array (
)),
'default_index' => new sfRoute('/:module', array (
  'action' => 'index',
), array (
), array (
)),
'default' => new sfRoute('/:module/:action/*', array (
), array (
), array (
)),
);
