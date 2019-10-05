<?php $this->load->view('frontend/header'); ?>
<?php $this->load->view('frontend/general_header'); ?>

<!-- Single Product -->

<div class="single_product">
	<div class="container">
		<div class="row">

			<!-- Images -->
			<div class="col-lg-2 order-lg-1 order-2">
				<ul class="image_list">
					<?php
					if(empty($produk->foto)) { ?>
					<li data-image="<?php echo base_url()?>assets/images/produk/no_image_thumb.png">
						<?php } else { ?>
						<li data-image="<?php echo base_url()?>assets/images/produk/<?php echo $produk->foto.$produk->foto_type ?>">
							<?php } ?>
							<?php
							if(empty($produk->foto)) {
								echo "<img src='".base_url()."assets/images/no_image_thumb.png' >";}
								else
								{
									echo "
									<img src='".base_url()."assets/images/produk/".$produk->foto.'_thumb'.$produk->foto_type."' title='$produk->judul_produk' alt='$produk->judul_produk' > ";} ?>
								</li>
								<?php
								if(empty($produk->foto_b)) { ?>
								<li data-image="<?php echo base_url()?>assets/images/produk/no_image_thumb.png">
									<?php } else { ?>
									<li data-image="<?php echo base_url()?>assets/images/produk/<?php echo $produk->foto_b.$produk->foto_type_b ?>">
										<?php } ?>
										<?php
										if(empty($produk->foto_b)) {
											echo "<img src='".base_url()."assets/images/no_image_thumb.png' >";}
											else
											{
												echo "
												<img src='".base_url()."assets/images/produk/".$produk->foto_b.$produk->foto_type."' title='$produk->judul_produk' alt='$produk->judul_produk' > ";} ?>
											</li>
											<?php
											if(empty($produk->foto_c)) { ?>
											<li data-image="<?php echo base_url()?>assets/images/produk/no_image_thumb.png">
												<?php } else { ?>
												<li data-image="<?php echo base_url()?>assets/images/produk/<?php echo $produk->foto_c.$produk->foto_type_c ?>">
													<?php } ?>
													<?php
													if(empty($produk->foto_c)) {
														echo "<img src='".base_url()."assets/images/no_image_thumb.png' >";}
														else
														{
															echo "
															<img src='".base_url()."assets/images/produk/".$produk->foto_c.$produk->foto_type_c."' title='$produk->judul_produk' alt='$produk->judul_produk' > ";} ?>
														</li>
													</ul>
												</div>

												<!-- Selected Image -->
												<div class="col-lg-5 order-lg-2 order-1">
													<div class="image_selected">
														<?php
														if(empty($produk->foto)) {echo "<img class='img-thumbnail' src='".base_url()."assets/images/no_image_thumb.png' width='400' height='450'  alt=''>";}
														else
														{
															echo "
															<img data-action='zoom' src='".base_url()."assets/images/produk/".$produk->foto.$produk->foto_type."' title='$produk->judul_produk' alt='$produk->judul_produk' width='450' height='500'>
														</a>";}
														?>
													</div>
												</div>

												<!-- Description -->
												<div class="col-lg-5 order-3">
													<div class="product_description">
														<div><a class="product_category" href="<?php echo base_url('kategori/read/').$produk->slug_kat ?>"><?php echo $produk->judul_kategori ?></a></div>
														<div class="product_name"><?php echo $produk->judul_produk ?></div>
														<div class="product_text">Stock : <span><?php if($produk->stok > 0){echo "<font style='font-size:15px'><span class='badge badge-pill badge-primary'>Tersedia</span></font>";}else{echo "<font style='font-size:15px'><span class='badge badge-pill badge-danger'>Kosong</span></font>";} ?></span> </div>
														<div class="product-text">
															Berat  : <span class='badge badge-pill badge-success'> <?php echo $produk->berat ?> Gram </span>
														</div>
														<div class="product_text"><p><?php echo $produk->deskripsi ?>.</p></div>
														<div class="order_info d-flex flex-row">
															<div class="product_price">Rp <?php echo number_format($produk->harga_diskon) ?><span>Rp <?php echo number_format($produk->harga_normal) ?></span></div>
														</div>

														<div class="button_container">
															<a href="
															<?php if(isset($_SESSION['identity']) && $_SESSION['usertype'] == '5'){ ?>
															<?php echo base_url('cart/buy/')?><?php echo $produk->id_produk ?>
															<?php } else { ?>
															<?php echo base_url('auth/register') ?>
															<?php } ?>
															"><button type="button" class="button cart_button">Beli Sekarang</button></a>
														</div>
													</div>
												</div>

											</div>
										</div>
									</div>
									<?php $this->load->view('frontend/footer'); ?>
									<script src="<?php echo base_url()?>assets/layout/js/product_custom.js"></script>