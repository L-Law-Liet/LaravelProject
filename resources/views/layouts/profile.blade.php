@extends('layouts.main')
@section('head')
    <title>Profile</title>
    @endsection
@section('content')
    <div class="min-vh-100 p-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="justify-content-center d-flex">
            <div id="M" style="min-height: 18px; opacity: 80%; z-index: 10; display: {{($m ?? '')? 'block;' : 'none;'}}"
                 class="bg-primary text-center text-white m-2 w-50 rounded-lg position-absolute">
                <h4>Updated Successfully!</h4>
            </div>
        </div>
        <div class="container">
            <div class="card card-body">
                <div class="row p-4">
                    <div class="col-4 text-center p-2 border rounded-lg">
                        <div id="Img">
                            <div style='background: url("{{asset((is_null($u->photo))?'img/profile.jpg':'img/'.$u->photo)}}") no-repeat;
                                height: 300px;
                                width: 300px;
                                background-size: 300px 300px' class="LLL rounded-lg m-auto"></div>
                        </div>
                        <div class="m-1">
                            <form method="post" name="photo" id="imageUploadForm" enctype="multipart/form-data" action="{{action('UserController@profileImage')}}">
                                {{csrf_field()}}
                                <input name="image" id="ImageBrowse" class="p-1 border bg-light rounded-lg" type="file"
                                       accept=".jpg, .jpeg, .png, .gif" hidden="hidden">
                                <button class="btn btn-outline-primary w-75" id="LL">Upload Your Image</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-8 border-left-0 border rounded-lg">
                        <div class="">
                            <form action="{{action('UserController@update')}}" method="post">
                                {{csrf_field()}}
                                <div class=" rounded-lg">
                                    <div class="m-3">
                                        <label class="col-3">Your ID: </label><input class="rounded-lg p-2 col-9 border" type="text" value="{{$u->id}}" readonly>
                                    </div>
                                    <div class="m-3">
                                        <label class="col-3">FirstName: </label><input name="firstname" class="rounded-lg p-2 col-9 border" type="text" value="{{$u->firstname}}">
                                    </div>
                                    <div class="m-3">
                                        <label class="col-3">LastName: </label><input name="lastname" class="rounded-lg p-2 col-9 border" type="text" value="{{$u->lastname}}">
                                    </div>
                                    <div class="m-3">
                                        <label class="col-3">Your Phone: </label><input name="phone" class="rounded-lg p-2 col-9 border"  type="tel" name="phone"
                                        placeholder="8-777-444-4774" pattern="[8]{1}[0-9]{3}[0-9]{3}[0-9]{4}" required value="{{$u->phone}}">
                                    </div>
                                    <div class="m-3">
                                        <label class="col-3">Date of creation: </label><input class="rounded-lg p-2 col-9 border" type="text" value="{{$u->created_at}}" readonly>
                                    </div>
                                    <div class="m-3">
                                        <input type="submit" value="Save" class="btn btn-outline-primary w-100">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function (e) {
            $('#imageUploadForm').on('submit',(function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    type:'POST',
                    url: $(this).attr('action'),
                    data:formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(data){
                        $('#Img').html(data);
                    },
                    error: function(data){
                        console.log("error");
                        console.log(data);
                    }
                });
            }));
            $("#ImageBrowse").on("change", function() {
                $("#imageUploadForm").submit();
            });
            $("#LL").on('click', function () {
                $('#ImageBrowse').click();
            })
        });
        {{--$('#image').on('change', function () {--}}

        {{--    const v = new FormData(this);--}}
        {{--    console.log('N');--}}
        {{--    $.ajax({--}}
        {{--        type : 'post',--}}
        {{--        url : '{{URL::to('/profiles')}}',--}}
        {{--        data : v,--}}
        {{--        contentType: false,--}}
        {{--        processData: false,--}}
        {{--        cache:false,--}}
        {{--        success:function (data) {--}}
        {{--            $('#Img').html(data);--}}
        {{--        },--}}
        {{--        error: function(data){--}}
        {{--            console.log("error");--}}
        {{--            console.log(data);--}}
        {{--        }--}}
        {{--    });--}}
        {{--})--}}
        setTimeout(fade_out, 3000);

        function fade_out() {
            $("#M").fadeOut().empty();
        }
    </script>
    @endsection
