<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo - Nova Tarefa</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/clock.css" rel="stylesheet">
    <link href="css/button.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    
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

    <?php if(isset($_GET['inclusao']) && $_GET['inclusao'] == 1) : ?>
        <div class="pt-2 d-flex justify-content-center confirmacao">
            <h5>
                Tarefa inserida com sucesso!
            </h5>
        </div>
    <?php endif; ?>

    <div class="container app">
        <div class="row">
            <div class="col-md-3 menu">
                <ul class="ps-2 pe-2">
                    <li class="list-group-item off"><a href="index.php">Tarefas Pendentes</a></li>
                    <li class="list-group-item active"><a href="nova_tarefa.php">Nova Tarefa</a></li>
                    <li class="list-group-item off"><a href="todas_tarefas.php">Todas Tarefas</a></li>
                </ul>
            </div>

            <div class="col-md-9">
                <div class="container pagina">
                    <div class="row">
                        <div class="col">
                            <h4>Nova Tarefa:</h4>
                            <hr/>
                            <form action="tarefa_controller.php?acao=inserir" method="post">
                                <div class="form-group">
                                    <label></label>
                                    <input class="form-control" type="text" name="tarefa" placeholder="Exemplo: Comprar pão" required>
                                </div>
                                 <button class="button2"><span></span>
                                                        <span></span>
                                                        <span></span>
                                                        <span></span> Adicionar 
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div id="clock">
    <div class="date">{{ date }}
    <div class="time">{{ time }}
    <div class="text">Jhones Michael
    </div>



    </section>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js'></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/f0e17cbf2f.js" crossorigin="anonymous"></script>
    <script>

    var clock = new Vue({
    el: '#clock',
    data: {
        time: '',
        date: ''
    }
});

var week = ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'];
var timerID = setInterval(updateTime, 1000);
updateTime();
function updateTime() {
    var cd = new Date();
    clock.time = zeroPadding(cd.getHours(), 2) + ':' + zeroPadding(cd.getMinutes(), 2) + ':' + zeroPadding(cd.getSeconds(), 2);
    clock.date = zeroPadding(cd.getFullYear(), 4) + '-' + zeroPadding(cd.getMonth()+1, 2) + '-' + zeroPadding(cd.getDate(), 2) + ' ' + week[cd.getDay()];
};

function zeroPadding(num, digit) {
    var zero = '';
    for(var i = 0; i < digit; i++) {
        zero += '0';
    }
    return (zero + num).slice(-digit);
}

</script>
</body>

</html>