<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Multiplication table</title>
    <link rel="stylesheet" href="style.css">
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
</head>
<body>

<h2 id="title">Multiplication table</h2>

<table class="tab">

    <thead>
    <td class="decoration"></td>

    <?php for ($i = 1; $i <= 10; $i++): ?>

        <td class="decoration"><?= $i ?></td>

    <?php endfor ?>

    </thead>

    <?php

    for ($i = 1; $i <= 10; $i++) {

        echo "<tr><td class='decoration'>" . $i . "</td>";

        for ($j = 1; $j <= 10; $j++) {

            if ($i > 0) {

                echo "<td onclick='calculate(" . $i . ", " . $j . ")' class='hovering' id='field_{$i}_{$j}'>{$i} x {$j}</td>";

            }

            if ($i == 0) {

                echo "<td>" . $j . "</td>";

            }

        }

    }

    ?>

</table>

<br><br><br>

<div class="result">

    RESULT: <span id="result_nr"></span>

</div>

<script>

    function calculate(x, y) {
        
        let field = '#field_' + x + '_' + y;

        // Cleaning result field
        $('#result_nr').text("")

        $.ajax({
            url: 'ajax.php',
            data: {factor1: x, factor2: y},
            method: 'POST',
            dataType: 'json',
            success: function (data) {

                // Printing result field
                $('.hovering').removeClass('clicked');
                $(field).addClass('clicked');
                $('#result_nr').text(data);

            }
        });
    }

</script>
</body>
</html>
