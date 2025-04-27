<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema de Controle - Studio de Nails</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Lora:wght@400;700&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="tiposdedespesas.css"> <!-- Link para o CSS -->
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
        <h1>Gerenciamento de Tipos de Despesas</h1>
        <button class="btn-novo-tipo-despesa" id="btnAbrirModal">
            <i class="fa-solid fa-plus"></i> Novo Tipo de Despesa</button>

        <!-- Modal para adicionar Tipos de Despesas -->
        <div id="modalAdicionarTipoDespesa" class="modal">
            <div class="modal-conteudo">
                <span class="fechar" id="btnFecharModal">&times;</span>
                <h2>Adicionar Tipo de Despesa</h2>
                <form id="formTipoDespesa">
                    <label for="tipoDespesaNome">Nome do Tipo de Despesa:</label>
                    <input type="text" id="tipoDespesaNome" name="nome" required>

                    <label for="tipoDespesaDescricao">Descrição:</label>
                    <textarea id="tipoDespesaDescricao" name="descricao" placeholder="Descrição do tipo de despesa"></textarea>

                    <button class="btn-salvar-tipo-despesa" type="button" onclick="salvarTipoDespesa()">Salvar Tipo de Despesa</button>
                </form>
            </div>
        </div>
    </header>

    <h3 class="titulo_lista">Lista de Tipos de Despesas</h3>
    <div class="lista-tipo-despesa">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="tiposDespesas-dados">
                <?php
                include 'backend/conecta.php';
            
                $sql = "SELECT * FROM tipos_despesas";
                $result = $conn->query($sql);
            
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nome']}</td>
                                <td>{$row['descricao']}</td>
                                <td>
                                    <button class='btn-editar' onclick='editarTipoDespesa({$row['id']})'>Editar</button>
                                    <button class='btn-excluir' onclick='excluirTipoDespesa({$row['id']})'>Excluir</button>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nenhum tipo de despesa encontrado.</td></tr>";
                }
            
                $conn->close();
                ?>
            </tbody>
            
        </table>
    </div>
</section>
<script src="script.js"></script>
<script src="tipoDespesa.js"></script>
</body>
</html>