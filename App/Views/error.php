<!DOCTYPE html>
<html>
<head>
    <title><?= $exception->getMessage() ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="<?= $exception->getMessage() ?>">
    <link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"
          rel="stylesheet">
</head>
<body>
<div class="ui container">
    <div id="root"></div>
    <?php
    echo "<h1>Error occurs!</h1>";
    echo "<h2>" . $exception->getMessage() . "</h2>";
    echo "<p>" . get_class($exception) . "</p>";
    echo "<p>Stack trace:<pre>" . $exception->getTraceAsString() . "</pre></p>";
    echo "<p>Thrown in '" . $exception->getFile() . "' on line " . $exception->getLine() . "</p>";
    ?>
</div>
</body>
</html>