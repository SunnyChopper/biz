@extends('layouts.app')

@section('content')
	@include('layouts.banner')

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
			Helper Functions
		\* ----------------- */

		function setupEditor() {
			tinymce.init({
				selector: '#description',
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

			pages.forEach(function(page) {
				html += `
					<tr>
						<td style='vertical-align: middle;'>` + page["section"] + `</td>
						<td style='vertical-align: middle;'>` + page["order"] + `</td>
						<td style='vertical-align: middle;'>` + page["title"] + `</td>
						<td style='vertical-align: middle;'>` + page["views"] + `</td>
						<td style='vertical-align: middle;'>
							<button type='button' data-id='` + page["id"] + `' class='btn btn-sm btn-primary m-2 edit_page_button' style='float: right;'>Edit Page</button>
							<button type='button' data-id='` + page["id"] + `' class='btn btn-sm btn-danger m-2 delete_page_button' style='float: right;'>Delete Page</button>
						</td>
					</tr>
				`;
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