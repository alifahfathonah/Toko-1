<?php $this->load->view('frontend/header'); ?>
<?php $this->load->view('frontend/general_header'); ?>

<!-- Cart -->

<div class="cart_section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="cart_container">
					<div class="cart_title">Keranjang</div>
					<?php $no=1; foreach ($cart_data as $cart){ ?>
					<div class="cart_items">
						<ul class="cart_list">
							<li class="cart_item clearfix">
								<div class="cart_item_image">
									<img src="<?php echo base_url()?>assets/images/produk/<?php echo $cart->foto.$cart->foto_type ?>" alt=""></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Nama</div>
											<div class="cart_item_text"><?php echo character_limiter($cart->judul_produk,20) ?></div>
										</div>
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Berat</div>
											<div class="cart_item_text"><?php echo $cart->berat ?> Gram</div>
										</div>
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Berat Total</div>
											<div class="cart_item_text"><?php echo $cart->total_berat ?> Gram</div>
										</div>
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">Harga</div>
											<div class="cart_item_text"><?php echo number_format($cart->harga_diskon) ?></div>
										</div>

										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Total</div>
											<div class="cart_item_text"><?php echo number_format($cart->subtotal) ?></div>
										</div>
										<?php echo form_open('cart/update/'.$cart->produk_id,'class="form-group"'); ?>
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Quantity</div>
											<div class="cart_item_text">
												<input type="hidden" name="produk_id" value="<?php echo $cart->produk_id ?>">
												<input type="number" name="qty" class="form-control" style="width: 70px" value="<?php echo $cart->total_qty ?>">
												<div class="cart_item_text">
													<button class="btn btn-outline-primary btn-sm" type="submit" name="update">Perbarui Qty</button>
													<button class="btn btn-outline-danger btn-sm" type="submit" name="delete"><i class="fa fa-trash"></i></button>
												</div>

											</div>
										</div>
										<?php echo form_close(); ?>
									</li>
								</ul>
							</div>
							<?php } ?>

							<hr><h4>Konfirmasi Transaksi</h4><hr>
							<?php echo form_open('cart/checkout') ?>
							<table class="table table-borderless table-striped table-hover">
								<tbody>
									<tr>
										<th>Catatan Keterangan</th>
										<td colspan="2" align="right">
											<input type="text" class="form-control" name="catatan"></input>
										</td>
									</tr>
									<tr>
										<th>Total Berat</th>
										<td colspan="2" align="right"> <?php echo berat($total_berat_dan_subtotal->total_berat) ?> Kg</td>
									</tr>
									<tr>
										<th>Total Harga Barang</th>
										<td></td>
										<td align="right"><?php echo $total_berat_dan_subtotal->subtotal ?></td>
									</tr>
									<tr>
										<th> Biaya Kirim</th>
										<td>
											<select name="kurir" class="kurir" required>
												<option value="">Pilih Kurir</option>
												<?php
												$kurir=array('jne','pos','tiki');
												foreach($kurir as $data_kurir){
													?>
													<option value="<?=$data_kurir;?>"><?=strtoupper($data_kurir);?></option>
													<?php } ?>
												</select>
											</td>
											<td align="right"><font id="totalongkir"></font></td>
										</tr>
										<tr>
											<th> Kurir</th>
											<td>
												<div id="kuririnfo" style="display: none;"><br>
													<div class="col-lg-12">
														<p class="form-control-static" id="kurirserviceinfo"></p>
													</div>
												</div>
											</td>
											<td>
												<div>Refresh halaman untuk memilih kurir kembali</div>
											</td>
										</tr>
									</tbody>
								</table>

								<div class="row">
									<div class="col-lg-12">
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
													<td align="center"><?php if($customer_data){echo $customer_data->name;} ?></td>
													<td align="center"><?php if($customer_data){echo $customer_data->phone;} ?></td>
													<td align="center"><?php if($customer_data){echo $customer_data->address.', '.$customer_data->nama_kota.', '.$customer_data->nama_provinsi;}?></td>
												</tr>
											</tbody>
										</table>
										<h4>Perhatian</h4>
										<ul>
											<li>Periksa <b>alamat</b> dan <b>kontak</b>, <a href="<?php echo base_url('auth/edit_profil/').$this->session->userdata('user_id') ?>">klik disini</a> untuk mengubah data alamat dan informasi kontak user.</li>
										</ul>
									</div>
								</div>

								<?php if(!empty($customer_data->id_trans)){ ?>
								<div class="row">
									<div class="col-lg-12">
									</div>
								</div>
								<input type="hidden" name="id_trans" value="<?php echo $customer_data->id_trans ?>">
								<input type="hidden" name="total" id="total" value="<?php echo $total_berat_dan_subtotal->subtotal ?>"/>
								<input type="hidden" name="ongkir" id="ongkir" value="0"/>
								<?php } ?>

								<!-- Order Total -->
								<div class="order_total">
									<div class="order_total_content text-md-right">
										<div class="order_total_title">Total Bayar :</div>
										<div class="order_total_amount"><div id="grandtotal"></div></div>
									</div>
								</div>
								<div class="cart_buttons">
									<a href="<?php echo base_url('cart/empty_cart/').$customer_data->id_trans ?>">
										<button name="hapus" type="button" class="btn btn-sm btn-outline-danger" aria-label="Left Align" title="Kosongkan Keranjang" OnClick="return confirm('Apakah Anda yakin?');"> <i class=" fas fa-trash"></i> Kosongkan</button>
									</a>
									<a href="<?php echo base_url() ?>">
										<button name="hapus" type="button" class="btn btn-sm btn-outline-success" aria-label="Left Align" title="Lanjut Belanja"><i class="fas fa-shopping-cart"></i> Cari Lagi
										</button>
									</a>
								</div>
								<div class="cart_buttons">
									<button name="checkout" type="submit" class="btn btn-lg btn-primary"><i class="fas fa-calculator"></i> Bayar</button>
								</div>
							</div>

							<?php echo form_close() ?>
						</div>
					</div>
				</div>
			</div>
			<?php $this->load->view('frontend/footer'); ?>
			<script src="<?php echo base_url()?>assets/layout/js/cart_custom.js"></script>
			<script type="text/javascript">
				$(document).ready(function()
				{
					$(".kurir").each(function(){
						$(this).on("change",function(){
							var did=$(this).val();
							var berat="<?php echo $total_berat_dan_subtotal->total_berat ?>";
							var kota="<?php echo $customer_data->kota ?>";
							$.ajax({
								method: "get",
								dataType:"html",
								url: "<?=base_url();?>cart/kurirdata",
								data: "kurir="+did+"&berat="+berat+"&kota="+kota,
							})
							.done(function(x) {
								$("#kurirserviceinfo").html(x);
								$("#kuririnfo").show();
							})
							.fail(function() {
								$("#kurirserviceinfo").html("");
								$("#kuririnfo").hide();
							});
						});
					});
					hitung();
				});

				function hitung()
				{
					var total=$('#total').val();
					var ongkir=$("#ongkir").val();
					var totalongkir= ongkir;
					var bayar=(parseFloat(total)+parseFloat(totalongkir));
					if(parseFloat(ongkir) > 0)
					{
						$("#oksimpan").show();
					}else{
						$("#oksimpan").hide();
					}
					$("#totalongkir").html(totalongkir);
					$("#grandtotal").html(bayar);
				}
			</script>