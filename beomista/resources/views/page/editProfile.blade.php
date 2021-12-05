<div class="container-right">


   
    <!-- Modal -->
    <div class="modal fade" id="MyModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 130%;">
                <div class="modal-header">
                    <h4>Chỉnh sửa thông tin cá nhân</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">


                <form action="{{route('home.edit')}}" id="form-edit" method="POST" role="form">
                        @csrf 
                        
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="makhEdit">Mã khách hàng</label>
                                    <input value="{{$kh->MAKH}}" type="text" name="MAKH" id="makhEdit" class="form-control" readonly>
                                </div>
                               
                                <div class="form-group">
                                    <label for="hokhEdit">Họ khách hàng</label>
                                    <input value="{{$kh->HOKH}}"type="text" name="HOKH" id="hokhEdit" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="tenkhEdit">Tên khách hàng</label>
                                    <input value="{{$kh->TENKH}}"type="text" name="TENKH" id="tenkhEdit" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                <label>Giới tính</label><br>
                                <select name="GIOITINH" >
                                    
                                    <option value="nam">Nam</option>
                                    <option value="nu">Nữ</option>
                                </select>
                                </div>
                                
                               <br>
                               
                                <button type="submit" class="btn btn-primary btnUpdate">Submit</button>
                            </div>
                            <div class="col-md-6" style="margin-left: 20% ;">
                                <div class="form-group">
                                    <label for="sdtEdit">Số điện thoại</label>
                                    <input value="{{$kh->SDT}}" type="text" name="SDT" id="sdtEdit" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="diachiEdit">Địa chỉ</label>
                                    <input value="{{$kh->DIACHI}}" type="text" name="DIACHI" id="diachiEdit" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="emailEdit">Email</label>
                                    <input value="{{$kh->EMAIL}}" type="text" name="EMAIL" id="emailEdit" class="form-control" placeholder="" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="password">Mời nhập password trước khi thay đổi thông tin</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="" >
                                </div>
                                
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>
</div>