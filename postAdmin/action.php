<?php

$xmlFilename = "guestBook.xml";

function filled_out($form_vars)
{
    // test that each variable has a value
    foreach ($form_vars as $key => $value)
    {
        if (!isset($key) || ($value == ''))
        return false;
    }
    return true;
}

//email_validation
function valid_email($address)
{
    // check an email address is possibly valid
    if (preg_match('/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/', $address))
    return true;
    else
    return false;
}

function addContent ($node, $input) {
    $newEntry = $node->addChild('NewEntry');
    $newEntry->addChild('SubCategory', $input['SubCategory']);
    $newEntry->addChild('Location', $input['Location']);
    $newEntry->addChild('Title', $input['Title']);
    $newEntry->addChild('Price', $input['Price']);
    $newEntry->addChild('Description', $input['Description']);
    $newEntry->addChild('Email', $input['Email']);
    $newEntry->addChild('Confirm Email', $input['Confirm Email']);
}

function writeXMLFile ($content) {

    global $xmlFilename;
    $content->asXML($xmlFilename);
    echo "Wrote file: " . $xmlFilename . "<br>";
    echo "Thank You for your feedback <br>";
    echo '<hr>';
}

function readExistingXML () {
    global $xmlFilename;
    if (file_exists($xmlFilename)) {
        $xml = simplexml_load_file($xmlFilename);
        return $xml;
    } else {
        $xml = new SimpleXMLElement('<GuestBook></GuestBook>');
        return $xml;
        //exit("Failed to open $xmlFilename for reading existing entries.");
    }
}

function writeXML($input) {

    $xml = readExistingXML();

    addContent($xml, $input);

    writeXMLFile($xml);
}

function printAllEntries () {
    global $xmlFilename;
    if (file_exists($xmlFilename)) {
        $xml = simplexml_load_file($xmlFilename);
        echo ('<pre>');
        print_r($xml);
        echo ('</pre>');
    } else {
        exit("Failed to open $xmlFilename for printing all entries.");
    }
}

if (filled_out($_POST) && valid_email($_POST['Email']))
{
    echo "Your data has been recorded as below: <br>";
    echo "SubCategory: " . htmlspecialchars($_POST['SubCategory']) . "<br>";
    echo "Location: " . htmlspecialchars($_POST['Location']) . "<br>";
    echo "Title: " . htmlspecialchars($_POST['Title']) . "<br>";
    echo "Price: " . htmlspecialchars($_POST['Price']) . "<br>";
    echo "Description: " . htmlspecialchars($_POST['Description']) . "<br>";
    echo "Email: " . htmlspecialchars($_POST['Email']) . "<br>";
    echo "Confirm Email: " . htmlspecialchars($_POST['Confirm Email']) . "<br>";
    echo '<hr>';
    $inputArray = array('SubCategory'=>htmlspecialchars($_POST['SubCategory']),
                        'Location'=>htmlspecialchars($_POST['Location']),
                        'Title'=>htmlspecialchars($_POST['Title']),
                        'Price'=>htmlspecialchars($_POST['Price']),
                        'Description'=>htmlspecialchars($_POST['Description']),
                        'Email'=>htmlspecialchars($_POST['Email']),
                        'Confirm Email'=>htmlspecialchars($_POST['Confirm email']));
    writeXML($inputArray);
    printAllEntries();
} else {
    // Could add code to redirect back to HTML form with error msg below
    echo "Please go back and fill-in all fields correctly<br>";
}
//File Uploads
echo "Thanks for uploading file :" . $_FILES['userfile']['name'] . "<br>";
echo "File size is : " . $_FILES['userfile']['size'] . "<br>";
echo "File type is : " . $_FILES['userfile']['type'] . "<br>";
echo "File tmp_name is : " . $_FILES['userfile']['tmp_name'] . "<br>";
?>
