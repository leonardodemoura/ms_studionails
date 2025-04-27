<?php
include 'backend/conecta.php'; // Inclui a conexão com o banco de dados
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo Financeiro - Receitas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="receitas.css">
</head>

<body>
        <!-- Barra Lateral -->
        <nav class="barra_lateral">
        <header>
            <div class="logo_area">
                <div class="logo">
                    <img src="imagens/logo_nails.png" alt="Logo" />
                </div>
                <div class="texto_logo">
                    <span class="nome_usuario">Nome</span>
                    <span class="cargo_usuario">Cargo</span>
                </div>
            </div>
            <button class="toggle">☰</button>
        </header>
        <div class="menu">
            <ul id="menu">
                <li class="item-menu">
                    <a href="sistema.html" class="link-menu">
                        <i class="fas fa-home"></i>
                        <span class="texto-menu">Dashboard</span>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="agendamentos.php" class="link-menu">
                        <i class="fas fa-calendar-day"></i>
                        <span class="texto-menu">Agendamentos</span>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="promocoes.php" class="link-menu">
                        <i class="fas fa-box"></i>
                        <span class="texto-menu">Promoções</span>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="#" class="link-menu">
                        <i class="fas fa-archive"></i>
                        <span class="texto-menu">Módulo Financeiro</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="receitas.php" class="link-menu"><i class="fa-solid fa-hand-holding-dollar"></i>Receitas</a></li>
                        <li><a href="despesas.php" class="link-menu"><i class="fa-solid fa-arrow-trend-down"></i>Despesas</a></li>
                    </ul>
                </li>
                
                <li class="item-menu">
                    <a href="" class="link-menu">
                        <i class="fas fa-users"></i>
                        <span class="texto-menu">Cadastros</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="clientes.php" class="link-menu"><i class="fas fa-user"></i> Clientes</a></li>
                        <li><a href="usuarios.php" class="link-menu"><i class="fas fa-users"></i> Usuarios</a></li>
                        <li><a href="servicos.php" class="link-menu"><i class="fa-solid fa-brush"></i> Serviços</a></li>
                        <li><a href="profissionais.php" class="link-menu"><i class="fas fa-user-tie"></i> Profissionais</a></li>
                        <li><a href="tiposdereceitas.php" class="link-menu"><i class="fa-solid fa-hand-holding-dollar"></i> Tipos de Receitas</a></li>
                        <li><a href="tiposdedespesas.php" class="link-menu"><i class="fa-solid fa-arrow-trend-down"></i> Tipos de Despesas</a></li>
                    </ul>
                    
                </li>

                <li class="item-menu">
                    <a href="relatorio.php" class="link-menu">
                        <i class="fas fa-chart-line"></i>
                        <span class="texto-menu">Relatórios</span>
                    </a>
                </li>
        
                <li class="item-menu">
                    <a href="" class="link-menu">
                        <i class="fas fa-cog"></i>
                        <span class="texto-menu">Configurações</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="backend/logout.php" class="link-menu"><i class="fa-solid fa-arrow-right-from-bracket"></i>Sair</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Área principal -->
    <section class="dashboard">
        <header>
            <h1>Gerenciamento de Receitas</h1>
            <!-- Botão de Adicionar Receita -->
            <button class="btn-nova-receita" id="btnAbrirModal">Adicionar Receita</button>

            <!-- Modal para adicionar receitas -->
            <div id="modalAdicionarReceita" class="modal">
                <div class="modal-conteudo">
                    <span class="fechar" id="btnFecharModal">&times;</span>
                    <h2>Adicionar Receita</h2>
                    <form id="formReceita">
                        <label for="descricaoReceita">Descrição:</label>
                        <input type="text" id="descricaoReceita" name="descricao" required>

                        <label for="valorReceita">Valor:</label>
                        <input type="number" id="valorReceita" name="valor" step="0.01" required>

                        <label for="competenciaReceita">Competência:</label>
                        <input type="month" id="competenciaReceita" name="competencia" required>

                        <label for="pagoEmReceita">Pago em:</label>
                        <input type="date" id="pagoEmReceita" name="pago_em" required>

                        <label for="tipoReceita">Tipo de Receita:</label>
                        <select id="tipoReceita" name="tipo_receita" required>
                            <option value="servico">Serviço</option>
                            <option value="produto">Produto</option>
                            <option value="outro">Outro</option>
                        </select>

                        <button type="button" onclick="salvarReceita()">Salvar Receita</button>
                    </form>
                </div>
            </div>

            <!-- Botão de Filtrar Receitas -->
            <button class="btn-nova-receita" id="btnAbrirFiltro">Filtrar Receitas</button>

            <!-- Modal para filtros -->
            <div id="modalFiltroReceitas" class="modal">
                <div class="modal-conteudo">
                    <span class="fechar" id="btnFecharFiltro">&times;</span>
                    <h2>Filtrar Receitas</h2>
                    <form id="formFiltrarReceitas">
                        <label for="descricaoFiltro">Descrição:</label>
                        <input type="text" id="descricaoFiltro" name="descricaoFiltro">

                        <label for="tipoFiltro">Tipo de Receita:</label>
                        <select id="tipoFiltro" name="tipoFiltro">
                            <option value="">Todos</option>
                            <option value="servico">Serviço</option>
                            <option value="produto">Produto</option>
                            <option value="outro">Outro</option>
                        </select>

                        <button type="submit" class="btn-nova-receita">Filtrar</button>
                    </form>
                </div>
            </div>
        </header>

        <div class="lista-receitas">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th>Valor</th>
                        <th>Competência</th>
                        <th>Pago em</th>
                        <th>Tipo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody id="receitas-dados">
                    <?php
                    include 'backend/conecta.php';
                
                    $sql = "SELECT * FROM receitas";
                    $result = $conn->query($sql);
                
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['descricao']}</td>
                                    <td>R$ " . number_format($row['valor'], 2, ',', '.') . "</td>
                                    <td>{$row['competencia']}</td>
                                    <td>{$row['pago_em']}</td>
                                    <td>{$row['tipo_receita']}</td>
                                   <td>
                                        <button class='btn-editar' onclick='editarReceita({$row['id']})'>Editar</button>
                                        <button class='btn-excluir' onclick='excluirReceita({$row['id']})'>Excluir</button>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>Nenhuma receita encontrada.</td></tr>";
                    }
                
                    $conn->close();
                    ?>
                </tbody>

            </table>
        </div>
    </section>
    <script src="script.js"></script>
    <script src="receitas.js"></script>
</body>

</html>