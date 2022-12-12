<section class="login-section">
    <div class="container">
        <div class="row justify-content-sm-center h-100">
            <div class="col-xxl-6 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <h1 class="fs-4 card-title fw-bold mb-4">Connexion</h1>
                        <form action="index.php?action=login" method="POST" class="needs-validation" novalidate=""
                              autocomplete="off">
                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="name">Pseudo</label>
                                <input id="name" type="text" class="form-control" name="name"
                                       required
                                       autofocus>
                            </div>

                            <div class="mb-3">
                                <div class="mb-2 w-100">
                                    <label class="text-muted" for="passwd">Mot de passe</label>
                                </div>
                                <input id="passwd" type="text" class="form-control" name="passwd" required>
                            </div>

                            <div class="d-flex align-items-center">
                                <button type="submit" class="btn btn-primary ms-auto">
                                    Se connecter
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer py-3 border-0">
                        <div class="text-center">
                            Vous n'avez pas de compte ? <a href="register.html" class="text-dark">Inscrivez-vous</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>