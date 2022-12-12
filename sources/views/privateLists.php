<div class="input-group search">
    <a href="index.php?action=logout">Se déconnecter</a>

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

<div class=" private_list">
    <?php
    if (isset($pvLists) && count($pvLists) > 0) {
        foreach ($pvLists as $list) {
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
                                  action="index.php?action=add-pv-task">
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
                                <h4 style="background: <?= $this->rand_color() ?>;
                                        background: radial-gradient(circle farthest-corner at center center, <?= $this->rand_color() ?> 0%, <?= $this->rand_color() ?> 100%);
                                        -webkit-background-clip: text;
                                        -webkit-text-fill-color: transparent;
                                        "> <?= $list->getTitle() ?> </h4>
                            </div>
                            <div class="col-6 col-md-4">
                                <div class="list-bouton">

                                    <button type="submit" class="btn btn-outline-primary add rounded-pill"
                                            data-bs-toggle="modal"
                                            data-bs-target="#addTask<?= $list->getId() ?>">Ajouter tâches
                                    </button>


                                    <a href="index.php?action=delete-pv-list&id=<?= $list->getId() ?>">
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
                        if (isset($pvTasks) && count($pvTasks) > 0) {
                            foreach ($pvTasks as $task) {
                                if ($task->getIdList() == $list->getId()) {
                                    ?>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div class="container-fluid p-0" style="word-break: break-all ">
                                            <form action="index.php?action=valid-task&id=<?= $task->getId() ?>"
                                                  method="POST">
                                                <input class="form-check-input me-1" type="checkbox"
                                                       onChange='submit();'
                                                       name="id"
                                                <?php if ($task->getIsDone() == 1) echo "checked " ?>
                                                ">

                                                <label class="form-check-label strikethrough"
                                                       for="firstCheckbox"><?php echo $task->getContent();
                                                    ?></label>
                                            </form>
                                        </div>
                                        <a href="index.php?action=delete-pv-task&id=<?= $task->getId() ?>">
                                            <div class="btn rounded-pill btn-sm del">
                                                <i class="fa fa-minus" style="color: grey"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </ul>

                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                         aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0"
                         aria-valuemax="100" style="width: 100%"></div>
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
        class="btn btn-outline-primary add_list rounded-pill shadow-sm p-3 mb-5 bg-body rounded"
        data-bs-toggle="modal"
        data-bs-target="#exampleModal">
    Ajouter une nouvelle liste
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
         class="bi bi-plus-square" viewBox="0 0 16 16">
        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
    </svg>
</button>