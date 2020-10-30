<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>SC4 with php-form content</title>
    <link rel='stylesheet' type='text/css' href='https://lederich.de/global-styles/normalize.css'>
    <link rel='stylesheet' type='text/css' href='https://lederich.de/global-styles/boilerplate-8.0.0.css'>
    <link rel='stylesheet' type='text/css' href='../styles/global.css'>
    <link rel='stylesheet' type='text/css' href='../styles/custom.css'>
</head>
<body>
    <div id="head">
            <h1>Showcase 4: Loading a php-form which will do a POST by submit</h1>
        </div>
        <div id="main">
            <div class="wrapper">
                
                <div id="loader" class="ajax-loader" style="display:none">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>

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
            let ajaxLoader = document.getElementById('loader');

            /*
            readyState = 4 -> request is sent and response retrieved
            status = 200 -> OK
                */
            ajax.onreadystatechange = function () {

                if (this.readyState === 4 && this.status === 200) {

                    document.getElementById("ajax")
                        .innerHTML = this.response;

                }

            }

            ajax.open("GET", "sc4_data_ajax_form.php");
            ajax.send();
                    // event bubbling - instead of adding Event to 'ajax-form' (which is not available, because loaded by AJAX), we can add the Event to main
                    document.getElementById("main").addEventListener("submit", function(event){
                        // prevent Default HTML-submit action from the form and use only JS for submit
                        event.preventDefault();
                        // alert("Test");

                        let ajaxRequest = new XMLHttpRequest();
                        ajaxRequest.onreadystatechange = function() {
                            
                            // start loader animation
                            ajaxLoader.style.display = 'block';
                            
                            if (this.readyState === 4 && this.status === 200) {

                                // stop loader animation
                                ajaxLoader.style.display = 'none';

                                let data = JSON.parse(this.response);
                                document.getElementById("output")
                                    .innerHTML = 'The Value of the input is: <strong>' + data.test + '</strong>';

                            }

                        }

                        let form = event.target;
                        let formDataPairs = [];
                        let formDataString = "";
                        for (let index in form.elements) {
                            let currentElement = form.elements[index];
                            if (currentElement.type === "text") {
                                formDataPairs.push(
                                    encodeURIComponent(currentElement.name)
                                    + "="
                                    + encodeURIComponent(currentElement.value)
                                );
                            }
                        }
                        formDataString = formDataPairs.join('&')
                            .replace( /%20/g, '+');
                        ajaxRequest.open(form.method, form.action); 
                        ajaxRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        ajaxRequest.send(formDataString);
                    }, true);
                }

    </script>
</body>
</html>