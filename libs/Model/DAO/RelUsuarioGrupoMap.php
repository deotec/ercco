<?php
/** @package    Ercco::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * RelUsuarioGrupoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the RelUsuarioGrupoDAO to the rel_usuario_grupo datastore.
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
class RelUsuarioGrupoMap implements IDaoMap, IDaoMap2
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
			self::$FM["RelUsuarioGrupo"] = new FieldMap("RelUsuarioGrupo","rel_usuario_grupo","id_rel_usuario_grupo",true,FM_TYPE_INT,11,null,false);
			self::$FM["Usuario"] = new FieldMap("Usuario","rel_usuario_grupo","id_usuario",false,FM_TYPE_INT,11,null,false);
			self::$FM["Grupo"] = new FieldMap("Grupo","rel_usuario_grupo","id_grupo",false,FM_TYPE_INT,11,null,false);
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
			self::$KM["FK_grupo_rel_usuario_grupo"] = new KeyMap("FK_grupo_rel_usuario_grupo", "Grupo", "Grupo", "IdGrupo", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["FK_usuario_rel_usuario_grupo"] = new KeyMap("FK_usuario_rel_usuario_grupo", "Usuario", "Usuario", "IdUsuario", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>