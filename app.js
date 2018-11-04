// var config = {
//     apiKey: "AIzaSyCVUdkDaNYbruS7q66QvMPiFy7hjNvqMzY",
//     authDomain: "sampleapi-f035d.firebaseapp.com",
//     databaseURL: "https://sampleapi-f035d.firebaseio.com",
//     projectId: "sampleapi-f035d",
//     storageBucket: "sampleapi-f035d.appspot.com",
//     messagingSenderId: "418361974073"
// };
// firebase.initializeApp(config);
//
//
// const messaging = firebase.messaging();
//
//
//
//
// messaging.requestPermission().then(function () {
//    console.log('Have permission');
//    return messaging.getToken();
// }).then(function (token) {
//
//        console.log(token);
//        sendToServer(token);
//
//     }).catch(function (err) {
//     console.log("Error Occur");
// });
//
//
//
//
// function sendToServer(token) {
//
//     $.post("save.php",{token:token },function (response) {
//         console.log(response);
//     });
// }