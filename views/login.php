<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 400px;
            max-width: 100%;
        }
        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .card-body {
            padding: 40px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-control {
            border-radius: 20px;
        }
        .btn-login, .btn-register {
            border-radius: 20px;
            padding: 12px 20px;
            width: 100%;
            font-weight: bold;
            transition: background-color 0.3s ease;
            text-transform: uppercase;
        }
        .btn-login {
            background-color: #007bff;
            border: none;
            color: white;
        }
        .btn-register {
            background-color: #28a745;
            border: none;
            color: white;
        }
        .btn-login:hover, .btn-register:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="card">
        <img src="https://source.unsplash.com/600x200/?nature,water" class="card-img-top" alt="Imagem de fundo">
        <div class="card-body">
            <h3 class="text-center mb-4">Bem-vindo de volta!</h3>
            <?php
                if (isset($_SESSION['error'])) {
                    echo "<div class='alert alert-danger'>".$_SESSION['error']."</div>";
                    unset($_SESSION['error']);
                }
            ?>
            <form action="../controllers/LoginController.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="senha" placeholder="Senha" required>
                </div>
                <button type="submit" class="btn btn-primary btn-login" name="login">Entrar</button>
                <a href="add_user.php" class="btn btn-success btn-register">Cadastrar</a>
            </form>
        </div>
    </div>
</body>
</html>
