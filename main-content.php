<div class="main-content">
  <div class="content">
    <section class="b-primaryDomain">
      <h5>Currently KickassTorrents primary domain is:</h5>
      <div class="w-domainLink">
        <a class="domainLink" href="http://<?=$CONFIG->main_domain?>/"><?=$CONFIG->main_domain?></a>
      </div>
    </section>
    <section>
              <section class="b-issue">
          <i class="b-issue-status-icon icon-checkmark-circle-green"></i> <?php //if something is wrong then just change "circle-green" to "circle-red" and state the issue below in the area marked "HERE" and also add and or edit the message in the admin area ?>
          <h2>All systems are up and running</h2> <?php // HERE ?>
          <?php
            foreach ($messages as $message) {
                echo '<p style="color:'.$message['colour'].'">'.$message['message'].'</p>';
            }
          ?>
          <div class="clear"></div>
        </section>
              <section class="b-proxy">
        <p class="grey">Can't access <a href="http://<?=$CONFIG->main_domain?>/"><?=$CONFIG->main_domain?></a>? Is it slow or unresponsive? Getting DNS error? Try to use one of our safe mirrors:</p>
        <ul>
          <?php
            foreach ($urls as $site => $status) {
                echo "<li><a href=\"$site\" class=\"domainLink\"><span class=\"";
                if ((int) $status > 400 || (int) $status === 0) {
                    echo 'icon-cross-circle';
                } else {
                    echo 'icon-checkmark-circle-green';
                }
                echo "\"></span> $site</a></li>";
            }
          ?>
        </ul>
      </section>
    </section>
  </div>
</div>
