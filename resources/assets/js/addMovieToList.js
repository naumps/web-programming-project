$(document).ready(function () {


    $('.add-to-list').click(function () {

        var list_movie_id = $(this).val();

        var parts = list_movie_id.split(' ');

        var url = '/list';
        $.ajax({
            type: 'POST',

            url: url,

            data: {
                'listId': parts[0],
                'movieId': parts[1],
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response !=='true') {
                    window.location.href = 'subscription/change';
                } else {
                    alert('Movie added');
                    location.reload();
                }
            }


        });


    });


    $('.delete-from-list').click(function () {
        var list_movie_id = $(this).val();
        var parts = list_movie_id.split(' ');
        var url = '/list';

        $.ajax({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'DELETE',
            url: url,
            data: {
                'listId': parts[0],
                'movieId': parts[1]
            },
            success: function (data) {
                alert('Movie deleted from list');
                location.reload();
            }


        });

    })


});