<?php
/** @package    Ercco::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the RelGrupoPermissaoMenu object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Ercco::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class RelGrupoPermissaoMenuReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `rel_grupo_permissao_menu` table
	public $CustomFieldExample;

	public $RelGrupoPermissaoMenu;
	public $Permissao;
	public $Grupo;
	public $Menu;

	/*
	* GetCustomQuery returns a fully formed SQL statement.  The result columns
	* must match with the properties of this reporter object.
	*
	* @see Reporter::GetCustomQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomQuery($criteria)
	{
		$sql = "select
			'custom value here...' as CustomFieldExample
			,`rel_grupo_permissao_menu`.`id_rel_grupo_permissao_menu` as RelGrupoPermissaoMenu
			,`rel_grupo_permissao_menu`.`id_permissao` as Permissao
			,`rel_grupo_permissao_menu`.`id_grupo` as Grupo
			,`rel_grupo_permissao_menu`.`id_menu` as Menu
		from `rel_grupo_permissao_menu`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();
		$sql .= $criteria->GetOrder();

		return $sql;
	}
	
	/*
	* GetCustomCountQuery returns a fully formed SQL statement that will count
	* the results.  This query must return the correct number of results that
	* GetCustomQuery would, given the same criteria
	*
	* @see Reporter::GetCustomCountQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomCountQuery($criteria)
	{
		$sql = "select count(1) as counter from `rel_grupo_permissao_menu`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>