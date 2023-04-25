<h1>Listar</h1>
<?php
    $sql = "SELECT * FROM usuarios";
    $result = $conf->query($sql);
    $quant = $result->num_rows;

    if($quant > 0){
        print "<table class='table table-hover table-striped table-bordered'>";
        print "<tr>";
        print "<th>ID</th>";
        print "<th>NOME</th>";
        print "<th>EMAIL</th>";
        print "<th>DATA DE NASCIMENTO</th>";
        print "<th>AÇÕES</th>";
        print "</tr>";
        while($row = $result->fetch_object()){
            print "<tr>";
            print "<td>".$row->id."</td>";
            print "<td>".$row->nome."</td>";
            print "<td>".$row->email."</td>";
            print "<td>".$row->data_nasc."</td>";
            print "<td>
                <button class='btn btn-success' onclick=\"location.href='?page=editar&id=".$row->id."';\">Editar</button>
                <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir o registro?')){
                    location.href='?page=salvar&acao=excluir&id=".$row->id."';
                }else{
                    false;
                }\">Excluir</button>
            </td>";
            print "</tr>";
        }
        print "</table>";
    }else{
        print "<p>Nenhum registro encontrado!</p>";
    }
?>