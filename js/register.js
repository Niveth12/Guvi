$(document).ready(function() {
    $('#registerBtn').click(function() {
        // Use jQuery AJAX to interact with the backend (backend.php)
        console.log("hi");
        $.ajax({
            url: './php/register.php',
            type: 'POST',
            data: $('#registrationForm').serialize(),
            success: function(response) {
                // Handle the response from the server
                console.log(response);
                
                // Check if registration was successful before redirecting
                if (response === "Registration successful!") {
                    // Redirect to the profile page after successful registration
                    localStorage.setItem('username', $('#username').val());
                    window.location.href = 'profile.html';
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
});
