
    
        function showRow() {
           const form = document.getElementById('regRow');
           const btnShowVar = document.getElementById('btnShow');
           const headin = document.getElementById('headi');
           if (form.style.display === 'none') {
               form.style.display = 'block';
               btnShowVar.style.display='none';
               headin.style.display='block';
           } else {
               form.style.display = 'none';
               btnShowVar.style.display='block';

           }
       }

       function close_form(){
           const form = document.getElementById('regRow');
           const btnShowVar = document.getElementById('btnShow');
           const headin = document.getElementById('headi');
           if (form.style.display === 'block') {
               form.style.display = 'none';
               btnShowVar.style.display='block';
               headin.style.display='none';
           } else {
               form.style.display = 'block';
               btnShowVar.style.display='none';

           }
       }
       //open committee
       function open_committee() {
           event.preventDefault();
           var com_id = $("#com_id").val();
           var com_amount = $("#com_amount").val();
           var com_members = $("#com_members").val();
           $.ajax({
               type: 'POST',
               url: 'committee_ajax.php',
               data: {
                   open_committee: "open_committee",
                   id: com_id,
                   amount: com_amount,
                   members: com_members
               },
               success: function(response) {
                   // alert(response);
                   if(response==1234){
                       Swal.fire({
                           title: "Success!",
                           text: "Committee Opened Successfully!",
                           icon: "success",
                           }).then((result) => {
                           location.reload();
                           });
                   }else if(response==123){
                       Swal.fire({
                   icon: 'error',
                   title: 'Oops...',
                   text: "Committee Already Opened!",
                        });
                   }else{
                       Swal.fire({
                   icon: 'error',
                   title: 'Oops...',
                   text: "Please Select "+response+" Members",
                        });
                   }
               }
           });
       }
       //for multi select
       const a = new MultiSelectTag('com_members') // id
       // console.log(a);

       //for view Committee Details..
       $(document).ready(function() {
           $(document).on('click', '.modal-order', function() {
               var oc_id = $(this).attr("opid");
               // console.log(oc_id);
               // alert(oc_id);
               $.ajax({
                   type: 'POST',
                   url: "ajaxCdetails.php?oc_id=" +
                       oc_id, //this file has the calculator function code
                   success: function(data) {
                       $('#showcal').html(data);
                   }
               });

               $('#modal-order').modal('show');

           });
       });
       $(document).ready(function() {
           $('#myTable').DataTable();
       });

       function getcounting() {
           const allIds = [];
           var i = document.getElementById('com_members').value;
           var a = allIds.push(i);
           // console.log(a);

       }