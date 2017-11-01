<style>
		.jumbotron {
			background-color: #cd382e;
			color: white;
			padding: 60px 50px;
			margin-bottom: 0px;
		}
		.container-fluid {
			padding: 30px 50px;
		}
		.bg-grey {
			background-color: #f6f6f6;
		}
		.col-xs-15,
		.col-sm-15,
		.col-md-15,
		.col-lg-15 {
			position: relative;
			min-height: 1px;
			padding-right: 10px;
			padding-left: 10px;
		}
		.col-xs-15 {
			width: 20%;
			float: left;
		}

		@media (min-width: 768px) {
		.col-sm-15 {
				width: 20%;
				float: left;
			}
		}

		@media (min-width: 992px) {
			.col-md-15 {
				width: 20%;
				float: left;
			}
		}

		@media (min-width: 1200px) {
			.col-lg-15 {
				width: 20%;
				float: left;
			}
		}
	</style>

	<!-- jumbotron Section -->
	
	<!-- jumbotron Section -->
	<div class="jumbotron text-center">
		<h1>IGRS</h1>
		<p>IGRS (Indonesia Game Rating System) adalah  Klasifikasi Permainan Interaktif Elektronik
		yang berfungsi sebagai alat untuk mengklasifikasikan game berdasarkan kategori konten 
		dan kelompok usia pengguna. <a href="faq.html"><small>Selengkapnya</small></a></p>
		
		<form class="form-inline">
			<div class="input-group">
				<input type="text" class="form-control" size="90" placeholder="Nama Permainan" required>
				<div class="input-group-btn">
					<button type="button" class="btn btn-primary">   Cari   </button>
				</div>
			</div>
		</form>
	</div>
	<!-- /jumbotron Section -->
	
	<!-- apa itu igrs -->
	<div class="container-fluid text-center bg-grey">
		<div class="container">
			<div class="section-header">
			<h2>Apa itu IGRS?</h2>
			</div>
			<center>
			
			<div class="col-md-2"></div>
			<div class="col-md-8 col-xs-12">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="http://www.youtube.com/embed/T4uNrqPjOuM?rel=0&playlist=tvEnYKrCAXc,br98lAhoeYc" frameborder="0" allowfullscreen=""></iframe>
				</div>
			</div>
			<div class="col-md-2"></div>
			
			</center>
		</div>
	</div>
	<!-- /apa itu igrs -->
	
	<!-- jenis rating Section -->
	<div class="container-fluid text-center">
		<div class="section-header">
		<h2>Klasifikasi di IGRS</h2>
		</div>
		
		<p>Rating berdasarkan kelompok usia digunakan untuk memastikan bahwa konten yang dimainkan 
		untuk kelompok usia yang paling sesuai. IGRS dapat menjadi panduan bagi konsumen (terutama orang tua)
		 untuk membantu mereka memutuskan apakah akan membeli game tertentu atau tidak<p>
		<div class="row text-center">
		<div class="col-md-15 col-xs-12">
			<div class="thumbnail">
				<img src="<?php echo base_url()?>assets/images/sample/rate3.png" width="150px">
				<p><strong>3 Tahun atau lebih</strong></p>
				
				<!-- modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rate3">Selengkapnya</button>
				<div class="modal fade" id="rate3" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Kelompok Usia 3 tahun atau lebih</h4>
							</div>
							
							<div class="modal-body">
								<p>Tidak memperlihatkan tulisan atau gambar yang berhubungan dengan rokok, minuman keras, dan narkotika, psikotropika dan zat adiktif lainnya
							
								</p>
							</div>
						</div>
					</div>
				</div>
				<!-- /modal -->
				
			</div>
		</div>
		<div class="col-md-15 col-xs-12" >
			<div class="thumbnail">
				<img src="<?php echo base_url()?>assets/images/sample/rate7.png" width="150px">
				<p><strong>7 Tahun atau lebih</strong></p>
				<!-- modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rate7">Selengkapnya</button>
				<div class="modal fade" id="rate7" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Kelompok Usia 7 tahun atau lebih</h4>
							</div>
							
							<div class="modal-body">
								<p>Tidak memperlihatkan tulisan atau gambar yang berhubungan dengan rokok, minuman keras, dan narkotika, psikotropika dan zat adiktif lainnya</p>
							</div>
						</div>
					</div>
				</div>
				<!-- /modal -->
			</div>
		</div>
		<div class="col-md-15 col-xs-12">
			<div class="thumbnail">
				<img src="<?php echo base_url()?>assets/images/sample/rate13.png" width="150px">
				<p><strong>13 Tahun atau lebih</strong></p>
				<!-- modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rate13">Selengkapnya</button>
				<div class="modal fade" id="rate13" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Kelompok Usia 13 tahun atau lebih</h4>
							</div>
							
							<div class="modal-body">
								<p>Tidak memperlihatkan tulisan atau gambar yang berhubungan dengan rokok, minuman keras, dan narkotika, psikotropika dan zat adiktif lainnya</p>
							</div>
						</div>
					</div>
				</div>
				<!-- /modal -->
			</div>
		</div>
		<div class="col-md-15 col-xs-12">
			<div class="thumbnail">
				<img src="<?php echo base_url()?>assets/images/sample/rate18.png" width="150px">
				<p><strong>18 Tahun atau lebih</strong></p>
				<!-- modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rate18">Selengkapnya</button>
				<div class="modal fade" id="rate18" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Kelompok Usia 18 tahun atau lebih</h4>
							</div>
							
							<div class="modal-body">
								<p>Tidak memperlihatkan tulisan atau gambar yang berhubungan dengan rokok, minuman keras, dan narkotika, psikotropika dan zat adiktif lainnya</p>
							</div>
						</div>
					</div>
				</div>
				<!-- /modal -->
			</div>
		</div>
		<div class="col-md-15 col-xs-12">
			<div class="thumbnail">
				<img src="<?php echo base_url()?>assets/images/sample/ratesu.png" width="150px">
				<p><strong>Semua Umur</strong></p>
				<!-- modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ratesu">Selengkapnya</button>
				<div class="modal fade" id="ratesu" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Kelompok Usia Semua Umur</h4>
							</div>
							
							<div class="modal-body">
								<p>Tidak memperlihatkan tulisan atau gambar yang berhubungan dengan rokok, minuman keras, dan narkotika, psikotropika dan zat adiktif lainnya</p>
							</div>
						</div>
					</div>
				</div>
				<!-- /modal -->
			</div>
		</div>
		</div>

	</div>
	<!-- /jenis rating Section -->
	
	<!-- kontribusi -->
	<div class="container-fluid bg-grey">
		<h2>Kontribusi</h2>
		<p>Anda dapat berkontribusi dengan cara <a href="masuk.html">mendaftarkan permainan anda</a>
		atau  <a href="pengaduan.html">melaporkan permainan</a> yang tidak sesuai dengan rating usia</p>
	</div>
	<!-- /kontribusi -->
	
	<!-- News Feed -->
		<div id="newsfeed" class="entertainment-and-fashion-section">
			<!-- Container -->
			<div class="container">

				<div class="row">
					<!-- col-md-6 -->
					<div class="col-md-6 col-sm-6">
						<!-- header newsfeed -->
						<div class="section-header">
							<h2>Berita Favorit</h2>
						</div>
						<!-- header newsfeed -->
						
						<div class="entertainment-box row">
							<div class="col-md-4 col-sm-4 col-xs-4">
								<a href="#"><img src="<?php echo base_url()?>assets/images/berita1.jpg" alt="entertainment-and-fashion" width="170" height="153"/></a>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<a href="#" class="block-title">Kemkominfo bersama AGI, Kemendikbud, KPPPA, Psikolog dalam mepersiapakn pelaksanaan IGRS</a>
								<p class="time"><i class="fa fa-clock-o"></i> 1 Hour ago</p>
								<p>Kemkominfo Berasama Asoasiasi Game Indonesia, Kemendikbud, KPPPA, Psikolog mempersiapkan Perangkat Pedukung serta Materi Sosialisasi IGRS</p>
							</div>
						</div><br>
						
						<div class="entertainment-box row">
							<div class="col-md-4 col-sm-4 col-xs-4">
								<a href="#"><img src="<?php echo base_url()?>assets/images/berita4.jpg" alt="entertainment-and-fashion" width="170" height="153"/></a>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<a href="#" class="block-title">Peta Industri Game Indonesia 2015</a>
								<p class="time"><i class="fa fa-clock-o"></i> 1 Hour ago</p>
								<p>Buku peta pelaku permainan interaktif elektronik Indonesia 2015 hasil kajian yang dibuat antara Kominfo, Akademisi, Praktisi dengan melibatkan beberapa pelaku ekosistem yang</p>
							</div>
						</div><br>
						
						<div class="entertainment-box row">
							<div class="col-md-4 col-sm-4 col-xs-4">
								<a href="#"><img src="<?php echo base_url()?>assets/images/berita1.jpg" alt="entertainment-and-fashion" width="170" height="153"/></a>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<a href="#" class="block-title">Kemkominfo bersama AGI, Kemendikbud, KPPPA, Psikolog dalam mepersiapakn pelaksanaan IGRS</a>
								<p class="time"><i class="fa fa-clock-o"></i> 1 Hour ago</p>
								<p>Kemkominfo Berasama Asoasiasi Game Indonesia, Kemendikbud, KPPPA, Psikolog mempersiapkan Perangkat Pedukung serta Materi Sosialisasi IGRS</p>
							</div>
						</div><br>
						
					</div><!-- col-md-6 /- -->
					
					<!-- col-md-6 -->
					<div class="col-md-6 col-sm-6">
					
					<!-- header newsfeed -->
						<div class="section-header">
							<h2>Permainan Populer</h2>
						</div>
					<!-- header newsfeed -->
					
						<div class="entertainment-box row">
							<div class="col-md-4 col-sm-4 col-xs-4">
								<a href="#"><img src="<?php echo base_url()?>assets/images/berita1.jpg" alt="entertainment-and-fashion" width="170" height="153"/></a>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<a href="#" class="block-title">Kemkominfo bersama AGI, Kemendikbud, KPPPA, Psikolog dalam mepersiapakn pelaksanaan IGRS</a>
								<p class="time"><i class="fa fa-clock-o"></i> 1 Hour ago</p>
								<p>Kemkominfo Berasama Asoasiasi Game Indonesia, Kemendikbud, KPPPA, Psikolog mempersiapkan Perangkat Pedukung serta Materi Sosialisasi IGRS</p>
							</div>
						</div><br>
						
						<div class="entertainment-box row">
							<div class="col-md-4 col-sm-4 col-xs-4">
								<a href="#"><img src="<?php echo base_url()?>assets/images/berita4.jpg" alt="entertainment-and-fashion" width="170" height="153"/></a>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<a href="#" class="block-title">Peta Industri Game Indonesia 2015</a>
								<p class="time"><i class="fa fa-clock-o"></i> 1 Hour ago</p>
								<p>Buku peta pelaku permainan interaktif elektronik Indonesia 2015 hasil kajian yang dibuat antara Kominfo, Akademisi, Praktisi dengan melibatkan beberapa pelaku ekosistem yang</p>
							</div>
						</div><br>
						
						<div class="entertainment-box row">
							<div class="col-md-4 col-sm-4 col-xs-4">
								<a href="#"><img src="<?php echo base_url()?>assets/images/berita1.jpg" alt="entertainment-and-fashion"  width="170" height="153"/></a>
							</div>
							<div class="col-md-8 col-sm-8 col-xs-8">
								<a href="#" class="block-title">Kemkominfo bersama AGI, Kemendikbud, KPPPA, Psikolog dalam mepersiapakn pelaksanaan IGRS</a>
								<p class="time"><i class="fa fa-clock-o"></i> 1 Hour ago</p>
								<p>Kemkominfo Berasama Asoasiasi Game Indonesia, Kemendikbud, KPPPA, Psikolog mempersiapkan Perangkat Pedukung serta Materi Sosialisasi IGRS</p>
							</div>
						</div><br>
					</div><!-- col-md-6 /- -->
				</div>
			</div><!-- container /- -->
		</div><!-- News Feed -->
	
		
	<script type="text/javascript">
		$(function(){
			new UISearch( document.getElementById( 'sb-search' ) );
		})
	</script>