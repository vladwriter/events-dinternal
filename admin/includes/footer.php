      <!-- Close #app -->
      </div>
    <!-- Close .content-wrapper-->
    </div>

  <!-- Footer -->
  <footer>
  <div class="container center" style="padding: 40px 0;">
    <span class="ui-text-small">Proteach weekend - 2021 &copy; </span>
  </div>
  </footer>

<!-- Close .wrapper -->
</div>

<!-- webpack js run with use_dev var-->
<?php if (WCMS_DEV) echo '<script src="' . WCMS_DEV_PORT . '/wcms/wex/assets/js/main.js"></script>';
      else echo '<script src="assets/js/main.js?ver=todofixit13241"></script>';?>
  <!-- UIkit JS -->
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.1/dist/js/uikit.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.7.1/dist/js/uikit-icons.min.js"></script>
</body>
</html>