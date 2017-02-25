/*=========== BADASS HEADER ===========*/
// $(window).scroll(function() {

//     if ($(this).scrollTop()>0)
//      {
//         document.getElementById('da-logo').style.height = "50px";
//         document.getElementById('da-logo').style.width = "50px";

//         document.getElementById('da-title').style.opacity = "1";
//         document.getElementById('da-header').style.opacity = "0";

//      }
//     else
//      {
//         document.getElementById('da-logo').style.height = "100px";
//         document.getElementById('da-logo').style.width = "100px";

//         document.getElementById('da-title').style.opacity = "0";
//         document.getElementById('da-header').style.opacity = "1";
//      }
//  });


/*=========== SMOOOOTH SCROLL ===========*/
$(document).on('click', 'a', function(event){
    if(this.id.indexOf('smooth-')== 0) {
        event.preventDefault();
        
        $('html, body').animate({
            scrollTop: $( $.attr(this, 'href') ).offset().top - 50
        }, 500);
    }
});

/*=========== PAGE NOTEEEES ===========*/
$(document).ready(function() {

    for (i=0; i<pageNotes.length; i++) {
      if(pageNotes[i]['ord']==''||pageNotes[i]['ord']==charname) {
        $('#pageNotes').append(
          "<li><b>"+pageNotes[i]['n']+"</b>"+pageNotes[i]['v']+"</li>"
          );
      }
    }
    // alert(pageNotes.length);

    function hasClass(element, cls) {
      return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
    }

    $('#foot-notes').click(function() {
      if($('.notes').hasClass('boop')) {
        // alert('ayy2');
        $('#foot-notes').addClass('active');
        $('.notes').removeClass('boop');
      } else {
        // alert('ayy');
        $('#foot-notes').removeClass('active');
        $('.notes').addClass('boop');
      }
    });

    $('.notes').click(function() {
      if($('.notes').hasClass('boop')) {
        // alert('ayy2');
        $('#foot-notes').addClass('active');
        $('.notes').removeClass('boop');
      } else {
        // alert('ayy');
        $('#foot-notes').removeClass('active');
        $('.notes').addClass('boop');
      }
    });
        
});

/*=========== SEL-ACTIVE ===========*/
$(function() {
    if(location.pathname.split("/")[1] == "mirrorplane") {
        $('#mirrorplane-nav').addClass('mirrorplane-nactive');
        $('.ad-dash div a#' + location.pathname.split("/")[2]).addClass('active');

        if(location.pathname.split("/")[2]!='') {
          var currentli = $('.ad-dash div a#' + location.pathname.split("/")[2]).position().top;
          $('.ad-dash').animate({
              scrollTop: currentli
          }, '3000');
        }
    }
});

/*=========== FIX HEIGHT ===========*/
$(document).ready(function() {
  // Get an array of all element heights
  var elementHeights = $('.ski-top').map(function() {
    return $(this).height();
  }).get();

  // Math.max takes a variable number of arguments
  // `apply` is equivalent to passing each height as an argument
  var maxHeight = Math.max.apply(null, elementHeights);

  // Set each height to the max height
  $('.ski-top').height(maxHeight+15);
});


$(document).ready(function() {
  // Get an array of all element heights
  var elementHeights = $('.ski-base').map(function() {
    return $(this).height();
  }).get();

  // Math.max takes a variable number of arguments
  // `apply` is equivalent to passing each height as an argument
  var maxHeight = Math.max.apply(null, elementHeights);

  // Set each height to the max height
  $('.ski-base').height(maxHeight+15);
});

$(document).ready(function() {
  // Get an array of all element heights
  var elementHeights = $('.ski-bot').map(function() {
    return $(this).height();
  }).get();

  // Math.max takes a variable number of arguments
  // `apply` is equivalent to passing each height as an argument
  var maxHeight = Math.max.apply(null, elementHeights);

  // Set each height to the max height
  $('.ski-bot').height(maxHeight+15);
});
