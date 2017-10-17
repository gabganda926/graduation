@extends('pages.admin.master')

@section('title','Web Content Settings - Utilities | i-Insure')

@section('utilities','active')

@section('formtemp','active')

@section('body')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
            	<div class="row clearfix">
	                <div class="col-md-12">
	                    <ol class="breadcrumb breadcrumb-bg-pink align-right">
	                        <li><a href="/admin/utilities/templates"><i class="material-icons">home</i> Home</a></li>
	                        <li><a href=""><i class="material-icons">home</i> Carousel</a></li>
	                    </ol>
	                </div>
	            </div>
	         	<div class="body">
	         	<form name = "claimrequest" id = "claimrequest" action = "/admin/utilities/carousel/save" method = "POST" enctype="multipart/form-data">
	         		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	         		<div class="row clearfix">
	                	<div class="col-md-12">
	                		<h3 style="text-align: center;">WEB CONTENT SETTINGS</h3>
	                	</div>
	                </div>

	                <div class="row clearfix">
	                	<div class="col-md-12">
	                		<h2 style="text-align: center;">Carousel Images</h2>
	                	</div>
	                </div>
	                <h2 style="text-align: center; font-size: 20px;">Image # 1</h2>
	                <div class="row clearfix">
	                	<div class="col-md-12">
	                		<div class="body" align="center">
	                		<div class="fallback">
	                            <img id="picture1_" src="{{ URL::asset('web/images/banner1.jpg') }}" alt="your image" style=" height: 500px; width: 800px; border-style: solid; border-width: 2px;">
	                        </div><br/>
	                            <input id = "picture1" name = "picture1" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
	                		</div>
	                	</div>
	                </div>

	                <h2 style="text-align: center; font-size: 20px;">Image # 2</h2>
	                <div class="row clearfix">
	                	<div class="col-md-12">
	                		<div class="body" align="center">
	                		<div class="fallback">
	                            <img id="picture2_" src="{{ URL::asset('web/images/banner2.jpg') }}" alt="your image" style=" height: 500px; width: 800px; border-style: solid; border-width: 2px;">
	                        </div><br/>
	                            <input id = "picture2" name = "picture2" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
	                		</div>
	                	</div>
	                </div>

	                <h2 style="text-align: center; font-size: 20px;">Image # 3</h2>
	                <div class="row clearfix">
	                	<div class="col-md-12">
	                		<div class="body" align="center">
	                		<div class="fallback">
	                            <img id="picture3_" src="{{ URL::asset('web/images/banner3.jpg') }}" alt="your image" style=" height: 500px; width: 800px; border-style: solid; border-width: 2px;">
	                        </div><br/>
	                            <input id = "picture3" name = "picture3" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
	                		</div>
	                	</div>
	                </div>

	                <div class="row clearfix">
	                	<div class="col-md-12">
	                		<button type="button" class="btn bg-green btn-block waves-effect" onclick="
	                		swal({
                                      title: 'Are you sure?',
                                      type: 'warning',
                                      showCancelButton: true,
                                      confirmButtonColor: '#DD6B55',
                                      confirmButtonText: 'Continue',
                                      cancelButtonText: 'Cancel',
                                      closeOnConfirm: false,
                                      closeOnCancel: false
                                    },
                                    function(isConfirm){
                                      if (isConfirm) {
                                        $('#claimrequest').submit();
                                      } else {
                                          swal({
                                          title: 'Cancelled',
                                          type: 'warning',
                                          timer: 500,
                                          showConfirmButton: false
                                          });
                                      }
                                    });
                                    ">SAVE CHANGES</button>
	                	</div>
	                </div>
	            </form>
	         	</div>
            </div> <!-- card -->
        </div> <!-- container -->
    </section> 

    <script>
    	function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#picture1_').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
                }
            }

            $("#picture1").change(function(){
                readURL1(this);
            });

            function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#picture2_').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
                }
            }

            $("#picture2").change(function(){
                readURL2(this);
            });

            function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#picture3_').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
                }
            }

            $("#picture3").change(function(){
                readURL3(this);
            });
    </script>
@endsection