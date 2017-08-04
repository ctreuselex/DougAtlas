<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mirrorplane</title>
    <link rel="icon" href="{{ url('img/logo.png') }}" type="image/png"> 

    <!-- Bootstrap Core CSS -->
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url('css/modern-business.css') }}" rel="stylesheet">
    <link href="{{ url('css/pie-graph.css') }}" rel="stylesheet">
    <link href="{{ url('css/doug-atlas.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('css/rpg-awesome.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">

    <!-- jQuery -->
    <script src="{{ url('js/jquery.js') }}"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> -->

</head>

<body>

	@include('inc/navigation')

    <?php
        $curPage = 'home';
        $charColor = '#18FF81';
        $charColorSub = '#AAAAAA';
        $charTexture = url('img/hex-bg-l.png'); 
        $cityname = 'Mirrorplane';

        $pageNotes = array (
            array('ord'=>'', 'n'=>"Inpirations!",'v'=>"Look at all these Inpirations!"),
            array('ord'=>'', 'n'=>"Movies",'v'=>"Cloud Atlas, Inception, Suckerpunch"),
            array('ord'=>'', 'n'=>"Series",'v'=>"Avatar, Fullmetal Alchemist, RWBY"),
            array('ord'=>'', 'n'=>"Games",'v'=>"Transistor, Bastion, Bioshock"),
            );
    ?>

    <style type="text/css">
        /*.ad-dash-pa { border-right: 5px solid {{ $charColor }}; }
        .ad-dash { 
            border-top: 1px solid {{ $charColor }};
            background: url({{ url('img/hex-bg-l.png') }}); 
            background-size: 100%;
            background-blend-mode: multiply;
            background-color: grey; }
        .city-scape { background-color: grey; }
        .city-scape .moon { background-color: {{ $charColor }}; }
        .city-scape .moon { box-shadow: 0 0 30px 0px white; border: 85px solid white; }
        .city-scape:hover .moon { box-shadow: 0 0 100px 10px {{ $charColor }}; border: 10px solid white; }*/

        .bot-scro a.fir:hover, .bot-scro a.fir.active { background-color: {{ $charColor }}; color: white; transition: 0.3s; }
        .bot-scro a.mid:hover, .bot-scro a.mid.active { background-color: {{ $charColor }}; color: white; transition: 0.3s; } 
        .bot-scro a.las:hover, .bot-scro a.las.active { background-color: {{ $charColor }}; color: white; transition: 0.3s; }
        .notes ul li b { background: {{ $charColor }}; }
        
        .mp-cont-char {
            padding: 0;
        }
        .mp-cont-char li {
            padding: 5px;
            margin-bottom: 1px;
        }
        .mp-cont-char li.no-hvr {
            padding: 5px;
            margin-bottom: -4px;
        }
        .year-div {
            width: 100%;
            font-size: 10px;
            font-weight: bolder;
            border-bottom: 1px solid white;
            padding: 5px 20px;
        }
        a { color: #333; }
        .li-hvr {
            display: inline-block;
            vertical-align: middle;
            -webkit-transform: translateZ(0);
            transform: translateZ(0);
            box-shadow: 0 0 1px rgba(0, 0, 0, 0);
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -moz-osx-font-smoothing: grayscale;
            position: relative;
            background: #2098d1;
            -webkit-transition-property: color;
            transition-property: color;
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
        }
        .li-hvr:before {
            content: "";
            position: absolute;
            z-index: -1;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: white;
            -webkit-transform: scaleX(1);
            transform: scaleX(1);
            -webkit-transform-origin: 50%;
            transform-origin: 50%;
            -webkit-transition-property: transform;
            transition-property: transform;
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
            -webkit-transition-timing-function: ease-out;
            transition-timing-function: ease-out;
        }
        .li-hvr:hover, .li-hvr:focus, .li-hvr:active {
            color: white;
        }
        .li-hvr:hover:before, .li-hvr:focus:before, .li-hvr:active:before {
            -webkit-transform: scaleX(0);
            transform: scaleX(0);
        }
        #div-lum { background-color: #ff9800; color: white;}
        #div-aer { background-color: #e91e63; color: white;}
        #div-mys { background-color: #2196f3; color: white;}
        #div-gei { background-color: #8bc34a; color: white;}

        /*ImageSlider*/
        @keyframes slideAnim {
            0% { right: 0; width: 5px; }
            25% { width: 50px; }
            50% { right: calc(100% - 5px); width: 5px; }
            75% { width: 50px; }
            100% { right: 0; width: 5px; }
        }

        .mp-ref {
            background: black;
            overflow: hidden;
            display: none; }
        .mp-scroll-div {
            height: 275px; /*same*/ }
        .mp-scroll-div img {
            float: left;
            height: 275px; /*same*/ }
        .mp-scroll-prog {
            position: absolute; 
            height: 5px;        
            margin-top: -5px; 
            background: {{ $charColor }}; }
        .mp-scroll-prog:after {
            content: "";
            position: absolute; top: 0; right: 0;
            height: 5px; width: 5px;
            background: white;
            border: 1px solid;
            mix-blend-mode: color-dodge;
            animation: slideAnim 2s infinite;
            box-shadow: 0px 0px 10px 1px {{ $charColor }}; }
        .mp-ref .mp-scroll {    
            position: absolute;
            width: 100px;                       
            height: 275px; /*same*/
            font-size: 80px;
            padding-top: 100px;
            margin-top: -275px; /*-same*/
            opacity: 0.7;
            transition: 0.5s;
            color: {{ $charColor }}; }
        .mp-ref .mp-scroll:hover { 
            opacity: 1;
            transition: 0.3s; }
        .mp-scroll.left {
            left: 5px; }
        .mp-scroll.right {
            right: 5px; }
        .mp-scroll.left.max, .mp-scroll.right.max {
            opacity: 0.2; }

    </style>

    @foreach ($mirChars as $char)
        <?php 
            if($char['color']=='') {$char['color']='#d5d5d5'; $char['subcolor']='#d5d5d5';}
        ?>

        <style type="text/css">
            /*@if($char['color']!='')*/

            /*@endif*/
                li#{{$char['name']}} {
                    border-left: 5px solid {{ $char['color'] }};
                    border-right: 5px solid {{ $char['subcolor'] }};
                }
                li#{{$char['name']}}.li-hvr {
                    background: {{ $char['color'] }};
                    background: -moz-linear-gradient(left, {{ $char['color'] }} 0%, {{ $char['subcolor'] }} 100%);
                    background: -webkit-linear-gradient(left, {{ $char['color'] }} 0%, {{ $char['subcolor'] }} 100%);
                    background: linear-gradient(to right, {{ $char['color'] }} 0%, {{ $char['subcolor'] }} 100%); 
                    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='{{ $char['color'] }}', endColorstr=' {{ $char['subcolor'] }}',GradientType=1 );"> <center>{{ $char['color'] }} | <b>COLOR</b> SCHEME | {{ $char['subcolor'] }}</center> 
                }
            li#{{$char['name']}} i {
                color: {{ $char['color'] }};
                font-size: 20px;
                position: absolute;
                left: -10px;
                transition: 0.5s;
            }
            li#{{$char['name']}}:hover i {
                color: white;
                transition: 0.3s;
            }
            li#{{$char['name']}} .char-hvr {
                border-right: 5px solid {{ $char['subcolor'] }};
                transition: 0.3s;
            }
            /*li#{{$char['name']}}:hover img{
                filter: grayscale(100%) brightness(100%);
            }*/
        </style>
    @endforeach

    @include('mp-inc/dash')

    <div class="col-sm-10 col-sm-offset-2" style="padding: 15px;">
        
        <!-- <div style="
            width: calc(100% + 30px); height: 100vh;
            background: url('{{ url('img/mirrorplane-poster.png') }}');
            background-position: center;
            background-size: cover;
            margin-left: -15px;
            margin-top: -15px;
        "></div> -->
        <img src="{{ url('img/mirrorplane-header.png') }}" style="
            width: calc(100% + 30px);
            margin-left: -15px;
            margin-top: -15px;">
        <!-- <img src="{{ url('img/mirrorplane-poster.png') }}" style="
            width: calc(100% + 30px);
            margin-left: -15px;
            margin-top: -15px;">-->

        <p><span class="char-name">The City</span> | The World, the Universe</p>
        <ul class="mp-cont">
            <li>
                <b class="mp-title">Mirrorplane</b>, a place inspired by circuit boards and art-decos, lots of art decos. Nobody knows who the city formed, where the people came from, or where it actually is. But they known that everyone must cooperate to survive the crowded, tiny world they are living in.
                <br>

                <div class="mp-ref" id="scroll-mircity">
                    <div class="mp-scroll-div">
                        <img class="scroll-img-hover" src="{{ url('img/divi/mircity1.jpg') }}">
                        <img src="{{ url('img/divi/mircity2.jpg') }}">
                        <img src="{{ url('img/divi/mircity3.jpg') }}">
                        <img src="{{ url('img/divi/mircity4.jpg') }}">
                        <img src="{{ url('img/divi/mircity5.jpg') }}">
                    </div>
                    <div class="mp-scroll-prog"></div>
                    <i class="mp-scroll max left fa fa-caret-left"></i>
                    <i class="mp-scroll right fa fa-caret-right"></i>
                </div>
                <!-- <img src="{{ url('img/ref-mir.png') }}" width="100%"> -->
            </li>
        </ul>

        <p><span class="char-name">Divisions</span> | What separates this place from that place?</p>
        @include('mp-inc/divi')
        <div class="clear"></div>
        
        <!-- <p><span class="char-name">Rings</span> | From the Classy to the not-so Classy</p>
        @include('mp-inc/ring')
        <div class="clear"></div> -->

        <p><span class="char-name">Day-Night Cycle</span> | How Does Time Works? Seriously? How?</p>
        @include('mp-inc/time')
        <div class="clear"></div>

        <p><span class="char-name">CTsystem</span> | We're connected!</p>
        @include('mp-inc/cts')
        <div class="clear"></div>
        
        <p><span class="char-name">Myst Manipulation</span> | And the way of Everything</p>
        @include('mp-inc/myma')
        <div class="clear"></div>

        <p><span class="char-name">Notable Organizations</span> | And what they do</p>
        @include('mp-inc/orgs')
        <div class="clear"></div>
        
        <p><span class="char-name">The Mares</span> | Everyone's too busy thinking what's up and never has a thought what's down</p>
        @include('mp-inc/mare')
        <div class="clear"></div>
        
    </div>
    <div class="clear"></div><br><br>

    @include('mp-inc/foot')

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('js/bootstrap.min.js') }}"></script>

    <script type="text/javascript"> var pageNotes = <?php echo json_encode($pageNotes); ?>;</script>

    <!-- CUSTOM Script-->
    <script src="{{ url('js/doug-atlas.js') }}"></script>
    <script src="{{ url('js/pie-graph.js') }}"></script>

    <!-- <script href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> -->

    <script type="text/javascript">
        $(window).load(function() {
            createSlide("#scroll-mircity");
            createSlide("#scroll-divilum");
            createSlide("#scroll-diviaer");
            createSlide("#scroll-divimys");
            createSlide("#scroll-divigei");
            createSlide("#scroll-diviArmagi");
            createSlide("#scroll-diviExnihille");
            createSlide("#scroll-diviMaximo");
            createSlide("#scroll-diviCirkunesi");
        });

        /*=========== ImageSlide ===========*/
        function createSlide(id) {

            $(id).fadeIn();
            
            var scrollDivWidth = 5;
            $(id + '.mp-ref .mp-scroll-div img').each(function() {
                scrollDivWidth += $(this).width();
            });
            $(id + '.mp-ref .mp-scroll-div').width(parseInt((scrollDivWidth))+"px");

            var scrollProgPer = $(id).width() / scrollDivWidth;
            var scrollProgWidth = $(id).width() * scrollProgPer;
            $(id + '.mp-ref .mp-scroll-prog').width(scrollProgWidth+"px");

            var scrolly;
            $(id + '.mp-ref .mp-scroll.right').hover(function() { scrolly = setInterval(scrollDivRight, 10);
            }, function() { clearInterval(scrolly); });
            $(id + '.mp-ref .mp-scroll.left').hover(function() { scrolly = setInterval(scrollDivLeft, 10);
            }, function() { clearInterval(scrolly); });

            var scrollDivMar;
            var scrollProgMar;
            var scrollProgSpeed;
            function scrollDivRight() {
                scrollDivMar = $(id + '.mp-ref .mp-scroll-div').css('margin-left').replace("px","");
                scrollProgMar = $(id + '.mp-ref .mp-scroll-prog').css('margin-left').replace("px","");

                scrollProgSpeed = (4 / scrollDivWidth) * $(id).width();

                if((scrollDivMar*-1)<(scrollDivWidth-$(id).width())){
                    $(id + '.mp-ref .mp-scroll-div').css('margin-left', (parseFloat(scrollDivMar)-4)+"px");
                    $(id + '.mp-ref .mp-scroll-prog').css('margin-left', (parseFloat(scrollProgMar)+scrollProgSpeed)+"px");

                    $(id + '.mp-ref .mp-scroll.right').removeClass("max");
                    $(id + '.mp-ref .mp-scroll.left').removeClass("max");
                } else { $(id + '.mp-ref .mp-scroll.right').addClass("max"); }
            }
            function scrollDivLeft() {
                scrollDivMar = $(id + '.mp-ref .mp-scroll-div').css('margin-left').replace("px","");
                scrollProgMar = $(id + '.mp-ref .mp-scroll-prog').css('margin-left').replace("px","");

                scrollProgSpeed = (4 / scrollDivWidth) * $(id).width();

                if(scrollDivMar<0){
                    $(id + '.mp-ref .mp-scroll-div').css('margin-left', (parseFloat(scrollDivMar)+4)+"px");
                    $(id + '.mp-ref .mp-scroll-prog').css('margin-left', (parseFloat(scrollProgMar)-scrollProgSpeed)+"px");

                    $(id + '.mp-ref .mp-scroll.right').removeClass("max");
                    $(id + '.mp-ref .mp-scroll.left').removeClass("max");
                } else { $(id + '.mp-ref .mp-scroll.left').addClass("max"); }
            }

        }
    </script>

</body>

</html>
