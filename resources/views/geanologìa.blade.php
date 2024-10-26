@extends('master')
@section('title')
Geanologìa
@endsection
@section('content')
<style>
    * { margin: 0; padding: 0; }

   .tree ul {
       padding-top: 20px;
       position: relative;
       transition: all 0.5s;
   }

   .tree li {
       float: left;
       text-align: center;
       list-style-type: none;
       position: relative;
       padding: 20px 5px 0 5px;
       transition: all 0.5s;
   }

   .tree li::before, .tree li::after {
       content: '';
       position: absolute;
       top: 0;
       right: 50%;
       border-top: 1px solid #ccc;
       width: 50%;
       height: 20px;
   }

   .tree li::after {
       right: auto;
       left: 50%;
       border-left: 1px solid #ccc;
   }

   .tree li:only-child::after, .tree li:only-child::before {
       display: none;
   }

   .tree li:only-child { padding-top: 0; }

   .tree li:first-child::before, .tree li:last-child::after {
       border: 0 none;
   }

   .tree li:last-child::before {
       border-right: 1px solid #ccc;
       border-radius: 0 5px 0 0;
   }

   .tree li:first-child::after {
       border-radius: 5px 0 0 0;
   }

   .tree ul ul::before {
       content: '';
       position: absolute;
       top: 0;
       left: 50%;
       border-left: 1px solid #ccc;
       width: 0;
       height: 20px;
   }

   .tree li a {
       border: 1px solid #ccc;
       padding: 5px 10px;
       text-decoration: none;
       color: #fff;
       font-family: arial, verdana, tahoma;
       font-size: 11px;
       display: inline-block;
       border-radius: 5px;
       transition: all 0.5s;
   }

   .tree li a:hover, .tree li a:hover+ul li a {
       background: #c8e4f8;
       color: #000;
       border: 1px solid #94a0b4;
   }

   .tree li a:hover+ul li::after,
   .tree li a:hover+ul li::before,
   .tree li a:hover+ul::before,
   .tree li a:hover+ul ul::before {
       border-color: #94a0b4;
   }

     </style>
     <section style="padding: 80px 0; background: #1a1a1a">
        <div class="container">
          <div class="row">
              <div class="col-12">
                <div class="tree">
                  <ul class="list-unstyled">
                      <!-- Common Parent -->
                      <li>
                          <a href="#" data-bs-toggle="modal" data-bs-target="#modalPerson"
                             data-member-name="Bisabuelo Juan" data-sales="30000" data-referrals="200" class="p-3">
                              <img src="Ellipse 1.svg" class="rounded-circle img-fluid" alt="Bisabuelo Juan">
                              <h5 class="card-title">Bisabuelo Juan</h5>
                              <p class="card-text d-flex justify-content-between">
                                  <span class="me-3">Referidos: 200</span>
                                  <span>Ventas: $30000</span>
                              </p>
                          </a>
                          <ul class="list-unstyled">
                              <!-- Parent of José Martínez -->
                              <li>
                                  <a href="#" data-bs-toggle="modal" data-bs-target="#modalPerson"
                                     data-member-name="Abuelo Pedro" data-sales="12000" data-referrals="100" class="p-3">
                                      <img src="Ellipse 1 (4).svg" class="rounded-circle img-fluid" alt="Abuelo Pedro">
                                      <h5 class="card-title">Abuelo Pedro</h5>
                                      <p class="card-text d-flex justify-content-between">
                                          <span class="me-3">Referidos: 100</span>
                                          <span>Ventas: $12000</span>
                                      </p>
                                  </a>
                                  <ul class="list-unstyled">
                                      <li>
                                          <a href="#" data-bs-toggle="modal" data-bs-target="#modalPerson"
                                             data-member-name="José Martínez" data-sales="5000" data-referrals="50" class="p-3">
                                              <img src="Ellipse 1 (1).svg" class="rounded-circle img-fluid" alt="Líder 1">
                                              <h5 class="card-title">José Martínez</h5>
                                              <p class="card-text d-flex justify-content-between">
                                                  <span class="me-3">Referidos: 50</span>
                                                  <span>Ventas: $5000</span>
                                              </p>
                                          </a>
                                          <ul class="list-unstyled">
                                              <li>
                                                  <a href="#" data-bs-toggle="modal" data-bs-target="#modalPerson"
                                                     data-member-name="Ana Torres" data-sales="2000" data-referrals="20" class="p-3">
                                                      <img src="Ellipse 1 (2).svg" class="rounded-circle img-fluid" alt="Miembro 1">
                                                      <h5 class="card-title">Ana Torres</h5>
                                                      <p class="card-text d-flex justify-content-between">
                                                          <span class="me-3">Referidos: 20</span>
                                                          <span>Ventas: $2000</span>
                                                      </p>
                                                  </a>
                                              </li>
                                              <li>
                                                  <a href="#" data-bs-toggle="modal" data-bs-target="#modalPerson"
                                                     data-member-name="Luis Gómez" data-sales="3000" data-referrals="30" class="p-3">
                                                      <img src="Ellipse 1 (3).svg" class="rounded-circle img-fluid" alt="Miembro 2">
                                                      <h5 class="card-title">Luis Gómez</h5>
                                                      <p class="card-text d-flex justify-content-between">
                                                          <span class="me-3">Referidos: 30</span>
                                                          <span>Ventas: $3000</span>
                                                      </p>
                                                  </a>
                                              </li>
                                          </ul>
                                      </li>
                                  </ul>
                              </li>

                              <!-- Parent of Carlos Pérez -->
                              <li>
                                  <a href="#" data-bs-toggle="modal" data-bs-target="#modalPerson"
                                     data-member-name="Abuela Maria" data-sales="15000" data-referrals="80" class="p-3">
                                      <img src="Ellipse 2 (3).svg" class="rounded-circle img-fluid" alt="Abuela Maria">
                                      <h5 class="card-title">Abuela Maria</h5>
                                      <p class="card-text d-flex justify-content-between">
                                          <span class="me-3">Referidos: 80</span>
                                          <span>Ventas: $15000</span>
                                      </p>
                                  </a>
                                  <ul class="list-unstyled">
                                      <li>
                                          <a href="#" data-bs-toggle="modal" data-bs-target="#modalPerson"
                                             data-member-name="Carlos Pérez" data-sales="1000" data-referrals="10" class="p-3">
                                              <img src="Ellipse 1 (4).svg" class="rounded-circle img-fluid" alt="Miembro 3">
                                              <h5 class="card-title">Carlos Pérez</h5>
                                              <p class="card-text d-flex justify-content-between">
                                                  <span class="me-3">Referidos: 10</span>
                                                  <span>Ventas: $1000</span>
                                              </p>
                                          </a>
                                          <ul class="list-unstyled">
                                              <li>
                                                  <a href="#" data-bs-toggle="modal" data-bs-target="#modalPerson"
                                                     data-member-name="María López" data-sales="2500" data-referrals="25" class="p-3">
                                                      <img src="Ellipse 1 (5).svg" class="rounded-circle img-fluid" alt="Miembro 4">
                                                      <h5 class="card-title">María López</h5>
                                                      <p class="card-text d-flex justify-content-between">
                                                          <span class="me-3">Referidos: 25</span>
                                                          <span>Ventas: $2500</span>
                                                      </p>
                                                  </a>
                                              </li>
                                              <li>
                                                  <a href="#" data-bs-toggle="modal" data-bs-target="#modalPerson"
                                                     data-member-name="Sofía Rojas" data-sales="1500" data-referrals="15" class="p-3">
                                                      <img src="Ellipse 2 (1).svg" class="rounded-circle img-fluid" alt="Miembro 5">
                                                      <h5 class="card-title">Sofía Rojas</h5>
                                                      <p class="card-text d-flex justify-content-between">
                                                        <span class="me-3">Referidos: 15</span>
                                                        <span>Ventas: $1500</span>
                                                    </p>

                                                  </a>
                                              </li>
                                              <li>
                                                  <a href="#" data-bs-toggle="modal" data-bs-target="#modalPerson"
                                                     data-member-name="Carlos Junior" data-sales="500" data-referrals="5" class="p-3">
                                                      <img src="Ellipse 2 (2).svg" class="rounded-circle img-fluid" alt="Miembro 6">
                                                      <h5 class="card-title">Carlos Junior</h5>
                                                      <p class="card-text d-flex justify-content-between">
                                                          <span class="me-3">Referidos: 5</span>
                                                          <span>Ventas: $500</span>
                                                      </p>
                                                  </a>
                                              </li>
                                          </ul>
                                      </li>
                                  </ul>
                              </li>
                          </ul>
                      </li>
                  </ul>
              </div>

              </div>
          </div>


          <div class="modal fade" id="modalPerson" tabindex="-1" aria-labelledby="modalPersonLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content bg-dark text-light">
                    <div class="modal-header border-bottom border-secondary">
                        <h5 class="modal-title" id="modalPersonLabel">Detalles de Miembro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="d-flex flex-column align-items-center mb-4">
                        <img class="rounded-circle mt-3" src="Ellipse 1 (1).svg" alt="Member Photo" style="width: 80px; height: 80px;">
                          <div class="text-center">
                              <div class="badge bg-primary text-white">Nivel 1</div>
                              <b class="d-block mt-1">Luis Martínez</b>
                          </div>

                      </div>
                      <div class="row text-center mb-3">
                          <div class="col">
                              <b>$ 500</b>
                              <div>Ventas Totales</div>
                          </div>
                          <div class="col">
                              <b>$ 500</b>
                              <div>Ventas Totales</div>
                          </div>
                          <div class="col">
                              <b>50</b>
                              <div>Referidos Activos</div>
                          </div>
                      </div>
                      <h5 class="mt-4">Últimas ventas</h5>
                      <div class="table-responsive">
                          <table class="table table-dark">
                              <thead>
                                  <tr>
                                      <th scope="col">Fecha de Venta</th>
                                      <th scope="col">Producto</th>
                                      <th scope="col">Cantidad Vendida</th>
                                      <th scope="col">Precio Unitario</th>
                                      <th scope="col">Total de Venta</th>
                                      <th scope="col">Comisión Generada</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>15/09/24</td>
                                      <td>Curso de Marketing</td>
                                      <td>1</td>
                                      <td>$50.00</td>
                                      <td>$50.00</td>
                                      <td>$10.00</td>
                                  </tr>
                                  <tr>
                                      <td>15/09/24</td>
                                      <td>Curso de Marketing</td>
                                      <td>1</td>
                                      <td>$50.00</td>
                                      <td>$50.00</td>
                                      <td>$10.00</td>
                                  </tr>
                                  <tr>
                                      <td>15/09/24</td>
                                      <td>Curso de Marketing</td>
                                      <td>1</td>
                                      <td>$50.00</td>
                                      <td>$50.00</td>
                                      <td>$10.00</td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>

                    <div class="modal-footer border-top border-secondary justify-content-center">
                      <button class="btn btn-primary">Enviar mensaje</button>
                  </div>
                </div>
            </div>
        </div>





      </div>

      </section>
      <script>
        $(document).ready(function () {
           // Handle member card clicks
           $('.tree a[data-bs-toggle="modal"]').on('click', function () {
               // Extract data from the clicked element
               var memberName = $(this).data('member-name');
               var memberSales = $(this).data('sales');
               var memberReferrals = $(this).data('referrals');

               // Populate the modal with the extracted data
               $('.luis-martnez').text(memberName); // Update the name displayed in the modal
               $('.ventas-totales').each(function(index) {
                   if (index === 0) {
                       $(this).text('Ventas Totales: $' + memberSales); // Update total sales
                   } else if (index === 2) {
                       $(this).text('Referidos Activos: ' + memberReferrals); // Update active referrals
                   }
               });
           });
       });

       </script>
@endsection
