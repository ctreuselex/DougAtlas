
<style type="text/css">
    .home-main {
        position: relative;
        width: 100%; height: calc(100vh - 50px);
        background-size: 300px;
        overflow: hidden;
        background-color: {{ $charColor }};
        background-image: url('{{ $charTexture }}');}
    .home-main img.portrait {
        display: none;
        position: absolute; bottom: 30%;
        left: calc(50% - (800px / 2));
        width: 800px; }

    .home-main .color-grade {
        display: none;
        position: absolute; 
        width: 100%; height: 100%; 
        z-index: 0;
        background: -moz-linear-gradient(top, {{ $charColor }} 0%, rgba(0,0,0,0) 25%);
        background: -webkit-linear-gradient(top, {{ $charColor }} 0%, rgba(0,0,0,0) 25%);
        background: linear-gradient(to bottom, {{ $charColor }} 0%, rgba(0,0,0,0) 25%); }
    .home-main .color-grade.bot {
        display: none;
        z-index: 1; 
        bottom: 0;               
        background: -moz-linear-gradient(top, rgba(0,0,0,0) 75%, {{ $charColorSub }} 100%);
        background: -webkit-linear-gradient(top, rgba(0,0,0,0) 75%, {{ $charColorSub }} 100%);
        background: linear-gradient(to bottom, rgba(0,0,0,0) 75%, {{ $charColorSub }} 100%); }

    @keyframes diamondscale {
        0% { transform: scale(3) rotate(315deg); opacity: 0; border: 1000px solid {{ $charColor }}; }
        50% { transform: scale(3) rotate(315deg); opacity: 0; border: 1000px solid {{ $charColor }}; }
        100% { transform: scale(1) rotate(315deg); opacity: 0.8;  border: 0 solid {{ $charColor }}; }
    }@keyframes diamondscaleborder {
        0% { transform: scale(0) rotate(315deg); opacity: 0; }
        70% { transform: scale(0) rotate(315deg); opacity: 0; }
        100% { transform: scale(1) rotate(315deg); opacity: 1 ; }
    }

    .home-main .diamond {
        position: absolute; top: 15%;
        left: calc(50% - (650px / 2));
        height: 650px; width: 650px;
        opacity: 0;
        background: #9C27B0; 
        box-shadow: 0 0 500px 20px #9C27B0; }
    .home-main .diamond-border {
        position: absolute; top: 10%; 
        left: calc(50% - (650px / 2));
        height: 650px; width: 650px;
        opacity: 0;
        border: 2px solid white; }
    .home-main .diamond-cover {
        position: absolute; top: -5%; left: 100%;
        height: 1000px; width: 1000px;
        opacity: 0;
        transform: rotate(45deg);
        border: 1000px solid #F54C04;
        background: #F3A40C;
        box-shadow: 0 0 500px 20px #F3A40C; }
    .home-main .diamond-cover.sec {
        position: absolute; top: -50%; left: -100%;
        border: 1000px solid #00BCD4;
        background: #26DC9F;
        box-shadow: 0 0 500px 20px #26DC9F; }
    .home-main .diamond-cover.in {
        left: -50%;
        opacity: 0.7;
        border-width: 0;
        transition: 1s; }
    .home-main .diamond-cover.sec.in {
        left: 70%; }

    @keyframes circleload {
        0% { height: 0; width: 5px; margin-top: calc(20% - 0); 
            transform: rotate(0deg); opacity: 0.7; border: 0 solid white; }
        30% { height: 200px; width: 5px; margin-top: calc(20% - (200px / 2)); 
            transform: rotate(0deg); opacity: 0.7; border: 0 solid white; }
        55% { background-color: {{ $charColorSub }}; }
        60% { background-color: {{ $charColor }}; }
        65% { background-color: {{ $charColorSub }}; }
        70% { height: 200px; width: 200px; margin-top: calc(20% - (200px / 2)); 
            transform: rotate(315deg); opacity: 0.7; border: 0 solid white; }
        100% { height: 800px; width: 800px; margin-top: calc(20% - (800px / 2)); 
            transform: rotate(315deg); opacity: 0; border: 400px solid white; }
    }
    @keyframes circleloadboot {
        0% { opacity: 0 }
        30% { opacity: 0 } 35% { opacity: 0.5 }
        36% { opacity: 0 } 38% { opacity: 0.8 }
        42% { opacity: 0 }
        50% { opacity: 0 } 55% { opacity: 1 }
        60% { opacity: 0 }
        75% { opacity: 0 } 80% { opacity: 1 }
        95% { opacity: 1 }
        100% { opacity: 0 }
    }
    @keyframes circleloadcon {
        0% { transform: scale(0) rotate(45deg); border: 75px solid white; }
        20% { transform: scale(1.2) rotate(45deg); border: 1px solid white; }
        80% { transform: scale(1.1) rotate(45deg); border: 1px solid white; }
        100% { transform: scale(0) rotate(45deg); border: 75px solid white; }
    }

    .home-main .circle-load {
        box-sizing: border-box;
        position: relative;
        width: 10px;
        margin: 20% auto 0;
        background-color: {{ $charColorSub }}; }
    .home-main .circle-load-boot {
        position: absolute;
        top: 30%; left: calc(50% - (200px / 2));
        width: 200px;
        color: white;
        font-size: 18px;
        text-align: center;
        opacity: 0;  }
    .home-main .circle-load-boot.in {
        opacity: 1; }
    .home-main .circle-load-boot.in:before {
        content: "";
        animation: circleloadcon 3s;
        animation-fill-mode: forwards;
        position: absolute; top: -65px; left: calc(50% - 75px);
        width: 150px; height: 150px; }

    .mini-nav {
        position: absolute; bottom: -100px;
        width: 100%;
        list-style-type: none;
        padding: 0 1px; margin: 0;
        z-index: 2; }
    .mini-nav.in { 
        bottom: 0;
        transition: 1s; }

    .mini-nav li {
        float: left;       
        width: calc(100% / 6);
        padding: 0 1px; }
    .mini-nav li a { 
        position: relative;
        display: block;
        width: 100%; 
        background: rgba(255,255,255,0.1);
        color: white;
        font-family: 'Righteous', cursive;
        font-size: 16px;
        text-align: center;
        padding: 15px 0;
        transition: 0.5s; }

    .mini-nav li a:before {
        content: "";
        position: absolute;
        top: 100%; left: 0;
        width: 100%; height: 0;
        background-color: #eee;
        z-index: -1;
        transition: 0.5s; }
    .mini-nav li:hover a:before {
        top: 0;
        height: 100%;
        transition: 0.3s; }
    .mini-nav li:hover a {
        color: #333;
        transition: 0.3s; }

</style>

<div class="home-main">
    <div class="color-grade"></div>
    <div class="diamond"></div><div class="diamond-border"></div>
    <div class="diamond-cover"></div><div class="diamond-cover sec"></div>
    <img class="portrait" src="{{ url('img/mirrorplane-logo.png') }}">
    <div class="circle-load"></div><div class="circle-load-boot">Initializing Boot<br>Sequence...</div>
    <div class="color-grade bot"></div>

    <ul class="mini-nav">
        <li><a href="#">Divisions</a></li>
        <li><a href="#">Day/Night Cycle</a></li>
        <li><a href="#">CTSystem</a></li>
        <li><a href="#">Myst Manipulation</a></li>
        <li><a href="#">Organizations</a></li>
        <li><a href="#">The Mares</a></li>
    </ul>

</div>

<script type="text/javascript">
    $(window).load( function() {
        // var firstload = true;
        $('.home-main .circle-load-boot').css('animation', 'circleloadboot 4s');
        $('.home-main .circle-load-boot').css('animation-fill-mode', 'forwards');
        setTimeout(function() {
            $('.home-main .circle-load').css('animation', 'circleload 3s');
            $('.home-main .circle-load').css('animation-fill-mode', 'forwards');

            setTimeout(function() {
                $('.home-main .circle-load-boot').html('Opening<br>Core Tether...'); 
            }, 1000);

            setTimeout(function() {
                callin(); 
            }, 1750);

        }, 1500); 
    });

    function callin() {
        $('.home-main img.portrait').fadeIn("slow", function() {
            $('.home-main .color-grade').fadeIn("slow");
        });
        $('.home-main .diamond').css('animation', 'diamondscale 1.4s');
        $('.home-main .diamond').css('animation-fill-mode', 'forwards');
        $('.home-main .diamond-border').css('animation', 'diamondscaleborder 1.7s');
        $('.home-main .diamond-border').css('animation-fill-mode', 'forwards');
        $('.home-main .diamond-cover').addClass('in'); 
        setTimeout(function() {
            $('.home-main .mini-nav').addClass('in');

            $('.home-main .circle-load-boot').html('Card Operational...');
            $('.home-main .circle-load-boot').css('animation', '');
            $('.home-main .circle-load-boot').addClass('in');

            setTimeout(function() {
                $('.home-main .circle-load-boot').fadeOut("fast");
            }, 2500);

        }, 1500); 

        return false; 
    };
</script>