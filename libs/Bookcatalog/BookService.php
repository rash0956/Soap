<?php

namespace Bookcatalog;

class BookService{

    /**
     * @soap
     * @param Bookcatalog\Transfer $info_data
     * @return string
     */
    public function money_convert($info_data){
        $sourceCurrency_bs = $this->get_Data($info_data->sourceCurrency);
        $targetCurrency_bs = $this->get_Data($info_data->targetCurrency);
        $calculate = ($info_data->amountInSourceCurrency/$sourceCurrency_bs)*$targetCurrency_bs;
        return $calculate;
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

}

