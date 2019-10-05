<?php $this->load->view('frontend/header'); ?>
<?php $this->load->view('frontend/general_header'); ?>

<div class="container">
  <div class="row">
    <div class="col-sm-12 col-lg-12">
      <hr><h3>Konfirmasi Pembayaran</h3><hr>
      <div class="row">
        <div class="col-lg-12">
          <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
          <?= form_open_multipart($action); ?>
          <div class="form-group has-feedback"><label>No. Invoice</label>
            <input type="text" readonly="" name="invoice" class="form-control col-md-6" value="<?= $invoice ?>">
          </div>
          <div class="form-group has-feedback"><label>Nama Pengirim</label>
            <input type="text" name="nama" class="form-control col-md-6" value="<?php echo $this->session->userdata('name') ?>" >
          </div>
          <div class="form-group has-feedback"><label>Total Pembayaran</label>
            <input type="text" name="jumlah" class="form-control col-md-6" value="Rp. <?= number_format($grandtot) ?>" >
          </div>
          <div class="form-group has-feedback col-md-4"><label>Bank Asal</label>
            <select class="form-control" name="bank_asal">
              <option value="BCA">BCA</option>
              <option value="BNI">BNI</option>
              <option value="BRI">BRI</option>
              <option value="BRI">BRI</option>
              <option value="HSBC">HSBC</option>
              <option value="BTN">BTN</option>
              <option value="BUKOPIN">BUKOPIN</option>
              <option value="CIMB NIAGA">CIMB NIAGA</option>
              <option value="DANAMON">DANAMON</option>
              <option value="MEGA">MEGA</option>
              <option value="PERMATA">PERMATA</option>
              <option value="Mandiri">Mandiri</option>
              <option value="Lainya">Lainya</option>
            </select>
          </div>
          <div class="form-group has-feedback  col-md-4"><label>Bank Tujuan</label>
            <?= form_dropdown('', $nama_bank, '', $bank_tujuan) ?>
          </div>
          <div class="form-group"><label>Bukti Pembayaran</label><br>
            <input type="file" class="btn-md btn-primary col-md-6" name="bukti_pembayaran" id="foto" onchange="tampilkanPreview(this,'preview')"/>
            <img id="preview" src="" alt="" width="350px"/>
          </div>
          <button type="submit" name="button" class="btn btn-primary">Kirim</button>
          <?php echo form_close() ?>
        </div>
      </div>
      <hr>
    </div>
  </div>

  <?php $this->load->view('frontend/footer'); ?>
