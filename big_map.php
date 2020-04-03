<script src="js/big_map.js"></script>
<?php
if(isset($_POST["data"])){
 $aaa =  json_decode($_POST["data"]);

?>
<img id="Image-Maps-Com-image-maps-2019-03-21-035303" src="img/big_map.JPG" border="0" usemap="#image-maps-2019-03-21-035303" alt="" >
<map name="image-maps-2019-03-21-035303" id="ImageMapsCom-image-maps-2019-03-21-035303">
	<?php foreach ($aaa->big_map as $key => $value){?>
<area  alt="" title="" href="#" shape="rect" coords="<?php echo $value->cordinate ?>"  target="_self"    id="<?php echo $value->bm ?>" class="bm" />
<?php }}?>
</map>