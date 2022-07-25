

<!-- The create Tag Modal -->
<div class="modal" id="addTagModal">
  <div class="modal-dialog">
    <div class="modal-content">
  <form id="addTag" method="post" >
      @csrf
      <div class="modal-header">
        <h4 class="modal-title">Add Tag</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

          <div class="form-group">
            <label for="add_category">Tag Name:</label>
            <input type="text" name='Tag_name' class="form-control" id="add_Tag" aria-describedby="emailHelp" placeholder="Enter Tag Name">
            <small id="Tag_name_error" class="text-danger"></small>

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



            <div class="modal" id="editTagModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                <form id="editCategory" method="post" >
                    @csrf
                    <div class="modal-header">
                      <h4 class="modal-title">Add Tag</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <div class="form-group">
                            <input type="hidden" id='Tagid' name="">
                          <label for="">Tag Name:</label>
                          <input type="text" name='edit_Tag_name' class="form-control" id="edit_Tag" aria-describedby="emailHelp" placeholder="Enter Tag Name">
                          <small id="tag_name_error" class="text-danger"></small>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary updateTag">Update</button>

                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>


                    </div>

                  </div>
              </form>
                </div>
              </div>
              </div>


