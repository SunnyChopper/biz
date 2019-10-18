@extends('layouts.app')

@section('content')
	@include('layouts.banner')
	@include('admin.pages.modals.create')
	@include('admin.pages.modals.edit')

	<div class='container pt-64 pb-64'>
		<div class='row justify-content-center'>
			<div class='col-12 p-32' style='background: hsl(0, 0%, 97.5%); border-radius: 5px; border-bottom: 4px solid hsl(0, 0%, 90%);'>
				<h5>Edit Basic Information</h5>
				<hr />

				<form action='{{ url('/admin/kit/' . $kit->id . '/edit') }}' method='POST'>
					{{ csrf_field() }}
					<div class='form-group row'>
						<div class='col-12'>
							<label>Cover Image URL:</label>
							<input type='text' class='form-control' name='image_url' value='{{ $kit->image_url }}' required>
						</div>
					</div>

					<div class='form-group row'>
						<div class='col-lg-12'>
							<label>Title:</label>
							<input type='text' class='form-control' name='title' value='{{ $kit->title }}' required>
						</div>
					</div>

					<div class='form-group row'>
						<div class='col-12'>
							<label>Description:</label>
							<textarea id='description' class='form-control' rows='8'>{{ $kit->description }}</textarea>
						</div>
					</div>

					<div class='form-group row'>
						<div class='col-12'>
							<input type='submit' class='btn btn-primary centered' value='Update Kit'>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div style='background: hsl(0, 0%, 95%);'>
		<div class='container pt-64 pb-64'>
			<div class='row'>
				<div class='col-12'>
					<h3>Pages for this Kit</h3>
					<div id='pages_container'></div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
	<script src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=xq9hzw57g3zkmakqchurmgo9hnprenmg1yopn8cirghphy2x'></script>
	<script type="text/javascript">
		var _token = '{{ csrf_token() }}';
		var pages = Array();

		/* ----------------- *\
			Buttons
		\* ----------------- */

		$(document.body).on('click', '.create_page_button', function() {
			$('#new_page_modal').modal();
		});

		$(document.body).on('click', '.edit_page_button', function() {
			var index = $(this).data('index');
			var page = pages[index];
			$('#edit_page_id').val(page["id"]);
			$('#edit_section').val(page["section"]);
			$('#edit_order').val(page["order"]);
			$('#edit_title').val(page["title"]);
			tinymce.get('edit_description').setContent(page["body"]);
			$('#edit_page_modal').modal();
		});

		$(".update").on('click', function() {
			if (validateEditInput() == true) {
				var section = $('#edit_section').val();
				var order = $('#edit_order').val();
				var title = $('#edit_title').val();
				var description = tinymce.get('edit_description').getContent();

				$.ajax({
					url : '/api/pages/edit',
					type : 'POST',
					data : {
						'_token' : _token,
						'page_id' : $('#edit_page_id').val(),
						'section' : section,
						'order' : order,
						'title' : title,
						'body' : description
					},
					success : function(data) {
						if (data == true) {
							fetchPages();
							$('#edit_page_modal').modal('hide');
						}
					}
				});
			} else {
				$('#edit_error').show();
				$('#edit_error_message').html('Please fill out all required fields.');
			}
		});

		$(".create").on('click', function() {
			if (validateCreateInput() == true) {
				var section = $('#create_section').val();
				var order = $('#create_order').val();
				var title = $('#create_title').val();
				var description = tinymce.get('create_description').getContent();

				$('#error').hide();
				
				$.ajax({
					url : '/api/pages/create',
					type : 'POST',
					data : {
						'_token' : _token,
						'kit_id' : $('#create_kit_id').val(),
						'section' : section,
						'order' : order,
						'title' : title,
						'body' : description
					},
					success : function(data) {
						if (data == true) {
							clearInput();
							fetchPages();
							$('#new_page_modal').modal('hide');
						}
					}
				});
			} else {
				$('#error').show();
				$('#error_message').html('Please fill out all fields.');
			}
		});

		/* ----------------- *\
			Helper Functions
		\* ----------------- */

		function validateCreateInput() {
			var section = $('#create_section').val();
			var order = $('#create_order').val();
			var title = $('#create_title').val();
			var description = tinymce.get('create_description').getContent();

			if (section != "" && order != "" && title != "" && description != "") {
				return true;
			} else {
				return false;
			}
		}

		function validateEditInput() {
			var section = $('#edit_section').val();
			var order = $('#edit_order').val();
			var title = $('#edit_title').val();
			var description = tinymce.get('edit_description').getContent();

			if (section != "" && order != "" && title != "" && description != "") {
				return true;
			} else {
				return false;
			}
		}

		function clearInput() {
			$('#create_section').val('');
			$('#create_order').val('');
			$('#create_title').val('');
			$('#create_description').val('');
		}

		function setupEditor() {
			tinymce.init({
				selector: '#description',
				plugins: "code"
			});

			tinymce.init({
				selector: '#edit_description',
				plugins: "code"
			});

			tinymce.init({
				selector: '#create_description',
				plugins: "code"
			});
		}

		function showTablePages() {
			var html = `
				<div class='mt-16' style='overflow: auto;'>
					<table class='table table-striped'>
						<thead>
							<tr>
								<th>Section</th>
								<th>Order</th>
								<th>Title</th>
								<th>Views</th>
								<th></th>
							</tr>
						</thead>
						<tbody>`;

			var index = 0;
			pages.forEach(function(page) {
				html += `
					<tr>
						<td style='vertical-align: middle;'>` + page["section"] + `</td>
						<td style='vertical-align: middle;'>` + page["order"] + `</td>
						<td style='vertical-align: middle;'>` + page["title"] + `</td>
						<td style='vertical-align: middle;'>` + page["views"] + `</td>
						<td style='vertical-align: middle;'>
							<button type='button' data-index='` + index + `' data-id='` + page["id"] + `' class='btn btn-sm btn-primary m-2 edit_page_button' style='float: right;'>Edit Page</button>
							<button type='button' data-id='` + page["id"] + `' class='btn btn-sm btn-danger m-2 delete_page_button' style='float: right;'>Delete Page</button>
						</td>
					</tr>
				`;

				index++;
			});

			html +=	`</tbody>
					</table>
				</div>
			`;

			$('#pages_container').html(html); 
		}

		function showEmptyPages() {
			var html = `
				<div class='mt-16'>
					<p>There are currently no pages for this starter kit. Click below to get started on creating the first page.</p>
					<button type='button' class='btn btn-primary create_page_button'>Create Page</button>
				</div>
			`;

			$('#pages_container').html(html);
		}

		function updateUI() {
			if (pages.length > 0) {
				showTablePages();
			} else {
				showEmptyPages();
			}
		}

		function fetchPages() {
			$.ajax({
				url : '/api/kits/{{ $kit->id }}/pages',
				type : 'GET',
				success : function(data) {
					pages = data;
					updateUI();
				}
			});
		}

		/* ----------------- *\
			Document Ready
		\* ----------------- */

		$(document).ready(function() {
			setupEditor();
			fetchPages();
		});

	</script>
@endsection