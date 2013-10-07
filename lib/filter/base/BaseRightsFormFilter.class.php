<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Rights filter form base class.
 *
 * @package    ofertix
 * @subpackage filter
 * @author     Your name here
 */
class BaseRightsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'              => new sfWidgetFormFilterInput(),
      'users_rights_list' => new sfWidgetFormPropelChoice(array('model' => 'Users', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'              => new sfValidatorPass(array('required' => false)),
      'users_rights_list' => new sfValidatorPropelChoice(array('model' => 'Users', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rights_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addUsersRightsListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(UsersRightsPeer::USER_ID, RightsPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(UsersRightsPeer::RIGHT_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(UsersRightsPeer::RIGHT_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Rights';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'name'              => 'Text',
      'users_rights_list' => 'ManyKey',
    );
  }
}
