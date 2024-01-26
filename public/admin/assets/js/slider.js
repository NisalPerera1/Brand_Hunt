$(document).ready(function() {
    // Handle form submission
    $('#sliderForm').on('submit', function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: '{{ route("sliders.store") }}',
            method: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                // Handle success response
                // You may reload the list of sliders or perform any other action
            },
            error: function(xhr, status, error) {
                // Handle error response
            }
        });
    });
});
