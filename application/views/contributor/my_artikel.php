<div class="container">
<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Responsive Hover Table</h3> -->
              <div class="row">
              <div class="col-md-3"> 
                <select class="form-control">
                  <option value="1">Waiting for Verification</option>
                  <option value="2">Publish</option>
                  <option value="3">Not Publish</option>
                </select>
              </div>
              <div class="col-md-2 col-md-offset-7">
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
                </div>
              </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding" style="padding-top: 10px;">
              <table class="table table-hover">
                <tr>
                  <th style="text-align: left;width: 5%;">No</th>
                  <th style="text-align: left;width: 15%;">Judul</th>
                  <th style="text-align: left;width: 35%;">Isi</th>
                  <th style="text-align: center;width: 15%;">Status</th>
                  <th style="text-align: center;width: 15%;">Action</th>
                </tr>
                <?php 
                  $no = 1;
                  //echo print_r($get);
                foreach($get as $my_artikel){?>
                <tr>
                  <td style="text-align: left;"><?php echo $no++ ;?></td>
                  <td style="text-align: left;"><?php echo $my_artikel['judul'];?></td>
                  <td style="text-align: left;"><?php echo substr(strip_tags($my_artikel['isi']),0,20)."...";?></td>
                  <td>
                   <?php if($my_artikel['artikel_status'] == "1"){?>
                    <span class="label label-success">Telah disetujui</span>
                    <?php }else if($my_artikel['artikel_status'] == "0"){?>
                    <span class="label label-warning">Menunggu</span>
                    <?php }else{?>
                    <span class="label label-danger">Ditolak</span>
                     <?php }?>
                  </td>
                  <td>
                    <a href="<?php echo base_url("my_artikel/edit".'/'.$my_artikel['id_artikel']);?>" class="btn btn-info"><span class="fa fa-edit"></span></a>
                    <a class="btn btn-danger"><span class="fa fa-close"></span></a>
                  </td>
                </tr>
                <?php }?>
              </table>
            </div>
            <div class="paging" style="text-align: center;">
                <ul class="pagination">
                <?php foreach ($links as $link) {
                  echo "<li>". $link."</li>";
                } ?>

                </ul>
              </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
</div>

<script type="text/javascript">
  
</script>