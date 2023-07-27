


$(document).ready(function() {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

    $(".likes").on("click", function(event) {
        event.preventDefault();

        var like_s = $(this).attr('data-like');
        var post_id = $(this).attr('data-postid');
        post_id=post_id.slice(0,-2);



        // Include the CSRF token in the headers of the AJAX request
        $.ajax({
            type: 'POST',
            url: "/like",
            data: {
                like_s: like_s,
                post_id: post_id
            },
            success: function(data) {
                if(data.is_like==1){
                    $('*[data-postid="'+ post_id +'_L"]').removeClass('btn-secondary').addClass('btn-success');
                    $('*[data-postid="'+ post_id +'_D"]').removeClass('btn-danger').addClass('btn-secondary');


                    var cu_like= $('*[data-postid="'+ post_id +'_L"]').find('.likeCount').text();
                    var new_like=parseInt(cu_like) + 1;
                    $('*[data-postid="'+ post_id +'_L"]').find('.likeCount').text(new_like);
                }

                if(data.change_like==1){
                    var cu_dislike= $('*[data-postid="'+ post_id +'_D"]').find('.dislikeCount').text();
                    var new_dislike=parseInt(cu_dislike) - 1;
                    $('*[data-postid="'+ post_id +'_D"]').find('.dislikeCount').text(new_like);

                }

                if(data.is_like==0){
                    $('*[data-postid="'+ post_id +'_L"]').removeClass('btn-success').addClass('btn-secondary');


                    var cu_like= $('*[data-postid="'+ post_id +'_L"]').find('.likeCount').text();
                    var new_like=parseInt(cu_like) - 1;
                    $('*[data-postid="'+ post_id +'_L"]').find('.likeCount').text(new_like);
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                console.log(xhr.status); // Log the HTTP status code
            }
        });
    });
});


$(document).ready(function() {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $(".dislikes").on("click", function(event) {
        event.preventDefault();

        var like_s = $(this).attr('data-dislike');
        var post_id = $(this).attr('data-postid');
        post_id=post_id.slice(0,-2);



$.ajax({
    type: 'POST',
    url: "/dislike",
    data: {
        like_s: like_s,
        post_id: post_id
    },
    success: function(data) {

        if(data.is_dislike==1){
            $('*[data-postid="'+ post_id +'_D"]').removeClass('btn-secondary').addClass('btn-danger');
            $('*[data-postid="'+ post_id +'_L"]').removeClass('btn-success').addClass('btn-secondary');

            var cu_dislike= $('*[data-postid="'+ post_id +'_D"]').find('.dislikeCount').text();
                    var new_dislike=parseInt(cu_dislike) + 1;
                    $('*[data-postid="'+ post_id +'_D"]').find('.dislikeCount').text(new_dislike);


        }


        if(data.change_dislike==1){
            var cu_like= $('*[data-postid="'+ post_id +'_L"]').find('.likeCount').text();
            var new_like=parseInt(cu_like) - 1;
            $('*[data-postid="'+ post_id +'_L"]').find('.likeCount').text(new_like);
        }
        if(data.is_dislike==0){
            $('*[data-postid="'+ post_id +'_D"]').removeClass('btn-danger').addClass('btn-secondary');


            var cu_dislike= $('*[data-postid="'+ post_id +'_D"]').find('.dislikeCount').text();
                    var new_dislike=parseInt(cu_dislike) - 1;
                    $('*[data-postid="'+ post_id +'_D"]').find('.dislikeCount').text(new_dislike);
        }


    },
    error: function(xhr, textStatus, errorThrown) {
        console.log(xhr.status); // Log the HTTP status code
    }
});
});
});







