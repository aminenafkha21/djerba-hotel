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
                                <div class="page-title">New Mail</div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="">Email</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Compose</li>
                            </ol>
                        </div>
                    </div>
                    <div class="inbox">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-topline-gray">
                                <div class="card-body no-padding height-9">
									<div class="row">
			                            <div class="col-md-3">
										<a href="email_compose.php" data-title="Compose" class="btn red compose-btn btn-block m-0">
			                                        <i class="fa fa-edit"></i> Compose </a>
			                            </div>
			                            <div class="col-md-9">
			                                <div class="inbox-body">
		                                    <div class="inbox-header">
		                                        <div class="mail-option">
		                                            <div class="btn-group margin-top-20 ">
		                                                <button class="btn btn-primary btn-sm margin-right-10"><i class="fa fa-check"></i> Send</button>
		                                            </div>
		                     
		                                        </div>
		                                    </div>
		                                    <div class="inbox-body no-pad">
		                                        <div class="mail-list">
		                                            <div class="compose-mail">
		                                                <form method="post" action="emailadmin.php">
		                                                    <div class="form-group">
		                                                        <label for="to" class="">To:</label>
		                                                        <input type="email" tabindex="1" id="to" name="to" class="form-control">
		                                                        <div class="compose-options">
		                                                            <a onclick="$(this).hide(); $('#cc').parent().removeClass('hidden'); $('#cc').focus();" href="javascript:;">Cc</a>
		                                                            <a onclick="$(this).hide(); $('#bcc').parent().removeClass('hidden'); $('#bcc').focus();" href="javascript:;">Bcc</a>
		                                                        </div>
		                                                    </div>
		                                                    <div class="form-group hidden">
		                                                        <label for="cc" class="">Cc:</label>
		                                                        <input type="text" tabindex="2" id="cc" class="form-control">
		                                                    </div>
		                                                    <div class="form-group hidden">
		                                                        <label for="bcc" class="">Bcc:</label>
		                                                        <input type="text" tabindex="2" id="bcc" class="form-control">
		                                                    </div>
		                                                    <div class="form-group">
		                                                        <label for="subject" class="">Subject:</label>
		                                                        <input type="text" tabindex="1" id="subject" class="form-control" name="subject">
		                                                    </div>
		                                                    <div class="compose-editor">
		                                                        <div id="summernote"></div>
		                                                        <input type="file" class="default" name="textadmin" multiple>
		                                                    </div>
		                                                    <div class="btn-group margin-top-20 ">
				                                                <button class="btn btn-primary btn-sm margin-right-10" type="submit"><i class="fa fa-check"></i> Send</button>
				                                            </div>
				                                            
		                                                </form>
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