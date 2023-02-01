@extends('layouts.simple.master')
@section('title', 'Consumer ')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dropzone.css')}}">
@endsection

@section('style')
@endsection
<br/>
@section('breadcrumb-title')
<h3>Consumers Bulk Upload</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Consumers</li>
<li class="breadcrumb-item active">Bulk Upload</li>
@endsection
{{-- <form action="{{route('consumer.upload')}}" method="POST" > --}}
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="form theme-form">
            {{-- <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label>Project Title</label>
                  <input class="form-control" type="text" placeholder="Project name *">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label>Client name</label>
                  <input class="form-control" type="text" placeholder="Name client or company name">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="mb-3">
                  <label>Project Rate</label>
                  <input class="form-control" type="text" placeholder="Enter project Rate">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="mb-3">
                  <label>Project Type</label>
                  <select class="form-select">
                    <option>Hourly</option>
                    <option>Fix price</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="mb-3">
                  <label>Priority</label>
                  <select class="form-select">
                    <option>Low</option>
                    <option>Medium</option>
                    <option>High</option>
                    <option>Urgent</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="mb-3">
                  <label>Project Size</label>
                  <select class="form-select">
                    <option>Small</option>
                    <option>Medium</option>
                    <option>Big</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="mb-3">
                  <label>Starting date</label>
                  <input class="datepicker-here form-control" type="text" data-language="en">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="mb-3">
                  <label>Ending date</label>
                  <input class="datepicker-here form-control" type="text" data-language="en">
                </div>
              </div>
            </div> --}}
            {{-- <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label>Enter some Details</label>
                  <textarea class="form-control" id="exampleFormControlTextarea4" rows="3"></textarea>
                </div>
              </div>
            </div> --}}
            
            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label>Upload consumer list</label>
                  @if(session('success'))
                  <div class="alert alert-success dark" role="alert">
                    {{ @session('success') }}  
                  </div>
                  @endif
                  @if(session('error'))
                  <div class="alert alert-danger dark" role="alert">
                    {{ @session('error') }}  
                  </div>
                  @endif	
                  {{-- <form id="singleFileUpload" action="/upload.php"> --}}
                    <form class="theme-form"  action="{{route('consumer.upload')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                    {{-- <div class="dz-message needsclick">
                      <i class="icon-cloud-up"></i>
                      <h6>Drag and Drop files here or click to upload.</h6>
                      <span class="note needsclick">Upload excel in CSV or XLSX format</span>
                    </div> --}}
                    <input class="form-control" name="file" type="file"><br/>
                    <div><button class="btn btn-primary btn-block" type="submit">Upload List</button></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                {{-- <div><a class="btn btn-success me-3" href="#">Add</a><a class="btn btn-danger" href="#">Cancel</a></div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
<script src="{{asset('assets/js/dropzone/dropzone.js')}}"></script>
<script src="{{asset('assets/js/dropzone/dropzone-script.js')}}"></script>
<script src="{{asset('assets/js/typeahead/handlebars.js')}}"></script>
<script src="{{asset('assets/js/typeahead/typeahead.bundle.js')}}"></script>
<script src="{{asset('assets/js/typeahead/typeahead.custom.js')}}"></script>
<script src="{{asset('assets/js/typeahead-search/handlebars.js')}}"></script>
<script src="{{asset('assets/js/typeahead-search/typeahead-custom.js')}}"></script>
@endsection