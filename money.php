<?php

function money_convert ($amountInSourceCurrency, $sourceCurrency, $targetCurrency){
    $sourceCurrency_bs = get_Data($sourceCurrency);
    $targetCurrency_bs = get_Data($targetCurrency);
    $calculate = ($amountInSourceCurrency/$sourceCurrency_bs)*$targetCurrency_bs;
    echo $calculate;
}

function get_Data($data){
    $data_json = file_get_contents('data.json');
    $dec_file = json_decode($data_json, true);
    $money_data = $dec_file['money'];
    foreach ($money_data as $value){
        $money_target = $value['target_currency'];
        $money_value = $value['value'];
        if($money_target == $data){
            return $money_value;
        }

    }

}
//$return_value = get_Data('BZD');
//echo $return_value;

money_convert(1000, 'LKR', 'USD');