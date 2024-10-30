@extends('master')
@section('title')
    {{ __('Editar Tu Perfil') }}
@endsection
@section('content')
    <section style="padding: 80px 0; background: #1a1a1a">
        <div class="container my-5">
            @if (Session::has('success'))
                <div class="alert alert-success" style="background-color: green;">
                    <p style="color: #fff;">{{ session::get('success') }}</p>
                </div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger" style="background-color: red;">
                    <p style="color: #fff;">{{ session::get('fail') }}</p>
                </div>
            @endif
            <div class="row">
                <!-- Left Sidebar -->
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card mb-4" style="background-color: #000; border: 1px solid #2e2e2e;">
                        <div class="d-flex flex-column align-items-center p-4">
                            <!-- Profile Photo Upload & Preview -->
                            <form action="{{ url('update_profile') }}" method="POST" enctype="multipart/form-data">
                                @csrf


                                <input type="hidden" name="user_id" value="{{ $user_session->id }}">
                                <div class="personal-image mb-3 text-center">
                                    <label class="label">
                                        <input type="file" name="profile_photo" id="profilePhotoInput"
                                            onchange="previewImage(this)" style="display: none;" />
                                        <figure class="personal-figure">

                                            <img src="{{ !empty($user_session->profile_photo) ? asset('profile_photo/' . $user_session->profile_photo) : asset('149071.png') }}"
                                                id="profileImagePreview"
                                                style="width: 80px; height: 80px; border-radius: 50%; cursor: pointer;">
                                        </figure>
                                    </label>
                                    <h4 class="mb-0 text-light">{{ $user_session->name ?? 'Usuario' }}</h4>
                                    <p style="color: #a1a1a1;">{{ $user_session->username ?? 'usuario' }}</p>
                                    <div class="d-flex justify-content-center align-items-center mt-2">
                                        @if ($user_session->is_online == 1)
                                        <div class="bg-success rounded-circle" style="width: 8px; height: 8px;" aria-hidden="true"></div>
                                        @else
                                        <div class="bg-secondary rounded-circle" style="width: 8px; height: 8px;" aria-hidden="true"></div>
                                        @endif

                                        <span class="text-light ms-2">En Línea</span>
                                    </div>

                                    <div class="p-4">
                                        <p class="mt-2 text-light">{{ $user_session->about }}</p>
                                        <p class="text-center" style="color: #a1a1a1;">Lima - Perú</p>
                                        <div class="d-flex justify-content-center mb-2">
                                            @if(!empty($user_session->facebook))
                                                <a href="{{ $user_session->facebook }}" target="_blank">
                                                    <img class="me-2" src="{{ asset('assets/Group.svg') }}" alt="Facebook" width="30" />
                                                </a>
                                            @endif
                                            @if(!empty($user_session->instagram))
                                                <a href="{{ $user_session->instagram }}" target="_blank">
                                                    <img class="me-2" src="{{ asset('assets/Vector (1).svg') }}" alt="Instagram" width="30" />
                                                </a>
                                            @endif
                                            @if(!empty($user_session->linkedin))
                                                <a href="{{ $user_session->linkedin }}" target="_blank">
                                                    <img class="me-2" src="{{ asset('assets/Vector (2).svg') }}" alt="LinkedIn" width="30" />
                                                </a>
                                            @endif
                                            @if(!empty($user_session->twitter))
                                                <a href="{{ $user_session->twitter }}" target="_blank">
                                                    <img src="{{ asset('assets/Vector (3).svg') }}" alt="Twitter" width="30" />
                                                </a>
                                            @endif
                                        </div>


                                    </div>
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
                                <div class="col-md-12 mb-3">
                                    <label class="form-label text-light">Nombre</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ $user_session->name ?? '' }}" placeholder="Nombre" />
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-light">Usuario</label>
                                    <input type="text" name="username" class="form-control"
                                        value="{{ $user_session->username ?? '' }}" placeholder="Usuario" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-light">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ $user_session->email ?? '' }}" placeholder="Email" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-light">Celular</label>
                                    <input type="tel" name="mobile_number" class="form-control"
                                        value="{{ $user_session->mobile_number ?? '' }}" placeholder="Celular" />
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label text-light">Bio</label>
                                    <textarea name="bio" class="form-control" rows="3" placeholder="Escribe un mensaje">{{ $user_session->about ?? '' }}</textarea>
                                </div>
                            </div>

                            <h3 class="text-light">Tus Redes Sociales</h3>
                            <div class="row mb-4">
                                <div class="col-md-12 mb-3">
                                    <div class="d-flex align-items-center">
                                        <img class="me-2" src="{{ asset('assets/Group.svg') }}" alt="Facebook"
                                            width="30" />
                                        <input type="text" name="facebook" class="form-control"
                                            placeholder="Facebook Link" value="{{ $user_session->facebook ?? '' }}" />
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="d-flex align-items-center">
                                        <img class="me-2" src="{{ asset('assets/Vector (1).svg') }}" alt="Instagram"
                                            width="30" />
                                        <input type="text" name="instagram" class="form-control"
                                            placeholder="Instagram Link" value="{{ $user_session->instagram ?? '' }}" />
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="d-flex align-items-center">
                                        <img class="me-2" src="{{ asset('assets/Vector (2).svg') }}" alt="LinkedIn"
                                            width="30" />
                                        <input type="text" name="linkedin" class="form-control"
                                            placeholder="LinkedIn Link" value="{{ $user_session->linkedin ?? '' }}" />
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="d-flex align-items-center">
                                        <img class="me-2" src="{{ asset('assets/Vector (3).svg') }}" alt="Twitter"
                                            width="30" />
                                        <input type="text" name="twitter" class="form-control"
                                            placeholder="Twitter Link" value="{{ $user_session->twitter ?? '' }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-4 text-end">
                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function previewImage(input) {
            const preview = document.getElementById('profileImagePreview');
            const file = input.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
