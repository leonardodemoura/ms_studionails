<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamentos - Studio de Nails</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="agendamento.css">
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
            <h1>Gerenciamento de Agendamentos</h1>
            <!-- Botão de Adicionar Receita -->
            <button class="btn-novo-agendamento" id="btnAbrirModal">
            <i class="fa-solid fa-plus"></i> Novo Agendamento</button>

            <!-- Modal para adicionar receitas -->
            <div id="modalAdicionarAgendamento" class="modal">
                <div class="modal-conteudo">
                    <span class="fechar" id="btnFecharModal">&times;</span>
                    <h2>Adicionar Agendamento</h2>
                    <form id="formAgendamento">
                        <label for="clienteAgendamento">Cliente:</label>
                        <input type="text" id="clienteAgendamento" name="cliente" required>

                        <label for="telefoneEmail">Telefone ou Email:</label>
                        <input type="text" id="telefoneEmail" name="telefoneEmail" required>

                        <label for="profissionalResponsavel">Profissional Responsável:</label>
                        <input type="text" id="profissionalResponsavel" name="profissional" required>

                        <label for="descricaoServico">Serviço:</label>
                        <input type="text" id="descricaoServico" name="servico" required>

                        <label for="dataAgendamento">Data:</label>
                        <input type="date" id="dataAgendamento" name="data" required>

                        <label for="valorServico">Valor do Serviço:</label>
                        <input type="number" id="valorServico" name="valor" required>

                        <label for="statusAgendamento">Status do Agendamento:</label>
                        <select id="statusAgendamento" name="status" required onchange="mostrarMotivoCancelamento()">
                            <option value="realizado">Realizado</option>
                            <option value="pendente">Pendente</option>
                            <option value="desmarcado">Desmarcado</option>
                        </select>

                        <div id="motivoCancelamento" style="display:none;">
                            <label for="motivo">Motivo do Cancelamento:</label>
                            <input type="text" id="motivo" name="motivo">
                        </div>

                        <label for="observacoes">Observações:</label>
                        <textarea id="observacoes" name="observacoes"></textarea>

                        <button class="btn-salvar-agendamento" type="button" onclick="salvarAgendamento()">Salvar
                            Agendamento</button>
                    </form>
                </div>
            </div>
        </header>

        <div class="lista-agendamentos">
            <table>
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Telefone/Email</th>
                        <th>Profissional</th>
                        <th>Serviço</th>
                        <th>Data</th>
                        <th>Valor</th>
                        <th>Status</th>
                        <th>Observações</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody id="agendamentos-dados">
                <?php
                    include 'backend/conecta.php';

                    $sql = "SELECT * FROM agendamentos";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $status = $row['status'];
                            $motivo = $row['motivo_cancelamento'];

                    // Se o status for "desmarcado", adiciona um tooltip com o motivo
                    $tooltip = ($status === 'desmarcado' && !empty($motivo)) ? "title='$motivo'" : "";

                    echo "<tr>
                            <td>{$row['cliente']}</td>
                            <td>{$row['telefone_email']}</td>
                            <td>{$row['profissional']}</td>
                            <td>{$row['servico']}</td>
                            <td>{$row['data']}</td>
                            <td>R$ " . number_format($row['valor'], 2, ',', '.') . "</td>
                            <td class='status' $tooltip>$status</td>
                            <td>{$row['observacoes']}</td>
                            <td>
                                <button class='btn-editar' onclick='editarAgendamento({$row['id']})'>Editar</button>
                                <button class='btn-excluir' onclick='excluirAgendamento({$row['id']})'>Excluir</button>
                            </td>
                        </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='9'>Nenhum agendamento encontrado.</td></tr>";
                            }

                            $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <script src="agendamento.js"></script>
    <script src="script.js"></script>

</body>

</html>