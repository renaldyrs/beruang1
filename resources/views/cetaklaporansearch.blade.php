<html>
<head>

<style  type="text/css">
@page { size: A4 } 
table, td, th {
  border: 1px solid black;
} 
 h1 {
        font-weight: bold;
        font-size: 20pt;
        text-align: center;
    }
  
    table {
        border-collapse: collapse;
        width: 100%;
    }
  
    .table th {
        padding: 8px 8px;
        border:1px solid #000000;
        text-align: center;
    }
  
    .table td {
        padding: 3px 3px;
        border:1px solid #000000;
    }
  
    .text-center {
        text-align: center;
    }
    h3{
        text-align:center;
    }
</style>
</head>
<body>
    <div class="container">
            <h3 >Laporan</h3>
                <!-- Begin Page Content -->
                
                <h4>Periode</h4>
                <p>{{$dateform}} - {{$dateto}}</p>  
                    <!-- DataTales Example -->
                
                <center>            
                <div class="row">
                          
                    <div  style="overflow-x:auto;">
                    <table  id="dataTable"  width="70%" cellspacing="0">
                    <thead>
                        <tr>

                        <th>No</th>
                        <th>Id Pesanan</th>
                        <th>Nama Barang</th>
                        <th>Nama Customer</th>
                        <th>No Resi</th>
                        <th>kota</th>
                        <th>Ongkos Kirim</th>
                        <th>Tanggal Pesanan</th>
                        <th>Status</th>
                        <th>Jumlah Barang</th>
                        <th>Harga Barang</th>
                        <th>Total</th>
                                           
                        </tr>
                    </thead>
                                    
                    <tbody>
                        @php $i=1 @endphp   
                        @foreach($laporan as $l)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{$l->id_pesanan}}</td>
                            <td>{{$l->nama}}</td>
                            <td>{{$l->nama_lengkap}}</td>
                            <td>{{$l->no_resi}}</td>  
                            <td>{{$l->nama_kota}}</td>
                            <td>{{$l->biaya_pengiriman}}</td>             
                            <td>{{$l->tanggal_pesanan}}</td>
                            <td>{{$l->status}}</td>
                            <td>{{$l->jumlah_barang}}</td>
                            <td>{{$l->harga_barang}}</td>
                            <td>{{$l->total}}</td>
                                      
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div></center>

                <div class="row">
                    <div class="col col-lg-4 col-md-4">
                    <h4 class="text-center">Ringkasan Transaksi</h4>
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <td>Total Penjualan</td>
                            <td>Rp. {{$gran}}</td>
                        </tr>
                        <tr>
                            <td>Jumlah Transaksi</td>
                            <td>{{count($laporan)}}</td>
                        </tr>
                        <tr>
                            <td>Total ongkir</td>
                            @foreach($ongkir as $o)
                            <td>{{$o->total_ongkir}}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Total barang yang terjual</td>
                            @foreach($ongkir as $o)
                            <td>{{$o->jumbarang}}</td>
                            @endforeach
                        </tr>
                        </tbody>
                    </table>
                    </div>
                <div>
    
                </div>

           </div>
       
                    
    </div>
</body>
</html>
<br>
           

