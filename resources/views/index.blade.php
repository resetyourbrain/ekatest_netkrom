<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Portal Pemesanan Tiket Konser</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg">

        <div class="home-btn d-none d-sm-block">
            <a href="/login" class="text-dark"><i class="bx bxs-user h2"></i></a>
        </div>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">

                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                           
                            <div class="card-body p-4"> 

                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Form Pemesanan Tiket Konser</h5>
                                    <p class="text-muted">Silahkan lengkapi data pemesanan.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="/ticket/add" method="post">
                                        @csrf

                                        <div class="mb-3">
                                            <label class="form-label" for="name">Nama</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Lengkap" autofocus required value="{{ old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>                                              
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" required parsley-type="email" placeholder="Email" value="{{ old('email') }}"/>
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">No HP</label>
                                            <input data-parsley-type="number" type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" required placeholder="No HP" value="{{ old('phone') }}"/>
                                            @error('phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                
                                        <div class="mb-3">
                                            <label class="form-label">Jenis Tiket</label><br>
                                                <input class="form-check-input" type="radio" name="type" id="type" value="Ekonomi" onclick="ecoPrice()" required {{ old('type') == "Ekonomi" ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadios1">Ekonomi</label>&nbsp&nbsp&nbsp&nbsp
                                                <input class="form-check-input" type="radio" name="type" id="type" value="VIP" onclick="vipPrice()" required {{ old('type') == "VIP" ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="formRadios2">VIP</label>&nbsp&nbsp&nbsp&nbsp
                                            @error('type')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Harga</label>
                                            <input data-parsley-type="number" type="text" name="price" id="price" class="form-control prc @error('price') is-invalid @enderror" readonly required placeholder="Harga" value="{{ old('price') }}" oninput="priceFunction()"/>
                                            @error('price')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                       
                                        <div class="mt-3 text-end">
                                            <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Dapatkan Tiket</button>
                                        </div>
            
                                    </form>
                                </div>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p>© <script>document.write(new Date().getFullYear())</script> | Agen X.</p>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

        <script src="assets/js/app.js"></script>

        <script type="text/javascript"> 

            function ecoPrice() {
                document.getElementById("price").value = "100000";               
            }

            function vipPrice() {
                document.getElementById("price").value = "150000";               
            }

        </script>

    </body>
</html>
