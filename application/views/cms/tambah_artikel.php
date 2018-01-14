
  <section class="content">
    <!-- Main row -->
    <div class="box box-info">
      <?= $this->session->flashdata('pesan');?>
      <div class="box-body">
        <div class="alert alert-warning" role="alert">
          <i class="fa fa-info-circle hint"></i> Ukuran Gambar Maksimal 300KB
        </div>
        <?php 
                  // $action = 'artikel/artikel/feedartikel';
                  $attribute = array('id'=>'artikel','class'=>'form-horizontal','role'=>'form');
                  echo form_open_multipart($action,$attribute);?>   
        <div class="form-group">
    <!--   <label for="gambar" class="col-sm-2 control-label">Gambar</label> -->
          <div class="col-md-5 col-md-offset-5">
            <div class="input-group input-group-sm col-md-8 clearfix">
              <div class="kotak">
                  <img data-toggle="tooltip" title="Cover Artikel" src="#" id="gambar_nodin" alt="Preview Cover Image" style="width: 170px;height: 153px;">
                </div>
               <input data-toggle="tooltip" title="Input Cover Artikel" style="width: 170px;" id="cover" name="cover" required type="file" class="form-control" />
              <span class="label label-danger"><i>Gambar ini ditampilkan untuk cover artikel</i></span>
            </div>
            <?php //echo form_error('cover');?>
          </div>
        </div>  
         <div class="form-group">
              <label for="studio" class="col-sm-2 control-label">Judul</label>
              <div class="col-sm-6">
                <input type="text" name="judul" id="judul" class="form-control">
              </div>
              <?php echo form_error('judul');?>
            </div>
            <div class="form-group">
              <label for="studio" class="col-sm-2 control-label">Isi berita</label>
              <div class="col-sm-10">
                <textarea class="textarea" id="isi" name="isi" rows="8" cols="100"></textarea><?php echo form_error('isi');?>
              </div>
            </div>
            <div class="form-group">
                <label for="inputIsi" class="col-sm-2 control-label">Kategori</label>
                <div class="col-sm-4">
                  <select name="cat" id="cat" class="form-control">
                      <option value="" >Pilih Kategori</option>
                      <option value="Edukasi">Edukasi</option>
                      <option value="Tips dan trick">Tips dan trick</option>
                      <option value="Keluarga" >Keluarga</option>
                      <option value="Pendidikan">Pendidikan</option>
                      <option value="Lain-lain" >Lain-lain</option>
                    </select>
                 <?php// echo form_error('cat')?>
                </div>
            </div>
            <div class="form-group">
              <label for="studio" class="col-sm-2 control-label">Status</label>
              <div class="col-sm-1">
                <input type="number" min="0" max="2" id="artikel_status" name="artikel_status" class="form-control"><?php //echo form_error('artikel_status');?>
              </div>
            </div>
            
            <div class="col-md-12 text-center">
              <div class="box-footer form-inline ">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
        <?php echo form_close();?> 
      </div>
    </div>
    <!-- /.row (main row) -->
  </section>
  <!-- /.content -->
  <script type="text/javascript" src="<?= base_url()?>assets/libraries/jquery.min.js"></script>
  <script type="text/javascript">
        tinymce.init({
        selector: 'textarea',  // change this value according to your HTML
        auto_focus: 'element1',
        plugins: "image imagetools",
        imagetools_toolbar: "rotateleft rotateright | flipv fliph | editimage imageoptions",
        images_upload_base_path: './assets/images'
    }); 
  </script>