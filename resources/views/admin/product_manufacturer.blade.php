@extends('admin.layout')
@section('link')
    <link rel="stylesheet" href="{{ URL::asset('css/admin/product_manufacturer.css') }}">
@stop
@section('content')
    <div class="auth-main--content -wrapper">
        <div class="auth---header">
            <div class="header--left">
                <h3 class="auth-pages-title">
                    Nhà sản xuất
                </h3>
            </div>
        </div>
        <div class="auth--body-content">
            <div class="block-wget-err">
                @if (session()->has('msgerr'))
                    <div class="alert alert-danger" id="msgErr">
                        {{ session()->get('msgerr') }}
                    </div>
                    <script type="text/javascript">
                        setTimeout(function() {
                            $("#msgErr").hide();
                        },3000)
                    </script>
                @endif
                @if (session()->has('msgss'))
                    <div class="alert alert-success" id="msgSuc">
                        {{ session()->get('msgss') }}
                    </div>
                    <script type="text/javascript">
                        setTimeout(function() {
                            $("#msgSuc").hide();
                        },3000)
                    </script>
                @endif
            </div>
            <div class="table-view-data">
                <table class="table table-striped table-hover table-light">
                    <tbody>
                        <tr class="row-title-table">
                            <td>Mã nhà sản xuất </td>
                            <td class="image-col">Logo</td>
                            <td>Tên nhà sản xuất</td>
                            <td>Sửa</td>
                            <td>Xóa</td>
                        </tr>
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td class="image-col">
                                    <img src="{{ URL::asset('image/admin/product_properties/' . $data->logo) }}" </td>
                                <td>{{ $data->name }}</td>
                                <td>
                                    <button class="btn btn-warning btn-edit-data btn-data" data-toggle="modal"
                                        data-target="#modalAddNew" data-value="{{ $data->id }}"
                                        data-url="{{ route('admin.find_manu', $data->id) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        <p>Sửa</p>
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-danger btn-del-data btn-data" data-toggle="modal"
                                        data-target="#modalConfirm" data-value="{{ $data->id }}"
                                        data-url="{{ route('admin.find_manu', $data->id) }}">
                                        <i class="fa-solid fa-trash"></i>
                                        <p>Xóa</p>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="auth--button-add">
                <div class="wget-btn-new-block">
                    <button class="btn btn-add-new" data-toggle="modal" data-target="#modalAddNew">
                        + Thêm mới
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- modal add and edit --}}
    <div class="auth-modal-new modal fade" id="modalAddNew">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Thêm dữ liệu mới</h5>
                    <button type="button" class="close btn-close-modal-head btn-close-modal" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">

                    <form class="form-horizontal" id="formModal" method="post"
                        action="{{ route('admin.process_add_manu') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" id="methodChange" value="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="form-label">
                                Tên nhà sản xuất:
                            </label>
                            <input class="form-control" id="nameForm" name="name" type="text">
                        </div>
                        <div class="form-group">
                            <label class="form-label">
                                Logo:
                            </label>
                            <input onchange="loadFile(event)" id="logoForm" type="file" name="logo"
                                class="form-control">
                            <div class="block-show-image">
                                <img id="showUploadImage" class="image-file-upload">
                            </div>

                        </div>

                    </form>
                    <div class="alert alert-danger" id="errForm">
                        <p>Phải nhập đầy đủ thông tin</p>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary btn-close-modal" data-dismiss="modal">Đóng</button>
                    <button type="button" id="btnSave" class="btn btn-save">Lưu</button>
                </div>
            </div>
        </div>
    </div>


    {{-- modal delete --}}
    <div class="auth-modal-new modal fade" id="modalConfirm">
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
                                Tên nhà sản xuất:
                            </label>
                            <div class="name-info-del" id="nameDel"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">
                                Logo:
                            </label>
                            <div class="block-show-image">
                                <img id="imageDel" class="image-file-upload">
                            </div>

                        </div>

                    </form>
                    <div class="alert alert-danger text-ask-conf">
                        <p>Bạn có muốn xóa dữ liệu này không ?</p>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary btn-close-modal-del" data-dismiss="modal">Đóng</button>
                    <button type="button" id="btnSave" class="btn btn-save-del">Xóa</button>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script type="text/javascript" src={{ URL::asset('js/admin/product_manufacturer.js') }}></script>
@stop
