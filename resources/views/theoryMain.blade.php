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
		
		#teachers {
			overflow: auto;
    		max-height: 500px;
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
		<li class="dropdown">
			<a href="javascript:void(0)" class="dropbtn">Teachers</a>
			<div id="teachers" class="dropdown-content">
			  <a href="/Teacher1">Dr. Kazi A Kalpoma</a>
			  <a href="/Teacher2">Dr. S. M. Abdullah Al-Mamun</a>
			  <a href="/Teacher3">Mr. Md. Khairul Hasan</a>
			  <a href="/Teacher4">Dr. Mohammad Shafiul Alam</a>
			  <a href="/Teacher5">Mr. Mohammad Moinul Hoque</a>
			  <a href="/Teacher6">Dr. Md Shahriar Mahbub</a>
			  <a href="/Teacher7">Mr. Faisal Muhammad Shah</a>
			  <a href="/Teacher8">Ms. Qamrun Nahar Eity</a>
			  <a href="/Teacher9">Mr. Tanvir Ahmed</a>
			  <a href="/Teacher10">Mr. Md. Wasi Ul Kabir</a>
			  <a href="/Teacher11">Mr. Emam Hossain</a>
			  <a href="/Teacher12">Ms. Syeda Shabnam Hasan</a>
			  <a href="/Teacher13">Mr. Nazmus Sakib</a>
			  <a href="/Teacher14">Mr. Md. Hosne-Al-Walid Shaiket</a>
			  <a href="/Teacher15">Ms. Shanjida Khatun</a>
			  <a href="/Teacher16">Ms. Raqeebir Rab</a>
			  <a href="/Teacher17">Mr. Mohammad Imrul Jubair</a>
			  <a href="/Teacher18">Ms. Afsana Ahmed Munia</a>
			  <a href="#">Ms. Zarrin Tasnim Sworna</a>
			  <a href="/Teacher20">Dr. Nusrat Sharmin</a>
			  <a href="/Teacher21">Mr. Mir Tafseer Nayeem</a>
			  <a href="/Teacher22">Mr. D. M. Anisuzzaman</a>
			  <a href="#">Mr. Tanveer Ahmed Belal</a>
			  <a href="/Teacher24">Mr. Sujan Sarker</a>
			  <a href="/Teacher25">Ms. Tahsin Aziz</a>
			  <a href="/Teacher26">Mr. Md. Aminur Rahman</a>
			  <a href="/Teacher27">Mr. Shoeb Mohammad Shahriar</a>
			  <a href="/Teacher28">Mr. Taksir Hasan Majumder</a>
			  <a href="/Teacher29">Sk. Murad Hassan Anik</a>
			  <a href="/Teacher30">Ms. Anika Sayara</a>
			  <a href="/Teacher31">Mr. Mir Imtiaz Mostafiz</a>
			  <a href="/Teacher32">Ms. Mahzabeen Emu</a>
			  <a href="/Teacher33">Ms. Tasnim Kabir</a>
			</div>
		</li>
		<li class="dropdown">
			<a href="javascript:void(0)" class="dropbtn">Theory Classroom</a>
			<div class="dropdown-content">
			  <a href="/theoryRoom/7A03">7A03</a>
			  <a href="/theoryRoom/7A04">7A04</a>
			  <a href="/theoryRoom/7A05">7A05</a>
			  <a href="/theoryRoom/7A06">7A06</a>
			  <a href="/theoryRoom/7A07">7A07</a>
			  <a href="/theoryRoom/7C06">7C06</a>
			  <a href="/theoryRoom/7C07">7C07</a>
			</div>
		</li>
		<li class="dropdown">
			<a href="javascript:void(0)" class="dropbtn">Lab Classroom</a>
			<div class="dropdown-content">
			  <a href="/labRoom/7B01">7B01</a>
			  <a href="/labRoom/7B03">7B03</a>
			  <a href="/labRoom/7B05">7B05</a>
			  <a href="/labRoom/7B06">7B06</a>
			  <a href="/labRoom/7B07">7B07</a>
			  <a href="/labRoom/7B08">7B08</a>
			  <a href="/labRoom/9A05">9A05</a>
			  <a href="/labRoom/6B07">6B07</a>
			</div>
		</li>
		<!-- <li><a href="/objectives/totalTime">Total Time</a></li> -->
	</ul><br><br>

	@yield('content')
</body>
</html>