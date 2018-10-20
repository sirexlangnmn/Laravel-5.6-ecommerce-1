@extends('backend_views.layouts.design_page')
@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="#">Coupons</a> <a href="#" class="current">View Coupons</a> </div>
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
                        <h5>Coupon List</h5>
                        <div class="pull-right">
                        <a href="{!! route('createCoupons_route') !!}" class="btn btn-primary"><i class=" icon-plus-sign"></i> Create Coupon</a>
                        </div>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table table-responsive">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Coupon Title</th>
                                    <th>Coupon Code</th>
                                    <th>Amount</th>
                                    <th>Amount Type</th>
                                    <th>Expiry Date</th>
                                    <th>Created Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Coupon Title</th>
                                    <th>Coupon Code</th>
                                    <th>Amount</th>
                                    <th>Amount Type</th>
                                    <th>Expiry Date</th>
                                    <th>Created Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach( $coupons as $row)
                                <tr>
                                    <td class="taskStatus">{!! $row->coupon_id !!}</td>
                                    <td>{!! $row->coupon_title !!}</td>
                                    <td>{!! $row->coupon_code !!}</td>
                                    <td class="taskStatus">
                                        @if($row->amount_type == "Percentage")
                                            {!! $row->amount !!} &nbsp; %
                                        @elseif($row->amount_type == "Fixed")
                                            ₱ &nbsp; {!! $row->amount !!}
                                        @endif
                                    </td>
                                    <td class="taskStatus">{!! $row->amount_type !!}</td>
                                    <td class="taskStatus">{!! $row->expiry_date !!}</td>
                                    <td class="taskStatus">{!! $row->created_at !!}</td>
                                    <td class="taskStatus">
                                        @if($row->status == 1)
                                            Active
                                        @elseif($row->status == 0)
                                            Deactivated
                                        @endif
                                    </td>
                                    <td colspan="3">   
                                        <div class="btn-group">
                                            <button class="btn btn-mini btn-primary">Action</button>
                                            <button data-toggle="dropdown" class="btn btn-mini btn-primary dropdown-toggle"><span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                              <li><a href="{!! route('editCoupons_route', $row->coupon_id) !!}" class="btn-success"><i class="icon-edit"></i>&nbsp; Edit </a></li>
                                              <li><a href="{!! route('showCoupons_route', $row->coupon_id) !!}" class="btn-info"><i class="icon-eye-open"></i>&nbsp; View</a></li>
                                              <li><a href="{!! route('deleteCouponsConfirmation_route', $row->coupon_id) !!}" class="btn-danger"><i class="icon-trash"></i>&nbsp; Delete</a></li>
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