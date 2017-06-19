<?
include 'class/parsedown.php';
$pars_text = new Parsedown();
$text = $_POST['content'];
echo $pars_text->text($text);
?>