// Function to initialize selectize.js dropdowns
$(document).ready(function() {
    // Function to handle form submission
    var formId = "RoleCreateUpdate";
    $('#'+formId).submit(function(event) {
        // Prevent default form submission
        event.preventDefault();

        // Get form data
        var formData = getFormData(formId)

        // Make an AJAX request to the API
        $.ajax({
            url: CreateUpdateApiUrl,
            type: 'POST',
            dataType: 'json',
            data: formData,
            success: function(response) {
                // Handle success response
                console.log(response);
                // Optionally, perform actions based on the response
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText);
                // Optionally, display an error message to the user
            }
        });
    });
});