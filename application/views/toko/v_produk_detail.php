<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Panels</h3>
					<div class="row">
						<div class="col-md-8">
							<!-- PANEL HEADLINE -->
							<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title"><?php echo $produk->judul_produk; ?></h3>
									<p class="panel-subtitle">Rp. <?php echo $produk->harga_diskon; ?></p>
								</div>
								<div class="panel-body">
									<h4><b>DESKRIPSI</b></h4>
									<p><?php echo $produk->deskripsi; ?></p>
								</div>
							</div>
							<!-- END PANEL HEADLINE -->
						</div>
						<div class="col-md-4">
							<!-- PANEL NO PADDING -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Gambar</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding text-center">
									<div class="">
									<img src="<?php echo base_url('assets/images/produk/'.$produk->foto.$produk->foto_type) ?>" width="250px">
									</div>
								</div>
							</div>
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Gambar</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding text-center">
									<div class="">
									<img src="<?php echo base_url('assets/images/produk/'.$produk->foto_b.$produk->foto_type_b) ?>" width="250px">
									</div>
								</div>
							</div>
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Gambar</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding text-center">
									<div class="">
									<img src="<?php echo base_url('assets/images/produk/'.$produk->foto_c.$produk->foto_type_c) ?>" width="250px">
									</div>
								</div>
							</div>
							<!-- END PANEL NO PADDING -->
						</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>