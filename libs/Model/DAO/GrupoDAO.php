<?php
/** @package Ercco::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("GrupoMap.php");

/**
 * GrupoDAO provides object-oriented access to the grupo table.  This
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
class GrupoDAO extends Phreezable
{
	/** @var int */
	public $IdGrupo;

	/** @var string */
	public $Nome;


	/**
	 * Returns a dataset of RelGrupoPermissaoMenu objects with matching Grupo
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetRelGrupoPermissaoMenus($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "fk_grp_rel_grp_per_menu", $criteria);
	}

	/**
	 * Returns a dataset of RelUsuarioGrupo objects with matching Grupo
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetRelUsuarioGrupos($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "FK_grupo_rel_usuario_grupo", $criteria);
	}


}
?>