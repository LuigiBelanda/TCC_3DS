<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML, CSS, Reports">
    <meta name="description" content="Site para report de problemas urbanos">
    <meta name="author" content="Luigi, Fellipe, Giovana, Gustavo e Patrick">

    <title>Signaler - TCC</title>

    <!-- FONTE - POPPINS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="./new_report.css">

    <!-- SITE ICON -->
    <link rel="shortcut icon" href="../../img/logos site/logo miniatura signaler.png" type="image/x-icon" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hint.css/2.5.0/hint.min.css">



</head>

<body>

    <div class="container">
        <div id="form_report">
            <form action="../../php/novoReporte.php" method="POST" id="forms_busca">
    
                <h1>NOVO REPORTE</h1>

                <h2>Informações iniciais</h2>
    
                <div class="grupo-form">
                    <label for="city">Escolha a cidade:</label>
                    <select id="city" name="city">
                        <option value=""></option>
                        <option value="Itápolis">Itápolis</option>
                        <option value="Ibitinga">Ibitinga</option>
                        <option value="Borborema">Borborema</option>
                        <option value="Novo Horizonte">Novo Horizonte</option>
                    </select>
                </div>
    
                <div class="grupo-form">
                    <label for="problems">Escolha o problema:</label>
                    <select id="problems" name="problems">
                        <option value=""></option>
                        <option value="Buraco na rua">Buraco na rua</option>
                        <option value="Vazamento de água">Vazamento de água</option>
                        <option value="Árvore caída">Árvore caída</option>
                        <option value="Fio de energia estourado">Fio de energia estourado</option>
                    </select>
                </div>

                <div class="grupo-form">
                    <label for="grau">Grau do problema:</label>
                    <select id="grau" name="grau">
                        <option value=""></option>
                        <option value="Leve">Leve </option>
                        <option value="Médio">Médio</option>
                        <option value="Grave">Grave</option>
                    </select>
                </div>

                <div id="hint">
                    <a class="button hint--bottom-right hint--bounce hint--rounded hint--warning hint--small" aria-label="Um problema que não oferece risco a ninguém e que pode ser resolvido rapidamente">Grau leve</a>
                    <a class="button hint--bottom hint--bounce hint--rounded hint--warning hint--small" aria-label="Um problema que pode ocasionar mais problemas no futuro e que deve ser resolvido com uma certa prioridade">Grau médio</a>
                    <a class="button hint--bottom-left hint--bounce hint--rounded hint--warning hint--small" aria-label="Um problema que oferece risco à alguém e que deve ser resolvido com urgência">Grau grave</a>
                </div>

                <hr></hr>

                <h2>Endereço</h2>

                <div class="grupo-form">
                    <label for="Rua">Rua:</label>
                    <input type="text" name="rua" id="rua" placeholder="Coloque a rua do problema">
                </div>

                <div class="grupo-form">
                    <label for="Bairro">Bairro:</label>
                    <input type="text" name="bairro" id="bairro" placeholder="Coloque o Bairro do problema">
                </div>

                <div class="grupo-form">
                    <label for="Descrição">Descrição:</label>
                    <input type="text" name="descri" id="descri" placeholder="Coloque uma breve descrição" maxlength="150">
                    <h3>* Descrição de no máximo 150 caracteres</h3>
                </div>

                <input type="submit" value="CADASTRAR REPORTE" id="btn-submit">

            </form>
    
            <a href="../reports.php" id="btn-voltar">
                <button>VOLTAR</button>
            </a>
        </div>
    </div>

</body>

</html>