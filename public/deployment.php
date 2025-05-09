<?php
$currentTag = trim(exec('GIT_SSH_COMMAND="ssh -i ../../neoteric_deployment_key -o IdentitiesOnly=yes" git describe --tags'));

print_r("current version: " . $currentTag . "<br><br>");
$gitUpdateLog = trim(exec('git checkout master && git reset --hard origin/master && git pull'));

print_r("Deployment log: <br>");
print_r($gitUpdateLog, true);

?>