@extends('master')

@section('title')
Transferir a la tarjeta
@endsection

@section('content')
<section style="background: #1a1a1a; padding: 100px 0;">
    <div class="container">
        <div class=" text-light p-4 rounded" style="border: 1px solid #000;background: #000;">
            <div class="text-center mb-4">
                <h2 class="mb-4">Transferir a la tarjeta</h2>
            </div>

            <div class="mb-4">
                <h4 class="">Por lo general, De 2 a 3 días hábiles</h4>
            </div>

            <div class="card mb-3 bg-dark text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="custom-control custom-radio mr-3">
                            <input type="radio" id="bbva" name="bank" class="custom-control-input">
                            <label class="custom-control-label" for="bbva"></label>
                        </div>
                        <div>
                            <b class="banco-de-bbva">Banco de BBVA</b>
                            <div class="cuenta-corriente">Cuenta corriente *****653</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="custom-control custom-radio mr-3">
                            <input type="radio" id="bcp" name="bank" class="custom-control-input">
                            <label class="custom-control-label" for="bcp"></label>
                        </div>
                        <div>
                            <b class="banco-de-bbva">Banco de BCP</b>
                            <div class="cuenta-corriente">Cuenta corriente *****123</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mb-4">
                <a class="btn btn-primary" href="Importe de la transferencia.html" id="buttonContainer">Siguiente</a>
            </div>

            <div class="text-light">
                <small class="d-block text-center">
                    Los tiempos de las transferencias son estimados. Todas las transferencias están sujetas a revisión y podrían retrasarse o detenerse si nosotros o su banco identificamos algún problema.
                </small>
            </div>

        </div>
    </div>
</section>
@endsection
