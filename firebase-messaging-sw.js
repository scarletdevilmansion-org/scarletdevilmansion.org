importScripts('https://www.gstatic.com/firebasejs/8.1.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.1.2/firebase-messaging.js');

firebase.initializeApp({
  apiKey: "AIzaSyAQm2fa7HY-2viENDgX2SWMKTiLN0p8slU",
  authDomain: "web-notifications-14953.firebaseapp.com",
  projectId: "web-notifications-14953",
  storageBucket: "web-notifications-14953.appspot.com",
  messagingSenderId: "454227064299",
  appId: "1:454227064299:web:74bda8f66aecddbbab95ae",
  measurementId: "G-W72GTGZGP4"
});


const messaging = firebase.messaging();