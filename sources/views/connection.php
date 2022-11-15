<style>
    .login-form {
        width: 340px;
        font-size: 15px;
    }

    .login-form form {
        background: #f7f7f7;
        box-shadow: 1px 0px 41px -3px rgba(0, 0, 0, 0.29);
        -webkit-box-shadow: 1px 0px 41px -3px rgba(0, 0, 0, 0.29);
        -moz-box-shadow: 1px 0px 41px -3px rgba(0, 0, 0, 0.29);
        padding: 30px;
    }

    .login-form h2 {
        margin: 0 0 15px;
    }

    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
        margin-bottom: 20px;
    }

    .btn {
        font-size: 15px;
        font-weight: bold;
    }

    .valider {
        width: 100%;
        margin-bottom: 10px !important;
        border-radius: 15px !important;
    }


    .blue, form-control:focus {
        color: #0d6efd !important;
    }

    .cancel {
        color: gray !important;
        text-align: center;
    }

</style>
</head>
<body>
<div class="login-section">
    <div class="login-form rounded">
        <form action="/examples/actions/confirmation.php" method="post">
            <h2 class="text-center">Connexion</h2>
            <div class="form-group">
                <input type="text" class="form-control blue" placeholder="Pseudo" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control blue" placeholder="Mot de passe" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block valider">Se connecter</button>
            </div>
            <a class="cancel" href="index.php"><p>Annuler</p></a>
        </form>
    </div>
</div>
</body>
</html>

<? php ?>
