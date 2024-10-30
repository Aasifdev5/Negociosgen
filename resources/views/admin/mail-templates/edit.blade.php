@extends('admin.Master')
@section('title')
Plantillas de Correo
@endsection
@section('content')

<div class="page-body" style="background: #000">
   <div class="container-fluid">

   </div>
   <!-- Container-fluid starts-->
   <!-- Container-fluid starts-->
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="card" style="background: #fff">
            @if(Session::has('success'))
                  <div class="alert alert-success">
                     <p>{{session::get('success')}}</p>
                  </div>
                  @endif
                  @if(Session::has('fail'))
                  <div class="alert alert-danger">
                     <p>{{session::get('fail')}}</p>
                  </div>
                  @endif

               <form id="vironeer-submited-form" action="{{ url('admin/mail-templates/update', $mailTemplate->id) }}"
        method="POST">
        @csrf
        <div class="card" style="background: #fff">
            <div class="card-header bg-lg-3 text-white">Plantilla</div>
               <div class="card-body">
               <div class="row g-3 mb-4">
                    <div class="{{ $mailTemplate->isDefault() ? 'col-lg-12' : 'col-lg-8' }}">
                        <label class="form-label">Sujeto </label>
                        <input type="text" name="subject" class="form-control" value="{{ $mailTemplate->subject }}"
                            required>
                    </div>
                    @if (!$mailTemplate->isDefault())
                        <div class="col-lg-4">
                            <label class="form-label">Estado </label>
                            <input type="checkbox" name="status" data-toggle="toggle"
                                {{ $mailTemplate->status ? 'checked' : '' }}>
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Cuerpo </label>
                    <textarea name="body" class="summernote">{{ $mailTemplate->body }}</textarea>
                </div>
                <div class="alert alert-secondary mb-0">
                    <p class="mb-0"><strong>Códigos cortos</strong></p>
                    @foreach ($mailTemplate->shortcodes as $key => $value)
                        <li class="mt-2"><strong>@php echo "{{". $key ."}}"  @endphp</strong> : {{ $value }}</li>
                    @endforeach
                </div>
                <br>
                <div class="row g-2">
                     <div class="col-sm-4">
                        <button class="btn btn-primary" type="submit">Actualizar</button>
                     </div>

                  </div>
               </div>

         <!-- DOM / jQuery  Ends-->

         </div>
    </form>
      </div>
   </div>


   <!-- Container-fluid Ends-->
   <!-- Container-fluid Ends-->
</div>


@endsection
