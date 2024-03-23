function Toast(type, css, msg) {
    this.type = type;
    this.css = css;
    this.msg = msg;
}

var toasts = [
    // new Toast('info', 'toast-top-right', 'top full width')
];


toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": true,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

var i = 0;

function showToast() {
    var t = toasts[i];
    toastr.options.positionClass = t.css;
    toastr[t.type](t.msg);
    i++;
}

export function showNotification(type, css, msg) {
    toasts.push(new Toast(type, css, msg));
    showToast();
}