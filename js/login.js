$(document).ready(function() {
    $('#loginBtn').click(function() {
        // Use jQuery AJAX to interact with the backend (login.php)
        console.log("hi");
        $.ajax({
            url: './php/login.php',
            type: 'POST',
            data: $('#loginForm').serialize(),
            success: function(response) {
                // Handle the response from the server
                console.log(response);
                
                // Check if login was successful before redirecting
                if (response === "Login successful!") {
                    // Redirect to the profile page after successful login
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
