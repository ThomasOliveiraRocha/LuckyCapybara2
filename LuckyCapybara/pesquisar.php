
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
// Conectar ao banco de dados
$servername = "localhost"; // Endereço do servidor MySQL
$username = "ubuntu"; // Nome de usuário do MySQL
$password = "capivaradasorte"; // Senha do MySQL
$dbname = "db_cidades"; // Nome do banco de dados

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Inicializa a variável para armazenar os dados do elemento encontrado
$elemento_dados = "";

// Processar a entrada do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Limpar dados de entrada
    $cod_cidade = mysqli_real_escape_string($conn, $_POST['cod_cidade']);

    // Consulta SQL para pesquisar o elemento no banco de dados
    $sql = "SELECT * FROM T_CIDADES WHERE nome = '$cod_cidade'"; // Substitua 'sua_tabela' pelo nome correto da sua tabela

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Exibir os resultados encontrados
        while($row = $result->fetch_assoc()) {
            // Exibe todas as colunas associadas ao elemento pesquisado
            foreach ($row as $key => $value) {
                $elemento_dados .= ucfirst($key) . ": " . $value . "<br>"; // Exibe o nome da coluna com a primeira letra em maiúscula
            }
            $elemento_dados .= "<br>";
        }
    } else {
        echo "Nenhum resultado encontrado.";
    }
}

// Fechar conexão
$conn->close();
?>

<?php
// Exibe os dados do elemento encontrado, se houver
if (!empty($elemento_dados)) {
    echo "<h2>Dados da Cidade</h2>";
    echo $elemento_dados;
}
?>

</html>