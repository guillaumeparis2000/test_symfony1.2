<?php

/**
 * contabilidad actions.
 *
 * @package    ofertix
 * @subpackage contabilidad
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class contabilidadActions extends sfActions
{
 /**
  * Executes Opcion1 action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }

 /**
  * Executes Opcion1 action
  *
  * @param sfRequest $request A request object
  */
  public function executeOpcion1(sfWebRequest $request)
  {
  }

 /**
  * Executes Opcion2 action
  *
  * @param sfRequest $request A request object
  */
  public function executeOpcion2(sfWebRequest $request)
  {
  }

 /**
  * Executes Opcion3 action
  *
  * @param sfRequest $request A request object
  */
  public function executeOpcion3(sfWebRequest $request)
  {
  }

 /**
  * Executes Opcion4 action
  *
  * @param sfRequest $request A request object
  */
  public function executeOpcion4(sfWebRequest $request)
  {
  }
}
