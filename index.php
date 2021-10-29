<?php
require_once __DIR__ .'/app/includes.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css" as="image">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/JS/ajax.js" defer=""></script>
    <script src="/JS/configMap.js" defer=""></script>
    <script src="/JS/myJS.js" defer=""></script>
</head>
<body>
    <div class="map">
        <canvas id="myCanvas" class="myCanvas"></canvas>
        <div class="interface">
            <button id="start" class="button" type="submit">start simulation</button>
            <button id="stop" class="button button-indent" type="submit">stop simulation</button>
            <button id="restart" class="button button-indent" type="submit">restart simulation</button>
            <button id="nextMove" class="button button-indent" type="submit">next move</button>
        </div>
    </div>
    <div class="textArea">
        <textarea>

        </textarea>
    </div>
</body>
</html>

