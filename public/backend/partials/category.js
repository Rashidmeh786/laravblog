$(document).ready(function() {


        // get gategary datatable.
        var dataTable = $('#categories').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            autoWidth: false,
            pageLength: 5,
            order:[0,'asc'],
            "ajax":{
                url:baseUrl+'/getAllCategories',
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
        $(document).on('click','.editCategory',function(e){
        e.preventDefault();
            var id =$(this).attr('data-id');


        $.ajax({
            type: "get",
            url: baseUrl +"/getCategory/"+id,
            data: "data",
            dataType: "json",
            success: function (response) {
                $('#edit_category').val(response.data.name);
                $('#editCategoryModal').modal('show');
                $('#categoryid').val(response.data.id);

            }
        });

        });
                //  end edit category


                // update category


$(document).on('click','.updateCategory',function (e) {
        e.preventDefault();
        id=$('#categoryid').val();
       // $(this).text('Updating..');

        var data = {
            'edit_category_name': $('#edit_category').val(),
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "PUT",
            url: baseUrl+"/UpdateCategory/" + id,
            data: data,
            dataType: "json",
            success: function (response)
                {


                if(response.status == 200)
                {
                    $("#editCategoryModal").find('form')[0].reset();

                    $("#editCategoryModal").modal('hide');
                         Swal.fire(
                             'Added!',
                             'Category Updated Successfully!',
                             'success'
                         )
                         dataTable.ajax.reload();
                }
                else
                {
                    $('#ecategory_name_error').html(response.errors.edit_category_name);

                }


                }

});
});



                // end update category

                // ADD CATEGORY
    $('#addCategory').submit(function(e) {
        e.preventDefault();
        //{{-- var form = $('#addCategory')[0];
        //var formData=new FormData(form); --}}

        const formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: baseUrl + '/addCategory',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if(response.status == 200) {
             $("#addCategoryModal").find('form')[0].reset();

               $("#addCategoryModal").modal('hide');
                    Swal.fire(
                        'Added!',
                        'Category Added Successfully!',
                        'success'
                    )
                    dataTable.ajax.reload();
                }
                if (response.errors.category_name) {
                    $('#category_name_error').html(response.errors.category_name)
            }
            }


        });
    });



                    // DELETE CATEGORY

                    $(document).on('click','.deleteCategory', function(e){
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
                                    url: baseUrl+"/deleteCategory/"+id,
                                    processData:false,
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
