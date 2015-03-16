<div class="modal fade" id="videoInfoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="videoTitle"></h3>
      </div>
      <form id="videofrm" role="form" action="" method="POST">
          <div class="modal-body">
              <input id="idVideo"type="hidden" name="idVideo">
              <div class="form-group">
                  <label for="client">Title:</label>
                  <input type="text" name="title" class="form-control" placeholder="Title" readonly>
                </div>  
              <div class="form-group">
                  <label for="client">Client:</label>
                  <input type="text" name="client" class="form-control" placeholder="Client" readonly>
                </div>
              <div class="form-group">
                  <label for="url">Url:</label>
                  <input type="text" name="url" class="form-control" placeholder="Url" readonly>
                </div>
              <div class="form-group">
                  <label for="releaseDate">Release Date:</label>
                  <input type="text" name="releaseDate" class="form-control" placeholder="Release Date" readonly>
                </div>
              <div class="form-group">
                  <label for="description">Description:</label>
                  <textarea class="form-control" type="text" rows="8" name="description" class="form-control" placeholder="Description" readonly></textarea>
                </div>
          </div>
          <div class="modal-footer">
            <button id="closeVideoModal" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>  
      </form>
    </div>
  </div>
</div>