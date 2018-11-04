importScripts('https://www.gstatic.com/firebasejs/4.9.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/4.9.1/firebase-messaging.js');



var config = {
    apiKey: "your api key",
    authDomain: "auth domain",
    databaseURL: "database Url",
    projectId: "project id",
    storageBucket: "storage bucket",
    messagingSenderId: "messaging send ID"
};
firebase.initializeApp(config);

const  messaaging = firebase.messaging();

messaaging.setBackgroundMessageHandler(function (payload) {

    console.log('recive message .',payload);

    const notificationTitle = 'Background Message title';
    const notificationOption ={
      body:'Background Message body.',
      icon:'icon.png'
    };

    return self.registration.showNotification(notificationTitle,notificationOption);


});