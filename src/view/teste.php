<?php

$data = '2020-03-10 13:00:02';

echo $dataFormatada = strtotime($data);
echo '<br>';
echo date('d/m/y H:i:s', $dataFormatada);