<?php 

function jsEnqueuer_add_bootstrap_modal(){
	?>
	<!-- Modal -->
   <div class="modal fade" id="jsEnqueuerModal" tabindex="-1" role="dialog" aria-labelledby="jsEnqueuerLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">JS Enqueuer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <form>
                <label for="jsFile">Select JS file to Enqueue it on Frontend</label>
                <input type="file" id="jsFileID" class="btn" class="form-control-file" id="jsFile">
                <input id="uploadFile" class="btn btn-secondary" type="submit" name="upload_file" value="Upload" /> 
            </form>
        </div>
      </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php
}

add_action('admin_footer','jsEnqueuer_add_bootstrap_modal');