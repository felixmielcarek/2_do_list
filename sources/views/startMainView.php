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

    <title>2 Do List</title>
    <link rel="icon" type="assets/images/ToDoLst-icon" href="views/assets/images/favicon.ico">
    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 1px grey;
            border-radius: 4px;
            background: #f1f1f0;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #0d6efd;
            border-radius: 10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #0b49a3;
        }

    </style>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cr??ation de liste</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="index.php">
                    <input type="hidden" name="action" value="add-list">
                    <div class="mb-3">
                        <label class="form-label">Titre de la liste</label>
                        <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               name="list-title"
                               required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input class="form-control" id="exampleInputPassword1" name="list-description" required>
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
        <!-- Public part of the screen -->
        <div class="col-md-6 p-0 bg-indigo h-md-100 white" id="yellow">
            <div class="title-bar">
                <a href="index.php" style="color: black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor"
                         class="bi bi-globe-americas" viewBox="0 0 16 16">
                        <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM2.04 4.326c.325 1.329 2.532 2.54 3.717 3.19.48.263.793.434.743.484-.08.08-.162.158-.242.234-.416.396-.787.749-.758 1.266.035.634.618.824 1.214 1.017.577.188 1.168.38 1.286.983.082.417-.075.988-.22 1.52-.215.782-.406 1.48.22 1.48 1.5-.5 3.798-3.186 4-5 .138-1.243-2-2-3.5-2.5-.478-.16-.755.081-.99.284-.172.15-.322.279-.51.216-.445-.148-2.5-2-1.5-2.5.78-.39.952-.171 1.227.182.078.099.163.208.273.318.609.304.662-.132.723-.633.039-.322.081-.671.277-.867.434-.434 1.265-.791 2.028-1.12.712-.306 1.365-.587 1.579-.88A7 7 0 1 1 2.04 4.327Z"/>
                    </svg>
                </a>
                <h2 class="title">Listes publiques</h2>
            </div>
            <form method="post" action="index.php">
                <input type="hidden" name="action" value="search-list">
                <div class="input-group search">
                    <div class="form-outline">
                        <input type="search" id="search" name="list-title" class="form-control"/>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </div>
            </form>

            <div class=" public_list" style=" height: 650px">
                <?php
                if (isset($pubLists) && count($pubLists) > 0) {
                    foreach ($pubLists as $list) {
                        ?>
                        <!-- Modal -->
                        <div class="modal fade " id="addTask<?= $list->getId() ?>" tabindex="1"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cr??ation
                                            d'une t??che dans la liste </h1>
                                        <button type="button" class="btn-close"
                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post"
                                              action="index.php">
                                            <input type="hidden" name="action" value="add-task">
                                            <div class="mb-3">
                                                <label class="form-label">Contenu de la
                                                    t??che</label>
                                                <input class="form-control" id="exampleInputEmail1"
                                                       aria-describedby="emailHelp" name="content"
                                                       required>
                                                <input type="hidden" class="form-control"
                                                       name="id-list"
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
                                            <h4 style="background: lightblue;
                                                    background: radial-gradient(circle farthest-corner at center center, #0042a6 0%, #49b2d5 100%);
                                                    -webkit-background-clip: text;
                                                    -webkit-text-fill-color: transparent;
                                                    "> <?= $list->getTitle() ?> </h4>
                                        </div>
                                        <div class="col-6 col-md-4">
                                            <div class="list-bouton">
                                                <button type="submit" class="btn btn-outline-primary add rounded-pill"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#addTask<?= $list->getId() ?>">Ajouter t??ches
                                                </button>
                                                <form method="post"
                                                      action="index.php">
                                                    <input type="hidden" name="action" value="delete-list">
                                                    <input type="hidden" name="id-list" value="<?= $list->getId() ?>">
                                                    <button style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;"
                                                            type="submit">
                                                        <div class="btn-outline-danger rounded-pill btn-sm del">
                                                            <i class="fa fa-times"></i>
                                                        </div>
                                                    </button>
                                                </form>
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
                                        $total = 0;
                                        $done = 0;
                                        foreach ($pubTasks as $task) {
                                            if ($task->getIdList() == $list->getId()) {
                                                if ($task->getIsDone() == 1) {
                                                    $done = $done + 1;
                                                }
                                                $total = $total + 1;
                                                ?>
                                                <li class="list-group-item d-flex justify-content-between"
                                                    style="<?php if ($task->getIsDone() == 1) echo "background-color: #f2f2f2" ?> ">
                                                    <div class="container-fluid p-0" style="word-break: break-all ">
                                                        <form action="index.php"
                                                              method="POST">
                                                            <input type="hidden" name="id-task"
                                                                   value="<?= $task->getId() ?>">
                                                            <input type="hidden" name="action" value="valid-task">
                                                            <input class="form-check-input me-1" type="checkbox"
                                                                   onChange="submit();"
                                                                <?php if ($task->getIsDone() == 1) echo "checked " ?>>
                                                            <label class="form-check-label strikethrough"
                                                                   for="firstCheckbox"><?php echo $task->getContent();
                                                                ?></label>
                                                        </form>
                                                    </div>
                                                    <form method="post"
                                                          action="index.php">
                                                        <input type="hidden" name="action" value="delete-task">
                                                        <input type="hidden" name="id-list"
                                                               value="<?= $task->getId() ?>">
                                                        <button style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;"
                                                                type="submit">
                                                            <div class="btn rounded-pill btn-sm del">
                                                                <i class="fa fa-minus" style="color: grey"></i>
                                                            </div>
                                                        </button>
                                                    </form>
                                                </li>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </ul>

                            </div>
                            <div class="progress">
                                <?php
                                if (!isset($total) || $total == 0) {
                                    $percentage = 0;
                                } else {
                                    $percentage = $done * 100 / $total;
                                }
                                ?>
                                <div class="progress-bar progress-bar-striped" role="progressbar"
                                     aria-label="striped example"
                                     aria-valuenow="75" aria-valuemin="0"
                                     aria-valuemax="100"
                                     style="width: <?= $percentage ?>%; <?php if ($percentage == 100) {
                                         echo "background-color: #14d914";
                                     } ?>"></div>
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

            <button type="button"
                    class="btn btn-outline-primary add_list rounded-pill "
                    data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                Ajouter une nouvelle liste
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                     class="bi bi-plus-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </button>
        </div>
        <!-- Private part of the screen -->
        <div class="col-md-6 p-0 bg-indigo h-md-100 grey" id="grey">
            <div class="title-bar">
                <a href="index.php" style="color: black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor"
                         class="bi bi-incognito" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="m4.736 1.968-.892 3.269-.014.058C2.113 5.568 1 6.006 1 6.5 1 7.328 4.134 8 8 8s7-.672 7-1.5c0-.494-1.113-.932-2.83-1.205a1.032 1.032 0 0 0-.014-.058l-.892-3.27c-.146-.533-.698-.849-1.239-.734C9.411 1.363 8.62 1.5 8 1.5c-.62 0-1.411-.136-2.025-.267-.541-.115-1.093.2-1.239.735Zm.015 3.867a.25.25 0 0 1 .274-.224c.9.092 1.91.143 2.975.143a29.58 29.58 0 0 0 2.975-.143.25.25 0 0 1 .05.498c-.918.093-1.944.145-3.025.145s-2.107-.052-3.025-.145a.25.25 0 0 1-.224-.274ZM3.5 10h2a.5.5 0 0 1 .5.5v1a1.5 1.5 0 0 1-3 0v-1a.5.5 0 0 1 .5-.5Zm-1.5.5c0-.175.03-.344.085-.5H2a.5.5 0 0 1 0-1h3.5a1.5 1.5 0 0 1 1.488 1.312 3.5 3.5 0 0 1 2.024 0A1.5 1.5 0 0 1 10.5 9H14a.5.5 0 0 1 0 1h-.085c.055.156.085.325.085.5v1a2.5 2.5 0 0 1-5 0v-.14l-.21-.07a2.5 2.5 0 0 0-1.58 0l-.21.07v.14a2.5 2.5 0 0 1-5 0v-1Zm8.5-.5h2a.5.5 0 0 1 .5.5v1a1.5 1.5 0 0 1-3 0v-1a.5.5 0 0 1 .5-.5Z"/>
                    </svg>
                </a>
                <h2 class="title">Listes priv??es</h2>
                <?php if (isset($_SESSION['user-id']) && $_SESSION['user-id'] != null && isset($_SESSION['user-name']) && $_SESSION['user-name'] != null) { ?>
                    <form style="margin-left: 500px" method="post"
                          action="index.php">
                        <input type="hidden" name="action" value="logout">
                        <button style="background: none; color: inherit; border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;"
                                type="submit">
                            <div type="button" class="btn btn-outline-secondary">Se d??connecter</div>
                        </button>
                    </form>
                <?php } ?>
            </div>
