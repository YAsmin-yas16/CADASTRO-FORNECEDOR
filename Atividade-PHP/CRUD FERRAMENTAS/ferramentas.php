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
</style>

</head>
<body>
    <div class="row container-fluid">
        <form class="col-sm" action="./val_php/gravarFerramenta.php" method="post" id="formularioGravar">
            <div class="form-group">
                <label for="nomeFerramentaGravar">Nome Ferramenta</label>
                <input type="text" class="form-control" id="nomeFerramentaGravar" aria-describedby="emailHelp" name="nomeFerramentaGravar">
            </div>
            <div class="form-group">
                <label for="marcaFerramentaGravar">Marca Ferramenta</label>
                <input type="text" class="form-control" id="marcaFerramentaGravar" name="marcaFerramentaGravar">
            </div>
            <button type="button" class="btn btn-primary" onclick="executaGravar()">Gravar</button>
        </form>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Ferramenta</th>
                <th scope="col">Marca</th>
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
        function editar(id, nome, marca){
            Swal.fire({
                title: "Editar!",
                icon: "warning",
                html: '<form class="col-sm" action="./val_php/alterarFerramenta.php" method="post" id="formularioAlterar">' +
                      '  <div class="form-group">' +
                      '      <label for="nomeFerramenta">Usuario</label>' +
                      '      <input type="text" class="form-control" id="nomeFerramenta" name="nomeFerramenta" value="' + nome + '">' +
                      '  </div>' +
                      '  <div class="form-group">' +
                      '      <label for="marcaFerramenta">Marca</label>' +
                      '      <input type="text" class="form-control" id="marcaFerramenta" name="marcaFerramenta" value="' + marca + '">' +
                      '  </div>' +
                      '  <div class="form-group" style="display: none;">' +
                      '      <label for="idFerramentaAlteracao">Id</label>' +
                      '      <input type="text" class="form-control" id="idFerramentaAlteracao" name="idFerramentaAlteracao" value="' + id + '">' +
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
            let nome = document.getElementById("nomeFerramenta").value;
            let senha = document.getElementById("marcaFerramenta").value;
            if(nome.trim() == "")
            {
                alert('Por favor, preencha o campo "Nome Ferramenta"');
                document.getElementById("nomeFerramenta").focus();
                return false;
            }
            if(senha.trim() == "")
            {
                alert('Por favor, preencha o campo "Marca Ferramenta"');
                document.getElementById("marcaFerramenta").focus();
                return false;
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
                html: '<form class="col-sm" action="./val_php/excluirFerramenta.php" method="post" id="formularioExcluir" style="display: none;">' +
                      '  <div class="form-group">' +
                      '      <label for="idFerramenta">Id</label>' +
                      '      <input type="text" class="form-control" id="idFerramenta" name="idFerramenta" value="' + id + '">' +
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
            let nome = document.getElementById("nomeFerramentaGravar").value;
            let senha = document.getElementById("marcaFerramentaGravar").value;
            if(nome.trim() == "")
            {
                alert('Por favor, preencha o campo "Nome Ferramenta"');
                document.getElementById("nomeFerramentaGravar").focus();
                return false;
            }
            if(senha.trim() == "")
            {
                alert('Por favor, preencha o campo "Marca Ferramenta"');
                document.getElementById("marcaFerramentaGravar").focus();
                return false;
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