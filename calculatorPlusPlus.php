<!--php-->
<?php
    //declare variables
    $num1 = 0;
    $num2 = 0;
    $precision = 0;
    $result = 0;
    $error = '';

    //set values for variables
    if (isset($_POST['numberOne']) && isset($_POST['numberTwo']) && isset($_POST['operator']) && isset($_POST['precisionNr'])) {
        $num1 = floatval($_POST['numberOne']);
        $num2 = floatval($_POST['numberTwo']);
        $precision = floatval($_POST['precisionNr']);
        $operator = $_POST['operator'];

        //do the calculations
        switch ($operator) {
            case 'addition':
                $result = $num1 + $num2;
                break;
            case 'subtraction':
                $result = $num1 - $num2;
                break;
            case 'multiplication':
                $result = $num1 * $num2;
                break;
            case 'division':
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    $error = "Divide by 0 error";
                    $result = 0;
                }
                break;
            case 'powers':
                $result = pow($num1, $num2);
                break;
            case 'roots':
                if ($num2 != 0) {
                    $error = "leave the Nr.2 field empty please";
                    $result = 0;
                } else {
                    if ($num1 >= 0) {
                        $result = sqrt($num1);
                    }
                    else {
                        $error = "Negative root error";
                        $result = 0;
                    }
                }
                break;
            default:
                $error = 'Invalid operator';
                $result = 0;
        }
    }

    //test wether the 'calculate' or 'reset' button is pressed and remove data if the reset button is pressed
    if (isset($_POST['calculate'])) {
    } elseif (isset($_POST['reset'])) {
        $num1 = 0;
        $num2 = 0;
        $precision = 0;
        $result = 0;
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
        <div class="voor">
            <!--navigation bar-->
            <div class="topnav">
                <a href="index.html">Home</a>
                <a class="active" href="calculatorPlusPlus.php">Calculator</a>
                <a href="calculatorUsaEu.php">Usa - EU conversions</a>
                <a href="currency.php">Currency Calculator</a>
                <a href="projects.html">Projects</a>
                <a href="CalHistory.html">History</a>
                <a href="contact.php">Contact</a>
            </div>
            <!--heading component-->
            <div class="header">
                <br>
                <br>
                <h1>Calculator</h1>
                <p>Have fun calculating</p>
                <br>
            </div>
            <br>
            <!--form of the calculator-->
            <div class="calculator">
                <h1>Enter numbers below</h1>
                <br>
                <form method="post" name="calculatorForm">
                    <label for="numberOne">First nr.</label><br>
                    <input type="number" id="numberOne" name="numberOne" class="number" step="any" placeholder="Number 1"><br>
                    <br>
                    <label for="numberTwo">Second nr.</label><br>
                    <input type="number" id="numberTwo" name="numberTwo" class="number" step="any" placeholder="Number 2"><br>
                    <br>
                    <select id="operator" name="operator" class="select">
                        <option name="operator" value="addition">addition</option>
                        <option name="operator" value="subtraction">subtraction</option>
                        <option name="operator" value="multiplication">multiplication</option>
                        <option name="operator" value="division">division</option>
                        <option name="operator" value="powers">powers</option>
                        <option name="operator" value="roots">roots</option>    
                    </select><br>
                    <br>
                    <label for="precisionNr">precision</label><br>
                    <input type="number" name="precisionNr" class="number" placeholder="nr. of decimals"><br>
                    <br><br>
                    <input class="enterButton" type="submit" value="Enter" name="caluclate">
                    <br>
                    <br>
                    <input class="enterButton" type="submit" value="Reset" name="reset">
                    <br>
                    <br>
                    <!--result-->
                    <div class="result">
                        <p>Result: <?php echo round($result, $precision); ?></p>
                        <p><?php echo $error; ?>
                    </div>
                </form>
            </div>
            <br>
            <br>
            <!--thank you message at the bottom of the screen-->
            <div class="center">
                <p>Thank you very much for making use of this calculator. To use it, simply add your 1st nr in the first bar, select the operator you would like to use, enter your 2nd number in the second bar
            and press calculate. you can then see the calculated number in the bar at the bottom of the calculator. Have fun calculating!</p>
            </div>
            <br><br><br><br>
        </div>
    </body>
</html>