<div class="span3 offset1">
		<div class="widget" style="width:300px; margin:10px;">
			<div class="widget-header">
				<i class="icon-star"></i>
				<h3>Login <a href="#"> (Forgot Password?)</a></h3>
			</div> <!-- /widget-header -->					
			<div class="widget-content">
				<form action="<? echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<table>
					<tbody>
						<tr>
							<td style="width:80px;">Roll No.</td>
							<td><input type="text" name="rno" maxlength="8" onchange="if(this.value != 'admin') this.value = this.value.toUpperCase();"></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="password" name="pwd"></td>
						</tr>
						<tr>
							<td colspan="2">&nbsp;</td>
						</tr>
						<tr>
							<td ><a href="#"><input class="btn btn-primary" type="submit" value="Login" name="login"></a></td><td align="center"><input type="checkbox"> Remember password </td>
						</tr>
					</tbody>
				</table>
				</form>
			</div> <!-- /widget-content -->						
		</div>
</div>
