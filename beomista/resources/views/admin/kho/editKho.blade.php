<div class="container-right">


   
    <!-- Modal -->
    <div class="modal fade" id="MyModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 130%;">
                <div class="modal-header">
                    <h4>Cập nhật khách hàng</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">


                <form action="" id="form-edit" method="POST" role="form">
                        @csrf 
                        
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label for="dongiaEdit">Mã sản phẩm</label>
                                    <input type="text" name="MASP" id="dongiaEdit" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="manccEdit">Mã nhà cung cấp</label><br>
                                    <select  name="MANNCC" id="manccEdit">
                                        
                                    </select>
                                </div>
                                
                                 <div class="form-group">
                                    <label for="hsd">Hạn sử dụng</label>
                                    <input type="date" name="HSD_SP" id="hsd" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="dvtinhEdit">Số lượng</label>
                                    <input type="number" name="SLCON" id="dvtinhEdit" class="form-control" placeholder="">
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>
</div>