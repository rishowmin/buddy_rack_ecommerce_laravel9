<div>
    <!-- Category Delete Modal -->
    @include('admin.category.inc.deleteModal')
    <!-- Alert Message -->
    @include('flash-message')
    <!-- Page Title & Pagination -->
    @include('admin.category.inc.pageHeader')
    <!-- Search Category -->
    @include('admin.category.inc.searchFilter')


    <!-- Category List -->
    <div class="card card-list">
        <div class="row">
            <div class="col-md-6">
                <h5 class="card-header"><i class="bx bx-bar-chart-alt-2"></i> List of Categories</h5>
            </div>
            <div class="col-md-6">
                <div class="count-section">
                    <div class="record-div">
                        <span class="badge bg-label-primary record-label">Total Categories</span>
                        <span class="badge bg-primary record-count">{{ count($countTotalRecords) }}</span>
                    </div>
                    <div class="record-div">
                        <span class="badge bg-label-success record-label">Published</span>
                        <span class="badge bg-success record-count">{{ count($countPublishedRecords) }}</span>
                    </div>
                    <div class="record-div">
                        <span class="badge bg-label-danger record-label">Unpublished</span>
                        <span class="badge bg-danger record-count">{{ count($countUnpublishedRecords) }}</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- <h5 class="card-header"><i class="bx bx-bar-chart-alt-2"></i> List of Categories</h5> --}}

        <div class="table-responsive text-nowrap">
            <hr class="m-0">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Published</th>
                        <th>Display Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($categoryList->count())
                        @foreach ($categoryList as $category)
                            <tr>
                                {{-- <td>{{ $category->id }}</td> --}}
                                <td><span class="badge bg-label-primary">{{ ++$counter }}</span></td>
                                <td>{{ $category->categoryName }}</td>
                                <td>
                                    @if ($category->published == '1')
                                        <span class="badge bg-success badge-center"><i
                                                class="bx bx-check bx-xs"></i></span>
                                    @else()
                                        <span class="badge bg-danger badge-center"><i
                                                class="bx bx-x bx-xs"></i></span>
                                    @endif
                                </td>
                                <td>{{ $category->displayOrder }}</td>
                                <td class="d-flex justify-content-center">
                                    <div class="list-action-btn" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="Edit">
                                        <a href="{{ url('admin/category/edit/' . $category->id) }}"
                                            class="btn btn-icon btn-sm btn-warning">
                                            <span class="tf-icons bx bx-edit bx-xs"></span>
                                        </a>
                                    </div>
                                    <div class="list-action-btn" data-bs-toggle="tooltip" data-bs-placement="right"
                                        title="Delete">
                                        <a href="{{ $category->id }}"
                                            wire:click="deleteCategory({{ $category->id }})"
                                            class="btn btn-icon btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal">
                                            <span class="tf-icons bx bx-trash bx-xs"></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">No categories found</td>
                        </tr>
                    @endif

                </tbody>
                <tfoot class="table-border-bottom-0">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Published</th>
                        <th>Display Order</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
            <hr class="m-0">

            <div>
                {{ $categoryList->links('pagination-links') }}
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteModal').modal('hide');
        });
    </script>
@endpush
