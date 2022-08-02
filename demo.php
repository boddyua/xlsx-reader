<?php

### do not forget to do 'composer require box/spout'

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

require_once 'autoload.php';

    $file = 'data.xlsx';
    $rows_max = 3;
    $rows_count = 0;

    # open the file
    $reader = ReaderEntityFactory::createXLSXReader();
    $reader->open($file);
    # read each cell of each row of each sheet
    foreach ($reader->getSheetIterator() as $sheet) {
        $rows_count++;
        echo "<br>\n============================ ROW {$rows_count} =======================<br>\n";
        foreach ($sheet->getRowIterator() as $row) {
            foreach ($row->getCells() as $cell) {
                var_dump($cell->getValue());
            }
        }
        if ($rows_count > $rows_max) {
            break;
        }
    }

    # close the file
    $reader->close();
