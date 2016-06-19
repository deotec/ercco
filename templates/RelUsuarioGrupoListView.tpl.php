<?php
	$this->assign('title','ERCCO | RelUsuarioGrupos');
	$this->assign('nav','relusuariogrupos');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/relusuariogrupos.js").wait(function(){
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
	<i class="icon-th-list"></i> RelUsuarioGrupos
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="relUsuarioGrupoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_RelUsuarioGrupo">Rel Usuario Grupo<% if (page.orderBy == 'RelUsuarioGrupo') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Usuario">Usuario<% if (page.orderBy == 'Usuario') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Grupo">Grupo<% if (page.orderBy == 'Grupo') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('relUsuarioGrupo')) %>">
				<td><%= _.escape(item.get('relUsuarioGrupo') || '') %></td>
				<td><%= _.escape(item.get('usuario') || '') %></td>
				<td><%= _.escape(item.get('grupo') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="relUsuarioGrupoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="relUsuarioGrupoInputContainer" class="control-group">
					<label class="control-label" for="relUsuarioGrupo">Rel Usuario Grupo</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="relUsuarioGrupo" placeholder="Rel Usuario Grupo" value="<%= _.escape(item.get('relUsuarioGrupo') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="usuarioInputContainer" class="control-group">
					<label class="control-label" for="usuario">Usuario</label>
					<div class="controls inline-inputs">
						<select id="usuario" name="usuario"></select>
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
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteRelUsuarioGrupoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteRelUsuarioGrupoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete RelUsuarioGrupo</button>
						<span id="confirmDeleteRelUsuarioGrupoContainer" class="hide">
							<button id="cancelDeleteRelUsuarioGrupoButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteRelUsuarioGrupoButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="relUsuarioGrupoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit RelUsuarioGrupo
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="relUsuarioGrupoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveRelUsuarioGrupoButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="relUsuarioGrupoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newRelUsuarioGrupoButton" class="btn btn-primary">Add RelUsuarioGrupo</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
