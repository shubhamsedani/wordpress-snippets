jQuery(document).ready(function($){
    // This function runs when the document is ready
    // It ensures that the DOM is fully loaded before executing the JavaScript code

    // Make an AJAX request
    $.ajax({
        method: 'POST', // HTTP method (POST in this case)
        dataType: 'json', // Expected data type for the response (JSON in this case)
        url: some_variable.ajaxurl, // URL to send the request to
        data: {
            some_content: "Just an AJAX example", // Data to send in the request
            _wpnonce: some_variable.nonce, // WordPress nonce for security
            action: 'ss_ajax_function' // The name of the AJAX action to trigger on the server
        },
        success: function (data) {
            // This function runs when the AJAX request is successful
            console.log(data); // Output the response data to the browser console
            alert(data); // Display a simple alert with the response data
        },
    });
});
