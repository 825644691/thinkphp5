<?php

$success = fopen("public/111.txt", "w") or die("Unable to open file!");;
$txt = "Steve Jobs\n";
fwrite($success, $txt);
fclose($success);