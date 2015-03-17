<div class="modal fade" id="videoInfoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" >Video Details</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Title:</label>
                    <p id="videoInfotitle"></p>
                </div>
                <div class="form-group">
                    <label>Client:</label>
                    <p id="videoInfoclient"></p>
                </div>
                <div class="form-group">
                    <label>Url:</label>
                    <p id="videoInfourl"></p>
                </div>
                <div class="form-group">
                    <ul>
                        <li><label>Release Date:</label><label id="videoInforeleaseDate"></label></li>
                        <li><label>Active:</label><label id="videoInfodeleted"></label></li>
                        <li><label>Prominent:</label><label id="videoInfodestacado"></label></li>
                        <li>
                            <label>Rating:</label>
                            <p id="videoInforating" style="display: inline-block;">
                                <span class="star-rating">
                                    <input type="radio" name="ratingStatic" value="1" class="disableClick">
                                    <i></i>
                                    <input type="radio" name="ratingStatic" value="2" class="disableClick">
                                    <i></i>
                                    <a href="videoDetails.tpl"></a>
                                    <input type="radio" name="ratingStatic" value="3" class="disableClick">
                                    <i></i>
                                    <input type="radio" name="ratingStatic" value="4" class="disableClick">
                                    <i></i>
                                    <input type="radio" name="ratingStatic" value="5" class="disableClick">
                                    <i></i>
                                </span>
                            </p>
                            </label>
                        </li>
                        <li><label>Views:</label><label id="videoInfoviews"></label></li>
                        <li><label>Votes:</label><label id="videoInfovotes"></label></li>
                    </ul>
                </div>
                <div class="form-group">
                    <label>Description:</label>
                    <p id="videoInfodescription"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button id="closeVideoModal" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> 
        </div>
    </div>
</div>