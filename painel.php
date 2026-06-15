<?php
$conn = new mysqli("localhost", "SEU_USUARIO", "SUA_SENHA", "nezus_db");
if ($conn->connect_error) { die("Erro: " . $conn->connect_error); }

$sql = "SELECT * FROM denuncias ORDER BY data DESC";
$result = $conn->query($sql);

echo "<h2>Painel de Denúncias</h2>";
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
