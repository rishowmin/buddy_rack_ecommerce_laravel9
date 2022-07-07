@extends('layouts.admin')
@section('pageTitle') {{ 'Add A New Manufacturer' }} @endsection
@section('content')
    <div class="card mb-4">
        <div class="card-body pt-0 pb-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="page-title py-3">
                            <h4 class="fw-bold mb-2">Add a new manufacturer</h4>
                            <nav>
                                <ol class="breadcrumb breadcrumb-style1 mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">Catalog</li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ url('admin/manufacturer/list') }}">Manufacturer</a>
                                    </li>
                                    <li class="breadcrumb-item active">Add Manufacturer</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="back-to-list ml-auto">
                            <a href="{{ url('admin/manufacturer/list') }}" class="btn btn-sm btn-dark">
                                <span class="tf-icons bx bx-left-arrow"></span> Back to list
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Basic with Icons -->
    <div class="col-xxl">
        <form method="POST" action="{{ url('admin/manufacturer/list') }}" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-end text-end">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">
                        <span class="tf-icons bx bx-save"></span> Save
                    </button>
                </div>
            </div>

            <div class="accordion mt-3 mb-3" id="manufacturerAccordion">

                <div id="manufacturerInfo" class="card accordion-item active">
                    <h2 class="accordion-header" id="accordionHeadingOne">
                        <button type="button" class="accordion-button" data-bs-toggle="collapse"
                            data-bs-target="#manufacturerInfoAccordion" aria-expanded="true"
                            aria-controls="manufacturerInfoAccordion">
                            <h5 class="accordion-title mb-0"><i class="bx bx-info-circle"></i> Manufacturer Info</h5>
                        </button>
                    </h2>

                    <hr class="m-0">

                    <div id="manufacturerInfoAccordion" class="accordion-collapse collapse show"
                        data-bs-parent="#manufacturerInfoAccordion">
                        <div class="accordion-body">

                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="manufacturerName">Name</label>
                                    <span class="text-danger">*</span>
                                </div>
                                <div class="col-sm-10">
                                    <div class="d-flex">
                                        <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="The manufacturer's name.">
                                            <i class="bx bxs-help-circle"></i>
                                        </div>

                                        <input type="text" class="form-control" id="manufacturerName" name="manufacturerName" placeholder="Manufacturer Name" />
                                    </div>
                                    @error('manufacturerName')
                                        <small class="text-danger m-4">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="description">Description</label>
                                    <span class="text-danger">*</span>
                                </div>
                                <div class="col-sm-10">
                                    <div class="d-flex">
                                        <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="The description of the manufacturer.">
                                            <i class="bx bxs-help-circle"></i>
                                        </div>

                                        <textarea type="text" class="form-control" id="premiumskinsandicons-small" name="description"
                                            placeholder="Description" width="100%" height="300px"></textarea>
                                    </div>
                                    @error('description')
                                        <small class="text-danger m-4">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="image">Picture</label>
                                </div>
                                <div class="col-sm-8">
                                    <div class="d-flex">
                                        <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="The manufacturer picture.">
                                            <i class="bx bxs-help-circle"></i>
                                        </div>

                                        <input type="file" class="form-control" id="image" name="image"
                                            onchange="loadFile(event)" />
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <div class="img-prev-div">
                                        <img id="img-prev" />
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="officialWebsite">Official Website</label>
                                    <span class="text-danger">*</span>
                                </div>
                                <div class="col-sm-10">
                                    <div class="d-flex">
                                        <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="The manufacturer's official website.">
                                            <i class="bx bxs-help-circle"></i>
                                        </div>

                                        <input type="url" class="form-control" id="officialWebsite" name="officialWebsite" placeholder="Website URL" />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div id="display" class="card accordion-item">
                    <h2 class="accordion-header" id="accordionHeadingTwo">
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                            data-bs-target="#displayAccordion" aria-expanded="false" aria-controls="displayAccordion">
                            <h5 class="accordion-title mb-0"><i class="bx bx-desktop"></i> Display</h5>
                        </button>
                    </h2>

                    <hr class="m-0">

                    <div id="displayAccordion" class="accordion-collapse collapse" data-bs-parent="#displayAccordion">
                        <div class="accordion-body">

                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="published">Published</label>
                                </div>
                                <div class="col-sm-10">
                                    <div class="d-flex">
                                        <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Check to publish this manufacturer (visible in store). Uncheck to unpublish (manufacturer not available in store).">
                                            <i class="bx bxs-help-circle"></i>
                                        </div>

                                        <input type="checkbox" class="form-check-input" id="published" name="published"
                                            checked="" />
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="displayOrder">Display Order</label>
                                </div>
                                <div class="col-sm-10">
                                    <div class="d-flex">
                                        <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Set the manufacturer's display order. 1 represents the top of the list.">
                                            <i class="bx bxs-help-circle"></i>
                                        </div>

                                        <input type="number" class="form-control" id="displayOrder" name="displayOrder"
                                            value="0" />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div id="seo" class="card accordion-item">
                    <h2 class="accordion-header" id="accordionHeadingThree">
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse"
                            data-bs-target="#seoAccordion" aria-expanded="false" aria-controls="seoAccordion">
                            <h5 class="accordion-title mb-0"><i class="bx bx-zoom-in"></i> SEO</h5>
                        </button>
                    </h2>

                    <hr class="m-0">

                    <div id="seoAccordion" class="accordion-collapse collapse" data-bs-parent="#seoAccordion">
                        <div class="accordion-body">

                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="seoPageName">SEO Page Name</label>
                                    <span class="text-danger">*</span>
                                </div>
                                <div class="col-sm-10">
                                    <div class="d-flex">
                                        <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Set a search engine friendly page name e.g. 'the-best-manufacturer' to make your page URL 'http://www.yourStore.com/the-best-manufacturer'. Leave empty to generate it automatically based on the name of the manufacturer.">
                                            <i class="bx bxs-help-circle"></i>
                                        </div>

                                        <input type="text" class="form-control" id="seoPageName" name="seoPageName"
                                            placeholder="Search Engine Friendly Page Name" />
                                    </div>
                                    @error('seoPageName')
                                        <small class="text-danger m-4">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="metaTitle">Meta Title</label>
                                    <span class="text-danger">*</span>
                                </div>
                                <div class="col-sm-10">
                                    <div class="d-flex">
                                        <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Override the page title. The default is the name of the manufacturer.">
                                            <i class="bx bxs-help-circle"></i>
                                        </div>

                                        <input type="text" class="form-control" id="metaTitle" name="metaTitle"
                                            placeholder="Meta Title" />
                                    </div>
                                    @error('metaTitle')
                                        <small class="text-danger m-4">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="metaKeywords">Meta Keywords</label>
                                    <span class="text-danger">*</span>
                                </div>
                                <div class="col-sm-10">
                                    <div class="d-flex">
                                        <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Meta keywords to be added to manufacturer page header.">
                                            <i class="bx bxs-help-circle"></i>
                                        </div>

                                        <input type="text" class="form-control" id="metaKeywords" name="metaKeywords"
                                            placeholder="Meta Keywords" />
                                    </div>
                                    @error('metaKeywords')
                                        <small class="text-danger m-4">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="metaDescription">Meta Description</label>
                                    <span class="text-danger">*</span>
                                </div>
                                <div class="col-sm-10">
                                    <div class="d-flex">
                                        <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Meta description to be added to manufacturer page header.">
                                            <i class="bx bxs-help-circle"></i>
                                        </div>

                                        <textarea type="text" class="form-control" id="metaDescription" name="metaDescription" placeholder="Meta Description" rows="3"></textarea>
                                    </div>
                                    @error('metaDescription')
                                        <small class="text-danger m-4">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
    </div>
@endsection
