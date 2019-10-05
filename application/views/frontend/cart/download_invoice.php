<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /></head>
<body>
  <table align="center">
    <tr>
      <th rowspan="3"></th>
      <td align="center">
        <font style="font-size: 18px"><b><?php echo $company_data->company_name;?></b></font>
        <br><?php echo $company_data->company_address;?>
        <br>No. HP: <?php echo $company_data->company_phone;?> | Telp: <?php echo $company_data->company_phone2;?> | Email: <?php echo $company_data->company_email;?>
      </td>
    </tr>
  </table>
  <hr/>
  <div align="center"><b>NOMOR INVOICE : <?php echo $this->uri->segment('3'); ?></b></div>

  <?php if($this->session->userdata('user_id') != NULL){ ?>
  <table>
    <thead>
      <tr>
        <th style="text-align: center; background: #ddd; width: 30px">No.</th>
        <th style="text-align: center; background: #ddd; width: 260px">Nama</th>
        <th style="text-align: center; background: #ddd; width: 70px">Harga</th>
        <th style="text-align: center; background: #ddd; width: 60px">Berat</th>
        <th style="text-align: center; background: #ddd; width: 130px">Total Berat</th>
        <th style="text-align: center; background: #ddd; width: 50px">Qty</th>
        <th style="text-align: center; background: #ddd; width: 70px">Total Harga Barang</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach ($cart_finished as $cart){ ?>
      <tr>
        <td style="text-align:center"><?php echo $no++ ?></td>
        <td style="text-align:left;width: 260px"><?php echo $cart->judul_produk ?></td>
        <td style="text-align:right;width: 70px"><?php echo number_format($cart->harga_diskon) ?></td>
        <td style="text-align:center;width: 60px"><?php echo $cart->berat ?> Gram</td>
        <td style="text-align:center;width: 130px"><?php echo $cart->total_berat ?> Gram</td>
        <td style="text-align:center;width: 50px"><?php echo $cart->total_qty ?></td>
        <td style="text-align:center;width: 70px"><?php echo number_format($cart->subtotal) ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>

  <table align="right">
    <tbody>
      <tr>
       <th>Total Berat</th>
       <td colspan="2" align="right"><?php echo berat($total_berat_dan_subtotal->total_berat) ?> Kg</td>
     </tr>
     <tr>
      <th>Total Harga Barang</th>
      <td></td>
      <td align="right"><?php echo number_format($total_berat_dan_subtotal->subtotal) ?></td>
    </tr>
    <tr>
      <th>Biaya Pengiriman</th>
      <td align="right"><?php echo strtoupper($customer_data->kurir).' '.$customer_data->service ?></td>
      <td align="right"><?php echo number_format($customer_data->ongkir) ?></td>
    </tr>
    <tr>
      <th scope="row">Total Bayar</th>
      <td align="right"></td>
      <td align="right"><b><?php echo number_format($customer_data->ongkir + $total_berat_dan_subtotal->subtotal) ?></b></td>
    </tr>
  </tbody>
</table>

<div><b>Rekening Bank Pembayaran</b></div>
<table cellspacing='10'>
 <thead>
  <tr>
   <th style="text-align: center">No.</th>
   <th style="text-align: center">Bank</th>
   <th style="text-align: center">Atas Nama</th>
   <th style="text-align: center">No. Rekening</th>
 </tr>
</thead>
<tbody>
  <?php $no=1; foreach($data_bank as $bank){ ?>
  <tr>
   <td><?php echo $no++ ?></td>
   <td><?php echo $bank->nama_bank ?></td>
   <td><?php echo $bank->atas_nama ?></td>
   <td><?php echo $bank->norek ?></td>
 </tr>
 <?php } ?>
</tbody>
</table>

<div><b>Alamat Tujuan</b></div>
Nama: <?php echo $customer_data->name ?><br>
No. HP: <?php echo $customer_data->phone ?><br>
Alamat: <?php echo $customer_data->address.', '.$customer_data->nama_provinsi.', '.$customer_data->nama_kota?><br>

<h4>PERHATIAN</h4>
<ul>
  <li>Lakukan konfirmasi pembayaran dengan mengupload bukti pembayaran <a href="">disini</a>.</li>
  <li>Kami akan segera memproses pesanan anda setelah konfirmasi pembayaran selesai.</li>
</ul>
<p align="center">Terima kasih telah berbelanja di <?php echo $company->company_name ?>.</p>

<?php } ?>

</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
