<!--php-->
<?php
    //declare the variables
    $gender = "";
    $gendername = "";
    $first_name = "";
    $last_name = "";
    $email = "";
    $birthday = "";
    $url = "";
    $resultContent = "";

    //give the variables a string value
    if (isset($_POST["genderSelect"]) && isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["yourMail"]) && isset($_POST["yourBirthday"]) && isset($_POST["favouriteWebpage"])) {
        $gender = $_POST["genderSelect"];
        $first_name = strval($_POST["firstName"]);
        $last_name = strval($_POST["lastName"]);
        $email = strval($_POST["yourMail"]);
        $birthday = strval($_POST["yourBirthday"]);
        $url = strval($_POST["favouriteWebpage"]);

        //select what to call someone based off their gender
        switch ($gender) {
            case 'male':
                $gendername = "sir";
                break;
            case 'female':
                $gendername = 'beloved';
                break;
            case 'other':
                $gendername = '';
                break;
        }
    }

    //test whether the 'calculate' or 'reset' button is pressed and remove data if the reset button is pressed
    if (isset($_POST['resetForm'])) {
        $gender = "";
        $gendername = "";
        $first_name = "";
        $last_name = "";
        $email = "";
        $birthday = "";
        $url = "";
        //clear the result div
        $resultContent = null;

        // Set the first name field back to the original value only if the 'submitForm' button is not pressed
        if (!isset ($_POST["submitForm"])) {
            $first_name = isset($_POST["firstName"]) ? strval($_POST["firstName"]) : "";
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
    <body class="contact">
        <!--top navigation bar-->
        <div class="topnav">
            <a href="index.html">Home</a>
            <a href="calculatorPlusPlus.php">Calculator</a>
            <a href="calculatorUsaEu.php">Usa - EU conversions</a>
            <a href="currency.php">Currency Calculator</a>
            <a href="projects.html">Projects</a>
            <a href="CalHistory.html">History</a>
            <a class="active" href="contact.php">Contact</a>
        </div>
        <!--heading component-->
        <div class="header">
            <br>
            <br>
            <h1>Contact</h1>
            <p>Have fun contacting</p>
            <br>
        </div>
        <br>
        <!--contact form-->
        <div class="contactForm">
            <form method="post" name="contact" action="">
                <label for="genderSelect">Select your gender</label><br>
                <select name="genderSelect" class="select">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select><br><br>
                <label for="firstName" for="lastName">Your full name</label><br>
                <input type="text" name="firstName" class="formInput" placeholder="Your first name">
                <input type="text" name="lastName" class="formInput" placeholder="Your last name"><br><br>
                <label for="yourMail">Your e-mail address</label><br>
                <input type="email" name="yourMail" class="formInput" placeholder="Your school e-mail address"><br><br>
                <label for="yourBirthday">Your date of birth</label><br>
                <input type="date" name="yourBirthday" class="formInput"><br><br>
                <label for="favouriteWebpage">Your favorite webpage (the URL)</label><br>
                <input type="url" name="favouriteWebpage" class="formInput" placeholder="URL of your favorite webpage"><br><br><br><br>
                <input type="submit" name="submitForm" class="enterButton" value="submit form">
                <input type="submit" name="resetForm" class="enterButton" value="reset form">
            </form>
        </div>
        <br><br>
        <!--the result of the form-->
        <div class="formResult">
            <?php
            if (!empty($resultContent)) {
                echo $resultContent;
            }
            else {
                if (!empty($gendername) || !empty($first_name) || !empty($last_name)) {
                    echo "<h2>Hello " . $gendername . " " . $first_name . " " . $last_name . "</h2>";
                }
                if (!empty($email)) {
                    echo "<p>your email is ". $email ."<p>";
                }
                if (!empty($birthday)) {
                    echo "<p>Your were born on " . $birthday . "<p>";
                }
                if (!empty($url)) {
                    echo "<p>". "<a href='$url'>$url</a>" ."<p>";
                }
            }
            ?>
        </div>
        <br><br>
    </body>
</html>