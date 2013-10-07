<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Groups filter form base class.
 *
 * @package    ofertix
 * @subpackage filter
 * @author     Your name here
 */
class BaseGroupsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'              => new sfWidgetFormFilterInput(),
      'users_groups_list' => new sfWidgetFormPropelChoice(array('model' => 'Users', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'              => new sfValidatorPass(array('required' => false)),
      'users_groups_list' => new sfValidatorPropelChoice(array('model' => 'Users', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('groups_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addUsersGroupsListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(UsersGroupsPeer::USER_ID, GroupsPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(UsersGroupsPeer::GROUPS_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(UsersGroupsPeer::GROUPS_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Groups';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'name'              => 'Text',
      'users_groups_list' => 'ManyKey',
    );
  }
}
