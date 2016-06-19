<?php
/** @package    Ercco::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * PermissaoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the PermissaoDAO to the permissao datastore.
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
class PermissaoMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdPermissao"] = new FieldMap("IdPermissao","permissao","id_permissao",true,FM_TYPE_INT,11,null,false);
			self::$FM["Visualizar"] = new FieldMap("Visualizar","permissao","visualizar",false,FM_TYPE_VARCHAR,20,null,false);
			self::$FM["Editar"] = new FieldMap("Editar","permissao","editar",false,FM_TYPE_VARCHAR,20,null,false);
			self::$FM["Criar"] = new FieldMap("Criar","permissao","criar",false,FM_TYPE_VARCHAR,20,null,false);
			self::$FM["Excluir"] = new FieldMap("Excluir","permissao","excluir",false,FM_TYPE_VARCHAR,20,null,false);
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
			self::$KM["fk_perm_rel_grp_per_menu"] = new KeyMap("fk_perm_rel_grp_per_menu", "IdPermissao", "RelGrupoPermissaoMenu", "Permissao", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
		}
		return self::$KM;
	}

}

?>