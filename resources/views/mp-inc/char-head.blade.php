
<style type="text/css">
    .char-main {
        position: relative;
        width: 100%; height: calc(100vh - 80px);
        background-size: 300px; 
        background-blend-mode: overlay;
        overflow: hidden;
        background-color: {{ $charColor }};
        background-image: url('{{ $charTexture }}');}
    .char-main img.portrait {
        display: none;
        position: absolute; right: 0; bottom: 0;
        width: 62.5%; }

    @keyframes diamondscale {
        0% { transform: scale(5) rotate(315deg); opacity: 0; border: 1000px solid {{ $charColor }}; }
        50% { transform: scale(5) rotate(315deg); opacity: 0; border: 1000px solid {{ $charColor }}; }
        100% { transform: scale(1) rotate(315deg); opacity: 0.5;  border: 0 solid {{ $charColor }}; }
    }@keyframes diamondscaleborder {
        0% { transform: scale(0) rotate(315deg); opacity: 0; }
        70% { transform: scale(0) rotate(315deg); opacity: 0; }
        100% { transform: scale(1) rotate(315deg); opacity: 1 ; }
    }

    .char-main .diamond {
        position: absolute; top: 15%;
        left: calc(70% - (500px / 2));
        height: 500px; width: 500px;
        opacity: 0;
        background: {{ $charColorSub }}; 
        box-shadow: 0 0 100px 5px {{ $charColorSub }}; }
    .char-main .diamond-border {
        position: absolute; top: 10%; 
        left: calc(70% - (500px / 2));
        height: 500px; width: 500px;
        opacity: 0;
        mix-blend-mode: color-dodge;
        border: 2px solid {{ $charColor }}; }
    .char-main .diamond-cover {
        position: absolute; top: -5%; left: 100%;
        height: 1000px; width: 1000px;
        opacity: 0;
        transform: rotate(45deg);
        background: {{ $charColor }};
        box-shadow: 0 0 100px 5px {{ $charColor }};}
    .char-main .diamond-cover.in {
        left: -30%;
        opacity: 0.8;
        transition: 1s; }

    .char-main .details {
        display: none;
        position: absolute;
        width: 40%; 
        color: white;
        padding: 15px 30px;
        z-index: 2; }
    .char-main .details .char-name {
        white-space: nowrap;
        line-height: 1;
        font-size: 60px;
        text-transform:capitalize;
        font-variant:small-caps; }
    .char-main .details .char-per {
        position: relative;
        padding: 0 0 5px 0; }
    .char-main .details .char-per p {
        background-color: transparent; }
    .char-main .details .char-logs {
        padding: 0;
        margin: 0; }
    .char-main .details .char-logs.per li, .char-logs li {
        background: rgba(0,0,0,0.2);
        color: white; }

    .modal-backdrop.in { background-color: {{ $charColorSub }}; }
    .modal-backdrop.in { opacity: 0.7;}
    .modal-body { color: #333; }

    .modal-dialog {
        margin: 30px auto 100px; }

    @keyframes diamondmodal {
        0% { transform: scale(1.5) rotate(45deg); opacity: 0; border: 1000px solid white; }
        100% { transform: scale(1) rotate(45deg); opacity: 1; border: 0px solid white; }
    }
    @keyframes diamondmodaldrop {
        0% { transform: scale(0) rotate(45deg); opacity: 0; }
        50% { transform: scale(0) rotate(45deg); opacity: 0; }
        100% { transform: scale(1) rotate(45deg);opacity: 1;  }
    }

    .modal-backdrop .diamond {
        animation: diamondmodal 0.5s;
        animation-fill-mode: forwards;
        position: relative;
        width: 700px; height: 700px;
        margin: -15% auto 0; 
        background: {{ $charColor }};
        box-shadow: 0 0 200px 30px {{ $charColor }}; }
    .modal-backdrop .diamond-border {
        animation: diamondmodaldrop 0.8s;
        animation-fill-mode: forwards;
        position: relative;
        width: 650px; height: 650px;
        margin: -35% auto 0;
        border: 2px solid white; }

</style>

<div class="char-main">
    <div style="position: absolute; width: 100%; height: 100%; z-index: 0;
        background: rgba(0,0,0,0);
        background: -moz-linear-gradient(top, {{ $charColor }} 0%, rgba(0,0,0,0) 25%);
        background: -webkit-linear-gradient(top, {{ $charColor }} 0%, rgba(0,0,0,0) 25%);
        background: linear-gradient(to bottom, {{ $charColor }} 0%, rgba(0,0,0,0) 25%);">
    </div>
    <div class="diamond"></div><div class="diamond-border"></div>
    <img class="portrait" src="{{ url('img/mp-char/'.$charname.'.png') }}">
    <div class="diamond-cover"></div>
    <div style="position: absolute; width: 100%; height: 100%; z-index: 1;                
        background: rgba(0,0,0,0);
        background: -moz-linear-gradient(top, rgba(0,0,0,0) 50%, {{ $charColorSub }} 100%);
        background: -webkit-linear-gradient(top, rgba(0,0,0,0) 50%, {{ $charColorSub }} 100%);
        background: linear-gradient(to bottom, rgba(0,0,0,0) 50%, {{ $charColorSub }} 100%);">
    </div>

    <div class="details">
        <span class="char-name">{{ $mcharNam }}</span>
        <p style="white-space: nowrap;">{{ $charthemes}}</p>
        <div class="char-per"><p><b>Profile</b></p><i class="{{ $charIco }}" aria-hidden="true"></i>
            <ul class="char-logs">
                <!-- <li>Full Name: <b>{{ $mcharNam }}</b><span></li> -->
                <li>Age: 
                    <b>{{ round(((236*1.35)*(1699-$mcharAge))/365, 0) }} | {{ 1699-$mcharAge }} | {{ $mcharAge }}</b>
                </li>
                <!-- <li>Relatives: <b>{{ $mcharFam }}</b></li> -->
                @if ($mcharDiv != '')
                    <li>Home Division: 
                        @if ($mcharDiv == 'Luminos')
                            <img style="filter: brightness(10) grayscale(1);" src="{{ url('img/lum.png') }}" width="30px">
                        @elseif ($mcharDiv == 'Aeros')
                            <img style="filter: brightness(10) grayscale(1);" src="{{ url('img/aer.png') }}" width="30px">
                        @elseif ($mcharDiv == 'Mystos')
                            <img style="filter: brightness(10) grayscale(1);" src="{{ url('img/mys.png') }}" width="30px">
                        @elseif ($mcharDiv == 'Geios')
                            <img style="filter: brightness(10) grayscale(1);" src="{{ url('img/gei.png') }}" width="30px">
                        @endif
                        <b>{{ $mcharDiv }}</b>
                    </li> <!-- Luminos | Aeros | Mystos | Geios -->
                @endif
                <li>Affiliation: <b>{{ $mcharAff }}</b></li>
                <?php if(isset($mcharPos)) { ?><li>Current Rep: <b>{{ $mcharPos }}</b></li> <?php } ?>
            </ul>
        </div>
        <div class="char-per"><p><b>Combat</b></p><i class="fa fa-gamepad" aria-hidden="true"></i>
            <ul class="char-logs">
                <li>Material Affinity: <b>{{ $mcharAft }}</b></li> <!-- Fire | Water | Air | Electricity | Etc... -->
                <li>MM Style: <b>{{ $mcharSty }}</b></li> <!-- Armagi | Exnihille | Maximo | Cirkunesi -->
                <li>Weapon: <b>{{ $mcharWoc }}</b></li>
            </ul>
        </div>
        <div class="char-per"><p><b>CTs Logs</b></p><i class="fa fa-inbox" aria-hidden="true"></i>
            <ul class="char-logs per">
                @foreach ($mirLogs as $logs)
                    @if ($logs['ord']==$charname)
                        <?php 
                            $datatar = strtolower($logs['name']);
                            $datatar = str_replace(" ","-",$datatar);
                            $datatar = str_replace(",","",$datatar);
                            $datatar = str_replace("'","",$datatar);
                            $datatar = str_replace("!","",$datatar);
                            $datatar = str_replace("?","",$datatar);
                        ?>

                        <a href="" type="button" id="cts-{{ $logs['logn'] }}" class="cts-modal" data-toggle="modal" data-target="#{{ $datatar }}"><li>
                            <span class="col-xs-2" style="padding: 0;">{{ $logs['y'] }}</span>
                            <b class="col-xs-9 log-name">{{ $logs['name'] }}</b>
                            <span class="col-xs-1" style="padding: 0;">
                                {{ round(((236*1.35)*($logs['y']-$mcharAge))/365, 0) }}</span>
                        </li></a>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>

    <div class="load-circle"></div>

</div>

<script type="text/javascript">
    $(window).load( function() {
        // var firstload = true;
        callin();   

        $('.cts-modal').click(function() {
            setTimeout(function() {
                $('.modal-backdrop').append('<div class="diamond"></div>');
                $('.modal-backdrop').append('<div class="diamond-border"></div>');
            },500);
        })
    });

    function callin() {
        $('.char-main img.portrait').fadeIn("slow", function() {
            $('.char-main .details').fadeIn("slow");
        });
        $('.char-main .diamond').css('animation', 'diamondscale 1.5s');
        $('.char-main .diamond').css('animation-fill-mode', 'forwards');
        $('.char-main .diamond-border').css('animation', 'diamondscaleborder 1.8s');
        $('.char-main .diamond-border').css('animation-fill-mode', 'forwards');
        $('.char-main .diamond-cover').addClass('in'); 

        setTimeout(function() {
            $(window).mousemove(function (e) {

                parallax(e, $('.char-main img').get(0), 1, 300);
                parallax(e, $('.char-main .diamond').get(0), 1.5, -50);
                parallax(e, $('.char-main .diamond-border').get(0), 1.75, -50);
                parallax(e, $('.char-main .diamond-cover').get(0), 2, -700); 
                $('.char-main .diamond-cover').addClass('turr');
            });
        }, 3000);

        return false; 
    };

    function parallax(e, target, layer, add) {
        var layer_coeff = 10 / layer;
        // var y = (($('.char-main').height() - target.offsetHeight) - (e.pageY - ($('.char-main').height() / 2)) / layer_coeff);
        var x = (($('.char-main').width() - target.offsetWidth) - (e.pageX - ($('.char-main').width() / 2)) / layer_coeff) + add;
        // $(target).offset({ top: y ,left: x });
        $(target).offset({ left: x });
    };
</script>