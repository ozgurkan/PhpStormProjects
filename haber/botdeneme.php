<?php

header('Content-type: text/html; charset=utf8');

$open = simplexml_load_file('http://www.tbl.org.tr/xml.asp?Lig=TB2L&Eylem=PD&sezon=2013-2014');
foreach ( $open->TBL->Gruplar->Siralama as $data ){
    $sira = $data->attributes()['Sira'];
    $takim = $data->attributes()['Takim'];
    print 'Sıra: '. $sira . ' - Takım: ' . $takim . '<hr />';
}

?>