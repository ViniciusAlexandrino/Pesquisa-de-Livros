<!DOCTYPE html>
<html>
<head>
    <title>Pesquisa de Livros</title>
</head>
<body>
    <h2>Pesquisa de Livros</h2>

    <form method="get">
        <label for="titulo">Título do Livro:</label><br>
        <input type="text" id="titulo" name="titulo" required><br><br>
        <button type="submit" name="pesquisar">Pesquisar</button>
    </form>

    <?php
    // Função para buscar livros pelo título
    function buscarLivros($titulo) {
        // Simulação de banco de dados de livros
        $livros = array(
            "Dom Casmurro",
            "O Senhor dos Anéis",
            "Harry Potter e a Pedra Filosofal",
            "1984",
            "O Pequeno Príncipe",
            "Orgulho e Preconceito",
            "Cem Anos de Solidão",
            "O Hobbit",
            "Khadji-Murat",
            "Angustia",
            "Diário de Subsolo",
            "Moby Dick",
            "Renascimento"

        );

        // Filtra os livros cujo título contenha a palavra-chave
        $resultados = array_filter($livros, function($livro) use ($titulo) {
            return strpos(strtolower($livro), strtolower($titulo)) !== false;
        });

        return $resultados;
    }

    // Verifica se o formulário foi submetido
    if (isset($_GET['pesquisar'])) {
        $titulo = $_GET['titulo'];
        $resultados = buscarLivros($titulo);

        if (count($resultados) > 0) {
            echo "<h3>Resultados para '$titulo':</h3>";
            echo "<ul>";
            foreach ($resultados as $livro) {
                echo "<li>$livro</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Nenhum livro encontrado para '$titulo'.</p>";
        }
    }
    ?>
</body>
</html>
