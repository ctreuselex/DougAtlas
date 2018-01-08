<style>
	.swiper-pagination-bullet-active { background: {{ $charColor }}; }
	.sel-diamond { 
		position: absolute; left: calc(350px / 2 - 150px);
		width: 300px; height: 300px;
		opacity: 0.5;
		transform: rotate(45deg);
		z-index: -1; }
	.sel-diamond.sm { 
		position: absolute; left: calc(350px / 2 - 100px); bottom: -100px;
		width: 200px; height: 200px;
		z-index: 1;
		transform: scale(1) rotate(45deg);
		transition: 0.3s; }
	.sel-diamond.border { 
		bottom: -80px;
		border: 1px solid white;
		transform: scale(0) rotate(45deg);
		opacity: 1;
		transition: 0.5s; }

	.swiper-slide:hover .sel-diamond.sm {
		transform: scale(0) rotate(45deg);
		transition: 0.5s; }
	.swiper-slide:hover .sel-diamond.border {
		transition: 0.3s; 
		transform: scale(1) rotate(45deg); }
</style>				

<div class="swiper-container">
    <div class="swiper-wrapper">
    	<?php $slideindex = 0; $cnt = 0;?>

    	@foreach ($mirChars as $char)
	    	@if ($char['ico']!='' && $char['color']!='')
	    		@if ($char['name']!='djerick' && $char['name']!='dom' && $char['name']!='cin' && $char['name']!='kalli')
			    	<?php
			    		if($char['name'] == $charname) $slideindex = $cnt;
			    		else $cnt++;

		                $url = 'img/mp-char/'.$char['name'].'.png';
		                $size = getimagesize(url($url));
		                $por = 300 / $size[1]; 
		                $height = $por * $size[1];
		                $width = $por * $size[0];

		                $diamondpos = rand(-150, -65);
		            ?>

		    		<div class="swiper-slide" style="width: {{ $width }}px; height: {{ $height }}px;">
		    			@if ($char['name']=='moon') <a href="/mirrorplane/profile/djerick">
		    			@else <a href="/mirrorplane/profile/{{ $char['name'] }}">
		    			@endif
		                <div class="sel-diamond" style="background: {{ $char['subcolor'] }}; bottom: {{ $diamondpos }}px;"></div>
		                <div class="sel-diamond border"></div>
		                <img src="{{ url($url) }}" width="100%">
		                <div class="sel-diamond sm" style="background: {{ $char['color'] }}; box-shadow: 0 0 100px 10px {{ $char['color'] }};"></div>
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