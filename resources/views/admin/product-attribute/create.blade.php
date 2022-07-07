@extends('layouts.admin')
@section('pageTitle') {{ 'Add A New Attribute' }} @endsection
@section('content')
    <div class="card mb-4">
        <div class="card-body pt-0 pb-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="page-title py-3">
                            <h4 class="fw-bold mb-2">Add a new attribute</h4>
                            <nav>
                                <ol class="breadcrumb breadcrumb-style1 mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">Catalog</li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ url('admin/attribute/list') }}">Add A New Attribute</a>
                                    </li>
                                    <li class="breadcrumb-item active">Add Attribute</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="back-to-list ml-auto">
                            <a href="{{ url('admin/attribute/list') }}" class="btn btn-sm btn-dark">
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
        <form method="POST" action="{{ url('admin/attribute/list') }}">
            @csrf
            <div class="row justify-content-end text-end">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">
                        <span class="tf-icons bx bx-save"></span> Save
                    </button>
                </div>
            </div>

            <div class="accordion mt-3 mb-3" id="attributeAccordion">

                <div id="attributeInfo" class="card accordion-item active">
                    <h2 class="accordion-header" id="accordionHeadingOne">
                        <button type="button" class="accordion-button" data-bs-toggle="collapse"
                            data-bs-target="#attributeInfoAccordion" aria-expanded="true"
                            aria-controls="attributeInfoAccordion">
                            <h5 class="accordion-title mb-0"><i class="bx bx-info-circle"></i> Attribute Info</h5>
                        </button>
                    </h2>

                    <hr class="m-0">

                    <div id="attributeInfoAccordion" class="accordion-collapse collapse show"
                        data-bs-parent="#attributeInfoAccordion">
                        <div class="accordion-body">

                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="attributeName">Name</label>
                                    <span class="text-danger">*</span>
                                </div>
                                <div class="col-sm-10">
                                    <div class="d-flex">
                                        <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="The attribute's name.">
                                            <i class="bx bxs-help-circle"></i>
                                        </div>

                                        <input type="text" class="form-control" id="attributeName" name="attributeName" placeholder="Attribute Name" />
                                    </div>
                                    @error('attributeName')
                                        <small class="text-danger m-4">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="description">Description</label>
                                </div>
                                <div class="col-sm-10">
                                    <div class="d-flex">
                                        <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="The description of the product attribute.">
                                            <i class="bx bxs-help-circle"></i>
                                        </div>

                                        <textarea type="text" class="form-control" id="premiumskinsandicons-small" name="description"
                                            placeholder="Description" width="100%" height="300px"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <label class="col-form-label" for="attributeType">Type</label>
                                    <span class="text-danger">*</span>
                                </div>
                                <div class="col-sm-10">
                                    <div class="d-flex">
                                        <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="The attribute's name.">
                                            <i class="bx bxs-help-circle"></i>
                                        </div>

                                        <select class="form-select" id="attributeType" name="attributeType">
                                            <option selected="">Select Attribute Type</option>
                                            <option value="Color">Color</option>
                                            <option value="Size">Size</option>
                                        </select>

                                        {{-- <input type="text" class="form-control" id="attributeType" name="attributeType" placeholder="Attribute Name" /> --}}
                                    </div>
                                    @error('attributeType')
                                        <small class="text-danger m-4">{{ $message }}</small>
                                    @enderror
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
                                            title="Check to publish this product attribute (visible in store). Uncheck to unpublish (product attribute not available in store).">
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
                                            title="Set the product attribute's display order. 1 represents the top of the list.">
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

            </div>
        </form>
    </div>
    </div>
@endsection
