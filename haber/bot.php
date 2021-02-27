<?php
/**
 * Süper Lig Puan Durumu
 * @author Gökhan YILDIZ - http://www.++++++.com
 */
header("Content-type: text/html; charset=utf-8");

function get($first, $last, $text)
{
    @preg_match_all('/' . preg_quote($first, '/') .
        '(.*?)'. preg_quote($last, '/').'/i', $text, $m);
    return @$m[1];
}
// Get Content
$url = "http://spor.haberturk.com/iddaa/puandurumu/1/turkiye-spor-toto-super-lig";
$content = file_get_contents($url);
$get_s = get('class="col1">', '</td>', $content);
$get_t = get('class="col2">', '</td>', $content);
$get_o = get('class="col3">', '</td>', $content);
$get_g = get('class="col4">', '</td>', $content);
$get_b = get('class="col5">', '</td>', $content);
$get_m = get('class="col6">', '</td>', $content);
$get_a = get('class="col7">', '</td>', $content);
$get_y = get('class="col8">', '</td>', $content);
$get_p = get('class="col9">', '</td>', $content);
$get_av = get('class="col10">', '</td>', $content);
$get_c = (count($get_s) - 1)/3;
//Superlig Puan Durumu
echo'
 <table width="auto" border="1" cellpadding="0" cellspacing="0" style="border:1px dotted #ccc;">
 <tr style="background-color:greenyellow; color:#fff; font-weight:bold;color: blue">
 <td style="width:40px;">Sıra</td>
 <td style="width:100px;">Takım Adı</td>
 <td style="width:40px;">O</td>
 <td style="width:40px;">G</td>
 <td style="width:40px;">B</td>
 <td style="width:40px;">M</td>
 <td style="width:40px;">A</td>
 <td style="width:40px;">Y</td>
 <td style="width:40px;">P</td>
 <td style="width:40px;">AV</td>
 </tr> 
 ';
for ($i=0; $i<=$get_c; $i++) {
    echo '
 <tr style="background-color:lightblue;font-weight:bold;font-size:20px">
 <td><b>'.$get_s[$i].'</b></td> 
 <td>'.strip_tags($get_t[$i]).'</td> 
 <td>'.$get_o[$i].'</td> 
 <td>'.$get_g[$i].'</td> 
 <td>'.$get_b[$i].'</td> 
 <td>'.$get_m[$i].'</td> 
 <td>'.$get_a[$i].'</td> 
 <td>'.$get_y[$i].'</td> 
 <td>'.$get_p[$i].'</td> 
 <td>'.$get_av[$i].'</td> 
 </tr> 
 ';
    $i++;
    echo '
 <tr style="background-color:lightgray;font-weight:bold;font-size:20px">
 <td><b>'.$get_s[$i].'</b></td>
 <td>'.strip_tags($get_t[$i]).'</td>
 <td>'.$get_o[$i].'</td>
 <td>'.$get_g[$i].'</td>
 <td>'.$get_b[$i].'</td>
 <td>'.$get_m[$i].'</td>
 <td>'.$get_a[$i].'</td>
 <td>'.$get_y[$i].'</td>
 <td>'.$get_p[$i].'</td>
 <td>'.$get_av[$i].'</td>
 </tr>
 ';
}
echo '</table>';
?> 