@extends('master')
@section('title')
     {{ __('Editar Tu Perfil') }}
@endsection
@section('content')

<section style="padding: 80px 0; background: #1a1a1a">
    <div class="container my-5">
        <div class="row">
            <!-- Left Sidebar -->
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card mb-4" style="background-color: #000; border: 1px solid #2e2e2e;">
                    <div class="d-flex flex-column align-items-center p-4">
                        <img class="rounded-circle mb-3" src="Ellipse 3.svg" alt="" width="80" />
                        <h4 class="mb-0 text-light">Ronald Richards</h4>
                        <p class="" style="color: #a1a1a1;">@Ronaldrichards</p>
                        <div class="d-flex align-items-center mt-2">
                            <div class="bg-success rounded-circle" style="width: 8px; height: 8px;" aria-hidden="true"></div> <!-- Active status indicator -->
                            <span class="text-light ms-2">En Línea</span>
                        </div>
                    </div>
                    <div class="p-4">
                        <p class="mt-2 text-light">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                        <p class="text-center" style="color: #a1a1a1;">Lima - Perú</p>
                        <div class="d-flex justify-content-center mb-2">
                            <img class="me-2" src="Group.svg" alt="" width="30" />
                            <img class="me-2" src="Vector (1).svg" alt="" width="30" />
                            <img class="me-2" src="Vector (2).svg" alt="" width="30" />
                            <img src="Vector (3).svg" alt="" width="30" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-9 col-md-8 col-sm-12">
                <div class="card mb-4" style="background-color: #000; border: 1px solid #2e2e2e;">
                    <h2 class="text-center mb-4 text-light py-5">Tu Perfil</h2>
                    <div class="card-body">
                        <h3 class="text-light">Tus datos</h3>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-light">Nombre</label>
                                <input type="text" class="form-control" placeholder="Placeholder" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-light">Apellidos</label>
                                <input type="text" class="form-control" placeholder="Placeholder" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-light">Usuario</label>
                                <input type="text" class="form-control" placeholder="Placeholder" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-light">Email</label>
                                <input type="email" class="form-control" placeholder="Placeholder" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-light">Celular</label>
                                <input type="tel" class="form-control" placeholder="Placeholder" />
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label text-light">Bio</label>
                                <textarea class="form-control" rows="3" placeholder="Write a message"></textarea>
                            </div>
                        </div>
                        <h3 class="text-light">Tus Redes Sociales</h3>
                        <div class="row mb-4">
                            <div class="col-md-12 mb-3">
                                <div class="d-flex align-items-center">
                                    <img class="me-2" src="Group.svg" alt="Facebook" width="30" />
                                    <input type="text" class="form-control" placeholder="Facebook Link" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="d-flex align-items-center">
                                    <img class="me-2" src="Vector (1).svg" alt="Instagram" width="30" />
                                    <input type="text" class="form-control" placeholder="Instagram Link" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="d-flex align-items-center">
                                    <img class="me-2" src="Vector (2).svg" alt="LinkedIn" width="30" />
                                    <input type="text" class="form-control" placeholder="LinkedIn Link" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="d-flex align-items-center">
                                    <img class="me-2" src="Vector (3).svg" alt="Twitter" width="30" />
                                    <input type="text" class="form-control" placeholder="Twitter Link" />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-4 text-end">
                            <button class="btn btn-primary">Guardar cambios</button>
                        </div>



                    </div>
                </div>
            </div>
        </div>

    </div>


</section>
@endsection
