<div class="col-sm-2 ad-dash-pa">
	<div class="ad-dash">
	    <div class="list-group">
	        <a id="mirrorplane" href="/mirrorplane" class="list-group-item">The City</a>

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