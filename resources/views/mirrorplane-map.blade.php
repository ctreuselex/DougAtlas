<!-- ======================================= -->
<!-- ================= PHP ================= -->
<!-- ======================================= -->
<?php
	$mapWidth = "100%"; $mapHeight = "500px";
	$bgWidth = "1920"; $bgHeight = "1200";
?>

<!-- ======================================= -->
<!-- ================= CSS ================= -->
<!-- ======================================= -->
<style type="text/css">
	.mir-map { 
		width: {{ $mapWidth }}; height: {{ $mapHeight }};
		margin: 30px auto;
		overflow: scroll; }
	.map-bg {
		background: url('{{ url('img/map-bg.jpg') }}');
		background-size: contain; 
		width: {{ $bgWidth }}px; height: {{ $bgHeight }}px; }
	.map-zoom {
		position: absolute;
		right: 10px; bottom: 10px; }
</style>

<!-- ======================================= -->
<!-- ================= MAP ================= -->
<!-- ======================================= -->
<div class="mir-map">
	<div class="map-bg">

	</div>
	<div class="map-zoom" id="mzi"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></div>
</div>

<!-- ======================================= -->
<!-- ================= JSS ================= -->
<!-- ======================================= -->
<script type="text/javascript">
	$(document).ready(function() {
		var bgWidth = <?php echo json_encode($bgWidth); ?>;
		var bgHeight = <?php echo json_encode($bgHeight); ?>;

		var mapWidth = $(".mir-map").width();
		var mapRatio = (mapWidth / bgWidth);

		bgWidth = bgWidth - (bgWidth - (bgWidth * mapRatio));
		bgHeight = bgHeight - (bgHeight - (bgHeight * mapRatio));

		alert(bgWidth + "x" + bgHeight);
		$(".map-bg").width(bgWidth);
		$(".map-bg").height(bgHeight);
	});
</script>