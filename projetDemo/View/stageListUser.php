<?php
session_start();
if (!isset($_SESSION['user_id']) || ($_SESSION['role'] === 'manager_des_stages' || $_SESSION['role'] === 'admin')) {
    header('Location: login.php?error=unauthorized');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Learnify - Learnify HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
     <!-- Add Leaflet CSS -->
     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .location-container {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }
        
        .map-popup {
            display: none;
            position: absolute;
            top: -320px; /* Position above the location text */
            left: 50%;
            transform: translateX(-50%);
            width: 400px;
            height: 300px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            z-index: 1000;
        }
        
        .location-container:hover .map-popup {
        display: block;
    }
    
    .map-popup:hover {
        display: block;
    }

    .map-container {
        width: 110%;
        height: 110%;
        border-radius: 8px;}
        .course-item {
    transition: transform 0.3s ease;
}

.course-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}
    </style>
    <style>
        .video-icon {
            position: absolute;
            top: 10px;
            left: 10px;
            cursor: pointer;
            background-color: rgba(255,255,255,0.7);
            border-radius: 50%;
            padding: 5px;
            z-index: 10;
            transition: transform 0.3s ease;
        }

        .video-icon:hover {
            transform: scale(1.2);
        }

        .video-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.8);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .video-modal-content {
            max-width: 800px;
            width: 90%;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            position: relative;
        }

        .video-modal-close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            cursor: pointer;
        }
    </style>
    
</head>

