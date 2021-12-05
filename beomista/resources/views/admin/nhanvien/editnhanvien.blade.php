<div class="container-right">


   
    <!-- Modal -->
    <div class="modal fade" id="MyModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 130%;">
                <div class="modal-header">
                    <h4>Cập nhật nhân viên</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">


                <form action="" id="form-edit" method="POST" role="form">
                        @csrf 
                        
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="manvEdit">Mã nhân viên</label>
                                    <input type="text" name="MANV" id="manvEdit" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="honvEdit">Họ nhân viên</label>
                                    <input  type="text" name="HONV" id="honvEdit" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="gioitinhEdit">Giới tính</label>
                                    <input type="text" name="GIOITINH" id="gioitinhEdit" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="ngsinhEdit">Ngày sinh</label>
                                    <input type="date" name="NGSINH" id="ngsinhEdit" class="form-control" placeholder="">
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="col-md-6" style="margin-left: 20% ;">
                                <div class="form-group">
                                    <label for="tenkhEdit">Tên nhân viên</label>
                                    <input type="text" name="TENNV" id="tennvEdit" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="dchiEdit">Địa chỉ</label>
                                    <input type="text" name="DCHI" id="dchiEdit" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="emailEdit">Email</label>
                                    <input type="email" name="EMAIL" id="emailEdit" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="sdtEdit">Số điện thoại</label>
                                    <input type="text" name="SDT" id="sdtEdit" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>
</div>