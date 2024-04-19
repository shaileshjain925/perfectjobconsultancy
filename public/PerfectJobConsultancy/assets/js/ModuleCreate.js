$(".select").selectize({
  parentBody: "body",
  plugins: ["clear_button"],
});
console.log(base_url);
if (data['errors'] && data['errors'].length > 0) {
  // Display error messages
  data['errors'].forEach(function (error) {
    toastr.error(error['error_message'], '', { timeOut: 8000 });
    result += error['error_message'] + '\\n'; // Double backslash to escape the newline character
    result += error['file_path'] + '\\n'; // Double backslash to escape the newline character
  });
}

if (data['success'] && data['success'].length > 0) {
  // Display success messages
  data['success'].forEach(function (success) {
    toastr.success(success['success_message'], '', { timeOut: 8000 });
    result += success['success_message'] + '\\n'; // Double backslash to escape the newline character
    result += success['file_path'] + '\\n'; // Double backslash to escape the newline character
  });
}

$('#status').val(result); // Changed 'value' to 'val' to set the input's value