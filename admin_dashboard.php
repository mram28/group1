<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventory App</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <style !important>
    /* Custom styles go here */
    .my-5 {
      margin-top: 5rem;
    }
    
    .navbar {
      display: flex;
      justify-content: center;
      align-items: center;
      
    }

    .navbar-brand {
      
      
      font-size: 40px;
      color: black;
      font-weight: bold;
      margin-left: 10px;
    }

    

    .btn-info {
      background-color:burlywood;
      color: green;
      margin-right: 10px;
      padding: 5px 10px; /* Adjusted button padding */
      font-size: 12px; /* Adjusted button button size */
      border-color: red ;
      font-weight: bold;
    }

    .btn-info a {
      text-decoration: none;
      color:black;
    
    }

    .text-light {
    color: #055160!important;
}

    .container {
      padding: 0 5px;

    }

    h1 {
      font-size: 15px;  
      color: burlywood;
      margin-top: 10px;
      margin-bottom: 5px;
      
    }

    /* Added CSS for logo and Log Out button */
    .logo {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
      margin-right: 5px;  
    }

    .log-out-button {
      margin-left: auto; /* Move the Log Out button to the right */
    }
    .nav-heading {
    height: 80px; /* Adjust the height as needed */

  }
  
  </style>
</head>

<body>

  <header class="navbar navbar-black bg-success">
    <div class="container">
      <br>
      <img class="logo" src="image/slsu.png" alt="Your Logo">
      <h1 class="navbar-brand ">RHU Meds and Supply Inventory</h1>
      <button class="btn btn-info log-out-button"> <a href="index.html" ><i class="fas fa-sign-out-alt"></i> Log Out</a></button>
    </div>
  </header>

  <nav class="navbar navbar-expand-lg navbar-light bg-secondary nav-heading">
    <div class="container">
      <div class="d-flex justify-content-center">
        <button class="btn btn-info my-5"><a href="admin_interface.php" class="text-white"><i class="fas fa-tachometer-alt"></i> Admin Profile</a></button>
        <button class="btn btn-info my-5"><a href="nurselist.php" class="text-light"><i class="fas fa-user-injured"></i> Nurse Lists</a></button>
        <button class="btn btn-info my-5"><a href="patient.php" class="text-light"><i class="fas fa-pills"></i> Patient</a></button>
        <button class="btn btn-info my-5"><a href="addpatient.php" class="text-light"><i class="fas fa-user-plus"></i>  Add Patient</a></button>
        <button class="btn btn-info my-5"><a href="medicine.php" class="text-light"><i class="fas fa-medkit"></i> Medicine</a></button>
        <button class="btn btn-info my-5"><a href="supplies.php" class="text-light"><i class="fas fa-tags"></i> Supplies</a></button>
        <button class="btn btn-info my-5"><a href="insertsupp.php" class="text-light"><i class="fas fa-tags"></i> Add Supplies</a></button>
        <button class="btn btn-info my-5"><a href="expiration.php" class="text-light"><i class="fas fa-calendar-times"></i> View Expirations</a></button>
        <button class="btn btn-info my-5"><a href="printable_report.php" class="text-light"><i class="fas fa-file-alt"></i> Report</a></button>
        <button class="btn btn-info my-5"><a href="activitylog.php" class="text-light"><i class="fas fa-clipboard-list"></i> Logs</a></button>
        
     
    </div>
    </div>
  </nav>

  <main class="container my-5">
    <!-- Content here -->
  </main>

  <!-- Bootstrap JS Bundle (Bootstrap JS and Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-mVWDr4u6jz0uIa/cj7mjoUpaGj0Rrj2Hz9Rndw5Z5LWFM6a3LqPjB5EJz0MzI6S+" crossorigin="anonymous"></script>

  <!-- Your additional scripts -->
  <script>
    function logOut() {
      // Your logout functionality
      console.log('Logged out');
    }
  </script>
</body>

</html>
