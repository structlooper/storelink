@extends('layouts.app')
@section('title')
    address
@endsection

@section('content')
    <div class="modal" tabindex="-1" role="dialog" id="delete-address-confirmation">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete address?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="delete_btn" adr>Yes</button>
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
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
                                        <div class="row">
                                           <div class="col-sm">

                                        <h5 class="heading-design-h5">
                                            Saved address
                                        </h5>
                                           </div>
                                            <div class="col-sm">

                                            <span class="float-right"><a href="{{ route('add_address') }}" class="btn btn-primary">Add New</a></span>
                                        </div>
                                        </div>


                                    </div>
                                    <div class="order-list-tabel-main table-responsive">
                                        <table class="datatabel table table-striped table-bordered order-list-tabel" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>Address #</th>
                                                <th>Address type</th>
                                                <th>Address line 1</th>
                                                <th>Address line 2</th>
                                                <th>locality</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(sizeof($user_address)>0)
                                                @foreach($user_address as $key => $add)
                                            <tr>
                                                <td>{{ $key +1 }}</td>
                                                <td>{{ $add->address_type }}</td>
                                                <td>{{ $add->address_line_1 }}</td>
                                                <td>{{ $add->address_line_2 }}</td>
                                                <td>{{ $add->locality }}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-sm-3">

                                                            <a data-toggle="tooltip" data-placement="top" title="" href="{{ route('address_edit',$add->address_id) }}" data-original-title="Edit address" class="btn btn-info btn-sm"><i class="mdi mdi-account-edit"></i></a>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <a data-toggle="tooltip" data-placement="top" title="" href="javascript:void(0)" onclick="delete_user_address({{ $add->address_id }})" data-original-title="Delete address" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>

                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="3">
                                                        No saved Address found!!
                                                    </td>
                                                </tr>
                                            @endif
{{--                                            <tr>--}}
{{--                                                <td>#258</td>--}}
{{--                                                <td>July 21, 2017</td>--}}
{{--                                                <td>July 21, 2017</td>--}}
{{--                                                <td><span class="badge badge-info">In Progress</span></td>--}}
{{--                                                <td>$315.20</td>--}}
{{--                                                <td><a data-toggle="tooltip" data-placement="top" title="" href="#" data-original-title="View Detail" class="btn btn-info btn-sm"><i class="mdi mdi-eye"></i></a></td>--}}
{{--                                            </tr>--}}

                                            </tbody>
                                        </table>
                                    </div>
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
        function delete_user_address(id){
            $('#delete_btn').attr('adr',id)
            $('#delete-address-confirmation').modal('show')
        }
        $('#delete_btn').click(function (){
            let address_id = $(this).attr('adr')
            let token;
            @if(!is_null(Session::get('user_data')))
                token = '{{ Session::get('user_data')['token'] }}'
            @else
                token = 'null';
            @endif
            $.ajax({
                method: "POST",
                url: "{{ $data['image_url'].'api/User/delete_address' }}",
                data: {
                    Authorization: token,
                    address_id: address_id,
                },
                xhrFields: {
                    withCredentials: true
                },
                async: false,
                crossDomain: true,
                dataType: "json",

                success: function (result) {
                    if (result.status == true) {
                        window.location.href = "{{ route('address') }}"
                    } else {
                        alert(result.msg)
                    }
                },
                error: function (fail) {
                    alert('internal server error please refresh page')
                    console.log("fail");
                    // console.log(fail.responseText);
                },
            });
        })
    </script>
    <!-- Data Tables -->
    <link href="{{asset('website/vendor/datatables/datatables.min.css')}}" rel="stylesheet" />
    <script src="{{asset('website/vendor/datatables/datatables.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.datatabel').DataTable();
        } );
    </script>
@endsection
