$(document).on("click", ".appRef", function () {
            var appDelRef = $(this).data('id');
            $(".modal-form #delApplicant").val( appDelRef );
        });


$("#FilUploader").change(function () {
        var fileExtension = ['docx', 'doc', 'pdf'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            alert("Only formats are allowed : "+fileExtension.join(', '));
        }
    });

$("#basicSubmit").on('click', function(e) {
    var email = $("#email").val(),
        confirm = $("#email2").val();

    if (email!= confirm) {
       alert('Your email and confirmation email do not match! Please verify that these feels match before submitting.');
       e.preventDefault(); //form will not be submitted
    }
});


