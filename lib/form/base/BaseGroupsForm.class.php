<?php

/**
 * Groups form base class.
 *
 * @package    ofertix
 * @subpackage form
 * @author     Your name here
 */
class BaseGroupsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'name'              => new sfWidgetFormInput(),
      'users_groups_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'Users')),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'Groups', 'column' => 'id', 'required' => false)),
      'name'              => new sfValidatorString(array('max_length' => 255)),
      'users_groups_list' => new sfValidatorPropelChoiceMany(array('model' => 'Users', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('groups[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Groups';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['users_groups_list']))
    {
      $values = array();
      foreach ($this->object->getUsersGroupss() as $obj)
      {
        $values[] = $obj->getGroupsId();
      }

      $this->setDefault('users_groups_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveUsersGroupsList($con);
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
    $c->add(UsersGroupsPeer::USER_ID, $this->object->getPrimaryKey());
    UsersGroupsPeer::doDelete($c, $con);

    $values = $this->getValue('users_groups_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new UsersGroups();
        $obj->setUserId($this->object->getPrimaryKey());
        $obj->setGroupsId($value);
        $obj->save();
      }
    }
  }

}
