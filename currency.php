<!--php-->
<?php
    //declare variables
    $currencyNr1 = 0;
    $currencySelect1 = "";
    $currencySelect2 = "";
    //middle value = euro
    $middleValue = 0;
    $result = 0;

    //give some variables a value
    if (isset($_POST["currencyNr1"]) && isset($_POST["currencySelect1"]) && isset($_POST["currencySelect2"])){
        $currencyNr1 = floatval($_POST["currencyNr1"]);
        $currencySelect1 = strval($_POST["currencySelect1"]);
        $currencySelect2 = strval($_POST["currencySelect2"]);

        //convert the amount from the 1st amount to euros(middle value)
        switch ($currencySelect1) {
            case 'euro':
                $middleValue = $currencyNr1;
                break;
            case 'USdollar':
                $middleValue = $currencyNr1 * 0.93;
                break;
            case 'yen':
                $middleValue = $currencyNr1 * 0.0062;
                break;
            case 'pound':
                $middleValue = $currencyNr1 * 1.14;
                break;
            case 'AUdollar':
                $middleValue = $currencyNr1 * 0.60;
                break;
            case 'CAdollar':
                $middleValue = $currencyNr1 * 0.68;
                break;
            case 'franc':
                $middleValue = $currencyNr1 * 1.03;
                break;
            case 'krone':
                $middleValue = $currencyNr1 * 0.13;
        }

        //convert the middle value to whatever the 2nd currency was
        switch ($currencySelect2) {
            case 'euro':
                $result = $middleValue;
                break;
            case 'USdollar':
                $result = $middleValue * 1.07;
                break;
            case 'yen':
                $result = $middleValue * 162.35;
                break;
            case 'pound':
                $result = $middleValue * 0.88;
                break;
            case 'AUdollar':
                $result = $middleValue * 1.68;
                break;
            case 'CAdollar':
                $result = $middleValue * 1.47;
                break;
            case 'franc':
                $result = $middleValue * 0.97;
                break;
            case 'krone':
                $result = $middleValue * 7.46;
                break;
        }
    }
?>



<!--html-->
<!DOCTYPE html>
<html>
    <!--head-->
    <head>
        <link href="css/calculatorPlusPlus.css" rel="stylesheet" type="text/css" />
        <title>Online Calculator</title>
        <meta name="author" content="Ian Waals">
    </head>
    <!--body-->
    <body>
        <!--top navigation bar-->
        <div class="topnav">
            <a href="index.html">Home</a>
            <a href="calculatorPlusPlus.php">Calculator</a>
            <a href="calculatorUsaEu.php">Usa - EU conversions</a>
            <a class="active" href="currency.php">Currency Calculator</a>
            <a href="projects.html">Projects</a>
            <a href="CalHistory.html">History</a>
            <a href="contact.php">Contact</a>
        </div>
        <!--heading component-->
        <div class="header">
            <br>
            <br>
            <h1>Currency calculator </h1>
            <p>Have fun calculating</p>
            <br>
        </div>
        <br>
        <!--the calculation form-->
        <div class="currency">
            <h2>Currency calculator</h2>
            <h2>Enter currencies and amounts below</h2>
            <p>these numbers are based of how they were as of 12/11/2023</p><br>
            <br>
            <form method="post">
                <label for="currencyNr1">Enter your 1st amount below:</label><br>
                <input type="number" name="currencyNr1" class="number" step="any"><br>
                <label for="currencySelect1">Select your 1st currency</label><br>
                <select name="currencySelect1" class="select">
                    <option value="euro">Euro (EUR)</option>
                    <option value="USdollar">United States dollar (USD)</option>
                    <option value="yen">Yen (JPY)</option>
                    <option value="pound">Pound Sterling (GBP)</option>
                    <option value="AUdollar">Australian dollar (AUD)</option>
                    <option value="CAdollar">Canadian dollar (CAD)</option>
                    <option value="franc">Swiss franc (CHF)</option>
                    <option value="krone">Danish crown (DKK)</option>
                </select><br><br><br>
                <label for="currencySelect2">To which currency would you like to convert?</label><br>
                <select name="currencySelect2" class="select">
                    <option value="euro">Euro (EUR)</option>
                    <option value="USdollar">United States dollar (USD)</option>
                    <option value="yen">Yen (JPY)</option>
                    <option value="pound">Pound Sterling (GBP)</option>
                    <option value="AUdollar">Australian dollar (AUD)</option>
                    <option value="CAdollar">Canadian dollar (CAD)</option>
                    <option value="franc">Swiss franc (CHF)</option>
                    <option value="krone">Danish crown (DKK)</option>
                </select><br><br>
                <input class="enterButton" type="submit" value="enter" name="conversion"><br><br><br>
            </form>
            <!--printing the result-->
            <div class="result">
                <p>Result: <?php echo round($result, 2); ?></p>
            </div>
        </div>
    </body>
</html>