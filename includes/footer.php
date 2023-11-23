<footer class="footer">
  <div class="container-fluid">
    <div class="copyright">
      ©
      <script>
        document.write(new Date().getFullYear())
      </script> developed by
      <a href="javascript:void(0)" target="_blank">thernloven</a>
    </div>
  </div>
</footer>
</div>
</div>
<!--   Core JS Files   -->
<script src="../admin/assets/js/core/jquery.min.js"></script>
<script src="../admin/assets/js/core/popper.min.js"></script>
<script src="../admin/assets/js/core/bootstrap.min.js"></script>
<!--  Google Maps Plugin    -->
<!-- Place this tag in your head or just before your close body tag. -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="../admin/assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../admin/assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../admin/assets/js/scripts.min.js?v=1.0.0"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
<script src="../admin/assets/demo/demo.js"></script>

<script src="//code.tidio.co/cbe0s02d74bhkvjfagrlculfyt01g7fv.js" async></script>

<script>
  $(document).ready(function() {
    // Set timeout duration (in milliseconds)
    var timeoutInMilliseconds = 900000; // 15 minutes 900000

    // Function to redirect to logout.php
    function redirectLogout() {
      window.location.href = 'logout.php';
    }

    // Function to set the activity timeout
    function setActivityTimeout() {
      // Clear the existing timeout (if any)
      if (window.activityTimeout) {
        clearTimeout(window.activityTimeout);
      }

      // Set a new timeout
      window.activityTimeout = setTimeout(redirectLogout, timeoutInMilliseconds);
    }

    // Function to set up event listeners for activity
    function setupActivityListeners() {
      // Set event listeners for all elements on the page
      $(document).on('click keydown mousemove scroll', setActivityTimeout);
    }

    // Call the function to set up activity event listeners when the page loads
    setupActivityListeners();
  });
</script>

<?php if ($success) { ?>
  <script>
    $(document).ready(function() {
      $('#successModal').modal('show');
    });
  </script>
<?php } ?>

<?php if ($pass_modal) { ?>
  <script>
    $(document).ready(function() {
      $('#passModal').modal('show');
    });
  </script>
<?php } ?>

<script>
  function previewFile(event) {
    var preview = document.getElementById('previewImage');
    var file = event.target.files[0];
    var reader = new FileReader();

    reader.onloadend = function() {
      preview.src = reader.result;
    }

    if (file) {
      reader.readAsDataURL(file);
    } else {
      preview.src = '../admin/assets/img/avatars/default-avatar.png'; // Path to your default image
    }
  }
</script>