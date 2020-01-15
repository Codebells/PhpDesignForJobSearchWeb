<html>

<head>
	<meta charset="utf-8">
	<title>faq</title>

	<link rel="stylesheet" type="text/css" href="css/wenjuan_ht.css">

	<script src="js/jquery.min.js"></script>
	<script src="js/index.js"></script>

</head>

<body>

	<div class=" all_660">
		<div class="yd_box"></div>
		<div class="but" style="padding-top: 20px">
			<div class="row no-gutters mb-n2 mb-sm-n0">
				<div class="col-lg-auto col-sm-6 col-12 flex-grow-1 mb-2 mb-sm-0">
					<select id="addquerstions" class="addquerstions">
						<option value="-1">添加问题</option>
						<option value="0">单选</option>
						<option value="1">多选</option>
						<option value="2">填空</option>
					</select>
				</div>
			</div>
		</div>
		
		<div class="xxk_box">
			<div class="xxk_conn hide">
				
				<div class="xxk_xzqh_box dxuan ">
					<textarea name="" cols="" rows="" class="input_wenbk btwen_text btwen_text_dx" placeholder="单选题目"></textarea>
					<div class="title_itram">
						<div class="kzjxx_iteam">
							<input name="" type="radio" value="" class="dxk">
							<input name="" type="text" class="input_wenbk" value="" placeholder="选项">
							<label>
								<input name="" type="checkbox" value="" class="fxk"> <span>可填空</span>
							</label> <a href="javascript:void(0);" class="del_xm">删除</a>
						</div>
					</div>
					<a href="javascript:void(0)" class="zjxx">增加选项</a>
					
					<div class="bjqxwc_box">
						<a href="javascript:void(0);" class="qxbj_but">取消编辑</a>
						<a href="javascript:void(0);" class="swcbj_but"> 完成编辑</a>
					</div>
				</div>
				
				<div class="xxk_xzqh_box duoxuan hide">
					<textarea name="" cols="" rows="" class="input_wenbk btwen_text btwen_text_duox" placeholder="多选题目"></textarea>
					<div class="title_itram">
						<div class="kzjxx_iteam">
							<input name="" type="checkbox" value="" class="dxk">
							<input name="" type="text" class="input_wenbk" value="选项" placeholder="选项">
							<label>
								<input name="" type="checkbox" value="" class="fxk"> <span>可填空</span></label>
							<a href="javascript:void(0);" class="del_xm">删除</a>
						</div>
					</div>
					<a href="javascript:void(0)" class="zjxx">增加选项</a>
					
					<div class="bjqxwc_box">
						<a href="javascript:void(0);" class="qxbj_but">取消编辑</a>
						<a href="javascript:void(0);" class="swcbj_but"> 完成编辑</a>
					</div>
				</div>
				
				<div class="xxk_xzqh_box tktm hide">
					<textarea name="" cols="" rows="" class="input_wenbk btwen_text btwen_text_tk" placeholder="答题区"></textarea>
					
					<div class="bjqxwc_box">
						<a href="javascript:void(0);" class="qxbj_but">取消编辑</a>
						<a href="javascript:void(0);" class="swcbj_but"> 完成编辑</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>