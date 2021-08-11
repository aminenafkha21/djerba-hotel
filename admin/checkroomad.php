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
header("location:index.php");
}
$msg="";

if(isset($_POST["checkin"]) && !empty($_POST["checkin"]) && isset($_POST["checkout"]) && !empty($_POST["checkout"])){
	$_SESSION['checkin_date'] = date('d-m-y', strtotime($_POST['checkin'])); 
	$_SESSION['checkout_date'] = date('d-m-y', strtotime($_POST['checkout']));
	$_SESSION['checkin_db'] = date('y-m-d', strtotime($_POST['checkin'])); 
	$_SESSION['checkout_db'] = date('y-m-d', strtotime($_POST['checkout']));
	$_SESSION['datetime1'] = new DateTime($_SESSION['checkin_db']);
	$_SESSION['datetime2'] = new DateTime($_SESSION['checkout_db']);
	$_SESSION['checkin_unformat'] = $_POST["checkin"]; 
	$_SESSION['checkout_unformat'] = $_POST["checkout"];

    $diff = abs(strtotime($_SESSION['checkout_unformat']) - strtotime($_SESSION['checkin_unformat']));

																			
	$_SESSION['total_night']  =ceil(abs($diff / 86400)) ;



            if(isset( $_POST["totaladults"] ) ){
            $_SESSION['adults'] = $_POST["totaladults"];
            }

            if(isset( $_POST["totalchildrens"] ) ){
            $_SESSION['childrens'] = $_POST["totalchildrens"];
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
                                <div class="page-title">Add Room Booking</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="">Booking</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Add Booking</li>
                            </ol>
                        </div>
                    </div>
                    <form  name="myForm" action="insertbooking.php"  onsubmit="return validateForm()" method="post" > 

                     <div class="row">
						<div class="col-sm-12">
							<div class="card-box">
								<div class="card-head">
									<header>Add Room Booking</header>
									
								</div>
                                <div class="card-body row">
                                <div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input class = "mdl-textfield__input" type = "text" id = "date" value=" <?php echo $_SESSION['checkin_date'];?>" disabled="disabled">
					                     <label class = "mdl-textfield__label" >Arrive <sup class="text-danger">*Can't Edit this* </sup> </label>
					                  </div>
						            </div>
						            <div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input class = "mdl-textfield__input" type = "text" id = "date1" value="<?php echo $_SESSION['checkout_date'];?>" disabled="disabled">
					                     <label class = "mdl-textfield__label" >Depart  <sup class="text-danger">*Can't Edit this* </sup> </label>
					                  </div>
						            </div>
                                    <div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input class = "mdl-textfield__input" type = "text" id = "nights" value="<?php echo  $_SESSION['total_night']; $_SESSION['total_night']=""?>" disabled="disabled">
					                     <label class = "mdl-textfield__label" >Night Stay(s)  <sup class="text-danger">*Can't Edit this* </sup>  </label>
					                  </div>
						            </div>	
						             <div class="col-lg-6 p-t-20"> 
						              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
								            <input class="mdl-textfield__input" type="text" id="list2" value="<?php echo $_SESSION['adults'];?>" readonly tabIndex="-1" disabled="disabled">
								            <label for="list2" class="pull-right margin-0">
								                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
								            </label>
								            <label for="list2" class="mdl-textfield__label">No Of Adults <sup class="text-danger">*Can't Edit this* </sup> </label>
								            <ul data-mdl-for="list2" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
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
								            <input class="mdl-textfield__input" type="text" id="list2" value="<?php echo $_SESSION['childrens'];?>" readonly tabIndex="-1"  disabled="disabled">
								            <label for="list2" class="pull-right margin-0">
								                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
								            </label>
								            <label for="list2" class="mdl-textfield__label">No Of Children <sup class="text-danger">*Can't Edit this* </sup> </label>
								            <ul data-mdl-for="list2" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
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
                                       <div class="col-lg-12 p-t-20" > 
                                      <h4 > Choose Room <sup class='text-danger'>* </sup> </h4>

						            </div>
                                 
                                            <?php
                                                        include 'auth.php';
                                                        // check available room
                                                        $datestart =  date('y-m-d', strtotime($_SESSION['checkin_unformat']) );
                                                        $dateend =  date('y-m-d', strtotime($_SESSION['checkout_unformat']));
                                                        
                                                        $result = mysqli_query($dbhandle,"SELECT r.room_id, (r.total_room-br.total) as availableroom from room as r LEFT JOIN ( 
                                                        
                                                                                SELECT roombook.room_id, sum(roombook.totalroombook) as total from roombook where roombook.booking_id IN 
                                                                                    (
                                                                                        SELECT b.booking_id as bookingID from booking as b 
                                                                                        where 
                                                                                        (b.checkin_date between '".$datestart."' AND '".$dateend."') 
                                                                                        OR 
                                                                                        (b.checkout_date between '".$datestart."' AND '".$dateend."')
                                                                                        
                                                                                        
                                                                                    )
                                                                                
                                                                                group by roombook.room_id
                                                                                )
                                                                                as br
                                                            
                                                            ON r.room_id = br.room_id");
                                                             echo mysqli_error($dbhandle);
                                                            if(mysqli_num_rows($result) > 0){
                                                                
                                                                
                                                                        
                                                                while ($row = mysqli_fetch_array($result)) {
                                                            
                                                                            
                                                                    if($row['availableroom'] != null && $row['availableroom'] > 0  )
                                                                    {
                                                                        $sub_result = mysqli_query($dbhandle,"select room.* from room where room.room_id = ".$row['room_id']." ");
                                                                        
                                                                        if(mysqli_num_rows($sub_result) > 0)
                                                                        {
                                                                            $msg="valid";

                                                                            
                                                                            while($sub_row = mysqli_fetch_array($sub_result)){ ?>
                                                                                     <div class="col-lg-3 p-t-20"> 
                                                                                                                                                   <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                                                                                                                                    <div class="blogThumb">
                                                                                                                                                        <div class="thumb-center"><img class="img-responsive" style="height:150px" alt="user" src="<?php echo $sub_row['imgpath']?>"></div>
                                                                                                                                                        <div class="white-box">
                                                                                                                                                            <h3 class="m-t-20 m-b-20"><?php echo $sub_row['room_name'] ?></h3>
                                                                                                                                                            <p><?php echo $row['availableroom'] ?> Rooms available  </p>
                                                                                                                                                            <select class="btn btn-dark btn-rounded waves-effect waves-light m-t-20" id="select" name="qtyroom<?php echo $sub_row['room_id'] ?>">
                                                                                                                                                                <option value="0" > 0</option><?php
                                                                                                                                                            $i = 1;
                                                                                                                                                            while($i <= $row['availableroom'])
                                                                                                                                                                   { ?>
                                                                                                                                                              <option value="<?php echo $i ?>" > <?php echo $i ?> </option>;	
                                                                                                                                                              <?php
                                                                                                                                                                $i = $i+1;
                                                                                                                                                                }
                                                                                                                                                                ?>
                                                                                                                                                            </select>
                                                                                                                                                        </div>

    
                                                                                                                                                        <div class="col-lg-6 p-t-20" style="display:none"> 
                                                                                                                                                                    <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                                                                                                                                                        <input name="selectedroom<?php  echo $sub_row['room_id']?>" class = "mdl-textfield__input" type = "hidden" id="selectedroom<?php  echo $sub_row['room_id']?> " value="<?php  echo $sub_row['room_id']?>" >
                                                                                                                                                                        <label class = "mdl-textfield__label" > selected  </label>
                                                                                                                                                                        <span class = "mdl-textfield__error">   !</span>
                                                                                                                                                                    </div>
                                                                                                                                                         </div>
                                                                                                                                                         <div class="col-lg-6 p-t-20" style="display:none"> 
                                                                                                                                                                    <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                                                                                                                                                        <input name="room_name<?php  echo $sub_row['room_id']?>" id="room_name<?php  echo $sub_row['room_id']?> " value="<?php echo $sub_row['room_name']?>"  class = "mdl-textfield__input" type = "hidden" >
                                                                                                                                                                        <label class = "mdl-textfield__label" > name </label>
                                                                                                                                                                        <span class = "mdl-textfield__error">   !</span>
                                                                                                                                                                    </div>
                                                                                                                                                         </div>
                                                                                                                                                    </div>
                                                                                                                                                   </div>
                                                                                                                                                </div>                    

                                                                              <?php
                                                                            }
                                                                        }
                                                                     
                                                                    }
                                                                    elseif($row['availableroom'] == null  ){
 
                                                                        $sub_result2 = mysqli_query($dbhandle,"select room.* from room where room.room_id = ".$row['room_id']." ");
                                                                        
                                                                        if(mysqli_num_rows($sub_result2) > 0)
                                                                        {
                                                                            $msg="valid";

                                                                            
                                                                            while($sub_row2= mysqli_fetch_array($sub_result2)){  ?>
                                                                                                                                               <div class="col-lg-3 p-t-20"> 
                                                                                                                                                   <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                                                                                                                                    <div class="blogThumb">
                                                                                                                                                        <div class="thumb-center"><img class="img-responsive" style="height:150px" alt="user" src="<?php echo $sub_row2['imgpath']?>"></div>
                                                                                                                                                        <div class="white-box">
                                                                                                                                                            <h3 class="m-t-20 m-b-20"><?php echo $sub_row2['room_name'] ?></h3>
                                                                                                                                                            <p><?php echo $sub_row2['total_room'] ?> Rooms available  </p>
                                                                                                                                                            
                                                                                                                                                            <select class="btn btn-dark btn-rounded waves-effect waves-light m-t-20" id="select" name="qtyroom<?php echo $sub_row2['room_id'] ?>">
                                                                                                                                                                <option value="0" > 0</option><?php
                                                                                                                                                            $i = 1;
                                                                                                                                                            while($i <= $sub_row2['total_room'])
                                                                                                                                                                   { ?>
                                                                                                                                                              <option value="<?php echo $i ?>" > <?php echo $i ?> </option>;	
                                                                                                                                                              <?php
                                                                                                                                                                $i = $i+1;
                                                                                                                                                                }
                                                                                                                                                                ?>
                                                                                                                                                            </select>
                                                                                                                                                        </div>
                                                                                                                                                        
                                                                                                                                                       
                                                                                                                                                 
                                                                                                                                                       
                                                                                                                                                        <div class="col-lg-6 p-t-20" style="display:none"> 
                                                                                                                                                                    <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                                                                                                                                                        <input name="selectedroom<?php  echo $sub_row2['room_id']?>" class = "mdl-textfield__input" type = "hidden" id="selectedroom<?php  echo $sub_row2['room_id']?> " value="<?php  echo $sub_row2['room_id']?>" >
                                                                                                                                                                        <label class = "mdl-textfield__label" > selected  </label>
                                                                                                                                                                        <span class = "mdl-textfield__error">   !</span>
                                                                                                                                                                    </div>
                                                                                                                                                         </div>
                                                                                                                                                         <div class="col-lg-6 p-t-20" style="display:none"> 
                                                                                                                                                                    <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                                                                                                                                                        <input name="room_name<?php  echo $sub_row2['room_id']?>"   id="room_name<?php  echo $sub_row2['room_id']?> " value="<?php  echo $sub_row2['room_name']?>"  >
                                                                                                                                                                        <label class = "mdl-textfield__label" > name </label>
                                                                                                                                                                        <span class = "mdl-textfield__error">   !</span>
                                                                                                                                                                    </div>
                                                                                                                                                         </div>
                                                                                                                                                </div>   
                                                                                                                                                </div>
                                                                                                                                                    
                                                                                                                                                    </div>
                                                                                                                                                
                                                                                                                                                                                                                             <?php
                                                                            }

                                                                            
                                                                        }
                                                                    }
                                                                   
                                                                
                                                                
                                                                }
                                                     
                    




                                                                                 
                                                            }  
                                                           

    
                                                       ?>
                                      <div class="col-lg-12 p-t-20" > 
                                      <p id="demo2"> </p>

						            </div>
						            <div class="col-lg-6 p-t-20" > 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="firstname" class = "mdl-textfield__input" type = "text" id = "txtFirstName"  <?php if($msg!= "valid") echo "disabled"  ?> >
					                     <label class = "mdl-textfield__label">First Name <?php if($msg!="valid") echo " <sup class='text-danger'>*Can/'t Edit this* </sup> " ; else echo "<sup class='text-danger  '  > * </sup>"; ?> </label>
					                  </div>
						            </div>
						            <div class="col-lg-6 p-t-20" > 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="lastname" class = "mdl-textfield__input" type = "text" id = "txtLasttName"  <?php if($msg!= "valid") echo "disabled"  ?>>
					                     <label class = "mdl-textfield__label" >Last Name <?php if($msg!="valid") echo " <sup class='text-danger'>*Can/'t Edit this* </sup> " ; else echo "<sup class='text-danger  '  > * </sup>";?> </label>
					                  </div>
						            </div>
						             <div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="email" class = "mdl-textfield__input" type = "email" id = "txtemail"  <?php if($msg!= "valid") echo "disabled"  ?> >
					                     <label class = "mdl-textfield__label" >Email <?php if($msg!="valid") echo " <sup class='text-danger'>*Can/'t Edit this* </sup> " ; else echo "<sup class='text-danger  '  > * </sup>";?> </label>
					                      <span class = "mdl-textfield__error">Enter Valid Email Address!</span>

					                  </div>
						            </div>
						         
									<div class="col-lg-6 p-t-20">
						               <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="phone" class = "mdl-textfield__input" type = "text" 
					                        pattern = "-?[0-9]*(\.[0-9]+)?" id = "mobile"  <?php if($msg!= "valid") echo "disabled"  ?>> 
					                     <label class = "mdl-textfield__label" for = "mobile">Mobile Number <?php if($msg!="valid") echo " <sup class='text-danger'>*Can/'t Edit this* </sup> " ; else echo "<sup class='text-danger  '  > * </sup>"; ?> </label>
					                     <span class = "mdl-textfield__error">Number required!</span>
					                  </div>
						            </div>
						            <div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="country" class = "mdl-textfield__input" type = "text" id = "txtcountry"  <?php if($msg!= "valid") echo "disabled"  ?>>
					                     <label class = "mdl-textfield__label" >Country <?php if($msg!="valid") echo " <sup class='text-danger'>*Can/'t Edit this* </sup> " ; else echo "<sup class='text-danger  '  > * </sup>"; ?> </label>
					                  </div>
						            </div>
						            <div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="state" class = "mdl-textfield__input" type = "text" id = "txtstate"  <?php if($msg!= "valid") echo "disabled"  ?>>
					                     <label class = "mdl-textfield__label" >State <?php if($msg!="valid") echo " <sup class='text-danger'>*Can/'t Edit this* </sup> " ; else echo "<sup class='text-danger  '  > * </sup>"; ?> </label>
					                  </div>
						            </div>	
									<div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="city" class = "mdl-textfield__input" type = "text" id = "txtcity"  <?php if($msg!= "valid") echo "disabled"  ?>>
					                     <label class = "mdl-textfield__label" >City <?php if($msg!="valid") echo " <sup class='text-danger'>*Can/'t Edit this* </sup> " ; else echo "<sup class='text-danger  '  > * </sup>"; ?> </label>
					                  </div>
						            </div>						            
									<div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="postcode" class = "mdl-textfield__input" type = "text" id = "pcode"  <?php if($msg!= "valid") echo "disabled"  ?>>
					                     <label class = "mdl-textfield__label" >Post code <?php if($msg!="valid") echo " <sup class='text-danger'>*Can/'t Edit this* </sup> " ; else echo "<sup class='text-danger  '  > * </sup>"; ?> </label>
					                  </div>
						            </div>
                                    <div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="addressline1" class = "mdl-textfield__input" type = "text" id = "add1"  <?php if($msg!= "valid") echo "disabled"  ?>>
					                     <label class = "mdl-textfield__label" >Adr Line 1 <?php if($msg!="valid") echo " <sup class='text-danger'>*Can/'t Edit this* </sup> " ; else echo "<sup class='text-danger  '  > * </sup>";?> </label>
					                  </div>
						            </div>
                                    <div class="col-lg-6 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="addressline2" class = "mdl-textfield__input" type = "text" id = "add2" <?php if($msg!= "valid") echo "disabled"  ?>>
					                     <label class = "mdl-textfield__label" >Adr Line 2 <?php if($msg!="valid") echo " <sup class='text-danger'>*Can/'t Edit this* </sup> " ?> </label>
					                  </div>
						            </div>	
                                    <div class="col-lg-12 p-t-20"> 
						              <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					                     <input name="specialrequirements" class = "mdl-textfield__input" type = "text" id = "spec" <?php if($msg!= "valid") echo "disabled"  ?>>
					                     <label class = "mdl-textfield__label" > special requirements <?php if($msg!="valid") echo " <sup class='text-danger'>*Can/'t Edit this* </sup> " ?> </label>
					                  </div>
						            </div>	
                                    <div class="col-lg-12 p-t-20" > 
                                      <p id="demo" class="text-center"> </p>

						            </div>
                                    	<?php							
                                            if($msg!= "valid")   { 

                                        ?>



                                        <div class="col-lg-12 p-t-20 text-center"> 
                                        <div class="alert alert-danger" > No Rooms available</div>
                                        <a href="checkavab.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Back</a>
                                        </div>
                                        <?php } else  {
                                        ?>
						    
							         <div class="col-lg-12 p-t-20 text-center"> 
						              	<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
										<button type="reset" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
						            </div>
                                    <?php  }?>
                               
								</div>
							</div>
                     </form>
						</div>
					</div> 
                </div>
            </div>
            <!-- end page content -->
            <script>
              function validateForm() {
                var elms = document.querySelectorAll("[id='select']");
                nb=0;
                for(var i = 0; i < elms.length; i++) 
                {
                    nb=nb+elms[i].value ;
                }
                if(  document.getElementById('txtFirstName').value == "" || document.getElementById('txtLasttName').value== "" || document.getElementById('txtemail').value == ""  || document.getElementById('mobile').value == "" ||  document.getElementById('txtcountry').value == ""  || document.getElementById('txtstate').value == "" || document.getElementById('txtcity').value == "" ||  document.getElementById('pcode').value == "" ||  document.getElementById('add1').value == ""  || nb == 0) {
                    text="Please fill in all the fields marked with a *." ;
                    p=document.getElementById('demo') ;
                    p.innerHTML=text;
                    p.setAttribute("class", "alert alert-danger text-center ");
                    

                    return false ;
                }else {
                    return true ;


                }

                }
                

               

                </script>
			<?php
 include "includes/footer.php" ;

?>
<?php  
} else {
    header('location:checkavab.php') ;

}


?>