<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * UsersGroups filter form base class.
 *
 * @package    ofertix
 * @subpackage filter
 * @author     Your name here
 */
class BaseUsersGroupsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('users_groups_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UsersGroups';
  }

  public function getFields()
  {
    return array(
      'user_id'   => 'ForeignKey',
      'groups_id' => 'ForeignKey',
    );
  }
}
