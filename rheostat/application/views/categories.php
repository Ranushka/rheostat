<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/logo'); ?>
	<div class="container">


		<nav class="navigateContainer row-fluid">
	        <div class="span6">
		        <?php if(!$this->session->userdata('loginStatus')){ echo '<a class="navigate" href="'. base_url() .'index.php/user/login"><span>Login</span></a>';} ?>
				<?php if($this->session->userdata('loginStatus')){ echo '<a class="navigate" href="home"><span>Home</span></a>';} ?>
				<a class="navigate tabTopActive" href="<?php echo base_url();?>index.php/categories"><span>Search</span></a>
				<a class="navigate" href="<?php echo base_url();?>index.php/help"><span>Help</span></a>
	    	</div>
	        <div class="span6" style="line-height: 42px;">
	            <span id="digital-clock" class="digital pull-right">
	                <em>
	                    <?php 
	                    // Return date/time info of a timestamp; then format the output
	                        $mydate=getdate(date("U"));
	                        echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
	                     ?>
	                </em>&nbsp;|&nbsp;
	              <em class="hour"></em>
	              <em class="min"></em>
	              <em class="sec"></em>
	              <em class="meridiem"></em>
	            </span>
	        </div>
	    </nav>
			<!-- This is notification unsuccess alert alert -->	
		<div class="alert alert-success hide MsagesForReservation">
			<a class="close" data-dismiss="alert">&times;</a>
			<span></span>
		</div>

			<div class="row-fluid">
				<form>
					<div class="tabbable tabs-top">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#1" data-toggle="tab" id="librarySearch"><b class="icon-list"></b>&nbsp;Find Events</a></li>
							<li><a href="#2" data-toggle="tab" id="googleBookSearch"><b class="icon-list"></b>&nbsp;Find Menus</a></li>
							<li><a href="#3" data-toggle="tab" id="listallcontents"><b class="icon-list"></b>&nbsp;Fine Halls</a></li>
							
						</ul>
						<div class="tab-content" style="min-height: 350px;">
							<div class="tab-pane active" id="1">
								<div class="control-group row-fluid" id="findContents">
									<div class="controls">
										<p>hello</p>
									</div>
								</div>


									

									

							</div>
							<div class="tab-pane" id="2">
							<div class="control-group row-fluid">
								<div class="controls">
									  
									<div class="searchResult"></div>						
								</div>	
							</div>
							</div>
							<div class="tab-pane" id="3">
                                <br>


                                <style type="text/css" media="screen">
                                   .userMakeReserveBook{
                                   	font-size: 11px;
                                   }
                                </style>
                                <table class="table table-hover table-bordered" id="OP_adimnContentDetails">
                                    <thead>
                                        <!-- Header of the Table -->
                                        <tr>
                                            <th class="contentID">ID</th>               
                                            <th style="width: 220px;display: block;padding-top: 30px;">Title</th>           
                                            <th>Author</th>         
                                            <th style="width: 220px;display: block;padding-top: 30px;">Publisher</th>
                                            <th>ISBN</th>       
                                            <th>Edition</th>        
                                            <!-- <th style="width: 320px;display: block;padding-top: 30px;">Description</th>      -->
                                            <th>Category</th>   
                                            <th>Status</th>
                                            <!-- <th>Fine Type</th>   -->
                                            <!-- <th>Comments</th>    -->
                                            <!-- <th>Book Mode</th>   -->
                                            <!-- <th>Book Price</th>  -->
                                            <th>Book Copies</th>                                        
                                            <!-- <th>Square Location</th> -->
                                            <th>Rack Location</th>              
                                            <!-- <th>Section Location</th>-->
                                            <!-- <th>Floor Location</th>  -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Content of the Table -->
                                    <?php if ((isset($eContents)) && ($eContents !== 0)) : foreach ($eContents->result() as $eContent): ?>
                                            <?php echo "<tr>"; ?>
                                            <?php echo "<td> <input class='contentId' type='hidden' value='". $eContent->Content_id."'>" . $eContent->Content_id . "<br><a href='#' class='userMakeReserveBook'>Reserve</a></td>"; ?>
                                                <?php echo "<td>" . $eContent->Content_title . "</td>"; ?>
                                                <?php echo "<td>" . $eContent->Content_author . "</td>"; ?>
                                                <?php echo "<td>" . $eContent->Content_publisher . "</td>"; ?>
                                                <?php echo "<td>" . $eContent->Content_ISBN . "</td>"; ?>
                                                <?php echo "<td>" . $eContent->Content_edition . "</td>"; ?>
                                                <!-- <?php echo "<td>" . $eContent->Content_description . "</td>"; ?> -->    
                                                <?php echo "<td>" . $eContent->Category_name . "</td>"; ?>
                                                <?php echo "<td>" . $eContent->Content_status . "</td>"; ?>
                                                <!-- <?php echo "<td>" . $eContent->Content_type . "</td>"; ?> -->
                                               <!--  <?php echo "<td>" . $eContent->Comments . "</td>"; ?> -->
                                                <!-- <?php echo "<td>" . $eContent->Content_mode . "</td>"; ?> -->
                                                <!-- <?php echo "<td>" . $eContent->Content_price . "</td>"; ?> -->
                                                <?php echo "<td>" . $eContent->Content_copies . "</td>"; ?>
                                               <!--  <?php echo "<td>" . $eContent->Square_name . "</td>"; ?> -->
                                                <?php echo "<td>" . $eContent->Rack_name . "</td>"; ?>
                                                <!-- <?php echo "<td>" . $eContent->Section_name . "</td>"; ?>   -->
                                                <!-- <?php echo "<td>" . $eContent->Floor_nam . "</td>"; ?> -->
                                            <?php endforeach; ?>
                                        <?php echo "</tr>"; ?>

                                        <?php else: ?>
                                            No records were returned.
                                        <?php endif; ?>

                                    </tbody>
                                </table>
                                                            
							</div><!-- <div class="tab-pane" id="3"> -->
						</div>
					</div>
				</form>
			</div><!-- <div class="row-fluid"> -->

 
	<!-- Find content OPENLIB -->
	<div class="alert alert-info hide" id="filtersForSearch">
		<a class="close" data-dismiss="alert">&times;</a>
		<strong>You Are Filtering Data By</strong>
		<div id="seterdFilters"></div>
		<div id="seterdFiltersCatagary"> 
		</div>
	</div><!-- <div class="alert alert-info hide" id="filtersForSearch"> -->

	<div class="row-fluid" id="filterSet" style="display:none; margin-top: 20px;">
	<form class="span4">
		<div class="control-group" style="padding-bottom: 10px;">
			<div class="btn-group">
				<label>Select Content Type</label>
				<button class="btn categoryPageFilterBook" id="filterBook" type="button"><i class="icon-book"></i>&nbsp;Book</button>
				<button class="btn categoryPageFilterVideo" id="filterVideo" type="button"><i class="icon-film"></i>&nbsp;Video</button>
				<button class="btn categoryPageFilterPdf" id="filterPdf" type="button"><i class="icon-folder-open"></i>&nbsp;PDF</button>
			</div>
		</div>

		<div class="control-group">
			<label>Select Content Catagary</label>

			<?php 
			$Category_id = array();
			$Category_id[''] = "-Please Select-";
			if(isset($contentcategories))
			{
				foreach ($contentcategories->result() as $key => $contentcategory)
				{

					$Category_id[$contentcategory->Category_id] = $contentcategory->Category_name;

				}

			}
			echo form_dropdown('Category_id"id="Category_id "class="categoryPageContentCategory', $Category_id);
			?>
		</div>
	</form>

       

	</div><!-- <div class="row-fluid"> -->
		




	<hr class="blue" style="margin-top: 0;">

