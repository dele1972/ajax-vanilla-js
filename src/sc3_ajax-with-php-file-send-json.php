<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>SC3 with phpfile json content</title>
    <link rel='stylesheet' type='text/css' href='https://lederich.de/global-styles/normalize.css'>
    <link rel='stylesheet' type='text/css' href='https://lederich.de/global-styles/boilerplate-8.0.0.css'>
    <link rel='stylesheet' type='text/css' href='../styles/global.css'>
    <link rel='stylesheet' type='text/css' href='../styles/custom.css'>
</head>
<body>
    <div id="head">
            <h1>Showcase 3: Loading a php file wich sends a JSON Object</h1>
        </div>
        <div id="main">
            <div class="wrapper">
                
                <!-- In this Section the content will be filled by AJAX and an external file with html fragments -->
                <label for="ajax-content">AJAX content</label>
                <section id="ajax" name="ajax-content"></section>

            </div>
        </div>
    </div>

    <!-- Here comes the Script to handle AJAX -->
    <script>
        window.onload = function(){
            
            let ajax = new XMLHttpRequest();

            /*
            readyState = 4 -> request is sent and response retrieved
            status = 200 -> OK
                */
            ajax.onreadystatechange = function () {

                if (this.readyState === 4 && this.status === 200) {

                    let data = JSON.parse(this.response);
                    document.getElementById("ajax").innerHTML = data.test;

                }

            }

            ajax.open("GET", "sc3_data_php-send-json.php");
            ajax.send();

        }
    </script>
</body>
</html>