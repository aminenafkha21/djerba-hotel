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
                                <div class="page-title">All Bookings</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="">Booking</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">All Bookings</li>
                            </ol>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>All Bookings</header>
                                    <div class="tools">
                                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
	                                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
	                                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <div class="row p-b-20">
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <div class="btn-group">
                                                <a href="checkavab.php" id="addRow" class="btn btn-info">
                                                    Add New <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-6">
                                            <div class="btn-group pull-right">
                                                <a class="btn deepPink-bgcolor  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="fa fa-print"></i> Print </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
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
													include "auth.php" ;
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
																							<a  id="del" class="btn btn-tbl-delete btn-xs" href="<?php echo "delete_booking.php?booking=".$row['booking_id'] ;  ?>" >
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
            </div>
            <!-- end page content -->

			<?php include "includes/footer.php" ; ?>