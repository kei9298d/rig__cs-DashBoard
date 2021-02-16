<?php

// datapack class
class DataPack {
    
    private $db = array();

    // --------
    // generate array
    public function init($csv_fn){

        // Error Check
        if(!is_file($csv_fn)) return(-1);

        // Load Data set
        $csv = file($csv_fn);

        // Create Array
        foreach ($csv as $row) {
            // Erase CRLF
            $row = str_replace(array("\r\n","\r","\n"), '', $row);
            // Split to array
            $row_ary = explode(',', $row);

            // Filter
            if ( $row_ary[0] != 0 && $row_ary[1] != '') {
               $this->db[$row_ary[0]] = $row_ary[1];
            }
        unset($row_ary, $row);
        unset($csv);
        }
    }

    // --------
    // Create DB
    public function select($start, $end) {
        $FLG=false;
        // $this->dbのチェック
        if(is_null($this->db)) $ERR=true;
        // 入力は整数のみ
        if(!(is_int($start) || is_int($end))) $ERR=true;
        // endよりstartが大きければエラー
        if ($start >= $end ) $ERR=true;

        // エラー処理
        if($ERR) return(-1);
        else unset($ERR);

        // outputの配列の生成
        $out = array();
        foreach ($this->db as $key => $val) {
            if ( $key >= $start && $key <= $end) {
                // 連想配列として記録
                $out[$key] = $val;
            }
        }
        return($out);

        unset($out);
        unset($key,$val);
    }
}