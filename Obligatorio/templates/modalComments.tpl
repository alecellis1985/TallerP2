<div class="modal fade" id="modalComments" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalCommentsTitle">MODAL TITLE (TO REPLACE)</h4>
            </div>
            <form id="commentForm" role="form" action="" method="POST">
                <div class="modal-body">
                    <input id="idVideo" type="hidden" name="idVideo">
                    <div class="form-group">
                        <label for="alias">Alias:</label>
                        <input id="alias" type="text" name="alias" class="form-control" placeholder="Alias">
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment:</label>
                        <textarea id="commentText" maxlength="250" class="form-control" type="text" rows="5" name="comment" class="form-control" placeholder="Comment" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="closeCommentModal" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="saveComment" type="submit" class="btn btn-primary">Save</button>
                </div>  
            </form>
        </div>
    </div>
</div>