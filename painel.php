<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$conn = new mysqli("localhost", "SEU_USUARIO", "SUA_SENHA", "nezus_db");

if (isset($_GET['acao']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $acao = $_GET['acao'];
    if (in_array($acao, ['pendente','em análise','resolvida'])) {
        $stmt = $conn->prepare("UPDATE denuncias SET status=? WHERE id=?");
        $stmt->bind_param("si", $acao, $id);
        $stmt->execute();
        $stmt->close();
    }
}

$sql = "SELECT * FROM denuncias ORDER BY data DESC";
$result = $conn->query($sql);

echo "<h2>Painel de Denúncias</h2>";
echo "<table border='1'>
<tr><th>ID</th><th>Autor</th><th>Denunciado</th><th>Motivo</th><th>Provas</th><th>Status</th><th>Data</th><th>Ações</th></tr>";

while($row = $result->fetch_assoc()) {
  echo "<tr>
          <td>".$row['id']."</td>
          <td>".$row['autor']."</td>
          <td>".$row['denunciado']."</td>
          <td>".$row['motivo']."</td>
          <td>".$row['provas']."</td>
          <td>".$row['status']."</td>
          <td>".$row['data']."</td>
          <td>
            <a href='painel.php?acao=pendente&id=".$row['id']."'>Pendente</a> |
            <a href='painel.php?acao=em análise&id=".$row['id']."'>Em análise</a> |
            <a href='painel.php?acao=resolvida&id=".$row['id']."'>Resolvida</a>
          </td>
        </tr>";
}
echo "</table>";

$conn->close();
?>
