<?php
include 'connect_to_db.php';
$mysqli = OpenCon();

// Checking for connections 
if ($mysqli->connect_error) { 
    die('Connect Error (' .  
    $mysqli->connect_errno . ') '.  
    $mysqli->connect_error); 
} 
  
// SQL query to select data from database 
$sql = "SELECT * FROM testtable"; 
$result = $mysqli->query($sql); 
echo mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, shrink-to-fit=no"
		/>
		<meta name="robots" content="noindex,nofollow" />
		<link
			rel="icon"
			type="image/x-icon"
			href="/assets/images/logo/favicon.ico"
		/>
  <link href="https://fonts.googleapis.com/css?family=Inter:400,500,600,700&display=swap" rel="stylesheet">
	<link
	href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"
	rel="stylesheet"
	/>
	<link href="./assets/css/filterlist.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro|Roboto&display=swap" rel="stylesheet">

</head>
<body class="bg-gray-200 col-spam-12 flex flex-col min-h-screen">
	<div class="flex-grow main">
		<div class="px-4 py-4 sticky-top-0 " style="background-color: #312E81;"> <!-- this is top nav bar having sticky top class -->
			<div
					class="md:max-w-6xl md:mx-auto md:flex md:items-center md:justify-between"
				>
					<div class="flex justify-between items-center">
						<img
							src="./assets/images/logo/logo_big.png"
							width="50"
							height="50"
						/>

						<a href="#" class="inline-block py-2 text-white text-xl font-bold">
							Student Incubation Cell</a
						>
						<div class="inline-block cursor-pointer md:hidden">
							<div class="bg-gray-400 w-8 mb-2" style="height: 2px"></div>
							<div class="bg-gray-400 w-8 mb-2" style="height: 2px"></div>
							<div class="bg-gray-400 w-8" style="height: 2px"></div>
						</div>
					</div>

					<div>
						<div class="hidden md:block">
							<a
								href="./index.html"
								class="inline-block py-1 md:py-4 text-gray-500 hover:text-gray-100 mr-6"
								>About Us</a
							>
							<a
								href="./portal.html"
								class="inline-block py-1 md:py-4 text-gray-500 hover:text-gray-100 mr-6"
								>Startup Insights</a
							>
							<a
								href="./magazine.html"
								class="inline-block py-1 md:py-4 text-gray-500 hover:text-gray-100"
								>Magazine</a
							>
						</div>
					</div>
					<div class="hidden md:block">
						<a
							href="#"
							class="inline-block py-1 md:py-4 text-gray-500 hover:text-gray-100 mr-6"
							>Contact Us</a
						>
						<a
							href="#"
							class="inline-block py-2 px-4 text-gray-700 bg-white hover:bg-gray-100 rounded-lg"
							>Login</a
						>
					</div>
				</div>

				<div x-data={show:false}>
				

					<div class="mx-auto md:max-w-6xl md:mx-auto md:flex md:items-center md:justify-between" >
						<button @click="show=!show" type="button" class="inline-block py-1 px-2 text-gray-700 bg-white rounded-lg focus:outline-none hover:text-black hover:ring-2 border-0">Filters <i class="fa fa-filter"></i></button>
						<input type="text" class="flex-grow ml-4 px-1 py-1 mx-auto col-spam-12 rounded ring-2 focus:outline-none" placeholder="Search for Startups..." id="search-filter">
					</div>

					<div x-show="show" class="px-4 py-4 content-evenly" >
						<hr class="solid col-spam-12 mx-auto">
							<div id="filters" class="grid md:grid-cols-3 sm:grid-cols-1" >
								<article class="filter-group">
									<header class="card-header"> 
											<h6 class="title">Domain </h6>
									</header>
									<div class="">
										<div class="grid grid-cols-2 content-between text-sm">
											<label class="inline-flex items-center mt-3">
												<input type="checkbox" class="form-checkbox h-3 w-3 text-blue-600" checked>
												<span class="ml-2 text-grey-700">E-Commerce</span>
											</label>
											<label class="inline-flex items-center mt-3">
												<input type="checkbox" class="form-checkbox h-3 w-3 text-blue-600" checked>
												<span class="ml-2 text-grey-700">Education</span>
											</label>
											<label class="inline-flex items-center mt-3">
												<input type="checkbox" class="form-checkbox h-3 w-3 text-blue-600" checked>
												<span class="ml-2 text-grey-700">Aggriculture</span>
											</label>
											<label class="inline-flex items-center mt-3">
												<input type="checkbox" class="form-checkbox h-3 w-3 text-blue-600" checked>
												<span class="ml-2 text-grey-700">Medicine</span>
											</label>
										</div>
									</div>
								</article>
								<article class="filter-group">
									<header class="card-header"> 
										<h6 class="title">Stage </h6>
									</header>
									<div class="">
										<div class="text-sm grid grid-cols-2 content-between">
											<label class="inline-flex items-center mt-3">
												<input type="checkbox" class="form-checkbox h-3 w-3 text-blue-600" checked>
												<span class="ml-2 text-grey-700">Any</span>
											</label>
											<label class="inline-flex items-center mt-3">
												<input type="checkbox" class="form-checkbox h-3 w-3 text-blue-600" checked>
												<span class="ml-2 text-grey-700">Completed</span>
											</label>
											<label class="inline-flex items-center mt-3">
												<input type="checkbox" class="form-checkbox h-3 w-3 text-blue-600" checked>
												<span class="ml-2 text-grey-700">Processing</span>
											</label>
											<label class="inline-flex items-center mt-3">
												<input type="checkbox" class="form-checkbox h-3 w-3 text-blue-600" checked>
												<span class="ml-2 text-grey-700">Pending</span>
											</label>
										</div>
									</div>
								</article>							
								<article class="filter-group">
									<header class="card-header"> 
										<h6 class="title">Assistance Required </h6>
									</header>
									<div class="">
										<div class="grid grid-cols-2 content-between text-sm">
											<label class="inline-flex items-center mt-3">
												<input type="checkbox" class="form-checkbox h-3 w-3 text-blue-600" checked>
												<span class="ml-2 text-grey-700">less than 1 L &#8377;</span>
											</label>
											<label class="inline-flex items-center mt-3">
												<input type="checkbox" class="form-checkbox h-3 w-3 text-blue-600" checked>
												<span class="ml-2 text-grey-700">1 - 2 L &#8377;</span>
											</label>
											<label class="inline-flex items-center mt-3">
												<input type="checkbox" class="form-checkbox h-3 w-3 text-blue-600" checked>
												<span class="ml-2 text-grey-700">2 - 5 L &#8377;</span>
											</label>
											<label class="inline-flex items-center mt-3">
												<input type="checkbox" class="form-checkbox h-3 w-3 text-blue-600" checked>
												<span class="ml-2 text-grey-700">More than 5 L &#8377;</span>
											</label>
										</div>
									</div>
		
									
								</article>
								<article class="filter-group">
									<header class="card-header"> 
										<h6 class="title"> Year </h6>
									</header>
									<style>
										.top-100 {top: 100%}
										.bottom-100 {bottom: 100%}
										.max-h-select {
											max-height: 300px;
										}
									</style>
									
									<div x-data={fromYearShow:false,toYearShow:false} class="mx-auto grid grid-cols-2 p-2">
											<div class="flex flex-col relative mr-3">
												<label class="text-xs">From</label>
												<div @click="fromYearShow=!fromYearShow,toYearShow=false " class="svelte-1l8159u">
													<div class="my-2 px-1 flex border border-gray-200 bg-white rounded svelte-1l8159u">
														<div class="flex flex-auto flex-wrap">
															<div class="flex-1">
																<input placeholder="Year" class="bg-transparent p-1 px-2 appearance-none outline-none h-full w-full text-gray-800">
															</div>
														</div>
														<div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200 svelte-1l8159u">
															<button class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
																<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up w-4 h-4">
																	<polyline points="18 15 12 9 6 15"></polyline>
																</svg>
															</button>
														</div>
													</div>
												</div>
												<div x-show="fromYearShow" class="absolute shadow top-100 bg-white z-40 w-full lef-0 rounded max-h-select overflow-y-auto svelte-5uyqqj">
													<div class="flex flex-col w-full" id="fromYear">													
													</div>
												</div>
											</div>
											<div class="flex flex-col relative">
												<label class="text-xs">To</label>
												<div @click="toYearShow=!toYearShow,fromYearShow=false" class="svelte-1l8159u">
													<div class="my-2 px-1 flex border border-gray-200 bg-white rounded svelte-1l8159u">
														<div class="flex flex-auto flex-wrap">
															<div class="flex-1">
																<input placeholder="Year" class="bg-transparent p-1 px-2 appearance-none outline-none h-full w-full text-gray-800">
															</div>
														</div>
														<div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200 svelte-1l8159u">
															<button class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
																<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up w-4 h-4">
																	<polyline points="18 15 12 9 6 15"></polyline>
																</svg>
															</button>
														</div>
													</div>
												</div>
												<div x-show="toYearShow" class="absolute shadow top-100 bg-white z-40 w-full lef-0 rounded max-h-select overflow-y-auto svelte-5uyqqj">
													<div class="flex flex-col w-full" id="toYear">													
													</div>
												</div>
											</div>
										
									</div>
								</article>
								<article class="filter-group">
									<header class="card-header"> 
										<h6 class="title"> Team Size </h6>
									</header>
									<div class="filter-content" id="collapse_aside3" style="">
										<div class="card-body content-evenly "> 
											<label class="checkbox-btn"> <input type="checkbox" name="team" onclick="onlyOne(this)" checked> <span class="btn btn-light m1"> Any </span> </label> 
											<label class="checkbox-btn"> <input type="checkbox" name="team" onclick="onlyOne(this)"> <span class="btn btn-light m-1"> 1 - 10 </span> </label>
											<label class="checkbox-btn"> <input type="checkbox" name="team" onclick="onlyOne(this)"> <span class="btn btn-light m-1"> 10 - 25 </span> </label> 
											<label class="checkbox-btn"> <input type="checkbox" name="team" onclick="onlyOne(this)"> <span class="btn btn-light m-1"> 25 - 50 </span> </label> 
											<label class="checkbox-btn"> <input type="checkbox" name="team" onclick="onlyOne(this)"> <span class="btn btn-light m-1"> 50 - 100 </span> </label> 
											<label class="checkbox-btn"> <input type="checkbox" name="team" onclick="onlyOne(this)"> <span class="btn btn-light m-1"> greater than 100 </span> </label> 
										</div>
									</div>
								</article>
								<button class="self-center px-2 py-1 text-grey-700 bg-white bg-red-700 rounded-lg hover:bg-red-600 focus:outline-none">Apply Now</button>
							</div>
							
							
							
						</div>
					</div>

				</div>
		</div>

		<div class="flex p-2">
			<div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-full text-teal-700 border border-red-300 ">
				<div class="text-xs font-normal leading-none max-w-full flex-initial">Filter-3</div>
				<div class="flex flex-auto flex-row-reverse">
					<div>
						<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x cursor-pointer hover:text-red-400 rounded-full w-4 h-4 ml-2">
							<line x1="18" y1="6" x2="6" y2="18"></line>
							<line x1="6" y1="6" x2="18" y2="18"></line>
						</svg>
					</div>
				</div>
				</div>
		<div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-full text-teal-700 border border-red-300 ">
			<div class="text-xs font-normal leading-none max-w-full flex-initial">Filter-3</div>
			<div class="flex flex-auto flex-row-reverse">
				<div>
					<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x cursor-pointer hover:text-red-400 rounded-full w-4 h-4 ml-2">
						<line x1="18" y1="6" x2="6" y2="18"></line>
						<line x1="6" y1="6" x2="18" y2="18"></line>
					</svg>
				</div>
			</div>
			</div>
		<div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-full text-teal-700 border border-red-300 ">
		<div class="text-xs font-normal leading-none max-w-full flex-initial">Filter-3</div>
		<div class="flex flex-auto flex-row-reverse">
			<div>
				<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x cursor-pointer hover:text-red-400 rounded-full w-4 h-4 ml-2">
					<line x1="18" y1="6" x2="6" y2="18"></line>
					<line x1="6" y1="6" x2="18" y2="18"></line>
				</svg>
			</div>
		</div>
		</div>
		</div>
			
		<div class="mx-auto align-middle" id="startups">
			<!-- this area is populated by script at the bottom of this document-->					
		</div>
	
				
	</div>
		
		<!-- end of main content and start of footer -->

	<!-- footer begins here  -->

	<footer class="text-white body-font bg-indigo-900">
		<div
			class="container py-6 mx-auto flex items-center sm:flex-row flex-col"
		>
			<a
				class="flex title-font font-medium items-center md:justify-start justify-center"
			>
				<img src="assets/images/logo/logo_big.png" width="40" height="50" />
				<span class="ml-3 text-xl">Student Incubation Cell</span>
			</a>
			<p
				class="text-sm text-gray-300 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4"
			>
				© 2021 SInC, IIT Delhi
			</p>
			<span
				class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start"
			>
				<a
					class="ml-3 text-gray-300 hover:text-gray-100"
					href="https://www.facebook.com/sinciitd"
				>
					<svg
						fill="currentColor"
						stroke-linecap="round"
						stroke-linejoin="round"
						stroke-width="2"
						class="w-5 h-5"
						viewBox="0 0 24 24"
					>
						<path
							d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"
						></path>
					</svg>
				</a>
				<a
					class="ml-3 text-gray-300 hover:text-gray-100"
					href="https://twitter.com/sinciitd"
				>
					<svg
						fill="currentColor"
						stroke-linecap="round"
						stroke-linejoin="round"
						stroke-width="2"
						class="w-5 h-5"
						viewBox="0 0 24 24"
					>
						<path
							d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"
						></path>
					</svg>
				</a>
				<a
					class="ml-3 text-gray-300 hover:text-gray-100"
					href="https://www.instagram.com/sinciitd/?hl=en"
				>
					<svg
						fill="none"
						stroke="currentColor"
						stroke-linecap="round"
						stroke-linejoin="round"
						stroke-width="2"
						class="w-5 h-5"
						viewBox="0 0 24 24"
					>
						<rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
						<path
							d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"
						></path>
					</svg>
				</a>
				<a
					class="ml-3 text-gray-300 hover:text-gray-100"
					href="https://www.linkedin.com/company/sinciitd/"
				>
					<svg
						fill="currentColor"
						stroke="currentColor"
						stroke-linecap="round"
						stroke-linejoin="round"
						stroke-width="0"
						class="w-5 h-5"
						viewBox="0 0 24 24"
					>
						<path
							stroke="none"
							d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"
						></path>
						<circle cx="4" cy="4" r="2" stroke="none"></circle>
					</svg>
				</a>
			</span>
		</div>
	</footer>

	<script src="./assets/js/filterlist.js">
		// data to be looped through
		
	</script>
</body>
</html>