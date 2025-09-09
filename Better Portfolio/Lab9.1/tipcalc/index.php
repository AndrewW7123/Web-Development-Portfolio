<!DOCTYPE html>
<!-- Simple tip calculator PHP app -->
<html>

<head>
    <title>Tip Calculator</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div style="text-align: center;">
        <form action="bill.php" method="post" id="form">
            <h1>Please enter your information below to pay</h1>
            <input type="text" name="server" required placeholder="Server">
            <input type="text" name="email1" required placeholder="Email" id="email1">
            <input type="text" name="email2" required placeholder="Re-enter email" id="email2">
            <input type="number" step="0.01" name="bill" required placeholder="Bill amount" min="0">
            <input type="number" name="tip" required placeholder="Tip percentage">
            <input type="text" name="creditcard" required placeholder="Credit card num">
            <br>
            <br>
            <input type="submit">
        </form>
        <script>
            document.getElementById("form").addEventListener("submit", function (event) {
                let a = document.getElementById("email1").value;
                let b = document.getElementById("email2").value;
                if (a != b) {
                    event.preventDefault();
                }
            });
        </script>
    </div>
</body>

</html>