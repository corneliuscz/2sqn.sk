/* Detekční skript */
$(document).ready(function() {

  $('.walkaround').prepend('<div id="Tip"></div>');
  $('.walkaround').prepend('<div id="DivPosition"></div>');

  $('.threesixty').mousemove(function(e) {

    var offset = $(this).offset();
    var width = $(this).width();

    var x = e.pageX - (offset.left);
    var y = e.pageY - (offset.top);

    // To get nice percents we need to round the numbers a bit.
    var percx = Math.round(((x*100)/width)*100)/100;
    var percy = Math.round(((y*100)/width)*100)/100;

    var percentCorrectionX = ($('.icon').width()/2)*100/width;
    var percentCorrectionY = ($('.icon').height()/2)*100/width;

    var corX = percx-percentCorrectionX;
    var corY = percy-percentCorrectionY;

    $('#Tip')
      .show()
      .css({'left': e.pageY+16, 'top': e.pageX+16})
      .html('Position<br>Percent: '+percy+'%, '+percx+' %<br>Div: '+x+' px, '+y+' px');

    $('.threesixty')
      .click( function () {
        $('#DivPosition')
          .html('Coords: '+corY+'%, '+corX+' %');
        $('.spot')
          .css('margin', corY+'% 0 0 '+corX+'%' );
    });
  });

  $('.threesixty').mouseout(function() {
    $('#Tip').hide();
  });
});
/* Konec detekce */
