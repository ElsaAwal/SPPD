<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['level'])) {
    echo "<center>Untuk mengakses halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
include "../../lib/config_web.php";
include "../../lib/koneksi.php";
include "../../lib/pagination.php";
//
// untuk mengetahui halaman keberapa yang sedang dibuka
// juga untuk men-set nilai default ke halaman 1 jika tidak ada
// data $_GET['page'] yang dikirimkan
$page = 1;
if (isset($_GET['page']) && !empty($_GET['page']))
  $page = (int)$_GET['page'];

// untuk mengetahui berapa banyak data yang akan ditampilkan
// juga untuk men-set nilai default menjadi 5 jika tidak ada
// data $_GET['perPage'] yang dikirimkan
$dataPerPage = 5;
if (isset($_GET['perPage']) && !empty($_GET['perPage']))
  $dataPerPage = (int)$_GET['perPage'];

// tabel yang akan diambil datanya
$table = 'vw_sppd';
$idName = 'id_sppd';

// ambil data
$dataTable = getTableData($koneksi, $table, $page, $dataPerPage);

include "../templates/header.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>SPPD</title>
  <style>
    table tr td {
      font-size:  13px;
    }
    table tr .text {
      font-size:  13px;
      text-align: center;
    }
  </style>
</head>
<body width="800px" height="792px">

  <center>
    <table border="0">
      <tr>
        <td><img src="imgs1.jpg" width="90" height="90"></td>
        <td>
          <center>
            <font size="4"><b>PEMERINTAH PROVINSI JAWA TENGAH</b></font><br>
            <font size="5"><b>BADAN PENGELOLA PENDAPATAN DAERAH</b></font><br>
            <font size="2"><b>JL. Pemuda No. 1 Telp. (024) 3515514 , Fax. (024) 3541673, 3555704</b></font><br>
            <font size="2"><b>SEMARANG 50142</b></font>
          </center>
        </td>
      </tr>
      <tr>
        <td colspan="2"><hr></td>
      </tr>
    </table>
    <table border="0" width="622">
      <tr>
        <center>
          <br>
          <td class="text"><b><u>SURAT PERINTAH PERJALANAN DINAS (SPPD)</u></b></td>
        </center>
      </tr>
      <tr>
        <center>
          <td class="text">Nomor : </td>
        </center>
      </tr>
    </table>
    <br>  
<form>
<table  width="612px" height="542" border="1" align="center" cellspacing="0"> 
  <tr>
    <td width="12" height="34">1</td>
    <td colspan="2">Pengguna Anggaran/ Kuasa Pengguna Anggaran</td>
    <td colspan="2"><a href="#id_pejabat">nama pejabat</a></td>
  </tr>
  <tr>
    <td height="27">2</td>
    <td colspan="2">Nama PNS dan NIP / Pegawai Non PNS Yang Melaksanakan perjalanan dinas</td>
    <td colspan="2"><a href="#pegawai">
      <p>nama pegawai<br />
      <p>NIP. pegawai<br />
    </p></p></a></td>
  </tr>
  <tr>
    <td height="32">3</td>
    <td colspan="2"><p>a. Pangkat dan Golongan<br />
      b. Jabatan / Instansi<br />
      c. Tingkat biaya Perjalanan Dinas
    </p></td>
    <td colspan="2"><a href="#keterangan_pegawai"> a. pangkat dan golongan<br />
      b. jabatan<br />
      c. Tingkat </a></td>
  </tr>
  <tr>
    <td height="39">4</td>
    <td colspan="2"><p>Maksud Perjalanan Dinas</p></td>
    <td colspan="2">Evaluasi dan Pembinaan</td>
  </tr>
  <tr>
    <td height="39">5</td>
    <td colspan="2"><p>Alat angkutan yang dipergunakan</p></td>
    <td colspan="2"><a href="#kendaraan">kendaraan</a></td>
  </tr>
  <tr>
    <td height="24" rowspan="2">6</td>
    <td height="24" colspan="2"><p>a. Tempat berangkat<br />
    </p></td>
    <td colspan="2"><a href="#kota_asal">a. </a><br />
      <a href="#kota_tujuan"></a></td>
  </tr>
  <tr>
    <td height="24" colspan="2">b. Tempat tujuan </td>
    <td colspan="2"><a href="#kota_tujuan">b. </a></td>
  </tr>
  <tr>
    <td height="24" rowspan="3">7</td>
    <td height="24"colspan="2"><p>a. Lama Perjalanan Dinas
    </p></td>
    <td height="24" colspan="2"><a href="#date">a.</a>
      <a href="#date"></a></td>
  </tr>
  <tr>
    <td height="24" colspan="2">b. Tanggal berangkat</td>
    <td colspan="2"><a href="#date">b. </a></td>
  </tr>
  <tr>
    <td height="24" colspan="2">c. Tanggal harus kembali / tiba ditempat baru</td>
    <td colspan="2"><a href="#date">c.</a></td>
  </tr>
  <tr>
    <td rowspan="2">8</td>
    <td height="39" colspan="2"><p align="left">Pengikut : Nama</p></td>
    <td width="104">Tanggal lahir</a></td>
    <td width="226">Keterangan</td>
  </tr>
  <tr>
    <td height="39" colspan="2">&nbsp;</td>
    <td width="104"><a href="#date">&nbsp;</a></td>
    <td width="226"><textarea>&nbsp;</textarea></td>
  </tr>
  </tr> 
   <tr>
    <td height="35" rowspan="3">9</td>
    <td colspan="2" height="10"><p>Pembebanan Anggaran   </p></td>
    <td colspan="2">&nbsp;</td>
  </tr>
   <tr>
     <td style="border-right: none;border-bottom: none;">a.</td>
     <td width="237" height="10" style="border-left: none; border-bottom: none;">SKPD</td>
     <td colspan="2" style="border-bottom: none;">a.
      BAPENDA PROVINSI JAWA TENGAH</td>
    </tr>
   <tr>
     <td width="11" height="10" style="border-right:none;border-top: none;" >b.</td>
     <td width="237" style="border-left: none;border-top: none;">Akun</td>
     <td colspan="2" style="border-top: none;">b.<a href="#akun" style="border-top: none;">5.02.0.00.0.00.02.0004.04.1.01.05.1.2.4.1.1</a></td>
    </tr>
   <tr>
    <td height="39">10</td>
    <td colspan="2"><p>Keterangan Lain-lain</p></td>
    <td colspan="2"><textarea></textarea></td>
  </tr>
   </table>
<div align="center-rigth-button">
  <table border="0">
    <tr>
      <td width="100">Dikeluarkan di <br />
      Tanggal</td>
      <td width="90">: Semarang<br />
        : <a href="#date">date</a></td>
    </tr>
    <tr>
      <td height="65" colspan="2"><div align="center">An. PENGGUNA ANGGARAN <br>
      PPTK<br></div></td>
    </tr>
    <tr>
      <td height="65" colspan="2"><div align="center"><a href="#id_pejabat">TTD pejabat</a></div></td>
    </tr>
  </table>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div align="center"></div>


  </center>
</form>
</body>
</html>
<?php }?>