<body>
    <!-- Spinner Start -->

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
            <a href="LearnifyFront/Learnify-html-template/front.php" class="nav-item nav-link">Acceuil</a>
            <a href="stageListUser.php" class="nav-item nav-link active">Internships</a>
            <a href="../views/front/listpoint.php" class="nav-item nav-link ">Notes </a>
                <a href="../views/front/listQuizz.php" class="nav-item nav-link">Quizz</a>
                <a href="../views/front/course_front.php" class="nav-item nav-link ">Courses</a>
                <a href="../front office/elearning-html-template/formations.php" class="nav-item nav-link  ">Training</a>

            </div>
            <!-- User Info Section -->
            <div class="dropdown">
                <button class="btn btn-primary py-2 px-4 dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user me-2"></i><?php echo htmlspecialchars($_SESSION['user_name']); ?>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="../Controller/UserController.php?action=logout">Logout</a></li>
                    <li><a class="dropdown-item" href="LearnifyFront/Learnify-html-template/profil.php">Profile</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

     <!-- Internships Start -->
     <div id="videoModal" class="video-modal">
        <div class="video-modal-content">
            <span class="video-modal-close">&times;</span>
            <h4 id="videoModalTitle">Internship Overview</h4>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe id="videoModalFrame" width="560" height="315" src="" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
     <<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Internships</h6>
            <h1 class="mb-5">Available Internships</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <!-- Internship 1 -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="course-item bg-light position-relative">
                    <!-- Video Icon -->
                    <div class="video-icon" 
                    data-video-url="https://www.youtube.com/embed/nu_pCVPKzTk"
                         data-title="Web Development Internship Overview">
                        <i class="fas fa-video text-primary"></i>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h5 class="mb-4">Web Development Intern</h5>
                        <p><strong>Duration:</strong> 6 months</p>
                        <p><strong>Expertise:</strong> HTML, CSS, JavaScript</p>
                        <div class="location-container">
                            <p><strong>Location:</strong> New York, USA</p>
                            <div class="map-popup">
                                <div id="map1" class="map-container"></div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex border-top">
                        <button class="flex-fill text-center py-2 btn btn-sm btn-primary" 
                                onclick="openApplicationModal('Web Development Intern', 1)">Apply Now</button>
                    </div>
                </div>
            </div>

            <!-- Internship 2 -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="course-item bg-light position-relative">
                    <!-- Video Icon -->
                    <div class="video-icon" 
                         data-video-url="https://www.youtube.com/embed/YqQx75OPRa0"
                         data-title="Graphic Design Internship Overview">
                        <i class="fas fa-video text-primary"></i>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h5 class="mb-4">Graphic Design Intern</h5>
                        <p><strong>Duration:</strong> 3 months</p>
                        <p><strong>Expertise:</strong> Adobe Photoshop, Illustrator</p>
                        <div class="location-container">
                            <p><strong>Location:</strong> France</p>
                            <div class="map-popup">
                                <div id="map2" class="map-container"></div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex border-top">
                        <button class="flex-fill text-center py-2 btn btn-sm btn-primary" 
                                onclick="openApplicationModal('Graphic Design Intern', 2)">Apply Now</button>
                    </div>
                </div>
            </div>

            <!-- Internship 3 -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="course-item bg-light position-relative">
                    <!-- Video Icon -->
                    <div class="video-icon" 
                         data-video-url="https://www.youtube.com/embed/0jbngFWe9RE"
                         data-title="Marketing Internship Overview">
                        <i class="fas fa-video text-primary"></i>
                    </div>
                    <div class="text-center p-4 pb-0">
                        <h5 class="mb-4">Marketing Intern</h5>
                        <p><strong>Duration:</strong> 4 months</p>
                        <p><strong>Expertise:</strong> Digital Marketing, SEO</p>
                        <div class="location-container">
                            <p><strong>Location:</strong> Turkey</p>
                            <div class="map-popup">
                                <div id="map3" class="map-container"></div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex border-top">
                        <button class="flex-fill text-center py-2 btn btn-sm btn-primary" 
                                onclick="openApplicationModal('Marketing Intern', 3)">Apply Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Internships End -->
    
     <!-- Application Modal -->
     <div class="modal fade" id="applicationModal" tabindex="-1" aria-labelledby="applicationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="applicationModalLabel">Apply for <span id="internshipTitle"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="applicationForm" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="firstName" class="form-label required">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" required>
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label required">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label required">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label required">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="education" class="form-label required">Highest Education</label>
                            <select class="form-select" id="education" name="education" required>
                                <option value="">Select Education Level</option>
                                <option value="high_school">High School</option>
                                <option value="bachelors">Bachelor's Degree</option>
                                <option value="masters">Master's Degree</option>
                                <option value="phd">Ph.D.</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="resume" class="form-label required">Resume/CV (PDF only)</label>
                            <input type="file" class="form-control" id="resume" name="resume" accept=".pdf" required>
                        </div>
                        <div class="mb-3">
                            <label for="coverLetter" class="form-label">Cover Letter</label>
                            <textarea class="form-control" id="coverLetter" name="coverLetter" rows="4"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="submitApplication()">Submit Application</button>
                </div>
            </div>
        </div>
    </div>
     <!-- JavaScript -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
let currentInternshipId = null;

function submitApplication() {
    const form = document.getElementById('applicationForm');
    
    // Debugging: Log the current internship ID
    console.log('Current Internship ID:', currentInternshipId);
    
    // Check if internship ID is null or not a valid number
    if (currentInternshipId === null || ![1, 2, 3].includes(currentInternshipId)) {
        alert('Please select a valid internship before applying');
        return;
    }

    // Validate the form
    if (form.checkValidity()) {
        const formData = new FormData(form);
        
        // Append the internship ID to the FormData
        formData.append('action', 'submit_application');
        formData.append('internship_id', currentInternshipId);
        
        // Submit the form data via fetch
        fetch('./InternshipManager.php', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Response data:', data);
            if (data.success) {
                alert('Application submitted successfully!');
                bootstrap.Modal.getInstance(document.getElementById('applicationModal')).hide();
                form.reset();
                currentInternshipId = null;
            } else {
                alert(data.message || 'Error submitting application');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error submitting application. Please try again later.');
        });
    } else {
        form.reportValidity();
    }
}

