     <div id="wrapper">
        <div id="sidebar-wrapper">
          <ul class="sidebar-nav text-center">
            <li>
                <a href="<?php echo site_url("admin_ticketing"); ?>" class="<?php if($this->uri->uri_string() == 'admin_ticketing') { echo 'active'; } ?>">Ticketing System</a>
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
                <a href="admin-dues.html">Dues</a>
            </li>
            <li>
                <a href="admin-court.html">Reservation</a>
            </li>
            <li>
                <a href="admin-forms.html">Forms</a>
            </li>
            <li>
                <a href="<?php echo site_url("admin_accounts/homeowner"); ?>" class="<?php if($this->uri->segment(2) == 'homeowner' OR $this->uri->segment(2) == 'administrator' OR $this->uri->segment(2) == 'deactivated' OR $this->uri->segment(2) == 'adduser' OR $this->uri->segment(2) == 'createuser' OR $this->uri->segment(2) == 'search_homeowner' OR $this->uri->segment(2) == 'search_admin' OR $this->uri->segment(2) == 'search_deact' OR $this->uri->segment(2) == 'viewmore_user' OR $this->uri->segment(2) == 'viewmore_admin'OR $this->uri->segment(2) == 'viewmore_deact' OR $this->uri->segment(2) == 'acc_updateuser' OR $this->uri->segment(2) == 'acc_updateadmin' OR $this->uri->segment(2) == 'acc_updatedeact'  ) { echo 'active'; } ?>">Accounts</a>
            </li>
            <li>
                <a href="<?php echo site_url("admin_profile/");?>" class="<?php if($this->uri->uri_string() == 'admin_profile') { echo 'active'; } ?>"> Profile</a>
            </li>
            <li>
                <a href="<?php echo site_url("login/signout"); ?>">Sign Out</a>
            </li>
          </ul>
      </div>        