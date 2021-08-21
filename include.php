<?
// exit();
$_SERVER['DOCUMENT_ROOT'] = realpath(dirname(__FILE__)."/../../..");
require_once($_SERVER['DOCUMENT_ROOT'] . ");
?>
<?
echo '<pre>';
global $DB;
$results = $DB->Query("SELECT `ID`, `UF_LINK`, `UF_ACTIVE`, `UF_PROVIDER` FROM `linksparsing` ORDER BY `ID`");

while ($row = $results->Fetch()){
    $arLink = explode('/', $row['UF_LINK']);
    $arResult[$row['UF_PROVIDER']][end($arLink)][$row['ID']] = $row['UF_ACTIVE'];
}

// print_r($arResult);

foreach ($arResult as $key => $value) {
    foreach ($value as $k => $v) {
        
        if(count($v) < 2){
            // echo '<br>ONE<br>';
            continue;
        }
        // print_r($v);
        $save = 0;
        foreach ($v as $k2 => $v2) {
            if($v2 == 1){
                $save = $k2;
            }
            if(!$save){
                $save = $k2;
            }
            $arDelete[$k2] = $k2;
        }

        unset($arDelete[$save]);
        

        // if(!$save){
        //     $save = array_key_last($v);
        // }

        // echo 'SAVE '.$save.'<br><br>';
    }
    
}

// print_r($arDelete);

// echo implode(',', $arDelete);

// $results = $DB->Query("DELETE FROM `linksparsing` WHERE `ID` IN (".implode(',', $arDelete).")");
