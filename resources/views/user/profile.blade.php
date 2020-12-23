@extends('layouts.app')
@section('title')
    Profile
@endsection

@section('content')
    <section class="account-page section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="row no-gutters">
                        @include('user.profile_sidebar')
                        <div class="col-md-8">
                            <div class="card card-body account-right">
                                <div class="widget">
                                    <div class="section-header">
                                        <h5 class="heading-design-h5">
                                            My Profile
                                        </h5>
                                    </div>
                                    <form>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">First Name <span class="required">*</span></label>
                                                    <input class="form-control border-form-control"  id="first_name" value="{{ $user_details->first_name }}" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Last Name <span class="required">*</span></label>
                                                    <input class="form-control border-form-control" id="last_name" value="{{ $user_details->last_name }}" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Phone <span class="required">*</span></label>
                                                    <div class="form-control border-form-control">{{ $user_details->phone }}</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Email Address <span class="required">*</span></label>
                                                    <input class="form-control border-form-control " id="email" value="{{ $user_details->email }}"  type="email">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label">Gender <span class="required">*</span></label>
                                                    <select class="form-control" id="user_gender">
                                                        @if($user_details->gender == 'null' or $user_details == null)
                                                            <option value="male" >Male</option>
                                                            <option value="female">Female</option>
                                                            <option value="other">Other</option>
                                                        @elseif($user_details->gender == 'male' or $user_details->gender == 'Male' or $user_details->gender == 'MALE' )
                                                            <option value="male" selected>Male</option>
                                                            <option value="female">Female</option>
                                                            <option value="other">Other</option>
                                                        @elseif($user_details->gender == 'female' or $user_details->gender == 'Female' or $user_details->gender == 'FEMALE')
                                                            <option value="male" >Male</option>
                                                            <option value="female" selected>Female</option>
                                                            <option value="other">Other</option>
                                                        @else
                                                            <option value="male" >Male</option>
                                                            <option value="female">Female</option>
                                                            <option value="other" selected>Other</option>
                                                            @endif

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 text-right">
                                                <a href="{{ route('home') }}" class="btn btn-danger btn-lg"> Cancel </a>
                                                <button type="button" class="btn btn-success btn-lg" onclick="update_profile()"> Save Changes </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        function update_profile(){
            let first_name = $('#first_name').val();
            let last_name = $('#last_name').val();
            let email = $('#email').val();
            let user_gender = $('#user_gender').val();

            let token;
            @if(!is_null(Session::get('user_data')))
                token = '{{ Session::get('user_data')['token'] }}'
            @else
                token = 'null';
            @endif
            $.ajax({
                method:"POST",
                url:"{{ $data['image_url'].'api/User/profile_update' }}",
                data: { Authorization: token ,
                    username:"username" ,
                    email:email ,
                    first_name:first_name ,
                    last_name:last_name ,
                    gender:user_gender ,
                  },
                xhrFields: {
                    withCredentials: true
                },
                async: false,
                crossDomain: true,
                dataType: "json",

                success: function(result) {
                    if (result.status == true) {
                        window.location.reload()
                    }else{
                        alert(result.msg)
                    }
                },
                error: function(fail)
                {
                    alert('internal server error please refresh page')
                    console.log("fail");
                    // console.log(fail.responseText);
                },
            });
        }
    </script>
@endsection
