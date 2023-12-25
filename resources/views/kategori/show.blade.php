@extends('layouts.app')
  
@section('title', 'Detail Categories')
  
@section('contents')
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $kategori->nama }}" readonly>
        </div>
       
        <div class="col mb-3">
            <label class="form-label">Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" value="{{ $kategori->deskripsi }}" readonly>
        </div>
 
    </div>
    <br>
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="button" onclick="window.location.href = '/kategori/kategori'"
                class="btn btn-danger">Back</button>
        </div>
    </div>



@endsection