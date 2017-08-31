  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="box box-info">
      <div class="box-body">
    
    <form class = "form-horizontal" <?php echo form_open('cms/artikel/update/'.$artikel_item['berita_id']); ?>    
       <div class="form-group">
        <label for="studio" class="col-sm-2 control-label">Judul berita</label>
        <div class="col-sm-10">
          <input type="text" name="berita_judul" class="form-control" placeholder="" value="<?php echo $artikel_item['berita_judul']; ?>"><?php echo form_error('berita_judul');?>
        </div>
      </div>

      <div class="form-group">
        <label for="studio" class="col-sm-2 control-label">Isi berita</label>
        <div class="col-sm-10">
          <textarea name="berita_teks" rows="8" cols="100"><?php echo $artikel_item['berita_teks']; ?></textarea><?php echo form_error('berita_teks');?>
        </div>
      </div>
      
      <div class="form-group">
        <label for="studio" class="col-sm-2 control-label">Kategori</label>
        <div class="col-sm-4">
          <select class="form-control" name="kategori">
          <option><?php echo $artikel_item['kategori']; ?></option>
          <option>Semua Genre</option>
          <option>Action</option>
          <option>Shooter</option>
          <option>Adventure</option>
          <option>Role-playing</option>
          <option>Strategy</option>
          <option>Sports</option>
        </select>
        <?php echo form_error('kategori');?>
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