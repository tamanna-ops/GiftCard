$(document).ready(function() {
    $('#myTable').DataTable();
});

$(document).ready(function() {
    $(document).on('click', '.divi_modal', function() {
        var divi_id = $(this).attr("id");
        // console.log(divi_id);
        // alert(divi_id);
        $.ajax({
            type: 'POST',
            url: "divi-modal.php?dvid=" + divi_id, //this file has the calculator function code
            success: function(data) {
                $('#showdivi').html(data);
            }
        });

        $('#divi_modal').modal('show');

    });
});

function send_msg(id) {
    document.getElementById('loader').style.display = 'block';
    var com_id = id;
    var name = $("#com_name").val();

    $.ajax({
        type: 'POST',
        url: 'msg.php',
        data: {
            send_msg: "send_msg",
            com_name: name,
            id: com_id
        },
        success: function(response) {

            const datatosend = JSON.stringify(response);
            alert(datatosend);
            document.getElementById('loader').style.display = 'none';

        }
    });

}

function send_direct_msg(id) {
    document.getElementById('loader').style.display = 'block';
    var run_com_id = id;
    var com_name = $("#com_name").val();

    $.ajax({
        type: 'POST',
        url: 'direct_msg.php',
        data: {
            send_direct_msg: "send_direct_msg",
            com_name: com_name,
            run_com_id: run_com_id
        },
        success: function(response) {

            const dir_datatosend = JSON.stringify(response);
            alert(dir_datatosend);
            document.getElementById('loader').style.display = 'none';

        }
    });


}
 

function send_mail(id) {
    document.getElementById('loader').style.display = 'block';
    var run_com_id = id;
    var com_name = $("#com_name").val();
    console.log(com_name)

    $.ajax({
        type: 'POST',
        url: 'mail.php',
        data: {
            send_email: "send_email",
            com_name: com_name,
            id: run_com_id
        },
        success: function(response) {

            const datatosend = JSON.stringify(response);
            alert(datatosend);
            document.getElementById('loader').style.display = 'none';

        }

    });
}
 