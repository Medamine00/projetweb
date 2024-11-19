<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <title>Learnify - Learnify HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="C:/xampp/htdocs/Learnify web site/views/Frontend/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="C:/xampp/htdocs/Learnify web site/views/Frontend/lib/animate/animate.min.css" rel="stylesheet">
    <link href="C:/xampp/htdocs/Learnify web site/views/Frontend/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="C:/xampp/htdocs/Learnify web site/views/Frontend/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="C:/xampp/htdocs/Learnify web site/views/Frontend/css/style.css" rel="stylesheet">
    
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>Learnify</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.html" class="nav-item nav-link">Home</a>
                <a href="about.html" class="nav-item nav-link">About</a>
                <a href="courses.html" class="nav-item nav-link active">Courses</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div>
            <a href="" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Courses</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Courses</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Categories Start -->
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Categories</h6>
                <h1 class="mb-5">Courses Categories</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="C:/xampp/htdocs/Learnify web site/views/Frontend/img/cat-1.jpg" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Web Design</h5>
                                    <small class="text-primary">49 Courses</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="C:/xampp/htdocs/Learnify web site/views/Frontend/img/cat-2.jpg" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Graphic Design</h5>
                                    <small class="text-primary">49 Courses</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="C:/xampp/htdocs/Learnify web site/views/Frontend/img/cat-3.jpg" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Video Editing</h5>
                                    <small class="text-primary">49 Courses</small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                    <a class="position-relative d-block h-100 overflow-hidden" href="">
                        <img class="img-fluid position-absolute w-100 h-100" src="C:/xampp/htdocs/Learnify web site/views/Frontend/img/cat-4.jpg" alt="" style="object-fit: cover;">
                        <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin:  1px;">
                            <h5 class="m-0">Online Marketing</h5>
                            <small class="text-primary">49 Courses</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Start -->

              <!-- Course start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
            <h1 class="mb-5">Popular Courses</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <!-- Course start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
            <h1 class="mb-5">Popular Courses</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <!-- Course 1 -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="course-item bg-light">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="C:/xampp/htdocs/Learnify web site/views/Frontend/img/course-1.jpg" alt="">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="course-1-details.html" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;" data-bs-toggle="modal" data-bs-target="#joinNowModal" 
                               data-course-title="Web Design & Development Course for Beginners" 
                               data-tutor="lamis touhami" 
                               data-subject="Web Design" 
                               data-duration="1.49" 
                               data-price="60">Join Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0">60DT</h3>
                        <div class="mb-3">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small>(123)</small>
                        </div>
                        <h5 class="mb-4">Web Design & Development Course for Beginners</h5>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>lamis touhami</small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>1.49 Hrs</small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30 Students</small>
                    </div>
                </div>
            </div>

            <!-- Course 2 -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="course-item bg-light">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="C:/xampp/htdocs/Learnify web site/views/Frontend/img/course-2.jpg" alt="">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="course-2-details.html" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;" data-bs-toggle="modal" data-bs-target="#joinNowModal" 
                               data-course-title="Graphic Design Student"
                               data-tutor="lamis touhami" 
                               data-subject="Graphic Design" 
                               data-duration="2.00" 
                               data-price="70">Join Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0">70DT</h3>
                        <div class="mb-3">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small>(98)</small>
                        </div>
                        <h5 class="mb-4">Graphic Design Student</h5>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>lamis touhami</small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>2.00 Hrs</small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>25 Students</small>
                    </div>
                </div>
            </div>

            <!-- Course 3 -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="course-item bg-light">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid" src="C:/xampp/htdocs/Learnify web site/views/Frontend/img/course-3.jpg" alt="">
                        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                            <a href="course-3-details.html" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                            <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;" data-bs-toggle="modal" data-bs-target="#joinNowModal" 
                               data-course-title="Digital Marketing Strategy"
                               data-tutor="lamis touhami" 
                               data-subject="Digital Marketing" 
                               data-duration="3.00" 
                               data-price="55">Join Now</a>
                        </div>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h3 class="mb-0">55DT</h3>
                        <div class="mb-3">
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small class="fa fa-star text-primary"></small>
                            <small>(110)</small>
                        </div>
                        <h5 class="mb-4">Digital Marketing Strategy</h5>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>lamis touhami</small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>3.00 Hrs</small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>40 Students</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Course end -->

