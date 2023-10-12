<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ingesos</h1>
    <ul>
        <?php foreach ($results as $income) :?>
            <li>Han ingresado <?= $income['amount']?> EUR en concepto de <?= $income['description']?>.</li>
        <?php endforeach ?>
    </ul>
</body>
</html>