@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Uploaded Files</h1>
        <div>
            <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#file-modal">Add new file</a>
        </div>

    </div>
    <div class="modal fade" id="file-modal" tabindex="-1">
        <form action="{{route('files.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New File</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input name="file" type="file" class="custom-file-input" id="new-file"
                                    aria-describedby="new-file">
                                <label class="custom-file-label" for="new-file">Choose File...</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="mt-4 row">
        @foreach ($files as $file)
        <div class="mt-2 col-md-4">
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-md-2">
                        <div class="h-100 d-flex flex-column justify-content-center align-items-center">
                            <img src="{{asset('img.jpg')}}" class="img-fluid">
                            <p class="text-muted small mb-0">{{$file->get_size()}}</p>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="px-2 py-1">
                            <h6 class="card-title">{{$file->name}}</h6>
                            <div class="d-flex justify-content-between">
                                <p class="text-muted small">{{$file->user->name}}</p>
                                <p class="text-muted small">{{$file->created_at->format('d/m/Y')}}</p>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="{{route('files.download',$file)}}" class="btn btn-primary btn-sm mr-1">Descargar</a>
                                <form action="{{route('files.destroy',$file)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-4 row">
        {{$files->links()}}
    </div>
</div>

@endsection
