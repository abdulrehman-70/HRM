@extends('layouts.applayout')
@section('content')
          <div class="main-panel">
            <div class="content-wrapper">
              <div class="page-header">

              </div>
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                        

                      <h3 class="card-description">Edit Project</h3>
                      <form class="forms-sample" method="POST" action="/update/project/form/{{ $project->id }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputname1">Project Name:</label>
                                  <input type="name" name="name" value="{{ $project->name }}" class="form-control">
                                  @error('name')
                                  <span class="error" style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputname1">Description</label>
                                  <input type="name" name="description" value="{{ $project->description }}" class="form-control">
                                  @error('description ')
                                  <span class="error" style="color:red">{{ $message }}</span>
                                  @enderror
                                </div>
 
                                <div class="form-group">
                                    <label for="selectInput">Select Client:</label>
                                  <select class="form-control" name="client_id" id="">
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}" selected="{{ $project->client_id }}">{{ $client->name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2" style="background-color:
                        rgb(115, 193, 230);border:1px solid  rgb(115, 193, 230) ">Save</button>
                        {{-- <button class="btn btn-light">Cancel</button> --}}
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

@section('js')
@endsection