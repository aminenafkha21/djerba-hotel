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
			<script>

function more1()
		{
						document.getElementById('bookindetails').style.display='none';
						document.getElementById('bookinginfo0').style.display='block';
						document.getElementById('bookinginfo1').style.display='none';
						document.getElementById('bookinginfo2').style.display='none';
						
		}
function more2()
		{
						document.getElementById('bookindetails').style.display='none' ;
						document.getElementById('bookinginfo1').style.display='block';
						document.getElementById('bookinginfo0').style.display='none';
						document.getElementById('bookinginfo2').style.display='none';
						
		}
function more3()
		{
						document.getElementById('bookindetails').style.display='none';
						document.getElementById('bookinginfo2').style.display='block';
						document.getElementById('bookinginfo0').style.display='none';
						document.getElementById('bookinginfo1').style.display='none';
						
		}		


				</script>

			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Dashboard</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                   <!-- start widget -->
					<div class="state-overview">
						<div class="row">
						<?php
					include 'auth.php';
					$re = mysqli_query($dbhandle,"select count(booking_id) as total_row from booking WHERE DATEDIFF(NOW(), booking_date) <= 7;");
					if(mysqli_num_rows($re) > 0)
					{ 
						while($row = mysqli_fetch_array($re))
						{
						?>
												<div class="col-xl-3 col-md-6 col-12" >
												<div class="info-box bg-blue">
													<span class="info-box-icon push-bottom"><i class="material-icons">style</i></span>
													<div class="info-box-content">
													<span class="info-box-text">New Booking <br> in Last 7 days </span>
													<span class="info-box-number"><?php echo $row['total_row'] ?> </span>
													<br>
													<br>
													<div><a style="text-decoration:underline" onclick='more1();'> View detailes </a></div>
													
													</div>
													<!-- /.info-box-content -->
												</div>
												<!-- /.info-box -->
												</div>
												<?php } } ?>
											
												<!-- /.col -->
				<?php
					$re2 = mysqli_query($dbhandle,"select count(booking_id) as total_row from booking WHERE payment_status like 'pend%';");
					if(mysqli_num_rows($re2) > 0)
					{ 
						while($row2 = mysqli_fetch_array($re2))
						{
						?>
					        <div class="col-xl-3 col-md-6 col-12">
					          <div class="info-box bg-orange">
					            <span class="info-box-icon push-bottom"><i class="material-icons">card_travel</i></span>
					            <div class="info-box-content">
					              <span class="info-box-text">Booking with  <br> Pending Payment								</span>
					              <span class="info-box-number"><?php echo $row2['total_row']   ?></span>
								  <br>
								  <br>
								  <div> <a style="text-decoration:underline" onclick='more2();'> View detailes </a></div>
					              
					            </div>
					            <!-- /.info-box-content -->
					          </div>
					          <!-- /.info-box -->
					        </div>
							<?php } } ?>
			<?php
					$re3 = mysqli_query($dbhandle,"select count(booking_id) as total_row from booking WHERE payment_status like 'conf%';");
					if(mysqli_num_rows($re3) > 0)
					{ 
						while($row3 = mysqli_fetch_array($re3))
						{
						?> 
					        <!-- /.col -->
					        <div class="col-xl-3 col-md-6 col-12">
					          <div class="info-box bg-success">
					            <span class="info-box-icon push-bottom"><i class="material-icons">monetization_on</i></span>
					            <div class="info-box-content">
					              <span class="info-box-text">Paid <br> Booking			</span>
					              <span class="info-box-number"><?php  echo $row3['total_row']  ?></span>
								  <br>
								  <br>
								  <div> <a style="text-decoration:underline" onclick="more3();"> View detailes  </a></div>
					            </div>
					            <!-- /.info-box-content -->
					          </div>
					          <!-- /.info-box -->
					        </div>
							<?php } } ?>
					        <!-- /.col -->
					      </div>
						</div>
					<!-- end widget -->
          
                     <!-- start Payment Details -->
                    <div class="row" id="bookindetails" style="display:block;">
                        <div class="col-md-12 col-sm-12">
                            <div class="card  card-box">
                                <div class="card-head">
                                    <header>Booking Details</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
	                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
	                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body ">
                                  <div class="table-wrap">
										<div class="table-scrollable">
											<table class="table table-hover table-checkable order-column full-width" id="example4">
												<thead>
													<tr class="odd gradeX">
														<th>No</th>
														<th>Room</th>
														<th>Check In</th>
														<th>Check Out</th>
														<th>Status</th>
														<th>Guests</th>
														<th>N° Nights</th>
														<th>Total Amount</th>
														<th>Edit</th>
													</tr>
												</thead>
												<tbody id="bookinginfo" >
													<?php 
															$re = mysqli_query($dbhandle,"select booking.* from booking  ;");
															if(mysqli_num_rows($re) > 0){
																		while ($row = mysqli_fetch_array($re) ){ ?>

								                                                    <tr>
																						<td><?php echo  $row['booking_id']  ?></td>
																						<td><?php 
																							$q = mysqli_query($dbhandle,"SELECT roombook.totalroombook AS total, room.room_name AS namee
																							FROM roombook
																							LEFT JOIN room ON roombook.room_id = room.room_id
																							WHERE roombook.booking_id =".$row['booking_id'].";");
																									while($r = mysqli_fetch_array($q))
																														{
																														echo " ".$r['total']." ".$r['namee']." <br>\n";
																														}
																		
																						?></td>
																						<td><?php echo  $row['checkin_date']  ?></td>
																						<td><?php echo  $row['checkout_date']  ?></td>
																						<td>
																							<?php  
																							if ( $row['payment_status'] == 'pending') {
																								echo "<span class='label label-sm label-danger'>unpaid </span> <br> <a href='confirmpay.php?id=".$row['booking_id']."' > Paid ? </a> " ;
																							}
																							else {
																								echo "<span class='label label-sm label-success'>Paid </span> <br> <a href='unconfirmpay.php?id=".$row['booking_id']."' > Unpaid ? </a> " ;

																							}

																							?>
																						</td>
																						
																						<td>
																							<?php
																							echo "Adult:".$row['total_adult']."<br>Child:".$row['total_children'];
																							?>

																						</td>
																						<td> 
																							<?php 
																							
																								$diff = abs(strtotime($row['checkout_date']) - strtotime($row['checkin_date']));

																							
																								$days = ceil(abs($diff / 86400));
																							echo $days;

																							?>


																						</td>
																						<td><?php echo $row['total_amount']?>dt </td>
																						
																						<td>
																							<a href="<?php echo "edit_booking.php?booking=".$row['booking_id'] ;  ?>" class="btn btn-tbl-edit btn-xs">
																								<i class="fa fa-pencil"></i>
																							</a>
																							<a class="btn btn-tbl-delete btn-xs" href="<?php echo "delete_booking.php?booking=".$row['booking_id'] ;  ?>" >
																								<i class="fa fa-trash-o "></i>
																						</a>
																						</td>
																					</tr>
																					<?php } } ?>
												</tbody>
											</table>
										</div>
									</div>	
                                </div>
                            </div>
                        </div>
                    </div>



					<div class="row" id="bookinginfo0" style="display:none;">
                        <div class="col-md-12 col-sm-12">
                            <div class="card  card-box">
                                <div class="card-head">
                                    <header>New Booking in Last 7 days</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
	                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
	                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body ">
                                  <div class="table-wrap">
										<div class="table-responsive">
											<table class="table display product-overview mb-30" id="support_table5">
												<thead>
													<tr>
														<th>No</th>
														<th>Room</th>
														<th>Check In</th>
														<th>Check Out</th>
														<th>Status</th>
														<th>Guests</th>
														<th>N° Nights</th>
														<th>Total Amount</th>
														<th>Edit</th>
													</tr>
												</thead>
												<tbody id="info0" >
													<?php 
															$re = mysqli_query($dbhandle,"select booking.* from booking WHERE DATEDIFF(NOW(), booking_date) <= 7 ;");
															if(mysqli_num_rows($re) > 0){
																		while ($row = mysqli_fetch_array($re) ){ ?>

								                                                    <tr>
																						<td><?php echo  $row['booking_id']  ?></td>
																						<td><?php 
																							$q = mysqli_query($dbhandle,"SELECT roombook.totalroombook AS total, room.room_name AS namee
																							FROM roombook
																							LEFT JOIN room ON roombook.room_id = room.room_id
																							WHERE roombook.booking_id =".$row['booking_id'].";");
																									while($r = mysqli_fetch_array($q))
																														{
																														echo " ".$r['total']." ".$r['namee']." <br>\n";
																														}
																		
																						?></td>
																						<td><?php echo  $row['checkin_date']  ?></td>
																						<td><?php echo  $row['checkout_date']  ?></td>
																						<td>
																							<?php  
																							if ( $row['payment_status'] == 'pending') {
																								echo "<span class='label label-sm label-danger'>unpaid </span> <br> <a href='confirmpay.php?id=".$row['booking_id']."' > Paid ? </a> " ;
																							}
																							else {
																								echo "<span class='label label-sm label-success'>Paid </span> <br> <a href='unconfirmpay.php?id=".$row['booking_id']."' > Unpaid ? </a> " ;

																							}

																							?>
																						</td>
																						
																						<td>
																							<?php
																							echo "Adult:".$row['total_adult']."<br>Child:".$row['total_children'];
																							?>

																						</td>
																						<td> 
																							<?php 
																							
																								$diff = abs(strtotime($row['checkout_date']) - strtotime($row['checkin_date']));

																								$years = floor($diff / (365*60*60*24));
																								$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
																								$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
																							echo $days;

																							?>


																						</td>
																						<td><?php echo $row['total_amount']?>dt </td>
																						
																						<td>
																							<a href="<?php echo "edit_booking.php?booking=".$row['booking_id'] ;  ?>" class="btn btn-tbl-edit btn-xs">
																								<i class="fa fa-pencil"></i>
																							</a>
																							<a class="btn btn-tbl-delete btn-xs" href="<?php echo "delete_booking.php?booking=".$row['booking_id'] ;  ?>" >
																								<i class="fa fa-trash-o "></i>
																						</a>
																						</td>
																					</tr>
																					<?php } } ?>
												</tbody>
											</table>
										</div>
									</div>	
                                </div>
                            </div>
                        </div>
                    </div>




					<div class="row" id="bookinginfo1" style="display:none;">
                        <div class="col-md-12 col-sm-12">
                            <div class="card  card-box">
                                <div class="card-head">
                                    <header> Booking with Pending Payment </header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
	                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
	                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body ">
                                  <div class="table-wrap">
										<div class="table-responsive">
											<table class="table display product-overview mb-30" id="support_table5">
												<thead>
													<tr>
														<th>No</th>
														<th>Room</th>
														<th>Check In</th>
														<th>Check Out</th>
														<th>Status</th>
														<th>Guests</th>
														<th>N° Nights</th>
														<th>Total Amount</th>
														<th>Edit</th>
													</tr>
												</thead>
												<tbody id="info1" >
													<?php 
															$re = mysqli_query($dbhandle,"select * from booking WHERE payment_status like 'pend%';");
															if(mysqli_num_rows($re) > 0){
																		while ($row = mysqli_fetch_array($re) ){ ?>

								                                                    <tr>
																						<td><?php echo  $row['booking_id']  ?></td>
																						<td><?php 
																							$q = mysqli_query($dbhandle,"SELECT roombook.totalroombook AS total, room.room_name AS namee
																							FROM roombook
																							LEFT JOIN room ON roombook.room_id = room.room_id
																							WHERE roombook.booking_id =".$row['booking_id'].";");
																									while($r = mysqli_fetch_array($q))
																														{
																														echo " ".$r['total']." ".$r['namee']." <br>\n";
																														}
																		
																						?></td>
																						<td><?php echo  $row['checkin_date']  ?></td>
																						<td><?php echo  $row['checkout_date']  ?></td>
																						<td>
																							<?php  
																							if ( $row['payment_status'] == 'pending') {
																								echo "<span class='label label-sm label-danger'>unpaid </span> <br> <a href='confirmpay.php?id=".$row['booking_id']."' > Paid ? </a> " ;
																							}
																							else {
																								echo "<span class='label label-sm label-success'>Paid </span> <br> <a href='unconfirmpay.php?id=".$row['booking_id']."' > Unpaid ? </a> " ;

																							}

																							?>
																						</td>
																						
																						<td>
																							<?php
																							echo "Adult:".$row['total_adult']."<br>Child:".$row['total_children'];
																							?>

																						</td>
																						<td> 
																							<?php 
																							
																								$diff = abs(strtotime($row['checkout_date']) - strtotime($row['checkin_date']));

																								$years = floor($diff / (365*60*60*24));
																								$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
																								$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
																							echo $days;

																							?>


																						</td>
																						<td><?php echo $row['total_amount']?>dt </td>
																						
																						<td>
																							<a href="<?php echo "edit_booking.php?booking=".$row['booking_id'] ;  ?>" class="btn btn-tbl-edit btn-xs">
																								<i class="fa fa-pencil"></i>
																							</a>
																							<a class="btn btn-tbl-delete btn-xs" href="<?php echo "delete_booking.php?booking=".$row['booking_id'] ;  ?>" >
																								<i class="fa fa-trash-o "></i>
																						</a>
																						</td>
																					</tr>
																					<?php } } ?>
												</tbody>
											</table>
										</div>
									</div>	
                                </div>
                            </div>
                        </div>
                    </div>


					<div class="row" id="bookinginfo2" style="display:none;">
                        <div class="col-md-12 col-sm-12">
                            <div class="card  card-box">
                                <div class="card-head">
                                    <header> Paid Booking</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
	                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
	                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body ">
                                  <div class="table-wrap">
										<div class="table-responsive">
											<table class="table display product-overview mb-30" id="support_table5">
												<thead>
													<tr>
														<th>No</th>
														<th>Room</th>
														<th>Check In</th>
														<th>Check Out</th>
														<th>Status</th>
														<th>Guests</th>
														<th>N° Nights</th>
														<th>Total Amount</th>
														<th>Edit</th>
													</tr>
												</thead>
												<tbody id="info2" >
													<?php 
														$re = mysqli_query($dbhandle,"select * from booking WHERE payment_status like 'conf%';");
														if(mysqli_num_rows($re) > 0){
																		while ($row = mysqli_fetch_array($re) ){ ?>

								                                                    <tr>
																						<td><?php echo  $row['booking_id']  ?></td>
																						<td><?php 
																							$q = mysqli_query($dbhandle,"SELECT roombook.totalroombook AS total, room.room_name AS namee
																							FROM roombook
																							LEFT JOIN room ON roombook.room_id = room.room_id
																							WHERE roombook.booking_id =".$row['booking_id'].";");
																									while($r = mysqli_fetch_array($q))
																														{
																														echo " ".$r['total']." ".$r['namee']." <br>\n";
																														}
																		
																						?></td>
																						<td><?php echo  $row['checkin_date']  ?></td>
																						<td><?php echo  $row['checkout_date']  ?></td>
																						<td>
																							<?php  
																							if ( $row['payment_status'] == 'pending') {
																								echo "<span class='label label-sm label-danger'>unpaid </span> <br> <a href='confirmpay.php?id=".$row['booking_id']."' > Paid ? </a> " ;
																							}
																							else {
																								echo "<span class='label label-sm label-success'>Paid </span> <br> <a href='unconfirmpay.php?id=".$row['booking_id']."' > Unpaid ? </a> " ;

																							}

																							?>
																						</td>
																						
																						<td>
																							<?php
																							echo "Adult:".$row['total_adult']."<br>Child:".$row['total_children'];
																							?>

																						</td>
																						<td> 
																							<?php 
																							
																								$diff = abs(strtotime($row['checkout_date']) - strtotime($row['checkin_date']));

																								$years = floor($diff / (365*60*60*24));
																								$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
																								$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
																							echo $days;

																							?>


																						</td>
																						<td><?php echo $row['total_amount']?>dt </td>
																						
																						<td>
																							<a href="<?php echo "edit_booking.php?booking=".$row['booking_id'] ;  ?>" class="btn btn-tbl-edit btn-xs">
																								<i class="fa fa-pencil"></i>
																							</a>
																							<a class="btn btn-tbl-delete btn-xs" href="<?php echo "delete_booking.php?booking=".$row['booking_id'] ;  ?>" >
																								<i class="fa fa-trash-o "></i>
																						</a>
																						</td>
																					</tr>
																					<?php } } ?>
												</tbody>
											</table>
										</div>
									</div>	
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end Payment Details -->
              
                </div>
            </div>
            <!-- end page content -->

 <?php include "includes/footer.php" ; ?>