
/*
$(document).ready(function() {
  $('body').on('click','.thumbnail', function(e) {
    e.preventDefault();
    var id = $(this).find('.can-copy').attr('id');
    $(function() {
      $('#txt'+id).select();
      console.log($('#txt'+id).val())
    })
    document.execCommand('copy');
    $(this).addClass('copied');
    $(this).find('.copyclipboard').append('Copy');
    $(this).delay(200).show(10, function() {
      $(this).delay(400).removeClass('copied');
      $(this).find('.copyclipboard').html('');
    });
  });
});
*/

$(function() {

  $("#reset-input").on('click', function() {
    $('input[name=featuredimg]').val('');
    $('input[name=uptext]').val('');
  });


  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });

});
