  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h2>Permainan Interaktif Elektronik</h2>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Permainan</li>
      </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="box box-info">
      <div class="box-header">
        <a href="<?php echo site_url('pengembang/permainan/tambah'); ?>" class="btn btn-primary btn-sm"><span class="fa fa-plus-circle"></span> Daftarkan Permainan</a>
      </div>
      <div class="box-body">
        <table id="example2" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Nama Aplikasi</th>
              <th>Platform</th>
              <th>Pengujian Penyelenggara</th>
              <th>Pengujian Komite</th>
              <th>Edit</th>
              <th>Hapus</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($direktori as $direktori_item): ?>
            <tr>
              <td> <?php echo $direktori_item['nama_produk']; ?>
              </td>
              <td><?php echo $direktori_item['platform']; ?></td>
              <td><a href="#">Klik Di sini</a> untuk memulai pengujian aplikasi</td>
              <td>Aplikasi sedang diuji oleh Komite IGRS</td>
              <td><a href="<?php echo site_url('pengembang/permainan/edit'); ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
              <td><a href="<?php echo site_url('pengembang/permainan/hapus'); ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table> 
      </div>
    </div>
    <!-- /.row (main row) -->
  </section>
  <!-- /.content -->
