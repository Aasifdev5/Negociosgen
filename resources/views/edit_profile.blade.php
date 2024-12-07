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
    <div class="card mb-4" style="background-color: #121212; border: 1px solid #2e2e2e; border-radius: 10px;">
        <div class="d-flex flex-column align-items-center p-4">
            <!-- Profile Photo Upload & Preview -->
            <form action="{{ url('update_profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user_session->id }}">

                <div class="personal-image mb-3 text-center">
                    <label class="label" style="cursor: pointer;">
                        <input type="file" name="profile_photo" id="profilePhotoInput"
                            onchange="previewImage(this)" style="display: none;" />
                        <figure class="personal-figure">
                            <img src="{{ !empty($user_session->profile_photo) ? asset('profile_photo/' . $user_session->profile_photo) : asset('149071.png') }}"
                                id="profileImagePreview"
                                style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; border: 3px solid #4CAF50; cursor: pointer;">
                        </figure>
                    </label>
                    <h4 class="mt-3 text-light">{{ $user_session->name ?? 'Usuario' }}</h4>
                    <p style="color: #a1a1a1; font-size: 14px;">{{ $user_session->username ?? 'usuario' }}</p>
                    <div class="d-flex justify-content-center align-items-center mt-2">
                        <div class="{{ $user_session->is_online == 1 ? 'bg-success' : 'bg-secondary' }} rounded-circle"
                            style="width: 10px; height: 10px;" aria-hidden="true"></div>
                        <span class="text-light ms-2" style="font-size: 14px;">{{ $user_session->is_online == 1 ? 'En Línea' : 'Desconectado' }}</span>
                    </div>
                </div>

                <div class="p-4 text-center">
                    <p class="text-light mb-3" style="font-size: 14px;">{{ $user_session->about ?? 'Sin descripción' }}</p>
                    <p class="text-muted" style="font-size: 14px;">Lima - Perú</p>

                    <!-- Social Links -->
                    <div class="d-flex justify-content-center mb-3">
                        @if (!empty($user_session->facebook))
                            <a href="{{ $user_session->facebook }}" target="_blank" class="me-2">
                                <img src="{{ asset('assets/Group.svg') }}" alt="Facebook" width="30">
                            </a>
                        @endif
                        @if (!empty($user_session->instagram))
                            <a href="{{ $user_session->instagram }}" target="_blank" class="me-2">
                                <img src="{{ asset('assets/Vector (1).svg') }}" alt="Instagram" width="30">
                            </a>
                        @endif
                        @if (!empty($user_session->linkedin))
                            <a href="{{ $user_session->linkedin }}" target="_blank" class="me-2">
                                <img src="{{ asset('assets/Vector (2).svg') }}" alt="LinkedIn" width="30">
                            </a>
                        @endif
                        @if (!empty($user_session->twitter))
                            <a href="{{ $user_session->twitter }}" target="_blank">
                                <img src="{{ asset('assets/Vector (3).svg') }}" alt="Twitter" width="30">
                            </a>
                        @endif
                    </div>


                </div>
            </form>
        </div>
    </div>


</div>


                <!-- Main Content -->
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="card mb-4" style="background-color: #000; border: 1px solid #2e2e2e;">
                        <h2 class="text-center mb-4 text-light py-5">{{ __('Tu Perfil') }}</h2>
                        <div class="card-body">




                            <h3 class="text-light">{{ __('Tus datos') }}</h3>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label text-light">{{ __('Nombre') }}</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ $user_session->name ?? '' }}" placeholder="Nombre" />
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-light">{{ __('Usuario') }}</label>
                                    <input type="text" name="username" class="form-control"
                                        value="{{ $user_session->username ?? '' }}" placeholder="Usuario" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-light">{{ __('Correo electrónico') }}</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ $user_session->email ?? '' }}" placeholder="Email" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-light">Celular</label>
                                    <input type="tel" name="mobile_number" class="form-control"
                                        value="{{ $user_session->mobile_number ?? '' }}" placeholder="Celular" />
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label text-light">{{ __('Biografía') }}</label>
                                    <textarea name="bio" class="form-control" rows="3" placeholder="Escribe un mensaje">{{ $user_session->about ?? '' }}</textarea>
                                </div>
                            </div>

                            <h3 class="text-light">{{ __('Tus Redes Sociales') }}</h3>
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
                                <button type="submit" class="btn btn-primary">{{ __('Guardar cambios') }}</button>
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
