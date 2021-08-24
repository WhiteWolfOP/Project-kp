<?php 
    $site = $this->m_konfigurasi->listing();
?>
<!DOCTYPE html>
<html class="no-js">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo ($site->namaweb)?> | Pendaftaran Event</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="Adrian Dandi Dika " />
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url('assets/upload/image/').$site->icon?>">
  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
  <link rel="shortcut icon" href="favicon.ico">
  <!-- Animate.css -->
  <link rel="stylesheet" href="<?php echo base_url().'theme/css/animate.css'?>">
  <!-- Icomoon Icon Fonts-->
  <link rel="stylesheet" href="<?php echo base_url().'theme/css/icomoon.css'?>">
  <!-- Bootstrap  -->
  <link rel="stylesheet" href="<?php echo base_url().'theme/css/bootstrap.css'?>">
  <!-- Flexslider  -->
  <link rel="stylesheet" href="<?php echo base_url().'theme/css/flexslider.css'?>">
  <!-- Theme style  -->
  <link rel="stylesheet" href="<?php echo base_url().'theme/css/style.css'?>">

  <!-- Modernizr JS -->
  <script src="<?php echo base_url().'theme/js/modernizr-2.6.2.min.js'?>"></script>

  </head>
  <body>


  <div id="fh5co-page">
  <header id="fh5co-header" role="banner">
    <div class="container">
      <div class="header-inner">
        <h1><a href="<?php echo base_url().''?>"><?php echo ($site->namaweb)?><span>.</span></a></h1>
        <nav role="navigation">
          <ul>
            <li><a href="<?php echo base_url().''?>">Beranda</a></li>
            <li><a href="<?php echo base_url().'about'?>">Tentang Kita</a></li>
            <li><a href="<?php echo base_url().'portfolio'?>">Portfolio</a></li>
            <li class="active"><a href="<?php echo base_url().'event'?>">Pendaftaran Event</a></li>
            <li><a href="<?php echo base_url().'artikel'?>">Event</a></li>
            <li><a href="<?php echo base_url().'kontak'?>">Kontak</a></li>
            <li class="cta"><a href="<?php echo base_url().'event'?>">Daftar event</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>


  <aside id="fh5co-hero" clsas="js-fullheight">
    <div class="flexslider js-fullheight">
      <ul class="slides">
        <li style="background-image: url(<?php echo base_url('assets/upload/image/').$site->wallpaper?>);">
          <div class="overlay-gradient"></div>
          <div class="container">
            <div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
              <div class="slider-text-inner">
                <h2>Form Pendaftaran Event.</h2>
                <p class="fh5co-lead"><?php echo ($site->namaweb)?></p>
              </div>
            </div>
          </div>
        </li>
        </ul>
      </div>
  </aside>

  <div class="fh5co-contact animate-box">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h3>Kontak Info.</h3>
          <ul class="contact-info">
            <li><i class="icon-map"></i><?php echo ($site->alamat)?></li>
            <li><i class="icon-phone"></i><?php echo ($site->no_telp)?></li>
            <li><i class="icon-envelope"></i><a href="#"><?php echo ($site->email)?></a></li>
          </ul>
        </div>

        <div class="col-md-8 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
          <div class="row">

            <?php
              if($this->session->flashdata('sukses')){
                echo'<p class="alert alert-success">';
                echo $this->session->flashdata('sukses');
                echo '</div>';
              }else{
                 //error notification
              echo validation_errors('<div class="alert alert-warning">','</div>');
              }             
              //form open
              echo form_open_multipart(base_url('event/tambah_data/'), ' class="form-horizontal"');
            ?>
            <div class="col-md-12">
              <div class="form-group">
                <h2><b>Isi Form Dibawah Ini</b></h2>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <input class="form-control" name="nama_owner" placeholder="Nama Lengkap" type="text" value="<?php echo set_value('nama_owner')?>" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <input class="form-control" name="no_telp_owner" placeholder="No. Telepon/Hp" type="number" value="<?php echo set_value('no_telp_owner')?>" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <input class="form-control" name="email_owner" placeholder="Email" type="email" value="<?php echo set_value('email_owner')?>" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <textarea name="alamat_owner" class="form-control" id="" cols="30" rows="7" placeholder="Alamat" required><?php echo set_value('alamat_owner')?></textarea>
              </div>
            </div>
             <div class="col-md-12">
              <div class="form-group">
                <label>Upload Proposal : </label>
                <input class="form-control" name="proposal_event" placeholder="Nama Lengkap" type="file" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <textarea name="keterangan_event" class="form-control" id="" cols="30" rows="7" placeholder="Keterangan event" required><?php echo set_value('keterangan_event')?></textarea>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <button class="btn btn-success btn-md" name="submit" type="submit">
                    <i class="fa fa-save"> Kirim pengajuan</i>
                  </button>
              </div>
            </div>
          <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php $this->load->view('v_footer');?>
  </div>


  <!-- jQuery -->
  <script src="<?php echo base_url().'theme/js/jquery.min.js'?>"></script>
  <!-- jQuery Easing -->
  <script src="<?php echo base_url().'theme/js/jquery.easing.1.3.js'?>"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url().'theme/js/bootstrap.min.js'?>"></script>
  <!-- Waypoints -->
  <script src="<?php echo base_url().'theme/js/jquery.waypoints.min.js'?>"></script>
  <!-- Flexslider -->
  <script src="<?php echo base_url().'theme/js/jquery.flexslider-min.js'?>"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
  <script src="<?php echo base_url().'theme/js/google_map.js'?>"></script>

  <!-- MAIN JS -->
  <script src="<?php echo base_url().'theme/js/main.js'?>"></script>

  </body>
</html>
