<?php
/**
 * @package ERCCO
 *
 * APPLICATION-WIDE CONFIGURATION SETTINGS
 *
 * This file contains application-wide configuration settings.  The settings
 * here will be the same regardless of the machine on which the app is running.
 *
 * This configuration should be added to version control.
 *
 * No settings should be added to this file that would need to be changed
 * on a per-machine basic (ie local, staging or production).  Any
 * machine-specific settings should be added to _machine_config.php
 */

/**
 * APPLICATION ROOT DIRECTORY
 * If the application doesn't detect this correctly then it can be set explicitly
 */
if (!GlobalConfig::$APP_ROOT) GlobalConfig::$APP_ROOT = realpath("./");

/**
 * check is needed to ensure asp_tags is not enabled
 */
if (ini_get('asp_tags')) 
	die('<h3>Server Configuration Problem: asp_tags is enabled, but is not compatible with Savant.</h3>'
	. '<p>You can disable asp_tags in .htaccess, php.ini or generate your app with another template engine such as Smarty.</p>');

/**
 * INCLUDE PATH
 * Adjust the include path as necessary so PHP can locate required libraries
 */
set_include_path(
		GlobalConfig::$APP_ROOT . '/libs/' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/../phreeze/libs' . PATH_SEPARATOR .
		GlobalConfig::$APP_ROOT . '/vendor/phreeze/phreeze/libs/' . PATH_SEPARATOR .
		get_include_path()
);

/**
 * COMPOSER AUTOLOADER
 * Uncomment if Composer is being used to manage dependencies
 */
// $loader = require 'vendor/autoload.php';
// $loader->setUseIncludePath(true);

/**
 * SESSION CLASSES
 * Any classes that will be stored in the session can be added here
 * and will be pre-loaded on every page
 */
require_once "App/ExampleUser.php";

/**
 * RENDER ENGINE
 * You can use any template system that implements
 * IRenderEngine for the view layer.  Phreeze provides pre-built
 * implementations for Smarty, Savant and plain PHP.
 */
require_once 'verysimple/Phreeze/SavantRenderEngine.php';
GlobalConfig::$TEMPLATE_ENGINE = 'SavantRenderEngine';
GlobalConfig::$TEMPLATE_PATH = GlobalConfig::$APP_ROOT . '/templates/';

/**
 * ROUTE MAP
 * The route map connects URLs to Controller+Method and additionally maps the
 * wildcards to a named parameter so that they are accessible inside the
 * Controller without having to parse the URL for parameters such as IDs
 */
