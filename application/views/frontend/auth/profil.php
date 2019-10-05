<?php $this->load->view('frontend/header'); ?>
<?php $this->load->view('frontend/general_header'); ?>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<hr><h3>Profil Saya |
			<a class="btn-sm btn-outline-success" href="<?php echo base_url('auth/edit_profil/').$this->session->userdata('user_id') ?>">Edit Profil</a> 
			<a class="btn-sm btn-outline-danger" href="<?php echo base_url('auth/logout/')?>">Logout</a>
		</h3><hr>
		<?php if(isset($_SESSION['identity']) && $_SESSION['usertype'] == '5'){ ?>
		<div class="form-row">
			<div class="form-group col-lg-6"><label>Nama</label><br>
				<?php echo $profil->name ?>
			</div>
			<div class="form-group col-lg-3"><label>Foto</label><br>
				<?php
				if (!empty($profil->photo)) { ?>
				<img src="<?php echo base_url('assets/images/user/')?><?php echo $profil->photo ?><?php echo $profil->photo_type?>" width="100px">
				<?php } else { ?>
				Edit profile anda untuk mengganti poto
				<?php } ?>
			</div>
			<div class="form-group col-lg-6"><label>Username</label><br>
				<?php echo $profil->username ?>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-lg-6"><label>No. HP</label><br>
				<?php echo $profil->phone ?>
			</div>
			<div class="form-group col-lg-6"><label>Email</label><br>
				<?php echo $profil->email ?>
			</div>
		</div>
		<div class="form-group"><label>Alamat</label><br>
			<?php echo $profil->address ?>
		</div>
		<?php } else { ?>
		<div class="col-lg-12">
			<p>Silahkan login terlebih dahulu</p>
			<a class="btn-sm btn-success" href="<?php echo base_url('auth/login/') ?>">Login Ke Aplikasi</a></div>
			<?php } ?>
		</div>
	</div>
	<hr>
</div>

<?php $this->load->view('frontend/footer'); ?>
