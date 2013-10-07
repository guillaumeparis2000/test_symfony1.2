<?php

/**
 * UsersGroups form base class.
 *
 * @package    ofertix
 * @subpackage form
 * @author     Your name here
 */
class BaseUsersGroupsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'   => new sfWidgetFormInputHidden(),
      'groups_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'user_id'   => new sfValidatorPropelChoice(array('model' => 'Groups', 'column' => 'id', 'required' => false)),
      'groups_id' => new sfValidatorPropelChoice(array('model' => 'Users', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('users_groups[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UsersGroups';
  }


}
