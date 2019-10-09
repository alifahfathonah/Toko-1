<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Tables</h3>
					<div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Striped Row</h3>
								</div>
								<div class="panel-body">
									<table id="table" class="table table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>Gambar</th>
												<th>Nama</th>
												<th>Harga</th>
												<th>Stock</th>
												<th>Lihat</th>
												<th>Booking</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
							<!-- END TABLE STRIPED -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
<script src="<?php echo base_url('assets/plugins/datatables/') ?>jquery.dataTables.js"></script>
<script src="<?php echo base_url('assets/plugins/datatables/') ?>dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function() {
        var t = $('#table').DataTable( {
            "ajax": '<?php echo site_url('toko/reseller/data'); ?>',
            "order": [[ 2, 'asc' ]],
            "columns": [
            {
                "data": null,
                "width": "50px",
                "sClass": "text-center",
                "orderable": false,
            },
            { "data": "gambar"},
            { "data": "nama" },
            { "data": "harga" },
            { "data": "stock", "width": "150px" },
            { "data": "detail","width": "75px", "sClass": "text-center" },
            { "data": "tambah","width": "75px", "sClass": "text-center" },
            ]
        } );

        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    } );
</script>