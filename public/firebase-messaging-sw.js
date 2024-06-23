try {
  self.addEventListener("notificationclick", (event) => {
    const clickedNotification = event.notification;
    const action = event.action;

    if (action === "openInBrowser") {
      // Open the URL in the browser
      const urlToOpen = clickedNotification.data.url;
      event.waitUntil(clients.openWindow(urlToOpen));
    } else {
      // Default action or other custom actions
      console.log("Notification clicked without any action");
    }
    clickedNotification.close(); // Close the notification
  });

  self.addEventListener("push", (event) => {
    const payload = event.data.json();

    // Handle the notification payload
    console.log("Push message payload:", payload);

    // Customize the notification
    const options = {
      body: payload.notification.body,
      icon: payload.notification.icon,
      title: payload.notification.title,
      image: payload.notification.image,
      data: {
        url: payload.data.url,
      },
      actions: [
        { action: "openInBrowser", title: "Click to Open" },
      ],
    };
    event.waitUntil(
      self.registration.showNotification(payload.notification.title, options)
    );
  });

} catch (error) {
  console.error("Failed to initialize Firebase:", error);
}
