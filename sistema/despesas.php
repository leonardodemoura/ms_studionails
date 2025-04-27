<?php
include 'backend/conecta.php'; // Inclui a conexão com o banco de dados
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo Financeiro - Despesas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="despesas.css">
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

    <section class="dashboard">
        <header>
            <h1>Gerenciamento de Despesas</h1>
            <button class="btn-nova-despesa" id="btnAbrirModal">Adicionar Despesa</button>

            <!-- Modal para adicionar despesas -->
            <div id="modalAdicionarDespesa" class="modal">
                <div class="modal-conteudo">
                    <span class="fechar" id="btnFecharModal">&times;</span>
                    <h2>Adicionar Despesa</h2>
                    <form id="formDespesa">
                        <label for="descricaoDespesa">Descrição:</label>
                        <input type="text" id="descricaoDespesa" name="descricao" required>

                        <label for="valorDespesa">Valor:</label>
                        <input type="number" id="valorDespesa" name="valor" step="0.01" required>

                        <label for="competenciaDespesa">Competência:</label>
                        <input type="month" id="competenciaDespesa" name="competencia" required>

                        <label for="pagoEmDespesa">Pago em:</label>
                        <input type="date" id="pagoEmDespesa" name="pago_em" required>

                        <label for="categoriaDespesa">Categoria da Despesa:</label>
                        <select id="categoriaDespesa" name="categoria" required>
                            <option value="fornecedores">Fornecedores</option>
                            <option value="contas">Contas Fixas</option>
                            <option value="materiais">Materiais</option>
                            <option value="outros">Outros</option>
                        </select>

                        <button type="button" onclick="salvarDespesa()">Salvar Despesa</button>
                    </form>
                </div>
            </div>
        </header>

        <div class="lista-despesas">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th>Valor</th>
                        <th>Competência</th>
                        <th>Pago em</th>
                        <th>Categoria</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody id="despesas-dados">
                    <?php
                    include 'backend/conecta.php';
                    $sql = "SELECT * FROM despesas";
                    $result = $conn->query($sql);
                
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['descricao']}</td>
                                    <td>R$ " . number_format($row['valor'], 2, ',', '.') . "</td>
                                    <td>{$row['competencia']}</td>
                                    <td>{$row['pago_em']}</td>
                                    <td>{$row['categoria']}</td>
                                    <td>
                                        <button class='btn-editar' onclick='editarDespesa({$row['id']})'>Editar</button>
                                        <button class='btn-excluir' onclick='excluirDespesa({$row['id']})'>Excluir</button>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>Nenhuma despesa encontrada.</td></tr>";
                    }
                
                    $conn->close();
                    ?>
                </tbody>
                
            </table>
        </div>
    </section>
    <script src="script.js"></script>
    <script src="despesas.js"></script>
</body>