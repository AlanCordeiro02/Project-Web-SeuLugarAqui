<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SeuLugarAqui</title>
        <link rel="stylesheet" type="text/css" href="../css/style_filter.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,300,700" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="../imagens/logoPequena.png" type="image/x-icon">
        <link rel="icon" href="../imagens/logoPequena.png" type="image/x-icon">
        
    </head>
    <body>
        <div class="topo container">
            <h1>Lista de Eventos</h1>
        </div> 
        <table id="listar-eventos" class="display" style="width:100%">
            <thead>
                    <tr>
                        <th class="textFilter">Nome</th>
                        <th class="textFilter">Endereço</th>
                        <th class="textFilter">Telefone</th>
                        <th class="textFilter">Descrição</th>
                        <th class="textFilter">Data</th>
                        <th class="textFilter">Hora</th>
                    </tr>
            </thead>
        </table>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
            $(document).ready(function() {
            $('#listar-eventos').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "../controller/search_event.php",
                "type": "POST"
            }
            } );
            } );
    </script>
    </script>

    <fooster class="rodape container">
        <button class="btVoltar"><a href="dashboard.php">Voltar</a></button>
    </fooster>
    </body>
</html>