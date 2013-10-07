<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Users filter form base class.
 *
 * @package    ofertix
 * @subpackage filter
 * @author     Your name here
 */
class BaseUsersFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'              => new sfWidgetFormFilterInput(),
      'login'             => new sfWidgetFormFilterInput(),
      'password'          => new sfWidgetFormFilterInput(),
      'users_groups_list' => new sfWidgetFormPropelChoice(array('model' => 'Groups', 'add_empty' => true)),
      'users_rights_list' => new sfWidgetFormPropelChoice(array('model' => 'Rights', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'              => new sfValidatorPass(array('required' => false)),
      'login'             => new sfValidatorPass(array('required' => false)),
      'password'          => new sfValidatorPass(array('required' => false)),
      'users_groups_list' => new sfValidatorPropelChoice(array('model' => 'Groups', 'required' => false)),
      'users_rights_list' => new sfValidatorPropelChoice(array('model' => 'Rights', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('users_filters[%s]');

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

    $criteria->addJoin(UsersGroupsPeer::GROUPS_ID, UsersPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(UsersGroupsPeer::USER_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(UsersGroupsPeer::USER_ID, $value));
    }

    $criteria->add($criterion);
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

    $criteria->addJoin(UsersRightsPeer::RIGHT_ID, UsersPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(UsersRightsPeer::USER_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(UsersRightsPeer::USER_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Users';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'name'              => 'Text',
      'login'             => 'Text',
      'password'          => 'Text',
      'users_groups_list' => 'ManyKey',
      'users_rights_list' => 'ManyKey',
    );
  }
}
