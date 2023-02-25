function find_mem() {
    event.preventDefault();
    let phone = document.getElementById('mem_mobiles').value;
    // console.log(phone.length)
    if (phone.length < 10 || phone.length > 10) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please Enter 10 Digit Valid Mobile Number!',
        })
    } else {
        $.ajax({
            type: 'POST',
            url: 'mem-reports.php',
            data: {
                find_details: "find_details",
                phone: phone,
            },
            success: function(response) {
                if (response.length > 0) {
                    document.getElementById('finalResult').innerHTML = response;
                    $('#response_table').DataTable();
                    $('#response_table2').DataTable();

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

