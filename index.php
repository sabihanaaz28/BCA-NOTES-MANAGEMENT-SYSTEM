<?php 
include 'backend/conn.php'; 
session_start(); 

mysqli_report(MYSQLI_REPORT_OFF);

$success = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = trim($_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email address.";
    } else {
        $stmt = mysqli_prepare($conn, "INSERT INTO emails (email) VALUES (?)");
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $email);

            if (mysqli_stmt_execute($stmt)) {
                $success = true;
            } else {
                if (mysqli_errno($conn) == 1062) {
                    $success = true;
                } else {
                    $error = "Database error.";
                }
            }
            mysqli_stmt_close($stmt);
        }
    }
}

mysqli_close($conn);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BCA Notes Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="index.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <nav
      class="navbar navbar-expand-lg bg-body-tertiary sticky-top navbarContent" >
      <div class="container-fluid">
        <div class="logo">
          <img src="images/sy.png" alt="logo">
        </div>

        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse navbarCollapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a href="bcaNotes/bcaAll.php" class="nav-link active navLink">BCA</a>
            </li>
             <li class="nav-item">
              <a href="language/programAll.php" class="nav-link active navLink">Programs</a>
            </li>
             <li class="nav-item">
              <a href="bca exam paper/bcaExam.php" class="nav-link active navLink">BCA Exam Papers</a>
            </li>
             <li class="nav-item">
              <a href="http://msuresults.com/" class="nav-link active navLink">Result</a>
               </li>
               <li class="nav-item">
              <a href="career/career.php" class="nav-link active navLink">Career</a>
            </li>
            <li class="nav-item">
              <a href="about/about.php" class="nav-link active navLink">About</a>
            </li>
            <li class="nav-item">
              <a href="feedback.php" class="nav-link active navLink">Feedback</a>
            </li>
            <li class="nav-item">
              <a href="login.php" class="nav-link active navLink">Login</a>
            </li>           
          </ul>
        </div>
      </div>
    </nav>
    <section class="py-5 mainContent">
      <div class="container text-center">
        <div class="mb-4">
          <h1 class="fw-bold">BCA Notes Management System</h1>
        </div>
        <div class="mb-4">
          <p class="lead">
            Learn and manage your BCA notes efficiently with the help of our
            platform. This system is designed for students to access, organize,
            and download study materials easily. It is a non-profitable platform
            where BCA students can study freely without any advertisements.
          </p>
        </div>
        <div class="row justify-content-center mb-5">
          <div class="col-12 col-md-8 col-lg-6">
            <form>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Working on Search"/>
                <button class="btn btn-primary" type="submit" onclick="alert('We are currently working on search button.')">
                  Search
                </button>
              </div>
            </form>
          </div>
        </div>
        <h2 class="mb-4 fw-semibold">SYDreamStudy Highlights</h2>
        <div class="row g-3 justify-content-center">
          <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <a href="https://www-w3schools-com.translate.goog/c/?_x_tr_sl=en&_x_tr_tl=hi&_x_tr_hl=hi&_x_tr_pto=tc" class="btn btn-outline-primary w-100">Learn C</a>
          </div>
          <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <a
              href="https://www.geeksforgeeks.org/cpp-tutorial/" class="btn btn-outline-primary w-100" >Learn C++</a>
          </div>
          <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <a href="https://www.w3schools.com/html/"class="btn btn-outline-primary w-100">Learn HTML</a>
          </div>
          <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <a href="https://www.w3schools.com/css/" class="btn btn-outline-primary w-100" >Learn CSS</a>
          </div>
          <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <a href="https://www.w3schools.com/js/" class="btn btn-outline-primary w-100">Learn JS</a >
          </div>
          <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <a href="https://www.w3schools.com/python/" class="btn btn-outline-primary w-100">Learn Python</a>
          </div>
          <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <a href="https://www.w3schools.com/java/" class="btn btn-outline-primary w-100">Learn Java</a>
          </div>
          <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <a href="https://www.w3schools.com/php/" class="btn btn-outline-primary w-100" >Learn PHP</a >
          </div>
        </div>
      </div>
    </section>

    <main class="py-5 notesLinks">
      <div class="container notesContent">
        <div class="row g-4 justify-content-center">
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <a href="bcaNotes/bca1st.php" class="btn btn-outline-primary w-100 py-3">
              <i class="fa-solid fa-book me-2"></i> BCA Sem 1st
            </a>
          </div>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <a href="bcaNotes/bca2nd.php" class="btn btn-outline-primary w-100 py-3" >
              <i class="fa-solid fa-book me-2"></i> BCA Sem 2nd
            </a>
          </div>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <a href="bcaNotes/bca3rd.php" class="btn btn-outline-primary w-100 py-3">
              <i class="fa-solid fa-book me-2"></i> BCA Sem 3rd
            </a>
          </div>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <a href="bcaNotes/bca4th.php" class="btn btn-outline-primary w-100 py-3" >
              <i class="fa-solid fa-book me-2"></i> BCA Sem 4th
            </a>
          </div>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <a href="bcaNotes/bca5th.php" class="btn btn-outline-primary w-100 py-3">
              <i class="fa-solid fa-book me-2"></i> BCA Sem 5th
            </a>
          </div>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <a href="bcaNotes/bca6th.php" class="btn btn-outline-primary w-100 py-3" >
              <i class="fa-solid fa-book me-2"></i> BCA Sem 6th
            </a>
          </div>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <a href="language/programming.php" class="btn btn-outline-success w-100 py-3">
              <i class="fa-solid fa-code me-2"></i> Programming Language
            </a>
          </div>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <a href="language/web.php" class="btn btn-outline-info w-100 py-3">
              <i class="fa-solid fa-globe me-2"></i> Web Designing
            </a>
          </div>
        </div>
      </div>
    </main>

    <section class="feature py-5 text-center">
      <div class="container">
        <div class="mb-4">
          <h1 class="fw-bold"> SYDreamStudy Features That Makes a Dream Reality </h1>
        </div>
        <div class="row justify-content-center">
          <div class="col-12 col-md-10 col-lg-8">
            <p class="lead">
              f you are searching for BCA notes or facing difficulty in any
              subject or topic, then you are at the right place. Our BCA Notes
              Management System helps students easily access, manage, and
              download semester-wise study materials. We aim to support students
              by providing organized and free learning resources without any
              advertisements.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="content py-5">
      <div class="container">
        <div class="row g-4">
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="card h-100 text-center shadow-sm p-4">
              <i class="fa-solid fa-bolt fs-1 text-primary mb-3"></i>
              <h4>Fast Learning</h4>
              <p> Access well-organized BCA notes and learn concepts quickly with structured semester-wise materials.</p>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="card h-100 text-center shadow-sm p-4">
              <i class="fa-solid fa-star fs-1 text-warning mb-3"></i>
              <h4>Important Study Material</h4>
              <p> Download subject-wise BCA notes and important PDFs prepared according to syllabus. </p>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="card h-100 text-center shadow-sm p-4">
              <i class="fa-solid fa-trophy fs-1 text-success mb-3"></i>
              <h4>Easy to Use</h4>
              <p> Simple and modern interface that allows students to easily browse, download, and read notes anytime. </p>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="card h-100 text-center shadow-sm p-4">
              <i class="fa-solid fa-key fs-1 text-danger mb-3"></i>
              <h4>Success Key</h4>
              <p> Helps students improve study habits and supports self-learning for better academic performance. </p>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="card h-100 text-center shadow-sm p-4">
              <i class="fa-solid fa-thumbs-up fs-1 text-info mb-3"></i>
              <h4>Quality Notes</h4>
              <p> We provide clear, easy-to-understand, and exam-focused BCA notes to boost your confidence. </p>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="card h-100 text-center shadow-sm p-4">
              <i class="fa-solid fa-headphones fs-1 text-secondary mb-3"></i>
              <h4>User-friendly Language</h4>
              <p> All BCA notes are written in simple language so every student can understand easily. </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="footer-area pt-5 text-light">
      <div class="container text-center">
        <p class="mb-2"> This website is made with
          <i class="fa-solid fa-heart text-danger"></i> by<a href="" class="text-decoration-none text-warning" > Sabiha & Yash</a>
        </p>
        <div class="mb-4">
          <img src="images/college.jpeg" alt="Founder" class="img-fluid rounded-circle shadow" style="width: 120px; height: 120px; object-fit: cover" />
        </div>
        <div class="mb-4">
          <a href="#" class="text-light fs-5 me-3" ><i class="fa-brands fa-github"></i></a>
          <a href="#" class="text-light fs-5 me-3" ><i class="fa-brands fa-linkedin"></i ></a>
          <a href="#" class="text-light fs-5 me-3" ><i class="fa-brands fa-youtube"></i ></a>
          <a href="#" class="text-light fs-5" ><i class="fa-brands fa-telegram"></i ></a>
        </div>
        <div class="row justify-content-center">
          <div class="col-12 col-md-6">
            <h6 class="text-light-50 mb-3">You can trust us. We are here to help you.</h6>

            <form method="POST">
              <div class="input-group">
                <input type="email" name="email" required placeholder="Your Email Address" class="form-control"/>
                <button class="btn btn-light text-dark" type="submit"> Save </button>
              </div>
            </form>
          </div>
        </div>
        <div class="border-top border-light mt-4"></div>
        <div class="py-3 small">© 2026 SYDreamStudy. All Rights Reserved.</div>
      </div>
    </footer>
    <?php if ($success) { ?>
    <script>
      window.onload = function () {
        alert("✅ Email successfully saved!");
      };
    </script>
    <?php } ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
