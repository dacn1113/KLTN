@extends('admin.admin_master')
@section('admin')
      
  <!-- Content Wrapper. Contains page content -->
  
    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        <div class="row">

          <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Category Brand </h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="post" action="{{route('category.update',$categorys->id)}}" enctype="multipart/form-data">
                        @csrf
                     
                    
                    <div class="form-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Category Name English</label>
                        <div class="col-sm-10">
                            <input name="category_name_en" class="form-control" type="text" value="{{$categorys->category_name_en}}">
                            @error('category_name_en')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="form-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Category Name Hindi</label>
                        <div class="col-sm-10">
                            <input name="category_name_hin" class="form-control" type="text"value="{{$categorys->category_name_hin}}">
                            @error('category_name_hin')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                    </div>
        
                    <div class="form-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Category Icon</label>
                        <div class="col-sm-10">
                            <input name="category_icon" class="form-control" type="text" value="{{$categorys->category_icon}}">
                            @error('category_icon')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                    </div>
                
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Add New">
                    </form>
                   </div>
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
 
             <!-- /.box -->          
           </div>




        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>

@endsection