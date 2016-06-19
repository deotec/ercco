<?php
/** @package    ERCCO::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Menu.php");

/**
 * MenuController is the controller class for the Menu object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package ERCCO::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class MenuController extends AppBaseController
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
	 * Displays a list view of Menu objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Menu records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new MenuCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('IdMenu,Nome,Ordem'
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

				$menus = $this->Phreezer->Query('Menu',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $menus->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $menus->TotalResults;
				$output->totalPages = $menus->TotalPages;
				$output->pageSize = $menus->PageSize;
				$output->currentPage = $menus->CurrentPage;
			}
			else
			{
				// return all results
				$menus = $this->Phreezer->Query('Menu',$criteria);
				$output->rows = $menus->ToObjectArray(true, $this->SimpleObjectParams());
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
	 * API Method retrieves a single Menu record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idMenu');
			$menu = $this->Phreezer->Get('Menu',$pk);
			$this->RenderJSON($menu, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Menu record and render response as JSON
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

			$menu = new Menu($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			$menu->IdMenu = $this->SafeGetVal($json, 'idMenu');
			$menu->Nome = $this->SafeGetVal($json, 'nome');
			$menu->Ordem = $this->SafeGetVal($json, 'ordem');

			$menu->Validate();
			$errors = $menu->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				// since the primary key is not auto-increment we must force the insert here
				$menu->Save(true);
				$this->RenderJSON($menu, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Menu record and render response as JSON
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

			$pk = $this->GetRouter()->GetUrlParam('idMenu');
			$menu = $this->Phreezer->Get('Menu',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $menu->IdMenu = $this->SafeGetVal($json, 'idMenu', $menu->IdMenu);

			$menu->Nome = $this->SafeGetVal($json, 'nome', $menu->Nome);
			$menu->Ordem = $this->SafeGetVal($json, 'ordem', $menu->Ordem);

			$menu->Validate();
			$errors = $menu->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$menu->Save();
				$this->RenderJSON($menu, $this->JSONPCallback(), true, $this->SimpleObjectParams());
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
	 * API Method deletes an existing Menu record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idMenu');
			$menu = $this->Phreezer->Get('Menu',$pk);

			$menu->Delete();

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
