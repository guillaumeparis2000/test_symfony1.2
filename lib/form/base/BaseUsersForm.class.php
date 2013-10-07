<?php

/**
 * Users form base class.
 *
 * @package    ofertix
 * @subpackage form
 * @author     Your name here
 */
class BaseUsersForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'name'              => new sfWidgetFormInput(),
      'login'             => new sfWidgetFormInput(),
      'password'          => new sfWidgetFormInput(),
      'users_groups_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Groups')),
      'users_rights_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Rights')),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'Users', 'column' => 'id', 'required' => false)),
      'name'              => new sfValidatorString(array('max_length' => 255)),
      'login'             => new sfValidatorString(array('max_length' => 255)),
      'password'          => new sfValidatorString(array('max_length' => 255)),
      'users_groups_list' => new sfValidatorPropelChoiceMany(array('model' => 'Groups', 'required' => false)),
      'users_rights_list' => new sfValidatorPropelChoiceMany(array('model' => 'Rights', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('users[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Users';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['users_groups_list']))
    {
      $values = array();
      foreach ($this->object->getUsersGroupss() as $obj)
      {
        $values[] = $obj->getUserId();
      }

      $this->setDefault('users_groups_list', $values);
    }

    if (isset($this->widgetSchema['users_rights_list']))
    {
      $values = array();
      foreach ($this->object->getUsersRightss() as $obj)
      {
        $values[] = $obj->getUserId();
      }

      $this->setDefault('users_rights_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveUsersGroupsList($con);
    $this->saveUsersRightsList($con);
  }

  public function saveUsersGroupsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['users_groups_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(UsersGroupsPeer::GROUPS_ID, $this->object->getPrimaryKey());
    UsersGroupsPeer::doDelete($c, $con);

    $values = $this->getValue('users_groups_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new UsersGroups();
        $obj->setGroupsId($this->object->getPrimaryKey());
        $obj->setUserId($value);
        $obj->save();
      }
    }
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
    $c->add(UsersRightsPeer::RIGHT_ID, $this->object->getPrimaryKey());
    UsersRightsPeer::doDelete($c, $con);

    $values = $this->getValue('users_rights_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new UsersRights();
        $obj->setRightId($this->object->getPrimaryKey());
        $obj->setUserId($value);
        $obj->save();
      }
    }
  }

}
