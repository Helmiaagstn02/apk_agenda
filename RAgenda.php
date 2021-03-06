<?php

session_start();
if( !isset($_SESSION["masuksiswa"])){
  header("Location:login.php");
  exit;

}
require 'koneksi.php';

$tgl    =date("Y-m-d");



$data=query("SELECT * FROM tb_agenda WHERE tanggal = '$tgl'");
$nm_kelas = $_SESSION["nm_kelas"];
$gambar = $_SESSION["gambar"];



?>


<!DOCTYPE html>
<html lang="en">
<head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="description" content="">
                <meta name="main" content="menu utama">
                <meta name="keyword" content="Agenda , absen , EFORM ,Siswa,guru">
                <title>EFORM</title>

                <!-- Bootstrap core CSS -->
                <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

                <!--external css-->
                <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />

                <!-- Custom styles for this template -->
                <link href="css/style.css" rel="stylesheet">
                <link href="css/style-responsive.css" rel="stylesheet">
        </head>

        <body>


                <!--header start-->
                <header class="header black-bg">
                  <div class="sidebar-toggle-box">
                    <div class="fa fa-bars tooltips" data-placement="right" ></div>
                  </div>
                  <!--logo start-->
                  <a href="index.php" class="logo"><b>E<span>form</span></b></a>
                  <!--logo end-->
                  <div class="nav notify-row" id="top_menu">
                    <!--  notification start -->
                    <ul class="nav top-menu">
                  <div class="top-menu">
                    <ul class="nav pull-right top-menu ">
                    </ul>
                  </div>
                </header>
                <!-- header end -->

    <!-- sidebar start -->

    <aside>
            <div id="sidebar" class="navbar-collapse">

              <!-- sidebar menu start-->

              <ul class="sidebar-menu" id="nav-accordion">
                <p class="centered"><img src="img/gambar/<?= $gambar; ?>" class="img-circle" width="80"></p>
                <h5 class="centered"><?= $nm_kelas; ?></h5>
                <li class="sub-menu">
                  <a href="index.php">
                    <i class="fa fa-home"></i>
                    <span>halaman Utama</span>
                  </a>
                </li>


                <li class="sub-menu">
                    <a   href="isiAgenda.php">
                      <i class="fa fa-list-alt"></i>
                      <span>Isi Agenda</span>
                     </a>
                  </li>

                <li class="sub-menu">
                  <a href="isiAbsen.php">
                    <i class="fa fa-building-o"></i>
                    <span>Isi Absen</span>
                    </a>
                </li>


                <li class="mx">
                  <a class="active" href="rekap.php">
                    <i class="fa fa-upload"></i>
                    <span>Rekap</span>
                    </a>
                  <ul class="sub-menu">
                    <li><a class="hanap" href="RAgenda.php"><i class="fa fa-file-text"></i>Agenda</a></li>
                    <li><a href="RAbsen.php"><i class="fa fa-table"></i>Absen</a></li>
                    </ul>
                  </li>

                <li class="sub-menu">

                    <a href="logout.php" onclick="return confirm('Yakin?')">

                    <i class="fa fa-power-off"></i>
                    <span>logout</span>
                    </a>

                </li>
              </ul>
            </div>
          </aside>
    <!-- ssidebar end -->
    <section id="main-content">
        <section class="wrapper">

          <div class="row turun">
              <div class="col-lg-5 main-chart">
                  <div class="col-md">
                      <div class="control-group">

                              <div class="form-group">
                              <input class="form-control" type="text" name="tanggal" placeholder="<?= $tgl ?>" readonly>

                                  </select>
                              </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="row">
      <div class="col-sm-12">
        <!-- <div class="content-panel"> -->

        <?php $i = 1; ?>
	          <?php foreach( $data as $row ) : ?>
          <table class="table table-responsive table-advenced table-hover">
            <!-- <h4><i class="fa fa-angle-right"></i> Advanced Table</h4> -->
            <hr>
            <tbody>

             <tr>

                <td><b>Guru</b></td>
                <td><?= $row["nm_guru"]; ?></td>
              </tr>
              <tr>
                <td><b>MAPEL</b>
                </td>
                <td><?= $row["nm_mapel"]; ?></td>
              </tr>
              <tr>
                <td><b>Jam Ke-</b></td>
                <td><?= $row["jam_ke"]; ?></td>
              </tr>
              <tr>
                <td>
                  <b>MATERI</b></td>
                  <td><?= $row["materi"]; ?></td>
              </tr>
              <tr>
                <td>
                  <b>TUGAS</b>
                </td>
                <td ><?= $row["tugas"]; ?></td>
              </tr>
              <tr>
                <td><b>Keterangan</b></td>
                <td>hadir</td>
              </tr>
              <tr>
                <td>EDIT</td>
                <td>

                    <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>

                  </td>
              </tr>

            </tbody>



          </table>
          <?php $i++; ?>
	          <?php endforeach; ?>
        </div>
        <!-- /content-panel -->
      </div>
      <!-- /col-md-12 -->
    </div>
    <!-- /row -->
    <div class="row ">
        <div class="col-lg-5 main-chart">
            <div class="col-xs">
                <div class="control-group">
                   <button class="btn btn-info btn-lg btn-block btn-round" href="IsiAgenda.php" role="button">kirim data</button>
                </div>
            </div>
        </div>
    </div>

  </section>
</section>





     <!-- js placed at the end of the document so the pages load faster -->
   <script src="lib/jquery/jquery.min.js"></script>

   <script src="lib/bootstrap/js/bootstrap.min.js"></script>
   <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
   <script src="lib/jquery.scrollTo.min.js"></script>

   <script src="lib/common-scripts.js"></script>

  </body>
  </html>
