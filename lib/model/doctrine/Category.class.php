<?php

/**
 * Category
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    tvonline
 * @subpackage model
 * @author     David Joan Tataje Mendoza <new.skin007@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Category extends BaseCategory
{
  public function getSlug()
  {
  	return $this->getId();
  }
  
  public function getNameEs()
  {
  	return sprintf('%s',$this->Translation['es']->name);
  }

  public function getNameFull()
  {
  	return sprintf('<br/>es: %s<br/>en: %s',$this->Translation['es']->name,$this->Translation['en']->name);
  }
  
  public function getActiveStr()
  {
  	$actives = $this->getTable()->getStatuss();
  	return $actives[$this->getActive()];
  }
  
  public function getCategoryName()
  {
  	$id  = $this->getNode()->getParent()->getId();
  	//Deb::print_r_pre($id);
  	$obj = $this->getTable()->findOneById($id);
  	return $obj->getNameEs(); 
  }
  
  public function save(Doctrine_Connection $conn = null)
  {
    if($this->isNew())
    {
    	$this->setNewRank();
    }
    
    parent::save($conn);
  }
  
  public function setNewRank()
  {
  	$rank = $this->getTable()->getNewRank();
  	$this->setRank($rank);
  }
  
  public function getCategoryNames()
  {
  	if($this->getId() == 1)
  	{
  		return '-';
  	}
  	else
  	{
  	$id  = $this->getNode()->getParent()->getId();
  	
  	$obj = $this->getTable()->getPadre($id);
  	return $obj->getNameEs();
  	} 
  }
  
  public function getFormattedDatetime($format = 'D')
  {
    return $this->getTable()->getDateTimeFormatter()->format($this->getCreatedAt(), $format);
  }
  
}
