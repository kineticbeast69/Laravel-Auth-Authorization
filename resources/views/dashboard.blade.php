@include("subview.header")

<div class="text-center bg-warning fs-2 mb-4 fw-bold">
     dashboard page
</div>
<!-- navbar component section is here -->
<x-navbar name="{{Auth::user()->name}}" role="{{Auth::user()->role}}" />

<!-- login button here -->
<div class="d-flex  mt-43  justify-content-center align-items-center">
     <table class="table table-hover table-striped table-primary p-1 table-bordered w-50">
          <thead>
               <tr>
                    <th scope="col">Serial no.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
               </tr>
          </thead>
          <tbody>
               @forelse($datas as $data)
                       <tr>
                              <th scope="row">{{$loop->iteration}}</th>
                              <td>{{$data->name}}</td>
                              <td>{{$data->email}}</td>
                       </tr>
                  @empty
                            <h1>There is no data.</h1>
                       @endforelse
          </tbody>
     </table>
</div>




@include("subview.footer")