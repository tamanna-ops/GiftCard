function find_com() {
    event.preventDefault();
    let com_names = document.getElementById('com_names').value;
    com_names.replace(/[^a-zA-Z ]/g, "");
    if (com_names.length == 0 ) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please Enter Committee Name',
        })
    } else {
        $.ajax({
            type: 'POST',
            url: 'com-reports.php',
            data: {
                find_com_details: "find_com_details",
                com_names: com_names,
            },
            success: function(response) {
                if (response.length > 0) {
                    // alert(response);
                    document.getElementById('finalResult').innerHTML = response;
                    $('#response_table3').DataTable();

                   
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    });
                }


            }
        });
    }
}

