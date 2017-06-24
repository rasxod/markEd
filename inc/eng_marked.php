<?
/*
     file: engine Marked file *eng_marked.php
    autor: Goncharov Stepan
     site: ssmart.ru
  company: Ssmart IT
*/
// echo $_SERVER['SCRIPT_FILENAME'];
// echo __DIR__;

// data array
$MarkedParams = array(
	'parser'	=> '../class/parsedown.php',
	'ImgFolder'	=> '/img/',
	'TypesImg' 	=> array('','gif','jpg','png'),
	);
if ($_GET['ImgFolder'] != '') {
	$MarkedParams['ImgFolder'] = $_GET['ImgFolder'];
}
// Тип действия
$act = $_REQUEST['act'];

// для уникальности имен изображений при записи в папку 
// будем надеятся что пересечений не случится )))) 
function get_unic_img($ext){
	$result = uniqid().'.'.$ext;
	return $result;
}


if ($act == 'preview') {
	include $MarkedParams['parser'];
	$pars_text = new Parsedown();
	$text = $_POST['content'];
	echo $pars_text->text($text);
} 
if ($act == 'upload') {
	$uploadedFiles = array();
	foreach ($_FILES as $key => $file) {
		// print_r(getimagesize($file['tmp_name']));
		if (!empty($file)) {
			$ext = $MarkedParams['TypesImg'][getimagesize($file['tmp_name'])['2']];
			// print_r($ext);
			$ResultImgName = $MarkedParams['ImgFolder'].get_unic_img($ext);
			if (copy($file['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$ResultImgName)) {
				$uploadedFiles[] = $ResultImgName;
			}
		}
		
	}
	echo json_encode($uploadedFiles);
}
if ($act == 'brows') {
	$ImageDir = $_SERVER['DOCUMENT_ROOT'].$MarkedParams['ImgFolder'];
	$ImageList = array();
	if ($handle = opendir($ImageDir)) {
		while ($inFile = readdir($handle)) {
			if (is_file($ImageDir.$inFile)) {
				$isin =explode('.', $inFile);
				if (in_array($isin[1], $MarkedParams['TypesImg']) && $isin[1] != '') {
					$ImageList[] = '<img src="'.$MarkedParams['ImgFolder'].$inFile.'" class="sel_img"/>';
				}
			}
		}

	}
	echo json_encode($ImageList);
}
// echo $_POST['act'];
?>