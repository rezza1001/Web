@extends('admin.master')

@section('content')
<section class="content-header">
  <h1>
    Manage Article
             <a class="btn btn-info btn-sm" href="{{ url('/') }}/backend/post/create">Add New Article</a>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Article</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Article <small>List</small></h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
              {!! Form::open(['method'=>'GET','url'=>'backend/search/post/','class'=>'searchform','role'=>'search'])  !!}
              <div class="input-group input-group-sm pull-right" style="width: 250px;">
                  <input type="text" name="search" value="" class="form-control pull-right" placeholder="Search...">
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default" name="submit"><i class="fa fa-search"></i></button>
                  </div>
              </div>
             {!! Form::close() !!}
          </div><!-- /. tools -->
        </div><!-- /.box-header -->
        <div class="box-body pad">
            <div class="box">
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tr>
                    <th>No</th>
                    <th width="1"></th>
                    <th width="300">Title</th>
                    <th>Language</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Status
                    </th>
                    <th>Create Date</th>
                    <th>Action</th>
                  </tr>

                  @if(count($posts))
<?php
$a = $posts->perPage();
$b = $posts->currentPage();
$i = ($b-1)*$a;
?>
@foreach($posts as $item)
<?php $i++;
?>
                  <tr>
                    <td width="1"> <?php echo $i;?></div></td>
                    @if (count($item->getMedia('posts')))
                      <td width="1">
                          <div class="relative">
                          <img width="90" src="{{ url('/') }}/media/{{$item->getMedia('posts')->first()->id}}/conversions/small.jpg">
                          </div>
                      </td>
                    @else
                       <td>
                          <div class="relative">
                          <img width="90" src="{{ url('/') }}/images/default.jpg">
                          </div>
                       </td>
                    @endif
                    <td width="">{{ $item->title}}<br>
                          @if ($item->featured == 1)
                            <label class="label label-danger bg-olive">HEADLINE</label>
                          @endif
                    </td>
                    <td>{{$item->locale}}</td>
                    <td width="">{{ $item->user->name}}</td>
                    <td>
                      @foreach ($item->categories as $category)
                        <label class="label label-primary">{{$category->title}}</label>
                      @endforeach
                    </td>
                    <td width="">{{ $item->created_at}}</td>
                    <td width="170">
                      {{Form::open(['action'=>['Backend\PostController@destroy',$item->id],'onsubmit' => 'return ConfirmDelete()', 'method'=>'delete'])}}
                        <div class="btn-group">
                            <a target="_blank" class="btn btn-success btn-sm" href="{{ url('/') }}/read/{{ $item->slug}}">View</a>
                            <a class="btn btn-warning btn-sm" href="{{ url('/') }}/backend/post/{{ $item->id}}/edit">Edit</a>
                            {{Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])}}
                        </div>
                      {{Form::close()}}
                    </td>
                  </tr>
                  @endforeach
                  <tfoot>
                    <tr>
                      <td colspan="20">
                    {{ $posts->appends(Request::except('page'))->links()}}
                      </td>
                    </tr>
                  </tfoot>
                  @endif
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
      </div>
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->
@endsection
