@extends('layouts.admin')
@section('pageTitle')
    {{ 'Add A New Product' }}
@endsection
@section('content')
    <div class="card mb-4">
        <div class="card-body pt-0 pb-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="page-title py-3">
                            <h4 class="fw-bold mb-2">Add a new product</h4>
                            <nav>
                                <ol class="breadcrumb breadcrumb-style1 mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">Catalog</li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ url('admin/product/list') }}">Products</a>
                                    </li>
                                    <li class="breadcrumb-item active">Add Product</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="back-to-list ml-auto">
                            <a href="{{ url('admin/product/list') }}" class="btn btn-sm btn-dark">
                                <span class="tf-icons bx bx-left-arrow"></span> Back to list
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xxl">
        <form method="POST" action="{{ url('admin/product/list') }}" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-end text-end">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">
                        <span class="tf-icons bx bx-save"></span> Save
                    </button>
                </div>
            </div>
            <div class="nav-align-top mt-3 mb-3">
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-justified-productInfo" aria-controls="navs-justified-productInfo"
                            aria-selected="true">
                            <i class="tf-icons bx bx-info-circle"></i> Product Info
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-justified-price" aria-controls="navs-justified-price"
                            aria-selected="false">
                            <i class="tf-icons bx bx-dollar-circle"></i> Price
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-justified-inventory" aria-controls="navs-justified-inventory"
                            aria-selected="false">
                            <i class="tf-icons bx bx-sitemap"></i> Inventory
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-justified-pictures" aria-controls="navs-justified-pictures"
                            aria-selected="false">
                            <i class="tf-icons bx bx-images"></i> Pictures
                        </button>
                    </li>
                    {{-- <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-justified-attributes" aria-controls="navs-justified-pictures"
                            aria-selected="false">
                            <i class="tf-icons bx bx-paperclip"></i> Attributes
                        </button>
                    </li> --}}
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-justified-display" aria-controls="navs-justified-display"
                            aria-selected="false">
                            <i class="tf-icons bx bx-desktop"></i> Display
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-justified-seo" aria-controls="navs-justified-seo" aria-selected="false">
                            <i class="tf-icons bx bx-zoom-in"></i> SEO
                        </button>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade active show" id="navs-justified-productInfo" role="tabpanel">

                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="productName">Name</label>
                                <span class="text-danger">*</span>
                            </div>
                            <div class="col-sm-10">
                                <div class="d-flex">
                                    <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="The name of the product.">
                                        <i class="bx bxs-help-circle"></i>
                                    </div>

                                    <input type="text" class="form-control" id="productName" name="productName"
                                        placeholder="Product Name" />
                                </div>
                                @error('productName')
                                    <small class="text-danger m-4">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="shortDescription">Short Description</label>
                                <span class="text-danger">*</span>
                            </div>
                            <div class="col-sm-10">
                                <div class="d-flex">
                                    <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Short description is the text that is displayed in product list i.e. category / manufacturer pages.">
                                        <i class="bx bxs-help-circle"></i>
                                    </div>

                                    <textarea type="text" class="form-control" id="shortDescription" name="shortDescription"
                                        placeholder="Short Description" rows="3"></textarea>
                                </div>
                                @error('shortDescription')
                                    <small class="text-danger m-4">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="fullDescription">Full Description</label>
                            </div>
                            <div class="col-sm-10">
                                <div class="d-flex">
                                    <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Full description is the text that is displayed in product page.">
                                        <i class="bx bxs-help-circle"></i>
                                    </div>

                                    <textarea type="text" class="form-control" id="premiumskinsandicons-small" name="fullDescription"
                                        placeholder="Full Description" width="100%" height="300px"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="sku">SKU</label>
                            </div>
                            <div class="col-sm-10">
                                <div class="d-flex">
                                    <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Product stock keeping unit (SKU). Your internal unique identifier that can be used to track this product.">
                                        <i class="bx bxs-help-circle"></i>
                                    </div>

                                    <input type="text" class="form-control" id="sku" name="sku"
                                        placeholder="SKU" />
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="category">Category</label>
                                <span class="text-danger">*</span>
                            </div>
                            <div class="col-sm-10">
                                <div class="d-flex">
                                    <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Choose categories. You can manage product categories by selecting Catalog > Categories.">
                                        <i class="bx bxs-help-circle"></i>
                                    </div>

                                    <select id="category" name="category_id" class="form-select">
                                        <option selected value="0">[None]</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->categoryName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                    <small class="text-danger m-4">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="manufacturer">Manufacturer</label>
                            </div>
                            <div class="col-sm-10">
                                <div class="d-flex">
                                    <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Choose categories. You can manage product categories by selecting Catalog > Categories.">
                                        <i class="bx bxs-help-circle"></i>
                                    </div>

                                    <select id="manufacturer" name="manufacturer" class="form-select">
                                        <option selected value="0">[None]</option>
                                        @foreach ($manufacturers as $manufacturer)
                                            <option value="{{ $manufacturer->id }}">
                                                {{ $manufacturer->manufacturerName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="trending">Trending</label>
                            </div>
                            <div class="col-sm-4">
                                <div class="d-flex">
                                    <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Check to mark the product as trending. Use this option for the most trending products.">
                                        <i class="bx bxs-help-circle"></i>
                                    </div>

                                    <input type="checkbox" class="form-check-input" id="trending" name="trending" />
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <label class="col-form-label" for="markAsNew">Mark As New</label>
                            </div>
                            <div class="col-sm-4">
                                <div class="d-flex">
                                    <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Check to mark the product as new. Use this option for promoting new products.">
                                        <i class="bx bxs-help-circle"></i>
                                    </div>

                                    <input type="checkbox" class="form-check-input" id="markAsNew" name="markAsNew" />
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="productType">Product Type</label>
                            </div>
                            <div class="col-sm-10">
                                <div class="d-flex">
                                    <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Product type can be simple or grouped. In most cases your product will have the Simple product type. You need to use Grouped product type when a new product consists of one or more existing products that will be displayed on one single product details page.">
                                        <i class="bx bxs-help-circle"></i>
                                    </div>

                                    <select id="productType" name="productType" class="form-select">
                                        <option value="Simple">Simple</option>
                                        <option value="Grouped">Grouped (product with variants)</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="navs-justified-price" role="tabpanel">

                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="price">Price</label>
                                <span class="text-danger">*</span>
                            </div>
                            <div class="col-sm-10">
                                <div class="d-flex">
                                    <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="The price of the product. You can manage currency by selecting Configuration > Currencies.">
                                        <i class="bx bxs-help-circle"></i>
                                    </div>

                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text currency">৳</span>
                                        <input type="number" class="form-control" id="price" name="price"
                                            placeholder="0">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                @error('price')
                                    <small class="text-danger m-4">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="oldPrice">Old Price</label>
                            </div>
                            <div class="col-sm-10">
                                <div class="d-flex">
                                    <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="The old price of the product. If you set an old price, this will display alongside the current price on the product page to show the difference in price.">
                                        <i class="bx bxs-help-circle"></i>
                                    </div>

                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text currency">৳</span>
                                        <input type="number" class="form-control" id="oldPrice" name="oldPrice"
                                            placeholder="0">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="productCost">Product Cost</label>
                            </div>
                            <div class="col-sm-10">
                                <div class="d-flex">
                                    <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Product cost is a prime product cost. This field is only for internal use, not visible for customers.">
                                        <i class="bx bxs-help-circle"></i>
                                    </div>

                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text currency">৳</span>
                                        <input type="number" class="form-control" id="productCost" name="productCost"
                                            placeholder="0">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="navs-justified-inventory" role="tabpanel">

                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="inventoryMethod">Inventory Method</label>
                            </div>
                            <div class="col-sm-10">
                                <div class="d-flex">
                                    <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Select inventory method. There are three methods: Don’t track inventory, Track inventory and Track inventory by attributes. You should use Track inventory by attributes when the product has different combinations of these attributes and then manage inventory for these combinations.">
                                        <i class="bx bxs-help-circle"></i>
                                    </div>

                                    <select id="inventoryMethod" name="inventoryMethod" class="form-select">
                                        <option value="0">Don't track inventory</option>
                                        <option value="1">Track inventory</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="stockQuantity">Stock Quantity</label>
                            </div>
                            <div class="col-sm-10">
                                <div class="d-flex">
                                    <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="The current stock quantity of this product.">
                                        <i class="bx bxs-help-circle"></i>
                                    </div>

                                    <input type="number" class="form-control" id="stockQuantity" name="stockQuantity"
                                        value="1000" />
                                </div>
                                @error('stockQuantity')
                                    <small class="text-danger m-4">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="warehouse">Warehouse</label>
                            </div>
                            <div class="col-sm-10">
                                <div class="d-flex">
                                    <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Choose the warehouse which will be used when calculating shipping rates. You can manage warehouses by selecting Configuration > Shipping > Warehouses.">
                                        <i class="bx bxs-help-circle"></i>
                                    </div>

                                    <select id="warehouse" name="warehouse" class="form-select">
                                        <option value="1">Warehouse 1</option>
                                        <option value="2">Warehouse 2</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="minCartQuantity">Min Cart Qty</label>
                            </div>
                            <div class="col-sm-10">
                                <div class="d-flex">
                                    <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Set the minimum quantity allowed in a customer's shopping cart e.g. set to 3 to only allow customers to purchase 3 or more of this product.">
                                        <i class="bx bxs-help-circle"></i>
                                    </div>

                                    <input type="number" class="form-control" id="minCartQuantity"
                                        name="minCartQuantity" value="1" />
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="maxCartQuantity">Max Cart Qty</label>
                            </div>
                            <div class="col-sm-10">
                                <div class="d-flex">
                                    <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Set the maximum quantity allowed in a customer's shopping cart e.g. set to 5 to only allow customers to purchase 5 of this product.">
                                        <i class="bx bxs-help-circle"></i>
                                    </div>

                                    <input type="number" class="form-control" id="maxCartQuantity"
                                        name="maxCartQuantity" value="100" />
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="navs-justified-pictures" role="tabpanel">

                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <div class="img-prev-div">
                                    <img id="multi-img-prev" />
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="image">Picture</label>
                            </div>
                            <div class="col-sm-10">
                                <div class="d-flex">
                                    <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="The manufacturer picture.">
                                        <i class="bx bxs-help-circle"></i>
                                    </div>

                                    <input type="file" class="form-control" id="formFileMultiple" name="image[]"
                                        multiple onchange="loadFile(event)" />
                                </div>
                            </div>
                        </div>


                        {{-- <div class="table-responsive text-nowrap">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Picture</th>
                                        <th>Title</th>
                                        <th>Alt</th>
                                        <th>Display Order</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('assets/admin/img/backgrounds/default-image_100.png') }}" alt="">
                                        </td>
                                        <td>ABCD</td>
                                        <td>abcd</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('assets/admin/img/backgrounds/default-image_100.png') }}" alt="">
                                        </td>
                                        <td>EFGH</td>
                                        <td>efgh</td>
                                        <td>2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> --}}

                        {{-- <div class="row mb-3">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="image">Picture</label>
                            </div>
                            <div class="col-sm-10">
                                <div class="d-flex">
                                    <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="The category picture.">
                                        <i class="bx bxs-help-circle"></i>
                                    </div>

                                    <input type="file" class="form-control" id="image" name="image"
                                        onchange="loadFile(event)" />
                                </div>
                            </div>
                        </div> --}}

                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="imageTitle">Title</label>
                            </div>
                            <div class="col-sm-10">
                                <div class="d-flex">
                                    <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="The manufacturer picture.">
                                        <i class="bx bxs-help-circle"></i>
                                    </div>

                                    <input type="text" class="form-control" id="imageTitle" name="imageTitle"
                                        placeholder="Image Title" />
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="imageAlt">Alt</label>
                            </div>
                            <div class="col-sm-10">
                                <div class="d-flex">
                                    <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="The manufacturer picture.">
                                        <i class="bx bxs-help-circle"></i>
                                    </div>

                                    <input type="text" class="form-control" id="imageAlt" name="imageAlt"
                                        placeholder="Image Alt" />
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row mb-3">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="imageDisplayOrder">Display Order</label>
                            </div>
                            <div class="col-sm-10">
                                <div class="d-flex">
                                    <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="The manufacturer picture.">
                                        <i class="bx bxs-help-circle"></i>
                                    </div>

                                    <input type="number" class="form-control" id="imageDisplayOrder"
                                        name="imageDisplayOrder" value="0" />
                                </div>
                            </div>
                        </div> --}}

                    </div>

                    {{-- <div class="tab-pane fade" id="navs-justified-attributes" role="tabpanel">

                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="productSize">Size</label>
                            </div>
                            <div class="col-sm-10">
                                <div class="d-flex">
                                    <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Product attributes are quantifiable or descriptive aspects of a product (such as, color). For example, if you were to create an attribute for color, with the values of blue, green, yellow, and so on, you may want to apply this attribute to shirts, which you sell in various colors (you can adjust a price or weight for any of existing attribute values). You can add attribute for your product using existing list of attributes, or if you need to create a new one go to Catalog > Attributes > Product attributes. Please notice that if you want to manage inventory by product attributes (e.g. 5 green shirts and 3 blue ones), then ensure that 'Inventory method' is set to 'Track inventory by product attributes'.">
                                        <i class="bx bxs-help-circle"></i>
                                    </div>

                                    @forelse ($productSizes as $size)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="{{ $size->attributeName }}" id="{{ $size->attributeName }}" name="productSize">
                                            <label class="form-check-label" for="productSize"> {{ $size->attributeName }} </label>
                                        </div>
                                    @empty
                                        <h4>No sizes found</h4>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="productColor">Color</label>
                            </div>
                            <div class="col-sm-10">
                                <div class="d-flex">
                                    <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Product attributes are quantifiable or descriptive aspects of a product (such as, color). For example, if you were to create an attribute for color, with the values of blue, green, yellow, and so on, you may want to apply this attribute to shirts, which you sell in various colors (you can adjust a price or weight for any of existing attribute values). You can add attribute for your product using existing list of attributes, or if you need to create a new one go to Catalog > Attributes > Product attributes. Please notice that if you want to manage inventory by product attributes (e.g. 5 green shirts and 3 blue ones), then ensure that 'Inventory method' is set to 'Track inventory by product attributes'.">
                                        <i class="bx bxs-help-circle"></i>
                                    </div>

                                    @forelse ($productColors as $color)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="{{ $color->attributeName }}" id="{{ $color->attributeName }}" name="productColor">
                                            <label class="form-check-label" for="productColor"> {{ $color->attributeName }} </label>
                                        </div>
                                    @empty
                                        <h4>No colors found</h4>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                    </div> --}}

                    <div class="tab-pane fade" id="navs-justified-display" role="tabpanel">

                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="published">Published</label>
                            </div>
                            <div class="col-sm-10">
                                <div class="d-flex">
                                    <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Check to publish this product (visible in store). Uncheck to unpublish (product not available in store).">
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
                                        title="Set the product's display order. 1 represents the top of the list.">
                                        <i class="bx bxs-help-circle"></i>
                                    </div>

                                    <input type="number" class="form-control" id="displayOrder" name="displayOrder"
                                        value="0" />
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="navs-justified-seo" role="tabpanel">

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
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="metaKeywords">Meta Keywords</label>
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
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="metaDescription">Meta Description</label>
                            </div>
                            <div class="col-sm-10">
                                <div class="d-flex">
                                    <div class="input-help" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Meta description to be added to manufacturer page header.">
                                        <i class="bx bxs-help-circle"></i>
                                    </div>

                                    <textarea type="text" class="form-control" id="metaDescription" name="metaDescription"
                                        placeholder="Meta Description" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
