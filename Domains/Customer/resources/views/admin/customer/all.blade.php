@extends('customer::masters.admin')
@section('script')
    <script>

        $('#example1').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

    </script>
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Customers</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('customers.create')}}" class="btn btn-success card-title">Add Customer + </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date of Birth</th>
                                <th>Bank Account number</th>
                                <th>Setting</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $customers as $key => $customer )
                                <tr>
                                    <td>{{$customer->Firstname}} </td>
                                    <td>{{$customer->Lastname}} </td>
                                    <td>{{$customer->Email}} </td>
                                    <td>{{$customer->PhoneNumber   }} </td>
                                    <td>{{$customer->DateOfBirth}} </td>
                                    <td>{{$customer->BankAccountNumber}} </td><td>
                                        <form action="{{ route('customers.destroy' , $customer  ) }}" method="post">
                                            {{ method_field('delete') }}
                                            {{ csrf_field() }}
                                            <div class="btn-group btn-group-icon">
                                                <a href="{{ route('customers.edit' , $customer ) }}" class="btn btn-success "
                                                   title="Edit"><i
                                                        class="fa fa-edit" aria-hidden="true"></i></a>
                                                <button class="btn btn-danger " title="Delete"><i class="fa fa-trash"
                                                                                                  aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
    </section>
@endsection
