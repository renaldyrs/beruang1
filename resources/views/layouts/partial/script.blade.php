<script src="{{asset('New/assets/js/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="{{asset('New/assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="{{asset('New/assets/js/smoothproducts.min.js')}}"></script>
    <script src="{{asset('New/assets/js/theme.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $.get({
            url:"{{url('/getcategory')}}",
            type:"get",
            dataType:"json",
            data:{
                "_token":"{{csrf_token() }}",
            },
            success:function(response){
                var len = 0;
                    len = response.length;
                for(var i=0; i<len; i++){
                        var id = response[i]['id'];
                        var name = response[i]['nama'];
                        // console.log(id);
                        var kategori =
                        '<ul class="nav nav-pills" role="tablist"> <l   i class="nav-item"><a href="/category/'+id+'" class="dropdown-item" name="id_category" id="id_category">'+name+'</a></li></ul>';
                        $("#category").append(kategori);
                    }
                // var data = response.length;
                // for(var i=0;i<data;i++){
                //     var id =response[i]['id_kota'];
                //     var name = response[i]['nama_kota'];
                //     $("#city").append("<option value='"+id+"'>"+name+"</option>");
                
            }
        });
        });
    </script>
    
