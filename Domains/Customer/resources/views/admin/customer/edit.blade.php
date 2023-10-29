@extends('customer::masters.admin')
@section('script')
    <script>
        $('.multi-select').select2();
    </script>
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Customers</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Edit Customer</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" action="{{ route('customers.update',$customer->id ) }}"
                              method="post"
                              enctype="multipart/form-data">
                            @include('customer::admin.partials.errors')
                            {{csrf_field()}}
                            {{ method_field('PATCH') }}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="name" class="control-label"> First name </label>
                                        <input type="text" class="form-control" name="Firstname"
                                               value="{{$customer->Firstname}}">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="name" class="control-label">Last name</label>
                                        <input type="text" class="form-control" name="Lastname"
                                               value="{{$customer->Lastname}}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name" class="control-label"> Email </label>
                                        <input type="text" readonly class="form-control" value="{{$customer->Email}}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name" class="control-label"> Phone Number </label>
                                        <input type="text" readonly class="form-control"
                                               value="{{$customer->PhoneNumber}}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name" class="control-label">Bank Account Number</label>
                                        <input type="text" class="form-control" name="BankAccountNumber"
                                               value="{{$customer->BankAccountNumber}}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name" class="control-label">Date Of Birth</label>
                                        <input type="text" class="form-control" name="DateOfBirth"
                                               value="{{$customer->DateOfBirth}}"
                                        >
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btnsp">Save</button>
                            </div>
                        </form>
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    </div>
@endsection