<!-- Modal for Join Now -->
<div class="modal fade" id="joinNowModal" tabindex="-1" aria-labelledby="joinNowModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="joinNowModalLabel">Join the Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="join_course.php" method="POST">
                    <!-- Display Fields for Course Information -->
                    <div class="mb-3">
                        <label for="courseName" class="form-label">Course Name</label>
                        <input type="text" class="form-control" id="courseName" name="course_title" value="" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tutorName" class="form-label">Tutor Name</label>
                        <input type="text" class="form-control" id="tutorName" name="tutor_name" value="" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" value="" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration</label>
                        <input type="text" class="form-control" id="duration" name="duration" value="" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="" readonly>
                    </div>
                    
                    <!-- Hidden Field for Status -->
                    <input type="hidden" name="status" id="hiddenStatus" value="Pending">
                    
                    <!-- User Information Fields -->
                    <div class="mb-3">
                        <label for="etudiant_name" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="etudiant_name" name="etudiant_name" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label for="etudiant_email" class="form-label">Your Email Address</label>
                        <input type="etudiant_email" class="form-control" id="etudiant_email" name="etudiant_email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="etudiant_phone" class="form-label">Your Phone Number</label>
                        <input type="etudiant_tel" class="form-control" id="etudiant_phone" name="etudiant_phone" placeholder="Enter your phone number" required>
                    </div>
                    <a href="listcourses.php">payment</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Populate the modal with course details when the "Join Now" button is clicked
    document.querySelectorAll('[data-bs-target="#joinNowModal"]').forEach(button => {
        button.addEventListener('click', function () {
            // Get course details from button attributes
            const courseTitle = this.getAttribute('data-course-title');
            const tutorName = this.getAttribute('data-tutor');
            const subject = this.getAttribute('data-subject');
            const duration = this.getAttribute('data-duration');
            const price = this.getAttribute('data-price');

            // Set the values in the form fields
            document.getElementById('courseName').value = courseTitle;
            document.getElementById('tutorName').value = tutorName;
            document.getElementById('subject').value = subject;
            document.getElementById('duration').value = duration;
            document.getElementById('price').value = price;

            // Set the hidden status value
            document.getElementById('hiddenStatus').value = "Pending";
        });
    });
</script>


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
                <h1 class="mb-5">Our Students Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="C:/xampp/htdocs/Learnify web site/views/Frontend/img/testimonial-1.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Med Amin Hammemi	</h5>
                    <p> Computer Science Student</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">This website has allowed me to access high-quality courses at my own pace. The content is well-organized, and the instructors are always available to answer my questions. I’ve truly been able to improve my programming skills.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="C:/xampp/htdocs/Learnify web site/views/Frontend/img/testimonial-2.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Rayen Jarrey</h5>
                    <p>Digital Marketing Student</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">The interactive modules and quizzes helped me understand concepts clearly. It's motivating to learn in such an engaging environment. I highly recommend this site to anyone looking to learn effectively online.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="C:/xampp/htdocs/Learnify web site/views/Frontend/img/testimonial-3.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Adem Bennour</h5>
                    <p>Graphic Design Student</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">This site has transformed the way I learn. The resources are excellent, and the practical exercises are preparing me well for the job market. It’s exactly what I needed to feel career-ready.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="C:/xampp/htdocs/Learnify web site/views/Frontend/img/testimonial-4.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Amin kachouty</h5>
                    <p>Business Administration Student</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">The learning experience on this platform is amazing! The courses are structured well, and I feel that I am acquiring real-world skills. The convenience of studying online has been a game-changer for me.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
        

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">FAQs & Help</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Esprit</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+216 22 145 236</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@Learnify.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Gallery</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="C:/xampp/htdocs/Learnify web site/views/Frontend/img/course-1.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="C:/xampp/htdocs/Learnify web site/views/Frontend/img/course-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="C:/xampp/htdocs/Learnify web site/views/Frontend/img/course-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="C:/xampp/htdocs/Learnify web site/views/Frontend/img/course-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="C:/xampp/htdocs/Learnify web site/views/Frontend/img/course-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="C:/xampp/htdocs/Learnify web site/views/Frontend/img/course-1.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Comments</h4>
                    <p></p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <!-- Email Input -->
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="email" id="emailInput" placeholder="Your email" required>
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2" data-bs-toggle="modal" data-bs-target="#commentModal" onclick="validateEmail()">SignUp</button>
                    </div>
                </div>
                <!-- Modal for Comment Input -->
<div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="commentModalLabel">Leave Your Comments</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="commentForm">
                    <!-- Hidden email field to store the entered email -->
                    <input type="hidden" id="hiddenEmail">
                    
                    <div class="mb-3">
                        <label for="comment" class="form-label">Your Comment</label>
                        <textarea class="form-control" id="comment" rows="3" placeholder="Enter your comment"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit Comment</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    // Function to save the email input and show it in the modal
    function saveEmail() {
        // Get the email from the input field
        const email = document.getElementById("emailInput").value;
        
        // Store the email in the hidden field (optional, if you want to pass it to the backend later)
        document.getElementById("hiddenEmail").value = email;
        
        // You can also display the email inside the modal if needed
        // Example: document.getElementById("modalEmail").innerText = email;
    }

    // Optionally handle the form submission here to process the comments
    document.getElementById("commentForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent default form submission

        const comment = document.getElementById("comment").value;
        const email = document.getElementById("hiddenEmail").value;

        // Process the comment and email (send to server or handle locally)
        console.log("Email: " + email);
        console.log("Comment: " + comment);

        // After submission, you can close the modal or reset the form
        alert("Comment submitted successfully!");

        // Optionally reset the form
        document.getElementById("commentForm").reset();
    });
</script>

            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Learnify</a>, All Right Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">Web_Stars</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="C:/xampp/htdocs/Learnify web site/views/Frontend/lib/wow/wow.min.js"></script>
    <script src="C:/xampp/htdocs/Learnify web site/views/Frontend/lib/easing/easing.min.js"></script>
    <script src="C:/xampp/htdocs/Learnify web site/views/Frontend/lib/waypoints/waypoints.min.js"></script>
    <script src="C:/xampp/htdocs/Learnify web site/views/Frontend/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="C:/xampp/htdocs/Learnify web site/views/Frontend/js/main.js"></script>
</body>

</html>