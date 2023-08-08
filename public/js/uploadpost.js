

$(document).ready(function(){
    $('#form').on('submit',function(e){
        e.preventDefault();
        var form=this;
        $.ajax({
            url:$(form).attr('action'),
            method:$(form).attr('method'),
            data:new FormData(form),
            processData:false,
            datatype:'json',
            contentType:false,
            success:function(data){
              $('#message').css('display','block');
              $('#message').html(data.success);
              $('#message').addClass(data.class_name);

            }
        });
    });
});