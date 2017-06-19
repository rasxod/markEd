<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Bootstrap Markdown Editor</title>

		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css" rel="stylesheet">
		<link href="/editor/dist/css/bootstrap-markdown-editor.css" rel="stylesheet">
		<link rel="stylesheet" href="/css/androidstudio.css">
	</head>
	<body>

<?
// include 'class/parsedown.php';
// $pars_text = new Parsedown();

// $text = 'Hello **Parsedown**!
// ```
// addEventListener(\'load\', function() {
//   var code = document.querySelector(\'#code\');
//   var worker = new Worker(\'worker.js\');
//   worker.onmessage = function(event) { code.innerHTML = event.data; }
//   worker.postMessage(code.textContent);
// })

// ```';
// echo $pars_text->text($text);

?>

		<div class="container">
			<h1>Bootstrap Markdown Editor</h1>

			<form id="form">
				<textarea name="text" id="editor"># Header Level 1

**Pellentesque habitant morbi tristique** senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. _Aenean ultricies mi vitae est_. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, `commodo vitae`, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum  rutrum orci, sagittis tempus lacus enim ac dui. [Donec non enim](#) in turpis pulvinar facilisis. Ut felis.

## Header Level 2

  1. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
  2. Aliquam tincidunt mauris eu risus.


> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur  massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.

### Header Level 3

  * Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
  * Aliquam tincidunt mauris eu risus.

```
#header h1 a {
  display: block;
  width: 300px;
  height: 80px;
}
```
				</textarea>
			</form>
		</div>

		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/ace/1.1.3/ace.js"></script>
		<script src="/js/bootstrap-markdown-editor.js"></script>
		<script src="/js/highlight.pack.js"></script>
		<script>
			jQuery(document).ready(function($) {

				hljs.initHighlightingOnLoad();

				$('#editor').markdownEditor({
					preview: true,
					imageUpload: true,
					imageBrows: true, 
					uploadPath: 'upload.php',
					uploadDir: '/img/',
					onPreview: function (content, callback) {
						$.ajax({
							url: 'prev.php',
							type: 'POST',
							dataType: 'html',
							data: {content: content},
						})
						.done(function(result) {
							// Return the html:
							callback(result);
						});
					}
				});

			});

		</script>

	</body>
</html>
