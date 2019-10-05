<?php $this->load->view('frontend/header'); ?>
<?php $this->load->view('frontend/general_header'); ?>

<div class="container">
  <div class="row">

   <div class="col-lg-12">
     <hr><h3>Detail Transaksi</h3><hr>
     <h4>Nomor Invoice : <?php echo $history_detail_row->id_trans ?></h4>
     <div class="row">
      <div class="col-lg-12">
       <div class="box-body table-responsive padding">
        <table id="datatable" class="table table-borderless table-striped table-hover">
          <thead>
            <tr>
              <th style="text-align: center">Gambar</th>
              <th style="text-align: center">Nama</th>
              <th style="text-align: center">NCatatan</th>
              <th style="text-align: center">Harga</th>
              <th style="text-align: center">Berat </th>
              <th style="text-align: center">Total Berat</th>
              <th style="text-align: center">Qty</th>
              <th style="text-align: center">Total Harga Barang</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($history_detail as $history){ ?>
            <tr>
              <td style="text-align:center"><img src="<?php echo base_url()?>assets/images/produk/<?php echo $history->foto.$history->foto_type ?>" width="100px" ></td>
              <td style="text-align:left"><?php echo $history->judul_produk ?></a></td>
              <td style="text-align:center"><?php echo $history->catatan ?></td>
              <td style="text-align:center"><?php echo $history->harga_diskon ?></td>
              <td style="text-align:center"><?php echo $history->berat ?> Gram</td>
              <td style="text-align:center"><?php echo $history->total_berat ?> Gram</td>
              <td style="text-align:center"><?php echo $history->total_qty ?></td>
              <td style="text-align:center"><?php echo $history->subtotal ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="col-lg-12">
  <table class="table table-borderless table-striped table-hover">
    <tbody>
      <tr>
       <th>Total Berat</th>
       <td colspan="2" align="right"> <?php echo berat($history_detail_row->total_berat) ?> Kg</td>
     </tr>
     <tr>
      <th>Total Harga Barang</th>
      <td></td>
      <td align="right"><?php echo number_format($subtotal_history->subtotal) ?></td>
    </tr>
    <tr>
      <th>Biaya  Pengiriman</th>
      <td align="right"><?php echo strtoupper($history_detail_row->kurir).' '.$history_detail_row->service ?></td>
      <td align="right"><?php echo number_format($history_detail_row->ongkir) ?></td>
    </tr>
  </tbody>
</table>
</div>
</div>
<!-- Order Total -->
<div class="order_total">
 <div class="order_total_content text-md-right">
  <div class="order_total_title">Total Bayar :</div>
  <div class="order_total_amount"><?php echo $history_detail_row->ongkir + $subtotal_history->subtotal ?></div>
</div>
</div><hr>
<?php
if ($history_detail_row->status == 3) { ?>
<div>
  <p>Jika anda telah menerima pesanan, silahkan konfirmasi dengan menekan tombol dibawah</p>
  <a class="btn btn-success" href="<?php echo base_url('cart/terima/'.$history->id_trans); ?>">Pesanan Sudah Diterima</a>
  <?php } elseif ($history_detail_row->status == 4) { ?>
  <p>Pesanan telah diterima, terimakasih telah berbelanja di Toko Kami</p>
</div>
<?php } ?>
<?php
if ($history_detail_row->status == 1) { ?>

<div class="row">
  <div class="col-lg-12">
    <hr><h4>PERHATIAN</h4><hr>
    <ul>
      <li>Lakukan pembayaran dan konfirmasi pembayaran dengan mengupload bukti pembayaran
        <?= form_open('page/konfirmasi_pembayaran'); ?>
        <input type="hidden" name="invoice" value="<?= $history_detail_row->id_trans; ?>">
        <input type="hidden" name="grandtot" value="<?= $history_detail_row->ongkir + $history_detail_row->subtotal ?>">
        <?php
        $data = array(
          'type'  => 'submit',
          'value' => 'klik di sini',
          'class' => 'btn btn-sm btn-outline-primary'
          );
          ?>
          <?= form_submit($data) ?>
          <?= form_close(); ?>
        </li>
        <li>Kami akan segera memproses pesanan anda setelah konfirmasi pembayaran selesai.</li>
      </ul>
      <p>Terima kasih telah berbelanja di <?php echo $company->company_name ?>.</p>
    </div>
  </div>
  <?php }
  ?>
</div>
<?php $this->load->view('frontend/footer'); ?>