<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salvar Links Tech</title>

    <link rel="stylesheet" href="./styles/style.css">

    <!-- Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
      crossorigin="anonymous"
    />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap"
      rel="stylesheet"
    />
</head>
<body>
    <header id="header">
        <nav class="navbar navbar-dark bg-dark pt-3">
            <a href="index.php" class="navbar-brand mx-auto">
                <h2>Salvar Links Tech</h2>
            </a>
        </nav>
    </header>
    <div id="hero">
        <div class="container">
            <input type="text" class="form-control w-100" id="txtSearch" placeholder="Buscar Links">
            <table class="table table-striped mt-2">
                <tbody id="result">
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap -->
    <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
            crossorigin="anonymous"
    ></script>
    <script
            src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
            crossorigin="anonymous"
    ></script>

    <!-- Font Awesome -->
    <script
            src="https://kit.fontawesome.com/befb5dabd2.js"
            crossorigin="anonymous"
    ></script>

    <!-- Jquery -->
    <script
        src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
        crossorigin="anonymous"
    ></script>

    <script>

        $(window).on("load" ,function(){
            let search = {
                "search": " "
            }

            search = JSON.stringify(search);

            $.post("https://salvarlinkstech.tk/devgo_crawler.php", search, function(response){
                let tableLinks = "";
                if(response.result){
                    response.data.forEach(link => {
                        tableLinks += `<tr>
                                            <td style="width:  80%"><a style="text-decoration: none; " target="blank" href="${link[1]}">${link[0]}</a></td>
                                            <td class=""><a href="/delete.php?link_name=${link[0]}"><i class="fa-solid fa-trash"></i></a></td>
                                            <td class=""><a href="/update.php?link_name=${link[0]}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                        </tr>`
                    });
                    $('#result').html(
                        tableLinks
                    );
                }
            });
        });

        $('#txtSearch').keyup(function(){
            let search = {
                "search":$('#txtSearch').val()
            }

            search = JSON.stringify(search);

            $.post("https://salvarlinkstech.tk/devgo_crawler.php", search, function(response){
                let tableLinks = "";
                if(response.result){
                    response.data.forEach(link => {
                        tableLinks += `<tr>
                                            <td style="width:  80%"><a style="text-decoration: none;" target="blank" href="${link[1]}">${link[0]}</a></td>
                                            <td class=""><a href="/delete.php?link_name=${link[0]}"><i class="fa-solid fa-trash"></i></a></td>
                                            <td class=""><a href="/update.php?link_name=${link[0]}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                        </tr>`
                    });
                    $('#result').html(
                        tableLinks
                    );
                }
            });
        });

    </script>
</body>
</html>