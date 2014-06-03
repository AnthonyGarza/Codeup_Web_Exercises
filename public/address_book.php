<?php

// Create a new file named address_book.php in your codeup.dev public folder and open it file for editing. Commit changes and push to GitHub for each step.

// Much like the address book in our example, you'll be creating an address book application that stores entries in a CSV file on your computer. In the same fashion as your todo.php application, you will want to display your entries at the top of the page, and have a form below for adding new entries. Each entry should take a name, address, city, state, zip, and phone. You can use a HTML table or definition lists for displaying the addresses.

// Create a function to store a new entry. A new entry should have validate 5 required fields: name, address, city, state, and zip. Display error if each is not filled out.

// Use a CSV file to save to your list after each valid entry.

// Open the CSV file in a spreadsheet program or text editor and verify the contents are what you expect after adding some entries.

// Refactor your code to use functions where applicable.



$address_book = [];

$new_address = [];

$filename = "address_book.csv";

function read_csv($filename) {
    $entries = [];

    $handle = fopen($filename, 'r');

    while(!feof($handle)) {
        $row = fgetcsv($handle);
        if (is_array($row)) {
            $entries[] = $row;
        }
    }

    fclose($handle);
    return $entries;
}

$address_book = read_csv($filename);

function write_csv($BigArray, $filename) {
    if (is_writable($filename)) {
        $handle = fopen($filename, 'w');
        foreach ($BigArray as $fields) {
            fputcsv($handle, $fields);
        }
        fclose($handle);
    }

}

var_dump($_POST);

var_dump($address_book);


if (!empty($_POST['name']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['zip'])) {

    $new_address['name'] = htmlspecialchars(strip_tags($_POST['name']));
    $new_address['address'] = htmlspecialchars(strip_tags($_POST['address']));
    $new_address['city'] = htmlspecialchars(strip_tags($_POST['city']));
    $new_address['state'] = htmlspecialchars(strip_tags($_POST['state']));
    $new_address['zip'] = htmlspecialchars(strip_tags($_POST['zip']));
    $new_address['phone'] = htmlspecialchars(strip_tags($_POST['phone']));

    array_push($address_book, $new_address);
    write_csv($address_book, $filename);

} else {

    foreach ($_POST as $key => $value) {
        if (empty($value)) {
            echo "<h1>" . ucfirst($key) . " is empty.</h1>";
        }
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
            <? foreach ($address_book as $fields) : ?>
            <tr>
                <? foreach ($fields as $value) : ?>
                    <td><?= $value; ?></td>
                <? endforeach; ?>
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
    </body>
</html>