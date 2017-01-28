<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <br><br><br>

  <div class="row">

    <div class="col-xs-12">

      <div class="header-style">
        <h1> Recent Community Announcement </h1>
      </div>

      <br>

      <div class="announcement-message">

        <h4> Righteous Indignation </h4><hr>
        <p> January 27, 2019 <p>

        <p> "On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment,
          so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through
          weakness of will, which is the same as saying through shrinking from toil and pain. <br><br>These cases are perfectly simple and easy to distinguish. In a free hour,
          when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain
          avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be
          repudiated and annoyances accepted. <br><br>The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure
          other greater pleasures, or else he endures pains to avoid worse pains." </p>

        <br>

        <a href="<?php echo site_url("user_announcements"); ?>"><button type="button" class="btn btn-custom">View More</button></a>

      </div>

      <br>

    </div>

    <div class="clearfix visible-md-block"></div>
    <div class="clearfix visible-sm-block"></div>

    <div class="col-xs-12 nopadding">

      <h4 class="activity-heading text-center"> User Activities <hr></h4>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 nopadding">

      <div class="activity-bar text-center">

        <h4> Tickets </h4><hr>

        <p> You have <?php echo $count; ?> active ticket<?php if($count > 1){ echo "s"; } else { echo ""; } ?>. To monitor this properly, go to the track tickets page by clicking the button below. </p>
        <br>
        <a href="<?php echo site_url("user_tracking/recent"); ?>"><button type="button" class="btn btn-custom-2">View More</button></a>

      </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 nopadding">

      <div class="activity-bar text-center">

        <h4> Monthly Dues </h4><hr>

        <p> You have <?php
            if(($this->session->userdata('arrears') >  0 && $this->session->userdata('monthly_dues') == 0)
            || ($this->session->userdata('arrears') > 0 && $this->session->userdata('monthly_dues') > 0 )
            || ($this->session->userdata('arrears') == 0 && $this->session->userdata('monthly_dues') > 0 ))
            {
              echo ($this->session->userdata('arrears') + $this->session->userdata('monthly_dues')) / ($rate->securityfee + $rate->assocfee);
            }
            else
            {
              echo "0";
            }  ?> unpaid dues. To proper monitor your outstanding dues and arrears, click the button below.</p>
        <br>
        <a href="<?php echo site_url("user_dues"); ?>"><button type="button" class="btn btn-custom-2">View More</button></a>

      </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 nopadding">

      <div class="activity-bar text-center">

        <h4> Reservation </h4><hr>

        <p> You have 1 active reservation. To check whether this has been approved or not, click the button below. </p>
        <br>
        <button type="button" class="btn btn-custom-2">View More</button>

      </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 nopadding">

      <div class="activity-bar text-center">

        <h4> Suggestions </h4><hr>

        <p> If you have suggestions within our community, feel free to leave us a message in the suggestions page. </p>
        <br>
        <a href="<?php echo site_url("user_suggestions"); ?>"><button type="button" class="btn btn-custom-2">View More</button></a>

      </div>

    </div>

  </div>

  <br>

</div>
