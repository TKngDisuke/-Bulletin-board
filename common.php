<?php
mb_internal_encoding("UTF-8");
mb_language("ja");
setlocale(LC_ALL,"ja_JP.UTF-8");
$bbs_file = "bbs.csv";
function h($str) {
return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}
function bbs_write($data)
{
global $bbs_file;
$handle = fopen($bbs_file, "a");
$data["comment"] = str_replace(array("\r\n", "\n", "\r"), PHP_EOL,$data["comment"]);
$csv[] = $data["name"];
$csv[] = $data["comment"];
$csv[] = time();
$result=fputcsv($handle, $csv);
fclose($handle);
return $result;
}
function bbs_read()
{
    global $bbs_file; 
    $handle = fopen($bbs_file, "r");
while ($csv = fgetcsv($handle)) {
    $record["name"] = $csv[0];
    $record["comment"] = $csv[1];
    $record["time"] = $csv[2];
    $records[] = $record; 
}
fclose($handle);
return $records; 
}
?>