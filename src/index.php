<?php
include 'admin/conn.php';
?>


<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./output.css" rel="stylesheet">
</head>
<body>
    <!--Nav-->
    <nav class="bg-gray-900 py-2.5 border-gray-200">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
        <a href="index.html" class="flex items-center"><span class="self-center text-xl font-semibold text-white whitespace-nowrap">Portfolio</span></a>
        <div class="flex items-center lg:order-2">
            <div class="hidden mt-2 mr-2 sm:inline-block">
                <span></span>
            </div>
            <button id="mobile-menu-button" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none">
                <span class="sr-only">Open Main Menu</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                </svg>                          
            </button>
        </div>
        <div id="mobile-menu" class="items-center justify-between w-full lg:flex lg:w-auto lg:order-1 hidden">
            <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                <li class="block py-2 pl-3 pr-4 text-gray-400 border-b border-gray-100 lg:border-0 lg:hover:text-gray-gray-700 lg:p-0">
                    <a href="#">Home</a>
                </li>
                <li class="block py-2 pl-3 pr-4 text-gray-400 border-b border-gray-100 lg:border-0 lg:hover:text-gray-gray-700 lg:p-0">
                    <a href="#clients">Clients</a>
                </li>
                <li class="block py-2 pl-3 pr-4 text-gray-400 border-b border-gray-100 lg:border-0 lg:hover:text-gray-gray-700 lg:p-0">
                    <a href="#about">About</a>
                </li>
                <li class="block py-2 pl-3 pr-4 text-gray-400 border-b border-gray-100 lg:border-0 lg:hover:text-gray-gray-700 lg:p-0">
                    <a href="#services">Services</a>
                </li>
                <li class="block py-2 pl-3 pr-4 text-gray-400 border-b border-gray-100 lg:border-0 lg:hover:text-gray-gray-700 lg:p-0">
                    <a href="#projects">Projects</a>
                </li>
                <li class="block py-2 pl-3 pr-4 text-gray-400 border-b border-gray-100 lg:border-0 lg:hover:text-gray-gray-700 lg:p-0">
                    <a href="#contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>


    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <!--Nav ends-->
    <!--Hero section-->
    <div class="main bg-gray-100" id="home">
    <div class="container mx-auto px-4">
    <div class="flex flex-col md:flex-row justify-center items-center py-4 lg:py-2.5 border-gray-200">
    <div class="flex flex-col justify-center items-center md:mr-8">
        <div class="flex flex-col pt-8 text-center">
            <div class="text-2xl font-semibold text-slate-700">
                Arturo Lora
            </div>
            <div class="pt-8 text-5xl font-bold text-slate-900">
                Web Developer
            </div>
            <div class="flex justify-center mt-5 font-semibold text-white text-lg py-4 bg-amber-500 rounded-md">
                <a href="https://docs.google.com/document/d/1A5BypHTH-x6bZmDfAivHlTJ09Toqx6L9u-6KFZsrwh8/edit?usp=sharing">Download CV</a>
            </div>
        </div>
    </div>
    <div class="w-full md:w-auto flex justify-center items-center">
        <img src="../images/profile.png" alt="profile" class="max-w-full">
    </div>
</div>

    </div>
