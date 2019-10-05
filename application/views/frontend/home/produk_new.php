<!-- Popular Categories -->

<div class="popular_categories">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="popular_categories_content">
					<div class="popular_categories_title">Kategori Produk</div>
					<div class="popular_categories_slider_nav">
						<div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
						<div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
					</div>
					<div class="popular_categories_link"><a href="#">full catalog</a></div>
				</div>
			</div>
			
			<!-- Popular Categories Slider -->

			<div class="col-lg-9">
				<div class="popular_categories_slider_container">
					<div class="owl-carousel owl-theme popular_categories_slider">

						<!-- Popular Categories Item -->
						<?php
						foreach ($kategori_new_data as $kategori) { ?>
						<div class="owl-item">
							<div class="popular_category d-flex flex-column align-items-center justify-content-center">
								<div class="popular_category_image">
									<?php if (!empty($kategori->slug_kat)) { ?>
									<a href="<?php echo base_url('kategori/read/'.$kategori->slug_kat) ?>">
										<?php } else { ?>
										<a href="">
											<?php } ?>
											<img src="<?php echo base_url()?>assets/images/kategori/<?php echo $kategori->icon.$kategori->icon_type ?>" alt=""></a>
										</div>
										<div class="popular_category_text"><?php echo character_limiter($kategori->judul_kategori,30) ?></div>
									</div>
								</div>	
								<?php }
								?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Best Sellers -->

		<div class="best_sellers">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="tabbed_container">
							<div class="tabs clearfix tabs-right">
								<div class="new_arrivals_title">Produk Pilihan</div>
								<ul class="clearfix">
									<li class="active">12 Terbaru</li>
								</ul>
								<div class="tabs_line"><span></span></div>
							</div>

							<div class="bestsellers_panel panel active">

								<!-- Best Sellers Slider -->

								<div class="bestsellers_slider slider">

									<!-- Best Sellers Item -->
									<?php foreach($produk_new_data as $produk){ ?>
									<div class="bestsellers_item discount">
										<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
											<div class="bestsellers_image">
												<?php
												if(empty($produk->foto)) {echo "<img src='".base_url()."assets/images/no_image_thumb.png'>";}
												else { echo "<img src='".base_url()."assets/images/produk/".$produk->foto.'_thumb'.$produk->foto_type."'> ";} ?>
											</div>
											<div class="bestsellers_content">
												<div class="bestsellers_category"><a></a></div>
												<div class="bestsellers_name"><a href="<?php echo base_url("produk/$produk->slug_produk ") ?>"><?php echo character_limiter($produk->judul_produk,30) ?></a></div>
												<div class="bestsellers_price discount">Rp. <?php echo number_format($produk->harga_diskon) ?><span>Rp. <?php echo number_format($produk->harga_normal) ?></span></div>
												<div>
													<a href="
													<?php if(isset($_SESSION['identity']) && $_SESSION['usertype'] == '5'){ ?>
													<?php echo base_url('cart/buy/')?><?php echo $produk->id_produk ?>
													<?php } else { ?>
													<?php echo base_url('auth/register') ?>
													<?php } ?>
													"><button class="btn btn-sm btn-outline-primary"><i class="fas fa-shopping-cart"></i> Beli</button></a>
													<a href="<?php echo base_url('produk/').$produk->slug_produk ?>"><button class="btn btn-sm btn-outline-dark"><i class="fas fa-eye"></i> Lihat</button></a>
												</div>
											</div>
										</div>
										<div class="bestsellers_fav active"></div>
										<ul class="bestsellers_marks">
											<li class="bestsellers_mark bestsellers_discount">-<?php echo $produk->diskon ?>%</li>
										</ul>
									</div>
									<?php } ?>


								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>