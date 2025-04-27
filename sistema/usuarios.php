<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Controle - Studio de Nails</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Lora:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="usuarios.css"> <!-- Link para o CSS -->
</head>
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
            <h1>Gerenciamento de Usuários</h1>
            <button class="btn-novo-usuario" id="btnAbrirModal">
                <i class="fa-solid fa-plus"></i> Novo Usuário</button>

            <!-- Modal para adicionar Usuários -->
            <div id="modalAdicionarUsuario" class="modal">
                <div class="modal-conteudo">
                    <span class="fechar" id="btnFecharModal">&times;</span>
                    <h2>Adicionar Usuário</h2>
                    <form id="formUsuario">
                        <label for="usuarioNome">Nome do Usuário:</label>
                        <input type="text" id="usuarioNome" name="nome" required>

                        <label for="usuarioEmail">Email:</label>
                        <input type="email" id="usuarioEmail" name="email" required>

                        <label for="usuarioSenha">Senha:</label>
                        <input type="password" id="usuarioSenha" name="senha" required>

                        <label for="usuarioTipo">Tipo de Usuário:</label>
                        <select id="usuarioTipo" name="tipo" required>
                            <option value="admin">Admin</option>
                            <option value="funcionario">Funcionário</option>
                        </select>

                        <label for="usuarioDataCriacao">Data de Criação:</label>
                        <input type="date" id="usuarioDataCriacao" name="dataCriacao" required>

                        <label for="usuarioStatus">Status:</label>
                        <select id="usuarioStatus" name="status" required>
                            <option value="ativo">Ativo</option>
                            <option value="inativo">Inativo</option>
                        </select>


                        <button class="btn-salvar-usuario" type="button" onclick="salvarUsuario()">Salvar Usuário</button>
                    </form>
                </div>
            </div>
        </header>

        <h3 class="titulo_lista">Lista de Usuários</h3>
        <div class="lista-usuario">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Tipo de Usuário</th>
                        <th>Data de Criação</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody id="usuarios-dados">
                    <?php
                    include 'backend/conecta.php';
                
                    $sql = "SELECT id, nome, email, tipo, data_criacao, status FROM usuarios";
                    $result = $conn->query($sql);
                
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['nome']}</td>
                                    <td>{$row['email']}</td>
                                    <td>{$row['tipo']}</td>
                                    <td>{$row['data_criacao']}</td>
                                    <td>{$row['status']}</td>
                                    <td>
                                        <button class='btn-editar' onclick='editarUsuario({$row['id']})'>Editar</button>
                                        <button class='btn-excluir' onclick='excluirUsuario({$row['id']})'>Excluir</button>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>Nenhum usuário encontrado.</td></tr>";
                    }
                
                    $conn->close();
                    ?>
                </tbophp                
            </table>
        </div>
    </section>
    <script src="script.js"></script>
    <script src="usuario.js"></script>
</body>

</html>