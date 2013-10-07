<?php

/**
 * UsersRights form base class.
 *
 * @package    ofertix
 * @subpackage form
 * @author     Your name here
 */
class BaseUsersRightsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'  => new sfWidgetFormInputHidden(),
      'right_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'user_id'  => new sfValidatorPropelChoice(array('model' => 'Rights', 'column' => 'id', 'required' => false)),
      'right_id' => new sfValidatorPropelChoice(array('model' => 'Users', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('users_rights[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UsersRights';
  }


}
