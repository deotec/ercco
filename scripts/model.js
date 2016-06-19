/**
 * backbone model definitions for ERCCO
 */

/**
 * Use emulated HTTP if the server doesn't support PUT/DELETE or application/json requests
 */
Backbone.emulateHTTP = false;
Backbone.emulateJSON = false;

var model = {};

/**
 * long polling duration in miliseconds.  (5000 = recommended, 0 = disabled)
 * warning: setting this to a low number will increase server load
 */
model.longPollDuration = 0;

/**
 * whether to refresh the collection immediately after a model is updated
 */
model.reloadCollectionOnModelUpdate = true;


/**
 * a default sort method for sorting collection items.  this will sort the collection
 * based on the orderBy and orderDesc property that was used on the last fetch call
 * to the server. 
 */
model.AbstractCollection = Backbone.Collection.extend({
	totalResults: 0,
	totalPages: 0,
	currentPage: 0,
	pageSize: 0,
	orderBy: '',
	orderDesc: false,
	lastResponseText: null,
	lastRequestParams: null,
	collectionHasChanged: true,
	
	/**
	 * fetch the collection from the server using the same options and 
	 * parameters as the previous fetch
	 */
	refetch: function() {
		this.fetch({ data: this.lastRequestParams })
	},
	
	/* uncomment to debug fetch event triggers
	fetch: function(options) {
            this.constructor.__super__.fetch.apply(this, arguments);
	},
	// */
	
	/**
	 * client-side sorting baesd on the orderBy and orderDesc parameters that
	 * were used to fetch the data from the server.  Backbone ignores the
	 * order of records coming from the server so we have to sort them ourselves
	 */
	comparator: function(a,b) {
		
		var result = 0;
		var options = this.lastRequestParams;
		
		if (options && options.orderBy) {
			
			// lcase the first letter of the property name
			var propName = options.orderBy.charAt(0).toLowerCase() + options.orderBy.slice(1);
			var aVal = a.get(propName);
			var bVal = b.get(propName);
			
			if (isNaN(aVal) || isNaN(bVal)) {
				// treat comparison as case-insensitive strings
				aVal = aVal ? aVal.toLowerCase() : '';
				bVal = bVal ? bVal.toLowerCase() : '';
			} else {
				// treat comparision as a number
				aVal = Number(aVal);
				bVal = Number(bVal);
			}
			
			if (aVal < bVal) {
				result = options.orderDesc ? 1 : -1;
			} else if (aVal > bVal) {
				result = options.orderDesc ? -1 : 1;
			}
		}
		
		return result;

	},
	/**
	 * override parse to track changes and handle pagination
	 * if the server call has returned page data
	 */
	parse: function(response, options) {

		// the response is already decoded into object form, but it's easier to
		// compary the stringified version.  some earlier versions of backbone did
		// not include the raw response so there is some legacy support here
		var responseText = options && options.xhr ? options.xhr.responseText : JSON.stringify(response);
		this.collectionHasChanged = (this.lastResponseText != responseText);
		this.lastRequestParams = options ? options.data : undefined;
		
		// if the collection has changed then we need to force a re-sort because backbone will
		// only resort the data if a property in the model has changed
		if (this.lastResponseText && this.collectionHasChanged) this.sort({ silent:true });
		
		this.lastResponseText = responseText;
		
		var rows;

		if (response.currentPage) {
			rows = response.rows;
			this.totalResults = response.totalResults;
			this.totalPages = response.totalPages;
			this.currentPage = response.currentPage;
			this.pageSize = response.pageSize;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		} else {
			rows = response;
			this.totalResults = rows.length;
			this.totalPages = 1;
			this.currentPage = 1;
			this.pageSize = this.totalResults;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}

		return rows;
	}
});

/**
 * Dispositivo Backbone Model
 */
model.DispositivoModel = Backbone.Model.extend({
	urlRoot: 'api/dispositivo',
	idAttribute: 'idDispositivo',
	idDispositivo: '',
	descricao: '',
	posicao: '',
	nome: '',
	idTipo: '',
	idPlataforma: '',
	patrimonio: '',
	processador: '',
	hd: '',
	memoria: '',
	idRack: '',
	idPai: '',
	fabricante: '',
	modelo: '',
	defaults: {
		'idDispositivo': null,
		'descricao': '',
		'posicao': '',
		'nome': '',
		'idTipo': '',
		'idPlataforma': '',
		'patrimonio': '',
		'processador': '',
		'hd': '',
		'memoria': '',
		'idRack': '',
		'idPai': '',
		'fabricante': '',
		'modelo': ''
	}
});

/**
 * Dispositivo Backbone Collection
 */
model.DispositivoCollection = model.AbstractCollection.extend({
	url: 'api/dispositivos',
	model: model.DispositivoModel
});

/**
 * Grupo Backbone Model
 */
model.GrupoModel = Backbone.Model.extend({
	urlRoot: 'api/grupo',
	idAttribute: 'idGrupo',
	idGrupo: '',
	nome: '',
	defaults: {
		'idGrupo': null,
		'nome': ''
	}
});

