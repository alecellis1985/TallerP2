<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="videoTitle"></h4>
      </div>
      <form id="editVideofrm" role="form" action="editVideo.php" method="POST">
          <div class="modal-body">
                <div class="form-group">
                  <label for="userName">Client:</label>
                  <input type="text" name="client" class="form-control" placeholder="Client" required>
                </div>
              <div class="form-group">
                  <label for="userName">Url:</label>
                  <input type="text" name="url" class="form-control" placeholder="Url" required>
                </div>
              <div class="form-group">
                  <label for="userName">Client:</label>
                  <input type="text" name="client" class="form-control" placeholder="Client" required>
                </div>
              <div class="form-group">
                  <label for="userName">Release Date:</label>
                  <input type="text" name="releaseDate" class="form-control" placeholder="Release Date" required>
                </div>
              <div class="form-group">
                  <label for="userName">Description:</label>
                  <textarea class="form-control" type="text" rows="8" name="description" class="form-control" placeholder="Description" required></textarea>
                </div>
                
                <div class="form-group hide">
                    <span id="logInErrors" class="error"></span>
                </div>
          </div>
          <div class="modal-footer">
            <button id="closeVideoModal" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button id="saveVideo" type="submit" class="btn btn-primary">Save</button>
          </div>  
      </form>
    </div>
  </div>
</div>