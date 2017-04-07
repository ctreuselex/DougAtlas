<div class="col-sm-2 ad-dash-pa">
	<a id="mirrorplane" href="/mirrorplane">
		<div class="city-scape" style="
			background-image: url({{ url('img/city-scape.jpg') }});
			background-size: contain;
		    background-repeat: no-repeat;
		    background-position: bottom;
	        background-blend-mode: multiply;">
	        <div class="moon"></div>
	        <div class="city-name" style="
				font-size: 16px;
				top: 16.5%;
			">City of</div>
	        <div class="city-name">{{ $cityname }}</div>
        	<!-- <p>MIRRORPLANE</p> -->
		</div>
    </a>
	<div class="ad-dash">
	    <div class="list-group">
	        @foreach ($mirChars as $char)
	        	@if ($char['ico']!='' && $char['color']!='')
	        		@if ($char['name']=='moon')
	        			<a id="djerick" href="/mirrorplane/djerick" class="list-group-item">{{ $char['name'] }}<i class="{{ $char['ico'] }}"></i></a>
	        		@elseif ($char['name']!='djerick')
	        			<a id="{{ $char['name'] }}" href="/mirrorplane/{{ $char['name'] }}" class="list-group-item">{{ $char['name'] }}<i class="{{ $char['ico'] }}"></i></a>
	        		@endif
	        	@endif
	        @endforeach
	        
	    </div>
	</div>
</div>