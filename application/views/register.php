<style type="text/css">
  
  label.btn span {
    font-size: 1.5em ;
  }

  label input[type="radio"] ~ i.fa.fa-circle-o{
      color: #c8c8c8;    display: inline;
  }
  label input[type="radio"] ~ i.fa.fa-dot-circle-o{
      display: none;
  }
  label input[type="radio"]:checked ~ i.fa.fa-circle-o{
      display: none;
  }
  label input[type="radio"]:checked ~ i.fa.fa-dot-circle-o{
      color: #7AA3CC;    display: inline;
  }
  label:hover input[type="radio"] ~ i.fa {
  color: #7AA3CC;
  }

  label input[type="checkbox"] ~ i.fa.fa-square-o{
      color: #c8c8c8;    display: inline;
  }
  label input[type="checkbox"] ~ i.fa.fa-check-square-o{
      display: none;
  }
  label input[type="checkbox"]:checked ~ i.fa.fa-square-o{
      display: none;
  }
  label input[type="checkbox"]:checked ~ i.fa.fa-check-square-o{
      color: #7AA3CC;    display: inline;
  }
  label:hover input[type="checkbox"] ~ i.fa {
  color: #7AA3CC;
  }

  div[data-toggle="buttons"] label.active{
      color: #7AA3CC;
  }

  div[data-toggle="buttons"] label {
  display: inline-block;
  padding: 6px 12px;
  margin-bottom: 0;
  font-size: 14px;
  font-weight: normal;
  line-height: 2em;
  text-align: left;
  white-space: nowrap;
  vertical-align: top;
  cursor: pointer;
  background-color: none;
  border: 0px solid 
  #c8c8c8;
  border-radius: 3px;
  color: #c8c8c8;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
  }

  div[data-toggle="buttons"] label:hover {
  color: #7AA3CC;
  }

  div[data-toggle="buttons"] label:active, div[data-toggle="buttons"] label.active {
  -webkit-box-shadow: none;
  box-shadow: none;
  }

</style>
<?php echo $script_captcha; // javascript recaptcha ?>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <ul class="nav nav-tabs nav-justified">
            <li class="active"><a data-toggle="tab" href="#developer">Developer</a></li>
            <li><a data-toggle="tab" href="#kontributir">Kontributor</a></li>
        </ul>

        <div class="tab-content">
            <div id="developer" class="tab-pane fade in active">
              <br>
            <h3>Developer</h3>
            <p>Developer dapat mendaftarkan permainannya dan mendapatkan rating game
               berdasarkan klasifikasi IGRS</p>
            <p> Klasifikasi Permainan Interaktif  Elektronik berdasarkan :</p>

            <p> 1. Kategori konten

              Rokok, minuman keras, dan narkotika, psikotropika dan zat adiktif lainnya;;
              Kekerasan;
              Darah, mutilasi, dan kanibalisme;
              Penggunaan bahasa;
              Penampilan tokoh;
              Seksual;
              Penyimpangan seksual;
              Simulasi judi;
              Horor; dan
              Interaksi daring (dalam jaringan).</p>
              
            <p> 2. Kelompok usia pengguna

              Kelompok usia 3+
              Kelompok usia 7+
              Kelompok usia 13+
              Kelompok usia 18+ dan
              Kelompok pengguna semua usia.</p>
            </div>
          

          <div id="kontributir" class="tab-pane fade">
              <h3>Kontributor</h3>
            <p>
              IGRS (Indonesia Game Rating System) atau Klasifikasi Permainan Interaktif Elektronik. IGRS merupakan implemetasi peraturan Menteri Komunikasi dan Informatika Republik Indonesia nomor 11 tahun 2016 tentang Klasifikasi Permainan Interaktif Elektronik</p>
            <p>
              Kontributor dapat membuat berita dan artikel pada laman "Berita" setelah disetujui oleh 
              admin IGRS
            </p>
          </div>

          </div>
      </div>
       <div class="col-md-6">
         <center><h1>DAFTAR</h1></center>
         <?php 
            // $version = apache_get_version();
            // echo $version;
                $attribute = array('id'=>'form_reg','class'=>'form-horizontal','role'=>'form');
                echo form_open_multipart($action,$attribute);?>
                  <!-- <span id="reauth-email" class="reauth-email"></span> -->
                  <div class="form-group">
                      <label for="name" class="cols-sm-2 control-label">Nama Lengkap</label>
                      <div class="cols-sm-10">
                          <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                              <input type="name" class="form-control" name="name" id="name"  placeholder="Masukkan Nama Lengkap" required autofocus>
                          </div>
                      </div>
                      <?php //echo form_error('name');?>
                  </div>
                  <div class="form-group">
                      <label for="telepon" class="cols-sm-2 control-label">Nomor Telepon</label>
                      <div class="cols-sm-10">
                          <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
                              <input type="telepon" class="form-control" name="telepon" id="telepon"  placeholder="Masukkan Nomor Telepon"/ required>
                          </div>
                          <?php echo form_error('telepon');?>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="email" class="cols-sm-2 control-label">Email</label>
                      <div class="cols-sm-10">
                          <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                              <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email" required>
                          </div>
                          <?php echo form_error('email');?>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="password" class="cols-sm-2 control-label">Kata Sandi</label>
                      <div class="cols-sm-10">
                          <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-lock fa" aria-hidden="true"></i></span>
                              <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Kata Sandi" required>
                          </div>
                          <?php echo form_error('password');?>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="re-password" class="cols-sm-2 control-label">Ulangi Kata Sandi</label>
                      <div class="cols-sm-10">
                          <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-lock fa" aria-hidden="true"></i></span>
                              <input type="password" id="re-password" name="re-password" class="form-control" placeholder="Masukkan Ulang Kata Sandi" required>
                           
                          </div>
                             <?php echo form_error('re-password');?>
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="btn-group btn-group-horizontal" data-toggle="buttons">
                          <label class="btn">
                            <input value="6" type="radio" name='role' id="role"><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x" required></i> <span> Contributor</span>
                          </label>
                          <label class="btn">
                            <input value="7" type="radio" name='role' id="role" required><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i><span>Developper</span>
                          </label>
                        </div>
                      </div>
                     </div>
                  </div>
                  <div class="form-group">
                      <div class="cols-sm-10">
                        <?php echo $captcha ;?>
                      </div>
                  </div>
                  <button class="btn btn-primary" type="submit" id="submit">Submit</button>
                  <?php echo form_close();?>
             <!-- /form -->
      </div><!-- col-md-6 /- -->
    </div>
    <?php //echo validation_errors();?>
  </div><!-- container /- -->