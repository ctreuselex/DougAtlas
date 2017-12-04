@extends('templates.mp-main')

<!-- METAS -->
@section('title') Mirrorplane @stop

@section('meta')
    <?php
        $curPage = 'home';
        $charColor = '#18FF81';
        $charColorSub = '#009688';
        $charTexture = url('img/hex-bg-l.png'); 
        $cityname = 'Mirrorplane';

        $pageNotes = array (
            array('ord'=>'', 'n'=>"Inpirations!",'v'=>"Look at all these Inpirations!"),
            array('ord'=>'', 'n'=>"Movies",'v'=>"Cloud Atlas, Inception, Suckerpunch"),
            array('ord'=>'', 'n'=>"Series",'v'=>"Avatar, Fullmetal Alchemist, RWBY"),
            array('ord'=>'', 'n'=>"Games",'v'=>"Transistor, Bastion, Bioshock"),
            );
    ?>
@stop

@section('main')
	
	<style type="text/css">	
        section {
            padding: 0 15px;
            margin: 0; }
    </style>

	@include('mp-inc/home-head')

    <section id="home-divisions">
        <p><span class="char-name">Divisions</span> | What separates this place from that place?</p>
            @include('mp-inc/divi')
        <div class="clear"></div>
    </section>

	<script type="text/javascript">
		$('.ad-dash .list-group').hide();

		setTimeout( function() {

            $('.ad-dash-pa .circle-load-boot').fadeIn("fast");
	        $('.ad-dash-pa .circle-load-boot').addClass('in');

	        setTimeout(function() {
                $('.ad-dash-pa .circle-load-boot').fadeOut("fast");
				$('.ad-dash .list-group').slideDown("slow");
            }, 2500);

    	}, 5500);

        $(document).on('click', 'a', function(event){
            if($(this).hasClass('home-head-nav')) {
                event.preventDefault();
                
                $('html, body').animate({
                    scrollTop: $( $.attr(this, 'href') ).offset().top - 50
                }, 500);
            }
        });
	</script>

@stop 