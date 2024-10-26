@extends('master')
@section('title')
 {{ __('Transferir Fondos') }}
@endsection
@section('content')

<section style="background: #1a1a1a; padding: 100px 0;">
    <div class="container">
        <div class=" text-light p-4 rounded" style="border: 1px solid #000;background: #000;">
            <div class="text-center mb-4">
                <h2 class="mb-4">Transferir Fondos</h2>
            </div>

            <div class="mb-4">
                <h4 class="">Retirar Fondos</h4>
            </div>

              <!-- Start of each card in its own row -->
        <div class="row mb-4">
            <a href="Transferir a la tarjeta.html" style="text-decoration: none;"> <div class="col-12">
                <div class="card text-center bg-dark text-white h-100 p-3">
                    <div class="card-body d-flex flex-row align-items-center">
                        <img src="arrow-left-right.svg" class="card-img-top mb-2" style="width: 50px;" alt="Transfer Arrow">
                        <div class="ml-3">
                            <h5 class="card-title">Transferir a su cuenta bancaria</h5>
                            <p class="card-text">Transferir fondos de comisiones a su cuenta bancaria.</p>
                        </div>
                    </div>
                </div>
            </div></a>

        </div>

        <div class="row mb-4">
            <div class="col-12">
                <div class="card text-center bg-dark text-white h-100 p-3">
                    <div class="card-body d-flex flex-row align-items-center">
                        <img src="arrow-left-right.svg" class="card-img-top mb-2" style="width: 50px;" alt="Transfer Arrow">
                        <div class="ml-3">
                            <h5 class="card-title">Transferir utilizando PayPal</h5>
                            <p class="card-text">Inicia sesión en PayPal para transferir su dinero.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <div class="card text-center bg-dark text-white h-100 p-3">
                    <div class="card-body d-flex flex-row align-items-center">
                        <img src="arrow-left-right.svg" class="card-img-top mb-2" style="width: 50px;" alt="Transfer Arrow">
                        <div class="ml-3">
                            <h5 class="card-title">Transferir utilizando LIGO</h5>
                            <p class="card-text">Inicia sesión en LIGO para transferir su dinero.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of each card in its own row -->

        </div>
    </div>
</section>

@endsection
