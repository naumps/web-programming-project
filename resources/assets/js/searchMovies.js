$('.searchmovie').click(function (event) {
    event.preventDefault();
    var title = $('.searchtitle').val();
    $.ajax({
        url: 'http://www.omdbapi.com/',
        method: 'GET',
        data: {
            //8dd0eb03

            apikey: '74eeabf5',
            s: title,
            page: 1


        },
        success: function ({Search}) {

            let data = Search;
            //$('body').html(`<p>${Search[0].Title}</p>`);

            var url = '/admin/movies/with-title';
            $.ajax({
                type: 'POST',

                url: url,

                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                }


            });
        }


    });

});

