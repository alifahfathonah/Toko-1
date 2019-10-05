	<!-- Header -->
	
	<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="<?php echo base_url()?>assets/layout/images/phone.png" alt=""></div><?php echo $company->company_phone ?></div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="<?php echo base_url()?>assets/layout/images/mail.png" alt=""></div><a href="mailto:<?php echo $company->company_email ?>"><?php echo $company->company_email ?></a></div>
						<div class="top_bar_content ml-auto">
							<?php if(isset($_SESSION['identity']) && $_SESSION['usertype'] == '5'){ ?>
							<div class="top_bar_menu">
								<ul class="standard_dropdown top_bar_dropdown">
									<li>
										<a href="#">Detail Users<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li><a href="<?php echo base_url('cart/history/')?>">Riwayat Transaksi</a></li>
											<li><a href="<?php echo base_url('auth/profil/')?>">Lihat Profile</a></li>
											<li><a href="<?php echo base_url('auth/edit_profil/').$this->session->userdata('user_id') ?>">Edit Profile</a></li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="top_bar_user">
								<div class="user_icon"><img src="<?php echo base_url()?>assets/layout/images/user.svg" alt=""></div>
								<div><a href=""><?php echo $this->session->userdata('username') ?></a></div>
								<div><a href="<?php echo base_url('auth/logout/')?>">Logout</a></div>
							</div>

							<?php } else { ?>
							<div class="top_bar_user">
								<div class="user_icon"><img src="<?php echo base_url()?>assets/layout/images/user.svg" alt=""></div>
								<div><a href="<?php echo base_url('auth/login') ?>">Signin</a></div>
							</div>
							
							<?php } ?>
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="<?php echo base_url(); ?>"><?php echo $company->company_name ?></a></div>
						</div>
					</div>

					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<?php echo form_open('produk/cari_produk/','class="header_search_form clearfix"') ?>
									<input type="text" name="cari" required="required" class="header_search_input" placeholder="Cari Produk yang Anda Cari">
									<div class="custom_dropdown">
										<div class="custom_dropdown_list">
											<span class="custom_dropdown_placeholder clc">Di Toko Kami</span>
											<ul class="custom_list clc">
											</ul>
										</div>
									</div>
									<button type="submit" class="header_search_button trans_300" value="submit"><img src="<?php echo base_url()?>assets/layout/images/search.png" alt=""></button>
									<?php echo form_close() ?>
								</div>
							</div>
						</div>
					</div>

					<!-- Wishlist -->
					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
							<!-- Cart -->
							
							<?php if(isset($_SESSION['identity']) && $_SESSION['usertype'] == '5'){ ?>
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<div class="cart_icon">
										<a href="<?php echo base_url('cart') ?>">
											<img src="<?php echo base_url()?>assets/layout/images/cart.png" alt=""></a>
											<div class="cart_count"><span><?php echo $total_cart_navbar ?></span></div>
										</div>
										<div class="cart_content">
											<div class="cart_text">Cart</div>
											<div class="cart_price">Produk</div>
										</div>
									</div>
								</div>
								<?php } else { ?>
								<div class="cart">
									<div class="cart_container d-flex flex-row align-items-center justify-content-end">
										<div class="cart_icon"><a href="<?php echo base_url('auth/register') ?>">
											<img src="<?php echo base_url()?>assets/layout/images/cart.png" alt=""></a>
											<div class="cart_count"><span><?php echo $total_cart_navbar ?></span></div>
										</div>
										<div class="cart_content">
											<div class="cart_text">Cart</div>
											<div class="cart_price">Produk</div>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Main Navigation -->

			<nav class="main_nav">
				<div class="container">
					<div class="row">
						<div class="col">

							<div class="main_nav_content d-flex flex-row">

								<!-- Categories Menu -->

								<div class="cat_menu_container">
									<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
										<div class="cat_burger"><span></span><span></span><span></span></div>
										<div class="cat_menu_text">kategori</div>
									</div>

									<ul class="cat_menu">
										<li><a href="<?php echo base_url('produk/katalog/') ?>">Semua Kategori</a></li>
										<?php
						        $sql = $this->db->query("SELECT * FROM kategori ORDER BY judul_kategori"); // Memanggil kategori/ top kategori
						        $data = $sql->result();
						        foreach($data as $row)
						        {
						        	$id_kat = $row->id_kategori;
						        	echo '
						        	<li><a href="'.base_url('kategori/read/').$row->slug_kat.'">'.$row->judul_kategori.' </a>
						        		<ul>';

						          $sql2   =  $this->db->query("SELECT * FROM subkategori WHERE id_kat = '$id_kat' ORDER BY judul_subkategori "); // Memanggil subkategori/ middle kategori
						          $data2  = $sql2->result();
						          foreach($data2 as $row2)
						          {
						          	$id_sub = $row2->id_subkategori;
						          	echo '
						          	<li><a href="'.base_url('kategori/read/').$row->slug_kat.'/'.$row2->slug_subkat.'">'.$row2->judul_subkategori.'</a>';

						            $sql3 =  $this->db->query("SELECT * FROM supersubkategori WHERE id_subkat = '$id_sub' ORDER BY judul_supersubkategori "); // Memanggil subkategori/ middle kategori
						            $data3 = $sql3->result();
						            if($sql3->row() == TRUE)
						            {
						            	echo '<ul>';
						            	foreach($data3 as $row3)
						            	{
						            		$id_supersub = $row3->id_supersubkategori;
						            		echo '
						            		<li><a href="'.base_url('kategori/read/').$row->slug_kat.'/'.$row2->slug_subkat.'/'.$row3->slug_supersubkat.'">'.$row3->judul_supersubkategori.'</a></li>';
						            	}
						            	echo '
						            </ul>
						        </li>';
						    }
						    else
						    {
						    	foreach($data3 as $row3)
						    	{
						    		$id_supersub = $row3->id_supersubkategori;
						    		echo '<li><a href="'.base_url('kategori/read/').$row->slug_kat.'/'.$row2->slug_subkat.'/'.$row3->slug_supersubkat.'">'.$row3->judul_supersubkategori.'</a></li>';
						    	}

						    }
						}
						echo '
					</ul>';
				}
				echo '
			</li>';
			?>

		</ul>
	</div>

	<!-- Main Nav Menu -->

	<div class="main_nav_menu ml-auto">
		<ul class="standard_dropdown main_nav_dropdown">
			<li><a href="<?php echo base_url(); ?>">Home<i class="fas fa-chevron-down"></i></a></li>
			<li><a href="<?php echo base_url('produk/katalog') ?>">Produk<i class="fas fa-chevron-down"></i></a></li>
			<li><a href="">Blog<i class="fas fa-chevron-down"></i></a></li>
			<li><a href="<?php echo base_url('page/company/') ?>">Kontak Kami<i class="fas fa-chevron-down"></i></a></li>
		</ul>
	</li>
</ul>
</div>

<!-- Menu Trigger -->

<div class="menu_trigger_container ml-auto">
	<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
		<div class="menu_burger">
			<div class="menu_trigger_text">menu</div>
			<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
		</div>
	</div>
</div>

</div>
</div>
</div>
</div>
</nav>

<!-- Menu -->

<div class="page_menu">
	<div class="container">
		<div class="row">
			<div class="col">

				<div class="page_menu_content">

					<div class="page_menu_search">
						<?php echo form_open('produk/cari_produk') ?>
						<input type="text" name="cari" required="required" class="page_menu_search_input" placeholder="Cari Produk yang Anda Cari">
						<?php echo form_close() ?>
					</div>
					<ul class="page_menu_nav">

						<li class="page_menu_item"><a href="<?php echo base_url() ?>">Home<i class="fa fa-angle-down"></i></a></li>
						<li class="page_menu_item"><a href="<?php echo base_url('produk/katalog') ?>">Produk<i class="fa fa-angle-down"></i></a></li>
						<li class="page_menu_item"><a href="">blog<i class="fa fa-angle-down"></i></a></li>
						<li class="page_menu_item"><a href="">Kontak Kami<i class="fa fa-angle-down"></i></a></li>
					</ul>

					<div class="menu_contact">
						<div class="menu_contact_item"><div class="menu_contact_icon"><img src="<?php echo base_url()?>assets/layout/images/phone_white.png" alt=""></div><?php echo $company->company_phone ?></div>
						<div class="menu_contact_item"><div class="menu_contact_icon"><img src="<?php echo base_url()?>assets/layout/images/mail_white.png" alt=""></div><a href="mailto:<?php echo $company->company_email ?>"><?php echo $company->company_email ?></a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</header>

<!-- Banner -->

<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
		<?php $no=1; if ($slider_data) foreach ($slider_data as $key => $value) { ?>
		<div class="carousel-item <?php if($no == 1) echo 'active' ?>">
			<a href="<?php echo base_url(''.$value->link)?>"><img src="<?php echo base_url('assets/images/slider/')?><?php echo $value->foto.$value->foto_type ?>" class="d-block w-100" alt="..."></a>
		</div>
		<?php $no++; } ?>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>

<!-- Characteristics -->

<div class="characteristics">
	<div class="container">
		<div class="row">

			<!-- Char. Item -->
			<div class="col-lg-3 col-md-6 char_col">

				<div class="char_item d-flex flex-row align-items-center justify-content-start">
					<div class="char_icon"><img src="<?php echo base_url()?>assets/layout/images/char_1.png" alt=""></div>
					<div class="char_content">
						<div class="char_title">Jasa Pengiriman</div>
						<div class="char_subtitle">Pengiriman ke Seluruh Indonesia</div>
					</div>
				</div>
			</div>

			<!-- Char. Item -->
			<div class="col-lg-3 col-md-6 char_col">

				<div class="char_item d-flex flex-row align-items-center justify-content-start">
					<div class="char_icon"><img src="<?php echo base_url()?>assets/layout/images/char_2.png" alt=""></div>
					<div class="char_content">
						<div class="char_title">Transaksi</div>
						<div class="char_subtitle">Proses Transaksi Mudah</div>
					</div>
				</div>
			</div>

			<!-- Char. Item -->
			<div class="col-lg-3 col-md-6 char_col">

				<div class="char_item d-flex flex-row align-items-center justify-content-start">
					<div class="char_icon"><img src="<?php echo base_url()?>assets/layout/images/char_3.png" alt=""></div>
					<div class="char_content">
						<div class="char_title">Hemat</div>
						<div class="char_subtitle">Harga Paling Murah di Pasaran</div>
					</div>
				</div>
			</div>

			<!-- Char. Item -->
			<div class="col-lg-3 col-md-6 char_col">

				<div class="char_item d-flex flex-row align-items-center justify-content-start">
					<div class="char_icon"><img src="<?php echo base_url()?>assets/layout/images/char_4.png" alt=""></div>
					<div class="char_content">
						<div class="char_title">Diskon</div>
						<div class="char_subtitle">Tersedia Potongan Bagi Pelanggan Setia</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>