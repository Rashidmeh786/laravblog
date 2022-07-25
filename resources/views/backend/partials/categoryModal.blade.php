

<!-- The create category Modal -->
<div class="modal" id="addCategoryModal">
  <div class="modal-dialog">
    <div class="modal-content">
  <form id="addCategory" method="post" >
      @csrf
      <div class="modal-header">
        <h4 class="modal-title">Add category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

          <div class="form-group">
            <label for="add_category">Category Name:</label>
            <input type="text" name='category_name' class="form-control" id="add_category" aria-describedby="emailHelp" placeholder="Enter Category Name">
            <small id="category_name_error" class="text-danger"></small>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Create</button>

        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>


      </div>

    </div>
</form>
  </div>
</div>
</div>

            {{--  the edit category modal  --}}



            <div class="modal" id="editCategoryModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                <form id="editCategory" method="post" >
                    @csrf
                    <div class="modal-header">
                      <h4 class="modal-title">Add category</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <div class="form-group">
                            <input type="hidden" id='categoryid' name="">
                          <label for="add_category">Category Name:</label>
                          <input type="text" name='edit_category_name' class="form-control" id="edit_category" aria-describedby="emailHelp" placeholder="Enter Category Name">
                          <small id="ecategory_name_error" class="text-danger"></small>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary updateCategory">Update</button>

                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>


                    </div>

                  </div>
              </form>
                </div>
              </div>
              </div>


