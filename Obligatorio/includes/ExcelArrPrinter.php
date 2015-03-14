<?php
class ExcelArrprinter
{
    private function cleanData(&$str)
    {
      $str = preg_replace("/\t/", "\\t", $str);
      $str = preg_replace("/\r?\n/", "\\n", $str);
      if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    }
    
    public static function printArray($arr,$title)
    {
        echo $title . " \r\n\r\n";
        $flag2 = false;
        foreach($arr as $row) {
          if(!$flag2) {
            // display field/column names as first row
            echo implode("\t", array_keys($row)) . "\r\n";
            $flag2 = true;
          }
          array_walk($row, 'ExcelArrprinter::cleanData');
          echo implode("\t", array_values($row)) . "\r\n";
        }
        echo "\r\n\r\n";
    }
}

