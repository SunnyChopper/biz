<div class="modal fade" id="new_page_modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Create New Page</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" id="create_kit_id" name="kit_id" value="{{ $kit->id }}">
				<div class='form-group row'>
					<div class='col-lg-6 col-md-6 col-sm-12 col-12'>
						<label>Section:</label>
						<input type='number' class='form-control' id='create_section' required>
					</div>

					<div class='col-lg-6 col-md-6 col-sm-12 col-12'>
						<label>Order:</label>
						<input type='number' class='form-control' id='create_order' required>
					</div>
				</div>

				<div class='form-group row'>
					<div class='col-12'>
						<label>Title:</label>
						<input type='text' class='form-control' id='create_title' required>
					</div>
				</div>

				<div class='form-group row'>
					<div class='col-12'>
						<label>Description:</label>
						<textarea id='create_description' rows='6'></textarea>
					</div>
				</div>

				<div id='error' class='form-group row' style='display: none;'>
					<div class='col-12'>
						<p id='error_message' class='text-center red'></p>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary create" style="font-size: 16px;">Create</button>
			</div>
		</div>
	</div>
</div>