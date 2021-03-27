
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Transfer</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    @include('layouts.header')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        h2{
        color:#7fad39;
        font-weight: 100;
        font-size: 25px;
        }

    </style>

</head>

<body>
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    {{-- Navigation --}}
    @include('layouts.navigation')
    {{-- End navigation --}}

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            @include('layouts.searchbar')
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{url("ogani/img/breadcrumb.jpg")}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Bukti Transfer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card mx-auto shadow" style="max-width: 450px; border-radius:40px; border-bottom:6px solid #7fad39">
                        <div class="card-body">
                            <div class="col-12">
                                <p class="h4 text-center font-weight-bold mb-2 mt-2" style="color: #7fad39">Upload Bukti Transfer</p>
                            </div>
                            <div class="col-12 text-center">
                                <div class="text-center">
                                        <h2 class="font-weight-bold mx-auto" id="hours"></h2>
                                    @php
                                        $maxTime = date('Y-m-d H:i:s', strtotime($ts->created_at . " +3 hours"))
                                    @endphp
                                    <input type="hidden" name="max_time" id="max-time" value="{{$maxTime}}">
                                </div>
                            </div>
                            <form action="{{route('checkout.bukti.post')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <img class="text-center" src="{{url('ogani/img/confirmed.svg')}}" alt="">
                                    </div>
                                    <div class="col-12">
                                        <a href="#" onclick="uploadFile()" id="upload-btn" class="site-btn text-center mt-3" style="width:100%;padding:12px 12px; font-size:12px; border-radius:20px">Pilih Gambar</a>
                                        <input type="file" id="file_inp" name="file" onchange="previewFile()" class="d-none">
                                        <input type="hidden" name="kd" value="{{$kd}}">
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" id="submit" class="site-btn text-center d-none mt-3" style="width:100%;padding:12px 12px; font-size:12px; border-radius:20px" value="Upload Bukti">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

   <!-- Footer Section Begin -->
   @include('layouts.footer_sec')
   <!-- Footer Section End -->

   <!-- Js Plugins -->
   @include('layouts.js_lib')

   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   

   <script>
        function uploadFile(){
                event.preventDefault();
                $("#file_inp").trigger('click');
                return false;
        }

        function previewFile(){
            var file = $('#file_inp')[0].files[0].name;
            $('#upload-btn').text(file);
            $('#submit').removeClass('d-none');
        }

        // Set the date we're counting down to

        var maxTime = $('#max-time').val();

        var countDownDate = new Date(maxTime).getTime();
        console.log(countDownDate, maxTime);

        // Update the count down every 1 second
        var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();
            
        // Find the distance between now and the count down date
        var distance = countDownDate - now;
            
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
        // Output the result in an element with id="demo"
        // document.getElementById("demo").innerHTML = hours.toLocaleString(undefined,{minimumIntegerDigits: 2}) + ":"
        // + minutes.toLocaleString(undefined,{minimumIntegerDigits: 2}) + ":" + seconds.toLocaleString(undefined,{minimumIntegerDigits: 2});
        $('#hours').text( hours.toLocaleString(undefined,{minimumIntegerDigits: 2}) + ":" + minutes.toLocaleString(undefined,{minimumIntegerDigits: 2}) + ":" + seconds.toLocaleString(undefined,{minimumIntegerDigits: 2}));
        // $('#minutes').text(minutes.toLocaleString(undefined,{minimumIntegerDigits: 2})+":");
        // $('#seconds').text(seconds.toLocaleString(undefined,{minimumIntegerDigits: 2}));
            
        // If the count down is over, write some text 
        if (distance < 0) {
            clearInterval(x);
                var kd = "{{$ts->kd_transaksi}}";
                var url = "{{url('/checkout/ubah-expired')}}/"+kd;
                $('#hours').text("00:00:00");
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function (data) {
                        if (data.status == 1) {
                            Swal.fire({
                                title: "Success!",
                                type: "success",
                                text: data.message,
                                icon: "success",
                                confirmButtonClass: "btn btn-outline-info",
                            }).then(function(){
                                location.replace("{{route('purchase.konsumen', 3)}}");
                            });
                            // document.getElementById('ket_status_'+id).text() = status;
                            // document.getElementById('status_'+id).innerHTML = data.html;
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
                // Swal.fire({
                //     title: "Success!",
                //     type: "success",
                //     text: "Waktu untuk mengirim bukti transfer telah habis \n Click OK",
                //     icon: "success",
                //     confirmButtonClass: "btn btn-outline-info",
                // })
                // .then(function(){
                    
                // });
        }
        }, 1000);
   </script>

 

</body>

</html>