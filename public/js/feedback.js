$(function() {
    $('#angry').click(function(e) {
        e.preventDefault();
        $('#rate').val('0');
        $(this).css('border', '1px solid #0B5ED7');
        $('#sad').css('border', '0px');
        $('#happy').css('border', '0px');
        $('#smile').css('border', '0px');
        $('#lol').css('border', '0px');
    });


    $('#sad').click(function(e) {
        e.preventDefault();
        $('#rate').val('1');
        $(this).css('border', '1px solid #0B5ED7');
        $('#angry').css('border', '0px');
        $('#happy').css('border', '0px');
        $('#smile').css('border', '0px');
        $('#lol').css('border', '0px');
    });


    $('#happy').click(function(e) {
        e.preventDefault();
        $('#rate').val('2');
        $(this).css('border', '1px solid #0B5ED7');
        $('#sad').css('border', '0px');
        $('#angry').css('border', '0px');
        $('#smile').css('border', '0px');
        $('#lol').css('border', '0px');
    });


    $('#smile').click(function(e) {
        e.preventDefault();
        $('#rate').val('3');
        $(this).css('border', '1px solid #0B5ED7');
        $('#sad').css('border', '0px');
        $('#happy').css('border', '0px');
        $('#angry').css('border', '0px');
        $('#lol').css('border', '0px');
    });


    $('#lol').click(function(e) {
        e.preventDefault();
        $('#rate').val('4');
        $(this).css('border', '1px solid #0B5ED7');
        $('#sad').css('border', '0px');
        $('#happy').css('border', '0px');
        $('#smile').css('border', '0px');
        $('#angry').css('border', '0px');
    });

});