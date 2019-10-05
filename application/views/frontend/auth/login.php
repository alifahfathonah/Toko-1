<?php $this->load->view('frontend/header'); ?>
<?php $this->load->view('frontend/general_header'); ?>
<?php echo $script_captcha; // javascript recaptcha ?>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<hr><h3 style="text-align: center;">Login</h3><hr>
			Belum punya akun? Silahkan Registrasi <a href="<?php echo base_url('auth/register') ?>">disini</a><hr>
			<div class="row">
				<div class="col-lg-12">
					<?php echo $message;?>
					<?php echo form_open("auth/login");?>
					<div class="form-group has-feedback">
						<?php echo form_input($identity) ?>
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<?php echo form_password($password); ?>
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<p><?php echo $captcha ?></p>
					<?php echo lang('login_remember_label', 'remember');?>
					<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-sm btn-outline-primary"><i class="fas fa-key"></i> Login</button>
						<button type="reset" name="reset" class="btn btn-sm btn-outline-danger"><i class="fas fa-retweet"></i> Reset</button>
						<button type="button" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#pswreset">Lupa Password?</button>
					</div>
					<?php echo form_close();?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="pswreset" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php echo form_open("auth/forgot_password");?>
			<div class="modal-body">
				<div class="form-group"><label>Silahkan Masukkan Username Anda</label>
					<input class="form-control" name="identity" type="text" id="identity" />
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Kirim</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
			<?php echo form_close() ?>
		</div>
	</div>
</div>


<?php $this->load->view('frontend/footer'); ?>
