@extends('layouts.app')
@section('content')
<!DOCTYPE html>

<html>

<head>

   <title>PHPSpreadsheet in Laravel</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.css" />

   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" />


</head>

<body>

<div class="container">

   <div class="row justify-content-centre" style="margin-top: 4%">

       <div class="col-md-8">

           <div class="card">

               <div class="card-header bgsize-primary-4 white card-header">

                   <h4 class="card-title">Import Excel Data</h4>

               </div>

               <div class="card-body">

                   @if ($message = Session::get('success'))

                       <div class="alert alert-success alert-block">

                           <button type="button" class="close" data-dismiss="alert">×</button>

                           <strong>{{ $message }}</strong>

                       </div>

                       <br>

                   @endif



                   <form action="{{url("import")}}" method="post" enctype="multipart/form-data">

                       @csrf

                       <fieldset>

                           <label>Select File to Upload  <small class="warning text-muted">{{__('Please upload only Excel (.xlsx, .xls or csv) files')}}</small></label>

                           <div class="input-group">

                               <input type="file" required class="form-control" name="uploaded_file" id="uploaded_file">

                               @if ($errors->has('uploaded_file'))

                                   <p class="text-right mb-0">

                                       <small class="danger text-muted" id="file-error">{{ $errors->first('uploaded_file') }}</small>

                                   </p>

                               @endif

                               <div class="input-group-append" id="button-addon2">

                                   <button class="btn btn-primary square" type="submit"><i class="ft-upload mr-1"></i> Upload</button>

                               </div>

                           </div>

                       </fieldset>

                   </form>

               </div>

           </div>

       </div>

   </div>


   <div class="row justify-content-left">

       <div class="col-md-12">

           <br />

           <div class="card">

               <div class="card-header bgsize-primary-4 white card-header">

                   <h4 class="card-title">Customer Data Table</h4>

               </div>

               <div class="card-body">

                <div >
                    <form action="search" method="get">
                        <div class="form-group">
                            <input type="search" name="search" class="control" search(request,Scr_name_real)>
                            <span class="form-group-btn">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </span>
                </div>

                   <div class="pull-right">

                       <a href="{{url("export")}}" class="btn btn-primary" style="margin-left:85%">Export Excel Data</a>

                   </div>

                   <div class=" card-content table-responsive">

                       <table id="example" class="table table-striped table-bordered" style="width:100%">

                           <thead>
                           <th>Date</th>
                           <th>Time</th>
                           <th>Duration</th>
                           <th>LCRNo</th>
                           <th>External partner</th>
                           <th>External name</th>
                           <th>Scr no. invoice</th>
                           <th>Scr name invoice</th>
                           <th>Scr no. real</th>
                           <th>Scr name real</th>
                           <th>Connection no.</th>
                           <th>Charges</th>
                           <th>Direction</th>
                           <th>Bill type</th>
                           <th>Call type</th>
                           <th>Proj.</th>
                           <th>HotId</th>

                           </thead>

                           <tbody>
                               @if(!empty($data) && $data->count())
                               @foreach($data as $row)
                                   <tr>
                                       <td>{{ $row->Date}}</td>
                                       <td>{{ $row->Time}}</td>
                                       <td>{{ $row->Duration}}</td>
                                       <td>{{ $row->LCRNo}}</td>
                                       <td>{{ $row->External_partner}}</td>
                                       <td>{{ $row->External_name}}</td>
                                       <td>{{ $row->Scr_no_invoice}}</td>
                                       <td>{{ $row->Scr_name_invoice}}</td>
                                       <td>{{ $row->Scr_no_real}}</td>
                                       <td>{{ $row->Scr_name_real}}</td>
                                       <td>{{ $row->Connection_no}}</td>
                                       <td>{{ $row->Charges}}</td>
                                       <td>{{ $row->Direction}}</td>
                                       <td>{{ $row->Bill_type}}</td>
                                       <td>{{ $row->Call_type}}</td>
                                       <td>{{ $row->Proj}}</td>
                                       <td>{{ $row->HotId}}</td>

                                   </tr>

                               @endforeach

                           @else

                               <tr>

                                   <td colspan="10">There are no data.</td>

                               </tr>

                           @endif

                           </tbody>

                       </table>

                       {!! $data->links() !!}

                   </div>

               </div>

           </div>

       </div>

   </div>

   {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

   <script>

       $(document).ready(function() {

           $('#example').DataTable();

       } );

   </script> --}}

</body>

</html>
@endsection
