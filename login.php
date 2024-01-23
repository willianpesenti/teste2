<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senha_digitada = $_POST["password"];

    // Verifique a senha
    if ($senha_digitada === "teste123") {
        header("Location: ADM.html");
        exit();
    } else {
        $mensagem_erro = "Senha incorreta. Tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Página de Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($mensagem_erro)) { echo "<p style='color: red;'>$mensagem_erro</p>"; } ?>
    <form method="post" action="">
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>
