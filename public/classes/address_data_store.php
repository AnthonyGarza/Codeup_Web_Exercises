<?php


class AddressDataStore {


    public $filename = '';

    public function __construct($filename = 'address_book.csv') {
        $this->filename = $filename;
    }


    function read_address_book()
    {
        // Code to read file $this->filename
        $entries = [];

        $handle = fopen($this->filename, 'r');

        while(!feof($handle)) {
            $row = fgetcsv($handle);
            if (is_array($row)) {
                $entries[] = $row;
            }
        }
        return $entries;
        fclose($handle);

    }

    function write_address_book($array)
    {
        // Code to write $addresses_array to file $this->filename
        if (is_writable($this->filename)) {
            $handle = fopen($this->filename, 'w');
            foreach ($array as $fields) {
                fputcsv($handle, $fields);
            }
            fclose($handle);
        }
    }

}

?>