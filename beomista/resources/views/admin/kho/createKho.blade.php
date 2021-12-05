<div class="container-right">
@if(session()->get('quyen')=='admin'|| session()->get('quyen')=='ql')
    <button type="button" class="btn btn-info btn-lg-right btnAdd" data-toggle="modal" data-target="#myModal">Nhập kho</button>
   @endif
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 130%;">
                <div class="modal-header">
                    <h4>Nhập kho</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">


                    <form method="POST" action="{{route('kho.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                            
                               
                                
                                <div class="form-group">
                                    <label for="maspAdd">Mã sản phẩm</label><br>
                                    <select  name="MASP" id="maspAdd">
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="manccAdd">Mã nhà cung cấp</label><br>
                                    <select  name="MANCC" id="manccAdd">
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="hsd">Hạn sử dụng</label>
                                    <input type="date" name="HSD_SP" id="hsd" class="form-control" placeholder="">
                                </div>
                               
                                <div class="form-group">
                                    <label for="dvtinhAdd">Số lượng</label>
                                    <input type="number" name="SLCON" id="dvtinhAdd" class="form-control" placeholder="">
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