
  <section class="content">
    <!-- Main row -->
    <div class="box box-info">
      <div class="box-body">
        <div class="alert alert-warning" role="alert">
          <i class="fa fa-info-circle hint"></i> Ukuran Gambar Maksimal 300KB
        </div>
        <form class = "form-horizontal" >
        <div class="form-group">
    <!--   <label for="gambar" class="col-sm-2 control-label">Gambar</label> -->
          <div class="col-md-5 col-md-offset-5">
            <div class="input-group input-group-sm col-md-8 clearfix">
              <div class="kotak">
                  <img data-toggle="tooltip" title="Cover Artikel" src="#" id="gambar_nodin" alt="Preview Cover Image" style="width: 170px;height: 153px;">
                </div>
               <input data-toggle="tooltip" title="Input Cover Artikel" style="width: 170px;" id="cover" name="cover" required type="file" class="form-control" />
              <span class="label label-danger"><i>Gambar ini ditampilkan untuk cover artikel</i></span>
             
              
              <!-- <span class="input-group-btn">
                <input type="submit" value="Upload" class="btn btn-info btn-flat" />
              </span> -->
            </div>
            <?php echo form_error('cover');?>
          </div>
        </div>  
            <div class="form-group">
              <label for="studio" class="col-sm-2 control-label">Isi berita</label>
              <div class="col-sm-10">
                <textarea name="isi" rows="8" cols="100"></textarea><?php echo form_error('isi');?>
              </div>
            </div>

            <div class="form-group">
              <label for="studio" class="col-sm-2 control-label">Status</label>
              <div class="col-sm-4">
                <input type="number" min="0" max="2" name="artikel_status" class="form-control"><?php echo form_error('artikel_status');?>
              </div>
            </div>
            
            <div class="col-md-12 text-center">
              <div class="box-footer form-inline ">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
        </form>  
      </div>
    </div>
    <!-- /.row (main row) -->
  </section>
  <!-- /.content -->