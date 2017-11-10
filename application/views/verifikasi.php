<div class="container">
		<!-- Modalnyaa -->
		<div class="modal fade" id="modalVerif" tabindex="-1" role="dialog" aria-labelledby="modalVerifLabel" aria-hidden="true">
		    <div class="modal-dialog modal-sm">
		        <div class="modal-content">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
		                </button>
		                 <h4 class="modal-title text-center" id="modalVerifLabel">Verifikasi Berhasil</h4>

		            </div>
		            <div class="modal-body text-center">
		                <p>Selamat datang, gwoksz@gmail.com<br>
		                   Akun anda berhasil diaktifkan</p>
		            </div>
		            <div class="modal-footer">
		            	<a href="<?php echo base_url('login');?>" class="btn btn-primary" role="button">Masuk ke IGRS</a>
		            </div>
		        </div>
		    </div>
		</div>
		<!-- /Modalnyaa -->
	</div><!-- container /- -->
	<script src="<?php echo base_url('assets/js/jquery-2.2.3.min.js')?>"></script>	
	<script>
		//new UISearch( document.getElementById( 'sb-search' ) );

		$(document).ready(function () {
	    	$('#modalVerif').modal('show');
		});

	</script>