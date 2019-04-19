<?php
// $_ENV['NIGHTSCOUT_SERVER_NAME'] = 'yournightscout.com';
function directionToInteger($direction) {
  switch($direction) {
    case 'NONE':           return 0;
    case 'DoubleUp':       return 1;
    case 'SingleUp':       return 2;
    case 'FortyFiveUp':    return 3;
    case 'Flat':           return 4;
    case 'FortyFiveDown':  return 5;
    case 'SingleDown':     return 6;
    case 'DoubleDown':     return 7;
    case 'NOT_COMPUTABLE': return 8;
    case 'OUT_OF_RANGE':   return 9;
  }
  return 0;
}

function getTimeZone($date_string) {
  preg_match('/[-|\+][0-9]{4}$/', $date_string, $matches);

  return $matches[0];
}

$nightscout_url = 'https://' . $_ENV['NIGHTSCOUT_SERVER_NAME'] . '/api/v1/entries.json?count=3&units=mgdl&find[sgv][$gt]=0';

if (false === ($json = file_get_contents($nightscout_url))) {
  die ("Can't load data from host '{$_ENV['NIGHTSCOUT_SERVER_NAME']}'");
}
$object = json_decode($json);
$output = array();

foreach($object as $o) {
  $date = strtotime($o->dateString) * 1000;
  $date_without_tz = "/Date($o->date)/";
  $date_with_tz = '/Date(' .  $o->date . getTimeZone($o->dateString) . ')/';
  $output[] = array(
    'DT' => $date_with_tz,
    'ST' => $date_with_tz,
    'Trend' => directionToInteger($o->direction),
    'Value' => $o->sgv,
    'WT' => $date_without_tz,
  );
}

echo json_encode($output);
