<?php $this->load->view('frontend/header'); ?>
<?php $this->load->view('frontend/general_header'); ?>

<div class="col-lg-12"><h1>Edit Profil</h1><hr>
	<?php echo $message ?>
	<?php echo validation_errors() ?>
	<?php echo form_open_multipart(uri_string());?>
	<div class="form-row">
		<div class="form-group col-lg-6"><label>Nama</label><br>
			<?php echo form_input($name);?>
		</div>
		<div class="form-group col-lg-6"><label>Username</label><br>
			<?php echo form_input($username);?>
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-lg-3"><label>Password</label><br>
			<?php echo form_input($password);?>
		</div>
		<div class="form-group col-lg-3"><label>Konfirmasi Password</label><br>
			<?php echo form_input($password_confirm);?>
		</div>
		<div class="form-group col-lg-3">
			<label>Jika ingin merubah foto <a class="btn-sm btn-outline-success" href="<?php echo base_url('auth/profil/') ?>">Klik Lihat Profil</a></label>
			<?php
			if (!empty($profil->photo)) { ?>
			<img src="<?php echo base_url('assets/images/user/')?><?php echo $profil->photo ?><?php echo $profil->photo_type?>" width="100px">
			<?php } else { ?>
			Foto belum diupload
			<?php } ?>
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-lg-3"><label>No. HP</label><br>
			<?php echo form_input($phone);?>
		</div>
		<div class="form-group col-lg-3"><label>Email</label><br>
			<?php echo form_input($email);?>
		</div>
	</div>
	<div class="form-group"><label>Alamat</label><br>
		<?php echo form_textarea($address);?>
	</div>
	<?php echo form_hidden('id', $user->id);?>
	<?php echo form_hidden($csrf); ?>
	<button type="submit" name="submit" class="btn-sm btn-primary">Update</button>
	<button type="reset" name="reset" class="btn-sm btn-danger">Reset</button>
	<?php echo form_close() ?>
</div>

<?php $this->load->view('frontend/footer'); ?>
