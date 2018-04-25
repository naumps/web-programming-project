import instantsearch from 'instantsearch.js/es';
import {searchBox} from 'instantsearch.js/es/widgets';
import {hits} from 'instantsearch.js/es/widgets';
import {refinementList} from 'instantsearch.js/es/widgets';


$(document).ready(function () {

    const search = instantsearch({
        appId: '36SRSIKVX3',
        apiKey: '14c3aeedfdf787f2a11be4d87dc350c5',
        indexName: 'movies',
        urlSync: true
    });

// initialize SearchBox
    search.addWidget(
        searchBox({
            container: '#search-box',
            placeholder: 'Search for movies...'
        })
    );

// initialize hits widget
    search.addWidget(
        hits({
            container: '#hits',
            templates: {
                item:' '+
                '<div class="card mb-4 box-shadow">'+
                '<a href="movies/{{slug}}"> ' +
                '<img src="{{image_url}}">'+
                '</a>' +
                '</div>'
            },
            cssClasses:{
                item: 'col-md-4'
            }
        })
    );

    search.addWidget(
        refinementList({
            container: '#categories',
            attributeName: 'categories.name',
            operator: 'and',
            limit: 20,
            templates: {
                header: 'Filter by categories'
            },
            cssClasses: {
                checkbox: 'categoryList'
            }
        })
    );

    search.start();



    var val = $('#search-box').val();

   if(val.length==0){
       $('.hits-container').hide();
   }else{
       $('.hits-container').show();
   }

    $('.ais-search-box--input').keyup(function () {
        var size = $('.ais-search-box--input').val();

        if(size.length==0){
            $('.hits-container').hide();
            $('.main-container').show();
        }else{
            $('.hits-container').show();
            $('.main-container').hide();
        }



    });

   $('#categories').change(function () {
       if($('#categories input:checked').length > 0) {
           $('.hits-container').show();
           $('.main-container').hide();
       }
       else {
           $('.hits-container').hide();
           $('.main-container').show();
       }
   })




});





