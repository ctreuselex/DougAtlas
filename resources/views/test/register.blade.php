@extends('test.test-main')

<!-- METAS -->
@section('title') Test Register @stop

@section('meta')
    <!-- ======================================================= 
        REQUIRES
        BOOTSTRAP (mostly for box-sizing, easily replaceable by normal css)
        FONT-AWESOME (the latest, unless you want to redo how the icons work. haha)
        JQUERY 
    ======================================================== -->

    <style type="text/css">
        body {
            padding: 0;
            background-color: #eee;
                font-family: 'Lato'; }

        /*STEPS STYLE*/
        .steps-field {
            float: left;
            width: 100%;
            height: 100vh; }
            .steps-field .box {
                position: relative;
                width: 100%;
                background-color: white;
                margin: 0 auto;
                box-shadow: 0 3px 5px rgba(0,0,0,0.3);
                overflow: hidden;  }

                .steps-field .box .top {
                    display: none;
                    float: left;
                    width: 100%;
                    text-align: center;
                    padding: 20px 0 50px;
                        background-color: black; }
                    .steps-field .box .top b {
                        font-size: 14px;
                        color: rgba(255,255,255,0.7); }
                    .steps-field .box .top p {
                        color: white;
                        font-size: 16px;
                        margin: 0; }
                    .steps-field .box .top .step-icons {
                        display: none;
                        position: absolute; }
                        .steps-field .box .top .step-icons .cur {
                            position: absolute;
                            top: -5px;
                            height: 60px;
                            background-color: white;
                            border-radius: 50px;
                                border: 2px solid black; }
                        .steps-field .box .top .step-icons .s {
                            position: relative;
                            float: left;
                            width: 50px;
                            height: 50px;
                            color: white;
                            background-color: #c5c5c5;
                            font-size: 25px;
                            padding: 7px 0;
                            border-radius: 50px;
                            margin: 0 5px;
                            box-shadow: 0 0 0 0 rgba(255,255,255,1);
                            overflow: hidden;
                            transition: 0.5s; }
                            .steps-field .box .top .step-icons .s svg,
                            .steps-field .box .top .step-icons .s i {
                                position: relative;
                                z-index: 2; }
                            .steps-field .box .top .step-icons .s:before {
                                content: "";
                                position: absolute;
                                top: 0;
                                left: 0px;
                                width: 0;
                                height: 50px;
                                border-radius: 50px;
                                z-index: 1;
                                transition: 0.5s;
                                    background-color: grey; }
                            .steps-field .box .top .step-icons .s.don:before {
                                width: 50px;
                                transition: 0.5s; }

                .steps-field .box .cont {
                    float: left;
                    width: 100%;
                    padding: 50px 30px;
                    overflow-y: scroll; }
                    .steps-field .box .cont .field { }
                        .steps-field .box .cont .field p,
                        .steps-field .box .cont .field img,
                        .steps-field .box .cont .field input,
                        .steps-field .box .cont .field textarea {
                            width: 100%;
                            margin: 0 0 10px; }
                        .steps-field .box .cont .field input,
                        .steps-field .box .cont .field textarea {
                            padding: 5px 10px; }

                .steps-field .box .buttons {
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    width: 100%;
                    color: #333;
                    background-color: white; }
                    .steps-field .box .buttons .btn {
                        float: left;
                        width: 50%;
                        padding: 20px;
                        transition: 0.5s; }
                        .steps-field .box .buttons svg,
                        .steps-field .box .buttons i {
                            position: relative;
                            top: 5px;
                            font-size: 25px;
                            padding: 2px; }
                        .steps-field .box .buttons .btn.prev {
                            text-align: right; }
                        .steps-field .box .buttons .btn.next {
                            text-align: left; }

                    .steps-field .box .buttons .btn:hover {
                        transition: 0.3s;
                            color: grey; }
                    .steps-field .box .buttons .btn.disabled {
                        color: #c5c5c5; }

        /*STEPS STYLE OVERRIDE!*/
        .steps-field .box .top {
            background-color: #11634c; }
        .steps-field .box .top .step-icons .cur {
            border-color: #11634c; }
        .steps-field .box .top .step-icons .s:before {
            background-color: #149b66; }
        .steps-field .box .buttons .btn:hover {
            color: #149b66; }
    </style>
@stop

@section('main')

    <!-- HTML -->
	<div id="register" class="steps-field">
        <div class="box">
            <div class="top"></div>
            <div class="cont">

                <!-- STEPS -->
                <!-- ====================================================================
                    JUST COPY div.step TO ADD ANOTHER STEP, DELETE TO REMOVE A STEP
                    <div class="step">
                        <div class="icon"><i class="FONT AWESOME ICON"></i></div>
                        <div class="header">HEADER TEXT</div>
                        <div class="field">
                            FIELD CONTENT
                        </div>
                    </div> 
                ===================================================================== -->
                <div class="step">
                    <div class="icon"><i class="fas fa-sun"></i></div>
                    <div class="header">The suns rises</div>
                    <div class="field">
                        <p>oii</p>
                        <img src="https://images.pexels.com/photos/699122/pexels-photo-699122.jpeg?h=350&auto=compress&cs=tinysrgb">
                    </div>
                </div>
                <div class="step">
                    <div class="icon"><i class="fas fa-clock"></i></div>
                    <div class="header">Your alarm screams at you</div>
                    <div class="field">
                        <p>ayy</p>
                        <input type="text" name="sample" placeholder="Please enter the exact number of people within your line of sight">
                        <p>Message to your father:</p>
                        <textarea></textarea>
                    </div>
                </div>
                <div class="step">
                    <div class="icon"><i class="fas fa-frown"></i></div>
                    <div class="header">You are sad</div>
                    <div class="field">
                        <p>woo! yeah!</p>
                        <p>Life is pain.</p>
                    </div>
                </div>
                <div class="step">
                    <div class="icon"><i class="fas fa-coffee"></i></div>
                    <div class="header">Take some <strike>drugs</strike> coffee</div>
                    <div class="field">
                        <p>Oof Ouch Owie... My bones...</p>
                        <img src="https://images.pexels.com/photos/137049/pexels-photo-137049.jpeg?h=350&auto=compress&cs=tinysrgb">
                        <p>Well... death is inevitable.</p>
                        <img src="https://images.pexels.com/photos/209037/pexels-photo-209037.jpeg?h=350&auto=compress&cs=tinysrgb">

                    </div>
                </div>
                <div class="step">
                    <div class="icon"><i class="fas fa-hand-point-left fa-spin"></i></div>
                    <div class="header">Become wild</div>
                    <div class="field">
                        <p><b><center>THE BEACON IS LIT!!! GONDOR CALLS FOR AID!!!</center></b></p>
                    </div>
                </div>

            </div> 
            <div class="buttons">
                <div class="btn prev disabled"><i class="fas fa-chevron-circle-left"></i> Previous</div>
                <div class="btn next disabled"> Next Step <i class="fas fa-chevron-circle-right"></i></div>
            </div>
        </div>
    </div>  


    <script type="text/javascript">
        // INITIALIZATION
        stepsInit( $('#register'), {
            width: '450px',
            height: '600px',
        });

        // THIS IS THE SCRIPT, BTW
        function stepsInit(el, options) {
            var steps = [];
            $('.cont .step', el).each(function() {
                steps.push($(this));
            });

            applyOptions();

            var cur = 0;
            var stepIcons = "";
            var stepHeaders = [];
            $('.cont .step', el).hide();
            $(window).load(function() {
                steps[cur].fadeIn();
                steps[cur].addClass('active');

                $('.top', el).html('<b></b><p></p><div class="step-icons"></div>');
                $('.top', el).slideDown('fast', function() {
                    getSteps();
                });

            });

            function applyOptions() {
                var oWidth, oHeight;
                if(options['width'] != null) oWidth = options['width']; else oWidth = '450px';
                if(options['height'] != null) oHeight = options['height']; else oHeight = '600px';

                $('.box', el).css({
                    'top': 'calc(50% - ' + oHeight + ' / 2)',
                    'max-width': oWidth,
                    'height': oHeight, 
                });
            }

            function getSteps() {
                for(var i=0; i<steps.length; i++) {
                    stepIcons += '<div class="s s-' + (i+1) + '">' + $('.icon', steps[i]).html() + '</div>';
                    stepHeaders.push( '<div class="s s-' + (i+1) + '">' + $('.header', steps[i]).html() + '</div>' );
                    $('.icon, .header', steps[i]).html('');
                }

                $('.top .step-icons', el).html('<div class="cur"></div>' + stepIcons);

                checkSteps();

                var stepIconsTop = $('.top', el).height() + 70;
                var stepButtonHeight = $('.buttons', el).height();
                $('.top .step-icons', el).css('top', stepIconsTop - 25);
                $('.box .cont', el).css('height', 'calc(100% - ' + stepIconsTop + 'px - ' + stepButtonHeight + 'px)');

                var stepIconsWidth = 60 * (steps.length);
                $('.steps-field .top .step-icons').width( stepIconsWidth );

                var stepIconsCenter = $('.top', el).width() / 2 - ( stepIconsWidth / 2 );
                $('.top .step-icons', el).css('left', stepIconsCenter);
                $('.top .step-icons', el).fadeIn();
            }

            function checkSteps() {
                if (cur <= 0) {
                    $('.buttons .btn.next', el).html('Next Step <i class="fas fa-chevron-circle-right"></i>');
                    $('.buttons .btn.next', el).removeClass('to-submit');
                    $('.buttons .btn.next', el).removeClass('disabled');
                    $('.buttons .btn.prev', el).addClass('disabled');
                } else if (cur == steps.length-1) {
                    $('.buttons .btn.next', el).html('Finally Done! <i class="fas fa-chevron-circle-right"></i>');
                    $('.buttons .btn.next', el).addClass('to-submit');
                    $('.buttons .btn.prev', el).removeClass('disabled');
                } else {
                    $('.buttons .btn.next', el).html('Next Step <i class="fas fa-chevron-circle-right"></i>');
                    $('.buttons .btn.next', el).removeClass('to-submit');
                    $('.buttons .btn.prev', el).removeClass('disabled');
                }

                for(var i=cur+1; i<=steps.length; i++) {
                    $('.top .step-icons .s-' + i, el).removeClass('don');
                }
                for(var i=cur+1; i>0; i--) {
                    $('.top .step-icons .s-' + i, el).addClass('don');
                }

                $('.top b', el).html('STEP ' + (cur+1));
                $('.top p', el).html( stepHeaders[cur] );

                checkProgress();
            }

            function checkProgress() {
                var progWidth = 60 * (cur+1);
                $('.top .step-icons .cur', el).animate({ width: progWidth + 'px' }, 400);
            }

            $('.buttons .btn.next, .buttons .btn.prev', el).click(function() {
                if (!$(this).hasClass('disabled') && !$(this).hasClass('to-submit')) {
                    var prev = 0;
                    if ($(this).hasClass('next')) { otherSteps(cur, 'next'); cur++; prev=cur-1; }
                    if ($(this).hasClass('prev')) { otherSteps(cur, 'prev'); cur--; prev=cur+1; }

                    steps[prev].addClass('prev');
                    steps[prev].fadeOut('fast', function(){
                        $('.cont .step', el).removeClass('active');
                        $('.cont .step', el).removeClass('prev');
                        steps[cur].fadeIn('fast');
                        steps[cur].addClass('active');
                    });
                    checkSteps();

                } else if (!$(this).hasClass('disabled') && $(this).hasClass('to-submit')) {
                    finishSteps();
                    checkSteps();
                }
            });

            // EVENT ON THE OTHER STEPS
            function otherSteps(step, direction) {
                if (direction == 'next') {
                    // alert('Step ' + (step+1) + ' is done!');
                } else if (direction == 'prev') {
                    // alert('Back to Step ' + step + '!');
                }
            }

            // EVENT ON THE LAST STEP
            function finishSteps() {
                alert('Steps Finished!');
            }
        }
        
    </script>

@stop 