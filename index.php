<?php

require_once 'src/Classes/RemoveAttributes.php';

$html = file_get_contents('https://raw.githubusercontent.com/sk4rp/large-html/main/large.html');

$iterator = new RemoveAttributes($html);
echo implode('', iterator_to_array($iterator));
