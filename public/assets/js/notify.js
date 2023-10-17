// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher("41075dac63758a9bd38f", {
    cluster: "eu",
});

var channel = pusher.subscribe(`App.Models.Admin.${User_id}`);

channel.bind("BroadcastNotification", function (data) {
    alert(JSON.stringify(data));
    console.log(data);
});