/**
 * Grupo Backbone Collection
 */
model.GrupoCollection = model.AbstractCollection.extend({
	url: 'api/grupos',
	model: model.GrupoModel
});

/**
 * Menu Backbone Model
 */
model.MenuModel = Backbone.Model.extend({
	urlRoot: 'api/menu',
	idAttribute: 'idMenu',
	idMenu: '',
	nome: '',
	ordem: '',
	defaults: {
		'idMenu': null,
		'nome': '',
		'ordem': ''
	}
});

/**
 * Menu Backbone Collection
 */
model.MenuCollection = model.AbstractCollection.extend({
	url: 'api/menus',
	model: model.MenuModel
});

/**
 * Permissao Backbone Model
 */
model.PermissaoModel = Backbone.Model.extend({
	urlRoot: 'api/permissao',
	idAttribute: 'idPermissao',
	idPermissao: '',
	visualizar: '',
	editar: '',
	criar: '',
	excluir: '',
	defaults: {
		'idPermissao': null,
		'visualizar': '',
		'editar': '',
		'criar': '',
		'excluir': ''
	}
});

/**
 * Permissao Backbone Collection
 */
model.PermissaoCollection = model.AbstractCollection.extend({
	url: 'api/permissaos',
	model: model.PermissaoModel
});

/**
 * Plataforma Backbone Model
 */
model.PlataformaModel = Backbone.Model.extend({
	urlRoot: 'api/plataforma',
	idAttribute: 'idPlataforma',
	idPlataforma: '',
	nome: '',
	versao: '',
	defaults: {
		'idPlataforma': null,
		'nome': '',
		'versao': ''
	}
});

/**
 * Plataforma Backbone Collection
 */
model.PlataformaCollection = model.AbstractCollection.extend({
	url: 'api/plataformas',
	model: model.PlataformaModel
});

/**
 * Rack Backbone Model
 */
model.RackModel = Backbone.Model.extend({
	urlRoot: 'api/rack',
	idAttribute: 'idRack',
	idRack: '',
	numRack: '',
	descricao: '',
	patrimonio: '',
	defaults: {
		'idRack': null,
		'numRack': '',
		'descricao': '',
		'patrimonio': ''
	}
});

/**
 * Rack Backbone Collection
 */
model.RackCollection = model.AbstractCollection.extend({
	url: 'api/racks',
	model: model.RackModel
});

/**
 * RelGrupoPermissaoMenu Backbone Model
 */
model.RelGrupoPermissaoMenuModel = Backbone.Model.extend({
	urlRoot: 'api/relgrupopermissaomenu',
	idAttribute: 'relGrupoPermissaoMenu',
	relGrupoPermissaoMenu: '',
	permissao: '',
	grupo: '',
	menu: '',
	defaults: {
		'relGrupoPermissaoMenu': null,
		'permissao': '',
		'grupo': '',
		'menu': ''
	}
});

/**
 * RelGrupoPermissaoMenu Backbone Collection
 */
model.RelGrupoPermissaoMenuCollection = model.AbstractCollection.extend({
	url: 'api/relgrupopermissaomenus',
	model: model.RelGrupoPermissaoMenuModel
});

/**
 * RelUsuarioGrupo Backbone Model
 */
model.RelUsuarioGrupoModel = Backbone.Model.extend({
	urlRoot: 'api/relusuariogrupo',
	idAttribute: 'relUsuarioGrupo',
	relUsuarioGrupo: '',
	usuario: '',
	grupo: '',
	defaults: {
		'relUsuarioGrupo': null,
		'usuario': '',
		'grupo': ''
	}
});

/**
 * RelUsuarioGrupo Backbone Collection
 */
model.RelUsuarioGrupoCollection = model.AbstractCollection.extend({
	url: 'api/relusuariogrupos',
	model: model.RelUsuarioGrupoModel
});

/**
 * Tipo Backbone Model
 */
model.TipoModel = Backbone.Model.extend({
	urlRoot: 'api/tipo',
	idAttribute: 'idTipo',
	idTipo: '',
	nome: '',
	nomeVm: '',
	defaults: {
		'idTipo': null,
		'nome': '',
		'nomeVm': ''
	}
});

/**
 * Tipo Backbone Collection
 */
model.TipoCollection = model.AbstractCollection.extend({
	url: 'api/tipos',
	model: model.TipoModel
});

/**
 * Usuario Backbone Model
 */
model.UsuarioModel = Backbone.Model.extend({
	urlRoot: 'api/usuario',
	idAttribute: 'idUsuario',
	idUsuario: '',
	nome: '',
	senha: '',
	defaults: {
		'idUsuario': null,
		'nome': '',
		'senha': ''
	}
});

/**
 * Usuario Backbone Collection
 */
model.UsuarioCollection = model.AbstractCollection.extend({
	url: 'api/usuarios',
	model: model.UsuarioModel
});

