(function(){
    define(['fotorama'], function(fotorama) {
        $('#slider .fotorama').on('fotorama:ready ', function (e, fotorama, extra) {
            $('#slider .fotorama__wrap--toggle-arrows').addClass('fotorama__wrap--no-controls');
        });
    });
})()
