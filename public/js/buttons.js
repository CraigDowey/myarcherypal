$(function(){
  $('.button-1').on('click', function(){
    var $this = $(this);
    //Class to send button down
    $this.addClass('button-1-active');

    setTimeout(function () { //Time out for button to go down
      //Remove class holding down button
      $this.removeClass('button-1-active');

    }, 200);
  });
})
