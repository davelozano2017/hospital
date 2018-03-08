	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.html"><img src="assets/images/logo_light.png" alt=""></a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="#">Text link</a></li>

				<li>
					<a href="#">
						<i class="icon-cog3"></i>
						<span class="visible-xs-inline-block position-right">Icon link</span>
					</a>						
				</li>

				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?= empty($data['user']->image) ? 'https://d2ln1xbi067hum.cloudfront.net/assets/default_user-abdf6434cda029ecd32423baac4ec238.png' : ASSETS.'/uploads/profile/'.$data['user']->image; ?>" alt="">
						<span><?=$data['user']->name?></span>
						<i class="caret"></i>
					</a>
					<?php $controller = $data['user']->role == 0 ? 'admin' : ($data['user']->role == 1 ? 'doctor' : ($data['user']->role == 2 ? 'staff' : null));?>
					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="<?=URL.$controller?>/profile"><i class="icon-user"></i> Profile</a></li>
						<li><a href="<?=URL.$controller?>/password"><i class="icon-lock2"></i> Change Password</a></li>
						<li class="divider"></li>
						<li><a href="<?=URL.$controller?>/logout"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->
