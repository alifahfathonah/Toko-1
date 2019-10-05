<?php $this->load->view('frontend/header'); ?>
<?php $this->load->view('frontend/navbar'); ?>

<div class="container">
	<div class="row"><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></div>
</div>

<?php $this->load->view('frontend/home/produk_new'); ?>
<?php $this->load->view('frontend/footer'); ?>