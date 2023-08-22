

$(document).ready(function(){
    $(document).on('input', '#search', function(){
        var search = $(this).val();
        $.ajax({
            url: "{{ route('search') }}",
            type: 'GET',
            datatype: 'html',
            cache: false,
            data: {
                search: search
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
               $('#user_list').html(data);
            },
            error: function() {
                // Handle errors if the AJAX request fails
            }
        });
    });
});
