<?php $this->load->view('template/header'); ?>
<?php $this->load->view('template/logo'); ?>
<div class="container">
    
    <nav class="navigateContainer row-fluid">
	        <div class="span6">
		        <?php if(!$this->session->userdata('loginStatus')){ echo '<a class="navigate" href="'. base_url() .'index.php/user/login"><span>Login</span></a>';} ?>
				<?php if($this->session->userdata('loginStatus')){ echo '<a class="navigate" href="home"><span>Home</span></a>';} ?>
				<a class="navigate" href="<?php echo base_url();?>index.php/categories"><span>Search</span></a>
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
    <h3>About Us</h3>
	<p>The Chance Palace Story Begins from 15th of january 1999. It is a Big Effort of Mrs.Sirikumara. Firstly it was Small Reception Hall, After Few Years It has expanded to a New Building in the New Place which is located about3 km from the Nittambuwa - airport High way and 3.5 km from the Veyangoda town offers a perfect place to recuperate after a long flight being just 45 mins drive from the international airport.


The hotel been growing in popularity within a short period as a destination in its own right due to the state of the art construction and unmatched services. There is also a calm and quiet environment blessed with all the essence of rural environment which makes it an ideal place for a relax.

Not only as an accommodation venue, Unmatched features and services make it ideal for you to select for your most important day or any kind of party or get together.

Chairmen,
Mr.Bandula Sirikumara.</p>
    </div>
<?php $this->load->view("template/footer"); ?>