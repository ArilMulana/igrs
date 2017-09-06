  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="box box-info">
      <div class="box-body">
    
    <form class = "form-horizontal" <?php echo form_open('cms/artikel/create');?>    
       <div class="form-group">
        <label for="studio" class="col-sm-2 control-label">Judul berita</label>
        <div class="col-sm-10">
          <input type="text" name="judul" class="form-control" placeholder=""><?php echo form_error('judul');?>
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
</div>
<!-- /.content-wrapper -->
