<?php

### do not forget to do 'composer require box/spout'

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

require_once 'autoload.php';

    $file = 'data.xlsx';

    # open the file
    $reader = ReaderEntityFactory::createXLSXReader();
    $reader->open($file);
    # read each cell of each row of each sheet
    foreach ($reader->getSheetIterator() as $sheet) {
        foreach ($sheet->getRowIterator() as $row) {
            foreach ($row->getCells() as $cell) {
                var_dump($cell->getValue());
            }
        }
    }

    # close the file
    $reader->close();