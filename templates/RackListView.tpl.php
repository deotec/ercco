<?php
	$this->assign('title','ERCCO | Racks');
	$this->assign('nav','racks');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/racks.js").wait(function(){
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
	<i class="icon-th-list"></i> Racks
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="rackCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_IdRack">Id Rack<% if (page.orderBy == 'IdRack') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_NumRack">Num Rack<% if (page.orderBy == 'NumRack') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Descricao">Descricao<% if (page.orderBy == 'Descricao') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Patrimonio">Patrimonio<% if (page.orderBy == 'Patrimonio') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idRack')) %>">
				<td><%= _.escape(item.get('idRack') || '') %></td>
				<td><%= _.escape(item.get('numRack') || '') %></td>
				<td><%= _.escape(item.get('descricao') || '') %></td>
				<td><%= _.escape(item.get('patrimonio') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="rackModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idRackInputContainer" class="control-group">
					<label class="control-label" for="idRack">Id Rack</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="idRack" placeholder="Id Rack" value="<%= _.escape(item.get('idRack') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="numRackInputContainer" class="control-group">
					<label class="control-label" for="numRack">Num Rack</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="numRack" placeholder="Num Rack" value="<%= _.escape(item.get('numRack') || '') %>">
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
				<div id="patrimonioInputContainer" class="control-group">
					<label class="control-label" for="patrimonio">Patrimonio</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="patrimonio" placeholder="Patrimonio" value="<%= _.escape(item.get('patrimonio') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteRackButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteRackButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Rack</button>
						<span id="confirmDeleteRackContainer" class="hide">
							<button id="cancelDeleteRackButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteRackButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="rackDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Rack
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="rackModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveRackButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="rackCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newRackButton" class="btn btn-primary">Add Rack</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
