@extends('admin.layout')
@section('link')
    <link rel="stylesheet" href="{{ URL::asset('css/admin/product_category.css') }}">
@stop
@section('content')
    <div class="auth-main--content -wrapper">
        <div class="auth---header">
            <div class="header--left">
                <h3 class="auth-pages-title">
                    Danh mục sản phẩm
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
            <div class="table-view-data">
                <table class="table table-striped table-hover table-light">
                    <tbody>
                        <tr class="row-title-table">
                            <td>Mã danh mục </td>
                            <td>Tên danh mục</td>
                            <td>Sửa</td>
                            <td>Xóa</td>
                        </tr>
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>
                                    <button class="btn btn-warning btn-edit-data btn-data" data-toggle="modal"
                                        data-target="#modalEdit" data-value="{{ $data->id }}"
                                        data-url="{{ route('admin.find_cate', $data->id) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        <p>Sửa</p>
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-danger btn-del-data btn-data" data-toggle="modal"
                                        data-target="#modalDel" data-value="{{ $data->id }}"
                                        data-url="{{ route('admin.find_cate', $data->id) }}">
                                        <i class="fa-solid fa-trash"></i>
                                        <p>Xóa</p>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="auth--button-add">
            <div class="wget-btn-new-block">
                <button class="btn btn-add-new" data-toggle="modal" data-target="#modalAddNew">
                    + Thêm mới
                </button>
            </div>
        </div>
    </div>
    {{-- modal add new --}}
    <div class="auth-modal-new modal fade" id="modalAddNew">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Thêm danh mục mới</h5>
                    <button type="button" class="close btn-close-modal-head" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="formAdd" method="post"
                        action="{{ route('admin.process_add_cate') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="form-label">
                                Tên danh mục:
                            </label>
                            <input name="name"class="form-control" id="nameAdd" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" id="btnSave" class="btn btn-save-add btn-save">Thêm mới</button>
                </div>
            </div>
        </div>
    </div>
    {{-- modal edit --}}
    <div class="auth-modal-new modal fade" id="modalEdit">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Sửa danh mục</h5>
                    <button type="button" class="close btn-close-modal-head" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="formEdit" method="post">
                        @method('PUT')
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="form-label" style="font-weight:bold">
                                Tên danh mục:
                            </label>
                            <input name="name"class="form-control" id="nameEdit" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" id="btnSave" class="btn btn-save-edit btn-save">Lưu</button>
                </div>
            </div>
        </div>
    </div>
    {{-- modal delete --}}
    <div class="auth-modal-new modal fade" id="modalDel">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Xóa danh mục</h5>
                    <button type="button" class="close btn-close-modal-head" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="formDel" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label">
                                Tên danh mục:
                            </label>
                            <div id="nameDel"></div>
                        </div>
                    </form>
                    <div class="alert alert-danger text-ask-conf">
                        <p>Bạn có muốn xóa dữ liệu này không ?</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" id="btnSave" class="btn btn-save btn-delete">Xóa</button>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script type="text/javascript" src={{ URL::asset('js/admin/product_category.js') }}></script>
@stop
