<?php if (!defined('THINK_PATH')) exit();?><div class="span<?php echo ($addons_config["width"]); ?>">
	<div class="columns-mod">
		<div class="hd cf">
			<h5>开发团队</h5>
			<div class="title-opt">
			</div>
		</div>
		<div class="bd">
			<div class="sys-info">
				<table>
					<tr>
						<th>系统名称</th>
						<td>yershop开源网店系统</td>
					</tr>
					<tr>
						<th>程序设计</th>
						<td>刘伟</td>
					</tr>
					<tr>
						<th>授权码</th>
						<td  ><?php if(C('SCODE')){ echo C('SCODE')."<a href='http://www.yershop.com' target='_blank'>点此验证</a>";}else{echo "未授权";}; ?></td>
					</tr>
					<tr>
						<th>官方网址</th>
						<td><a href="http://www.yershop.com" target="_blank">www.yershop.com</a></td>
					</tr>
					<tr>
						<th>核心框架</th>
						<td>ThinkPHP 3.2</td>
					</tr>
					<tr>
						<th>获取授权</th>
						<td><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1010422715&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:1010422715:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></td>
					</tr>
					<tr>
						<th>BUG反馈</th>
						<td><a href="http://yershop.com/index.php?s=/Home/forum/index.html" target="_blank">yershop论坛</a></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>