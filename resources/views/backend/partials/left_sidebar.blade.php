<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="profile-image">
                    <img class="img-xs rounded-circle" src="{{asset('/')}}/admin/assets/images/faces/face8.jpg" alt="profile image">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name">Allen Moreno</p>
                    <p class="designation">Premium user</p>
                </div>
            </a>
        </li>
        <li class="nav-item nav-category">Main Menu</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.index')}}">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i><span class="menu-title">Manage Product</span><i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.products') }}">Manage Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.product.create') }}">Add Products</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic11" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i><span class="menu-title">Manage Orders</span><i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic11">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.orders') }}">Manage Orders</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic5" aria-expanded="false" aria-controls="ui-basic5">
                <i class="menu-icon typcn typcn-coffee"></i><span class="menu-title">Manage Category</span><i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic5">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.categories') }}">Manage Category</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.category.create') }}">Add Category</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
                <i class="menu-icon typcn typcn-coffee"></i><span class="menu-title">Manage Brand</span><i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic2">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.brands') }}">Manage Brand</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.brand.create') }}">Add Brand</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic3">
                <i class="menu-icon typcn typcn-coffee"></i><span class="menu-title">Manage Division</span><i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic3">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.divisions') }}">Manage Division</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.division.create') }}">Add Division</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic4" aria-expanded="false" aria-controls="ui-basic4">
                <i class="menu-icon typcn typcn-coffee"></i><span class="menu-title">Manage District</span><i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic4">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.districts') }}">Manage District</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.district.create') }}">Add District</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic6" aria-expanded="false" aria-controls="ui-basic6">
                <i class="menu-icon typcn typcn-coffee"></i><span class="menu-title">Manage Slider</span><i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic6">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.sliders') }}">Manage Slider</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link">
                <form class="form-inline" action="{{ route('admin.logout') }}" method="post">
                    @csrf
                    <input type="submit" value="Logout now" class="btn btn-danger">
                </form>

            </a>
        </li>


    </ul>
</nav>