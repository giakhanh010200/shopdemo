@extends('admin.layout')
@section('link')
    <link rel="stylesheet" href="{{ URL::asset('css/admin/products.css') }}">
@stop

@section('content')
    <div class="auth-main--content -wrapper">
        <div class="auth---header">
            <div class="header--left">
                <h3 class="auth-pages-title">
                    Sản phẩm
                </h3>
            </div>
            <div class="header--right">
                <div class="block-search-prds">
                    <input type="text" name="search" placeholder="Tìm sản phẩm ... ">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <div class="block-add-prds">
                    <button class="btn btn-add-new-product" id="btnAddPrds" data-toggle="modal" data-target="#modalAddPrd">
                        + Thêm sản phẩm
                    </button>
                </div>
            </div>
        </div>
        <div class="block-wget-err">
            @if (session()->has('msgerr'))
                <div class="alert alert-danger" id="msgErr">
                    {{ session()->get('msgerr') }}
                </div>
                <script type="text/javascript">
                    setTimeout(function() {
                        $("#msgErr").hide();
                    }, 3000)
                </script>
            @endif
            @if (session()->has('msgss'))
                <div class="alert alert-success" id="msgSuc">
                    {{ session()->get('msgss') }}
                </div>
                <script type="text/javascript">
                    setTimeout(function() {
                        $("#msgSuc").hide();
                    }, 3000)
                </script>
            @endif
        </div>
        <div class="auth--prds-content">
            @php
                $ram_array = ['1', '2', '3', '4', '6', '8', '12', '16', '18', '32', '64'];
                $len_ram = count($ram_array);
                $rom_array = ['16GB', '32GB', '64GB', '128GB', '256GB', '512GB', '1TB', '2TB', '4TB', '8TB'];
                $len_rom = count($rom_array);
            @endphp
            <div class="table table-striped table-hover table-light">
                <div class="row-title row">
                    <div class="col-1 product-thumbnail prd-title">
                        Ảnh
                    </div>
                    <div class="col-1 proudct-sku prd_title">
                        SKU
                    </div>
                    <div class="col-4 proudct-name prd_title">
                        Tên sản phẩm
                    </div>
                    <div class="col-2 proudct-sale_price prd_title">
                        Giá bán
                    </div>
                    <div class="col-2 proudct-import_price prd_title">
                        Giá nhập
                    </div>
                    <div class="col-1 product-quantity prd_title">
                        Số lượng
                    </div>
                    <div class="col-1 product-details prd_title">
                        Chi tiết
                    </div>
                </div>
                @foreach ($products as $product)
                    <div class="row-content row wget-each-prd">
                        <div class="col-1 image-col prd-content">
                            @if ($product->thumbnail != '')
                                <img src="{{ URL::asset('image/admin/products/product' . $product->id . '/' . $product->thumbnail) }}"
                                    alt="Ảnh sản phẩm">
                            @else
                                <div class="thumbnail-text-replace">Ảnh sản phẩm</div>
                            @endif

                        </div>
                        <div class="col-1 sku-col prd-content">
                            {{ $product->SKU }}
                        </div>
                        <div class="col-4 name-col prd-content">
                            {{ $product->name }}
                        </div>
                        <div class="col-2 sale_price-col prd-content">
                            {{ number_format($product->sale_price, 0, '.', '.') }} VNĐ
                        </div>
                        <div class="col-2 import_price-col prd-content">
                            {{ number_format($product->import_price, 0, '.', '.') }} VNĐ
                        </div>
                        <div class="col-1 quantity-col prd-content">
                            {{ $product->quantity }}
                        </div>
                        <div class="col-1 details-col prd-content">
                            <button class="btn btn-show-detail" value="{{ $product->id }}">
                                <i class="fa-solid fa-angle-down"></i>
                            </button>
                        </div>
                    </div>
                    <div class="product-block-detail col-12 action-block" id="blockDetailProduct{{ $product->id }}">
                        <form action="{{ route('admin.process_edit_product', $product->id) }}"
                            class="form-horizontal form-action-detail" id="formDetailProduct{{ $product->id }}"
                            method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            {{ csrf_field() }}
                            <div class="block-form-top">
                                <div class="block-form-left col-3">
                                    <div class="form-group">
                                        <div class="block-show-image">
                                            @if ($product->thumbnail != '')
                                                <img src="{{ URL::asset('image/admin/products/product' . $product->id . '/' . $product->thumbnail) }}"
                                                    id="showUploadImage{{ $product->id }}"alt="Ảnh sản phẩm"
                                                    class="image-file-upload form-control">
                                            @else
                                                <img id="showUploadImage{{ $product->id }}"
                                                    class="image-file-upload form-control">
                                            @endif
                                        </div>
                                        <input id="addThumb{{ $product->id }}" type="file" name="thumbnail"
                                            class="form-control thumbnail-image-show">
                                        <script type="text/javascript">
                                            document.getElementById("addThumb{{ $product->id }}").onchange = function() {
                                                var reader = new FileReader();

                                                reader.onload = function(e) {
                                                    // get loaded data and render thumbnail.
                                                    document.getElementById("showUploadImage{{ $product->id }}").src = e.target.result;
                                                };

                                                // read the image file as a data URL.
                                                reader.readAsDataURL(this.files[0]);
                                            };
                                        </script>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">
                                            Mã lưu kho*
                                        </label>
                                        <input type="text" class="form-control set-def-value-{{ $product->id }}"
                                            name="sku" id="actionSKU{{ $product->id }}" value="{{ $product->SKU }}"
                                            placeholder="SKU">

                                    </div>
                                </div>
                                <div class="block-form-middle col-5">
                                    <div class="form-group">
                                        <label class="control-label">
                                            Tên sản phẩm*
                                        </label>
                                        <input type="text" class="form-control set-def-value-{{ $product->id }}"
                                            name="name" id="actionName{{ $product->id }}" placeholder="Tên sản phẩm"
                                            value="{{ $product->name }}">
                                    </div>

                                    <div class="multi-row-group">
                                        <div class="column-group">
                                            <div class="form-group">
                                                <label class="control-label">
                                                    Danh mục*
                                                </label>
                                                <select class="form-control" name="category_id"
                                                    id="actionCategory{{ $product->id }}">
                                                    @foreach ($category as $cate)
                                                        <option value="{{ $cate->id }}"
                                                            class="{{ $cate->id === $product->category_id ? 'set-selected-value-' . $product->id : '' }}"
                                                            {{ $cate->id === $product->category_id ? 'selected' : '' }}>
                                                            {{ $cate->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">
                                                    Nhà sản xuất*
                                                </label>
                                                <select class="form-control" name="manufacturer_id"
                                                    id="actionManufacturer{{ $product->id }}">
                                                    @foreach ($manufacturer as $manu)
                                                        <option value="{{ $manu->id }}"
                                                            class="{{ $manu->id === $product->manufacturer_id ? 'set-selected-value-' . $product->id : '' }}"
                                                            {{ $manu->id === $product->manufacturer_id ? 'selected' : '' }}>
                                                            {{ $manu->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">
                                                    Dung lượng RAM*
                                                </label>

                                                <select class="form-control" name="ram"
                                                    id="actionRam{{ $product->id }}">
                                                    @for ($i = 0; $i < $len_ram; $i++)
                                                        <option value="@php echo $ram_array[$i] @endphp"
                                                            {{ $ram_array[$i] == $product->ram ? 'selected' : '' }}
                                                            class="{{ $ram_array[$i] == $product->ram ? 'set-selected-value-' . $product->id : '' }}">
                                                            @php
                                                                echo $ram_array[$i] . 'GB';
                                                            @endphp
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group check-box-group">
                                            <label class="control-label">
                                                Bộ nhớ trong*
                                            </label>
                                            <div class="list-checkbox form-control">
                                                @php
                                                    $array_rom_prd = explode(',', $product->rom);
                                                @endphp
                                                @for ($i = 0; $i < $len_rom; $i++)
                                                    <div class="check-box-item">
                                                        <input type="checkbox" name="rom[]"
                                                            class="actionRom{{ $product->id }} {{ in_array($rom_array[$i], $array_rom_prd) ? 'set-checked-value-' . $product->id : 'unchecked' }}"
                                                            value="@php echo $rom_array[$i] @endphp"
                                                            {{ in_array($rom_array[$i], $array_rom_prd) ? 'checked' : '' }}>
                                                        <label for="rom[]">
                                                            @php
                                                                echo $rom_array[$i];
                                                            @endphp
                                                        </label>
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>

                                    <div class="multi-row-group">
                                        <div class="form-group">
                                            <label class="control-label">
                                                Giá nhập*
                                            </label>
                                            <div class="block-currency">
                                                <input class="form-control price" id="actionImportP{{ $product->id }}"
                                                    type="number" min="100000" placeholder="100000" step="10000"
                                                    data-type="currency" name="import_price"
                                                    value="{{ $product->import_price }}">
                                                <span class="currency">VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Giá bán*
                                            </label>
                                            <div class="block-currency">
                                                <input class="form-control price" id="actionSaleP{{ $product->id }}"
                                                    type="number" min="100000" step="10000" placeholder="100000"
                                                    data-type="currency" name="sale_price"
                                                    value="{{ $product->sale_price }}">
                                                <span class="currency">VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Giảm giá
                                            </label>
                                            <div class="block-currency">
                                                <input class="form-control price" type="number" min="0"
                                                    max="100" data-type="currency" name="discount"
                                                    value={{ $product->discount }}>
                                                <span class="currency">%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-form-right col-4">
                                    <div class="form-group">
                                        <label class="control-label">
                                            Số lượng*
                                        </label>
                                        <input type="text" id="actionQuantity{{ $product->quantity }}"
                                            class="form-control" value="{{ $product->quantity }}" placeholder="1"
                                            name="quantity">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">
                                            Thông số kĩ thuật
                                        </label>
                                        <textarea class="form-control" name="specifications" type="text">
                                            {!! $product->specifications !!}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="block-form-bot">
                                <div class="form-group">
                                    <label class="control-label">
                                        Thông tin chi tiết
                                    </label>
                                    <textarea class="form-control" name="description" type="text">
                                        {!! $product->description !!}
                                    </textarea>
                                </div>
                            </div>
                        </form>
                        <div class="alert alert-danger alert-error-hide" id="alertUpdateModal{{ $product->id }}">
                            <p>Các dữ liệu có dấu * phải đầy đủ thông tin</p>
                        </div>
                        <div class="widget-block-button action-button">
                            <div class="button-panel">
                                <div class="button-left-widget">
                                    <button data-toggle="modal" data-target="#modalDelPrd" value="{{ $product->id }}"
                                        class="btn btn-danger btn-delete-product"
                                        data-url="{{ route('admin.delete_product', $product->id) }}">Xóa</button>
                                </div>
                                <div class="button-left-widget">
                                    <button class="btn btn-warning btn-update-product" value="{{ $product->id }}"
                                        data-url="{{ route('admin.process_edit_product', $product->id) }}">Cập
                                        nhật</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- modal confirm delete --}}
    <div class="auth-modal-del block-del-prds modal fade" id="modalDelPrd">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xóa dữ liệu</h5>
                    <button type="button" class="close btn-close-modal-head btn-close-modal-del" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">

                    <form class="form-horizontal form-del" id="formModalDel" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="form-label">
                                Mã SKU:
                            </label>
                            <div class="name-info-del" id="skuDel"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">
                                Tên sản phẩm:
                            </label>
                            <div class="name-info-del" id="nameDel"></div>
                        </div>
                    </form>
                    <div class="alert alert-danger text-ask-conf">
                        <p>Bạn có muốn xóa dữ liệu này không ?</p>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary btn-close-modal-del"
                        data-dismiss="modal">Đóng</button>
                    <button type="button" id="btnSave" class="btn btn-save-del">Xóa</button>
                </div>
            </div>
        </div>
    </div>
    {{-- modal add new product --}}
    <div class="auth-modal-new block-add-prds modal fade" id="modalAddPrd">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Thêm sản phẩm mới</h5>
                    <button type="button" class="close btn-close-modal-head btn-close-new" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" id="formModalAdd" method="post"
                        action="{{ route('admin.add_product') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="block-form-top">
                            <div class="block-form-left col-3">
                                <div class="form-group">
                                    <div class="block-show-image">
                                        <img id="showUploadImage" class="image-file-upload form-control">
                                    </div>
                                    <input onchange="loadFile(event)" id="addThumb" type="file" name="thumbnail"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Mã lưu kho*
                                    </label>
                                    <input type="text" class="form-control" name="sku" id="addSKU"
                                        placeholder="SKU">

                                </div>
                            </div>
                            <div class="block-form-middle col-5">
                                <div class="form-group">
                                    <label class="control-label">
                                        Tên sản phẩm*
                                    </label>
                                    <input type="text" class="form-control" name="name" id="addName"
                                        placeholder="Tên sản phẩm">
                                </div>

                                <div class="multi-row-group">
                                    <div class="column-group">
                                        <div class="form-group">
                                            <label class="control-label">
                                                Danh mục*
                                            </label>
                                            <select class="form-control" name="category_id" id="addCategory">
                                                @foreach ($category as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Nhà sản xuất*
                                            </label>
                                            <select class="form-control" name="manufacturer_id" id="addManufacturer">
                                                @foreach ($manufacturer as $manufacturer)
                                                    <option value="{{ $manufacturer->id }}">
                                                        {{ $manufacturer->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">
                                                Dung lượng RAM*
                                            </label>
                                            <select class="form-control" name="ram" id="addRam">
                                                @for ($i = 0; $i < $len_ram; $i++)
                                                    <option value="@php echo $ram_array[$i] @endphp">
                                                        @php
                                                            echo $ram_array[$i] . 'GB';
                                                        @endphp
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group check-box-group">
                                        <label class="control-label">
                                            Bộ nhớ trong*
                                        </label>
                                        <div class="list-checkbox form-control">
                                            {{-- @for ($i = 0; $i < $len_rom; $i++)
                                                <div class="check-box-item">
                                                    <input type="checkbox" name="rom[]" class="addRom"
                                                        value="@php echo $rom_array[$i] @endphp">
                                                    <label for="rom[]">
                                                        @php
                                                            echo $rom_array[$i];
                                                        @endphp
                                                    </label>
                                                </div>
                                            @endfor --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="multi-row-group">
                                    <div class="form-group">
                                        <label class="control-label">
                                            Giá nhập*
                                        </label>
                                        <div class="block-currency">
                                            <input class="form-control price" id="addImportP" type="number"
                                                min="100000" placeholder="100000" step="10000" data-type="currency"
                                                name="import_price" value="100000">
                                            <span class="currency">VNĐ</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">
                                            Giá bán*
                                        </label>
                                        <div class="block-currency">
                                            <input class="form-control price" id="addSaleP" type="number"
                                                min="100000" step="10000" placeholder="100000" data-type="currency"
                                                name="sale_price" value="100000">
                                            <span class="currency">VNĐ</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">
                                            Giảm giá
                                        </label>
                                        <div class="block-currency">
                                            <input class="form-control price" type="number" min="0"
                                                max="100" data-type="currency" name="discount">
                                            <span class="currency">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-form-right col-4">
                                <div class="form-group">
                                    <label class="control-label">
                                        Số lượng*
                                    </label>
                                    <input type="text" id="addQuality" class="form-control" value="1"
                                        placeholder="1" name="quantity">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Thông số kĩ thuật
                                    </label>
                                    <textarea class="form-control" name="specifications" type="text"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="block-form-bot">
                            <div class="form-group">
                                <label class="control-label">
                                    Thông tin chi tiết
                                </label>
                                <textarea class="form-control" name="description" type="text"></textarea>
                            </div>
                        </div>
                    </form>
                    <div class="alert alert-danger alert-error-hide" id="alertAddModal">
                        <p>Các dữ liệu có dấu * phải đầy đủ thông tin</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-close-new" data-dismiss="modal">Đóng</button>
                    <button type="button" id="btnAddNew" class="btn btn-save btn-add-new">Thêm mới</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script type="text/javascript" src={{ URL::asset('js/admin/product.js') }}></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script type="text/javascript">
        class MyUploadAdapter {
            constructor(loader) {
                // The file loader instance to use during the upload.
                this.loader = loader;
            }

            // Starts the upload process.
            upload() {
                return this.loader.file
                    .then(file => new Promise((resolve, reject) => {
                        this._initRequest();
                        this._initListeners(resolve, reject, file);
                        this._sendRequest(file);
                    }));
            }

            // Aborts the upload process.
            abort() {
                if (this.xhr) {
                    this.xhr.abort();
                }
            }

            // Initializes the XMLHttpRequest object using the URL passed to the constructor.
            _initRequest() {
                const xhr = this.xhr = new XMLHttpRequest();

                // Note that your request may look different. It is up to you and your editor
                // integration to choose the right communication channel. This example uses
                // a POST request with JSON as a data structure but your configuration
                // could be different.
                xhr.open('POST', '{{ route('admin.image_product_upload') }}', true);
                xhr.setRequestHeader('x-csrf-token', '{{ csrf_token() }}');
                xhr.responseType = 'json';
            }

            // Initializes XMLHttpRequest listeners.
            _initListeners(resolve, reject, file) {
                const xhr = this.xhr;
                const loader = this.loader;
                const genericErrorText = `Couldn't upload file: ${ file.name }.`;

                xhr.addEventListener('error', () => reject(genericErrorText));
                xhr.addEventListener('abort', () => reject());
                xhr.addEventListener('load', () => {
                    const response = xhr.response;

                    // This example assumes the XHR server's "response" object will come with
                    // an "error" which has its own "message" that can be passed to reject()
                    // in the upload promise.
                    //
                    // Your integration may handle upload errors in a different way so make sure
                    // it is done properly. The reject() function must be called when the upload fails.
                    if (!response || response.error) {
                        return reject(response && response.error ? response.error.message : genericErrorText);
                    }

                    // If the upload is successful, resolve the upload promise with an object containing
                    // at least the "default" URL, pointing to the image on the server.
                    // This URL will be used to display the image in the content. Learn more in the
                    // UploadAdapter#upload documentation.
                    resolve({
                        default: response.url
                    });
                });

                // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
                // properties which are used e.g. to display the upload progress bar in the editor
                // user interface.
                if (xhr.upload) {
                    xhr.upload.addEventListener('progress', evt => {
                        if (evt.lengthComputable) {
                            loader.uploadTotal = evt.total;
                            loader.uploaded = evt.loaded;
                        }
                    });
                }
            }

            // Prepares the data and sends the request.
            _sendRequest(file) {
                // Prepare the form data.
                const data = new FormData();

                data.append('upload', file);

                // Important note: This is the right place to implement security mechanisms
                // like authentication and CSRF protection. For instance, you can use
                // XMLHttpRequest.setRequestHeader() to set the request headers containing
                // the CSRF token generated earlier by your application.

                // Send the request.
                this.xhr.send(data);
            }
        }

        // ...

        function SimpleUploadAdapterPlugin(editor) {
            editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                // Configure the URL to the upload script in your back-end here!
                return new MyUploadAdapter(loader);
            };
        }

        // ...

        var x = document.querySelectorAll("textarea");
        for (var i = 0; i < x.length; i++) {
            ClassicEditor.create(x[i], {
                extraPlugins: [SimpleUploadAdapterPlugin],

                // ...
            }).catch((error) => {
                console.error(error);
            });
        }
    </script>
@stop
