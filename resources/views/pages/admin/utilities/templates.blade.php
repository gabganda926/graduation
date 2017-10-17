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
	                        <li><a href=""><i class="material-icons">home</i> Home</a></li>
	                    </ol>
	                </div>
	            </div>
	         	<div class="body">
	         		<div class="row clearfix">
	                	<div class="col-md-12">
	                		<h3 style="text-align: center;">WEB CONTENT SETTINGS</h3>
	                	</div>
	                </div>

	                <div class="row clearfix">
	                	<div class="col-md-4">
	                		<button type="button" class="btn btn-default btn-lg btn-block waves-effect" style="border: 2px solid #102027;color: #102027; padding: 1em; font-size: 20px; height: 170px;" data-toggle="tooltip" data-placement="bottom" title="Edit images in the website's carousel" onclick="window.document.location='{{ URL::asset('/admin/utilities/carousel') }}';"><img src="{{ URL::asset ('images/icons/carousel.png')}}" style="height: 70px; width: 70px;"><br/>CAROUSEL</button>
	                	</div>

	                	<div class="col-md-4">
	                		<button type="button" class="btn btn-default btn-lg btn-block waves-effect" style="border: 2px solid #102027;color: #102027; padding: 1em; font-size: 20px; height: 170px;" data-toggle="tooltip" data-placement="bottom" title="Update the insurance company logo" onclick="window.document.location='{{ URL::asset('/admin/utilities/logo') }}';"><img src="{{ URL::asset ('images/icons/company.png')}}" style="height: 70px; width: 70px;"><br/>INSURANCE<br/> COMPANY LOGOS</button>
	                	</div>

	                	<div class="col-md-4">
	                		<button type="button" class="btn btn-default btn-lg btn-block waves-effect" style="border: 2px solid #102027;color: #102027; padding: 1em; font-size: 20px; height: 170px;" data-toggle="tooltip" data-placement="bottom" title="Edit Company's Name, etc." onclick="window.document.location='{{ URL::asset('/admin/utilities/others') }}';"><img src="{{ URL::asset ('images/icons/others.png')}}" style="height: 70px; width: 70px;"><br/>OTHERS</button>
	                	</div>
	                </div>

	         	</div>
            </div> <!-- card -->
        </div> <!-- container -->
    </section> 
@endsection