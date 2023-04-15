<?php 
  $tgl = date("d/m/Y");

  switch (date('m')) {
    case '01':
      $bulan = 'Januari';
      break;
    case '02':
      $bulan = 'Februari';
      break;
    case '03':
      $bulan = 'Maret';
      break;
    case '04':
      $bulan = 'April';
      break;
    case '05':
      $bulan = 'Mei';
      break;
    case '06':
      $bulan = 'Juni';
      break;
    case '07':
      $bulan = 'Juli';
      break;
    case '08':
      $bulan = 'Agustus';
      break;
    case '09':
      $bulan = 'September';
      break;
    case '10':
      $bulan = 'Oktober';
      break;
    case '11':
      $bulan = 'November';
      break;
    case '12':
      $bulan = 'Desember';
      break;
    default:
      $bulan = 'tidak ada';
      break;
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Laporan Pengaduan Masyarakat</title>

   
  <!-- <link href="<?= base_url() ?>assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
  <!-- Google Fonts -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Lora:700|Montserrat:200,400,600|Pacifico&display=swap" rel="stylesheet"> -->

  <!-- Custom styles for this template-->
  <!-- <link href="<?= base_url() ?>assets/backend/css/sb-admin-2.min.css" rel="stylesheet">  -->

</head>

<body>
    <center>
        <table width="100%">
        <tr style="height: 80px;">
          
          <td width="10%"><img src="assets/profile/cop.png" style="width: 700px;"></td>
          
        </tr>
        </table>
        
        <center>
        <h3>
          <u>LAPORAN DATA PENGADUAN</u>
        </h3>
        </center>
        

      <center>
      <table border="1px" border-collapse="collapse" cellpadding="8" cellspacing="0">
        <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Laporan</th>
                <th>Tgl Pengaduan</th>
                <th>Status</th>
                <th>Tanggapan</th>
                <th>Tgl Tanggapan</th>
              </tr>
            </thead>
        <tbody>
        <?php $no = 1; ?>
        <?php foreach($pengaduan as $l) : ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $l->nama ?></td>
            <td><?= $l->nik ?></td>
            <td><?= $l->isi_laporan ?></td>
            <td><?= $l->tgl_pengaduan ?></td>
            <td><?= $l->tipe ?></td>
            <td><?= $l->tanggapan == null ? '-' : $l->tanggapan; ?></td>
            <td><?= $l->tgl_tanggapan == null ? '-' : $l->tgl_tanggapan; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    </center>
    </center>
	<p>Data pengaduan di Desa Karangsoka, Kecamatan Kembaran, Kabupuaten Banyumas.</P>
	<br>
	<br>
	<br>
	<br>
	<br>
	<p align="right">
		Desa Karangsoka,
		<?php echo date('d'). ' '. $bulan. ' '. date('Y'); ?>
		<br> KEPALA DESA KARANGSOKA
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
    <?php foreach($data_kades as $kd) : ?>
		<br>(        <?= $kd->nama_kades ?>        )
    <?php endforeach; ?>
	</p>
  
 <script src="<?= base_url() ?>assets/backend/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<script src="<?= base_url() ?>assets/backend/vendor/jquery-easing/jquery.easing.min.js"></script>


<script src="<?= base_url() ?>assets/backend/js/sb-admin-2.min.js"></script> 

<script>
		window.print();
	</script>
</body>

</html>

