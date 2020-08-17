<?php

$NameError = "";
$EmailError = "";
$PhoneError = "";
$WebsiteError = "";
if (isset($_POST['Submit'])) {
    if (empty($_POST['Name'])) {
        $NameError = "Name is Required";
    } else {
        $Name = Test_User_Input($_POST["Name"]);
        if (!preg_match("/^[A-Za-z.]*$/", $Name)) {
            $NameError = "Only Letters and White Space are Allowed";
        }
    }
    if (empty($_POST['Email'])) {
        $EmailError = "Email is Required";
    } else {
        $Email = Test_User_Input($_POST['Email']);
        if (!preg_match("/[A-Za-z0-9._]{3,}@[A-Za-z0-9._]{3,}[.]{1}[A-Za-z0-9._]{2,}/", $Email)) {
            $EmailError = "Email format is not suported";
        }
    }
    if (empty($_POST['Phone'])) {
        $PhoneError = "Phone is Required";
    } else {
        $Phone = Test_User_Input($_POST['Phone']);
    }
    if (empty($_POST['Website'])) {
        $WebsiteError = "Website is Required";
    } else {
        $Website = Test_User_Input($_POST['Website']);
        if (!preg_match("/(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/", $Website)) {
            $WebsiteError = "Website format is not suported";
        }

        echo "<h2>Your Submit Information</h2> <br>";
        echo "Name: {$_POST['Name']}<br>";
        echo "Email: {$_POST['Email']}<br>";
        echo "Phone: {$_POST['Phone']}<br>";
        echo "Website: {$_POST['Website']}<br>";
        echo "Message: {$_POST['Message']}<br>";
    }
}
function Test_User_Input($Data)
{
    return $Data;
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Form validation with PHP</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
        html,
        body {
            min-height: 100%;
            padding: 0;
            margin: 0;
            font-family: Roboto, Arial, sans-serif;
            font-size: 14px;
            color: #666;
        }

        h1 {
            margin: 0 0 20px;
            font-weight: 400;
            color: #1c87c9;
        }

        p {
            margin: 0 0 5px;
        }

        .main-block {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #1c87c9;
        }

        form {
            padding: 25px;
            margin: 25px;
            box-shadow: 0 2px 5px #f5f5f5;
            background: #f5f5f5;
        }

        .fas {
            margin: 25px 10px 0;
            font-size: 72px;
            color: #fff;
        }

        .fa-envelope {
            transform: rotate(-20deg);
        }

        .fa-at,
        .fa-mail-bulk {
            transform: rotate(10deg);
        }

        input,
        textarea {
            width: calc(100% - 18px);
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #1c87c9;
            outline: none;
        }

        input::placeholder {
            color: #666;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            background: #1c87c9;
            font-size: 16px;
            font-weight: 400;
            color: #fff;
        }

        button:hover {
            background: #2371a0;
        }

        @media (min-width: 568px) {
            .main-block {
                flex-direction: row;
            }

            .left-part,
            form {
                width: 50%;
            }

            .fa-envelope {
                margin-top: 0;
                margin-left: 20%;
            }

            .fa-at {
                margin-top: -10%;
                margin-left: 65%;
            }

            .fa-mail-bulk {
                margin-top: 2%;
                margin-left: 28%;
            }
        }
    </style>
</head>

<body>
    <div class="main-block">
        <div class="left-part">
            <i class="fas fa-envelope"></i>
            <i class="fas fa-at"></i>
            <i class="fas fa-mail-bulk"></i>
        </div>
        <form action="FormValidationProject.php" method="post">
            <h1>Contact Us</h1>
            <div class="info">
                <?php echo $NameError; ?>
                <input class="input" type="text" name="Name" placeholder="Full name">
                <?php echo $EmailError; ?>
                <input type="input" name="Email" placeholder="Email">
                <?php echo $PhoneError; ?>
                <input type="input" name="Phone" placeholder="Phone number">
                <?php echo $WebsiteError ?>
                <input type="input" name="Website" placeholder="Website">
            </div>
            <p>Message</p>
            <div>
                <textarea rows="4" Name="Message"></textarea>
            </div>
            <input type="Submit" href="/" name="Submit" />
        </form>
    </div>
</body>

</html>