function openApplicationModal(title, internshipId) {
    // Ensure internshipId is an integer
    currentInternshipId = parseInt(internshipId);
    
    // Set internship title in the modal
    document.getElementById('internshipTitle').textContent = title;
    
    // Open the modal
    var modal = new bootstrap.Modal(document.getElementById('applicationModal'));
    modal.show();
}
    </script>

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
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
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
                            <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
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
    <!-- Add Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    
    <!-- Update the JavaScript section -->
<script>
    let maps = {
        map1: null,
        map2: null,
        map3: null
    };
    
    const mapCoordinates = {
        map1: [40.7128, -74.0060], // New York
        map2: [48.8566, 2.3522],   // Paris
        map3: [41.0082, 28.9784]   // Istanbul
    };
    
    const mapLabels = {
        map1: 'New York Office',
        map2: 'Paris Office',
        map3: 'Istanbul Office'
    };

    // Initialize maps when hovering
    document.querySelectorAll('.location-container').forEach((container, index) => {
        const mapId = `map${index + 1}`;
        const mapPopup = container.querySelector('.map-popup');
        
        container.addEventListener('mouseenter', function() {
            if (!maps[mapId]) {
                setTimeout(() => {
                    const coords = mapCoordinates[mapId];
                    maps[mapId] = L.map(mapId).setView(coords, 13);
                    
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(maps[mapId]);
                    
                    L.marker(coords).addTo(maps[mapId])
                        .bindPopup(mapLabels[mapId])
                        .openPopup();
                }, 100);
            }
        });

        container.addEventListener('mouseleave', function(e) {
            const toElement = e.relatedTarget;
            if (!mapPopup.contains(toElement)) {
                if (maps[mapId]) {
                    maps[mapId].remove();
                    maps[mapId] = null;
                }
            }
        });

        mapPopup.addEventListener('mouseleave', function(e) {
            const toElement = e.relatedTarget;
            if (!container.contains(toElement)) {
                if (maps[mapId]) {
                    maps[mapId].remove();
                    maps[mapId] = null;
                }
            }
        });
    });
</script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    


    <script>
        // Video Modal Functionality
        document.addEventListener('DOMContentLoaded', function() {
            const videoModal = document.getElementById('videoModal');
            const videoModalFrame = document.getElementById('videoModalFrame');
            const videoModalClose = document.querySelector('.video-modal-close');

            // Function to open video modal
            function openVideoModal(videoUrl, title) {
                videoModalFrame.src = videoUrl;
                document.getElementById('videoModalTitle').textContent = title;
                videoModal.style.display = 'flex';
            }

            // Function to close video modal
            function closeVideoModal() {
                videoModalFrame.src = ''; // Stop video
                videoModal.style.display = 'none';
            }

            // Add click event to video icons (you'll dynamically generate these)
            const videoIcons = document.querySelectorAll('.video-icon');
            videoIcons.forEach(icon => {
                icon.addEventListener('click', function() {
                    const videoUrl = this.getAttribute('data-video-url');
                    const internshipTitle = this.getAttribute('data-title');
                    openVideoModal(videoUrl, internshipTitle);
                });
            });

            // Close modal when clicking close button or outside the modal
            videoModalClose.addEventListener('click', closeVideoModal);
            videoModal.addEventListener('click', function(e) {
                if (e.target === videoModal) {
                    closeVideoModal();
                }
            });
        });
    </script>
        <script src="js/main.js"></script>
    <script>
        window.embeddedChatbotConfig = {
        chatbotId: "O6Os6sDN5zXDJG98InQ0v",
        domain: "www.chatbase.co"
        }
    </script>
    <script
        src="https://www.chatbase.co/embed.min.js"
        chatbotId="O6Os6sDN5zXDJG98InQ0v"
        domain="www.chatbase.co"
        defer>
    </script>
</body>

</html>
