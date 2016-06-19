<?php
/** @package    Ercco::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * DispositivoCriteria allows custom querying for the Dispositivo object.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the ModelCriteria class which is extended from this class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @inheritdocs
 * @package Ercco::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class DispositivoCriteriaDAO extends Criteria
{

	public $IdDispositivo_Equals;
	public $IdDispositivo_NotEquals;
	public $IdDispositivo_IsLike;
	public $IdDispositivo_IsNotLike;
	public $IdDispositivo_BeginsWith;
	public $IdDispositivo_EndsWith;
	public $IdDispositivo_GreaterThan;
	public $IdDispositivo_GreaterThanOrEqual;
	public $IdDispositivo_LessThan;
	public $IdDispositivo_LessThanOrEqual;
	public $IdDispositivo_In;
	public $IdDispositivo_IsNotEmpty;
	public $IdDispositivo_IsEmpty;
	public $IdDispositivo_BitwiseOr;
	public $IdDispositivo_BitwiseAnd;
	public $Descricao_Equals;
	public $Descricao_NotEquals;
	public $Descricao_IsLike;
	public $Descricao_IsNotLike;
	public $Descricao_BeginsWith;
	public $Descricao_EndsWith;
	public $Descricao_GreaterThan;
	public $Descricao_GreaterThanOrEqual;
	public $Descricao_LessThan;
	public $Descricao_LessThanOrEqual;
	public $Descricao_In;
	public $Descricao_IsNotEmpty;
	public $Descricao_IsEmpty;
	public $Descricao_BitwiseOr;
	public $Descricao_BitwiseAnd;
	public $Posicao_Equals;
	public $Posicao_NotEquals;
	public $Posicao_IsLike;
	public $Posicao_IsNotLike;
	public $Posicao_BeginsWith;
	public $Posicao_EndsWith;
	public $Posicao_GreaterThan;
	public $Posicao_GreaterThanOrEqual;
	public $Posicao_LessThan;
	public $Posicao_LessThanOrEqual;
	public $Posicao_In;
	public $Posicao_IsNotEmpty;
	public $Posicao_IsEmpty;
	public $Posicao_BitwiseOr;
	public $Posicao_BitwiseAnd;
	public $Nome_Equals;
	public $Nome_NotEquals;
	public $Nome_IsLike;
	public $Nome_IsNotLike;
	public $Nome_BeginsWith;
	public $Nome_EndsWith;
	public $Nome_GreaterThan;
	public $Nome_GreaterThanOrEqual;
	public $Nome_LessThan;
	public $Nome_LessThanOrEqual;
	public $Nome_In;
	public $Nome_IsNotEmpty;
	public $Nome_IsEmpty;
	public $Nome_BitwiseOr;
	public $Nome_BitwiseAnd;
	public $IdTipo_Equals;
	public $IdTipo_NotEquals;
	public $IdTipo_IsLike;
	public $IdTipo_IsNotLike;
	public $IdTipo_BeginsWith;
	public $IdTipo_EndsWith;
	public $IdTipo_GreaterThan;
	public $IdTipo_GreaterThanOrEqual;
	public $IdTipo_LessThan;
	public $IdTipo_LessThanOrEqual;
	public $IdTipo_In;
	public $IdTipo_IsNotEmpty;
	public $IdTipo_IsEmpty;
	public $IdTipo_BitwiseOr;
	public $IdTipo_BitwiseAnd;
	public $IdPlataforma_Equals;
	public $IdPlataforma_NotEquals;
	public $IdPlataforma_IsLike;
	public $IdPlataforma_IsNotLike;
	public $IdPlataforma_BeginsWith;
	public $IdPlataforma_EndsWith;
	public $IdPlataforma_GreaterThan;
	public $IdPlataforma_GreaterThanOrEqual;
	public $IdPlataforma_LessThan;
	public $IdPlataforma_LessThanOrEqual;
	public $IdPlataforma_In;
	public $IdPlataforma_IsNotEmpty;
	public $IdPlataforma_IsEmpty;
	public $IdPlataforma_BitwiseOr;
	public $IdPlataforma_BitwiseAnd;
	public $Patrimonio_Equals;
	public $Patrimonio_NotEquals;
	public $Patrimonio_IsLike;
	public $Patrimonio_IsNotLike;
	public $Patrimonio_BeginsWith;
	public $Patrimonio_EndsWith;
	public $Patrimonio_GreaterThan;
	public $Patrimonio_GreaterThanOrEqual;
	public $Patrimonio_LessThan;
	public $Patrimonio_LessThanOrEqual;
	public $Patrimonio_In;
	public $Patrimonio_IsNotEmpty;
	public $Patrimonio_IsEmpty;
	public $Patrimonio_BitwiseOr;
	public $Patrimonio_BitwiseAnd;
	public $Processador_Equals;
	public $Processador_NotEquals;
	public $Processador_IsLike;
	public $Processador_IsNotLike;
	public $Processador_BeginsWith;
	public $Processador_EndsWith;
	public $Processador_GreaterThan;
	public $Processador_GreaterThanOrEqual;
	public $Processador_LessThan;
	public $Processador_LessThanOrEqual;
	public $Processador_In;
	public $Processador_IsNotEmpty;
	public $Processador_IsEmpty;
	public $Processador_BitwiseOr;
	public $Processador_BitwiseAnd;
	public $Hd_Equals;
	public $Hd_NotEquals;
	public $Hd_IsLike;
	public $Hd_IsNotLike;
	public $Hd_BeginsWith;
	public $Hd_EndsWith;
	public $Hd_GreaterThan;
	public $Hd_GreaterThanOrEqual;
	public $Hd_LessThan;
	public $Hd_LessThanOrEqual;
	public $Hd_In;
	public $Hd_IsNotEmpty;
	public $Hd_IsEmpty;
	public $Hd_BitwiseOr;
	public $Hd_BitwiseAnd;
	public $Memoria_Equals;
	public $Memoria_NotEquals;
	public $Memoria_IsLike;
	public $Memoria_IsNotLike;
	public $Memoria_BeginsWith;
	public $Memoria_EndsWith;
	public $Memoria_GreaterThan;
	public $Memoria_GreaterThanOrEqual;
	public $Memoria_LessThan;
	public $Memoria_LessThanOrEqual;
	public $Memoria_In;
	public $Memoria_IsNotEmpty;
	public $Memoria_IsEmpty;
	public $Memoria_BitwiseOr;
	public $Memoria_BitwiseAnd;
	public $IdRack_Equals;
	public $IdRack_NotEquals;
	public $IdRack_IsLike;
	public $IdRack_IsNotLike;
	public $IdRack_BeginsWith;
	public $IdRack_EndsWith;
	public $IdRack_GreaterThan;
	public $IdRack_GreaterThanOrEqual;
	public $IdRack_LessThan;
	public $IdRack_LessThanOrEqual;
	public $IdRack_In;
	public $IdRack_IsNotEmpty;
	public $IdRack_IsEmpty;
	public $IdRack_BitwiseOr;
	public $IdRack_BitwiseAnd;
	public $IdPai_Equals;
	public $IdPai_NotEquals;
	public $IdPai_IsLike;
	public $IdPai_IsNotLike;
	public $IdPai_BeginsWith;
	public $IdPai_EndsWith;
	public $IdPai_GreaterThan;
	public $IdPai_GreaterThanOrEqual;
	public $IdPai_LessThan;
	public $IdPai_LessThanOrEqual;
	public $IdPai_In;
	public $IdPai_IsNotEmpty;
	public $IdPai_IsEmpty;
	public $IdPai_BitwiseOr;
	public $IdPai_BitwiseAnd;
	public $Fabricante_Equals;
	public $Fabricante_NotEquals;
	public $Fabricante_IsLike;
	public $Fabricante_IsNotLike;
	public $Fabricante_BeginsWith;
	public $Fabricante_EndsWith;
	public $Fabricante_GreaterThan;
	public $Fabricante_GreaterThanOrEqual;
	public $Fabricante_LessThan;
	public $Fabricante_LessThanOrEqual;
	public $Fabricante_In;
	public $Fabricante_IsNotEmpty;
	public $Fabricante_IsEmpty;
	public $Fabricante_BitwiseOr;
	public $Fabricante_BitwiseAnd;
	public $Modelo_Equals;
	public $Modelo_NotEquals;
	public $Modelo_IsLike;
	public $Modelo_IsNotLike;
	public $Modelo_BeginsWith;
	public $Modelo_EndsWith;
	public $Modelo_GreaterThan;
	public $Modelo_GreaterThanOrEqual;
	public $Modelo_LessThan;
	public $Modelo_LessThanOrEqual;
	public $Modelo_In;
	public $Modelo_IsNotEmpty;
	public $Modelo_IsEmpty;
	public $Modelo_BitwiseOr;
	public $Modelo_BitwiseAnd;

}

?>