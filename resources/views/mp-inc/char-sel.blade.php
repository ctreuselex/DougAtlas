<style>
	.swiper-pagination-bullet-active { background: {{ $charColor }}; }
	.sel-diamond { 
		position: absolute; left: calc(350px / 2 - 150px);
		width: 300px; height: 300px;
		opacity: 0.5;
		z-index: -2;
		transform: scale(0.9) rotate(45deg);
		transition: 0.3s; }
	.sel-diamond.sm { 
		position: absolute; left: calc(350px / 2 - 100px); bottom: -80px;
		width: 200px; height: 200px;
		z-index: 1;
		opacity: 0.8;
		filter: blur(0px);
		transform: scale(1) rotate(45deg);
		transition: 0.3s; }
	.sel-diamond.border { 
		bottom: -80px;
		border: 1px solid white;
		transform: scale(0) rotate(45deg);
		opacity: 1;
		z-index: -1;
		transition: 0.5s; }
	.sel-name {
		position: absolute; bottom: 50px;
		width: 100%;
	    color: white;
	    font-size: 14px;
	    text-align: center;
	    text-transform: capitalize;
	    text-shadow: 0 0 10px white;
	    line-height: 1;
	    z-index: 1;
		filter: blur(0px);
	    transition: 0.3s; }
	.sel-name b {
	    font-size: 16px; }
	.sel-name i {
	    font-size: 24px; }
	.swiper-slide img {
		/*filter: blur(1px) brightness(0.5) grayscale(0.8);*/
		filter: contrast(0.3) blur(1px);
		transition: 0.5s; }

	.swiper-slide:hover .sel-diamond,
	.swiper-slide.sel .sel-diamond{		
		transform: scale(1) rotate(45deg);
		transition: 0.3s; }
	.swiper-slide:hover .sel-diamond.sm {
		bottom: -120px;
		filter: blur(1px);
		transition: 0.5s; }
	.swiper-slide.sel .sel-diamond.sm {
		opacity: 0.5;
		bottom: -140px; }
	.swiper-slide:hover .sel-diamond.border,
	.swiper-slide.sel .sel-diamond.border{
		transform: scale(1) rotate(45deg);
		transition: 0.3s;  }
	.swiper-slide:hover .sel-name {
		bottom: 30px;
		filter: blur(1px);
		transition: 0.5s; }
	.swiper-slide.sel .sel-name{
		bottom: -80px; }
	.swiper-slide:hover img,
	.swiper-slide.sel img{
		/*filter: blur(0px) brightness(1) grayscale(0);	*/
		filter: contrast(1) blur(0);
		transition: 0.3s; }
</style>				

<div class="swiper-container">
    <div class="swiper-wrapper">
    	<?php $slideindex = 0; $cnt = 0; $selected = ""; ?>

    	@foreach ($mirChars as $char)
	    	@if ($char['ico']!='' && $char['color']!='')
	    		@if ($char['name']!='djerick' && $char['name']!='dom' && $char['name']!='cin' && $char['name']!='kalli' && $char['name']!='gemini' && $char['name']!='bono' && $char['name']!='frederick' && $char['name']!='denise' && $char['name']!='ceicil' && $char['name']!='koom' )
			    	<?php
			    		if($char['name'] == $charname) { 
			    			$selected = "sel";
			    			$slideindex = $cnt;
			    		} else {
			    			$selected = "";
			    			$cnt++;
			    		}

		                $url = 'img/mp-char/'.$char['name'].'.png';
		                $size = getimagesize(url($url));
		                $por = 300 / $size[1]; 
		                $height = $por * $size[1];
		                $width = $por * $size[0];

		                // $diamondpos = rand(-150, -65);
		                $diamondpos = -65;
		            ?>

		    		<div class="swiper-slide {{ $selected }}" style="width: {{ $width }}px; height: {{ $height }}px;">
		    			@if ($char['name']=='moon') <a href="/mirrorplane/profile/djerick">
		    			@else <a href="/mirrorplane/profile/{{ $char['name'] }}">
		    			@endif
		                <div class="sel-diamond" style="background: {{ $char['subcolor'] }}; bottom: {{ $diamondpos }}px;"></div>
		                <div class="sel-diamond border"></div>
		                <img src="{{ url($url) }}" width="100%">
		                <div class="sel-diamond sm" style="background: {{ $char['color'] }}; box-shadow: 0 0 100px 10px {{ $char['color'] }};"></div>
		                <div class="sel-name"> <i class="{{ $char['ico'] }}"></i> <br> <b>{{ $char['name'] }}</b> {{ $char['sur'] }} </div>
		            	</a>
		            </div>
    			@endif
	    	@endif
    	@endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>

<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 'auto',
        spaceBetween: -100,
        initialSlide: {{ $slideindex }} - 2,
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
        },
    });
</script>