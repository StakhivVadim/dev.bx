<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>To-do</title>
	<link rel="stylesheet" type="text/css" href="/todoHomework/asset/style.css">
	<script type="module" src="/todoHomework/asset/todo/list.js"></script>
	<script type="module" src="/todoHomework/asset/todo/item.js"></script>
</head>
<body>
<h1>To-do</h1>
<div class="calendar-container" data-role="todo-list"></div>
<script type="module">
	import {List} from "/todoHomework/asset/todo/list.js"

	const container = document.querySelector('[data-role="todo-list"]');
	const list = new List({container});

	list.render();

</script>
</body>
</html>