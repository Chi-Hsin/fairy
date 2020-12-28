$(function(){
		
		// if(localStorage.getItem("map_data") == null)
		// {
			$.getJSON("json/xddd.json",function(x){
							localStorage.setItem("map_data",JSON.stringify(x));
							$.ajax({
							type:"POST",
							url:"big_map.php",
							data:
							{
								data:JSON.stringify(x)
							},success:function(message)
							{
								$("#div_bigmap").html(message)
							}
							})
						  $.ajax({
							type:"POST",
							url:"small_map.php",
							data:
							{
								data:localStorage.getItem("map_data"),
								bm:"bm2",
								monster_move:localStorage.getItem("monster_move")

							},success:function(message)
							{
								$("#div_smallmap").html(message)
							}
							})
					})
		// }
		$("#bm_btn").click(function(){ //大地圖切換
			$("#div_bigmap").show();
			$("#div_smallmap").hide();
		})
		$("#sm_btn").click(function(){ //小地圖切換
			$("#div_smallmap").show();
			$("#div_bigmap").hide();
		})

		$("input").change(function(){
			 if($("input[name='keyword_type']").val() == ""){return;}
			 $.ajax({
				type:"POST",
				url:"small_map.php",
				data:
				{
					data:localStorage.getItem("map_data"),
					name:$("input[name='keyword_type']").val(),
					search_condtion:$("input:checked[name='sss']").val(),
					monster_move:localStorage.getItem("monster_move")
					// selected:

				},success:function(message)
				{
					$("#div_smallmap").html(message);
			 		$(".npc_box")[0].scrollTop = $("#location p[data-find='Y']").position().top;
			 		
			 		$(".npc_name").removeClass("become_bold");
					$("#location p[data-find='Y']").addClass("become_bold");
					var cord_left = $("#location p[data-find='Y']").attr("data-cord_left");
					var cord_top = $("#location p[data-find='Y']").attr("data-cord_top");
					$("#monster_move").stop(true,false).animate({left:cord_left,top:cord_top});
					var p_left = $("#location p[data-find='Y']").position().left;
					var p_top = $("#location p[data-find='Y']").position().top;
					$("#name_pointer").show().offset({top:p_top+110});
					// 操作地幾個地圖
					var index = $("#location p[data-find='Y']").parent().index(".npc_box");

					$("#map_pic img ,.npc_box").hide();
					$("#map_pic img:eq("+index+"),.npc_box:eq("+index+")").show();
					var hhh = $("#map_pic_small img").height();
					$("#map_pic_small #black_matte").animate({top:index*hhh+(index+1)*30})
				}
				});
			
			 $("#sm_btn").click();

			 
		})
		$(window).on("load",function(){
			if(localStorage.getItem("monster_move") == null)
			  {
			  	localStorage.setItem("monster_move","G1");//設定初始幻獸指標圖案(小黑羊)
			  }
			$.ajax({
				type:"POST",
				url:"big_map.php",
				data:
				{
					data:localStorage.getItem("map_data")
				},success:function(message)
				{
					$("#div_bigmap").html(message)
				}
				})
			  $.ajax({
				type:"POST",
				url:"small_map.php",
				data:
				{
					data:localStorage.getItem("map_data"),
					bm:"bm2",
					monster_move:localStorage.getItem("monster_move")

				},success:function(message)
				{
					$("#div_smallmap").html(message)
				}
				})
			 
		})
		
		$("#config").on("click",function(){
			if($(this).attr("data-show") == 1)
			{
				$("#config_big").slideDown();
				$(this).attr("data-show",0);
			}
			else
			{
				$("#config_big").slideUp();
				$(this).attr("data-show",1);
			}
		})
		$("#record_delete").click(function(){
			 if(confirm("確定刪除緩存紀錄嗎?"))
		      {
		        localStorage.removeItem("map_data");
		        setTimeout(function(){alert("執行完成!")},500)
		      }
		})


		$("#config_big input[name='monster_set']").click(function(){
			$("#monster_move").attr("src","img/monster/"+$(this).val()+".gif");
			localStorage.setItem("monster_move",$(this).val())
		})
		/////
		
	})