

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
                                <div class="page-title">All Staffs</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="">Staffs</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">All Staffs</li>
                            </ol>
                        </div>
                    </div>
				
					<div class="tab-content tab-space">
	                   <div class="tab-pane active show" id="tab1">
						 <div class="row">
		                    <div class="col-md-12">
	                            <div class="card-box">
	                                <div class="card-head">
	                                    <button id = "panel-button" 
				                           class = "mdl-button mdl-js-button mdl-button--icon pull-right" 
				                           data-upgraded = ",MaterialButton">
				                           <i class = "material-icons">more_vert</i>
				                        </button>
				                        <ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
				                           data-mdl-for = "panel-button">
				                           <li class = "mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">print</i>Another action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
				                        </ul>
	                                </div>
	                                <div class="card-body ">
									<div class="tab-pane" id="tab2">
							<div class="row">
								<div class="col-md-4">
									<div class="card">
										<div class="m-b-20">
											<div class="doctor-profile">
											<div class="profile-header bg-b-purple">
													<div class="user-name">Pooja Patel</div>
													<div class="name-center">General Manager</div>
												</div>
												<img src="assets/img/user/usrbig1.jpg" class="user-img"
													alt="">
												<p>
													A-103, shyam gokul flats, Mahatma Road <br />Mumbai
												</p>
												<div>
													<p>
														<i class="fa fa-phone"></i><a href="tel:(123)456-7890">
															(123)456-7890</a>
													</p>
												</div>
												<div class="profile-userbuttons">
													<a href="staff_profile.html"
														class="btn btn-circle deepPink-bgcolor btn-sm">Read
														More</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card">
										<div class="m-b-20">
											<div class="doctor-profile">
											<div class="profile-header cyan-bgcolor">
													<div class="user-name">Smita Patil</div>
													<div class="name-center">Housekeeper</div>
												</div>
												<img src="assets/img/user/usrbig2.jpg" class="user-img"
													alt="">
												<p>
													45, Krishna Tower, Near Bus Stop, Satellite,  <br />Ahmedabad
												</p>
												<div>
													<p>
														<i class="fa fa-phone"></i><a href="tel:(123)456-7890">
															(123)456-7890</a>
													</p>
												</div>
												<div class="profile-userbuttons">
													<a href="staff_profile.html"
														class="btn btn-circle deepPink-bgcolor btn-sm">Read
														More</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card">
										<div class="m-b-20">
											<div class="doctor-profile">
											<div class="profile-header light-dark-bgcolor">
													<div class="user-name">John Smith</div>
													<div class="name-center">Cook</div>
												</div>
												<img src="assets/img/user/usrbig3.jpg" class="user-img"
													alt="">
												<p>
													456, Estern evenue, Courtage area,  <br />New York
												</p>
												<div>
													<p>
														<i class="fa fa-phone"></i><a href="tel:(123)456-7890">
															(123)456-7890</a>
													</p>
												</div>
												<div class="profile-userbuttons">
													<a href="staff_profile.html"
														class="btn btn-circle deepPink-bgcolor btn-sm">Read
														More</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="card">
										<div class="m-b-20">
											<div class="doctor-profile">
											<div class="profile-header bg-b-orange">
													<div class="user-name">Pooja Patel</div>
													<div class="name-center">General Manager</div>
												</div>
												<img src="assets/img/user/usrbig4.jpg" class="user-img"
													alt="">
												<p>
													A-103, shyam gokul flats, Mahatma Road <br />Mumbai
												</p>
												<div>
													<p>
														<i class="fa fa-phone"></i><a href="tel:(123)456-7890">
															(123)456-7890</a>
													</p>
												</div>
												<div class="profile-userbuttons">
													<a href="staff_profile.html"
														class="btn btn-circle deepPink-bgcolor btn-sm">Read
														More</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card">
										<div class="m-b-20">
											<div class="doctor-profile">
											<div class="profile-header bg-b-green">
													<div class="user-name">Smita Patil</div>
													<div class="name-center">Housekeeper</div>
												</div>
												<img src="assets/img/user/usrbig5.jpg" class="user-img"
													alt="">
												<p>
													45, Krishna Tower, Near Bus Stop, Satellite,  <br />Ahmedabad
												</p>
												<div>
													<p>
														<i class="fa fa-phone"></i><a href="tel:(123)456-7890">
															(123)456-7890</a>
													</p>
												</div>
												<div class="profile-userbuttons">
													<a href="staff_profile.html"
														class="btn btn-circle deepPink-bgcolor btn-sm">Read
														More</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card">
										<div class="m-b-20">
											<div class="doctor-profile">
											<div class="profile-header bg-b-danger">
													<div class="user-name">John Smith</div>
													<div class="name-center">Cook</div>
												</div>
												<img src="assets/img/user/usrbig6.jpg" class="user-img"
													alt="">
												<p>
													456, Estern evenue, Courtage area,  <br />New York
												</p>
												<div>
													<p>
														<i class="fa fa-phone"></i><a href="tel:(123)456-7890">
															(123)456-7890</a>
													</p>
												</div>
												<div class="profile-userbuttons">
													<a href="#"
														class="btn btn-circle deepPink-bgcolor btn-sm">Read
														More</a>
														<a  class="btn btn-tbl-edit btn-xs"  href="<?php echo "edit_room.php?room=".$row['room_id'] ;  ?>">
														<i class="fa fa-pencil"></i>
													</a>
													<a class="btn btn-tbl-delete btn-xs" href="<?php echo "delete_room.php?room=".$row['room_id'] ;  ?>">
														<i class="fa fa-trash-o "></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						
						</div>
	                                  
	                                </div>
	                            </div>
		                      </div>
		                  </div>
	                    </div>
				
					</div>
                </div>
            </div>
            <!-- end page content -->
			<?php include "includes/footer.php" ; ?>