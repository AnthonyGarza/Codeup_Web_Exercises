<?php

class AddressDataStore {
    public $address_book = [];

    public $new_address = [];

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

        fclose($handle);
        return $entries;
    }

    function write_address_book($bigArray)
    {
        // Code to write $addresses_array to file $this->filename
        if (is_writable($this->filename)) {
            $handle = fopen($this->filename, 'w');
            foreach ($bigArray as $fields) {
                fputcsv($handle, $fields);
            }
            fclose($handle);
        }
    }

}

$AddressDataStore = new AddressDataStore('address_book.csv');
$address_book = $AddressDataStore->read_address_book();


var_dump($_POST);

var_dump($address_book);



if (!empty($_POST['name']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['zip'])) {

    $new_address['name'] = $_POST['name'];
    $new_address['address'] = $_POST['address'];
    $new_address['city'] = $_POST['city'];
    $new_address['state'] = $_POST['state'];
    $new_address['zip'] = $_POST['zip'];
    $new_address['phone'] = $_POST['phone'];

    array_push($address_book, $new_address);
    $AddressDataStore->write_address_book($address_book);

} elseif (isset($_GET['removeAddress'])) {
        $removeAddress = $_GET['removeAddress'];
        unset($address_book[$removeAddress]);
        $AddressDataStore->write_address_book($address_book);

} else {

    foreach ($_POST as $key => $value) {
        if (empty($value)) {
            echo "<h1>" . ucfirst($key) . " is empty.</h1>";
        }
    }

}

if (count($_FILES) > 0 && $_FILES['file1']['error'] == 0) {
        if ($_FILES['file1']['type'] == 'text/csv') {
            // Set the destination directory for uploads
            $upload_dir = '/vagrant/sites/codeup.dev/public/uploads/';
            // Grab the filename from the uploaded file by using basename
            $filename = basename($_FILES['file1']['name']);
            // Create the saved filename using the file's original name and our upload directory
            $saved_filename = $upload_dir . $filename;
            // Move the file from the temp location to our uploads directory
            move_uploaded_file($_FILES['file1']['tmp_name'], $saved_filename);


            $uploadedAddressBook = new AddressDataStore($saved_filename);

            $addressUploaded = $uploadedAddressBook->read_address_book();
            $address_book = array_merge($address_book, $addressUploaded);
            $AddressDataStore->write_address_book($address_book);

        } else {
            echo "Please upload .csv file only!";
        }
}


?>


<!DOCTYPE html>
<html>
    <head>
        <title>AddressBook</title>
    </head>
    <body>
        <h1>ADDRESS BOOK</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th>Phone</th>
            </tr>
                <? foreach ($address_book as $index => $fields) : ?>
            <tr>
                <? foreach ($fields as $value) : ?>
                    <td><?= htmlspecialchars(strip_tags($value)); ?></td>
                <? endforeach; ?>
                <td><?="<a href=\"address_book.php?removeAddress=$index\">REMOVE ADDRESS</a>"; ?></td>
            </tr>
                <? endforeach; ?>
        </table>

        <h2>INPUT CONTACT INFO BELOW:</h2>

        <form method="POST">
            <p>
                <label for="Name">Name</label>
                <input id="Name" name="name" type="text" placeholder="Enter full Name">
            </p>
            <p>
                <label for="Address">Address</label>
                <input id="Address" name="address" type="text" placeholder="Address">
            </p>
            <p>
                <label for="City">City</label>
                <input id="City" name="city" type="text" placeholder="City">
            </p>
            <p>
                <label for="State">State</label>
                <input id="State" name="state" type="text" placeholder="State">
            </p>
            <p>
                <label for="Zip Code">Zip Code</label>
                <input id="Zip Code" name="zip" type="number" placeholder="Zip">
            </p>
            <p>
                <label for="Phone Number">Phone Number</label>
                <input id="Phone Number" name="phone" type="tel" placeholder="Phone Number">
            </p>
            <p>
                <button type="Submit">Submit</button>
            </p>
        </form>

        <h1>Upload File</h1>

        <form method="POST" enctype="multipart/form-data">
            <p>
                <label for="file1">File to upload: </label>
                <input type="file" id="file1" name="file1">
            </p>
            <p>
                <input type="submit" value="Upload">
            </p>
        </form>

    </body>
</html>