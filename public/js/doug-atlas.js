
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

$(document).ready(function() {
  var mainNav = location.pathname.split("/")[1]

  $('#'+mainNav).addClass(mainNav+'-nactive');
  $('#'+mainNav).removeClass('hover-nav');


    if(mainNav == "mirrorplane") {
        $('#mirrorplane-nav').addClass('mirrorplane-nactive');
        $('.ad-dash div a#' + location.pathname.split("/")[3]).addClass('active');

        if(location.pathname.split("/")[2]=="profile") {
            // console.log(location.pathname.split("/")[3]);
            var currentli = $('.ad-dash div a#' + location.pathname.split("/")[3]).position().top;
            $('.ad-dash').animate({
                scrollTop: currentli
            }, '3000');  
        }
    }
});

/*=========== FIX HEIGHT ===========*/
// var checkELEHInterval;
// checkELEHInterval = setInterval(skiTop, 3000);
// checkELEHInterval = setInterval(skiBase, 3000);
// checkELEHInterval = setInterval(skiBot, 3000);

$(window).load(function(){
  skiTop(); skiBase(); skiBot();
});

function skiTop() {
  $('.ski-top').css("minHeight", "auto");
  
  var elementHeights = $('.ski-top').map(function() {
    return $(this).height();
  });

  var maxHeight = Math.max.apply(null, elementHeights);

  // $('.ski-top').height(maxHeight);
  $('.ski-top').css("minHeight", maxHeight+20);
  $('.aug-anim-ski-top').css("minHeight", maxHeight+50);

  // $('.ski-top').animate({ minHeight: maxHeight+20 },300);
  // $('.aug-anim-ski-top').animate({ minHeight: maxHeight+50 },300);
}

function skiBase() {
  $('.ski-base').css("minHeight", "auto");
  var elementHeights = $('.ski-base').map(function() {
    return $(this).height();
  });

  var maxHeight = Math.max.apply(null, elementHeights);

  // $('.ski-base').height(maxHeight);
  $('.ski-base').css("minHeight", maxHeight+20);
  $('.aug-anim-ski-base').css("minHeight", maxHeight+50);
}

function skiBot() {
  $('.ski-bot').css("minHeight", "auto");
  var elementHeights = $('.ski-bot').map(function() {
    return $(this).height();
  });

  var maxHeight = Math.max.apply(null, elementHeights);

  // $('.ski-bot').height(maxHeight);
  $('.ski-bot').css("minHeight", maxHeight+20);
  $('.aug-anim-ski-bot').css("minHeight", maxHeight+50);
}

