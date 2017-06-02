<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$accounts = $this->db->query('SELECT * FROM user WHERE id_user='.$this->session->userdata('id'));
$account = $accounts->row();
?>
<div ng-controller="widgetsController">
	<div class="row">

		<div class="col-lg-12">
			<div class="card card-inverse bg-bluegrey text-white text-center">
				<div class="card-block">
				   <img src="<?php echo base_url(); ?>assets/images/icon-pusjatan.png" class="img-thumbnail img-circle"/>
					<h5>Aplikasi Kamus Istilah Teknik Jalan dan Jembatan (KIJT)</h5>
					<h5>Pusat Litbang Jalan dan Jembatan</h5>
				</div>
			</div>
		</div>
	</div>
</div>