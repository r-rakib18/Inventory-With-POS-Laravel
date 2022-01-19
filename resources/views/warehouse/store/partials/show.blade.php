<div class="modal fade" id="showModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group input-group-sm">
                                <label for="name">Brand Name</label>
                                <input type="text" class="form-control " id="name" name="name" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" class="form-control " id="status" name="status" value="" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-md-12" for="image">Image</label>
                                <div class="col-md-12 mb-2">
                                    <img id="image_preview_container"
                                         alt="preview image" style="max-height: 100px;" src="">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <label for="description" class="ml-2">Description</label>
                        <div class="col-md-12">
                            <textarea name="descriptionmodal" rows="5"  cols="90"  id="descriptionmodal" readonly></textarea>
                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer text-right">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    ClassicEditor
        .create( document.querySelector( '#descriptionmodal' ) )
        .catch( error => {
            console.error( error );
        } );
</script>