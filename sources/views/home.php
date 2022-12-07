<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="views/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href=
    "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"/>

    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href=
    "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"/>

    <title>2DoList</title>
    <link rel="icon" type="assets/images/ToDoLst-icon" href="views/assets/images/favicon.ico">
</head>
<body>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Création de liste</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="http://2dolistv3/sources/?action=addList">
                    <div class="mb-3">
                        <label class="form-label">Titre de la liste</label>
                        <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title"
                               required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input class="form-control" id="exampleInputPassword1" name="description" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<div class="container-fluid h-100 ">
    <div class="row justify-content-center h-100">
        <div class="col-md-6 p-0 bg-indigo h-md-100 white" id="yellow">
            <div class="title-bar">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-globe2"
                     viewBox="0 0 16 16">
                    <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855-.143.268-.276.56-.395.872.705.157 1.472.257 2.282.287V1.077zM4.249 3.539c.142-.384.304-.744.481-1.078a6.7 6.7 0 0 1 .597-.933A7.01 7.01 0 0 0 3.051 3.05c.362.184.763.349 1.198.49zM3.509 7.5c.036-1.07.188-2.087.436-3.008a9.124 9.124 0 0 1-1.565-.667A6.964 6.964 0 0 0 1.018 7.5h2.49zm1.4-2.741a12.344 12.344 0 0 0-.4 2.741H7.5V5.091c-.91-.03-1.783-.145-2.591-.332zM8.5 5.09V7.5h2.99a12.342 12.342 0 0 0-.399-2.741c-.808.187-1.681.301-2.591.332zM4.51 8.5c.035.987.176 1.914.399 2.741A13.612 13.612 0 0 1 7.5 10.91V8.5H4.51zm3.99 0v2.409c.91.03 1.783.145 2.591.332.223-.827.364-1.754.4-2.741H8.5zm-3.282 3.696c.12.312.252.604.395.872.552 1.035 1.218 1.65 1.887 1.855V11.91c-.81.03-1.577.13-2.282.287zm.11 2.276a6.696 6.696 0 0 1-.598-.933 8.853 8.853 0 0 1-.481-1.079 8.38 8.38 0 0 0-1.198.49 7.01 7.01 0 0 0 2.276 1.522zm-1.383-2.964A13.36 13.36 0 0 1 3.508 8.5h-2.49a6.963 6.963 0 0 0 1.362 3.675c.47-.258.995-.482 1.565-.667zm6.728 2.964a7.009 7.009 0 0 0 2.275-1.521 8.376 8.376 0 0 0-1.197-.49 8.853 8.853 0 0 1-.481 1.078 6.688 6.688 0 0 1-.597.933zM8.5 11.909v3.014c.67-.204 1.335-.82 1.887-1.855.143-.268.276-.56.395-.872A12.63 12.63 0 0 0 8.5 11.91zm3.555-.401c.57.185 1.095.409 1.565.667A6.963 6.963 0 0 0 14.982 8.5h-2.49a13.36 13.36 0 0 1-.437 3.008zM14.982 7.5a6.963 6.963 0 0 0-1.362-3.675c-.47.258-.995.482-1.565.667.248.92.4 1.938.437 3.008h2.49zM11.27 2.461c.177.334.339.694.482 1.078a8.368 8.368 0 0 0 1.196-.49 7.01 7.01 0 0 0-2.275-1.52c.218.283.418.597.597.932zm-.488 1.343a7.765 7.765 0 0 0-.395-.872C9.835 1.897 9.17 1.282 8.5 1.077V4.09c.81-.03 1.577-.13 2.282-.287z"/>
                </svg>
                <h2 class="title">Listes publiques</h2>
            </div>
            <div class="input-group search">
                <div class="form-outline">
                    <input type="search" id="form1" class="form-control"/>
                </div>
                <button type="button" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </div>

            <div class=" public_list">
                <?php
                if (isset($pubLists) && count($pubLists) > 0) {
                    foreach ($pubLists as $list) {
                        ?>
                        <!-- Modal -->
                        <div class="modal fade " id="addTask<?= $list->getId() ?>" tabindex="-1"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Création
                                            d'une tâche dans la liste </h1>
                                        <button type="button" class="btn-close"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post"
                                              action="http://2dolistv3/sources/?action=addTask">
                                            <div class="mb-3">
                                                <label class="form-label">Contenu de la
                                                    tâche</label>
                                                <input class="form-control" id="exampleInputEmail1"
                                                       aria-describedby="emailHelp" name="content"
                                                       required>
                                                <input type="hidden" class="form-control"
                                                       name="idList"
                                                       value="<?= $list->getId() ?>"
                                                       required>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Annuler
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    Ajouter
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <div class="container-fluid p-0">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 col-md-8">
                                            <h4> <?= $list->getTitle() ?> </h4>
                                        </div>
                                        <div class="col-6 col-md-4">
                                            <div class="list-bouton">

                                                <button type="submit" class="btn btn-outline-primary add rounded-pill"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#addTask<?= $list->getId() ?>">Ajouter tâches
                                                </button>


                                                <a href="index.php?action=deleteList&id=<?= $list->getId() ?>">
                                                    <div class=" btn-outline-danger rounded-pill btn-sm del">
                                                        <i class="fa fa-times"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text"><?= $list->getDescription() ?>.</p>
                                <ul class="list-group">
                                    <?php
                                    if (isset($pubTasks) && count($pubTasks) > 0) {
                                        foreach ($pubTasks as $task) {
                                            if ($task->getIdList() == $list->getId()) {
                                                ?>
                                                <li class="list-group-item list-group-item-action">
                                                    <input class="form-check-input me-1" type="checkbox" value=""
                                                           id="firstCheckbox">
                                                    <label class="form-check-label"
                                                           for="firstCheckbox"><?= $task->getContent() ?></label>
                                                </li>
                                                <?php
                                            } ?>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>

                            </div>
                        </div>
                        <div class="container">
                            <div class="row justify-content-center">
                                <h8 class="text-center"><?= $list->getDateOfCreation() ?></h8>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>

            </div>
            <button type="button" class="btn btn-outline-primary add_list rounded-pill" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                Ajouter une nouvelle liste
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                     class="bi bi-plus-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </button>
        </div>
        <div class="col-md-6 p-0 bg-indigo h-md-100 grey">
            <div class="title-bar">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor"
                     class="bi bi-incognito" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="m4.736 1.968-.892 3.269-.014.058C2.113 5.568 1 6.006 1 6.5 1 7.328 4.134 8 8 8s7-.672 7-1.5c0-.494-1.113-.932-2.83-1.205a1.032 1.032 0 0 0-.014-.058l-.892-3.27c-.146-.533-.698-.849-1.239-.734C9.411 1.363 8.62 1.5 8 1.5c-.62 0-1.411-.136-2.025-.267-.541-.115-1.093.2-1.239.735Zm.015 3.867a.25.25 0 0 1 .274-.224c.9.092 1.91.143 2.975.143a29.58 29.58 0 0 0 2.975-.143.25.25 0 0 1 .05.498c-.918.093-1.944.145-3.025.145s-2.107-.052-3.025-.145a.25.25 0 0 1-.224-.274ZM3.5 10h2a.5.5 0 0 1 .5.5v1a1.5 1.5 0 0 1-3 0v-1a.5.5 0 0 1 .5-.5Zm-1.5.5c0-.175.03-.344.085-.5H2a.5.5 0 0 1 0-1h3.5a1.5 1.5 0 0 1 1.488 1.312 3.5 3.5 0 0 1 2.024 0A1.5 1.5 0 0 1 10.5 9H14a.5.5 0 0 1 0 1h-.085c.055.156.085.325.085.5v1a2.5 2.5 0 0 1-5 0v-.14l-.21-.07a2.5 2.5 0 0 0-1.58 0l-.21.07v.14a2.5 2.5 0 0 1-5 0v-1Zm8.5-.5h2a.5.5 0 0 1 .5.5v1a1.5 1.5 0 0 1-3 0v-1a.5.5 0 0 1 .5-.5Z"/>
                </svg>
                <h2 class="title">Listes privées</h2>
            </div>
            <div class="login-section">
                <button type="button " class="btn btn-outline-primary signin rounded-pill">Se connecter</button>
                <button type="button" class="btn btn-primary signup rounded-pill">S'inscrire</button>
            </div>
            <p class="text-center" style="padding-left: 100px; padding-right: 100px;"><U>Connectez-vous</U> pour accéder
                à la liste de vos tâches personnelles</p>
        </div>
    </div>
</div>
</body>
</html>
