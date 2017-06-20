<?
/*
     file: engine Marked file *eng_marked.php
    autor: Goncharov Stepan
     site: ssmart.ru
  company: Ssmart IT
*/


// data array
$MarkedParams = array(
	'parser'	=> '../class/parsedown.php',
	'ImgFolder'	=> '/img/',
	);

function get_unic_img($ext){
	$result = uniqid().'.'.$ext;
	return $result;
}

$act = $_REQUEST['act'];

if ($act == 'preview') {
	include $MarkedParams['parser'];
	$pars_text = new Parsedown();
	$text = $_POST['content'];
	echo $pars_text->text($text);
} 
if ($act == 'upload') {
	$uploadedFiles = array();
	foreach ($_FILES as $key => $file) {
		// print_r($file['tmp_name']);
		if (!empty($file)) {
			$types = array('','gif','jpg','png');
			$ext = $types[getimagesize($file['tmp_name'])['2']];
			$ResultImgName = $MarkedParams['ImgFolder'].get_unic_img($ext);
			if (copy($file['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$ResultImgName)) {
				$uploadedFiles[] = $ResultImgName;
			}
		}
		
	}
	echo json_encode($uploadedFiles);
}
echo $_POST['act'];
?>