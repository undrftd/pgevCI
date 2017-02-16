<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <br><br><br>

  <div class="admin-statistics">

    <div class="header-style">
      <h1> Audit Trail </h1>
    </div>

  <br>

  <a href="<?php echo site_url();?>admin_export/exportdata"><button type="button" class="btn btn-custom-1">Export to Excel</button></a>

  <br><br>

    <div class="table-responsive">

      <table class="table table-hover" id="tracking-table">

        <tr>
            <th><br>Time</th>
            <th><br>Username</th>
            <th><br>Full Name</th>
            <th><br>Page Accessed</th>
        </tr>

        <?php foreach ($log as $row): ?>
           <tr>
            <td><?php echo  date("m/d/Y g:i A",$row->timestamp); ?></td>
            <td><?php echo $row->session_id; ?></td>
            <td><?php echo $row->fullname; ?></td>
            <td><?php echo $row->request_uri; ?></td>
        </tr>
        <?php endforeach; ?>

      </table>

    </div>

    <center><?php echo $auditlinks; ?></center>

    <br>

  </div>

</div>
