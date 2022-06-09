<?php
$acao = "recuperar";
require "tarefa_controller.php";

//apenas para testar
// echo "<pre>";
// print_r($tarefas);
// echo "</pre>";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo - Todas Tarefas</title>
    <link href="css/style.css"" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <script>

    function marcarRealizada(id) {
            location.href = "index.php?acao=marcarRealizada&pagina=index&id=" + id;
        }

    function removerTarefa(id) {
            location.href = "todas_tarefas.php?acao=removerTarefa&id=" + id;
        }

    function editarTarefa(id, txt_tarefa) {
            //criação do formulário de edição:
            let form = document.createElement('form');
            form.action = 'todas_tarefas.php?acao=atualizarTarefa';
            form.method = 'post';
            form.className = 'row';

            //criação de um "input" para o usuário digitar atualizar a tarefa:
            let inputTarefa = document.createElement('input');
            inputTarefa.name = 'tarefa';
            inputTarefa.type = 'text';
            inputTarefa.value = txt_tarefa;
            inputTarefa.className = 'form-control col-sm-9';
            inputTarefa.required = true;

            //criação de um campo oculto a ser enviado no post do form:
            let inputId = document.createElement('input');
            inputId.type = 'hidden';
            inputId.name = 'id';
            inputId.value = id;

            //criação do botão para salvar:
            let button = document.createElement('button');
            button.type = 'submit';
            button.innerHTML = 'Atualizar';
            button.className = 'btn btn-info col-sm-2'

            //inclusão dos componentes no form:
            form.appendChild(inputTarefa);
            form.appendChild(inputId);
            form.appendChild(button);

            let tarefa = document.getElementById('tarefa_'+id);
            tarefa.innerHTML = '';

            tarefa.insertBefore(form, tarefa[0]);
        }        

    </script>
</head>

<body>

<section>

    <nav class="navbar header">
        <div class="container">
            <a class="navbar-brand text-white" href="#">
                <img src="img/logo.png" width="30" height="30" alt="logo">
                Super Lista De Tarefas
            </a>
        </div>
    </nav>

    <div class="container app">
        <div class="row">
            <div class="col-md-3 menu">
                <ul class="ps-2 pe-2">
                    <li class="list-group-item off"><a href="index.php">Tarefas Pendentes</a></li>
                    <li class="list-group-item off"><a href="nova_tarefa.php">Nova Tarefa</a></li>
                    <li class="list-group-item active"><a href="todas_tarefas.php">Todas Tarefas</a></li>
                </ul>

                <img class="tasks" src="img/short-list.gif" />

            </div>

            <div class="col-sm-9 col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Todas tarefas</h4>
								<hr />

								<?php foreach($tarefas as $indice => $tarefa) { ?>
									<div class="row mb-3 d-flex align-items-center">
										<div class="col-7 col-md-10 mb-6" id="tarefa_<?= $tarefa->id ?>">
											<?= $tarefa->tarefa ?> (<?= $tarefa->status ?>)
                                            </div>

                                    <div class="col-5 col-md-2 d-flex justify-content-end">
                                        <i class="fa-regular fa-trash-can fa-lg text-danger p-2" onclick="removerTarefa(<?=$tarefa->id?>)"></i>

                                        <?php if ($tarefa->status == 'pendente') { ?>
                                            <i class="fa-regular fa-pen-to-square fa-lg text-info p-2" onclick="editarTarefa(<?=$tarefa->id?>, '<?=$tarefa->tarefa?>')"></i>
                                            <i class="fa-regular fa-circle-check fa-lg text-success p-2" onclick="marcarRealizada(<?=$tarefa->id?>)"></i>
                                        <?php } ?>
										</div>
									</div>

								<?php } ?>
								
							</div>
						</div>
					</div>
				</div>

        </div>
    </div>

</section>


<script src="js/jquery-3.6.0.min.js"></script>
<script src="https://kit.fontawesome.com/abfa99fcdf.js" crossorigin="anonymous"></script>
</body>
</html>