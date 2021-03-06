<div class="modal fade" id="edit_page_modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Update Page</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" name="page_id" id="edit_page_id">
				<input type="hidden" name="kit_id" value="{{ $kit->id }}">
				<div class='form-group row'>
					<div class='col-lg-6 col-md-6 col-sm-12 col-12'>
						<label>Section:</label>
						<input type='number' class='form-control' id='edit_section' required>
					</div>

					<div class='col-lg-6 col-md-6 col-sm-12 col-12'>
						<label>Order:</label>
						<input type='number' class='form-control' id='edit_order' required>
					</div>
				</div>

				<div class='form-group row'>
					<div class='col-12'>
						<label>Title:</label>
						<input type='text' class='form-control' id='edit_title' required>
					</div>
				</div>

				<div class='form-group row'>
					<div class='col-12'>
						<label>Description:</label>
						<textarea id='edit_description'></textarea>
					</div>
				</div>

				<div id='edit_error' class='form-group row'>
					<div class='col-12'>
						<p id='edit_error_message' class='text-center red'></p>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary update" style="font-size: 16px;">Update</button>
			</div>
		</div>
	</div>
</div>