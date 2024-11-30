@extends('layouts.master')
@section("title" , "create booking")
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')
    create booking
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">bookings</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                     create booking</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('booking.store') }}" method="post">
                        {{ csrf_field() }}
                        {{-- 1 --}}

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">booking name</label>
                                <input type="text" class="form-control" id="inputName" name="booking_name"
                                       title=" book name" required>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">booking number</label>
                                <input type="text" class="form-control" id="inputName" name="booking_number"
                                       title=" book number" required>
                            </div>

                        </div>
{{--                        guest data --}}

                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">guest name</label>
                                <input type="text" class="form-control" id="inputName" name="guest_name"
                                       title=" guest name" required>
                            </div>

                            <div class="col">
                                <label for="inputName" class="control-label">guest number</label>
                                <input type="text" class="form-control" id="inputName" name="guest_number"
                                       title=" guest number" required>
                            </div>

                        </div>


                            {{--                        2   --}}
                            <div class="row">


                                <div class="col">
                                    <label> chick in date</label>
                                    <input class="form-control fc-datepicker" name="check_in" placeholder="YYYY-MM-DD"
                                           type="text" required>
                                </div>


                                <div class="col">
                                    <label> chick out date</label>
                                    <input class="form-control fc-datepicker" name="check_out" placeholder="YYYY-MM-DD"
                                           type="text" required>
                                </div>



                            </div>


                            {{-- 3 --}}
                            <div class="row">
{{--                                hte room selection--}}
                                <div class="col">
                                    <label for="inputName" class="control-label">room</label>
                                    <select onchange="updatePrice()" name="room_id" class="form-control SlectBox" onclick="console.log($(this).val())"
                                            onchange="console.log('change is firing')" id="room_id">
                                        <!--placeholder-->
{{--                                        <option value="" room disabled>chose the room </option>--}}
                                        @foreach ($rooms as $room)
                                            <option data-price="{{$room->book_price}}"   value="{{ $room->id }}"> {{ $room->room_num }} - {{$room->book_price}}</option>
                                        @endforeach
                                    </select>
                                </div>
{{--                                the faciliteis seciton--}}
                                <div class="col">
                                    <label for="inputName" class="control-label">facilities</label>
                                    <select name="facility_id" class="form-control SlectBox" id="facility_id"
                                            onchange="updateAdditional()" >
                                        <!--placeholder-->
                                        <option value="" facility disabled>chose the facilities </option>
                                        @foreach ($facilities as $facility)
                                            <option data-additional="{{$facility->additional_price}}" value="{{ $facility->id }}"> {{ $facility->facility_name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>



                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label">totel price</label>
                                <input type="text"  class="form-control" id="total_price" name="total_price">
                            </div>
                            <div class="col">
                                <label for="inputName" class="control-label">net price</label>
                                <input type="text" class="form-control"  name="net_price"
                                       id="net_price">
                            </div>
                        </div>
                            {{-- 3 --}}

                        <button type="submit" class="btn mt-4 form-control btn-primary"> create book </button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection


<script>
    let Tprice = 0;
    function updatePrice(){

        let selected = document.querySelector("#room_id option:checked");
        let price = selected.getAttribute("data-price");
        Tprice = +(price);
        document.getElementById("total_price").value = Tprice;
        document.getElementById("net_price").value = Tprice;
    }
    document.addEventListener("DOMContentLoaded" , function(){
        updatePrice();
    })
    function updateAdditional(){

        let fac_selected = document.querySelector("#facility_id option:checked");
        let price = fac_selected.getAttribute("data-additional");
        Tprice += +(price);
        document.getElementById("total_price").value =  Tprice;
        let net = Tprice - (Tprice * 5) / 100;
        document.getElementById("net_price").value = net;
    }
    document.addEventListener("DOMContentLoaded" , function(){
        updatePrice();
    })
    // document.getElementById("room_id").addEventListener("change" , updatePrice());
</script>
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();

    </script>


@endsection
