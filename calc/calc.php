<?php
$Result = '';
$error = '';

if (isset($_POST['calc'])) {
    $Num1 = $_POST['number1'];
    $Num2 = $_POST['number2'];
    $sign = $_POST['calc'];

    if (empty($Num1) || empty($Num2)) {
        $error = 'Please enter both numbers.';
    } else {
        if ($sign == '+') {
            $Result = $Num1 + $Num2;
        } else if ($sign == '-') {
            $Result = $Num1 - $Num2;
        } else if ($sign == 'X') {
            $Result = $Num1 * $Num2;
        } else if ($sign == '/') {
            $Result = $Num1 / $Num2;
        } else if ($sign == '%') {
            $Result = $Num1 % $Num2;
        } else if ($sign == '^') {
            $Result = pow($Num1, $Num2);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>

</head>

<body>
    <center>
        <div class="container">
            <h1>Calculator</h1>
            <form action="" method="post">
                <div class="input-group">
                    <label for="number1">Number 1:</label>
                    <input type="text" name="number1" id="number1" style="height: 40px;">
                </div>
                <div class="input-group">
                    <br>
                    <label for="calc">Operator:</label>
                    <select name="calc" id="calc" style="height: 40px;">
                        <option value="+">+</option>
                        <option value="-">-</option>
                        <option value="X">X</option>
                        <option value="/">/</option>
                        <option value="%">%</option>
                        <option value="^">^</option>
                    </select>
                </div>
                <br>
                <div class="input-group">
                    <label for="number2">Number 2:</label>
                    <input type="text" name="number2" id="number2" style="height: 40px;">
                </div>
                <br>
                <input type="submit" name="equal" class="btn btn-primary" value="Calculate">
                <br><br>
                <?php if ($Result !== '') : ?>
                    <div class="result">
                        <label for="">The Result:</label>
                        <input type="text" style="height: 40px;" value="<?php echo $Result ?>">
                    </div>
                <?php endif; ?>
                <?php if ($error !== '') : ?>
                    <div class="error">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </center>

</body>

</html>