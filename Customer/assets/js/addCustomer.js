 
$(document).ready(function() {
    $('#myTable').DataTable();
});
 
 

function add_member() {
    event.preventDefault();
    var mem_name = $("#mem_name").val();
    var mem_mobile = $("#mem_mobile").val();
    var mem_email = $("#mem_email").val();
    if (mem_name == "" || mem_mobile == 0 ) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Fill All The Details!',
        })
    }else if(mem_name.length < 2 || mem_mobile.length > 10 || mem_mobile.length < 10){
        if(mem_name.length < 2){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please enter Valid Name!',
        })
    }else{
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Mobile Must Be of Length 10!',
        })
    }

    } else {
        $.ajax({
            type: 'POST',
            url: 'memberajax.php',
            data: {
                add_member: "add_member",
                name: mem_name,
                mobile: mem_mobile,
                email: mem_email
            },
            success: function(response) {
                if(response==1){
                    Swal.fire({
                    title: "Success!",
                    text: "Member Added Successfully!",
                    icon: "success",
                    }).then((result) => {
                    location.reload();
                    });
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Mobile Number Already Exists!',
                        });
                }
                
               
            }
        });
       
    }
}


function delete_record(id) {
    var del_id = id;
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
        if (result.value) {
            $.ajax({
                    type: 'POST',
                    url: 'delete-data.php',
                    data: {
                        deleteId: del_id,
                    }
                })
                .done(function(response) {

                if(response==1){
                    Swal.fire({
                    title: "Success!",
                    text: "Member Deleted Successfully!",
                    icon: "success",
                    }).then((result) => {
                    location.reload();
                    });
                }else{
                    Swal.fire('Oppss!', 'Something Went Wrong', 'warning');
                }
                // Swal.fire('Deleted!', "Member Deleted Successfully!", 'success');
                
                })

                .fail(function() {
                    Swal.fire('Oppss!', 'Something Went Wrong', 'warning');
                });

        }

    })
}
 
 
