$(function(){
	$("#location").on("mouseover",".npc_name",function(e){
			$(".npc_name").removeClass("become_bold");
			$(this).addClass("become_bold");
			var cord_left = $(this).attr("data-cord_left");
			var cord_top = $(this).attr("data-cord_top");
			$("#monster_move").stop(true,false).animate({left:cord_left,top:cord_top});
			var p_left = $(this).position().left;
			var p_top = $(this).position().top;
			$("#name_pointer").show().offset({top:p_top+110});

		})

	$("#map_pic_small img").click(function(){
		var that = $(this);
		var index = that.index("#map_pic_small img");
		$("#map_pic img ,.npc_box").hide();
		$("#map_pic img:eq("+index+"),.npc_box:eq("+index+")").show();
		$("#map_pic_small #black_matte").animate({top:index*that.height()+(index+1)*30})

	})
})