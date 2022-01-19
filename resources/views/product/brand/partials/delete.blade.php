<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Delete</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 class="d-inline text-bold">Confirm Delete Brand </h6><h2 class="d-inline text-danger text-bold" id="item_name"></h2><h6 class="d-inline text-bold"> ?</h6>
                <form method="PUT" id="delete">
                    @csrf
                <input type="hidden" id="deleteID">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>