<?php
$payload = json_decode($_REQUEST['payload']);
if ($payload['repository']['full_name'] === 'sunnoy/wechat-vote-based') {

    $output = exec("cd /var/www/we/ && /usr/bin/git pull");

}