
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
                                <div class="page-title">All Rooms</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="">Rooms</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">All Rooms</li>
                            </ol>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>All Rooms</header>
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
                                                <a href="add_room.php" id="addRow" class="btn btn-info">
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
                                    <table class="table table-hover table-checkable  order-column full-width" id="example4">
                                        <thead>
                                            <tr>
                                            	<th class="center"> img </th>
                                                <th class="center"> # </th>
                                                <th class="center"> Name  </th>
                                                <th class="center"> Total Rooms </th>
                                                <th class="center"> Size </th>
                                                <th class="center">  View </th>
                                                <th class="center"> Occupancy </th>
                                                <th class="center"> Rate </th>

                                                <th class="center"> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        include 'auth.php';
                                                $result = mysqli_query($dbhandle,"select * from room");
                                                 if(mysqli_num_rows($result) > 0){
                                                    while ($row = mysqli_fetch_array($result) ){ ?>
											<tr class="odd gradeX"  > 
												<td class="user-circle-img">
														<img src="<?php echo $row['imgpath'] ?>" style="height:50px;width:50px;" alt="room">
												</td>
												<td class="center"><?php echo $row['room_id'] ?></td>
												<td class="center"><?php echo $row['room_name'] ?></td>
												<td class="center"><?php echo $row['total_room'] ?></td>
												<td class="center"> <?php echo $row['size'] ?></td>
												<td class="center"><?php echo $row['view'] ?></td>
												<td class="center"><?php echo $row['occupancy'] ?></td>
												<td class="center"><?php echo $row['rate'] ?></td>
												<td class="center">
													<a  class="btn btn-tbl-edit btn-xs"  href="<?php echo "edit_room.php?room=".$row['room_id'] ;  ?>">
														<i class="fa fa-pencil"></i>
													</a>
													<a class="btn btn-tbl-delete btn-xs" href="<?php echo "delete_room.php?room=".$row['room_id'] ;  ?>">
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