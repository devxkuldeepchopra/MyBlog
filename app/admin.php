
<div class="container">
  <h2>Add Post</h2>
  <form class="form-horizontal" id="postForm" method="Post" action="">
<input type="hidden" id="lastid" />
    <div class="form-group">
      <label class="control-label col-sm-2" for="title">Title:</label>
      <div class="col-sm-10">
      <input type="text"  class="form-control" id="title" placeholder="Enter title"  name="title">
    </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="description">Description:</label>
      <div class="col-sm-10">
      <input type="text"  class="form-control" id="description" placeholder="Enter description" name="description">
    </div>
    </div>

    <div class="form-group group">
      <label class="control-label col-sm-2" for="description">Upload Image:</label>
      <div class="col-sm-10 col-img">
      <input type="file" name="logo" id="pic" class="styled">
      <img src="" class="uploaded-img" id="uploaded-img"/>
    </div>
    </div>



   
    <div class="form-group">
      <label class="control-label col-sm-2" for="mypost">Post:</label>
      <div class="col-sm-10">
      <textarea class="form-control" id="mypost" placeholder="Enter Post" name="mypost">
</textarea>
    </div>
    </div>

    <button type="submit" class="btn btn-default">Add Post</button>
  </form>
</div>


<script src="assets/js/admin.js"></script>












