
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>



    <script src="https://www.gstatic.com/firebasejs/4.9.1/firebase.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.9.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.9.1/firebase-messaging.js"></script>
    <script src="jquery-3.3.1.min.js"></script>



    <script>
        navigator.serviceWorker.register('sw.js');



        
        var config = {
            apiKey: "your api key",
            authDomain: "auth domain",
            databaseURL: "database Url",
            projectId: "project id",
            storageBucket: "storage bucket",
            messagingSenderId: "messaging send ID"
        };
        firebase.initializeApp(config);

        const messaging = firebase.messaging();




        messaging.requestPermission().then(function () {
            console.log('Have permission');
            return messaging.getToken();
        }).then(function (token) {


            console.log(token);
            sendToServer(token);

        }).catch(function (err) {

            console.log("Error Occur");
        });




        function sendToServer(token) {

            $.post("save.php",{token:token },function (response) {

            });
        }


        messaging.onMessage(function(payload) {
            console.log('Message received. ', payload);

            notificationTitle =payload.data.title;
            notificationOption={
                body: payload.data.body
            }

        });




        function isTokenSentToServer() {
            return window.localStorage.getItem('sentToServer') === '1';
        }
        function setTokenSentToServer(sent) {
            window.localStorage.setItem('sentToServer', sent ? '1' : '0');
        }

    </script>













</head>
<body>

</body>
</html>