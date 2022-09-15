@extends('admin.admin_master')
@section('admin')
      
  <!-- Content Wrapper. Contains page content -->
  
    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        <div class="row">
            
   
          <div class="col-8">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Brand List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Brand Name</th>
                              <th>Brand Hind</th>
                              <th>Image</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($brands as $item)
                          <tr>
                              <td>{{$item->brand_name_en}}</td>
                              <td>{{$item->brand_name_hin}}</td>
                              <td><img src="{{asset($item->brand_image)}}" style="width: 70px;height:40px;"></td>
                              <td>
                                <a href="{{route('brand.edit',$item->id)}}" class="btn btn-info" ><i class="fa fa-pencil"></i></a>
                                <a href="{{route('brand.delete',$item->id)}}" id="delete"class="btn btn-danger"><i class="fa fa-trash"></i></a>
                              <td>    
                          </tr>
                        @endforeach
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- /.box -->          
          </div>
          <!-- /.col -->

          <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add Brand </h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="post" action="{{route('brand.store')}}" enctype="multipart/form-data">
                        @csrf
        
                    <div class="form-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Brand Name Englist</label>
                        <div class="col-sm-10">
                            <input name="brand_name_en" class="form-control" type="text" >
                            @error('brand_name_en')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="form-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Brand Name Hindi</label>
                        <div class="col-sm-10">
                            <input name="brand_name_hin" class="form-control" type="text">
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