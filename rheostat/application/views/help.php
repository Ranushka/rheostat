<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/logo'); ?>
<div class="container">
    
    <nav class="navigateContainer row-fluid">
	        <div class="span6">
		        <?php if(!$this->session->userdata('loginStatus')){ echo '<a class="navigate" href="'. base_url() .'index.php/user/login"><span>Login</span></a>';} ?>
				<?php if($this->session->userdata('loginStatus')){ echo '<a class="navigate" href="home"><span>Home</span></a>';} ?>
				<a class="navigate" href="<?php echo base_url();?>index.php/categories"><span>Search</span></a>
				<a class="navigate tabTopActive" href="<?php echo base_url();?>index.php/help"><span>Help</span></a>
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
    <!--<h4><a href="<?php echo base_url();?>userguide/OSM_eLibrary Manual_Beta Version.pdf" target="_blank">OpenLib User Guide</a></h4>   -->
    <a name="linktotop"></a>
    <ol>
    	<h4><li class="mainTopic">Introduction</li></h4>
    		<ul>
    			<li><a href="#Introduction">Introduction to OpenLib</a></li>
    			<li><a href="#Login">Login to the System</a></li>
    				<ol>
    					<li><a href="#memberLogin">Member Login</a></li>
    				</ol>
    			<li><a href="#uiInteraction" >User Interface Interactivity</a></li>
    				<ol>
    					<li><a href="#changePassword" >How to "Change the Passowrd" of a user</a></li>
    					<!--<li><a href="#uploadProfilePicture" >How to "Upload a Picture" for a member profile</a></li>-->
    					<li><a href="#editMemberProfile" >How to "Edit" a member profile</a></li>
    				</ol>    			
    		</ul>
    	<h4><li class="mainTopic">User</li></h4>
    		<ul>
    			<li><a href="#searchContent">Search for Content</a></li>
    				<ol>
    					<li><a href="#filterContenttype">Filter Search by Content Type</a></li>
    					<li><a href="#filterContentcategory">Filter Search by Content Category</a></li>
    					<li><a href="#searchContent">How to Search Content</a></li>
    					<li><a href="#searchGooglebooks">How to Search Google Books</a></li>
    				</ol>
    			<li><a href="#reservation">Reservation</a></li>
    				<ol>
    					<li><a href="#reserveBooks">Reserve Book</a></li>
    					<li><a href="#listAllcontents">List All Contents</a></li>    					
    				</ol>
    		</ul>    	
    </ol>

    <h3><a name="Introduction">Introduction to OpenLib</a></h3>
 	<p>"OpenLib" is a pioneering web-based Library Management System, the web which is 
 	designed as an information space, with the goal that it should be more effective for the 
 	users. The system which facilitates the user with the tremendous information sources 
 	along with unlimited resources, in a superior manner.</p>
 	
 	<p>This provides more textures by utilizing the remarkable library management system. 
 	"OpenLib" facilitates the users with diverse e-book services, even it permit to provide 
 	the integrated library management approach, which dramatically increases the book 
 	borrowing/lending rates with effective manner.</p>
 	
 	<p>The administrator is a sanctioned person who handles the system settings and ongoing 
 	processes. The administrator also has the capability to generate the process periodically, 
 	which consists of daily, weekly, monthly and yearly reports throughout the system.</p> 
 	
 	<p>The system fundamentally handles the lending and borrowing process of books, 
 	magazines, newspapers, CD/DVD of the library. The librarian will handle all the ongoing 
 	processes of the integrated web-based system. Furthermore the system will facilitate 
 	the members to search for a necessary e-book, by effectively utilizing the book 
 	title/author/ISBN/category etc. Permit the Users to download the requisite e-book 
 	throughout the available link.</p>
 	
 	<p>Motorized by a MySQL database, "OpenLib" presents technological compensations, for 
 	instance Object Oriented Design Methodologies, and the architecture is Module View 
 	Controller (MVC), which is congregated throughout the Global Hosted Solution.</p> 
 	
 	<p>The system has the potential to fabricate valuable and timely information at Individual 
 	User Intensity. Consequently, "OpenLib" library management system facilitates diverse 
 	users, to accumulate their precious time by utilizing the system.</p>
 	<a href="#linktotop">Back To Top</a>

	<h3><a name="Login">Login to the system </a></h3> 	
 	<p>There are two types of users of this system. They are member, and administrator. Both 
 	types of users have the same login screen. A user can login to the site through the 
 	following screen. All these fields mentioned below are mandatory when logging in to the 
 	system. Each of these will be validated by the system before logging in a user.</p>
 	<ul>
 		<li>User Name</li>
 		<li>Password</li>
 	</ul>
 	
 	<p>To login to the system the user should enter the user ID and the Password given by the 
 	System Administrator in the appropriate fields and click the "Submit" button. By default 
 	the "Remember" checkbox will be checked. Please note that the password is case 
 	sensitive.</p>
 	
 	<br/>
 	<img src="<?php echo base_url(); ?>img/helpImages/login.png" alt="login view">
	<br/><br/>

 	<p>The system validates the User Name and Password fields. If invalid data is entered, the 
 	screen will refresh and the fields will be reset.<p/>
 	
 	<p>Once a member logs into the site, the member profile will be displayed. This will be 
 	described under <a href="#memberLogin">Member Login</a> of the user manual.<p/>
 	
 	<p>If the user forgets the password, the "Forgot Password" link can be used. The following 
 	screen will be displayed once the above link is selected.<p/>
 	
 	<br/>
	<img src="<?php echo base_url(); ?>img/helpImages/forgetPassword.png" alt="forget password view">
	<br/>

	<p>The user has to enter your email address in the field given, and click the "Forgot 
 	Password" button to proceed.</p>
 	
 	<!--<p style="color:red">Email sent message is not displayed.</p>-->
 	
 	<p>The email field is validated. If an incorrect email address is entered the following error 
 	message will be displayed.</p>

	<br/>
 	<img src="<?php echo base_url(); ?>img/helpImages/emailError.png" alt="email error message view" >
 	<br/>

 	<a href="#linktotop">Back To Top</a>

 	<h3><a name="memberLogin">Member Login</a></h3>

 	<p>When a member logs into the system, the following screen will be displayed. This is the 
 	member profile.</p>

 	<br/>
 	<img src="<?php echo base_url(); ?>img/helpImages/memberProfile.png" alt="member profile view">
 	<br/>

 	<p>The password can be reset by clicking on the "Reset Password" link. This is described 
 	under <a href="#changePassword">How to "Change the Passowrd" of a user</a> of the user manual. The user is allowed to edit his/her profile by clicking on the "Edit Profile" link. This is described under <a href="#editMemberProfile">How to "Edit" a member profile</a> of the user manual. The details of the books that have been reserved and books that are pending for administrator acceptance 
 	will be displayed as a list on the left side of the screen.</p>

 	<br/>
 	<img src="<?php echo base_url(); ?>img/helpImages/memberReservations.png" alt="member reservations view">
 	<br/><br/>

 	<p>The process of reserving books is described under <a href="#reserveBooks" >Reserve Book</a> of the user manual.</p>
 	<a href="#linktotop">Back To Top</a>

 	<h3><a name="uiInteraction">User Interface Interactivity</a></h3>
 	<h4><a name="changePassword">How to "Change the Passowrd" of a user</a></h4>

 	<p>A member is allowed to change the password through their profile. This can be 
 	performed by clicking on the "Reset Password" link in the member's profile.</p>
	
	<br/>
	<img src="<?php echo base_url(); ?>img/helpImages/resetPassword.png" alt="reset password view">
	<br/><br/>

	<p>When the "Reset Password" link is clicked, the following screen will be displayed.</p>

	<br/>
	<img src="<?php echo base_url(); ?>img/helpImages/resetView.png" alt="reset view">
	<br/>	<br/>

	<p>The following fields are mandatory in order to reset the password of the member profile.</p> 
 	<ul>
 		<li>Current Password</li>
 		<li>New Password</li>
 		<li>Confirm Password</li>
 	</ul>

 	<p>All fields are validated. If the current password is not entered, the following error 
 	message will be displayed.</p>

 	<br/>
 	<img src="<?php echo base_url(); ?>img/helpImages/errorPassword.png" alt="password error message view">
 	<br/>
 	<br/>

 	<p>If the current password is entered, and the new password is not entered, the following 
 	error message will be displayed.</p>

 	<br/>
	<img src="<?php echo base_url(); ?>img/helpImages/newPassword.png" alt="new password view">
	<br/>
	<br/>

	<p>If both the current password and the new password are entered, but the confirm 
 	password field is not completed; the following error message will be displayed.</p>

 	<br/>
	<img src="<?php echo base_url(); ?>img/helpImages/confirmPassword.png" alt="confirm password view"> 	
	<br/>
	<br/>

	<p>After completing all three fields, click the "Change Password" button to confirm to 
 	change the password. When the button is clicked, successful message will be displayed.</p>
 	
 	<p>To return to the "Profile" screen, click on the "Close" button or the "x" at the top right 
 	corner of the "Reset Your Password" screen.</p>
 	<a href="#linktotop">Back To Top</a>
	<!--<h4><a name="uploadProfilePicture">How to "Upload a Picture" for a member profile</a></h4>-->
 	
 	<!--<p style="color:red">No facility to upload profile picture for user profile.</p> 	-->

	<h4><a name="editMemberProfile">How to "Edit" a member profile</a></h4>
	<ol>
		<li>To edit the profile, click the "Edit Profile" link on the home page.</li>
		<br/>
		<img src="<?php echo base_url(); ?>img/helpImages/editMemberprofile.png" alt="edit profile view">
		<br/>
		<br/>
		<li>The following screen will be displayed when the link is clicked.</li>
		<br/>
		<img src="<?php echo base_url(); ?>img/helpImages/editUserprofileDetails.png" alt="edit user profile details view">
		<br/>
		<br/>
		<li>Click on the "Edit" link to proceed. The fields will be enabled as follows:</li>
		<br/>
		<img src="<?php echo base_url(); ?>img/helpImages/makeEditableprofile.png" alt="editable profile details view">
		<br/>
		<br/>
		<li>Change the necessary details and click on the "Save" button.</li>
		<li>The following message will be displayed when the record is saved.</li>
		<br/>
		<img src="<?php echo base_url(); ?>img/helpImages/successMessage.png" alt="success message view">
		<br/>		
	</ol>
	<a href="#linktotop">Back To Top</a>

	<h3><a name="searchContent">Search for Content</a></h3>
	<p>To search for content, the user needs to enter the relevant content in the search bar.</p>
		<br/>
		<img src="<?php echo base_url(); ?>img/helpImages/searchContent.png" alt="content search view">		
		<br/>

	<p>The search can be filtered by the Content Type or the Content Category. This can be 
 	obtained by clicking on the "<img src="<?php echo base_url(); ?>img/helpImages/filterIcon.png" alt="filter icon view">" icon. When the icon is clicked, the following will be 
 	displayed below the search bar.</p>	
 		<br/>				
		<img src="<?php echo base_url(); ?>img/helpImages/filterOptions.png" alt="filter options view">		
		<br/>
	<a href="#linktotop">Back To Top</a>

	<h4><a name="filterContenttype">Filter Search by Content Type</a></h4>
	<p>To filter the search by the Content Type, the user has to select at least one content 
 	type. When a content type is selected, a message will be displayed as displayed below.</p>
 		<br/>
		<img src="<?php echo base_url(); ?>img/helpImages/filterMessage.png" alt="filter message view">		
		<br/>
	<p>This message can be closed by clicking on the "x" sign, on the top right corner of the message box.</p>
	<a href="#linktotop">Back To Top</a>

	<h4><a name="filterContentcategory">Filter Search by Content Category</a></h4>
	<p>To filter the search by the Content Category, the user has to select a Content Category from the drop down list. This drop down list will be displayed as below.</p>
		<br/>
		<img src="<?php echo base_url(); ?>img/helpImages/category.png" alt="filter category view">		
		<br/>
	<a href="#linktotop">Back To Top</a>

	<h4><a name="searchContent">How to Search Content</a></h4>
	<p>The content can be searched by entering the Title of the Book, Author or ISBN number 
 	in the search bar. Note the auto-complete feature in action, which helps users enter 
 	their query and find related search terms with the same root letters quickly and 
 	automatically.</p>
		<br/>
		<img src="<?php echo base_url(); ?>img/helpImages/searchContentList.png" alt="search content view">		
		<br/>
		<br/>

	<p>The user can select a desired record from the list, or press the 'esc' button on the 
 	keyboard to obtain all the records starting with the entered letter. The list will be 
 	displayed as follows.</p>
		<br/>
		<img src="<?php echo base_url(); ?>img/helpImages/contentList.png" alt="content list view">		
		<br/>
	<a href="#linktotop">Back To Top</a>

	<h4><a name="searchGooglebooks">How to Search Google Books</a></h4>
	<p>Searching Google Books is similar to searching for content in the library. The search 
 	criterion has to be entered in the search bar as shown in the figure below.</p>
		<br/>
		<img src="<?php echo base_url(); ?>img/helpImages/searchGooglebooks.png" alt="google book list view">		
		<br/>
	<a href="#linktotop">Back To Top</a>

	<h3><a name="reservation">Reservation</a></h3>
	<h4><a name="reserveBooks">Reserve Book</a></h4>
	<p>After searching for the required book, the user can reserve the book by clicking on the "Reserve" button. The reservation needs to be accepted or cancelled by the administrator.</p>
 	
 	<p>When a book is reserved, the status of the reservation will be set to 'Pending'. Once the administrator accepts the reservation, the status will be set to 'Reserved'.Once a book has been searched and the reservation has been made, the following message will be displayed above the search bar.</p>
		<br/>
		<img src="<?php echo base_url(); ?>img/helpImages/reservationMessage.png" alt="reservation message view">		
		<br/>
		<br/>
	<p>The reservation will be displayed on the member's profile in a list as displayed below.</p>
		<br/>
		<img src="<?php echo base_url(); ?>img/helpImages/reservationList.png" alt="reservation list view">
		<br/>
		<br/>
	<a href="#linktotop">Back To Top</a>

	<h4><a name="listAllcontents">List All Contents</a></h4>
		<ol>
			<li>This screen will list all the books in the library. The user has the ability to reserve a book by clicking on the "Reserve" button at the end of the row.</li>
			<br/>
			<img src="<?php echo base_url(); ?>img/helpImages/contentallList.png" alt="list all contents view">		
			<br/>
			<br/>
			<li>The member can search for a relevant book through the search bar.</li>
			<li>The number of records displayed on the screen can be changed trough the "Records per Page" drop down list.</li>
		</ol>
	<a href="#linktotop">Back To Top</a>
    </div>
<?php $this->load->view("template/footer"); ?>