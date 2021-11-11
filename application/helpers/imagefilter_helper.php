<?php
function uploadSingleImage($imageName = null, $imageTempName = null)
{
    if (empty($imageName) || empty($imageTempName)) {
        return FALSE;
    }
    $RandomAccountNumber = uniqid();
    $upload = $RandomAccountNumber . $imageName;
    $source = $imageTempName;
    $target = 'public_html/front_end/upload/projects/' . $upload;
    if (move_uploaded_file($source, $target)) {
        return $upload;
    } else {
        return FALSE;
    }
}

function uploadMultiImage($arrayOfImages = [])
{
    if (empty($arrayOfImages)) {
        return FALSE;
    }

    $totalImages = count($arrayOfImages['name']);
    $returnImages = [];

    for ($i = 0; $i < $totalImages; $i++) {
        $RandomAccountNumber = uniqid();
        $upload = $RandomAccountNumber . $arrayOfImages['name'][$i];
        $source = $arrayOfImages['tmp_name'][$i];
        $target = 'public_html/front_end/upload/projects/' . $upload;
        move_uploaded_file($source, $target);
        array_push($returnImages, $upload);
    }
    $returnImages = implode(',', $returnImages);
    return $returnImages;
}
