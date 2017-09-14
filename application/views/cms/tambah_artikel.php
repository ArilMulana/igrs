<div class="alert alert-warning" role="alert">
  <i class="fa fa-info-circle hint"></i> Ukuran Gambar Maksimal 300KB
</div>

<form class = "form-horizontal" <?php echo form_open('cms/artikel/create');?>>    

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
    <label for="judul" class="col-sm-2 control-label" style="text-align: center;">Judul artikel<span style="font-weight: bold;color: red;margin-left: 10px;">*</span></label>
    <div class="col-sm-10">
     <input id="judul" name="judul" type="text" maxlength="100" class="form-control" placeholder=""><span id="count" class="label label-info"> </span>
     <?php echo form_error('judul');?>
    </div>                
  </div>
  <div class="form-group">
    <label for="inputIsi" style="text-align: center;" class="col-sm-2 control-label">Isi<span style="font-weight: bold;color: red;margin-left: 10px;">*</span></label>
    <div class="col-sm-10">
      <div class="box">
          <textarea id="isi" name="isi" class="textarea" placeholder="" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
        
      </div>
     <?php echo form_error('isi')?>
    </div>
  </div>
  
  <div class="col-md-12 text-center">
    <div class="box-footer form-inline ">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>  

<script type="text/javascript" src="<?= base_url()?>assets/libraries/jquery.min.js"></script>
<script type="text/javascript">
  var judul = document.getElementById('judul');
  var length = judul.getAttribute("maxlength");
  var count = document.getElementById('count');
  count.innerHTML = length;
  judul.onkeyup = function () {
      document.getElementById('count').innerHTML = (length - this.value.length);
      if(length-this.value.length <20){

      }
  };
    tinymce.init({
        selector: 'textarea',  // change this value according to your HTML
        auto_focus: 'element1',
        plugins: "image imagetools",
        imagetools_toolbar: "rotateleft rotateright | flipv fliph | editimage imageoptions",
        images_upload_base_path: './assets/images'
    }); 
  function bacaGambar(input) {
     if (input.files && input.files[0]) {
        var reader = new FileReader();
   
        reader.onload = function (e) {
            $('#gambar_nodin').attr('src', e.target.result);
        }
   
        reader.readAsDataURL(input.files[0]);
     }
  }

  $("#cover").change(function(){
      bacaGambar(this);
  });
  
</script>