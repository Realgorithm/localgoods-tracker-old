<?php include('db_connect.php'); ?>

<div class="container-fluid">

	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4 mb-3">
				<div class="card">
					<div class="card-header">
						expenses Form
					</div>
					<div class="card-body">
						<form action="" id="manage-expenses">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Expense For</label>
								<input type="text" class="form-control" name="name" required>
							</div>
							<div class="form-group">
								<label class="control-label">Expense Price</label>
								<input type="text" class="form-control" name="price" required>
							</div>
							<div class="form-group">
								<button class="btn btn-sm btn-primary col-sm-3 offset-md-3 mb-2"type="button"> Save</button>
								<button class="btn btn-sm btn-danger col-sm-3 mb-2" type="button" onclick="$('#manage-expenses').get(0).reset()"> Cancel</button>
							</div>

						</form>
					</div>
				</div>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="table-responsive-sm">
					<table class="table table-striped table-bordered border-warning table-primary">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Name</th>
								<th scope="col">Price</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							$cats = shop_conn($dbName)->query("SELECT * FROM expenses_list order by id asc");
							while ($row = $cats->fetch_assoc()) :
							?>
								<tr>
									<td scope="row"><?php echo $i++ ?></td>
									<td>
										<?php echo $row['name'] ?>
									</td>
									<td>
										<?php echo $row['price'] ?>
									</td>
									<td>
										<button class="btn btn-sm btn-primary edit_cat mb-2" type="button" data-id="<?php echo $row['id'] ?>" data-name="<?php echo $row['name'] ?>">Edit</button>
										<button class="btn btn-sm btn-danger delete_cat mb-2" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
									</td>
								</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>

</div>
<style>
	td {
		vertical-align: middle !important;
	}
</style>
<script>
	$('#manage-expenses').submit(function(e) {
		e.preventDefault()
		start_load()
		$.ajax({
			url: 'ajax.php?action=save_expenses',
			data: new FormData($(this)[0]),
			cache: false,
			contentType: false,
			processData: false,
			method: 'POST',
			type: 'POST',
			success: function(resp) {
				if (resp == 1) {
					alert_toast("Data successfully added", 'success')
					setTimeout(function() {
						location.reload()
					}, 1500)

				} else if (resp == 2) {
					alert_toast("Data successfully updated", 'success')
					setTimeout(function() {
						location.reload()
					}, 1500)

				}
			}
		})
	})
	$('.edit_cat').click(function() {
		start_load()
		var cat = $('#manage-expenses')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='name']").val($(this).attr('data-name'))
		cat.find("[name='price']").val($(this).attr('data-price'))
		end_load()
	})
	$('.delete_cat').click(function() {
		_conf("Are you sure to delete this expenses?", "delete_cat", [$(this).attr('data-id')])
	})

	function delete_cat($id) {
		start_load()
		$.ajax({
			url: 'ajax.php?action=delete_expenses',
			method: 'POST',
			data: {
				id: $id
			},
			success: function(resp) {
				if (resp == 1) {
					alert_toast("Data successfully deleted", 'success')
					setTimeout(function() {
						location.reload()
					}, 1500)

				}
			}
		})
	}
</script>