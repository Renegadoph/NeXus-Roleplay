<?php
$conn = new mysqli("localhost", "SEU_USUARIO", "SUA_SENHA", "nezus_db");
if ($conn->connect_error) { die("Erro: " . $conn->connect_error); }

$autor = $_POST['autor'];
$denunciado = $_POST['denunciado'];
$motivo = $_POST['motivo'];
$provas = $_POST['provas'];

$stmt = $conn->prepare("INSERT INTO denuncias (autor, denunciado, motivo, provas) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $autor, $denunciado, $motivo, $provas);

if ($stmt->execute()) {
  echo "Denúncia enviada com sucesso!";
} else {
  echo "Erro: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
