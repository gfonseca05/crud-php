<?php
    switch($_REQUEST['acao']){
        case 'cadastrar':
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = md5($_POST["senha"]);
            $data_nasc = $_POST["data"];

            $sql = "INSERT INTO usuarios (nome, email, senha, data_nasc) VALUES ('{$nome}', '{$email}', '{$senha}', '{$data_nasc}')";
            $result = $conf->query($sql);

            if($result==true){
                print "<script>alert('Cadastro concluído!');</script>";
                print "<script>location.href='?page=listar';</script>";
            }else{
                print "<script>alert('ERRO: Não foi possível concluir o cadastro!');</script>";
                print "<script>location.href='?page=default';</script>";
            }

            break;
            case 'editar':
                $nome = $_POST["nome"];
                $email = $_POST["email"];
                $senha = md5($_POST["senha"]);
                $data_nasc = $_POST["data"];


                $sql = "UPDATE usuarios SET nome='{$nome}',
                                            email='{$email}',
                                            senha='{$senha},
                                            data_nasc='{$data_nasc}
                                        WHERE
                                            id =".$_REQUEST['id'];
                $result = $conf->query($sql);

                if($result==true){
                    print "<script>alert('Edição concluída!');</script>";
                    print "<script>location.href='?page=listar';</script>";
                }else{
                    print "<script>alert('ERRO: Não foi possível concluir a edição!');</script>";
                    print "<script>location.href='?page=default';</script>";
                }
                break;
                case 'excluir':
                    $sql = "DELETE FROM usuarios WHERE id=".$_REQUEST['id'];
                    $result = $conf->query($sql);

                    if($result==true){
                        print "<script>alert('Exclusão concluída!');</script>";
                        print "<script>location.href='?page=listar';</script>";
                    }else{
                        print "<script>alert('ERRO: Não foi possível excluir o registro!');</script>";
                        print "<script>location.href='?page=default';</script>";
                    }
                    break;
    }
?>