<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes - Studio de Nails</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="cliente.css">
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
            <h1>Gerenciamento de Clientes</h1>
            <button class="btn-novo-cliente" id="btnAbrirModal">
                <i class="fa-solid fa-plus"></i> Novo Cliente</button>

            <!-- Modal para adicionar Clientes -->
            <div id="modalAdicionarCliente" class="modal">
                <div class="modal-conteudo">
                    <span class="fechar" id="btnFecharModal">&times;</span>
                    <h2>Adicionar Cliente</h2>
                    <form id="formCliente">
                        <label for="clienteNome">Nome do Cliente:</label>
                        <input type="text" id="clienteNome" name="nome" required>

                        <label for="clienteContato">Contato:</label>
                        <input type="text" id="clienteContato" name="contato" required placeholder="Telefone ou Email">

                        <label for="clienteTempo">Cliente Desde:</label>
                        <input type="date" id="clienteTempo" name="clienteDesde" required>

                        <label for="clienteSituacao">Situação:</label>
                        <select id="clienteSituacao" name="situacao" required>
                            <option value="ativo">Ativo</option>
                            <option value="inativo">Inativo</option>
                            <option value="pendente">Inadimplente</option>
                        </select>

                        <label for="clienteEndereco">Endereço:</label>
                        <input type="text" id="clienteEndereco" name="endereco" placeholder="Rua, Número, Bairro"
                            required>

                        <label for="clienteObservacoes">Observações:</label>
                        <textarea id="clienteObservacoes" name="observacoes"
                            placeholder="Observações adicionais"></textarea>

                        <button class="btn-salvar-cliente" type="button" onclick="salvarCliente()">Salvar
                            Cliente</button>
                    </form>
                </div>
            </div>
        </header>

        <h3 class="titulo_lista">Lista de Clientes</h3>
        <div class="lista-cliente">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Contato</th>
                        <th>Cliente Desde</th>
                        <th>Status</th>
                        <th>Endereço</th>
                        <th>Observações</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody id="clientes-dados">
                    <?php
                    include 'backend/conecta.php';

                    $sql = "SELECT * FROM clientes";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['nome']}</td>
                                    <td>{$row['contato']}</td>
                                    <td>{$row['cliente_desde']}</td>
                                    <td>{$row['situacao']}</td>
                                    <td>{$row['endereco']}</td>
                                    <td>{$row['observacoes']}</td>
                                    <td>
                                        <button class='btn-editar' onclick='editarCliente({$row['id']})'>Editar</button>
                                        <button class='btn-excluir' onclick='excluirCliente({$row['id']})'>Excluir</button>
                                    </td>
                                </tr>";
                                     }
                                } else {
                                 echo "<tr><td colspan='6'>Nenhum cliente encontrado.</td></tr>";
                                }
                                $conn->close();
                                ?>
                </tbody>
            </table>
        </div>
    </section>
    <script src="script.js"></script>
    <script src="cliente.js"></script>
</body>

</html>