<?php 
        $server = filter_input(INPUT_POST, "server", FILTER_SANITIZE_SPECIAL_CHARS);
        $email1 = filter_input(INPUT_POST, "email1", FILTER_VALIDATE_EMAIL);
        $email2 = filter_input(INPUT_POST, "email2", FILTER_VALIDATE_EMAIL);
        $bill = filter_input(INPUT_POST, "bill", FILTER_VALIDATE_FLOAT);
        $tip = filter_input(INPUT_POST, "tip", FILTER_VALIDATE_INT);
        $cardnum = filter_input(INPUT_POST, "creditcard", FILTER_SANITIZE_SPECIAL_CHARS);
?>
<!DOCTYPE html>
<!-- Simple tip calculator PHP app -->
<html>

<head>
    <title>Tip Calculator</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div id="container" style="text-align: center; background-color: silver; width: 300px; margin: auto">
        <?php
        if ($server === null or $email1 === null or $email2 === null or $cardnum === null
        or $bill === null or $bill === false or $tip === null or $tip === false or strlen($cardnum) != 16) {
            echo "<h1>Parameter error; please re-enter the information</h1>";
        }
        else {
            echo "<h1>Bill Information</h1>";
            echo "<h2>Server: $server</h2>";
            echo "<h2>Total bill: $bill</h2>";
            echo "<h2>Tip amount: $tip%</h2>";
            echo "<h2>Card used for payment: $cardnum</h2>";
            echo "<h2>Customer email: $email1</h2>";
            echo "<h2>Come again soon!</h2>";
            echo "<img src='Images/barcode.png' style='width: 60%;'>";
        }
        ?>
    </div>
</body>

</html>