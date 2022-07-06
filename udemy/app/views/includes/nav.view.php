<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light navigation">
					<a class="navbar-brand" href="<?= ROOT ?>/">
						<img src="<?= ROOT ?>/classimax/images/logo.png" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">
							<li class="nav-item">
								<a class="nav-link" href="<?= ROOT ?>/">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= ROOT ?>/shows">Shows</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= ROOT ?>/about">About Us</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= ROOT ?>/contact">Contact</a>
							</li>
							
						</ul>
						<ul class="navbar-nav ml-auto mt-10">

							

							<?php if (!Auth::logged_in()) : ?>
								<li class="nav-item">
									<a class="nav-link btn btn-outline-primary p-2 mr-4" href="<?= ROOT ?>/login">Login</a>
								</li>
								<li class="nav-item">
									<a class="nav-link text-white btn btn-primary p-2" href="<?= ROOT ?>/register"> Register</a>
								</li>
							<?php else:?>

								<li class="nav-item dropdown dropdown-slide">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="<?= ROOT ?>/"><span>Hi <?= Auth::getFirstName() ?></span>
									</a>
									<?php if(Auth::is_admin()) : ?>
									<!-- Dropdown list -->
									<div class="dropdown-menu">
										<a class="dropdown-item" href="<?= ROOT ?>/admin">Dashboard</a>
										<a class="dropdown-item" href="<?= ROOT ?>/cats/list">My Cats</a>
										<a class="dropdown-item" href="<?= ROOT ?>/myshows">My Shows</a>
										<a class="dropdown-item" href="<?= ROOT ?>/logout">Logout</a>
									</div>
									<?php elseif (Auth::is_manager()): ?>
										<div class="dropdown-menu">
										<a class="dropdown-item" href="<?= ROOT ?>/admin">Dashboard</a>
										<a class="dropdown-item" href="<?= ROOT ?>/cats/list">My Cats</a>
										<a class="dropdown-item" href="<?= ROOT ?>/myshows">My Shows</a>
										<a class="dropdown-item" href="<?= ROOT ?>/logout">Logout</a>
									</div>
									<?php else : ?>
										<div class="dropdown-menu">
										<a class="dropdown-item" href="<?= ROOT ?>/users/<?=Auth::getId()?>">Profile</a>
										<a class="dropdown-item" href="<?= ROOT ?>/cats/list">My Cats</a>
										<a class="dropdown-item" href="<?= ROOT ?>/myshows">My Shows</a>
										<a class="dropdown-item" href="<?= ROOT ?>/logout">Logout</a>
									</div>
									<?php endif; ?>
								</li>

							<?php endif;?>


						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>

