<?php
	$this->assign('title','ERCCO | RelGrupoPermissaoMenus');
	$this->assign('nav','relgrupopermissaomenus');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/relgrupopermissaomenus.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});
		
		// hack for IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>

<div class="container">

<h1>
	<i class="icon-th-list"></i> RelGrupoPermissaoMenus
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="relGrupoPermissaoMenuCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_RelGrupoPermissaoMenu">Rel Grupo Permissao Menu<% if (page.orderBy == 'RelGrupoPermissaoMenu') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Permissao">Permissao<% if (page.orderBy == 'Permissao') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Grupo">Grupo<% if (page.orderBy == 'Grupo') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Menu">Menu<% if (page.orderBy == 'Menu') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('relGrupoPermissaoMenu')) %>">
				<td><%= _.escape(item.get('relGrupoPermissaoMenu') || '') %></td>
				<td><%= _.escape(item.get('permissao') || '') %></td>
				<td><%= _.escape(item.get('grupo') || '') %></td>
				<td><%= _.escape(item.get('menu') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="relGrupoPermissaoMenuModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="relGrupoPermissaoMenuInputContainer" class="control-group">
					<label class="control-label" for="relGrupoPermissaoMenu">Rel Grupo Permissao Menu</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="relGrupoPermissaoMenu" placeholder="Rel Grupo Permissao Menu" value="<%= _.escape(item.get('relGrupoPermissaoMenu') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="permissaoInputContainer" class="control-group">
					<label class="control-label" for="permissao">Permissao</label>
					<div class="controls inline-inputs">
						<select id="permissao" name="permissao"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="grupoInputContainer" class="control-group">
					<label class="control-label" for="grupo">Grupo</label>
					<div class="controls inline-inputs">
						<select id="grupo" name="grupo"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="menuInputContainer" class="control-group">
					<label class="control-label" for="menu">Menu</label>
					<div class="controls inline-inputs">
						<select id="menu" name="menu"></select>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteRelGrupoPermissaoMenuButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteRelGrupoPermissaoMenuButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete RelGrupoPermissaoMenu</button>
						<span id="confirmDeleteRelGrupoPermissaoMenuContainer" class="hide">
							<button id="cancelDeleteRelGrupoPermissaoMenuButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteRelGrupoPermissaoMenuButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="relGrupoPermissaoMenuDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit RelGrupoPermissaoMenu
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="relGrupoPermissaoMenuModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveRelGrupoPermissaoMenuButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="relGrupoPermissaoMenuCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newRelGrupoPermissaoMenuButton" class="btn btn-primary">Add RelGrupoPermissaoMenu</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
