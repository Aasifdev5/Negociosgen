@extends('admin.Master')
@section('title')
LISTA DE USUARIOS
@endsection
@section('content')
<div class="page-body" style="background: #000">
   <br>
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="card" style="background: #fff">
               <div class="card-header">
                  <h5>LISTA DE USUARIOS</h5>
                  <a class="btn btn-pill btn-primary btn-air-primary pull-right" href="{{url('admin/add_user')}}" data-toggle="tooltip" title="" role="button" data-bs-original-title="btn btn-primary">Agregar Usuario
                  </a>
                  <button id="bulk-delete" class="btn btn-danger pull-right me-2" data-toggle="tooltip" title="Eliminar Seleccionados" style="display: none;">
                      Eliminar Seleccionados
                  </button>
               </div>
               <div class="card-body">
                  <div class="content-page">
                     <div class="content">
                        <div class="container-fluid">
                           <div class="row">
                              <div class="col-12">
                                 <div class="card-box table-responsive">
                                    @if(Session::has('flash_message'))
                                    <div class="alert alert-success">
                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span></button>
                                       {{ Session::get('flash_message') }}
                                    </div>
                                    @endif
                                    <div class="table-responsive">
                                       <table class="table table-bordered display" id="advance-1">
                                          <thead>
                                             <tr>
                                                <th class="text-center">
                                                   <input type="checkbox" id="select-all">
                                                </th>
                                                <th>Acción</th>
                                                <th>Nombre de Usuario</th>
                                                <th>Correo Electrónico</th>

                                                <th>Estado del correo electrónico</th>
                                                <th>Dirección IP</th>

                                                <th>La fecha registrada</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             @foreach($usersData as $i => $data)
                                             @if($data->account_type != "admin")
                                             <tr>
                                                <td class="text-center">
                                                   <input type="checkbox" class="user-checkbox" value="{{ $data->id }}">
                                                </td>
                                                <td>
                                                   <a href="{{ url('admin/user/edit',$data->id) }}" class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5" data-toggle="tooltip" title="edit">
                                                      <i class="fa fa-edit"></i>
                                                   </a>
                                                   <a href="javascript:void(0);" class="btn btn-icon waves-effect waves-light btn-danger m-b-5 m-r-5 delete-btn" data-id="{{ $data->id }}" data-toggle="tooltip" title="Eliminar">
                                                      <i class="fa fa-trash"></i>
                                                   </a>
                                                </td>
                                                <td>
                                                   @if (!empty($data->profile_photo))
                                                       <img src="{{ asset('profile_photo/' . $data->profile_photo) }}" class="rounded-circle" width="70px" height="60px" alt="avatar">
                                                   @else
                                                       <img src="149071.png" width="70px" height="40">
                                                   @endif
                                                   {{ stripslashes($data->name) }}
                                                </td>
                                                <td>{{ $data->email }}</td>


                                                <td>{{ $data->ip_address }}</td>
                                                <td>
                                                   @if($data->status == 1)
                                                       <span class="badge badge-success">Activo</span>
                                                   @else
                                                       <span class="badge badge-danger">Inactivo</span>
                                                   @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d-m-Y  H:i:s') }}</td>
                                             </tr>
                                             @endif
                                             @endforeach
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        const selectAllCheckbox = $('#select-all');
        const userCheckboxes = $('.user-checkbox');
        const bulkDeleteButton = $('#bulk-delete');

        // Toggle all checkboxes
        selectAllCheckbox.change(function() {
            userCheckboxes.prop('checked', this.checked);
            bulkDeleteButton.toggle(userCheckboxes.is(':checked'));
        });

        // Show/hide bulk delete button based on checkbox selection
        userCheckboxes.change(function() {
            bulkDeleteButton.toggle(userCheckboxes.is(':checked'));
        });

        // Bulk delete action
        bulkDeleteButton.on('click', function() {
            const selectedIds = userCheckboxes.filter(':checked').map(function() {
                return this.value;
            }).get();

            if (selectedIds.length === 0) {
                Swal.fire('Por favor, selecciona al menos un usuario para eliminar.');
                return;
            }

            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción no se puede deshacer.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarlo'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Send a request to delete the selected users
                    fetch("{{ url('admin/user/bulk_delete') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ ids: selectedIds })
                    }).then(response => response.json())
                      .then(data => {
                          if (data.success) {
                              Swal.fire('Eliminado!', 'Los usuarios han sido eliminados.', 'success');
                              setTimeout(() => location.reload(), 1500);
                          } else {
                              Swal.fire('Error!', 'Ocurrió un error al eliminar los usuarios.', 'error');
                          }
                      });
                }
            });
        });

        // Individual delete button handling
        $('.delete-btn').on('click', function() {
            const userId = $(this).data('id');

            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción no se puede deshacer.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarlo'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch("{{ url('admin/user/delete_user') }}/" + userId, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }).then(response => response.json())
                      .then(data => {
                          if (data.success) {
                              Swal.fire('Eliminado!', 'El usuario ha sido eliminado.', 'success');
                              setTimeout(() => location.reload(), 1500);
                          } else {
                              Swal.fire('Error!', 'Ocurrió un error al eliminar el usuario.', 'error');
                          }
                      });
                }
            });
        });
    });
</script>

@endsection
