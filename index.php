<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>童話地圖查找系統</title>
</head>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/image_map.js"></script>
<link rel=stylesheet type="text/css" href="css/page.css">
<body>
	<div id="div1">童話地圖資訊查找</div>
	<div id="div2">
		<div>
			<a href="javascript:;" id="bm_btn">大地圖</a>
			<a href="javascript:;" id="sm_btn">小地圖</a>
		</div>
	</div>
	<div id="container">
		<div style="margin-bottom: 30px;position: relative;">
			<input type="text" name="keyword_type" placeholder="請輸入關鍵字搜尋">
			<label for="找地圖"><input type="radio" name="sss" value="找地圖" id="找地圖" checked>找地圖</label>
			<label for="找NPC"><input type="radio" name="sss" value="找NPC" id="找NPC">找NPC</label>
			<!--<label for="找其他"><input type="radio" name="sss" value="找其他" id="找其他">找其他</label>-->
			<img src="img/config.png" alt="" id="config"  data-show="1">
			<div id="config_big">
				<p><span>幻獸指標設定</span>
				<span style="margin-left:30px;"><a href="javascript:;" id="record_delete">刪除紀錄</a></span></p>
				<div class="bbbb" style="float:left;">
					<label for="ms7"><img src="img/monster/G1.gif" alt=""><input type="radio" name="monster_set" value="G1" id="ms7" checked ></label>
				</div>
				<div class="bbbb" style="float:left;">
					<label for="ms1"><img src="img/monster/A1.gif" alt=""><input type="radio" name="monster_set" value="A1" id="ms1"></label>
				</div>
				<div class="bbbb" style="float:left;">
					<label for="ms2"><img src="img/monster/B1.gif" alt=""><input type="radio" name="monster_set" value="B1" id="ms2"></label>
				</div>
				<div class="bbbb" style="float:left;">
					<label for="ms3"><img src="img/monster/C1.gif" alt=""><input type="radio" name="monster_set" value="C1" id="ms3"></label>
				</div>
				<div class="bbbb" style="float:left;">
					<label for="ms4"><img src="img/monster/D1.gif" alt=""><input type="radio" name="monster_set" value="D1" id="ms4"></label>
				</div>
				<div class="bbbb" style="float:left;">
					<label for="ms5"><img src="img/monster/E1.gif" alt=""><input type="radio" name="monster_set" value="E1" id="ms5"></label>
				</div>
				<div class="bbbb" style="float:left;">
					<label for="ms6"><img src="img/monster/F1.gif" alt=""><input type="radio" name="monster_set" value="F1" id="ms6"></label>
				</div>
			</div>
		</div>
		<div id="div_bigmap"></div>
		<div id="div_smallmap"></div>
		
		
	</div>
	


</body>
</html>