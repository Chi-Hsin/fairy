<script src="js/small_map.js"></script>
<?php 



if(isset($_POST["data"]))
{
	$data = json_decode($_POST["data"],TRUE);
}
if(isset($_POST["bm"])){ //點選影像地圖的區塊  選擇小地圖
	$bm = $_POST["bm"];
	$q_bm = array_filter($data["big_map"],function($x) use ($bm){ return $x["bm"] == $bm;});
	if($q_bm == null){return;};
	$keys = array_keys($q_bm)[0];
	$query = $q_bm[$keys];
	$q_sm = array_filter($data["small_map"],function($x) use ($query){ return $x["id"] == $query["id"];});
	$arr = array();
	foreach($q_sm as $k=>$v){
    $arr[$v['section']][]    =   $v;
	}
	 // print_r(count($arr));
};
if(isset($_POST["search_condtion"])){
	$search_condtion = $_POST["search_condtion"];
}

if(isset($_POST["name"])){ // 依關鍵字查找相關地圖
		$name = $_POST["name"];
		$preg = '/\w?('.$name.')+\w?/';
		if($search_condtion == "找NPC")
		{
			$q_sm = array_filter($data["small_map"],function($x) use ($preg) //找出存在此NPC ID的小地圖
					{ 
						return preg_match($preg,$x["locate"]) == 1;
					});
			if($q_sm == null){return;};
			$keys = array_keys($q_sm)[0];
			$query = $q_sm[$keys];
			$q_sm = array_filter($data["small_map"],function($x) use ($query) //找出此小地圖所有的NPC
					{ 
						return $x["id"] == $query["id"];
					});
			foreach($q_sm as $k=>$v){
		    $arr[$v['section']][]    =   $v;
			}
			// print_r($query_sm);
		}
		else if($search_condtion == "找地圖")
		{
			$q_bm = array_filter($data["big_map"],function($x) use ($preg) //找出是哪一個小地圖
					{ 
						return preg_match($preg,$x["map"]) == 1;
					});
			if($q_bm == null){return;};
			$keys = array_keys($q_bm)[0];
			$query = $q_bm[$keys];
			$q_sm = array_filter($data["small_map"],function($x) use ($query){ return $x["id"] == $query["id"];});// 找出小地圖所有NPC的資訊
			foreach($q_sm as $k=>$v){
		    $arr[$v['section']][]    =   $v;
			}
		};
	};
 if(isset($_POST["monster_move"]))
 {
 	$monster_move = $_POST["monster_move"];
 };
$img_count = glob("img/".$query["id"]."/*");//目錄底下的圖片數量
?>
<!--區隔----------------------------------------------------------------------------------------------------------------------------------------->

<?php if($query != null){?>
<img src="<?php echo 'img/monster/'.$monster_move.'.gif';?>" alt="" id="monster_move"><!--移動圖標-->
<!-- 全地圖 -->
<div id="map_pic" >
	<?php foreach($img_count as $key => $value){?>
	<img src="<?php echo $value;?>" alt=""><!--內部的圖-->
    <?php }?>
</div>
<!-- 全地圖 end-->
<!--地圖縮圖-->
	<div id="map_pic_small">
		<div id="black_matte"></div>
		<?php foreach($img_count as $key => $value){?>
			<img src="<?php echo $value;?>" alt=""><!--內部的圖-->
    <?php }?>
	</div>
<!--地圖縮圖end-->

<div id="location"> <!--NPC位置-->
	<img id="name_pointer" src="img/pointer.png" alt="">
	<?php foreach($arr as $k => $v){ ?>
		<div class="npc_box">
			<?php foreach($v as $key => $value){ ?>
					<p class="npc_name" 
					   data-find="<?php  if($query['locate'] == $value['locate']){echo 'Y';};?>" 
					   data-cord_left="<?php echo $value['web_left'];?>" 
					   data-cord_top="<?php echo $value['web_top'];?>">
						<?php echo $value["locate"];?>
					</p>
			<?php }?>
		</div>
	<?php }?>

</div>
<?php }else{?>
<div>error</div>
<?php }?>