<!--sidebar-menu-->
<div id="sidebar">
    <a href="{!! route('dashboard_route') !!}" class="visible-phone">
        <i class="icon icon-home"></i> Dashboard
    </a>
    <ul>
        <!-- dashboard : if route dashboard_route, li tag must active. Else, plain li tag -->
        @if( Route::currentRouteName() == 'dashboard_route' )
        <li class="active">
            @else
        <li>
            @endif
            <a href="{!! route('dashboard_route') !!}">
                <i class="icon icon-home"></i><span>Dashboard</span>
            </a> 
        </li>
        <!-- settings : if route settings_route, li tag must active. Else, plain li tag -->
        @if(  Route::currentRouteName() == 'settings_route' )
        <li class="active">
            @else
        <li>
            @endif
            <a href="{!! route('settings_route') !!}">
                <i class="icon icon-home"></i><span>Settings</span>
            </a> 
        </li>
        <!-- category : if route fall on those declared route, li tag must active. Else, plain li tag -->
        @if(Route::currentRouteName() == 'create_category_route' OR 
            Route::currentRouteName() == 'index_category_route' )
        <li class="submenu active">
            @else
        <li class="submenu">
            @endif
            <a href="#"><i class="icon icon-th-list"></i> 
                <span>Category</span><span class="label label-important">3</span>
            </a>
            <ul>
                <!-- category submenu : create category -->
                @if(  Route::currentRouteName() == 'create_category_route' )
                <li class="active">
                    @else
                <li>
                    @endif
                    <a href="{!! route('create_category_route') !!}">Create Category</a>
                </li>
                <!-- category submenu : create category -->
                @if(  Route::currentRouteName() == 'index_category_route' )
                <li class="active">
                    @else
                <li>
                    @endif
                    <a href="{!! route('index_category_route') !!}">Category List</a></li>
            </ul>
        </li>
         <!-- product : if route fall on those declared route, li tag must active. Else, plain li tag -->
        @if(Route::currentRouteName() == 'create_product_route' OR 
            Route::currentRouteName() == 'index_product_route' )
        <li class="submenu active">
            @else
        <li class="submenu">
            @endif
            <a href="#"><i class="icon icon-th-list"></i> 
                <span>Product</span><span class="label label-important">3</span>
            </a>
            <ul>
                <!-- product submenu : create product -->
                @if(  Route::currentRouteName() == 'create_product_route' )
                <li class="active">
                    @else
                <li>
                    @endif
                    <a href="{!! route('create_product_route') !!}">Create Product</a>
                </li>
                <!-- product submenu : create product -->
                @if(  Route::currentRouteName() == 'index_product_route' )
                <li class="active">
                    @else
                <li>
                    @endif
                    <a href="{!! route('index_product_route') !!}">Product List</a></li>
            </ul>
        </li>
        
        <!-- coupons : if route fall on those declared route, li tag must active. Else, plain li tag -->
        @if(Route::currentRouteName() == 'createCoupons_route' OR 
            Route::currentRouteName() == 'indexCoupons_route' )
        <li class="submenu active">
            @else
        <li class="submenu">
            @endif
            <a href="#"><i class="icon icon-th-list"></i> 
                <span>Coupons</span><span class="label label-important">3</span>
            </a>
            <ul>
                <!-- coupons submenu : create coupons -->
                @if(  Route::currentRouteName() == 'createCoupons_route' )
                <li class="active">
                    @else
                <li>
                    @endif
                    <a href="{!! route('createCoupons_route') !!}">Create Coupons</a>
                </li>
                <!-- coupons submenu : create coupons -->
                @if(  Route::currentRouteName() == 'indexCoupons_route' )
                <li class="active">
                    @else
                <li>
                    @endif
                    <a href="{!! route('indexCoupons_route') !!}">Coupons List</a></li>
            </ul>
        </li>

        <!-- banners : if route fall on those declared route, li tag must active. Else, plain li tag -->
        @if(Route::currentRouteName() == 'createBanners_route' OR 
            Route::currentRouteName() == 'indexBanners_route' )
        <li class="submenu active">
            @else
        <li class="submenu">
            @endif
            <a href="#"><i class="icon icon-th-list"></i> 
                <span>Banners</span><span class="label label-important">3</span>
            </a>
            <ul>
                <!-- banners submenu : create banners -->
                @if(  Route::currentRouteName() == 'createBanners_route' )
                <li class="active">
                    @else
                <li>
                    @endif
                    <a href="{!! route('createBanners_route') !!}">Create Banners</a>
                </li>
                <!-- banners submenu : banners list -->
                @if(  Route::currentRouteName() == 'indexBanners_route' )
                <li class="active">
                    @else
                <li>
                    @endif
                    <a href="{!! route('indexBanners_route') !!}">Banners List</a></li>
            </ul>
        </li>
        <!-- example -->
       {{--  <li> <a href="charts.html"><i class="icon icon-signal"></i> <span>Charts &amp; graphs</span></a> </li>
        <li class="submenu">
            <a href="#"><i class="icon icon-th-list"></i> <span>Forms</span> <span class="label label-important">3</span></a>
            <ul>
                <li><a href="form-common.html">Basic Form</a></li>
                <li><a href="form-validation.html">Form with Validation</a></li>
                <li><a href="form-wizard.html">Form with Wizard</a></li>
            </ul>
        </li> --}}
    </ul>
</div>
<!--sidebar-menu