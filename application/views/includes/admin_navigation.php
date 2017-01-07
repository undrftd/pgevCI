     <div id="wrapper">
        <div id="sidebar-wrapper">
          <ul class="sidebar-nav text-center">
            <li>
                <a href="<?php echo site_url("admin_ticketing"); ?>" class="<?php if($this->uri->segment(1) == 'admin_ticketing') { echo 'active'; } ?>">Ticketing System</a>
            </li>
            <li class="sidebar-brand">
                <a href="admin-home.html">
                    Statistics
                </a>
            </li>
            <li>
                <a href="admin-announcement.html">Announcements</a>
            </li>
            <li>
                <a href="<?php echo site_url("admin_dues/homeowner"); ?>" class="<?php if($this->uri->segment(1)  == 'admin_dues') { echo 'active'; } ?>">Dues</a>
            </li>
            <li>
                <a href="admin-court.html">Reservation</a>
            </li>
            <li>
                <a href="admin-forms.html">Forms</a>
            </li>
            <li>
                <a href="<?php echo site_url("admin_accounts/homeowner"); ?>" class="<?php if($this->uri->segment(1) == 'admin_accounts') { echo 'active'; } ?>">Accounts</a>
            </li>
            <li>
                <a href="<?php echo site_url("admin_profile/");?>" class="<?php if($this->uri->segment(1) == 'admin_profile') { echo 'active'; } ?>"> Profile</a>
            </li>
            <li>
                <a href="<?php echo site_url("login/signout"); ?>">Sign Out</a>
            </li>
          </ul>
      </div>        