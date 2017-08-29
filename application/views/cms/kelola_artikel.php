  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="box box-info">
      <div class="box-header">
        <a href="<?php echo base_url('cms/artikel/create')?>" class="btn btn-primary btn-sm"><span class="fa fa-plus-circle"></span>Tambahkan berita</a>
      </div>
      <div class="box-body">
      <tbody>
          <?php foreach ($artikel as $artikel_item) { ?>
          <tr>
              
              
              
          </tr>
          <?php }; ?>
      </tbody>
  </table>
        <table id="example2" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Id Berita</th>
              <th>Judul berita</th>
              <th>Isi berita</th>
              <th>Tanggal dibuat</th>
              <th>Status berita</th>
              <th>Kategori</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($artikel as $artikel_item) { ?>
            <tr>
              <td><?php echo $artikel_item['berita_id']; ?></td>
              <td><a href="<?php echo site_url('cms/artikel/'.$artikel_item['slug']); ?>"><?php echo $artikel_item['berita_judul']; ?></a></td>                
              <td><?php echo excerpt($artikel_item['berita_teks']); ?></td>
              <td><?php echo $artikel_item['berita_created_at']; ?></td>
              <td><?php echo $artikel_item['berita_created_by']; ?></td>
              <td><?php echo $artikel_item['kategori']; ?></td>
              <td><a href="<?php echo site_url('cms/artikel/update/'.$artikel_item['berita_id']); ?>">Edit</a></td>
              <td><a class="AlertaEliminarCliente" href="<?php echo site_url('cms/artikel/delete/'.$artikel_item['berita_id']); ?>">Hapus</a></td>
            </tr>
            <?php }; ?>
          </tbody>
        </table> 
      </div>
    </div>
    <!-- /.row (main row) -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
