<html>
<head>
<title>List of all Internal functions</title>
<style type="text/css">
body {
    background-color: #FFFFFF;
    color: #222222;
    font-size: 11px;
    font-family: arial, tahoma;
}
table {
    color: #222222;
    font-size: 11px;
    font-family: arial, tahoma;
}
tr.found {
    background-color: #66EE00;
    font-weight: bold;
}
a:link {
    color: #222222;
}
a:visited {
    color: #CCCCCC;
}
a:active {
    color: #444444;
}
a:hover {
    text-decoration: underline;
}
</style>
</head>
<body>
<p>
    <form method="GET">
    Search: <input type="text" name="search"><br>
    <input type="submit">
    </form>
</p>
<?php
    if (!empty($_GET['search'])) {
        echo '<p>' . '<a href="#' . $_GET['search'] . '">' .
        'Goto ' . $_GET['search'] . '</a>' .
        '<script type="text/javascript">
            window.onload = function() {
                document.location += "#' . $_GET['search'] . '";
                return true;
            }
        </script>
        </p>';
    }
?>
<p>
    <table>
<?php
    $country = 'us';
    $functions = get_defined_functions();
    $functions = $functions['internal'];
    $num = 0;
    foreach($functions as $function) {
        $num++;
        echo '<tr ' . (($_GET['search'] == $function) ? 'class="found"' : '') . '><td>' .
        number_format($num) . '</td><td>' . '<a name="' . $function . '" href="http://' . $country . '.php.net/' .
        $function . '">' . $function . '</a>' . '</td></tr>';
    }
?>
    </table>
</p>
</body>
</html>