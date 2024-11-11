<?php
$input = '';
$result = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["expresion"])) {
        $input = $_POST["expresion"];
    }
    if (isset($_POST["equal"])) {
        try {
            $input = str_replace("%", "/100", $input);
            $input = str_replace("×", "*", $input);
            $result = eval("return $input;");
            $input = $result;
        } catch (Exception $e) {
            $result = "error";
            $input = '';
        }
    }
    if (isset($_POST["clear"])) {
        $input = "";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <style>
        * {
            text-align: center;
            margin-top: 40px;
        }
        .number {
            margin-top: 5px;
        }
        button {
            margin-left: -2px;
            margin-top: 1px;
            height: 80px;
            width: 80px;
            font-size: 35px;
            border: 2px solid #5e7d8a;
            border-radius: 10px;
        }
        input {
            height: 70px;
            width: 320px;
            border: 2px solid #5e7d8a;
            font-size: 30px;
        }
        .equal {
            background-color: #3bfea6;
        }
        .ac {
            background-color: rgb(217, 48, 48);
        }
        .sign {
            background-color: #5e7d8a;
        }
    </style>
</head>
<body>
    <form method="POST">
        <input type="text" name="expresion" value="<?php echo htmlspecialchars($input); ?>">
        <div class="number">
            <button name="clear" class="ac">AC</button>
            <button name="expresion" value="<?php echo $input . '%'; ?>">%</button>
            <button name="expresion" value="<?php echo substr($input, 0, -1); ?>">C</button>
            <button name="expresion" value="<?php echo $input . '/'; ?>">&#xF7;</button><br>
            <button name="expresion" value="<?php echo $input . '7'; ?>">7</button>
            <button name="expresion" value="<?php echo $input . '8'; ?>">8</button>
            <button name="expresion" value="<?php echo $input . '9'; ?>">9</button>
            <button name="expresion" value="<?php echo $input . '*'; ?>">&times;</button><br>
            <button name="expresion" value="<?php echo $input . '4'; ?>">4</button>
            <button name="expresion" value="<?php echo $input . '5'; ?>">5</button>
            <button name="expresion" value="<?php echo $input . '6'; ?>">6</button>
            <button name="expresion" value="<?php echo $input . '-'; ?>">-</button><br>
            <button name="expresion" value="<?php echo $input . '1'; ?>">1</button>
            <button name="expresion" value="<?php echo $input . '2'; ?>">2</button>
            <button name="expresion" value="<?php echo $input . '3'; ?>">3</button>
            <button name="expresion" value="<?php echo $input . "+"; ?>">+</button><br>
            <button name="expresion" value="<?php echo $input . '00'; ?>">00</button>
            <button name="expresion" value="<?php echo $input . "0"; ?>">0</button>
            <button name="expresion" value="<?php echo $input . "."; ?>">.</button>
            <button name="equal" class="equal">=</button>
        </div>
    </form>
</body>
</html>
