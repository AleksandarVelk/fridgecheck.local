
   $( document ).ready(function() {
    $('#pictureupload').click(setLogoRegistration);

    function setLogoRegistration(){

        $dst = $('#picture-preview').html("<img />");
        $dst.children('img').attr('src',$('#picture').val()).addClass("header-avatar");
    };
   
     setLogoRegistration();
    $('body').delegate('#pictureupload','change', function(){
        var data = new FormData();
        data.append("image",$(this).prop('files')[0]);
        var options = {
            url: $(this).data('url'),
            method: "post",
            processData: false, // important
            contentType: false, // important
            data: data,
            dataType: "json",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

            success:function(response, statusText, xhr, $form)
            {
                $('#picture').val(response.file).change();
                $('#image').val(response.filename).change();
                 setLogoRegistration();

                $( ".header-avatar" ).after(function() {
                  return "<p style='color:green;'>Upload Successful</p>";
                });
                $( "#picture-preview p:last-child" ).last().delay(4000).fadeOut(1000);
                
            },
            beforeSend: function(){
                $('body').addClass('ajaxActive');
                console.log('Uploading Image...');
            },
            complete: function(){
                $('body').removeClass('ajaxActive');
            },

            error:function(errors){
                $( ".header-avatar" ).after(function() {
                  return "<p style='color:red;'>Unsuccessful upload</p>";
                });
                $( "#picture-preview p:last-child" ).last().delay(4000).fadeOut(1000);
            }
        };
        $.ajax(options);
    });

  $('#confirmDelete').on('show.bs.modal', function (e) {
      $message = $(e.relatedTarget).attr('data-message');
      $(this).find('.modal-body p').text($message);
      $title = $(e.relatedTarget).attr('data-title');
      $(this).find('.modal-title').text($title);

      // Pass form reference to modal for submission on yes/ok
      var form = $(e.relatedTarget).closest('form');
      $(this).find('.modal-footer #confirm').data('form', form);
  });

  <!-- Form confirm (yes/ok) handler, submits form -->
  $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
      $(this).data('form').submit();
  });


});
