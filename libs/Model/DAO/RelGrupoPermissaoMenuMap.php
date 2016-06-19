<?php
/** @package    Ercco::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * RelGrupoPermissaoMenuMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the RelGrupoPermissaoMenuDAO to the rel_grupo_permissao_menu datastore.
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
class RelGrupoPermissaoMenuMap implements IDaoMap, IDaoMap2
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
			self::$FM["RelGrupoPermissaoMenu"] = new FieldMap("RelGrupoPermissaoMenu","rel_grupo_permissao_menu","id_rel_grupo_permissao_menu",true,FM_TYPE_CHAR,18,null,false);
			self::$FM["Permissao"] = new FieldMap("Permissao","rel_grupo_permissao_menu","id_permissao",false,FM_TYPE_INT,11,null,false);
			self::$FM["Grupo"] = new FieldMap("Grupo","rel_grupo_permissao_menu","id_grupo",false,FM_TYPE_INT,11,null,false);
			self::$FM["Menu"] = new FieldMap("Menu","rel_grupo_permissao_menu","id_menu",false,FM_TYPE_INT,11,null,false);
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
			self::$KM["fk_grp_rel_grp_per_menu"] = new KeyMap("fk_grp_rel_grp_per_menu", "Grupo", "Grupo", "IdGrupo", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_menu_rel_grp_per_menu"] = new KeyMap("fk_menu_rel_grp_per_menu", "Menu", "Menu", "IdMenu", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_perm_rel_grp_per_menu"] = new KeyMap("fk_perm_rel_grp_per_menu", "Permissao", "Permissao", "IdPermissao", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>