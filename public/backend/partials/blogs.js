$(document).ready(function() {


    // get gategary datatable.
    var dataTable = $('#blogs').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        pageLength: 5,
        order:[0,'desc'],
        "ajax":{
            url:baseUrl+'/getAllBlogs',
            type: 'post',
            data: {
                    '_token':$("meta[name='csrf-token']").attr('content'),
            }

        },

        columns: [
            {data: 'id', name: 'id'},
            {data: 'image', name: 'image'},
            {data: 'title', name: 'name'},
            {data: 'user_id', name: 'user_id'},
            {data: 'category_id', name: 'category_id'},
            // {data: 'id', name: 'id'}, for tags
            {data: 'short_description', name: 'short_descriptionid'},
             {data: 'active', name: 'active'},

            // {data: 'created_at', name: 'created_at'},
            // {data: 'updated_at', name: 'updated_at'},
            {data: 'Actions', name: 'Actions',orderable:false,serachable:false,sClass:'text-center'},
        ],


});




                // DELETE CATEGORY

                // $(document).on('click','.deleteTag', function(e){
                //     e.preventDefault();
                //     var id =$(this).attr('data-id');

                //     Swal.fire({
                //         title: 'Are you sure?',
                //         text: "You won't be able to revert this!",
                //         icon: 'warning',
                //         showCancelButton: true,
                //         confirmButtonColor: '#3085d6',
                //         cancelButtonColor: '#d33',
                //         confirmButtonText: 'Yes, delete it!'
                //       }).then((result) => {
                //         if (result.isConfirmed) {
                //             $.ajax({
                //                 type: "get",
                //                 url: baseUrl+"/deleteTag/"+id,
                //                 processData: false,
                //                 contentType:false,
                //                 success: function (data) {
                //                     Swal.fire(
                //                         'Added!',
                //                         'Category Deleted Successfully!',
                //                         'success'
                //                     )
                //                     dataTable.ajax.reload();
                //                 }
                //               });
                //         }
                //       })




                // });
});
