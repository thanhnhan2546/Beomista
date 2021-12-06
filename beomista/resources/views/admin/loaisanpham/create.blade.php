<div class="container-right">

    <button type="button" class="btn btn-info btn-lg-right btnAdd" data-toggle="modal" data-target="#myModal">Thêm loại sản phẩm</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 130%;">
                <div class="modal-header">
                    <h4>Thêm loại sản phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="{{route('loaisanpham.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="maspAdd">Mã loại sản phẩm</label>
                                    <input value="" type="text" name="MALOAI" id="maspAdd" class="form-control" >
                                </div>   
                                <div class="form-group">
                                    <label for="dongiaAdd">Tên loại</label>
                                    <input type="text" name="TENLOAI" id="dongiaAdd" class="form-control" placeholder="">
                                </div>
                                <button type="submit" class="btn btn-primary btnUpdate">Submit</button>
                                                           
                            </div>
                                                        
                        </div>

                    </form>


                </div>
            </div>

        </div>

    </div>
</div>