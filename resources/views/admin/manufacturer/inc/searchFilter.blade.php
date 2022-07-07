<div class="accordion mb-4" id="searchManufacturer">
    <div class="card accordion-item active">
        <h2 class="accordion-header" id="searchManufacturerHeadingOne">
            <button type="button" class="accordion-button" data-bs-toggle="collapse"
                data-bs-target="#searchManufacturerAccordionOne" aria-expanded="true"
                aria-controls="searchManufacturerAccordionOne">
                <h5 class="accordion-title mb-0"><i class="bx bx-search"></i> Search</h5>
            </button>
        </h2>

        <hr class="m-0">

        <div id="searchManufacturerAccordionOne" class="accordion-collapse collapse show"
            data-bs-parent="#searchManufacturer">
            <div class="accordion-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label search-label" for="manufacturerName">Name</label>

                            <div class="col-sm-9 d-flex">
                                <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="A manufacturer name.">
                                    <i class="bx bxs-help-circle"></i>
                                </div>

                                <input type="text" wire:model="search" class="form-control" placeholder="Manufacturer Name" />
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label search-label" for="published">Published</label>

                            <div class="col-sm-9 d-flex">
                                <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Search by a 'Published' property.">
                                    <i class="bx bxs-help-circle"></i>
                                </div>

                                <select wire:model="byPublish" class="form-select">
                                    <option value="">All</option>
                                    <option value="1">Published only</option>
                                    <option value="0">Unpublished only</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
