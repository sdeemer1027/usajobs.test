import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import toastr from 'toastr';

// Initialize Toastr with options
toastr.options = {
    closeButton: true,          // Show a close button
    progressBar: true,          // Show a progress bar
    positionClass: 'toast-top-right', // Position of the notification
    timeOut: 5000,              // Time in milliseconds to auto-close the notification (5 seconds)
    extendedTimeOut: 2000,      // Additional time in milliseconds if a user hovers over the notification
    preventDuplicates: false,   // Prevent duplicate notifications
    newestOnTop: true,          // Show new notifications on top
    // You can add more options as needed
};

window.toastr = toastr; // Make Toastr available globally
