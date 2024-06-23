<!-- Firebase Messaging Notification -->
<script src="<?= base_url('firebase-app.js') ?>"></script>
<script type="module" src="https://www.gstatic.com/firebasejs/8.2.2/firebase-app.js"></script>
<script type="module" src="https://www.gstatic.com/firebasejs/8.2.2/firebase-messaging.js"></script>
<script type="module">
    var fcm_tokken = "";
    if ("serviceWorker" in navigator) {
        navigator.serviceWorker
            .register("/firebase-messaging-sw.js")
            .then(function(registration) {})
            .catch(function(error) {
                console.error("Service worker registration failed:", error);
            });
    } else {
        console.warn("Service workers are not supported in this browser.");
    }
    const firebaseConfig = {
        apiKey: "<?= @$_FirebaseMessagingNotification['apiKey'] ?>",
        authDomain: "<?= @$_FirebaseMessagingNotification['authDomain'] ?>",
        projectId: "<?= @$_FirebaseMessagingNotification['projectId'] ?>",
        storageBucket: "<?= @$_FirebaseMessagingNotification['storageBucket'] ?>",
        messagingSenderId: "<?= @$_FirebaseMessagingNotification['messagingSenderId'] ?>",
        appId: "<?= @$_FirebaseMessagingNotification['appId'] ?>"
    };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    const fcm = firebase.messaging();
    fcm.getToken({
            vapidKey: "<?= @$_FirebaseMessagingNotification['vapidKey'] ?>",
        })
        .then((currentToken) => {
            if (currentToken) {
                try {
                    $('#tokens').val(currentToken);
                } catch (error) {

                }
                // $.ajax({
                //     type: "POST",
                //     url: setFcmTokenUserApi, // Replace with your actual API endpoint
                //     data: {
                //         user_id: user_id,
                //         token: currentToken,
                //     },
                //     success: function(response) {
                //         console.log(response);
                //         // Handle success, e.g., show a success message to the user
                //     },
                //     error: function(error) {
                //         console.error(error);
                //         // Handle error, e.g., show an error message to the user
                //     },
                // });
            } else {
                console.log(
                    "No registration token available. Request permission to generate one."
                );
            }
        })
        .catch((err) => {
            console.log("An error occurred while retrieving token. ", err);
        });
    fcm.onMessage((data) => {
        console.log(data);
    });
</script>