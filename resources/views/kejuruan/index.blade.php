@extends('layouts.master')
@section('contents')

<div class="container-fluid">
  <div class="row-fluid">
    <div class="panel-heading"><h2 class="panel-title">Data Kejuruan</h2></div>
      <td><button id="btn_add" name="btn_add" class="btn btn-primary">Create</button></td>
      <td><button id="btn_add" name="btn_add" class="btn btn-primary" href="javascript:void(0)" onclick="on_edit()">Ubah</button></td>
      <td><a class="btn btn-warning" href="javascript:void(0)" onclick="on_edit()">Edit</a></td>
      <td><a class="btn btn-danger" href="javascript:void(0)" onclick="on_delete()">Delete</a></td>
      
      <br>

      <table class="table" id="app">
        {!! $html->table(['class'=>'table-striped'])!!}
      </table>
  </div>
</div>
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Data Kejuruan</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('kejuruan.store')}}" method="post" >
                    {{ csrf_field() }}
                        <div class="form-group error">
                            <label for="inputName" class="col-sm-3 control-label">Kode Kejuruan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control has-error" id="kd_kejuruan" name="kd_kejuruan" placeholder="Kode Kejuruan" value="">
                                {!! $errors->first('kd_kejuruan', '<p class="help-block">Data Sudah Ada</p>') !!}
                            </div>
                        </div>
                        <div class="form-group error">
                            <label for="inputName" class="col-sm-3 control-label">Nama Kejuruan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control has-error" id="nama_kejuruan" name="nama_kejuruan" placeholder="Nama Kejuruan" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputDetail" class="col-sm-3 control-label">Keterangan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" value="">
                            </div>
                        </div>
                    
                
                        <div class="modal-footer">
                          <button type="Submit" value="Simpan" class="btn btn-primary">Simpan</button>
                            <td><a class="btn btn-danger" href="{{URL::previous()}}">Batal</a></td>
                        </div>
                      </form>
                </div>
            </div>

        </div>
    </div>
    <meta name="_token" content="{!! csrf_token() !!}" />


<script type="text/javascript">
  var ids = [];
  function addId(obj) {
    //alert("Kode: "+ obj.value + '; ' + (obj.checked? 'terpilih' : 'tidak dipilih'));
    console.log(obj);
    //checkbox terpilih..
    if(obj.checked) {
      ids.push(obj.value);
    } else {
      //checkbox tidak dipilih
      var index = ids.indexOf(obj.value);
      ids.splice(index, 1);
    }
  }

  function on_edit()
  {
    if(ids.length == 0) {
      alert("silahkan pilih data yang ingin di ubah !");
    } else if (ids.length > 1 ){
      alert("silahkan pilih salah satu datanya !");
      }else {
        var konfirmasi = confirm("Apakah anda yakin akan merubah data ?");
        if( konfirmasi == true ) {
          //alert('Eksekusi delete dilakukan..');
          // $.ajax({
          //   url: "kejuruan/edit",
          //   type: 'post',
          //   headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          //   dataType: 'json',
          //   data: {"ids": ids},
          //   success: function(result) {
              
          //   }
          // });
        setTimeout(function(){
          window.location = "/kejuruan/"+ids+"/edit";  
        }, 1000);
        
        } else {
          alert('Eksekusi rubah data dibatalkan..');
        }
      }
  }

  function on_delete()
  {
    if(ids.length == 0) {
      alert("silahkan pilih data yang ingin dihapus !");
    } else {
      var konfirmasi = confirm("Apakah anda yakin akan menghapus ?");
      if( konfirmasi == true ) {
        //alert('Eksekusi delete dilakukan..');
        $.ajax({
            url: "kejuruan/destroy",
            type: 'DELETE',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            data: {"ids": ids},
            success: function(result) {
              
            }
        });
        setTimeout(function(){
          window.location = "/kejuruan";  
        }, 1000);
        
      } else {
        alert('Eksekusi delete data dibatalkan..');
      }
    }
  }

</script>
@endsection
@section('scripts')
{!! $html->scripts() !!}
@endsection