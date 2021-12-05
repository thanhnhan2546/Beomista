<div class="container-right">


   
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 130%;">
                <div class="modal-header">
                    <h4>Đổi mật khẩu</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">


                <form action="{{route('home.editPass')}}" id="form-edit" method="POST" role="form">
                        @csrf 
                        <input value="{{$kh->MAKH}}" type="hidden" name="MAKH" id="makhEdit" class="form-control" readonly>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="makhEdit">Mật khẩu cũ</label>
                                    <input value="" type="password" name="passCu" id="makhEdit" class="form-control" >
                                </div>
                               
                                <div class="form-group">
                                    <label for="hokhEdit">Mật khẩu mới</label>
                                    <input value=""type="password" name="passMoi" id="hokhEdit" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="tenkhEdit">Nhập lại mật khẩu mới</label>
                                    <input value=""type="password" name="passMoi2" id="tenkhEdit" class="form-control" placeholder="">
                                </div>
                               
                                
                               <br>
                               
                                <button type="submit" class="btn btn-primary btnUpdate">Submit</button>
                            </div>
                            
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>
</div>