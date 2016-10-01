<div id="gmap" style="height: <?php echo $this->height;?>"></div>
<?php if($this->type=='basic'):?>
<script type="text/javascript">
if (window.addEventListener) {
	window.addEventListener('load', initGmap, false);
} else if (window.attachEvent) {
	window.attachEvent('onload', initGmap);
}
function initGmap(){
    $(function(){
        new GMaps({
            div: '#gmap',
            lat: '<?php echo $this->lat;?>',
            lng: '<?php echo $this->lng;?>'
        });
    });
}
</script>
<?php else:?>
<script type="text/javascript">
if (window.addEventListener) {
	window.addEventListener('load', initGmap, false);
} else if (window.attachEvent) {
	window.attachEvent('onload', initGmap);
}
function initGmap(){
    $(function(){
        var map_marker = new GMaps({
            div: '#gmap',
            lat: '<?php echo $this->lat;?>',
            lng: '<?php echo $this->lng;?>'
        });
        map_marker.addMarker({
            lat: '<?php echo $this->lat;?>',
            lng: '<?php echo $this->lng;?>',
            click: function(e) {
              
            }
        });
        
    });
}
</script>
<?php endif;?>
