<?php
	$this->assign('title','ERCCO | Permissaos');
	$this->assign('nav','permissaos');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/permissaos.js").wait(function(){
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
	<i class="icon-th-list"></i> Permissões
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="permissaoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_IdPermissao">Id Permissão<% if (page.orderBy == 'IdPermissao') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Visualizar">Visualizar<% if (page.orderBy == 'Visualizar') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Editar">Editar<% if (page.orderBy == 'Editar') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Criar">Criar<% if (page.orderBy == 'Criar') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Excluir">Excluir<% if (page.orderBy == 'Excluir') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idPermissao')) %>">
				<td><%= _.escape(item.get('idPermissao') || '') %></td>
				<td><%= _.escape(item.get('visualizar') || '') %></td>
				<td><%= _.escape(item.get('editar') || '') %></td>
				<td><%= _.escape(item.get('criar') || '') %></td>
				<td><%= _.escape(item.get('excluir') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="permissaoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idPermissaoInputContainer" class="control-group">
					<label class="control-label" for="idPermissao">Id Permissão</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="idPermissao" placeholder="Id Permissao" value="<%= _.escape(item.get('idPermissao') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="visualizarInputContainer" class="control-group">
					<label class="control-label" for="visualizar">Visualizar</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="visualizar" placeholder="Visualizar" value="<%= _.escape(item.get('visualizar') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="editarInputContainer" class="control-group">
					<label class="control-label" for="editar">Editar</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="editar" placeholder="Editar" value="<%= _.escape(item.get('editar') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="criarInputContainer" class="control-group">
					<label class="control-label" for="criar">Criar</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="criar" placeholder="Criar" value="<%= _.escape(item.get('criar') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="excluirInputContainer" class="control-group">
					<label class="control-label" for="excluir">Excluir</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="excluir" placeholder="Excluir" value="<%= _.escape(item.get('excluir') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deletePermissaoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deletePermissaoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Permissao</button>
						<span id="confirmDeletePermissaoContainer" class="hide">
							<button id="cancelDeletePermissaoButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeletePermissaoButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="permissaoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Permissao
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="permissaoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="savePermissaoButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="permissaoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newPermissaoButton" class="btn btn-primary">Add Permissao</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
