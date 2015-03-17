<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="videoTitle"></h3>
            </div>
            <form id="videofrm" role="form" action="" method="POST">
                <div class="modal-body">
                    <input id="idVideo"type="hidden" name="idVideo">
                    <div class="form-group form-group-inline" >
                        <label for="client">Title:</label>
                        <input type="text" name="title" class="form-control" placeholder="Title" required>
                    </div>  
                    <div class="form-group form-group-inline" style="margin-left: 20px;">
                        <label for="client">Client:</label>
                        <input type="text" name="client" class="form-control" placeholder="Client" required>
                    </div>
                    <div class="form-group form-group-inline">
                        <label for="url">Url:</label>
                        <input type="text" name="url" class="form-control" placeholder="Url" required>
                    </div>
                    <div class="form-group form-group-inline" style="margin-left: 20px;">
                        <label for="releaseDate">Release Date:</label>
                        <input type="date" name="releaseDate" class="form-control" placeholder="Release Date" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" maxlength="250" type="text" rows="6" name="description" class="form-control" placeholder="Description" required></textarea>
                    </div>

                    <div class="form-group hide">
                        <span id="videoFormErrors" class="error"></span>
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