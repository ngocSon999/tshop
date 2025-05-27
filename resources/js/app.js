import './bootstrap';

window.Echo.private('Send-Contact')
    .listen('ContactEvent', (e) => {
    });
