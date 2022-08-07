//this is done from js
function deleteData(id,record)
{
    // alert(id\
    // console.log(id,record);
    swal({
        title: "Are you sure?",
        text: "You will not able to recover this record again!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it",
    },
    function() {
        window.location.href = "delete-" + record + "/" + id;
    }
);
}

//this is done from jquery
$(document).ready(function(){
    //check admin passwod is correct or not
    $("#current_pwd").keyup(function(){
     var current_pwd = $("#current_pwd").val();
    // alert(current_pwd);
    $.ajax({
           type:'post',
           url:'/admin/check-current-pwd',
           data:{current_pwd:current_pwd},
           success:function(resp){
            if(resp=="false"){
                $("#chkCurrentPwd").html("<font color=red>Current Password is incorrect</font>");
            }else if(resp=="true"){
                $("#chkCurrentPwd").html("<font color=green>Current Password is correct</font>");
            }
           },error:function(){
               alert("Error");
           }
    });
    });

    //Confirm Delete Sweetalert
    $(".delete_form").click(function() {
        var id = $(this).attr('rel');
        var record = $(this).attr('record');
    //    alert(id)
    //    console.log(id, record)
        swal({
                title: "Are you sure?",
                text: "You will not able to recover this record again!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it",
            },
            function() {
                window.location.href = "delete-" + record + "/" + id;
            }
        );
    });


 //ajax update status
    $(".updateNavbarStatus").click(function() {
        var status = $(this).text();
        var navbar_id= $(this).attr("navbar_id");
        $.ajax({
            type:'post',
            url:'/admin/update-navbar-status',
            data:{
                status:status,
                navbar_id:navbar_id
            },
            success:function(response) {
                if(response['status']==0) {
                    $("#navbar-"+navbar_id).html("<a  class='updateNavbarStatus'  href='javascript:(0);'>Inctive</a>");
                }else if(response['status']==1){
                    $("#navbar-"+navbar_id).html("<a  class='updateNavbarStatus'  href='javascript:(0);'>Active</a>");
                }
            },error:function(){
                alert("Error");
            }
        });
    });

});

