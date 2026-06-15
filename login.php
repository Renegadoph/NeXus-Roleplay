<?php
session_start();
$conn = new mysqli("localhost", "SEU_USUARIO", "SUA_SENHA", "nezus_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $stmt = $conn->prepare("SELECT senha FROM admins WHERE usuario=?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->bind_result($hash);

    if ($stmt->fetch() && password_verify($senha, $hash)) {
        $_SESSION['admin'] = $usuario;
        header("Location: painel.php");
        exit;
    } else {
        echo "Login inválido!";
    }
    $stmt->close();
}
?>

<form method="POST">
  Usuário: <input type="text" name="usuario" required><br>
  Senha: <input type="password" name="senha" required><br>
  <button type="submit">Entrar</button>
</form>
