# markEd
Markdown Editor


# Пример подключения

```html
<link href="/css/marked.css" rel="stylesheet">

<textarea name="text" id="editor"></textarea>

<!-- only test -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<!-- only test @END -->

<script src="//cdnjs.cloudflare.com/ajax/libs/ace/1.1.3/ace.js"></script>
<script src="/js/marked.js"></script>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		var pluginDir='',
			ImgFolder='/img/'; //default image dir $_SERVER['DOCUMENT_ROOT'].'/img/';
		$('#editor').markdownEditor({
			preview: true,
			imageUpload: true,
			imageBrows: true, 
			uploadPath: pluginDir+'/inc/eng_marked.php?act=upload&ImgFolder='+ImgFolder,
			uploadDir: pluginDir+'/inc/eng_marked.php?act=brows&ImgFolder='+ImgFolder,
			onPreview: function (content, callback) {
				$.ajax({
					url: pluginDir+'/inc/eng_marked.php',
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
```

## Последние обновления

версия 0.06
- решил немного переделать парсер и в нем теперь при добавлении картинки из браузера добаляются размеры `![width=,height=](/pub/morefiles/594e86b0ea103.jpg)`. Изменяйте размеры картинок.
- добавил описание подключения модуля
