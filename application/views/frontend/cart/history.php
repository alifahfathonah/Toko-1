<?php $this->load->view('frontend/header'); ?>
<?php $this->load->view('frontend/general_header'); ?>

<!-- Cart -->
<div class="container">
	<div class="row">

		<div class="col-lg-12">
			<hr><h3>Riwayat Transaksi</h3><hr>
			<div class="row">
				<div class="col-lg-12">
					<div class="box-body table-responsive padding">
						<?php if(empty($cek_cart_history->id_trans)){echo "Anda belum ada transaksi";}else{ ?>
						<table id="datatable" class="table table-borderless table-striped table-hover">
							<thead>
								<tr>
									<th style="text-align: center">No.</th>
									<th style="text-align: center">Invoice</th>
									<th style="text-align: center">Dibuat</th>
									<th style="text-align: center">Jasa Pengiriman</th>
									<th style="text-align: center">Status</th>
									<th style="text-align: center">Nomor Resi</th>
									<th style="text-align: center">Detail</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach ($cart_history as $history){ ?>
								<tr>
									<td style="text-align:center"><?php echo $no++ ?></td>
									<td style="text-align:center"><?php echo $history->id_trans ?></a></td>
									<td style="text-align:center"><?php echo $history->created ?></td>
									<td style="text-align:center"><?php echo strtoupper($history->kurir).' '.$history->service ?></td>
									<td style="text-align:center">
										<?php if($history->status == '1'){ ?>
										<button type="button" name="status" class="btn btn-sm btn-danger"> MENUNGGU KONFIRMASI</button>
										<?php } elseif($history->status == '2'){ ?>
										<button type="button" name="status" class="btn btn-sm btn-primary">DALAM PROSES</button>
										<?php } elseif($history->status == '3'){ ?>
										<button type="button" name="status" class="btn btn-sm btn-success">TELAH DIKIRIM</button>
										<?php } ?>
									</td>
									<td style="text-align:center">
										<?php if($history->resi != NULL){echo $history->resi;}else{echo "Belum ada";} ?>
									</td>
									<td style="text-align:center">
										<a href="<?php echo base_url('cart/history_detail/').$history->id_trans ?>">
											<button name="update" class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i></button>
										</a>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('frontend/footer'); ?>