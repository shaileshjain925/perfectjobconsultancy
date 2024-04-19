// var formId = "RoleCreateUpdate";
// var method = "<?=(isset($role_id) && !empty($role_id))?'PATCH':'PUT'?>";
// var CreateUpdateApiUrl = "<?=base_url(route_to((isset($role_id) && !empty($role_id))?'roleupdate-api':'rolecreate-api'))?>";
// var ListPageUrl = "<?=base_url(route_to('rolelist'))?>";

function deleteRow(data){
    Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: DeleteApiUrl,
                type: 'DELETE',
                contentType: "application/json",
                data: JSON.stringify(data),
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
                    }else if(response.status == 200){
                        toastr.success(response.message)
                        $('#refresh').click();
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
        }
    });
}


