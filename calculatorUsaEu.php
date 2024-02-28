<!--php-->
<?php
    //declare the variables
    $num1Con = 0;
    $resultCon = 0;

    //give the variables a value
    if (isset($_POST['numberOne']) && isset($_POST['conversion'])) {
        $num1Con = floatval($_POST['numberOne']);
        $conversion = $_POST['conversion'];

        //do the calculations
        switch ($conversion) {
            case 'miles to kilometers':
                $resultCon = $num1Con * 1.6;
                break;
            case 'kilometers to miles':
                $resultCon = $num1Con * 0.6;
                break;
            case 'farenheit to celcius':
                $resultCon = ($num1Con - 32) * 5/9;
                break;
            case 'celsius to farenheit':
                $resultCon = ($num1Con * 1.8) + 32;
                break;
            case 'gallons to liters':
                $resultCon = $num1Con * 3.78;
                break;
            case 'liters to gallons':
                $resultCon = $num1Con * 0.26;
                break;
            case 'lbs to kilograms':
                $resultCon = $num1Con * 0.45;
                break;
            case 'kilograms to lbs':
                $resultCon = $num1Con * 2.2;
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
            <a href="calculatorUsaEu.php" class="active">Usa - EU conversions</a>
            <a href="currency.php">Currency Calculator</a>
            <a href="projects.html">Projects</a>
            <a href="CalHistory.html">History</a>
            <a href="contact.php">Contact</a>
        </div>
        <!--heading component-->
        <div class="header">
            <br><br>
            <h1>Conversion Calculator</h1>
            <p>Have fun calculating</p>
            <br>
        </div>
        <br><br>
        <!--conversion calculator-->
        <div class="calculator">
            <h2>EU - USA conversion calculator</h2> <br>
            <h2>Enter number below</h2> <br>
            <form method="post">
                <label for="numberOne">First nr.</label><br>
                <input type="number" id="numberOne" name="numberOne" class="number" step="any"><br>
                <br><br>
                <label for="conversion">Select your conversion</label><br><br>
                <select id="conversion" name="conversion" class="select">
                    <option value="miles to kilometers">miles - kilometers</option>
                    <option value="kilometers to miles">kilometers - miles</option>
                    <option value="farenheit to celcius">farenheit - celcius</option>
                    <option value="celsius to farenheit">celcius - farenheit</option>
                    <option value="gallons to liters">gallons - liters</option>
                    <option value="liters to gallons">liters - gallons</option>
                    <option value="lbs to kilograms">pounds - kilograms</option>
                    <option value="kilograms to lbs">kilograms - pounds</option>
                </select><br><br>
                <input class="enterButton" type="submit" value="enter" name="conversion">
            </form><br>
            <!--result-->
            <div class="result">
                <p>Result: <?php echo $resultCon; ?></p>
            </div>
        </div>
        <br>
    </body>
</html>