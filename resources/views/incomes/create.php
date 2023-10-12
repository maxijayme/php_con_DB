<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Formulario ingresos</h1>
    <form action="/incomes" method="post">
        <div class="input-group">
            <label for="payment_method">Método de ingreso</label>
            <select name="payment_method" id="payment_method">
                <option value="1">Tarjeta de crédito</option>
                <option value="2">Cuenta bancaria</option>
            </select>
        </div>
        <div class="input-group">
            <label for="type">Motivo del ingreso</label>
            <select name="type" id="type">
                <option value="1">Salario</option>
                <option value="2">Reembolso</option>
            </select>
        </div>
        <div class="input-group">
            <label for="amount">Monto</label>
            <input type="text" id="amount" name="amount">
        </div>
        <div class="input-group">
            <label for="date">Fecha</label>
            <input type="date" id="date" name="date">
        </div>
        <div class="input-group">
            <label for="description">Descripción</label>
            <input type="textarea" id="description" name="description">
        </div>
        <input type="hidden" name="method" value="post">
        <button type="submit">Cargar</button>
    </form>
</body>
</html>