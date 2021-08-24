<!--Counter Inbox-->
<?php 
    $query=$this->db->query("SELECT * FROM tbl_inbox WHERE inbox_status='1'");
    $jum_pesan=$query->num_rows();
    $site = $this->m_konfigurasi->listing();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo ($site->namaweb)?> | Konfigurasi icon</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url('assets/upload/image/'.$site->icon)?>">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

   <?php 
    $this->load->view('admin/v_header');
  ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu Utama</li>
        <li>
          <a href="<?php echo base_url().'admin/dashboard'?>">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i>
            <span>Post</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'admin/tulisan/add_tulisan'?>"><i class="fa fa-thumb-tack"></i> Add New</a></li>
            <li><a href="<?php echo base_url().'admin/tulisan'?>"><i class="fa fa-list"></i> Post Lists</a></li>
            <li><a href="<?php echo base_url().'admin/kategori'?>"><i class="fa fa-wrench"></i> Kategori</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-code"></i>
            <span>Portfolio</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'admin/portfolio/add_portfolio'?>"><i class="fa fa-thumb-tack"></i> Add Portfolio</a></li>
            <li><a href="<?php echo base_url().'admin/portfolio'?>"><i class="fa fa-list"></i> Portfolio List</a></li>
          </ul>
        </li>

        <li>
          <a href="<?php echo base_url().'admin/pengguna'?>">
            <i class="fa fa-users"></i> <span>Pengguna</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

         <li>
          <a href="<?php echo base_url().'admin/event'?>">
            <i class="fa fa-user"></i> <span>Customer event</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

        <li class="treeview active">
          <a href="#">
            <i class="fa fa-wrench"></i>
            <span>Konfigurasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'admin/konfigurasi'?>"><i class="fa fa-cog"></i> Konfigurasi umum</a></li>
            <li class="active"><a href="<?php echo base_url().'admin/konfigurasi/icon'?>"><i class="fa fa-info-circle"></i> Konfigurasi icon</a></li>
            <li><a href="<?php echo base_url().'admin/konfigurasi/wallpaper'?>"><i class="fa fa-image"></i> Konfigurasi wallpaper 1</a></li>
             <li><a href="<?php echo base_url().'admin/konfigurasi/wallpaper2'?>"><i class="fa fa-image"></i> Konfigurasi wallpaper 2</a>
            </li>
            <li><a href="<?php echo base_url().'admin/konfigurasi/wallpaper3'?>"><i class="fa fa-image"></i> Konfigurasi wallpaper 3</a>
            </li>
          </ul>
        </li>
        
        <li>
          <a href="<?php echo base_url().'admin/inbox'?>">
            <i class="fa fa-envelope"></i> <span>Inbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"><?php echo $jum_pesan;?></small>
            </span>
          </a>
        </li>

         <li>
          <a href="<?php echo base_url().'administrator/logout'?>">
            <i class="fa fa-sign-out"></i> <span>Sign Out</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Konfigurasi
        <small></small>
      </h1>
      <ol class="breadcrumb">
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php
                //notifikasi
                if($this->session->flashdata('sukses')){
                  echo'<p class="alert alert-success">';
                  echo $this->session->flashdata('sukses');
                  echo '</div>';
                }
              ?>

              <?php
                //error upload
                if(isset($error)){
                  echo '<p class="alert alert-warning">';
                  echo $error;
                  echo '</p>';
                }
                //error notification
                echo validation_errors('<div class="alert alert-warning">','</div>');

                //form open
                echo form_open_multipart(base_url('admin/konfigurasi/icon'), ' class="form-horizontal"');
              ?>

                  <div class="form-group form-group-xs">
                    <label class="col-md-2 control-label">Nama Pemilik:</label>
                    <div class="col-md-5">
                      <input type="text" name="nama_pemilik" class="form-control" placeholder="Nama Pemilik" value="<?php echo $konfigurasi->nama_pemilik ?>" required>
                    </div>
                  </div>

                  <div class="form-group form-group-xs">
                    <label class="col-md-2 control-label">Nama Website:</label>
                    <div class="col-md-5">
                      <input type="text" name="namaweb" class="form-control" placeholder="Nama Website" value="<?php echo $konfigurasi->namaweb ?>" required>
                    </div>
                  </div>

                  <div class="form-group form-group-xs">
                    <label class="col-md-2 control-label">No Telp perusahaan:</label>
                    <div class="col-md-5">
                      <input type="number" name="no_telp" class="form-control" placeholder="Nomor Telepon" value="<?php echo $konfigurasi->no_telp?>" required>
                    </div>
                  </div>

                  <div class="form-group form-group-xs">
                    <label class="col-md-2 control-label">Email perusahaan:</label>
                    <div class="col-md-5">
                      <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $konfigurasi->email?>" required>
                    </div>
                  </div>

                  <div class="form-group form-group-xs">
                    <label class="col-md-2 control-label">Alamat perusahaan:</label>
                    <div class="col-md-10">
                      <textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo $konfigurasi->alamat?></textarea>
                    </div>
                  </div>

              <div class="form-group form-group-xs">
                <label class="col-md-2 control-label">Upload Icon baru:</label>
                <div class="col-md-5">
                  <input type="file" name="icon" class="form-control" placeholder="Icon" value="<?php echo $konfigurasi->icon?>" required>
                  Wallpaper lama : <br><img src="<?php echo base_url('assets/upload/image/'.$konfigurasi->icon)?>" class="img img-responsive img-thumbnail" width="200">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label"></label>
                <div class="col-md-5">
                  <button class="btn btn-success btn-md" name="submit" type="submit">
                    <i class="fa fa-save"> Simpan</i>
                  </button>
                  <button class="btn btn-primary btn-md" name="reset" type="reset">
                    <i class="fa fa-times"> Reset</i>
                  </button>
                </div>
              </div>
              <?php echo form_close(); ?>
            </div>
            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2020 <a href="#"><?php echo ($site->nama_pemilik)?></a>.</strong> All rights reserved.
  </footer>

  
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->	
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
