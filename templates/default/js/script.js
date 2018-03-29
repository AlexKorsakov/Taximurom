$(function() {
    $("form").unbind("submit");
    $("input").unbind("click");
    $( window ).resize(function() {
        var heigth = $( window ).height();
        var width = $( window ).width();
        
    });

});
function test(){
    $('#small_form').submit();
}