		<!-- Newsletter -->

		<div class="newsletter">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
							<div class="newsletter_title_container">
								<div class="newsletter_icon"><img src="<?php echo base_url()?>assets/layout/images/send.png" alt=""></div>
								<div class="newsletter_title">Update Informasi</div>
								<div class="newsletter_text"><p>Kami akan memberikan informasi seputar diskon dan produk terbaru kami ..</p></div>
							</div>
							<div class="newsletter_content clearfix">
								<form action="<?php echo base_url('home/mail/') ?>" method="POST" class="newsletter_form">
									<input name="email" type="email" class="newsletter_input" required="required" placeholder="Masukan Email Anda ..">
									<button class="newsletter_button" type="sybmit" name="submit">Subscribe</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->

		<footer class="footer">
			<div class="container">
				<div class="row">

					<div class="col-lg-3 footer_col">
						<div class="footer_column footer_contact">
							<div class="logo_container">
								<div class="logo"><a href=""><?php echo $company->company_name ?></a></div>
							</div>
							<div class="footer_title"><?php echo $company->desc_profil ?></div>
							<div class="footer_phone"><?php echo $company->company_phone ?></div>
							<div class="footer_contact_text">
								<p><?php echo $company->company_address ?></p>
							</div>
							<div class="footer_social">
								<ul>
									<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
									<li><a href=""><i class="fab fa-twitter"></i></a></li>
									<li><a href=""><i class="fab fa-youtube"></i></a></li>
									<li><a href=""><i class="fab fa-google"></i></a></li>
									<li><a href=""><i class="fab fa-vimeo-v"></i></a></li>
								</ul>
							</div>
						</div>
					</div>

					<div class="col-lg-2 offset-lg-2">
						<div class="footer_column">
							<div class="footer_title">Jelajahi</div>
							<ul class="footer_list">
								<?php
								foreach ($kategori_new_data as $kategori) { ?>
								<li><a  href="<?php echo base_url('kategori/read/') ?><?php echo $kategori->slug_kat?>"><?php echo $kategori->judul_kategori ?></a></li>	
								<?php } 
								?>
							</ul>
						</div>
					</div>

					<div class="col-lg-2">
						<div class="footer_column">
							<div class="footer_title">Customer Care</div>
							<ul class="footer_list">

								<?php if(isset($_SESSION['identity']) && $_SESSION['usertype'] == '5'){ ?>
								<li><a href="<?php echo base_url('auth/profil/') ?>">Profile Saya</a></li>
								<li><a href="<?php echo base_url('cart/history/') ?>">Daftar Transaksi</a></li>
								<?php } else { ?>

								<?php } ?>
								<li><a href="<?php echo base_url('page/company/') ?>">Customer Services</a></li>
								<li><a href="<?php echo base_url('page/company/') ?>">FAQs</a></li>
								<li><a href="<?php echo base_url('page/company/') ?>">Product Support</a></li>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</footer>

		<!-- Copyright -->

		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
							<div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</div>
							<div class="logos ml-sm-auto">
								<ul class="logos_list">
								<?php 
								$bank = $this->db->get('bank','logo')->result();
								foreach ($bank as $key => $value) { ?>
									<li><img width="50px" src="<?php echo base_url('assets/images/'.$value->logo)?>" alt=""></li>
								<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="<?php echo base_url()?>assets/layout/styles/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>assets/layout/plugins/greensock/TweenMax.min.js"></script>
	<script src="<?php echo base_url()?>assets/layout/plugins/greensock/TimelineMax.min.js"></script>
	<script src="<?php echo base_url()?>assets/layout/plugins/scrollmagic/ScrollMagic.min.js"></script>
	<script src="<?php echo base_url()?>assets/layout/plugins/greensock/animation.gsap.min.js"></script>
	<script src="<?php echo base_url()?>assets/layout/plugins/greensock/ScrollToPlugin.min.js"></script>
	<script src="<?php echo base_url()?>assets/layout/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="<?php echo base_url()?>assets/layout/plugins/slick-1.8.0/slick.js"></script>
	<script src="<?php echo base_url()?>assets/layout/plugins/easing/easing.js"></script>
	<script src="<?php echo base_url()?>assets/layout/plugins/Isotope/isotope.pkgd.min.js"></script>
	<script src="<?php echo base_url()?>assets/layout/plugins/parallax-js-master/parallax.min.js"></script>
  	<script src="<?php echo base_url()?>assets/plugins/cssmenu/script.js"></script>
  	<script src="<?php echo base_url()?>assets/layout/js/custom.js"></script>
</html>