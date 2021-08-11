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
                                <div class="page-title">Add Room Details</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="all_rooms.php">Rooms</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Add Room Details</li>
                            </ol>
                        </div>
                    </div>
                     <div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>Add Room Details</header>
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
								<form action="insertroom.php" method="post"enctype="multipart/form-data" > 

								<div class="card-body row">

						            <div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="room_name" class = "mdl-textfield__input" type = "text" id = "txtRoomName" required>
					                     <label class = "mdl-textfield__label">Room Name</label>
					                  </div>
						            </div>
									<div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="total_room" class = "mdl-textfield__input" type = "text"  pattern = "-?[0-9]*(\.[0-9]+)?"  id = "txtRoomName" required>
					                     <label class = "mdl-textfield__label">Number of Rooms</label>
										 <span class = "mdl-textfield__error">Number required!</span>

					                  </div>
						            </div>
									<div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="occupancy" class = "mdl-textfield__input"  pattern = "-?[0-9]*(\.[0-9]+)?"  type = "text" id = "occupancy" required>
					                     <label class = "mdl-textfield__label">Occupancy</label>
										 <span class = "mdl-textfield__error">Number required!</span>

					                  </div>
						            </div>
									<div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="size" class = "mdl-textfield__input" type = "text" id = "size">
					                     <label class = "mdl-textfield__label">Size</label>
					                  </div>
						            </div>
									<div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="rate" class = "mdl-textfield__input" type = "text"  pattern = "-?[0-9]*(\.[0-9]+)?"  id = "rate" required>
					                     <label class = "mdl-textfield__label">Rate</label>
										 <span class = "mdl-textfield__error">Number required!</span>

					                  </div>
						            </div>
									<div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="view" class = "mdl-textfield__input" type = "text" id = "view">
					                     <label class = "mdl-textfield__label">View, City</label>
					                  </div>
						            </div>
						      
						         
						            <div class="col-lg-6 p-t-20">
						               <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="desc" class = "mdl-textfield__input" type = "text" 
					                        id = "text7">
					                     <label class = "mdl-textfield__label" for = "text7">Description </label>
					                  </div>
						            </div>
									<div class="col-lg-12 p-t-20">
						              <label class="control-label col-md-3">Upload Room Photo</label>
						               <input name="img" id="img" type="file" required >
                                    </div>
									<div class="col-lg-12 p-t-20 text-center"> 
						              	<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Add</button>
										<button type="reset" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
						             </div>
								</div>
                                </form>
							</div>
						</div>
					</div> 
                </div>
            </div>
            <!-- end page content -->
			<?php include "includes/footer.php" ; ?>