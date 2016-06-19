<?php
/** @package    ERCCO::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Dispositivo.php");

/**
 * DispositivoController is the controller class for the Dispositivo object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package ERCCO::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class DispositivoController extends AppBaseController
{

	/**
	 * Override here for any controller-specific functionality
	 *
	 * @inheritdocs
	 */
	protected function Init()
	{
		parent::Init();

		// TODO: add controller-wide bootstrap code
		
		// TODO: if authentiation is required for this entire controller, for example:
		// $this->RequirePermission(ExampleUser::$PERMISSION_USER,'SecureExample.LoginForm');
	}

	/**
	 * Displays a list view of Dispositivo objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Dispositivo records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new DispositivoCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdDispositivo,Descricao,Posicao,Nome,IdTipo,IdPlataforma,Patrimonio,Processador,Hd,Memoria,IdRack,IdPai,Fabricante,Modelo'
				, '%'.$filter.'%')
			);

			// TODO: this is generic query filtering based only on criteria properties
			foreach (array_keys($_REQUEST) as $prop)
			{
				$prop_normal = ucfirst($prop);
				$prop_equals = $prop_normal.'_Equals';

				if (property_exists($criteria, $prop_normal))
				{
					$criteria->$prop_normal = RequestUtil::Get($prop);
				}
				elseif (property_exists($criteria, $prop_equals))
				{
					// this is a convenience so that the _Equals suffix is not needed
					$criteria->$prop_equals = RequestUtil::Get($prop);
				}
			}

			$output = new stdClass();

			// if a sort order was specified then specify in the criteria
 			$output->orderBy = RequestUtil::Get('orderBy');
 			$output->orderDesc = RequestUtil::Get('orderDesc') != '';
 			if ($output->orderBy) $criteria->SetOrder($output->orderBy, $output->orderDesc);

			$page = RequestUtil::Get('page');

			if ($page != '')
			{
				// if page is specified, use this instead (at the expense of one extra count query)
				$pagesize = $this->GetDefaultPageSize();

				$dispositivos = $this->Phreezer->Query('Dispositivo',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $dispositivos->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $dispositivos->TotalResults;
				$output->totalPages = $dispositivos->TotalPages;
				$output->pageSize = $dispositivos->PageSize;
				$output->currentPage = $dispositivos->CurrentPage;
			}
			else
			{
				// return all results
				$dispositivos = $this->Phreezer->Query('Dispositivo',$criteria);
				$output->rows = $dispositivos->ToObjectArray(true, $this->SimpleObjectParams());
				$output->totalResults = count($output->rows);
				$output->totalPages = 1;
				$output->pageSize = $output->totalResults;
				$output->currentPage = 1;
			}


			$this->RenderJSON($output, $this->JSONPCallback());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method retrieves a single Dispositivo record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idDispositivo');
			$dispositivo = $this->Phreezer->Get('Dispositivo',$pk);
			$this->RenderJSON($dispositivo, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Dispositivo record and render response as JSON
	 */
	public function Create()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$dispositivo = new Dispositivo($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			$dispositivo->IdDispositivo = $this->SafeGetVal($json, 'idDispositivo');
			$dispositivo->Descricao = $this->SafeGetVal($json, 'descricao');
			$dispositivo->Posicao = $this->SafeGetVal($json, 'posicao');
			$dispositivo->Nome = $this->SafeGetVal($json, 'nome');
			$dispositivo->IdTipo = $this->SafeGetVal($json, 'idTipo');
			$dispositivo->IdPlataforma = $this->SafeGetVal($json, 'idPlataforma');
			$dispositivo->Patrimonio = $this->SafeGetVal($json, 'patrimonio');
			$dispositivo->Processador = $this->SafeGetVal($json, 'processador');
			$dispositivo->Hd = $this->SafeGetVal($json, 'hd');
			$dispositivo->Memoria = $this->SafeGetVal($json, 'memoria');
			$dispositivo->IdRack = $this->SafeGetVal($json, 'idRack');
			$dispositivo->IdPai = $this->SafeGetVal($json, 'idPai');
			$dispositivo->Fabricante = $this->SafeGetVal($json, 'fabricante');
			$dispositivo->Modelo = $this->SafeGetVal($json, 'modelo');

			$dispositivo->Validate();
			$errors = $dispositivo->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				// since the primary key is not auto-increment we must force the insert here
				$dispositivo->Save(true);
				$this->RenderJSON($dispositivo, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Dispositivo record and render response as JSON
	 */
	public function Update()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$pk = $this->GetRouter()->GetUrlParam('idDispositivo');
			$dispositivo = $this->Phreezer->Get('Dispositivo',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $dispositivo->IdDispositivo = $this->SafeGetVal($json, 'idDispositivo', $dispositivo->IdDispositivo);

			$dispositivo->Descricao = $this->SafeGetVal($json, 'descricao', $dispositivo->Descricao);
			$dispositivo->Posicao = $this->SafeGetVal($json, 'posicao', $dispositivo->Posicao);
			$dispositivo->Nome = $this->SafeGetVal($json, 'nome', $dispositivo->Nome);
			$dispositivo->IdTipo = $this->SafeGetVal($json, 'idTipo', $dispositivo->IdTipo);
			$dispositivo->IdPlataforma = $this->SafeGetVal($json, 'idPlataforma', $dispositivo->IdPlataforma);
			$dispositivo->Patrimonio = $this->SafeGetVal($json, 'patrimonio', $dispositivo->Patrimonio);
			$dispositivo->Processador = $this->SafeGetVal($json, 'processador', $dispositivo->Processador);
			$dispositivo->Hd = $this->SafeGetVal($json, 'hd', $dispositivo->Hd);
			$dispositivo->Memoria = $this->SafeGetVal($json, 'memoria', $dispositivo->Memoria);
			$dispositivo->IdRack = $this->SafeGetVal($json, 'idRack', $dispositivo->IdRack);
			$dispositivo->IdPai = $this->SafeGetVal($json, 'idPai', $dispositivo->IdPai);
			$dispositivo->Fabricante = $this->SafeGetVal($json, 'fabricante', $dispositivo->Fabricante);
			$dispositivo->Modelo = $this->SafeGetVal($json, 'modelo', $dispositivo->Modelo);

			$dispositivo->Validate();
			$errors = $dispositivo->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$dispositivo->Save();
				$this->RenderJSON($dispositivo, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{

			// this table does not have an auto-increment primary key, so it is semantically correct to
			// issue a REST PUT request, however we have no way to know whether to insert or update.
			// if the record is not found, this exception will indicate that this is an insert request
			if (is_a($ex,'NotFoundException'))
			{
				return $this->Create();
			}

			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Dispositivo record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idDispositivo');
			$dispositivo = $this->Phreezer->Get('Dispositivo',$pk);

			$dispositivo->Delete();

			$output = new stdClass();

			$this->RenderJSON($output, $this->JSONPCallback());

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}
}

?>
