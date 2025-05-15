<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>{{ $lesson->name }}</title>
  <style>
    body {
      font-family: sans-serif;
      background: #f9f9f9;
      padding: 2rem;
      max-width: 930px;
      margin: 0 auto;
    }

    #articleContent {
      background: #fff;
      padding: 2rem;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
  <div id="articleContent"></div>

  <script type="module">
    import EditorJS from 'https://cdn.skypack.dev/@editorjs/editorjs';
    import Header from 'https://cdn.skypack.dev/@editorjs/header';
    import Paragraph from 'https://cdn.skypack.dev/@editorjs/paragraph';
    import List from 'https://cdn.skypack.dev/@editorjs/list';
    import Quote from 'https://cdn.skypack.dev/@editorjs/quote';

    const lessonData = {!! $lesson->content !!};

    const viewer = new EditorJS({
      holder: 'articleContent',
      readOnly: true,
      data: lessonData,
      tools: {
        paragraph: Paragraph,
        header: Header,
        list: List,
        quote: Quote
      }
    });
  </script>
</body>
</html>
