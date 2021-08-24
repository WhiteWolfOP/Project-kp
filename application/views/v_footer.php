<?php 
    $site = $this->m_konfigurasi->listing();
?>
<footer id="fh5co-footer" role="contentinfo">

		<div class="container">
			<div class="col-md-3 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
				<h3>Tentang Perusahaan</h3>
				<p><?php echo ($site->namaweb)?> Merupakan <?php echo ($site->about_us)?>.</p>
			</div>
			<div class="col-md-6 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
				<h3>Layanan</h3>
				<ul class="float">
					<li><a href="<?php echo base_url().'blog'?>">Event</a></li>
					<li><a href="<?php echo base_url().'kontak'?>">Kontak</a></li>
					<li><a href="<?php echo base_url().'portfolio'?>">Portofolio</a></li>
					<li><a href="<?php echo base_url().'about'?>">Tentang kita</a></li>
				</ul>
			</div>

			<div class="col-md-2 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
				<h3>Follow Us</h3>
				<ul class="fh5co-social">
					<li><a href="#"><i class="icon-twitter"></i></a></li>
					<li><a href="#"><i class="icon-facebook"></i></a></li>
					<li><a href="#"><i class="icon-google-plus"></i></a></li>
					<li><a href="#"><i class="icon-instagram"></i></a></li>
				</ul>
			</div>


			<div class="col-md-12 fh5co-copyright text-center">
				<p>&copy; 2020 by <a href="http://#/" target="_blank"><?php echo ($site->nama_pemilik)?></a>. All Rights Reserved.</p>
			</div>

		</div>
	</footer>
