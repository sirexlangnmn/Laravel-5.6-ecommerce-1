@extends('backend_views.layouts.design_page')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="#">Categories</a> <a href="#" class="current">View Categories</a> </div>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                @if(Session::has('flash_message_error'))
                    <div class="alert alert-error alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{!! session('flash_message_error') !!}</strong>
                    </div>
                @endif   
                @if(Session::has('flash_message_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{!! session('flash_message_success') !!}</strong>
                    </div>
                @endif
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon"><i class="icon-th"></i></span>
                        <h5>Category List</h5>
                        <div class="pull-right">
                        <a href="{!! route('create_category_route') !!}" class="btn btn-primary"><i class=" icon-plus-sign"></i> Create Category</a>
                        </div>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table table-responsive">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Sub-category</th>
                                    <th>Description</th>
                                    <th>URL</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Sub-category</th>
                                    <th>Description</th>
                                    <th>URL</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach( $categories as $row)
                                <tr>
                                    <td class="taskStatus">{!! $row->category_id !!}</td>
                                    <td>{!! $row->category !!}</td>
                                    {{-- @foreach($levels as $val) --}}
                                    <td>{!! $row->parent_id !!}</td>
                                    {{-- @endforeach --}}
                                    <td>{!! $row->description !!}</td>
                                    <td>{!! $row->url !!}</td>
                                    <td>{!! $row->status !!}</td>
                                    <td colspan="3">   
                                        <div class="btn-group">
                                            <button class="btn btn-mini btn-primary">Action</button>
                                            <button data-toggle="dropdown" class="btn btn-mini btn-primary dropdown-toggle"><span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                              <li><a href="{!! route('edit_category_route', $row->category_id) !!}" class="btn-success"><i class="icon-edit"></i>&nbsp; Edit </a></li>
                                              <li><a href="{!! route('show_category_route', $row->category_id) !!}" class="btn-info"><i class="icon-eye-open"></i>&nbsp; View</a></li>
                                              <li><a href="{!! route('delete_category_confirmation_route', $row->category_id) !!}" class="btn-danger"><i class="icon-trash"></i>&nbsp; Delete</a></li>
                                            </ul>
                                          </div>
                                        {{-- <button class="btn btn-mini btn-danger"><i class=" icon-trash"></i> Delete</button> --}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('backend_views.components.datatables_page')
@endsection