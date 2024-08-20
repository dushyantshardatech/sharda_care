@extends('admin/admin_layout')
@section('title', 'Dashboard')
@section('dashboard_active', 'active')
@section('contents')
<div class="dashboard-sec">
	<div class="container-fluid">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="das-had">
                	<h2> Health City
                    <br />
                    <small>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque quibusdam reprehenderit voluptate culpa aperiam fugiat odio labore debitis! Soluta nobis iure ipsa corporis repellat, dolorem cum temporibus aperiam tempora? Quasi.</small>
                    </h2>
                </div>
            </div>
        </div>
		<div class="main-chart">
		    <div class="wrapper">
    	        <div class="row">
        	        <div class="col-md-7">
                        <div id="chartContainer" style="height: 300px; width: 100%; margin-bottom:40px;"> </div>
                    </div>
                    <div class="col-sm-5 chart-stake">&nbsp;</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection