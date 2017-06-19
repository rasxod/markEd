<?
$uploadedFiles = array();
// print_r($_FILES);
if (! empty($_FILES)) {
    if (copy($_FILES['file0']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/mkeditor_2/img/test.png')) {
      $uploadedFiles[] = '/img/test.png';
    }
}

echo json_encode($uploadedFiles);
?>