$(document).ready(function() {


    // get gategary datatable.
    var dataTable = $('#tags').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        pageLength: 5,
        order:[0,'asc'],
        "ajax":{
            url:baseUrl+'/getAllTags',
            type: 'post',
            data: {
                    '_token':$("meta[name='csrf-token']").attr('content'),
            }

        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'Actions', name: 'Actions',orderable:false,serachable:false,sClass:'text-center'},
        ],
});


        // edit ccategory
    $(document).on('click','.editTag',function(e){
    e.preventDefault();
        var id =$(this).attr('data-id');


    $.ajax({
        type: "get",
        url: baseUrl +"/getTag/"+id,
        data: "data",
        dataType: "json",
        success: function (response) {
            $('#edit_Tag').val(response.data.name);
            $('#editTagModal').modal('show');
            $('#Tagid').val(response.data.id);

        }
    });

    });
            //  end edit tag


            // update tag


$(document).on('click','.updateTag',function (e) {
    e.preventDefault();
    id=$('#Tagid').val();
   // $(this).text('Updating..');

    var data = {
        'edit_Tag_name': $('#edit_Tag').val(),
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "PUT",
        url: baseUrl+"/UpdateTag/" + id,
        data: data,
        dataType: "json",
        success: function (response)
            {


            if(response.status == 200)
            {
                $("#editTagModal").find('form')[0].reset();

                $("#editTagModal").modal('hide');
                     Swal.fire(
                         'Added!',
                         'Tag Updated Successfully!',
                         'success'
                     )
                     dataTable.ajax.reload();
            }
            else
            {
                $('#tag_name_error').html(response.errors.edit_Tag_name);

            }


            }

});
});



            // end update category

            // ADD Tag
$('#addTag').submit(function(e) {
    e.preventDefault();
    //{{-- var form = $('#addTag')[0];
    //var formData=new FormData(form); --}}

    const formData = new FormData(this);

    $.ajax({
        type: "POST",
        url: baseUrl + '/addTag',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            if(response.status == 200) {
         $("#addTagModal").find('form')[0].reset();

           $("#addTagModal").modal('hide');
                Swal.fire(
                    'Added!',
                    'Tag Added Successfully!',
                    'success'
                )
                dataTable.ajax.reload();
            }
            if (response.errors.Tag_name) {
                $('#Tag_name_error').html(response.errors.Tag_name)
        }
        }


    });
});



                // DELETE CATEGORY

                $(document).on('click','.deleteTag', function(e){
                    e.preventDefault();
                    var id =$(this).attr('data-id');

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
                            $.ajax({
                                type: "get",
                                url: baseUrl+"/deleteTag/"+id,
                                processData: false,
                                contentType:false,
                                success: function (data) {
                                    Swal.fire(
                                        'Added!',
                                        'Category Deleted Successfully!',
                                        'success'
                                    )
                                    dataTable.ajax.reload();
                                }
                              });
                        }
                      })




                });
});
