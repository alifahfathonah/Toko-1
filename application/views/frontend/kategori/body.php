<?php $this->load->view('frontend/header'); ?>
<?php $this->load->view('frontend/general_header'); ?>
<div class="col-lg-12">

	<!-- Shop Content -->

	<div class="shop_content">
		<div class="shop_bar clearfix">
			<div class="shop_product_count"><span></span> Daftar Produk </div>
			<div class="shop_sorting">
				<span>Sort by:</span>
				<ul>
					<li>
						<span class="sorting_text">Rating<i class="fas fa-chevron-down"></span></i>
						<ul>
							<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>Rating</li>
							<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>Nama</li>
							<li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>Harga Termurah</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>

		<div class="product_grid">
			<div class="product_grid_border"></div>

			<!-- Product Item -->
			<?php 
			foreach($produk->result() as $kategori){ ?>

			<div class="product_item discount">
				<div class="product_border"></div>
				<div class="product_image d-flex flex-column align-items-center justify-content-center">
					<?php
					if(empty($kategori->foto)) {echo "<img class='card-img-top' src='".base_url()."assets/images/no_image_thumb.png'>";}
					else { echo " <img src='".base_url()."assets/images/produk/".$kategori->foto.'_thumb'.$kategori->foto_type."'> ";}
					?>
				</div>
				<div class="product_content">
					<div class="product_price"> <?php echo number_format($kategori->harga_diskon) ?><span>Rp <?php echo number_format($kategori->harga_normal) ?></span></div>
					<div class="product_name">
						<div><a href="<?php echo base_url("produk/$kategori->slug_produk ") ?>" tabindex="0"><?php echo character_limiter($kategori->judul_produk,20) ?></a>
						</div>
					</div>
					<div>
						<a href="
						<?php if(isset($_SESSION['identity']) && $_SESSION['usertype'] == '5'){ ?>
						<?php echo base_url('cart/buy/')?><?php echo $kategori->id_produk ?>
						<?php } else { ?>
						<?php echo base_url('auth/register') ?>
						<?php } ?>
						"><button class="btn btn-sm btn-outline-primary"><i class="fas fa-shopping-cart"></i> Beli</button></a>
						<a href="<?php echo base_url('produk/').$kategori->slug_produk ?>"><button class="btn btn-sm btn-outline-dark"><i class="fas fa-eye"></i> Detail</button></a>
					</div>
				</div>
				<ul class="product_marks">
					<li class="product_mark product_discount">-<?php echo $kategori->diskon ?>%</li>
				</ul>
			</div>
			<?php }
			
			?>

		</div>

		<!-- Shop Page Navigation -->
		<?php echo $this->pagination->create_links() ?>

	</div>

</div>
<div class="characteristics">
	<div class="container">
		<div class="row">

			<!-- Char. Item -->
			<div class="col-lg-3 col-md-6 char_col">

				<div class="char_item d-flex flex-row align-items-center justify-content-start">
					<div class="char_icon"><img src="<?php echo base_url()?>assets/layout/images/char_1.png" alt=""></div>
					<div class="char_content">
						<div class="char_title">Free Delivery</div>
						<div class="char_subtitle">from $50</div>
					</div>
				</div>
			</div>

			<!-- Char. Item -->
			<div class="col-lg-3 col-md-6 char_col">

				<div class="char_item d-flex flex-row align-items-center justify-content-start">
					<div class="char_icon"><img src="<?php echo base_url()?>assets/layout/images/char_2.png" alt=""></div>
					<div class="char_content">
						<div class="char_title">Free Delivery</div>
						<div class="char_subtitle">from $50</div>
					</div>
				</div>
			</div>

			<!-- Char. Item -->
			<div class="col-lg-3 col-md-6 char_col">

				<div class="char_item d-flex flex-row align-items-center justify-content-start">
					<div class="char_icon"><img src="<?php echo base_url()?>assets/layout/images/char_3.png" alt=""></div>
					<div class="char_content">
						<div class="char_title">Free Delivery</div>
						<div class="char_subtitle">from $50</div>
					</div>
				</div>
			</div>

			<!-- Char. Item -->
			<div class="col-lg-3 col-md-6 char_col">

				<div class="char_item d-flex flex-row align-items-center justify-content-start">
					<div class="char_icon"><img src="<?php echo base_url()?>assets/layout/images/char_4.png" alt=""></div>
					<div class="char_content">
						<div class="char_title">Free Delivery</div>
						<div class="char_subtitle">from $50</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('frontend/footer'); ?>

<script src="<?php echo base_url()?>assets/layout/js/shop_custom.js"></script>