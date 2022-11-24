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
                <h3 class="box-title">Danh sách chính</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Tên danh mục</th>
                              <th>Tên tiếng việt</th>
                              <th>Biểu tượng</th>
                              <th>Hành động</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($categorys as $item)
                          <tr>
                              <td>{{$item->category_name_en}}</td>
                              <td>{{$item->category_name_hin}}</td>
                              <td><span><i class="{{$item->category_icon}}"></i></span></td>
                              <td>
                                <a href="{{route('category.edit',$item->id)}}" class="btn btn-info" ><i class="fa fa-pencil"></i></a>
                                <a href="{{route('category.delete',$item->id)}}" id="delete"class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
                 <h3 class="box-title">Danh mục chính  </h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
                        @csrf
        
                    <div class="form-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Chuyên mục tiếng Anh</label>
                        <div class="col-sm-10">
                            <input name="category_name_en" class="form-control" type="text" >
                            @error('category_name_en')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="form-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Chuyên mục tiếng Việt</label>
                        <div class="col-sm-10">
                            <input name="category_name_hin" class="form-control" type="text">
                            @error('category_name_hin')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                    </div>
        
                    <div class="form-group">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Icon danh mục</label>
                        <div class="col-sm-10">
                            <input name="category_icon" class="form-control" type="text">
                            @error('category_icon')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                    </div>
                
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Thêm">
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