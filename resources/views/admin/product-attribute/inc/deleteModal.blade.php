<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="deleteAttributeModalTitle">Attribute Delete</h5> --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyAttribute">
                <div class="modal-body text-center">
                    <i class="bx bx-trash bx-lg bx-border-circle bx-tada delete-icon mb-4"></i>
                    <h2>Are you sure?</h2>
                    <h5>Do you want to delete this attribute?</h5>
                </div>
                <div class="modal-footer d-block text-center">
                    <button type="button" class="btn btn-outline-secondary btn-block"
                        data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-block">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
