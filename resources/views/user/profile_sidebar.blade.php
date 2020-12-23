<div class="col-md-4">
    <div class="card account-left">
        <div class="user-profile-header">
            <img alt="logo" src="{{asset('website/img/user.jpg')}}">
            <h5 class="mb-1 text-secondary"><strong>Hi </strong> {{ Session::get('user_data')['first_name'] }} {{ Session::get('user_data')['last_name'] }}</h5>
            <p> +91 {{ Session::get('user_data')['phone'] }}</p>
        </div>
        <div class="list-group">
            <a href="{{ route('profile') }}" class="list-group-item list-group-item-action @if(Request::url() == url('user/profile'))active @endif"><i aria-hidden="true" class="mdi mdi-account-outline"></i>  My Profile</a>
            <a href="{{ route('address') }}" class="list-group-item list-group-item-action @if(Request::url() == url('user/address') or Request::url() == url('user/address/add'))active @endif"><i aria-hidden="true" class="mdi mdi-map-marker-circle"></i>  My Address</a>
            <a href="wishlist.html" class="list-group-item list-group-item-action"><i aria-hidden="true" class="mdi mdi-heart-outline"></i>  Buy again </a>
            <a href="{{ route('orders') }}" class="list-group-item list-group-item-action @if(Request::url() == route('orders'))active @endif"><i aria-hidden="true" class="mdi mdi-format-list-bulleted"></i>  Order List</a>
            <a href="javascript:void(0)" class="list-group-item list-group-item-action log-out-button"><i aria-hidden="true" class="mdi mdi-lock"></i>  Logout</a>
        </div>
    </div>
</div>