</div>

    <!--Hero section ends-->
    <!--About section-->
    <section id="about">
        <div class="container max-w-xl p-6 mx-auto space-y-12 lg:px-8 lg:max-w-7xl">
            <div>
                <h2 class="text-7xl font-bold text-center sm:text-5xl">About me</h2>
                <p class="max-w-3xl mx-auto mt-4 text-xl text-center">Web Developer, content editor, and account manager. Actively contributing to the field of web development, bringing a diverse skill set and a commitment to delivering exceptional user experiences.</p>
            </div> 
            <div class="grid lg:grid-cols-2 lg:gap-8 lg:items-center w-full max-w-full p-4 mx-auto">
                <div class="w-full max-w-full mx-auto p-4">
                    <div class="flex border-b border-amber-400">
                        <button class="w-1/2 py-4 text-center font-medium text-gray-700 bg-amber-400 rounded-tl-lg focus:outline-none active:bg-gray-200" onclick="openTab(event, 'tab1')">Education</button>
                        <button class="w-1/2 py-4 text-center font-medium text-gray-700 rounded-tl-lg focus:outline-none"  onclick="openTab(event, 'tab2')">Experience</button>
                    </div>
                    <div id="tab1" class="tabcontent p-4">
                        <h1 class="text-lg font-bold text-gray-800">Education</h1>
                        <ul class="bg-white shadow overflow-hidden sm:rounded-md max-w-sm mx-auto mt-16">
                            <?php
                            $education_query = "SELECT * FROM education";
                            $education_result = $conn->query($education_query);
                            
                            if ($education_result->num_rows > 0) {
                                while($row = $education_result->fetch_assoc()) {
                                    echo "<li >
                                            <div class='px-4 py-5 sm:px-6'>
                                                <div class='flex items-center justify-between'>
                                                    <h3 class='text-lg leading-6 text-gray-500'>" . $row["name"] . "</h3>
                                                    <p class='mt-1 max-w-2xl text-sm text-gray-500'>" . $row["level"] . "</p>
                                                </div>
                                            </div>
                                        </li>";
                                }
                            } else {
                                echo "No education data available.";
                            }
                            ?>
                        </ul>
                    </div>
                    <div id="tab2" class="tabcontent p-4 hidden">
                        <h1 class="text-lg font-bold text-gray-800">Experience</h1>
                        <ul class="bg-white shadow overflow-hidden sm:rounded-md max-w-sm mx-auto mt-16">
                            <?php
                            $experience_query = "SELECT * FROM experience";
                            $experience_result = $conn->query($experience_query);
                            
                            if ($experience_result->num_rows > 0) {
                                while($row = $experience_result->fetch_assoc()) {
                                    echo "<li >
                                            <div class='px-4 py-5 sm:px-6'>
                                                <div class='flex items-center justify-between'>
                                                    <h3 class='text-lg leading-6 font-medium text-gray-900'>" . $row["name"] . "</h3>
                                                    <p class='mt-1 max-w-2xl text-gray-500'>" . $row["duration"] . "</p>
                                                </div>
                                            </div>
                                        </li>";
                                }
                            } else {
                                echo "No experience data available";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <!-- Tab Script -->
                <script>
                    function openTab(evt, tabName){
                        var i, tabcontent, tablinks;
                        tabcontent = document.getElementsByClassName("tabcontent");
                        for (i = 0; i < tabcontent.length; i++){
                            tabcontent[i].classList.add("hidden");
                        }
                        tablinks = document.getElementsByTagName("button");
                        for (i = 0; i < tablinks.length; i++){
                            tablinks[i].classList.remove("active:bg-gray-200");
                        }
                        document.getElementById(tabName).classList.remove("hidden");
                        evt.currentTarget.classList.add("active:bg-gray-200");
                    }
                </script>
                <!-- Tab Script ends-->
                <div>
    <div class="max-w-xl mx-auto p-4 mt-16">
        <h4 class="text-3xl md:text-5xl text-slate-700 font-bold mb-6">Skills</h4>
    </div>
    <div class="mb-7">
        <?php

        $sql = "SELECT * FROM skills";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="flex justify-between py-1">
                    <span class="text-base text-gray-400 font-semibold"><?php echo $row['name']; ?></span>
                    <span class="text-base text-gray-400 pr-5 font-semibold"><?php echo $row['level']; ?></span>
                </div>
                <svg class="rc-progress-line" viewBox="0 0 100 1" preserveAspectRatio="none">
                    <path class="rc-progress-line-trail" d="M 0.5,0.5 L 99.5,0.5" stroke-linecap="round" stroke="#D9D9D9" stroke-width="1" fill-opacity="0"></path>
                    <path class="rc-progress-line-trail" d="M 0.5,0.5 L 99.5,0.5" stroke-linecap="round" stroke="#FF6464" stroke-width="1" fill-opacity="0"
                        style="stroke-dasharray: <?php echo $row['experience']; ?>%, 100%; stroke-dashoffset: 0px; transition: stroke-dashoffset 0.3s ease 0s, stroke-dasharray 0.3s linear 0s, 0.06s;">
                    </path>
                </svg>
            <?php
            }
        } else {
            echo "No skill data available.";
        }

        ?>
    </div>
