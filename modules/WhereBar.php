<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						
						<ul class="breadcrumb" >
							<li>
								<i class="icon-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active" ><?php
echo  $Pga = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);

?></li>
                                                        
						</ul><!-- .breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- #nav-search -->
					</div>

				<!-- /.page-content -->
				</div>