<?php

$counter = "./counter.txt";
date_default_timezone_set('Asia/Ho_Chi_Minh');
$today = getdate();

$month = $today['month'];

$mday = $today['mday'];

$year = $today['year'];

$current_date = $mday.$month.$year;
$REMOTE_ADDR = '';
// Log visit;

$fp = fopen($counter, "a");

$line = $REMOTE_ADDR."|".$mday.$month.$year."\n";

$size = strlen($line);

fputs($fp, $line, $size);

fclose($fp);

$contents = file($counter);

$total_hits = sizeof($contents);

$total_hosts = array();

for ($i=0;$i<sizeof($contents);$i++) {

$entry = explode("|", $contents[$i]);

array_push($total_hosts, $entry[0]);

}

$total_hosts_size = sizeof(array_unique($total_hosts));

$daily_hits = array();

for ($i=0;$i<sizeof($contents);$i++) {

$entry = explode("|", $contents[$i]);

if ($current_date == chop($entry[1])) {

array_push($daily_hits, $entry[0]);

}

}

$daily_hits_size = sizeof($daily_hits);

$daily_hosts = array();

for ($i=0;$i<sizeof($contents);$i++) {

$entry = explode("|", $contents[$i]);

if ($current_date == chop($entry[1])) {

array_push($daily_hosts, $entry[0]);

}

}

$daily_hosts_size = sizeof(array_unique($daily_hosts));

?>