</div>

            </div>
        </div>
    </section> 
    <!--About section ends-->
    <!--Clients Section-->
    <section id="clients">
    <div class="container max-w-7xl mx-auto px-4 lg:px-8 py-12 space-y-12">
        <div>
            <h2 class="text-7xl font-bold text-center sm:text-5xl">Clients</h2>
            <!-- <p class="max-w-3xl mx-auto mt-4 text-xl text-center">Here are my clients over the years in numbers</p> -->
        </div>
        <div class="grid lg:gap-8 lg:grid-cols-2 lg:items-center">
            <!-- First column -->
            <div>
                <?php
                $clients_query = "SELECT * FROM clients";
                $clients_result = $conn->query($clients_query);
                
                if ($clients_result->num_rows > 0) {
                    while($row = $clients_result->fetch_assoc()) {
                        echo "<div class='mt-4 space-y-12'>";
                        echo "<div class='flex'>";
                        echo "<div class='flex-shrink-0'>";
                        echo "<div class='flex items-center justify-center w-12 h-12 rounded-md bg-amber-400'>";
                        // SVG icon for the client
                        echo "</div>";
                        echo "</div>";
                        echo "<div class='ml-4'>";
                        // Client name
                        echo "<h1 class='text-lg font-medium leading'>Client Name: " . $row["name"] . "</h1>";
                        // Other client details
                        echo "<p class='mt-2'>Project: " . $row["projectName"] . "</p>";
                        echo "<p class='mt-2'>End Date: " . $row["endDate"] . "</p>";
                        echo "<p class='mt-2'>Comments: " . $row["comments"] . "</p>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "No client data available.";
                }
                ?>
            </div>
            <!-- Second column -->
            <div class="mt-10 lg:mt-0">
                <img src="../images/clients.jpg" alt="clients" class="mx-auto rounded-lg shadow-lg">
            </div>
        </div>
    </div>
</section>
    <!--Clients Section ends-->
    <!-- Services Section-->
    <section id="services">
    <div class="bg-gray-100 min-h-screen p-4">
        <div class="container mx-auto pt-12 pb-20">
            <h1 class="text-4xl font-bold text-gray-800 text-center mb-8">My Services</h1>
            <!-- <p class="text-gray-700 text-lg text-center mb-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p> -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <?php
                $services_query = "SELECT * FROM services";
                $services_result = $conn->query($services_query);
                if ($services_result->num_rows > 0) {
                    while($row = $services_result->fetch_assoc()) {
                        echo '<div class="bg-white rounded-md shadow-sm p-8">';
                        echo '<h1 class="text-xl font-bold text-gray-800 mb-4">' . $row["name"] . '</h1>';
                        echo '<div class="flex space-x-2 items-center px-4 py-2 font-bold">';
                        echo '<div class="text-md">Starting from</div>';
                        echo '<div class="text-lg text-amber-400 font-bold">' . $row["price"] . '</div>';
                        echo '</div>';
                        echo '<p>' . $row["description"] . '</p>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No services data available.</p>';
                }
                ?>
            </div>
        </div>
    </div>
</section>
    <!-- Services Section ends-->
    <!-- Project Section -->
    <section id="projects">
    <div class="p-5 sm:p-8">
        <h1 class="text-4xl font-bold text-gray-800 text-center mb-8">My Projects</h1>
        <!-- <p class="text-gray-700 text-lg text-center mb-12">Vulputate dictumst eleifend massa ornare mi himenaeos netus dictum ut tempor</p> -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 sm:gap-8">
            <?php
            $projects_query = "SELECT * FROM projects";
            $projects_result = $conn->query($projects_query);
            if ($projects_result->num_rows > 0) {
                while($row = $projects_result->fetch_assoc()) {
                    echo '<img src="../images/' . $row["img"] . '" alt="' . $row["name"] . '" class="w-full h-auto object-contain">';
                }
            } else {
                echo '<p>No projects available.</p>';
            }
            ?>
        </div>
    </div>
</section>
    <!-- Project Section ends-->
    <!-- Contact section -->
    <section class="relative bg-gray-900 text-gray-400" id="contact">
    <div class="container mx-auto px-5 py-24">
        <div class="mb-12 flex w-full flex-col text-center">
            <h1 class="mb-4 text-2xl font-medium text-white sm:text-3xl">Contact me</h1>
            <p class="mx-auto text-base leading-relaxed lg:w-2/3">Feel free to reach out to me, whether you have a question, feedback, or a collaboration!</p>
        </div>
        <div class="mx-auto md:w-2/3 lg:w-1/2">
            <form id="contactForm" method="post">
                <div class="-m-2 flex flex-wrap">
                    <div class="w-1/2 p-2">
                        <div class="relative">
                            <input type="text" id="name" placeholder="Name" class="peer w-full rounded border-amber-400 bg-gray-800 opacity-40 py-1 px-3 text-base leading-8 text-gray-100 placeholder-transparent outline-none transition-color duration-200 ease-in-out focus:bg-gray-900 focus:ring-2 focus:ring-indigo-900">
                            <label for="name" class="absolute left-3 -top-6 bg-transparent text-sm leading-7 text-indigo-500 transition-all peer-placeholder-shown:left-3 peer-placeholder-shown:top-2 peer-placeholder-shown:bg-gray-900 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:left-3 peer-focus:-top-6 peer-focus:text-sm peer-focus:text-amber-500">Name</label>
                        </div>
                    </div>
                    <div class="w-1/2 p-2">
                        <div class="relative">
                            <input type="text" id="email" placeholder="Email"  class="peer w-full rounded border-amber-400 bg-gray-800 opacity-40 py-1 px-3 text-base leading-8 text-gray-100 placeholder-transparent outline-none transition-color duration-200 ease-in-out focus:bg-gray-900 focus:ring-2 focus:ring-indigo-900">
                            <label for="email" class="absolute left-3 -top-6 bg-transparent text-sm leading-7 text-indigo-500 transition-all peer-placeholder-shown:left-3 peer-placeholder-shown:top-2 peer-placeholder-shown:bg-gray-900 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:left-3 peer-focus:-top-6 peer-focus:text-sm peer-focus:text-amber-500">Email</label>
                        </div>
                    </div>
                    <div class="mt-4 w-full p-2">
                        <div class="relative">
                            <textarea id="message" placeholder="Message" class="peer h-32 w-full resize-none rounded border-amber-400 bg-gray-800 opacity-40 py-1 px-3 text-base leading-8 text-gray-100 placeholder-transparent outline-none transition-color duration-200 ease-in-out focus:bg-gray-900 focus:ring-2 focus:ring-indigo-900"></textarea>
                            <label for="message" class="absolute left-3 -top-6 bg-transparent text-sm leading-7 text-indigo-500 transition-all peer-placeholder-shown:left-3 peer-placeholder-shown:top-2 peer-placeholder-shown:bg-gray-900 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:left-3 peer-focus:-top-6 peer-focus:text-sm peer-focus:text-amber-500">Message</label>
                        </div>
                    </div>
                    <div class="w-full p-2">
                        <button type="button" id="submitBtn" class="mx-auto flex rounded border-0 bg-amber-400 py-2 px-8 text-lg text-white hover:bg-amber-600 focus:outline-none">Submit</button>
                    </div>
                </div>
            </form>
            <!-- Footer -->
            <div class="mt-8 w-full border-t border-gray-800 p-2 pt-8 text-center">
                <a href="#" class="text-indigo-400">arturolorabaritone@gmail.com</a>
                <p class="my-5 leading-normal">Tepic, Nayarit.</p>
                <span class="inline-flex">
                    <!-- Add your social icons here -->
                </span>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('submitBtn').addEventListener('click', function(event) {
        event.preventDefault();
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const message = document.getElementById('message').value;

        const xhr = new XMLHttpRequest();
        xhr.open('POST', './admin/process_form.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                alert(xhr.responseText);
            } else {
                alert('Error: ' + xhr.status); 
            }
        };
        xhr.send('name=' + name + '&email=' + email + '&message=' + message);
    });
</script>
on end -->
</body>
</html>