@extends('layouts.master')
@section('contents')

<div class="container-fluid">
<div class="row-fluid">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="panel-title">Sub Kejuruan</h2>
        </div>

        <div class="panel-body">
                <td><button id="btn_add" name="btn_add" class="btn btn-primary">Create</button></td>
               <td><a class="btn btn-warning" href="javascript:void(0)" onclick="on_edit()">Edit</a></td>
                <td><a class="btn btn-danger" href="javascript:void(0)" onclick="on_delete()">Delete</a></td>   
          <table class="table">
            {!! $html->table(['class'=>'table-striped'])!!}
          </table>
        </div>
      </div>
    </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Data Sub Kejuruan</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('subkejuruan.store')}}" method="post" >
                    {{ csrf_field() }}
                        <div class="form-group error">
                            <label for="inputName" class="col-sm-3 control-label">Kode Sub Kejuruan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control has-error" id="kd_sub_kejuruan" name="kd_sub_kejuruan" placeholder="Kode Sub Kejuruan" value="">
                                {!! $errors->first('kd_sub_kejuruan', '<p class="help-block">Data Sudah Ada</p>') !!}
                            </div>
                        </div>
                        <div class="form-group error">
                            <label for="inputName" class="col-sm-3 control-label">Nama Sub Kejuruan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control has-error" id="nama_sub_kejuruan" name="nama_sub_kejuruan" placeholder="Nama Sub Kejuruan" value="">
                            </div>
                        </div>
                        <div class="form-group error">
                            <label for="inputName" class="col-sm-3 control-label">Nama Kejuruan</label>
                            <div class="col-sm-9">
                              <select name="kd_kejuruan" class="form-control has-error">
                                @foreach($kejuruan as $data)
                                  <option value="{{$data->kd_kejuruan}}">{{$data->nama_kejuruan}}</option>
                                @endforeach
                              </select>
                                <!-- <input type="text" class="form-control has-error" id="nama_Sub_kejuruan" name="nama_kejuruan" placeholder="Nama Sub Kejuruan" value=""> -->
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
    var konfirmasi = confirm("Apakan anda yakin akan merubah data ?");
    if( konfirmasi == true ) {
        //alert('Eksekusi delete dilakukan..');
        // $.ajax({
        //     url: "kejuruan/edit",
        //     type: 'post',
        //     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        //     dataType: 'json',
        //     data: {"ids": ids},
        //     success: function(result) {
              
        //     }
        // });
        setTimeout(function(){
          window.location = "/subkejuruan/"+ids+"/edit";  
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
    var konfirmasi = confirm("Apakan anda yakin akan menghapus ?");
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
          window.location = "/subkejuruan";  
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