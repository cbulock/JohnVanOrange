<?php
require_once(__DIR__.'/../settings.inc');

if ($_POST['ref'] == '/refs/heads/'. BRANCH) {
  echo '<pre>';
  $results = shell_exec('sudo -u ' . SERVER_USER . ' env PATH=$PATH ./fullupdate ' . BRANCH);
  echo $results;
  mail(
   ADMIN_EMAIL,
   BRANCH . ' branch deployed on '. SITE_NAME,
   $results
  );
}