GlobalConfig::$ROUTE_MAP = array(

	// default controller when no route specified
	'GET:' => array('route' => 'Default.Home'),
		
	// example authentication routes
	'GET:loginform' => array('route' => 'SecureExample.LoginForm'),
	'POST:login' => array('route' => 'SecureExample.Login'),
	'GET:secureuser' => array('route' => 'SecureExample.UserPage'),
	'GET:secureadmin' => array('route' => 'SecureExample.AdminPage'),
	'GET:logout' => array('route' => 'SecureExample.Logout'),
		
	// Dispositivo
	'GET:dispositivos' => array('route' => 'Dispositivo.ListView'),
	'GET:dispositivo/(:any)' => array('route' => 'Dispositivo.SingleView', 'params' => array('idDispositivo' => 1)),
	'GET:api/dispositivos' => array('route' => 'Dispositivo.Query'),
	'POST:api/dispositivo' => array('route' => 'Dispositivo.Create'),
	'GET:api/dispositivo/(:any)' => array('route' => 'Dispositivo.Read', 'params' => array('idDispositivo' => 2)),
	'PUT:api/dispositivo/(:any)' => array('route' => 'Dispositivo.Update', 'params' => array('idDispositivo' => 2)),
	'DELETE:api/dispositivo/(:any)' => array('route' => 'Dispositivo.Delete', 'params' => array('idDispositivo' => 2)),
		
	// Grupo
	'GET:grupos' => array('route' => 'Grupo.ListView'),
	'GET:grupo/(:any)' => array('route' => 'Grupo.SingleView', 'params' => array('idGrupo' => 1)),
	'GET:api/grupos' => array('route' => 'Grupo.Query'),
	'POST:api/grupo' => array('route' => 'Grupo.Create'),
	'GET:api/grupo/(:any)' => array('route' => 'Grupo.Read', 'params' => array('idGrupo' => 2)),
	'PUT:api/grupo/(:any)' => array('route' => 'Grupo.Update', 'params' => array('idGrupo' => 2)),
	'DELETE:api/grupo/(:any)' => array('route' => 'Grupo.Delete', 'params' => array('idGrupo' => 2)),
		
	// Menu
	'GET:menus' => array('route' => 'Menu.ListView'),
	'GET:menu/(:any)' => array('route' => 'Menu.SingleView', 'params' => array('idMenu' => 1)),
	'GET:api/menus' => array('route' => 'Menu.Query'),
	'POST:api/menu' => array('route' => 'Menu.Create'),
	'GET:api/menu/(:any)' => array('route' => 'Menu.Read', 'params' => array('idMenu' => 2)),
	'PUT:api/menu/(:any)' => array('route' => 'Menu.Update', 'params' => array('idMenu' => 2)),
	'DELETE:api/menu/(:any)' => array('route' => 'Menu.Delete', 'params' => array('idMenu' => 2)),
		
	// Permissao
	'GET:permissaos' => array('route' => 'Permissao.ListView'),
	'GET:permissao/(:any)' => array('route' => 'Permissao.SingleView', 'params' => array('idPermissao' => 1)),
	'GET:api/permissaos' => array('route' => 'Permissao.Query'),
	'POST:api/permissao' => array('route' => 'Permissao.Create'),
	'GET:api/permissao/(:any)' => array('route' => 'Permissao.Read', 'params' => array('idPermissao' => 2)),
	'PUT:api/permissao/(:any)' => array('route' => 'Permissao.Update', 'params' => array('idPermissao' => 2)),
	'DELETE:api/permissao/(:any)' => array('route' => 'Permissao.Delete', 'params' => array('idPermissao' => 2)),
		
	// Plataforma
	'GET:plataformas' => array('route' => 'Plataforma.ListView'),
	'GET:plataforma/(:any)' => array('route' => 'Plataforma.SingleView', 'params' => array('idPlataforma' => 1)),
	'GET:api/plataformas' => array('route' => 'Plataforma.Query'),
	'POST:api/plataforma' => array('route' => 'Plataforma.Create'),
	'GET:api/plataforma/(:any)' => array('route' => 'Plataforma.Read', 'params' => array('idPlataforma' => 2)),
	'PUT:api/plataforma/(:any)' => array('route' => 'Plataforma.Update', 'params' => array('idPlataforma' => 2)),
	'DELETE:api/plataforma/(:any)' => array('route' => 'Plataforma.Delete', 'params' => array('idPlataforma' => 2)),
		
	// Rack
	'GET:racks' => array('route' => 'Rack.ListView'),
	'GET:rack/(:any)' => array('route' => 'Rack.SingleView', 'params' => array('idRack' => 1)),
	'GET:api/racks' => array('route' => 'Rack.Query'),
	'POST:api/rack' => array('route' => 'Rack.Create'),
	'GET:api/rack/(:any)' => array('route' => 'Rack.Read', 'params' => array('idRack' => 2)),
	'PUT:api/rack/(:any)' => array('route' => 'Rack.Update', 'params' => array('idRack' => 2)),
	'DELETE:api/rack/(:any)' => array('route' => 'Rack.Delete', 'params' => array('idRack' => 2)),
		
	// RelGrupoPermissaoMenu
	'GET:relgrupopermissaomenus' => array('route' => 'RelGrupoPermissaoMenu.ListView'),
	'GET:relgrupopermissaomenu/(:any)' => array('route' => 'RelGrupoPermissaoMenu.SingleView', 'params' => array('relGrupoPermissaoMenu' => 1)),
	'GET:api/relgrupopermissaomenus' => array('route' => 'RelGrupoPermissaoMenu.Query'),
	'POST:api/relgrupopermissaomenu' => array('route' => 'RelGrupoPermissaoMenu.Create'),
	'GET:api/relgrupopermissaomenu/(:any)' => array('route' => 'RelGrupoPermissaoMenu.Read', 'params' => array('relGrupoPermissaoMenu' => 2)),
	'PUT:api/relgrupopermissaomenu/(:any)' => array('route' => 'RelGrupoPermissaoMenu.Update', 'params' => array('relGrupoPermissaoMenu' => 2)),
	'DELETE:api/relgrupopermissaomenu/(:any)' => array('route' => 'RelGrupoPermissaoMenu.Delete', 'params' => array('relGrupoPermissaoMenu' => 2)),
		
	// RelUsuarioGrupo
	'GET:relusuariogrupos' => array('route' => 'RelUsuarioGrupo.ListView'),
	'GET:relusuariogrupo/(:any)' => array('route' => 'RelUsuarioGrupo.SingleView', 'params' => array('relUsuarioGrupo' => 1)),
	'GET:api/relusuariogrupos' => array('route' => 'RelUsuarioGrupo.Query'),
	'POST:api/relusuariogrupo' => array('route' => 'RelUsuarioGrupo.Create'),
	'GET:api/relusuariogrupo/(:any)' => array('route' => 'RelUsuarioGrupo.Read', 'params' => array('relUsuarioGrupo' => 2)),
	'PUT:api/relusuariogrupo/(:any)' => array('route' => 'RelUsuarioGrupo.Update', 'params' => array('relUsuarioGrupo' => 2)),
	'DELETE:api/relusuariogrupo/(:any)' => array('route' => 'RelUsuarioGrupo.Delete', 'params' => array('relUsuarioGrupo' => 2)),
		
	// Tipo
	'GET:tipos' => array('route' => 'Tipo.ListView'),
	'GET:tipo/(:any)' => array('route' => 'Tipo.SingleView', 'params' => array('idTipo' => 1)),
	'GET:api/tipos' => array('route' => 'Tipo.Query'),
	'POST:api/tipo' => array('route' => 'Tipo.Create'),
	'GET:api/tipo/(:any)' => array('route' => 'Tipo.Read', 'params' => array('idTipo' => 2)),
	'PUT:api/tipo/(:any)' => array('route' => 'Tipo.Update', 'params' => array('idTipo' => 2)),
	'DELETE:api/tipo/(:any)' => array('route' => 'Tipo.Delete', 'params' => array('idTipo' => 2)),
		
	// Usuario
	'GET:usuarios' => array('route' => 'Usuario.ListView'),
	'GET:usuario/(:any)' => array('route' => 'Usuario.SingleView', 'params' => array('idUsuario' => 1)),
	'GET:api/usuarios' => array('route' => 'Usuario.Query'),
	'POST:api/usuario' => array('route' => 'Usuario.Create'),
	'GET:api/usuario/(:any)' => array('route' => 'Usuario.Read', 'params' => array('idUsuario' => 2)),
	'PUT:api/usuario/(:any)' => array('route' => 'Usuario.Update', 'params' => array('idUsuario' => 2)),
	'DELETE:api/usuario/(:any)' => array('route' => 'Usuario.Delete', 'params' => array('idUsuario' => 2)),

	// catch any broken API urls
	'GET:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'PUT:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'POST:api/(:any)' => array('route' => 'Default.ErrorApi404'),
	'DELETE:api/(:any)' => array('route' => 'Default.ErrorApi404')
);

/**
 * FETCHING STRATEGY
 * You may uncomment any of the lines below to specify always eager fetching.
 * Alternatively, you can copy/paste to a specific page for one-time eager fetching
 * If you paste into a controller method, replace $G_PHREEZER with $this->Phreezer
 */
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Dispositivo","fk_plataforma_dispoistivo",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Dispositivo","fk_rack_dispositivo",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Dispositivo","fk_tipo_dispositivo",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("Dispositivo","rel_id_dipositivopai_dispositivofilho",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("RelGrupoPermissaoMenu","fk_grp_rel_grp_per_menu",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("RelGrupoPermissaoMenu","fk_menu_rel_grp_per_menu",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("RelGrupoPermissaoMenu","fk_perm_rel_grp_per_menu",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("RelUsuarioGrupo","FK_grupo_rel_usuario_grupo",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
// $GlobalConfig->GetInstance()->GetPhreezer()->SetLoadType("RelUsuarioGrupo","FK_usuario_rel_usuario_grupo",KM_LOAD_EAGER); // KM_LOAD_INNER | KM_LOAD_EAGER | KM_LOAD_LAZY
?>