<?php

/**
 * Rights form base class.
 *
 * @package    ofertix
 * @subpackage form
 * @author     Your name here
 */
class BaseRightsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'name'              => new sfWidgetFormInput(),
      'users_rights_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Users')),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'Rights', 'column' => 'id', 'required' => false)),
      'name'              => new sfValidatorString(array('max_length' => 255)),
      'users_rights_list' => new sfValidatorPropelChoiceMany(array('model' => 'Users', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rights[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Rights';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['users_rights_list']))
    {
      $values = array();
      foreach ($this->object->getUsersRightss() as $obj)
      {
        $values[] = $obj->getRightId();
      }

      $this->setDefault('users_rights_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveUsersRightsList($con);
  }

  public function saveUsersRightsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['users_rights_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(UsersRightsPeer::USER_ID, $this->object->getPrimaryKey());
    UsersRightsPeer::doDelete($c, $con);

    $values = $this->getValue('users_rights_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new UsersRights();
        $obj->setUserId($this->object->getPrimaryKey());
        $obj->setRightId($value);
        $obj->save();
      }
    }
  }

}
