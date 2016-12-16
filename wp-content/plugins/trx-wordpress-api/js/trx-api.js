(function($) {
  $(document).ready(function(){
    // var data = $('.officer_order').attr('data-order');
    // if(data !== 'default' && data.length !== 0) {
    //     var officer_name = $( "option:selected").text();
    //     $('.officer-default').html("You must contact this jurisdiction directly to order transcript for " + officer_name);
    // }
    

    $('.officer_name').change(function() {
      var data = $('.officer_order').attr('data-order');
      if(data == 'default' && data.length !== 0) {
        var officer_name = $( "option:selected").text();
        $('.officer-default').html("You must contact this jurisdiction directly to order transcript for " + officer_name);
      }
      else {
        $('.officer-default').html("");
      }
    });
 });
}(jQuery));