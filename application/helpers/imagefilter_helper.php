<?php
function upload_image($image = null)
{
    if (empty($image)) {
        return FALSE;
    }
    $RandomAccountNumber = uniqid();
    $upload = $RandomAccountNumber . ($_FILES['csv_file']['name']);
    $source = $_FILES['csv_file']['tmp_name'];
    $target = 'textfile/' . $upload;
    move_uploaded_file($source, $target);





    // $dir = "textfile/";
    // $b = scandir($dir, 1);
    // $send_from = htmlspecialchars(trim($_POST['send_from']));

    // $count = count($b) - 2;

    // for ($x = 0; $x < $count; $x++) {

    //     if (!empty($b[$x])) {
    //         unlink('textfile/' . $b[$x]);
    //     }
    // }


    // $dir = "textfile/";
    // $b = scandir($dir, 1);

    // $count = count($b) - 2;

    // for ($x = 0; $x < $count; $x++) {

    //     $file_name = $b[$x];
    }
}
