<?php
declare(strict_types = 1);

include_once('MultiplicationTable.php');

use MultiplicationTable\MultiplicationTable;

if (isset($_POST['submit'])) {
    $newRows = 10;
    $newColumns = 10;

    if (isset($_POST['rows'])) {
        $_newRows = (int)htmlentities(strip_tags($_POST['rows']), ENT_QUOTES);

        if ($_newRows > 0) {
            $newRows = $_newRows;
        }
    }

    if (isset($_POST['columns'])) {
        $_newColumns = (int)htmlentities(strip_tags($_POST['columns']), ENT_QUOTES);

        if ($_newColumns > 0) {
            $newColumns = $_newColumns;
        }
    }

    $multiplicationTable = new MultiplicationTable($newRows, $newColumns);
} else {
    $multiplicationTable = new MultiplicationTable(10, 10);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Multiplication Table</title>

        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>

        <style type="text/css">
            table
            {
                border-collapse: collapse;
            }

            table, th, td
            {
                border: 1px solid black;
                min-width: 50px;
                height: 50px;
                text-align: center;
            }

           .bold
           {
                font-weight: bold;
           }

           .highlighted
           {
                background: #666666;
                color: #ffffff;
           }
        </style>
    </head>
    <body>
        <br>
        <br>
        <form action="./" method="POST">
            <label for="rows">Rows:</label><input type="text" name="rows" id="rows">
            <label for="columns">Columns:</label><input type="text" name="columns" id="columns">
            <input type="submit" name="submit" value="Update">
        </form>
        <br>
        <br>
        <?php echo $multiplicationTable->html(); ?>
    </body>
</html>