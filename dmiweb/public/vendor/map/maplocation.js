$(document).ready(function() {
    var pathname = window.location.pathname;
        $.get( base_url+"/location", function( data ) {
              console.log(data);
            new Maplace({
                locations: data,
                map_div: '#gmap',
                controls_type: 'list',
                controls_on_map: false,
                styles: {
                    'Night': mapStyle,
                },
            }).Load();
        }, "json" );
    });