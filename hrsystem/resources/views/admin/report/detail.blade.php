@extends('admin.master')

@section('content')
  <section class="content">

    <div class="container">
            <div class="table-responsive" style="margin-right: 100px">
                <table class="table table-bordered">
                    <thead>
                    <tr class="heading">
                        <th  class="header">No</th>
                        <th  class="header">Tanggal</th>
                        <th  class="header">Nama</th>
                        <th  class="header">Status</th>
                        <th  class="header">Jam Masuk</th>
                        <th  class="header">Jam Pulang</th>
                        <th  class="header">Keterangan</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($absents as $absent)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{!! $absent->work_date !!}</td>
                                <td>{!! $absent->employee !!}</td>
                                <td>{!! $absent->status !!}</td>
                                <td>{!! $absent->checkin !!}</td>
                                <td>{!! $absent->checkout !!}</td>
                                <td>{!! $absent->note !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                   <div class="col-md-6">
                      <ul class="pager" style="text-align: left">
                          <li>
                            <a href="{{ URL::to('downloadexcel') }}" class="btn btn-info btn-lg">
                              <span class="glyphicon glyphicon-save"></span> Download 
                            </a>
                           
                          </li>
                      </ul>
                    </div>
                    <div class="col-md-6">
                        {!! $absents->links('admin.report.pagination') !!}
                    </div>
              </div>
              
            </div>
        </div>
        
    </section>

  </section>
@endsection
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
            .header {
                background-color: #000111 !important;
                color: #f4f5f7 !important;
            }
            .btn-info {
                color: #fff!important;
                background-color: #0c1421!important;
                border-color: #0c1421!important;
            }
            .btn-info:hover {
                color: #fff!important;
                background-color: #273751!important;
                border-color: #273751!important;
            }
        </style>