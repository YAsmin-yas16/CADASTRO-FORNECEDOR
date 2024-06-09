<?php error_reporting(E_ALL ^ E_WARNING); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferramentas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
    img{
        height: 25px;
    }

    img:hover{
        cursor: pointer;
    }

    .centralizacao{
        display: flex !important;
        justify-content: center !important;
    }
</style>

</head>
<body class="centralizacao">
    <div class="row container">
        <form class="col-sm" action="./val_php/gravarFornecedor.php" method="post" id="formularioGravar">
        <h1 class="mt-3 text-center">Cadastro de Fornecedor</h1>
           <div class="form-group">
                <label for="nomeGravar">Fornecedor</label>
                <input type="text" class="form-control" id="nomeGravar" aria-describedby="emailHelp" name="nomeGravar">
            </div>
            <div class="form-group">
                <label for="emailGravar">Email</label>
                <input type="email" class="form-control" id="emailGravar" name="emailGravar">
            </div>
            <div class="form-group">
                <label for="tipoGravar">Tipo Pessoa:</label>
                <p>
                    <div class="row">
                        <div class="col-sm-1">
                            <label>Pessoa Física</label>
                        </div>
                        <div class="col-sm">
                            <input type="radio" class="form-control" id="tipoGravarF" name="tipoGravar" value="1"  style="width: 20px"checked>
                        </div>
                    </div>
                </p>
                <p>
                    <div class="row">
                        <div class="col-sm-1">
                    <label>Pessoa Jurídica</label>
                        </div>
                        <div class="col-sm">
                    <input type="radio" class="form-control" id="tipoGravarJ" name="tipoGravar" value="2" style="width: 20px">
                         </div> 
                    </div>
                </p>
            </div>
            <div class="form-group" style="display: none;">
                <label for="tipoEscolhidoGravar">Tipo Escolhido</label>
                <input type="text" class="form-control" id="tipoEscolhidoGravar" name="tipoEscolhidoGravar">
            </div>
            <div style="display: flex; justify-content: center;">
            <button type="button" class="btn btn-primary mb-3" onclick="executaGravar()">Atualizar</button>
            </div>
        </form>
       
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Tipo</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php include "./parts/table.php"; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        function editar(id, nome, email, tipo){
            var PF = "";
            var PJ = "";
            if(tipo == 1)
            {
                PF = "checked";
            }
            else
            {
                PJ = "checked";
            }
            Swal.fire({
                title: "Editar!",
                icon: "warning",
                html: '<form class="col-sm" action="./val_php/alterarFornecedor.php" method="post" id="formularioAlterar">' +
                      '  <div class="form-group">' +
                      '      <label for="nomeCliente">Usuario</label>' +
                      '      <input type="text" class="form-control" id="nomeCliente" name="nomeCliente" value="' + nome + '">' +
                      '  </div>' +
                      '  <div class="form-group">' +
                      '      <label for="emailCliente">Marca</label>' +
                      '      <input type="text" class="form-control" id="emailCliente" name="emailCliente" value="' + email + '">' +
                      '  </div>' +
                      '  <div class="form-group">' +
                      '     <label for="tipoCliente">Tipo Pessoa:</label>' +
                      '     <p>' +
                      '         <label>Pessoa Física</label>' +
                      '         <input type="radio" class="form-control" id="tipoClienteF" name="tipoCliente" value="1" ' + PF + ' >' +
                      '     </p>' +
                      '     <p>' +
                      '         <label>Pessoa Jurídica</label>' +
                      '         <input type="radio" class="form-control" id="tipoClienteJ" name="tipoCliente" value="2" ' + PJ + ' >' +
                      '     </p>' +
                      '  </div>' +
                      '  <div class="form-group" style="display: none;">' +
                      '      <label for="idCliente">Id</label>' +
                      '      <input type="text" class="form-control" id="idCliente" name="idCliente" value="' + id + '">' +
                      '  </div>' +
                      '  <div class="form-group" style="display: none;">' +
                      '      <label for="tipoPessoa">Tipo Pessoa</label>' +
                      '      <input type="text" class="form-control" id="tipoEscolhido" name="tipoEscolhido">' +
                      '  </div>' +
                      '</form>',
                showCancelButton: true,
                cancelButtonColor: "#d33",
                confirmButtonText: "Save"
                }).then((result) => {
                if (result.isConfirmed) {
                    executaAlteracao();
                    Swal.fire({
                    title: "Alterado!",
                    text: "O registro foi alterado com sucesso!",
                    icon: "success"
                    });
                }
            });
        }

        function validaAlteracao()
        {
            let nome = document.getElementById("nomeCliente").value;
            let email = document.getElementById("emailCliente").value;
            let pf = document.getElementById("tipoClienteF").checked;
            let pj = document.getElementById("tipoClienteJ").checked;
            if(nome.trim() == "")
            {
                alert('Por favor, preencha o campo "Nome Ferramenta"');
                document.getElementById("nomeFerramenta").focus();
                return false;
            }
            if(email.trim() == "")
            {
                alert('Por favor, preencha o campo "Marca Ferramenta"');
                document.getElementById("marcaFerramenta").focus();
                return false;
            }
            if(pf == false && pj == false)
            {
                alert('Selecione se o fornecedor se trata de uma pessoa física ou jurídica!');
                return false;
            }
            if(pf == true)
            {
                document.getElementById("tipoEscolhido").value = 1;
            }
            else
            {
                document.getElementById("tipoEscolhido").value = 2;
            }
            return true;
        }

        function executaAlteracao()
        {
            if(validaAlteracao())
            {
                let formulario = document.getElementById("formularioAlterar");
                formulario.submit();
            }
        }

        function excluir(id){
            Swal.fire({
                title: "Você tem certeza?",
                text: "Não é possível reverter essa alteração!",
                html: '<form class="col-sm" action="./val_php/excluirFornecedor.php" method="post" id="formularioExcluir" style="display: none;">' +
                      '  <div class="form-group">' +
                      '      <label for="idClienteExcluir">Id</label>' +
                      '      <input type="text" class="form-control" id="idClienteExcluir" name="idClienteExcluir" value="' + id + '">' +
                      '  </div>' +
                      '</form>',
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sim, deletar!"
                }).then((result) => {
                if (result.isConfirmed) {
                    executaExclusao();
                    Swal.fire({
                    title: "Deletado!",
                    text: "O registro foi removido",
                    icon: "success"
                    });
                }
            });
        }

        function executaExclusao(id)
        {
            let formulario = document.getElementById("formularioExcluir");
            formulario.submit();
        }

        function validaGravacao()
        {
            let nome = document.getElementById("nomeGravar").value;
            let email = document.getElementById("emailGravar").value;
            let pf = document.getElementById("tipoGravarF").checked;
            let pj = document.getElementById("tipoGravarJ").checked;
            if(nome.trim() == "")
            {
                alert('Por favor, preencha o campo "Nome"');
                document.getElementById("nomeGravar").focus();
                return false;
            }
            if(email.trim() == "")
            {
                alert('Por favor, preencha o campo "Email"');
                document.getElementById("emailGravar").focus();
                return false;
            }
            if(pf == false && pj == false)
            {
                alert('Selecione se o fornecedor se trata de uma pessoa física ou jurídica!');
                return false;
            }
            if(pf == true)
            {
                document.getElementById("tipoEscolhidoGravar").value = 1;
            }
            else
            {
                document.getElementById("tipoEscolhidoGravar").value = 2;
            }
            return true;
        }

        function executaGravar()
        {
            if(validaGravacao())
            {
                let formulario = document.getElementById("formularioGravar");
                formulario.submit();
            }
        }
    </script>
</body>
</html>