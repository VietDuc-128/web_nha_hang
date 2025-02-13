<?php 
    if(isset($_SESSION['message'])):
?>

<body>
  <!-- Custom Alert -->
  <div class="custom-alert-sucess">
      <span class="closebtn" onclick="this.parentElement.style.opacity=0;">&times;</span>
      <p><?= htmlspecialchars($_SESSION['message']) ?></p>
  </div>
</body>


<?php
    unset($_SESSION['message']);
    endif;
?>

<style>
  .custom-alert-error {
    padding: 15px;
    background-color: #f44336; /* Green background color for success */
    color: white; /* White text color */
    border-radius: 5px; /* Rounded corners */
    position: fixed; /* Fixed position */
    top: 15px; /* Position at the bottom */
    right: 15px; /* Position at the right */
    z-index: 1; /* Make sure it stays on top */
    opacity: 1; /* Initial opacity */
    transition: opacity 0.5s; /* Fade in and out with transition */
}
.custom-alert-sucess {
    padding: 15px;
    background-color: #28a745; /* Green background color for success */
    color: white; /* White text color */
    border-radius: 5px; /* Rounded corners */
    position: fixed; /* Fixed position */
    top: 15px; /* Position at the bottom */
    right: 15px; /* Position at the right */
    z-index: 1; /* Make sure it stays on top */
    opacity: 1; /* Initial opacity */
    transition: opacity 0.5s; /* Fade in and out with transition */
}

.custom-alert p {
    margin: 0;
}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}

</style>