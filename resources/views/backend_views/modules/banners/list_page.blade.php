@extends('backend_views.layouts.design_page')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="#">Banners</a> <a href="#" class="current">View Banners</a> </div>
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
                        <h5>banner List</h5>
                        <div class="pull-right">
                        <a href="{!! route('createBanners_route') !!}" class="btn btn-primary"><i class=" icon-plus-sign"></i> Create banner</a>
                        </div>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table table-responsive">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Banner Title</th>
                                    <th>Banner Tagline</th>
                                    <th>Banner Description</th>
                                    <th>Banner Link</th>
                                    <th>Status</th>
                                    <th>Banner Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Banner Title</th>
                                    <th>Banner Tagline</th>
                                    <th>Banner Description</th>
                                    <th>Banner Link</th>
                                    <th>Status</th>
                                    <th>Banner Image</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach( $banners as $row)
                                <tr>
                                    <td class="taskStatus">{!! $row->banner_id !!}</td>
                                    <td>{!! $row->banner_title !!}</td>
                                    <td>{!! $row->banner_tagline !!}</td>
                                    <td>{!! $row->banner_description !!}</td>
                                    <td>{!! $row->banner_link !!}</td>
                                    <td>
                                        @if($row->banner_status == 1)
                                            Active
                                        @elseif($row->banner_status == 0)
                                            Deactivated
                                        @endif
                                    </td>
                                     <td class="taskStatus"><img src="{!! asset('backend_assets/images/banners/thumbnail/'.$row->banner_image) !!}"></td>
                                    <td colspan="3">   
                                        <div class="btn-group">
                                            <button class="btn btn-mini btn-primary">Action</button>
                                            <button data-toggle="dropdown" class="btn btn-mini btn-primary dropdown-toggle"><span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                              <li><a href="{!! route('editBanners_route', $row->banner_id) !!}" class="btn-success"><i class="icon-edit"></i>&nbsp; Edit </a></li>
                                              <li><a href="{!! route('showBanners_route', $row->banner_id) !!}" class="btn-info"><i class="icon-eye-open"></i>&nbsp; View</a></li>
                                              <li><a href="{!! route('deleteBannersConfirmation_route', $row->banner_id) !!}" class="btn-danger"><i class="icon-trash"></i>&nbsp; Delete</a></li>
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