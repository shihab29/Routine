<!DOCTYPE html>
<html>
<head>
	<title>@yield('pageTitle')</title>
	<link rel="stylesheet" type="text/css" href="css\app.css">
	<style type="text/css">
		table, th, td {
		    border: 1px solid black;
		    border-collapse: collapse;
		}
		th, td {
		    padding: 15px;
		}



		ul {
		    list-style-type: none;
		    margin: 0;
		    padding: 0;
		    overflow: hidden;
		    background-color: #333;
		}

		li {
		    float: left;
		}

		li a, .dropbtn {
		    display: inline-block;
		    color: white;
		    text-align: center;
		    padding: 14px 16px;
		    text-decoration: none;
		}

		li a:hover, .dropdown:hover .dropbtn {
		    background-color: red;
		}

		li.dropdown {
		    display: inline-block;
		}

		.dropdown-content {
		    display: none;
		    position: absolute;
		    background-color: #f9f9f9;
		    min-width: 160px;
		    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		    z-index: 1;
		}

		.dropdown-content a {
		    color: black;
		    padding: 12px 16px;
		    text-decoration: none;
		    display: block;
		    text-align: left;
		}

		.dropdown-content a:hover {background-color: #f1f1f1}

		.dropdown:hover .dropdown-content {
		    display: block;
		}

	</style>
</head>
<body>
	<ul>
		<li class="dropdown">
			<a href="javascript:void(0)" class="dropbtn">1.1</a>
			<div class="dropdown-content">
			  <a href="/11/A">Section-A</a>
			  <a href="/11/B">Section-B</a>
			  <a href="/11/C">Section-C</a>
			</div>
		</li>
		<li class="dropdown">
			<a href="javascript:void(0)" class="dropbtn">1.2</a>
			<div class="dropdown-content">
			  <a href="/12/A">Section-A</a>
			  <a href="/12/B">Section-B</a>
			</div>
		</li>
		<li class="dropdown">
			<a href="javascript:void(0)" class="dropbtn">2.1</a>
			<div class="dropdown-content">
			  <a href="/21/A">Section-A</a>
			  <a href="/21/B">Section-B</a>
			  <a href="/21/C">Section-C</a>
			</div>
		</li>
		<li class="dropdown">
			<a href="javascript:void(0)" class="dropbtn">2.2</a>
			<div class="dropdown-content">
			  <a href="/22/A">Section-A</a>
			  <a href="/22/B">Section-B</a>
			</div>
		</li>
		<li class="dropdown">
			<a href="javascript:void(0)" class="dropbtn">3.1</a>
			<div class="dropdown-content">
			  <a href="/31/A">Section-A</a>
			  <a href="/31/B">Section-B</a>
			  <a href="/31/C">Section-C</a>
			</div>
		</li>
		<li class="dropdown">
			<a href="javascript:void(0)" class="dropbtn">3.2</a>
			<div class="dropdown-content">
			  <a href="/32/A">Section-A</a>
			  <a href="/32/B">Section-B</a>
			</div>
		</li>
		<li class="dropdown">
			<a href="javascript:void(0)" class="dropbtn">4.1</a>
			<div class="dropdown-content">
			  <a href="/41/A">Section-A</a>
			  <a href="/41/B">Section-B</a>
			  <a href="/41/C">Section-C</a>
			</div>
		</li>
		<li class="dropdown">
			<a href="javascript:void(0)" class="dropbtn">4.2</a>
			<div class="dropdown-content">
			  <a href="/42/A">Section-A</a>
			  <a href="/42/B">Section-B</a>
			</div>
		</li>
	</ul>
	<h1 align="center">@yield('heading')</h1>
	@yield('content')
</body>
</html>