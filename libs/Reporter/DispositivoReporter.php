<?php
/** @package    Ercco::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the Dispositivo object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Ercco::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class DispositivoReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `dispositivo` table
	public $CustomFieldExample;

	public $IdDispositivo;
	public $Descricao;
	public $Posicao;
	public $Nome;
	public $IdTipo;
	public $IdPlataforma;
	public $Patrimonio;
	public $Processador;
	public $Hd;
	public $Memoria;
	public $IdRack;
	public $IdPai;
	public $Fabricante;
	public $Modelo;

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
			,`dispositivo`.`id_dispositivo` as IdDispositivo
			,`dispositivo`.`descricao` as Descricao
			,`dispositivo`.`posicao` as Posicao
			,`dispositivo`.`nome` as Nome
			,`dispositivo`.`id_tipo` as IdTipo
			,`dispositivo`.`id_plataforma` as IdPlataforma
			,`dispositivo`.`patrimonio` as Patrimonio
			,`dispositivo`.`processador` as Processador
			,`dispositivo`.`hd` as Hd
			,`dispositivo`.`memoria` as Memoria
			,`dispositivo`.`id_rack` as IdRack
			,`dispositivo`.`id_pai` as IdPai
			,`dispositivo`.`fabricante` as Fabricante
			,`dispositivo`.`modelo` as Modelo
		from `dispositivo`";

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
		$sql = "select count(1) as counter from `dispositivo`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>