<div id="page-content-wrapper">

  <button type="submit" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Menu</button>

  <br><br><br>

  <div class="row">

    <div class="col-xs-12">

      <div class="header-style">
        <h1> Community Bulletin </h1>
      </div>

      <br>

      <div class="announcement-message">

        <h4> <?php echo $result->post_title; ?> </h4>
        <p> <?php echo date("F d, Y", strtotime($result->post_date)) . " " . date("g:i A", $result->post_time); ?> <p>
        <hr>
        <p> <?php echo $result->post_content;  ?> </p>

        <br>

      </div>

      <br>

    </div>