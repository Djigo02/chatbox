    <section class="msger" id="msger">
        <a id="l" href="#click"></a>
        <header class="msger-header">
            <div class="msger-header-title fw-bold">
                <i class="fas fa-comment-alt"></i>TEAM BI
            </div>
            <div class=" fw-bold">
                Bienvenue <?= $_SESSION['utilisateur']['prenomUser'], " ", $_SESSION['utilisateur']['nomUser'] ?>
            </div>
            <div class="msger-header-options">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-cog"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <button class="dropdown-item" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#infoperso">Mes informations</button>
                        <a class="dropdown-item bg-danger" href="http://localhost/projet/chatbox/?action=deconnexion">Se deconnecter</a>
                    </ul>
                </div>
            </div>
        </header>

        <main class="msger-chat" id="container_message">

            <?php if (isset($message)) {
                foreach ($message as $key => $value) { ?>
                    <div class="msg <?= (isset($_SESSION['utilisateur']) && $_SESSION['utilisateur']['idUser'] == $value['idUserF']) ? 'right-msg' : 'left-msg' ?>">
                        <div class="msg-img" style='background-image: url("RR2.jpg")'></div>

                        <div class="msg-bubble">
                            <div class="msg-info">
                                <div class="msg-info-name"><?php echo $value['prenomUser'] . " " . $value['nomUser'] ?></div>
                                <div class="msg-info-time"><?= $value['dateMessage'] ?></div>
                            </div>

                            <div class="msg-text">
                                <?= $value['content'] ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div id="click"></div>
            <?php
            } else {
                echo "y'a rien";
            } ?>


        </main>
        <form method="post" action="http://localhost/projet/chatbox/?action=send" class="msger-inputarea">
            <textarea type="text" id="content" name="content" class="msger-input" placeholder="Enter your message..."></textarea>
            <button type="submit" id="send" name="send" class="msger-send-btn">Envoyer</button>
        </form>
    </section>



    <!-- Modal -->
    <div class="modal  fade" id="infoperso" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Mes informations</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card col-8 offset-2">
                        <div class="card-header">
                        <img class="col-6 offset-3" style="width:300px;height:300px;border-radius:50%" src="assets/image/RR2.jpg" alt="">
                        </div>
                        <div class="card-body">
                        <form action="" method="post">
                            <div class="row form-group">
                                <label for=""></label>
                                <input class="form-control col-6"/>
                            </div>
                        </form>
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-bs-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-success">Sauvegarder</button>
            </div>
        </div>
    </div>
    </div>

    <script>
        //recuperation des informations de la session [utilisateur connecter]
        id_session = <?= json_encode($_SESSION['utilisateur']['idUser']) ?>;
        //msgr recuperer la section de messagerie
        msger = document.getElementById("msger");
        //content recuperer l'input du message 
        content = document.getElementById("content");
        send = document.getElementById("send");
        send.type = "button";
        send.onclick = function() {
            if (content.value.trim() != "") {
                send.type = "submit";
            } else {
                send.type = "button";
                content.value = "";
            }
        }

        function autoload() {
            document.getElementById("l").click();
        }
        //Au chargement remener automatiquement au dernier message
        msger.onload = autoload();

        //COntainer des messages
        container_message = document.querySelector('#container_message');
        //all_message tableau contenant tous les messages
        all_message = <?= json_encode($message) ?>;
        // all_message = [];
        interval = setInterval(function() {
            $.ajax({
                url: "http://localhost/projet/ChatBox/api/discussion.php",
                dataType: "JSON",
                method: "GET",
                success: function(data) {
                    if (data.length > all_message.length) {
                        container_message.innerHTML = "";
                        all_message = data;
                        for (i = 0; i < data.length; i++) {
                            if (id_session == data[i].idUser) {
                                container_message.innerHTML += `
                            <div class="msg right-msg">
                                <div class="msg-img" style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)">
                                </div>
                                <div class="msg-bubble">
                                    <div class="msg-info">
                                        <div class="msg-info-name">${data[i].prenomUser} ${data[i].nomUser}</div>
                                        <div class="msg-info-time">${data[i].dateMessage}</div>
                                    </div>

                                    <div class="msg-text">
                                        ${data[i].content}
                                    </div>
                                </div>
                            </div>
                        `;
                            } else {
                                container_message.innerHTML += `
                            <div class="msg left-msg">
                                <div class="msg-img" style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)">
                                </div>

                                <div class="msg-bubble">
                                    <div class="msg-info">
                                        <div class="msg-info-name">${data[i].prenomUser} ${data[i].nomUser}</div>
                                        <div class="msg-info-time">${data[i].dateMessage}</div>
                                    </div>

                                    <div class="msg-text">
                                        ${data[i].content}
                                    </div>
                                </div>
                            </div>
                        `;
                            }
                        }
                        if (i == data.length) {
                            container_message.scrollTop = container_message.scrollHeight;
                        }
                    }

                }
            });
        }, 1000);
    </script>