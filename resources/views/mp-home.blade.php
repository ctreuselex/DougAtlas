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
	</style>

	@include('mp-inc/home-head')

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
	</script>

@stop 