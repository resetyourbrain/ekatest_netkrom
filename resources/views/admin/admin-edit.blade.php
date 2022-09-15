@extends('layouts.main')


@section('page-content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Form Edit Admin</h4>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- end row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <form class="custom-validation" action="/admin/update/{{ $ticket->id }}" method="POST">
                            @method('put')
                            @csrf

                            <div class="mb-3">
                                <label class="form-label" for="name">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Lengkap" autofocus required value="{{ old('name',$ticket->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>                                              
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" required parsley-type="email" placeholder="Email" value="{{ old('email',$ticket->email) }}"/>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">No HP</label>
                                <input data-parsley-type="number" type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" required placeholder="No HP" value="{{ old('phone',$ticket->phone) }}"/>
                                @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
    
                            <div class="mb-3">
                                <label class="form-label">Jenis Tiket</label><br>
                                    <input class="form-check-input" type="radio" name="type" id="type" value="Ekonomi" onclick="ecoPrice()" required {{ old('type',$ticket->type) == "Ekonomi" ? 'checked' : '' }}>
                                        <label class="form-check-label" for="formRadios1">Ekonomi</label>&nbsp&nbsp&nbsp&nbsp
                                    <input class="form-check-input" type="radio" name="type" id="type" value="VIP" onclick="vipPrice()" required {{ old('type',$ticket->type) == "VIP" ? 'checked' : '' }}>
                                        <label class="form-check-label" for="formRadios2">VIP</label>&nbsp&nbsp&nbsp&nbsp
                                @error('type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Harga</label>
                                <input data-parsley-type="number" type="text" name="price" id="price" class="form-control prc @error('price') is-invalid @enderror" readonly required placeholder="Harga" value="{{ old('price',$ticket->price) }}" oninput="priceFunction()"/>
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div>
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                        Submit
                                    </button>
                                    <a href="/home" class="btn btn-secondary waves-effect">Cancel</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
        
    </div> <!-- container-fluid -->
</div>
<script type="text/javascript"> 

    function ecoPrice() {
        document.getElementById("price").value = "100000";               
    }

    function vipPrice() {
        document.getElementById("price").value = "150000";               
    }

</script>
@endsection