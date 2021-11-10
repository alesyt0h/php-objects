<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>BankApp</title>
</head>
<body>

    <main>
        <h1>BankApp</h1>

        <?php include './account.php'; ?>

        <h2>Bienvenido <span class="n-text"><?php echo $customer->getName() . " " . $customer->getSurname();?></span></h2>

        <div class="card-container">
            <h4>Account Number: <span class="n-text"><?php echo $customer->getAccNumber();?></span></h4>
            <h4>Account Balance: <span class="b-text"><?php echo $customer->getBalance();?> €</span></h4>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <input type="number" placeholder="Depositar" name="deposit" min="0" autocomplete="off" required>
                <button type="submit">Depositar</button>
            </form>
    
            <br>
            <br>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <input type="number" placeholder="Retirar" name="withdraw" min="0" autocomplete="off" required>
                <button type="submit">Retirar</button>
            </form>
        </div>

    </main>
    
</body>
</html>