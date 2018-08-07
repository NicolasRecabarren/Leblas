/*var map_footer;
function initialize_footer() {
    var position_footer = new google.maps.LatLng(-33.416455724824935, -70.59567187826536);
    var mapOptions_footer = {
        zoom: 14,
        center: position_footer
    };

    map_footer = new google.maps.Map(document.getElementById('map'), mapOptions_footer);

    var marker_footer = new google.maps.Marker({
        position: position_footer,
        map: map_footer,
        scrollwheel: false,
        disableDefaultUI: true,
        panControl: false,
        zoomControl: true,
        title: "Av. Apoquindo 3300 - Las Condes, Santiago, Chile",
        animation: google.maps.Animation.DROP
    });

    google.maps.event.addListener(marker_footer, 'click');
}

google.maps.event.addDomListener(window, 'load', initialize_footer);*/

var owl = jQuery("#owl-carousel-60");
owl.owlCarousel({
    items:4,
    loop:true,
    margin:10,
    autoPlay : 2000
});

var agregar=0;
$("body").click(function(){
    if(agregar>1){
        agregar=0;
        $("#header").css('position', 'fixed'); 
    }
});

$(".box").click(function(){
    agregar++;
    $("#header").css('position', 'absolute');
});

function $_GET(param) {
    var vars = {};
    window.location.href.replace( location.hash, '' ).replace( 
        /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
        function( m, key, value ) { // callback
            vars[key] = value !== undefined ? value : '';
        }
    );
    if ( param ) {
        return vars[param] ? vars[param] : null;    
    }
    return vars;
}
$( document ).ready(function() {

    if($_GET('m')!=null){
        $('html, body').animate({ scrollTop: $('#'+$_GET('m')).offset().top }, 'slow');

    }

});

var elem = document.querySelector('.m-p-g');
document.addEventListener('DOMContentLoaded', function() {
    var gallery = new MaterialPhotoGallery(elem);
});
$(document).keyup(function(e) {
    if (e.keyCode == 27) { // escape key maps to keycode `27`
        $(".m-p-g__controls-close").click();
    }
});

$('#mainmenu').find('li').find('a').click(function(){
    $('html,body').animate({
        scrollTop: $($(this).attr('href')).offset().top-40
    }, 2000);
});