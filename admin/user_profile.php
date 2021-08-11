<?php
session_start();
include 'auth.php';
$re = mysqli_query($dbhandle,"select * from user where username = '".$_SESSION['username']."' " );
echo mysqli_error($dbhandle);
if(mysqli_num_rows($re) > 0)
{

} 
else
{

session_destroy();
header("location: index.php");
}

 include "includes/header.php" ;
 include "includes/navbar.php" ;

?>
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">User Profile</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="">Extra</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">User Profile</li>
                            </ol>
                        </div>

                    </div>
					<div class="<?php if (isset( $_GET['sucess'] ) ) { echo "alert alert-success" ;}  elseif  (isset ( $_GET['failed'] )  ) { echo "alert alert-danger"; } ?>" >	
					<?php if (isset( $_GET['sucess'] ) ) { echo "Password was changed successfuly" ;}  elseif  (isset ( $_GET['failed'] )  ) { echo "Current Password Not match"; } ?></div>

                    <div class="row">
                        <div class="col-md-12 ">
                            <!-- BEGIN PROFILE SIDEBAR -->
                            <div class="profile-sidebar ">
                                <div class="card card-topline-aqua">
                                    <div class="card-body no-padding height-9">
                                        <div class="row">
                                            <div class="profile-userpic">
                                                <img src="assets/img/dp.jpg" class="img-responsive" alt=""> </div>
                                        </div>
                                        <div class="profile-usertitle">
                                            <div class="profile-usertitle-name">AMINE NAFKHA</div>
                                            <div class="profile-usertitle-job"> Pr of HOTEL </div>
                                        </div>
                                   
                                        <!-- END SIDEBAR USER TITLE -->
                                      
                                   
                            
                                    </div>
                                </div>
                           
                            </div>
                            <!-- END BEGIN PROFILE SIDEBAR -->
                            <!-- BEGIN PROFILE CONTENT -->
                            <div class="profile-content">
                                <div class="row">
									<div class="profile-tab-box">
										<div class="p-l-20">
											<ul class="nav ">
												<li class="nav-item tab-all"><a
													class="nav-link active show" href="#tab1" data-toggle="tab">About Me</a></li>
											
												<li class="nav-item tab-all p-l-20"><a class="nav-link"
													href="#tab3" data-toggle="tab">Settings</a></li>
											</ul>
										</div>
									</div>
									<div class="white-box">
					                            <!-- Tab panes -->
				                            <div class="tab-content">
				                                <div class="tab-pane active fontawesome-demo" id="tab1">
														<div id="biography" >
						                                    <div class="row">
						                                        <div class="col-md-3 col-6 b-r"> <strong>Full Name</strong>
						                                            <br>
						                                            <p class="text-muted">AMINE NAFKHA</p>
						                                        </div>
						                                        <div class="col-md-3 col-6 b-r"> <strong>Mobile</strong>
						                                            <br>
						                                            <p class="text-muted">+216 53 312 746</p>
						                                        </div>
						                                        <div class="col-md-4 col-6 b-r"> <strong>Email</strong>
						                                            <br>
						                                            <p class="text-muted">Aminenafkha21@gmail.com</p>
						                                        </div>
						                                        <div class="col-md-2 col-6  b-r"> <strong>Location</strong>
						                                            <br>
						                                            <p class="text-muted">Tunisia</p>
						                                        </div>
						                                    </div>
						                                 
						                                </div>
													</div>
					                               
													<div class="tab-pane" id="tab3">
														<div class="row">
															<div class="col-md-12 col-sm-12">
								                                <div class="card-head">
								                                    <header>Password Change</header>
								                                    <button id = "panel-button2" 
												                           class = "mdl-button mdl-js-button mdl-button--icon pull-right" 
												                           data-upgraded = ",MaterialButton">
												                           <i class = "material-icons">more_vert</i>
												                        </button>
												                        <ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
												                           data-mdl-for = "panel-button2">
												                           <li class = "mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
												                           <li class = "mdl-menu__item"><i class="material-icons">print</i>Another action</li>
												                           <li class = "mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
												                        </ul>
								                                </div>
								                                <div class="card-body " id="bar-parent1">
								                                    <form action="changepass.php" method="post">
																	

								                                        <div class="form-group">
								                                            <label for="simpleFormEmail">User Name</label>
								                                            <input name="userch" type="text" class="form-control" id="simpleFormEmail" placeholder="<?php echo $_SESSION['username'] ;?>" required disabled="disabled">
								                                        </div>
								                                        <div class="form-group">
								                                            <label for="simpleFormPassword">Current Password</label>
								                                            <input name="currentPassword" type="password" class="form-control" id="simpleFormPassword" placeholder="Current Password" required>
								                                        </div>
								                                        <div class="form-group">
								                                            <label for="simpleFormPassword">New Password</label>
								                                            <input name="newPassword" type="password" class="form-control" id="newpassword" placeholder="New Password" required>
								                                        </div>
								                                        <button type="submit" class="btn btn-primary">Submit</button>
								                                    </form>
								                                </div>
									                        </div>
														</div>
													</div>
					                            </div>
					                        </div>
                                     </div>
                                </div>
                                <!-- END PROFILE CONTENT -->
                            </div>
                        </div>
                    </div>
                <!-- end page content -->
                <?php include "includes/footer.php" ; ?>