</div> <!-- /container -->
		

<!-- footer loader -->
<?php $this->load->view("template/footer"); ?>


<!-- User Login-->
<div id="loginPopup" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="loginPopupModal" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="loginPopupModal">User Login</h3>
	</div>
	<div id="jobPostingPreviewContainer" class="modal-body">

	<style type="text/css" media="screen">
		label.error { float: none; color: #CC1C1C; padding-left: .5em; vertical-align: top; }

	</style>

	<?php 
		echo form_open('index.php/userAuthentication/userLogin',
	    $attributes = array('class' => 'form-horizontal', 'id' => 'OL_login'));
	?>
		<fieldset>
			<!-- validate errors vill display on this div -->
			<div class="error_box">
                <?php 
                    if (isset($errorMsg)){echo $errorMsg;}
                ?>
            </div>
			<div>
				<?php 
		            $OL_userName = array(
		                'type'        => 'text',
		                'name'        => 'OL_userName',
		                'id'          => 'OL_userName',
		                'maxlength'   => '100',
		                'autofocus'   => 'autofocus',
		                'placeholder' => 'User Name',
		                'class' 	  => 'required',
		                'style'		  => 'margin-bottom:10px;'
		              );
		              echo form_input($OL_userName);
		          ?>
			</div>
			<div>
				<?php 
		            $OL_userPassword = array(
		                'type'        => 'password',
		                'name'        => 'OL_userPassword',
		                'id'          => 'OL_userPassword',
		                'maxlength'   => '100',
		                'class' 	  => 'required',
		                'placeholder' => 'Password',
		                'style'		  => 'margin-bottom:10px;'
		              );
		              echo form_input($OL_userPassword);
		          ?>
			<label class="checkbox">
				<?php 
				$OL_remamberUser_password = array(
				    'name'        => 'OL_remamberUser_password',
				    'id'          => 'OL_remamberUser_password',
				    'value'       => 'accept',
				    'checked'     => TRUE,
				    );

				echo form_checkbox($OL_remamberUser_password);
				 ?> 
				 Remember
			</label>
			<button type="submit" class="btn btn-info">Submit</button>
		</fieldset>
	</form>

	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	</div>
</div>