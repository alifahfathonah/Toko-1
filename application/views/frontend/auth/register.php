<?php $this->load->view('frontend/header'); ?>
<?php $this->load->view('frontend/general_header'); ?>

<div class="container">
	<div class="row">

		<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>

		<div class="col-lg-12">
			<hr><h3 style="text-align: center;">Daftar Pelanggan Baru</h3>
			<hr>Sudah punya akun? Silahkan Login <a href="<?php echo base_url('auth/login') ?>">disini</a><hr>
			<div class="row">
				<div class="col-lg-12">
					<?php echo form_open("auth/register");?>
					<div class="box-body">
						<?php echo $message;?>
						<div class="form-row">
							<div class="form-group col-md-6"><label>Nama</label>
								<?php echo form_input($name);?>
							</div>
							<div class="form-group col-md-6"><label>Username</label>
								<?php echo form_input($username);?>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6"><label>Password</label>
								<?php echo form_password($password);?>
							</div>
							<div class="form-group col-md-6"><label>Konfirmasi Password</label>
								<?php echo form_password($password_confirm);?>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6"><label>No. Hp</label>
								<?php echo form_input($phone);?>
							</div>
							<div class="form-group col-md-6"><label>Email</label>
								<?php echo form_input($email);?>
							</div>
						</div>
						<div class="form-group"><label>Alamat</label>
							<?php echo form_textarea($alamat);?>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4"><label>Provinsi</label>
								<?php echo form_dropdown('', $ambil_provinsi, '', $provinsi_id); ?>
							</div>
							<div class="form-group col-md-4"><label>Kabupaten/ Kota</label>
								<?php echo form_dropdown('', array(''=>'- Pilih Kota -'), '', $kota_id); ?>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-outline-primary">Submit</button>
							<button type="reset" class="btn btn-outline-danger">Reset</button>
						</div>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
	<hr>
</div>

<?php $this->load->view('frontend/footer'); ?>
<script type="text/javascript">
	function tampilKota()
	{
		provinsi_id = document.getElementById("provinsi_id").value;
		$.ajax({
			url:"<?php echo base_url();?>auth/pilih_kota/"+provinsi_id+"",
			success: function(response){
				$("#kota_id").html(response);
			},
			dataType:"html"
		});
		return false;
	}
</script>
