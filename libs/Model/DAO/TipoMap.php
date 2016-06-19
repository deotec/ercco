<?php
/** @package    Ercco::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * TipoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the TipoDAO to the tipo datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Ercco::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class TipoMap implements IDaoMap, IDaoMap2
{

	private static $KM;
	private static $FM;
	
	/**
	 * {@inheritdoc}
	 */
	public static function AddMap($property,FieldMap $map)
	{
		self::GetFieldMaps();
		self::$FM[$property] = $map;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public static function SetFetchingStrategy($property,$loadType)
	{
		self::GetKeyMaps();
		self::$KM[$property]->LoadType = $loadType;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetFieldMaps()
	{
		if (self::$FM == null)
		{
			self::$FM = Array();
			self::$FM["IdTipo"] = new FieldMap("IdTipo","tipo","id_tipo",true,FM_TYPE_INT,11,null,false);
			self::$FM["Nome"] = new FieldMap("Nome","tipo","nome",false,FM_TYPE_VARCHAR,40,null,false);
			self::$FM["NomeVm"] = new FieldMap("NomeVm","tipo","nome_vm",false,FM_TYPE_VARCHAR,40,null,false);
		}
		return self::$FM;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetKeyMaps()
	{
		if (self::$KM == null)
		{
			self::$KM = Array();
			self::$KM["fk_tipo_dispositivo"] = new KeyMap("fk_tipo_dispositivo", "IdTipo", "Dispositivo", "IdTipo", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
		}
		return self::$KM;
	}

}

?>