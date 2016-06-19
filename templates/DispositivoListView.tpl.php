<?php
	$this->assign('title','ERCCO | Dispositivos');
	$this->assign('nav','dispositivos');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/dispositivos.js").wait(function(){
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
	<i class="icon-th-list"></i> Dispositivos
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="dispositivoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_IdDispositivo">Id Dispositivo<% if (page.orderBy == 'IdDispositivo') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Descricao">Descricao<% if (page.orderBy == 'Descricao') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Posicao">Posicao<% if (page.orderBy == 'Posicao') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Nome">Nome<% if (page.orderBy == 'Nome') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_IdTipo">Id Tipo<% if (page.orderBy == 'IdTipo') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_IdPlataforma">Id Plataforma<% if (page.orderBy == 'IdPlataforma') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Patrimonio">Patrimonio<% if (page.orderBy == 'Patrimonio') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Processador">Processador<% if (page.orderBy == 'Processador') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Hd">Hd<% if (page.orderBy == 'Hd') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Memoria">Memoria<% if (page.orderBy == 'Memoria') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_IdRack">Id Rack<% if (page.orderBy == 'IdRack') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_IdPai">Id Pai<% if (page.orderBy == 'IdPai') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Fabricante">Fabricante<% if (page.orderBy == 'Fabricante') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Modelo">Modelo<% if (page.orderBy == 'Modelo') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idDispositivo')) %>">
				<td><%= _.escape(item.get('idDispositivo') || '') %></td>
				<td><%= _.escape(item.get('descricao') || '') %></td>
				<td><%= _.escape(item.get('posicao') || '') %></td>
				<td><%= _.escape(item.get('nome') || '') %></td>
				<td><%= _.escape(item.get('idTipo') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('idPlataforma') || '') %></td>
				<td><%= _.escape(item.get('patrimonio') || '') %></td>
				<td><%= _.escape(item.get('processador') || '') %></td>
				<td><%= _.escape(item.get('hd') || '') %></td>
				<td><%= _.escape(item.get('memoria') || '') %></td>
				<td><%= _.escape(item.get('idRack') || '') %></td>
				<td><%= _.escape(item.get('idPai') || '') %></td>
				<td><%= _.escape(item.get('fabricante') || '') %></td>
				<td><%= _.escape(item.get('modelo') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="dispositivoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idDispositivoInputContainer" class="control-group">
					<label class="control-label" for="idDispositivo">Id Dispositivo</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="idDispositivo" placeholder="Id Dispositivo" value="<%= _.escape(item.get('idDispositivo') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="descricaoInputContainer" class="control-group">
					<label class="control-label" for="descricao">Descricao</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="descricao" placeholder="Descricao" value="<%= _.escape(item.get('descricao') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="posicaoInputContainer" class="control-group">
					<label class="control-label" for="posicao">Posicao</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="posicao" placeholder="Posicao" value="<%= _.escape(item.get('posicao') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="nomeInputContainer" class="control-group">
					<label class="control-label" for="nome">Nome</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="nome" placeholder="Nome" value="<%= _.escape(item.get('nome') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="idTipoInputContainer" class="control-group">
					<label class="control-label" for="idTipo">Id Tipo</label>
					<div class="controls inline-inputs">
						<select id="idTipo" name="idTipo"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="idPlataformaInputContainer" class="control-group">
					<label class="control-label" for="idPlataforma">Id Plataforma</label>
					<div class="controls inline-inputs">
						<select id="idPlataforma" name="idPlataforma"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="patrimonioInputContainer" class="control-group">
					<label class="control-label" for="patrimonio">Patrimonio</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="patrimonio" placeholder="Patrimonio" value="<%= _.escape(item.get('patrimonio') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="processadorInputContainer" class="control-group">
					<label class="control-label" for="processador">Processador</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="processador" placeholder="Processador" value="<%= _.escape(item.get('processador') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="hdInputContainer" class="control-group">
					<label class="control-label" for="hd">Hd</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="hd" placeholder="Hd" value="<%= _.escape(item.get('hd') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="memoriaInputContainer" class="control-group">
					<label class="control-label" for="memoria">Memoria</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="memoria" placeholder="Memoria" value="<%= _.escape(item.get('memoria') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="idRackInputContainer" class="control-group">
					<label class="control-label" for="idRack">Id Rack</label>
					<div class="controls inline-inputs">
						<select id="idRack" name="idRack"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="idPaiInputContainer" class="control-group">
					<label class="control-label" for="idPai">Id Pai</label>
					<div class="controls inline-inputs">
						<select id="idPai" name="idPai"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="fabricanteInputContainer" class="control-group">
					<label class="control-label" for="fabricante">Fabricante</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="fabricante" placeholder="Fabricante" value="<%= _.escape(item.get('fabricante') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="modeloInputContainer" class="control-group">
					<label class="control-label" for="modelo">Modelo</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="modelo" placeholder="Modelo" value="<%= _.escape(item.get('modelo') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteDispositivoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteDispositivoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Dispositivo</button>
						<span id="confirmDeleteDispositivoContainer" class="hide">
							<button id="cancelDeleteDispositivoButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteDispositivoButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="dispositivoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Dispositivo
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="dispositivoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveDispositivoButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="dispositivoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newDispositivoButton" class="btn btn-primary">Add Dispositivo</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
