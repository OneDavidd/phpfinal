<?php
include 'conexao.php';

$conn = Conexao::conectar();

if ($conn) {
    $sql = "SELECT * FROM prova_final";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Razão Social</th><th>Nome Fantasia</th><th>CNPJ</th><th>Responsável</th><th>Email</th><th>DDD</th><th>Telefone</th><th>Ações</th></tr>";
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row['idFornecedor'] . "</td>";
            echo "<td>" . $row['razaoSocial'] . "</td>";
            echo "<td>" . $row['nomeFantasia'] . "</td>";
            echo "<td>" . $row['cnpj'] . "</td>";
            echo "<td>" . $row['responsavel'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['ddd'] . "</td>";
            echo "<td>" . $row['telefone'] . "</td>";
            echo "<td><a href='editar.html?id=" . $row['idFornecedor'] . "'>Editar</a> | <a href='excluir.html?id=" . $row['idFornecedor'] . "'>Excluir</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum cadastro encontrado.";
    }
} else {
    echo "Erro ao conectar com o banco de dados.";
}
?>