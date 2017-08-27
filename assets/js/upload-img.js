$('#list-button').on('click', function(event) {
  listImage('http://localhost/ptgi/index.php/upload/listImage/2016/06/06');
});

$('#copy-button').on('click', function(event) {
  alert('HELL');
});





  $('#upload-btn').on('click', function(event) {
    var imgFile = $('input[name=image]');
    var uploadURI = $('#form-upload').attr('action');
    var imgToUpload = imgFile[0].files[0];
    console.log(imgToUpload);
    if (imgToUpload != undefined) {
      var formData = new FormData();
      formData.append('image', imgToUpload);
      console.log(formData);
      $.ajax({
        url: uploadURI,
        type: 'post',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
          console.log(data);
          listImage(uploadURI);
        }
      })
    }
  });


function copyToClipboard(txt) {
    var $temp = $("<input>")
    $("body").append($temp);
    $temp.val(txt).select();
    alert($temp.val());
    document.execCommand("copy");
    $temp.remove();
}

function listImage(url = '') {
  var items = [];
  $.getJSON(url, function(data) {
    console.log(data);
    $.each(data['img'], function(index, element) {
      items.push('<li class="list-group-item">'+ element +'<div class="pull-right"><a id="copy-button" data="copyToClipboard(\''+ data['path'] + element + '\')" href="#"><i class="glyphicon glyphicon-copy"></i></a><a href="#"><i class="glyphicon glyphicon-remove"></i></a></div></li>');
    });
    $('.list-group').html("").html(items.join(""));
  })
}
