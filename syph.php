#!C:\php\php.exe -q
<?php
$is_cli = substr(php_sapi_name(), 0, 3) == 'cli';
fwrite(STDOUT, "Esta rodando em CLI?" . PHP_EOL);
fwrite(STDOUT, $is_cli . PHP_EOL);
fwrite(STDOUT,PHP_EOL);

fwrite(STDOUT,"Parametros passados".PHP_EOL);
for($i = 0;$i <= $argc-1;$i++){
    fwrite(STDOUT,  $i.": ");
    fwrite(STDOUT,$argv[$i+1]);
    fwrite(STDOUT,PHP_EOL);
}

