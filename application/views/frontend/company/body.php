<?php $this->load->view('frontend/header'); ?>
<?php $this->load->view('frontend/general_header'); ?>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<hr><h3>Tentang <?php echo $company->company_name ?></h3><hr>
			<div class="row">
				<div class="col-lg-12">
					<p align="center"><?php
						if(empty($company->foto)) {echo "<img src='".base_url()."assets/images/no_image_thumb.png' width='400' height='400'>";}
						else { echo " <img src='".base_url()."assets/images/company/".$company->foto.'_thumb'.$company->foto_type."' class='img-responsive' title='$company->company_name' alt='$company->company_name'> ";}
						?>
					</p>
					<p><?php echo $company->company_desc ?> yang beralamat di 
						<?php echo $company->company_address ?></p><br>
						<p><b>Email:</b><br>
							<?php echo $company->company_email ?>
						</p>
						<p><b>Telepon:</b><br>
							<?php echo $company->company_phone ?>
							<?php if($company->company_phone2 > 0){echo " / ". $company->company_phone2;} ?>
						</p>
						<?php if($company->company_fax > 0){ ?>
						<p><b>Fax:</b><br>
							<?php echo $company->company_fax ?>
						</p>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<hr>
				<?php echo $company_data->company_maps;?>
				<hr>
			</div>
		</div>
	</div>
	<?php $this->load->view('frontend/footer'); ?>
