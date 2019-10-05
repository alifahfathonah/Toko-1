<?php $this->load->view('frontend/header'); ?>
<?php $this->load->view('frontend/general_header'); ?>

<div class="container">
	<div class="row">

		<div class="col-lg-12">
			<h3>Transaksi Selesai</h3><hr>
			<h4>Nomor Invoice : <?php echo $customer_data->id_trans ?></h4>
			<?php echo form_open('cart/download_invoice/'.$customer_data->id_trans) ?>
			<button type="submit" name="download_invoice" class="btn btn-sm btn-outline-dark"><i class="fas fa-print"></i> Cetak Invoice</button>
			<?php echo form_close() ?>
			<br>
			<div class="row">
				<div class="col-lg-12">
					<div class="box-body table-responsive padding">
						<table id="datatable" class="table table-borderless table-striped table-hover">
							<thead>
								<tr>
									<th style="text-align: center">Gambar</th>
									<th style="text-align: center">Nama</th>
									<th style="text-align: center">Catatan</th>
									<th style="text-align: center">Harga</th>
									<th style="text-align: center">Berat</th>
									<th style="text-align: center">Total Berat</th>
									<th style="text-align: center">Qty</th>
									<th style="text-align: center">Total Harga Barang</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($cart_finished as $cart){ ?>
								<tr>
									<td style="text-align:center"><img src="<?php echo base_url()?>assets/images/produk/<?php echo $cart->foto.$cart->foto_type ?>" width="100px" ></td>
									<td style="text-align:left"><?php echo $cart->judul_produk ?></td>
									<td style="text-align:left"><?php echo $cart->catatan ?></td>
									<td style="text-align:center"><?php echo number_format($cart->harga_diskon) ?></td>
									<td style="text-align:center"><?php echo $cart->berat ?> Gram</td>
									<td style="text-align:center"><?php echo $cart->total_berat ?> Gram</td>
									<td style="text-align:center"><?php echo $cart->total_qty ?></td>
									<td style="text-align:right"><?php echo number_format($cart->subtotal) ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<table class="table table-borderless table-striped table-hover">
						<tbody>
							<tr>
								<th>Total Berat</th>
								<td colspan="2" align="right"><?php echo berat($total_berat_dan_subtotal->total_berat) ?> Kg</td>
							</tr>
							<tr>
								<th>Total Harga Barang</th>
								<td></td>
								<td align="right"><?php echo number_format($total_berat_dan_subtotal->subtotal) ?></td>
							</tr>
							<tr>
								<th>Biaya Pengiriman</th>
								<td align="right"><?php echo strtoupper($customer_data->kurir).' '.$customer_data->service ?></td>
								<td align="right"><?php echo number_format($customer_data->ongkir) ?></td>
							</tr>
							<tr>
								<th scope="row">Total Bayar</th>
								<td align="right"></td>
								<td align="right"><b>Rp. <?php echo number_format($customer_data->ongkir + $total_berat_dan_subtotal->subtotal) ?></b></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<hr><h4>Alamat Tujuan</h4><hr>
					<table class="table table-borderless table-striped table-hover">
						<thead>
							<tr>
								<th style="text-align: center">Nama</th>
								<th style="text-align: center">No. HP</th>
								<th style="text-align: center">Alamat</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td align="center"><?php echo $customer_data->name ?></td>
								<td align="center"><?php echo $customer_data->phone ?></td>
								<td align="center"><?php echo $customer_data->address.', '.$customer_data->nama_provinsi.', '.$customer_data->nama_kota?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<hr><h4>Lakukan Pembayaran dengan Cara Transfer ke Rekening Bank Dibawah </h4><hr>
					<table class="table table-borderless table-striped table-hover">
						<thead>
							<tr>
								<th style="text-align: center">Bank</th>
								<th style="text-align: center">Atas Nama</th>
								<th style="text-align: center">No. Rekening</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($data_bank as $bank){ ?>
							<tr>
								<td align="center"><?php echo $bank->nama_bank ?></td>
								<td align="center"><?php echo $bank->atas_nama ?></td>
								<td align="center"><?php echo $bank->norek ?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<h4>PERHATIAN</h4>
					<ul>
						<li>Lakukan konfirmasi pembayaran dengan mengupload bukti pembayaran 
							<?= form_open('page/konfirmasi_pembayaran'); ?>
							<input type="hidden" name="invoice" value="<?= $customer_data->id_trans; ?>">
							<input type="hidden" name="grandtot" value="<?= $customer_data->ongkir + $total_berat_dan_subtotal->subtotal ?>">
							<?php
							$data = array(
								'type'	=> 'submit',
								'value'	=> 'klik di sini',
								'class'	=> 'btn btn-sm btn-outline-primary'
								);
								?>
								<?= form_submit($data) ?>
								<?= form_close(); ?>
							</li>
							<li>Kami akan segera memproses pesanan anda setelah konfirmasi pembayaran selesai.</li>
						</ul>
						<p>Terima kasih telah berbelanja di <?php echo $company->company_name ?>.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view('frontend/footer'); ?>
