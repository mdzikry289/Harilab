<!DOCTYPE html>
<html lang="en">

<head>

  <?php $this->load->view('admin/_partials/head') ?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <?php $this->load->view('admin/_partials/sidebar_container') ?>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Topbar -->
          <?php $this->load->view("admin/_partials/navbar") ?>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <!-- <h1 class="h3 mb-0 text-gray-800">Selamat Datang di panel Administrator Harilab Production</br>
              Tambahin :</br>
              1. Total Proyek yang udah dikerjain </br>
              2. Total Klien yang sudah bekerjasama </br>
            </h1> -->
              <div id="embed-api-auth-container"></div>
              <div id="chart-container"></div>
              <div id="view-selector-container"></div>
              <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
            </div>

          </div>
          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php $this->load->view('admin/_partials/footer') ?>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php $this->load->view("admin/_partials/logout_modal") ?>

  <?php $this->load->view("admin/_partials/js") ?>

  <script>
    (function(w, d, s, g, js, fs) {
      g = w.gapi || (w.gapi = {});
      g.analytics = {
        q: [],
        ready: function(f) {
          this.q.push(f);
        }
      };
      js = d.createElement(s);
      fs = d.getElementsByTagName(s)[0];
      js.src = 'https://apis.google.com/js/platform.js';
      fs.parentNode.insertBefore(js, fs);
      js.onload = function() {
        g.load('analytics');
      };
    }(window, document, 'script'));

    gapi.analytics.ready(function() {

      /**
       * Authorize the user immediately if the user has already granted access.
       * If no access has been created, render an authorize button inside the
       * element with the ID "embed-api-auth-container".
       */
      gapi.analytics.auth.authorize({
        container: 'embed-api-auth-container',
        clientid: 'REPLACE WITH YOUR CLIENT ID'
      });


      /**
       * Create a new ViewSelector instance to be rendered inside of an
       * element with the id "view-selector-container".
       */
      var viewSelector = new gapi.analytics.ViewSelector({
        container: 'view-selector-container'
      });

      // Render the view selector to the page.
      viewSelector.execute();


      /**
       * Create a new DataChart instance with the given query parameters
       * and Google chart options. It will be rendered inside an element
       * with the id "chart-container".
       */
      var dataChart = new gapi.analytics.googleCharts.DataChart({
        query: {
          metrics: 'ga:sessions',
          dimensions: 'ga:date',
          'start-date': '30daysAgo',
          'end-date': 'yesterday'
        },
        chart: {
          container: 'chart-container',
          type: 'LINE',
          options: {
            width: '100%'
          }
        }
      });


      /**
       * Render the dataChart on the page whenever a new view is selected.
       */
      viewSelector.on('change', function(ids) {
        dataChart.set({
          query: {
            ids: ids
          }
        }).execute();
      });

    });
  </script>
</body>

</html>