import Echo from "laravel-echo";

window.Pusher = require("pusher-js");
console.log("inside boottrao .js");
window.Echo = new Echo({
    broadcaster: "pusher",
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    encrypted: false
});
