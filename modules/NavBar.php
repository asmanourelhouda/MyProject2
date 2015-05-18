<div class="main-container" id="main-container">
			

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<div class="sidebar" id="sidebar">
					

					<div class="sidebar-shortcuts" id="sidebar-shortcuts">
						<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
							<button class="btn btn-success">
								<!--<i class="icon-signal"></i>-->
							</button>

							<button class="btn btn-info">
								<!--<i class="icon-pencil"></i>-->
							</button>

							<button class="btn btn-warning">
								<!--<i class="icon-group"></i>-->
							</button>

							<button class="btn btn-danger">
								<!--<i class="icon-cogs"></i>-->
							</button>
						</div>

						<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
							<span class="btn btn-success"></span>

							<span class="btn btn-info"></span>

							<span class="btn btn-warning"></span>

							<span class="btn btn-danger"></span>
						</div>
					</div><!-- #sidebar-shortcuts -->

					<ul class="nav nav-list">
						<li <? if($Pga=="" || $Pga=="default" || $Pga=="Dashboard" ) echo 'class="active"'; ?> >
							<a href="<?=WEBRoot?>/default">
								<i class="icon-dashboard"></i>
								<span class="menu-text"> Dashboard </span>
							</a>
						</li>
                                                
                                                	<li <? if($Pga=="LigneList") echo 'class="active"'; ?> >
							<a href="<?=WEBRoot?>/LigneList">
								<i class="icon-arrow-right"></i>
								<span class="menu-text"> Ligne </span>
							</a>
						</li>
                                                
                                                
                                                <li <? if($Pga=="ProduitList") echo 'class="active"'; ?> >
							<a href="<?=WEBRoot?>/ProduitList">
								<i class="icon-arrow-right"></i>
								<span class="menu-text"> Produit </span>
							</a>
						</li>
                                                
                                              

						<li <? if($Pga=="DailyProd" || $Pga=="MonthlyProd" || $Pga=="YearlyProd" ) echo 'class="active"'; ?> >
							<a href="#"  class="dropdown-toggle">
								<i class="icon-cogs"></i>
								<span class="menu-text"> Production </span>
                                                                <b class="arrow icon-angle-down"></b>
							</a>
                                                    
                                                    <ul class="submenu">
								<li>
									<a href="<?=WEBRoot?>/DailyProd">
										<i class="icon-double-angle-right"></i>
										Production Journalière
									</a>
								</li>

								<li>
									<a href="<?=WEBRoot?>/MonthlyProd">
										<i class="icon-double-angle-right"></i>
										Production Mensuelle
									</a>
								</li>

								<li>
									<a href="<?=WEBRoot?>/YearlyProd">
										<i class="icon-double-angle-right"></i>
										Production Annuelle
									</a>
								</li>

							
							</ul>
						</li>

						<li <? if($Pga=="test" ) echo 'class="active"'; ?> >
							<a href="<?=WEBRoot?>/test" class="dropdown-toggle">
								<i class=" icon-external-link"></i>
								<span class="menu-text"> Temps d'arrêt testeur </span>

								
							</a>

							
						</li>

						<li <? if($Pga=="Archive" ) echo 'class="active"'; ?> >
							<a href="<?=WEBRoot?>/Archive&d=0" class="dropdown-toggle">
								<i class=" icon-folder-open"></i>
								<span class="menu-text"> Archive </span>

								
							</a>

						
						</li>

						<li <? if($Pga=="SuiviFilter" || $Pga=="M") echo 'class="active"'; ?> >
							<a href="#" class="dropdown-toggle">
								<!--<i class="icon-edit" ></i>-->
                                                            <img class="nav-user-photo" src="assets/img/k1.png" style="width: 20px" />
								<span class="menu-text"> KOSU </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="<?=WEBRoot?>/KosuList">
										<i class="icon-double-angle-right"></i>
										Insertion des données
									</a>
								</li>

							

								<li>
									<a href="<?=WEBRoot?>/SuiviFilter">
										<i class="icon-double-angle-right"></i>
										Suivi
									</a>
								</li>
							</ul>
						</li>

						

					</ul><!-- /.nav-list -->

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					
				</div>

				<!-- /.main-content -->

				<?php
                                 include 'modules/WhereBar.php';
//                                 include 'modules/SettingBar.php'; 
                                 include 'modules/SecondBar.php';
                                ?>
                                
                                 
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->