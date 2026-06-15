<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$conn = new mysqli("localhost", "SEU_USUARIO", "SUA_SENHA", "nezus_db");

$sql = "SELECT * FROM denuncias WHERE status='em análise' ORDER BY data DESC";
$result = $conn->query($sql);

echo "<h2>Denúncias em Análise</h2>";
echo "<table border='1'>
<tr><th>ID</th><th>Autor</th><th>Denunciado</th><th>Motivo</th><th>Provas</th><th>Status</th><th>Data</th></tr>";

while($row = $result->fetch_assoc()) {
  echo "<tr>
          <td>".$row['id']."</td>
          <td>".$row['autor']."</td>
          <td>".$row['denunciado']."</td>
          <td>".$row['motivo']."</td>
          <td>".$row['provas']."</td>
          <td>".$row['status']."</td>
          <td>".$row['data']."</td>
        </tr>";
}
echo "</table>";

$conn->close();
?>
