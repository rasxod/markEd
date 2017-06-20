<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Markdown Editor</title>

		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
		<link href="/css/marked.css" rel="stylesheet">
		<!-- <link rel="stylesheet/less" type="text/css" href="/css/marked.less" /> -->
		<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.7.2/less.min.js"></script> -->
	</head>
	<body>

<!-- <link rel="stylesheet" href="/css/androidstudio.css"> -->
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
<!-- <script src="/js/highlight.pack.js"></script> -->
<!-- <script>
	jQuery(document).ready(function($) {
		hljs.initHighlightingOnLoad();
	});
</script> -->
		<div class="container">
			<h1>Markdown Editor</h1>

			<!-- <form id="form"> -->
				<textarea name="text" id="editor"># Header Level 1

![width=300,height=180](http://ssmart.ru/img/logo.png)

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
			<!-- </form> -->
		</div>

		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/ace/1.1.3/ace.js"></script>
		<script src="/js/marked.js"></script>
		<script>
			jQuery(document).ready(function($) {


				$('#editor').markdownEditor({
					preview: true,
					imageUpload: true,
					imageBrows: true, 
					uploadPath: '/inc/eng_marked.php?act=upload',
					uploadDir: '/inc/eng_marked.php?act=brows',
					onPreview: function (content, callback) {
						$.ajax({
							url: '/inc/eng_marked.php',
							type: 'POST',
							dataType: 'html',
							data: {content: content, act:'preview'},
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
