$(document).ready(function() {

    //Datatable filter

    $('#sections').DataTable();
    $('#categories').DataTable();


    $('.nav-item').removeClass('active');
    $('.nav-link').removeClass('active');
    // Check admin password correct or not
    $('#current_password').keyup(function() {
        var current_password = $('#current_password').val();
        /* alert(current_password); */

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/check-admin-password',
            data: { current_password: current_password },
            success: function(resp) {

                if (resp == "false") {
                    $('#check_password').html("<font color='red'>Current password is incorrect!</font>");
                } else if (resp == "true") {
                    $('#check_password').html("<font color='green'>Current password is currect!</font>");
                }

            },
            error: function() {
                alert('error');
            }
        });
    })

    //Update admin status

    $(document).on("click", ".updateAdminStatus", function() {
        //alert("I love afsana mim");
        var status = $(this).children("i").attr("status");
        var admin_id = $(this).attr("admin_id");
        // alert(admin_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-admin-status',
            data: { status: status, admin_id: admin_id },
            success: function(resp) {
                //alert(resp);
                if (resp['status'] == 0) {
                    $("#admin-" + admin_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-outline' status='Inactive'></i>");
                } else if (resp['status'] == 1) {
                    $("#admin-" + admin_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-check' status='Active'></i>");
                }

            },
            error: function() {
                alert("Error found");
            }
        });

    });

    $(document).on("click", ".updateSectionStatus", function() {
        //alert("I love afsana mim");
        var status = $(this).children("i").attr("status");
        var section_id = $(this).attr("section_id");
        // alert(section_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-section-status',
            data: { status: status, section_id: section_id },
            success: function(resp) {
                //alert(resp);
                if (resp['status'] == 0) {
                    $("#section-" + section_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-outline' status='Inactive'></i>");
                } else if (resp['status'] == 1) {
                    $("#section-" + section_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-check' status='Active'></i>");
                }

            },
            error: function() {
                alert("Error found");
            }
        });

    });


    $(document).on("click", ".updateCategoryStatus", function() {
        var status = $(this).children("i").attr("status");
        var category_id = $(this).attr("category_id");
        // alert(category_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-category-status',
            data: { status: status, category_id: category_id },
            success: function(resp) {
                //alert(resp);
                if (resp['status'] == 0) {
                    $("#category-" + category_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-outline' status='Inactive'></i>");
                } else if (resp['status'] == 1) {
                    $("#category-" + category_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-check' status='Active'></i>");
                }

            },
            error: function() {
                alert("Error found");
            }
        });

    });



    // Delete section simple js delete popup
    // $(".confirmDelete").click(function() {
    //     var title = $(this).attr("title");
    //     if (confirm("Are you sure delete the section data" + title + "?")) {
    //         return true;
    //     } else {
    //         return false;
    //     }

    // })


    //sweetalert popup

    $(".confirmDelete").click(function() {
        var module = $(this).attr('module');
        var moduleid = $(this).attr('moduleid');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                window.location = "/admin/delete-" + module + "/" + moduleid;
            }
        });
    });



    //Append category level
    $("#select_id").change(function() {
        var section_id = $(this).val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'get',
            url: '/admin/append-categories-level',
            data: { section_id: section_id },
            success: function(resp) {
                alert(resp);
                $("#appendCategoriesLevel").html(resp);
            },
            error: function() {
                alert("Error");
            }
        });
    });


});