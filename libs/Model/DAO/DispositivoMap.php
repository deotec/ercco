<?php
/** @package    Ercco::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * DispositivoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the DispositivoDAO to the dispositivo datastore.
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
class DispositivoMap implements IDaoMap, IDaoMap2
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
			self::$FM["IdDispositivo"] = new FieldMap("IdDispositivo","dispositivo","id_dispositivo",true,FM_TYPE_INT,11,null,false);
			self::$FM["Descricao"] = new FieldMap("Descricao","dispositivo","descricao",false,FM_TYPE_VARCHAR,200,null,false);
			self::$FM["Posicao"] = new FieldMap("Posicao","dispositivo","posicao",false,FM_TYPE_VARCHAR,20,null,false);
			self::$FM["Nome"] = new FieldMap("Nome","dispositivo","nome",false,FM_TYPE_VARCHAR,20,null,false);
			self::$FM["IdTipo"] = new FieldMap("IdTipo","dispositivo","id_tipo",false,FM_TYPE_INT,11,null,false);
			self::$FM["IdPlataforma"] = new FieldMap("IdPlataforma","dispositivo","id_plataforma",false,FM_TYPE_INT,11,null,false);
			self::$FM["Patrimonio"] = new FieldMap("Patrimonio","dispositivo","patrimonio",false,FM_TYPE_VARCHAR,20,null,false);
			self::$FM["Processador"] = new FieldMap("Processador","dispositivo","processador",false,FM_TYPE_VARCHAR,20,null,false);
			self::$FM["Hd"] = new FieldMap("Hd","dispositivo","hd",false,FM_TYPE_VARCHAR,10,null,false);
			self::$FM["Memoria"] = new FieldMap("Memoria","dispositivo","memoria",false,FM_TYPE_VARCHAR,10,null,false);
			self::$FM["IdRack"] = new FieldMap("IdRack","dispositivo","id_rack",false,FM_TYPE_INT,11,null,false);
			self::$FM["IdPai"] = new FieldMap("IdPai","dispositivo","id_pai",false,FM_TYPE_INT,11,null,false);
			self::$FM["Fabricante"] = new FieldMap("Fabricante","dispositivo","fabricante",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Modelo"] = new FieldMap("Modelo","dispositivo","modelo",false,FM_TYPE_VARCHAR,50,null,false);
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
			self::$KM["rel_id_dipositivopai_dispositivofilho"] = new KeyMap("rel_id_dipositivopai_dispositivofilho", "IdDispositivo", "Dispositivo", "IdPai", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fk_plataforma_dispoistivo"] = new KeyMap("fk_plataforma_dispoistivo", "IdPlataforma", "Plataforma", "IdPlataforma", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_rack_dispositivo"] = new KeyMap("fk_rack_dispositivo", "IdRack", "Rack", "IdRack", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fk_tipo_dispositivo"] = new KeyMap("fk_tipo_dispositivo", "IdTipo", "Tipo", "IdTipo", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["rel_id_dipositivopai_dispositivofilho"] = new KeyMap("rel_id_dipositivopai_dispositivofilho", "IdPai", "Dispositivo", "IdDispositivo", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>