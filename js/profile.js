$(document).ready(function() {
    // Get the username from local storage
    var username = localStorage.getItem('username');
console.log("kkk");
    // Check if the username is available
    if (username) {
        // Use jQuery AJAX to interact with the backend
        $.ajax({
            url: './php/profile.php',  // Change the URL to the file that fetches user details
            type: 'POST',
            data: { username: username },
            success: function(response) {
                // Handle the response from the server
                console.log(response);

                // Display the user's information on the page
                $('#profileInfo').html(response);
            },
            error: function(error) {
                console.log(error);
            }
        });
    } else {
        console.log('Username not found in local storage');
    }
});
