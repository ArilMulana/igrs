<!-- Content Header (Page header) -->
<section class="content-header">
  <h2>Form Pendaftaran Permainan Interaktif Elektronik</h2>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Permainan</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
  <!-- Main row -->
  <div class="row">
<div class="col-lg-12">
  <div class="box box-default">
      <div class="box-header with-border">
          <div class="box-body">
            <!-- Container (Pricing Section) -->
          <div class="container-fluid">
            <form role="form" action="" method="post" class="registration-form">
                        
                        <fieldset>
                          <div class="form-top">
                            <div class="form-top-left">
                              <h3>Step 1 / 3</h3>
                                <p>(*) Wajib diisi </p>
                            </div>
                            <div class="form-top-right">
                              <i class="fa fa-user"></i>
                            </div>
                            </div>
                            <div class="form-bottom">
                              
                              <div class="form-group">
                                <label for="inputNama" class="col-sm-2 control-label">Nama Produk</label>
                                <div class="col-sm-10">
                                <input type="nama" class="form-control" id="inputNama">
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="inputPlatform" class="col-sm-2 control-label">Platform</label>
                                <div class="col-sm-10">
                                <select style="width:100%;" class="form-control" name="platform" id="inputPlatform" required="">
                                  <option value="0" selected></option>
                                  <option value="1">PS3</option>
                                  <option value="2">PS4</option>
                                  <option value="3">Android</option>
                                  <option value="4">IOS</option>
                                </select>
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="inputTanggal" class="col-sm-2 control-label">Tanggal Rilis</label>
                                <div class="col-sm-10">
                                <input type="date" class="form-control pull-right" id="datepicker">
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="inputGenre" class="col-sm-2 control-label">Genre (*)</label>
                                <div class="col-sm-10">
                                <label><input type="checkbox" class="">Action</label>
                                <label><input type="checkbox" class="">Shooters</label>
                                <label><input type="checkbox" class="">Adventure</label>
                                <label><input type="checkbox" class="">Role-Playing</label>
                                <label><input type="checkbox" class="">Simulation</label>
                                <label><input type="checkbox" class="">Strategy</label>
                                <label><input type="checkbox" class="">Sport</label>
                                <label><input type="checkbox" class="">Card Games</label>
                                <br>
                                <label><input type="checkbox" class="">Education</label>
                                <label><input type="checkbox" class="">Trivia</label>
                                <label><input type="checkbox" class="">Word Games</label>
                                <label><input type="checkbox" class="">MMO</label>
                                <label><input type="checkbox" class="">Digital Board Game</label>
                                <label><input type="checkbox" class="">Casual</label>
                                <label><input type="checkbox" class="">Arcade</label>
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="inputVersi" class="col-sm-2 control-label">Versi</label>
                                <div class="col-sm-10">
                                <input type="versi" class="form-control" id="inputVersi">
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="inputTarget" class="col-sm-2 control-label">Target Klasifikasi (*)</label>
                                <div class="col-sm-10">
                                <select style="width:100%;" class="form-control" name="target" id="inputTarget" required="">
                                  <option value="0" selected></option>
                                  <option value="1">Kelompok usia 3 (tiga) tahun atau lebih</option>
                                  <option value="2">Kelompok usia 7 (tujuh) tahun atau lebih</option>
                                  <option value="3">Kelompok usia 13 (tiga belas) tahun atau lebih</option>
                                  <option value="4">Kelompok usia 18 (delapan belas) tahun atau lebih</option>
                                  <option value="5">Semua usia</option>
                                </select>
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="inputDeskripsi" class="col-sm-2 control-label">Deskripsi (*)</label>
                                <div class="col-sm-10">
                                <div class="box">
                                  
                                    <textarea class="form-control" id="inputDeskripsi"></textarea>
                                  
                                </div>
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="inputCerita" class="col-sm-2 control-label">Cerita (*)</label>
                                <div class="col-sm-10">
                                <div class="box">
                                  <textarea class="form-control" id="inputCerita"></textarea>
                                </div>
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="inputFitur" class="col-sm-2 control-label">Fitur Game (*)</label>
                                <div class="col-sm-10">
                                <div class="box">
                                  <textarea class="form-control" id="inputFitur"></textarea>
                                </div>
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="inputWaktu" class="col-sm-2 control-label">Anjuran Waktu (*)</label>
                                <div class="col-sm-10">
                                <div class="box">
                                  <textarea class="form-control" id="inputWaktu"></textarea>
                                </div>
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="inputLink" class="col-sm-2 control-label">Link Video (*)</label>
                                <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputLink" placeholder="http://www.youtube.com/gameAnda">
                              </div>
                              </div>

                              <div class="form-group">
                                <label for="inputPendapatan" class="col-sm-2 control-label">Tipe Pendapatan (*)</label>
                                <div class="col-sm-10">
                                <label><input type="checkbox" class="">In App Purchase</label>
                                <label><input type="checkbox" class="">Advertising</label>
                                <label><input type="checkbox" class="">Premium</label>
                                <label><input type="checkbox" class="">Free</label>
                                <label><input type="checkbox" class="">Buy Apps</label>
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="inputPengemasan" class="col-sm-2 control-label">Informasi Pengemasan (*)</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPengemasan">
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="inputWebsite" class="col-sm-2 control-label">Website</label>
                                <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputLink" placeholder="http://www.lalala.com">
                                </div>
                              </div>

                            <button type="button" class="btn btn-next">Selanjutnya</button>
                        </div>
                      </fieldset>
                      
                      <fieldset>
                          <div class="form-top">
                            <div class="form-top-left">
                              <h3>Step 2 / 3</h3>
                                <p>Upload Cover (Ukuran Foto Max 300Kb)</p>
                            </div>
                            <div class="form-top-right">
                              <i class="fa fa-user"></i>
                            </div>
                            </div>
                            <div class="form-bottom">
                              
                            <img src="img/no-pict.jpg">
                            <div class="form-group">
                              
                              <input type="file" id="inputUpload">
                              <br>
                              <button type="submit" class="btn btn-info pull-left">Upload</button>
                              
                            </div> <br><br><br>
                            
                              <button type="button" class="btn btn-previous">Sebelumnya</button>
                              <button type="button" class="btn btn-next">Selanjutnya</button>
                            
            
                        </div>
                      </fieldset>

                      <fieldset>
                          <div class="form-top">
                            <div class="form-top-left">
                              <h3>Step 3 / 3</h3>
                                <p>Upload Screenshots (Ukuran Foto Max 300Kb)</p>
                            </div>
                            <div class="form-top-right">
                              <i class="fa fa-user"></i>
                            </div>
                            </div>
                            <div class="form-bottom">
                              <hr class="featurette-divider">
                              <div class="form-group">
                                  <label class="col-sm-2 control-label">Gambar 1</label>
                                  <div class="col-sm-4">
                                  <input type="file" id="inputUpload">
                                  </div>
                                  <div class="col-sm-6">
                                  <button type="submit" class="btn btn-info pull-left">Upload</button>
                                  </div>
                                </div>
                                <br>
                                <hr class="featurette-divider">
                                <div class="form-group">
                                  <label class="col-sm-2 control-label">Gambar 2</label>
                                  <div class="col-sm-4">
                                  <input type="file" id="inputUpload">
                                  </div>
                                  <div class="col-sm-6">
                                  <button type="submit" class="btn btn-info pull-left">Upload</button>
                                  </div>
                                </div>
                                <br>
                                <hr class="featurette-divider">
                                <div class="form-group">
                                  <label class="col-sm-2 control-label">Gambar 3</label>
                                  <div class="col-sm-4">
                                  <input type="file" id="inputUpload">
                                  </div>
                                  <div class="col-sm-6">
                                  <button type="submit" class="btn btn-info pull-left">Upload</button>
                                  </div>
                                </div>
                                <br>
                                <hr class="featurette-divider"">
                                
                                <div>
                                  <blockquote>
                                  <label><input type="checkbox" class=""> Saya menyatakan bahwa data yang saya masukkan benar dan telah dibaca Terms and Conditions</label>
                                  </blockquote>
                                </div>
                            <button type="button" class="btn btn-previous">Previous</button>
                            <button type="submit" class="btn">Submit</button>
                        </div>
                      </fieldset>

                    </form>
          </div>

          </div>
      </div>
  </div>
</div>
</div>
  <!-- /.row (main row) -->
</section>
<!-- /.content -->

