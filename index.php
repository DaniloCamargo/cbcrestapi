<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de clubes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <div class="container">
        <h1 class="text-center my-5">CBC</h1>

        <div class="card mb-5">
            <div class="card-body">
                <h5 class="card-title">Cadastro de clubes</h5>
                
                <form action="cadastrar.php" method="POST" class="row align-items-end g-3">
                    <div class="col-auto">
                        <label for="clube" class="form-label">Nome:</label>
                        <input type="text" name="clube" class="form-control" required>
                    </div>

                    <div class="col-auto">
                        <label for="saldo_disponivel" class="form-label">Saldo disponível:</label>
                        <input type="text" name="saldo_disponivel" class="form-control" required>
                    </div>

                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mb-5">
            <div class="card-body">
                <h5 class="card-title">Lista de clubes</h5>
                
                <table class="table">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Saldo disponível</th>
                        </tr>
                    </thead>
                    <tbody id="tabela-clubes">
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Consumir recursos</h5>
                
                <form id="consumir" class="row align-items-end g-3">
                    <div class="col-auto">
                        <label for="clube_id" class="form-label">Clube:</label>
                        <select name="clube_id" id="get-clubes" class="form-select" required>
                        </select>
                    </div>

                    <div class="col-auto">
                        <label for="recurso_id" class="form-label">Recursos:</label>
                        <select name="recurso_id" class="form-select" required>
                            <option value="1">Recurso para passagens</option>
                            <option value="2">Recurso para hospedagens</option>
                        </select>
                    </div>

                    <div class="col-auto">
                        <label for="valor_consumo" class="form-label">Valor de consumo:</label>
                        <input type="text" name="valor_consumo" class="form-control" required>
                    </div>

                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Consumir</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Resposta do formulário</h5>
                <div class="resp-consumir"></div>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>