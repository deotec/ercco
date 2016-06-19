<?php
/** @package Ercco::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("RackMap.php");

/**
 * RackDAO provides object-oriented access to the rack table.  This
 * class is automatically generated by ClassBuilder.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the Model class which is extended from this DAO class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Ercco::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class RackDAO extends Phreezable
{
	/** @var int */
	public $IdRack;

	/** @var string */
	public $NumRack;

	/** @var string */
	public $Descricao;

	/** @var string */
	public $Patrimonio;


	/**
	 * Returns a dataset of Dispositivo objects with matching IdRack
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetIdDispositivos($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "fk_rack_dispositivo", $criteria);
	}


}
?>