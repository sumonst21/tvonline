<?php

/**
 * BaseCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $rank
 * @property string $name
 * @property string $description
 * @property string $image
 * @property string $active
 * @property Doctrine_Collection $Videos
 * 
 * @method integer             getId()          Returns the current record's "id" value
 * @method integer             getRank()        Returns the current record's "rank" value
 * @method string              getName()        Returns the current record's "name" value
 * @method string              getDescription() Returns the current record's "description" value
 * @method string              getImage()       Returns the current record's "image" value
 * @method string              getActive()      Returns the current record's "active" value
 * @method Doctrine_Collection getVideos()      Returns the current record's "Videos" collection
 * @method Category            setId()          Sets the current record's "id" value
 * @method Category            setRank()        Sets the current record's "rank" value
 * @method Category            setName()        Sets the current record's "name" value
 * @method Category            setDescription() Sets the current record's "description" value
 * @method Category            setImage()       Sets the current record's "image" value
 * @method Category            setActive()      Sets the current record's "active" value
 * @method Category            setVideos()      Sets the current record's "Videos" collection
 * 
 * @package    tvonline
 * @subpackage model
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCategory extends DoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('t_category');
        $this->hasColumn('id', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('rank', 'integer', 20, array(
             'type' => 'integer',
             'length' => 20,
             ));
        $this->hasColumn('name', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             'notnull' => true,
             ));
        $this->hasColumn('description', 'string', 5000, array(
             'type' => 'string',
             'length' => 5000,
             'notnull' => true,
             ));
        $this->hasColumn('image', 'string', 200, array(
             'type' => 'string',
             'length' => 200,
             'notnull' => false,
             ));
        $this->hasColumn('active', 'string', 1, array(
             'type' => 'string',
             'length' => 1,
             'fixed' => 1,
             'notnull' => true,
             'default' => 0,
             ));


        $this->index('i_active', array(
             'fields' => 
             array(
              0 => 'active',
             ),
             ));
        $this->option('symfony', array(
             'filter' => false,
             'form' => true,
             ));
        $this->option('boolean_columns', array(
             0 => 'active',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Video as Videos', array(
             'local' => 'id',
             'foreign' => 'category_id'));

        $nestedset0 = new Doctrine_Template_NestedSet(array(
             'hasManyRoots' => true,
             'rootColumnName' => 'root_id',
             ));
        $signable0 = new Doctrine_Template_Signable(array(
             'created' => 
             array(
              'name' => 'created_by',
              'type' => 'integer',
              'onUpdate' => 'CASCADE',
              'onDelete' => 'SET NULL',
              'options' => 
              array(
              'notnull' => true,
              'default' => 1,
              ),
             ),
             'updated' => 
             array(
              'name' => 'updated_by',
              'type' => 'string',
             ),
             ));
        $timestampable0 = new Doctrine_Template_Timestampable();
        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'name',
              1 => 'description',
             ),
             ));
        $this->actAs($nestedset0);
        $this->actAs($signable0);
        $this->actAs($timestampable0);
        $this->actAs($i18n0);
    }
}