$(function(){
			$(".bm").click(function(){
			// var bmap = JSON.parse(localStorage.getItem("map_data")).big_map;
			// var bbb = bmap.filter(x => x.bm == $(this).attr("id"));
			// $("#div_smallmap #map_pic img").attr("src","img/"+bbb[0].id+"/1.jpg");
			// $("#div_smallmap #map_pic img").attr("id",bbb[0].bm);
			
			$.ajax({
				type:"POST",
				url:"small_map.php",
				data:
				{
					data:localStorage.getItem("map_data"),
					bm:$(this).attr("id"),
					monster_move:localStorage.getItem("monster_move")

				},success:function(message)
				{
					$("#div_smallmap").html(message)
				}
				})
			 $("#sm_btn").click();
		})
})