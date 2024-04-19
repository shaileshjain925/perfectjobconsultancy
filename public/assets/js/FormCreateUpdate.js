// var formId = "RoleCreateUpdate";
// var method = "<?=(isset($role_id) && !empty($role_id))?'PATCH':'PUT'?>";
// var CreateUpdateApiUrl = "<?=base_url(route_to((isset($role_id) && !empty($role_id))?'roleupdate-api':'rolecreate-api'))?>";
// var ListPageUrl = "<?=base_url(route_to('rolelist'))?>";

$(document).ready(function() {
    // Function to handle form submission
    $('#'+formId).submit(function(event) {
        // Prevent default form submission
        event.preventDefault();

        // Get form data
        var formData = getFormData(formId)

        // Make an AJAX request to the API
        $.ajax({
            url: CreateUpdateApiUrl,
            type: method,
            contentType: "application/json",
            data: JSON.stringify(formData),
            success: function(response) {
                // Handle success response
                if(response.status == 422){
                    toastr.error(response.message)
                    if (response.errors) {
                        // Loop through the errors and fill corresponding error message elements
                        Object.keys(response.errors).forEach(function(fieldName) {
                            var errorMessage = response.errors[fieldName];
                            var errorElement = document.getElementById(fieldName + "-error");
                            if (errorElement) {
                                errorElement.textContent = errorMessage;
                            }
                        });
                    }
                }else if(response.status == 200 || response.status == 201){
                    toastr.success(response.message)
                    setTimeout(function() {
                        window.location.href = ListPageUrl;
                    }, 1000);
                }else{
                    toastr.error(response.message)
                    console.error(response);
                }
                
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