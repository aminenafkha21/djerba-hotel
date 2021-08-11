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
 include "auth.php" ;

?>
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Edit Room Booking</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="view_booking.php">Booking</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Edit Booking</li>
                            </ol>
                        </div>
                    </div>
                     <div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>Edit Room Booking</header>
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
								<?php 
								    $idd = $_GET['booking'];
									?>
								<form action="<?php echo "updatebooking.php?booking=".$idd ;  ?> "method="post"  >
									<?php 
									$rrr = mysqli_query($dbhandle,"SELECT * FROM booking WHERE  booking.booking_id=".$idd."");
									if(mysqli_num_rows($rrr)> 0){
										while($rows = mysqli_fetch_array($rrr))
										{ ?>
								<div class="card-body row">
						            <div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="bookingidd" class = "mdl-textfield__input" type = "text" value="<?php echo  $idd ?>" id = "txtid"  disabled="disabled">
					                     <label class = "mdl-textfield__label">ID</label>
					                  </div>
						            </div>
									<div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="firstname" class = "mdl-textfield__input" type = "text" value="<?php echo  $rows['first_name'] ?>" id = "txtLasttName">
					                     <label class = "mdl-textfield__label" >First Name</label>
					                  </div>
						            </div>
						            <div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="lastname" class = "mdl-textfield__input" type = "text" value="<?php echo  $rows['last_name'] ?>" id = "txtLasttName">
					                     <label class = "mdl-textfield__label" >Last Name</label>
					                  </div>
						            </div>
						             <div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="email" class = "mdl-textfield__input" type = "email" value="<?php echo  $rows['email'] ?>" id = "txtemail">
					                     <label class = "mdl-textfield__label" >Email</label>
					                      <span class = "mdl-textfield__error">Enter Valid Email Address!</span>
					                  </div>
						            </div>
						             
									<div class="col-lg-6 p-t-20">
						               <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="telephone" class = "mdl-textfield__input" type = "text" value="<?php echo  $rows['telephone_no'] ?>"
					                        pattern = "-?+[0-9]*(\.[0-9]+)?" id = "text5">
					                     <label class = "mdl-textfield__label" for = "text5">Mobile Number</label>
					                     <span class = "mdl-textfield__error">Number required!</span>
					                  </div>
						            </div>
						            <div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="city"  class = "mdl-textfield__input" type = "text" value="<?php echo  $rows['city'] ?>" id = "txtCity">
					                     <label class = "mdl-textfield__label" >City</label>
					                  </div>
						            </div>
						            <div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input class = "mdl-textfield__input" type = "text" value="<?php echo  $rows['checkin_date'] ?>" id = "date1" disabled="disabled">
					                     <label class = "mdl-textfield__label" >Arrive</label>
					                  </div>
						            </div>
						            <div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input class = "mdl-textfield__input" type = "text" value="<?php echo  $rows['checkout_date'] ?>" id = "date2" disabled="disabled" >
					                     <label class = "mdl-textfield__label" >Depart</label>
					                  </div>
						            </div>
						             <div class="col-lg-6 p-t-20"> 
						              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
								            <input  name="childrens" class="mdl-textfield__input" type="text" id="list2" value="<?php echo  $rows['total_children'] ?>" readonly tabIndex="-1">
								            <label for="list2" class="pull-right margin-0">
								                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
								            </label>
								            <label for="list2" class="mdl-textfield__label">N° Children</label>
								            <ul data-mdl-for="list2" class="mdl-menu mdl-menu--bottom-left mdl-js-menu" >
											    <li class="mdl-menu__item" data-val="0">0</li>
								                <li class="mdl-menu__item" data-val="1">1</li>
								                <li class="mdl-menu__item" data-val="2">2</li>
								                <li class="mdl-menu__item" data-val="3">3</li>
								                <li class="mdl-menu__item" data-val="4">4</li>
								                <li class="mdl-menu__item" data-val="5">5</li>
								                <li class="mdl-menu__item" data-val="6">6</li>
								                <li class="mdl-menu__item" data-val="7">7</li>
								                <li class="mdl-menu__item" data-val="8">8</li>
												<li class="mdl-menu__item" data-val="9">9</li>
								                <li class="mdl-menu__item" data-val="10">10</li>

								            </ul>
								        </div>
						           	</div>
									   <div class="col-lg-6 p-t-20"> 
						                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
								            <input name="adults" class="mdl-textfield__input" type="text" id="list3" value="<?php echo  $rows['total_adult'] ?>" readonly tabIndex="-1">
								            <label for="list3" class="pull-right margin-0">
								                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
								            </label>
								            <label for="list3" class="mdl-textfield__label">N° Adults</label>
								            <ul data-mdl-for="list3" class="mdl-menu mdl-menu--bottom-left mdl-js-menu" >
											    <li class="mdl-menu__item" data-val="0">0</li>
								                <li class="mdl-menu__item" data-val="1">1</li>
								                <li class="mdl-menu__item" data-val="2">2</li>
								                <li class="mdl-menu__item" data-val="3">3</li>
								                <li class="mdl-menu__item" data-val="4">4</li>
								                <li class="mdl-menu__item" data-val="5">5</li>
								                <li class="mdl-menu__item" data-val="6">6</li>
								                <li class="mdl-menu__item" data-val="7">7</li>
								                <li class="mdl-menu__item" data-val="8">8</li>
												<li class="mdl-menu__item" data-val="9">9</li>
								                <li class="mdl-menu__item" data-val="10">10</li>
								            </ul>
								        </div>
						           	</div>
									<div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="add_line1" class = "mdl-textfield__input" type = "text" value="<?php echo  $rows['add_line1'] ?>" id = "add1">
					                     <label class = "mdl-textfield__label" >Adresse 1</label>
					                  </div>
						            </div>
									<div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="add_line2" class = "mdl-textfield__input" type = "text" value="<?php echo  $rows['add_line2'] ?>" id = "add2">
					                     <label class = "mdl-textfield__label" >Adresse 2</label>
					                  </div>
						            </div>
									<div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="state" class = "mdl-textfield__input" type = "text" value="<?php echo  $rows['state'] ?>" id = "state">
					                     <label class = "mdl-textfield__label" >State</label>
					                  </div>
						            </div>
									<div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="postcode" class = "mdl-textfield__input" type = "text" value="<?php echo  $rows['postcode'] ?>" id = "postcode">
					                     <label class = "mdl-textfield__label" > Postcode</label>
					                  </div>
						            </div>
									<div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="country" class = "mdl-textfield__input" type = "text" value="<?php echo  $rows['country'] ?>" id = "country">
					                     <label class = "mdl-textfield__label" >Country</label>
					                  </div>
						            </div>
									<div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input class = "mdl-textfield__input" type = "text" value="<?php echo  $rows['booking_date'] ?>" id = "bdate"  disabled="disabled">
					                     <label class = "mdl-textfield__label" >Booking Date</label>
					                  </div>
						            </div>
									<div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input class = "mdl-textfield__input" type = "text" value="<?php echo  $rows['total_amount'] ?>" id = "tamount">
					                     <label class = "mdl-textfield__label" >Total Amount</label>
					                  </div>
						            </div>
									<div class="col-lg-6 p-t-20"> 
						                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
								            <input name="paymentstatus" class="mdl-textfield__input" type="text" id="list4" value="<?php echo  $rows['payment_status'] ?>" readonly tabIndex="-1">
								            <label for="list4" class="pull-right margin-0">
								                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
								            </label>
								            <label for="list4" class="mdl-textfield__label">Payment Status</label>
								            <ul data-mdl-for="list4" class="mdl-menu mdl-menu--bottom-left mdl-js-menu" name="paymentstatus">
												
											    <li class="mdl-menu__item" value="confirmed">confirmed</li>
								                <li class="mdl-menu__item" value="pending">pending</li>
								             
								            </ul>
								        </div>
						           	</div>
									<div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="req" class = "mdl-textfield__input" type = "text" value="<?php echo  $rows['special_requirement'] ?>" id = "req">
					                     <label class = "mdl-textfield__label" >More Requirements</label>
					                  </div>
						            </div>

	
                             
							         <div class="col-lg-12 p-t-20 text-center"> 
						              	<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
										<button type="reset" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
						            </div>
								</div>
								<?php } } ?>
                                </form>
							</div>
						</div>
					</div> 
                </div>
            </div>
            <!-- end page content -->
			<?php include "includes/footer.php" ; ?>