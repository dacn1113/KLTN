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
                 <h3 class="box-title">Edit Brand </h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="post" action="{{route('brand.update',$brands->id)}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$brands->id}}">
                        <input type="hidden" name="old_image" value="{{$brands->brand_image}}">
                    <div class="form-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Brand Name English</label>
                        <div class="col-sm-10">
                            <input name="brand_name_en" class="form-control" type="text" value="{{$brands->brand_name_en}}">
                            @error('brand_name_en')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="form-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Brand Name Hindi</label>
                        <div class="col-sm-10">
                            <input name="brand_name_hin" class="form-control" type="text"value="{{$brands->brand_name_hin}}">
                            @error('brand_name_hin')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                    </div>
        
                    <div class="form-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Brand Image</label>
                        <div class="col-sm-10">
                            <input name="brand_image" class="form-control" type="file">
                            @error('brand_image_en')
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