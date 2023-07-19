<?php
    require "./../controllers/BaseController.php";
    include('./layouts/header.php');
    if($_SESSION['user_role'] == 4 || $_SESSION['user_role'] == 3 ){
      $_SESSION['access_restricted'] = "You don't have access to this page";
      Redirect('./admin.php');
    }
?>
<body class="">
  <div class="wrapper ">
    <?php //include('./layouts/sidebar.php');?>
    <div class="main-panel">
      <!-- Navbar -->
       <?php include('./layouts/nav.php');?>
      <!-- End Navbar -->
      <div class="content">
        <div class="card">
            <div class="card-header card-header-primary">
                <div class="row">
                    <div class="col-10">
                        <h4 class="card-title">Registered User List</h4>
                        <p class="card-category">You can manage users here...</p>
                    </div>
                    <?php if($_SESSION['user_role']  == 1){ ?>
                    <div class="col-2"><button class="btn btn-primary" style="background-color: rgba(225, 210, 227, 0.1);" onclick="add_user()">Add User</button></div>
                    <?php } ?>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-hover table-striped thead-primary w-100 dataTable no-footer" role="grid" style="width: 989px;">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" style="min-width: 35px !important">#</th>
                                <th class="sorting">Username</th>
                                <!--<th class="sorting">Password</th>-->
                                <th class="sorting">Email</th>
                                <th class="sorting">verified</th>
                                <th class="sorting">Role</th>
                                <th class="sorting">Status</th>
                                <th class="sorting" style="max-width: 100px; width: 100px;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="table_body">
                        </tbody>
                    </table>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script><i class="material-icons"></i>
            <a href="#" target="_blank"></a>
          </div>
        </div>
      </footer>
    </div>
  </div>
    <div class="modal fade" id="edit_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add/Edit User</h4>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" id="username" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="verified">Email verified</label>
                                <select id="verified" class="form-control form-control-sm">
                                    <option value="0">Not verified</option>
                                    <option value="1">verified</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" class="form-control form-control-sm">
                                    <option value="1">Actived</option>
                                    <option value="0">Closed</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select id="role" class="form-control form-control-sm">
                                    <option value="1">Super User</option>
                                    <option value="2">Limited User</option>
                                    <option value="3">Pre-Weekend</option>
                                    <option value="4">Rector</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="save_user()">Save</button>
                    <button type="button" class="btn btn-danger" onclick="close_modal()">Close</button>
                </div>
            </div>
        </div>
    </div>
   <?php include('./layouts/footer.php');?>
  <script>
    var userRole = "<?php echo $_SESSION['user_role'];?>";
    var cls='';
    var voidd = '';
    if(userRole == 2 || userRole == 3){
      cls = 'd-none';
      voidd ='javascript:;';
    }
    let idselected;

    const add_user = () => {
      idselected = 0;
      $("#username").val("");
      $("#password").val("");
      $("#email").val("");
      $("#verified").val(0);
      $("#status").val(1);
      $("#role").val(0);

      $("#edit_modal").modal('show');
    }

    const close_modal = () => {
      $("#edit_modal").modal('hide');
    }

    const save_user = () => {
      const username = $("#username").val();
      const password = $("#password").val();
      const email = $("#email").val();
      const verified = $("#verified").val();
      const status = $("#status").val();
      const role = $("#role").val();

      if(username == "" || password == "" || email == "") {
        return;
      }

      const data = {
          id: idselected,
          username: username,
          password: password,
          email: email,
          verified: verified,
          status: status,
          role: role,
      }

      const url = "./actions/saveuser.php";
      $.post(url, data, function(data, status) {
          load_table();
      });

      $("#edit_modal").modal('hide');
    }

    const edit_user = (id) => {
      idselected = id;

      $("#username").val($(`#itema_${id}`).html());
      $("#password").val($(`#itemb_${id}`).html());
      $("#email").val($(`#itemc_${id}`).html());
      $("#verified").val($(`#itemd_${id}`).attr("value"));
      $("#status").val($(`#itemf_${id}`).attr("value"));
      $("#role").val($(`#iteme_${id}`).attr("value"));

      $("#edit_modal").modal('show');
    }

    const delete_user = (id) => {
      if(!confirm("Are you delete this user?")) return;
      const url = "./actions/deleteuser.php";
      $.post(url, {id: id, }, function(data, status) {
        load_table();
      });
    }


    const load_table = () => {
        const verifycode = ['Not verified', 'verified'];
        const statuscode = ['Closed', 'Actived'];
        const rolecode = ['','Super User', 'Limited User', 'Pre-Weekend', 'Rector'];
        const url = "./actions/getusers.php";
        $.post(url, function(data, status) {
            const json = JSON.parse(data);
            let html = '';
            for(let i = 0; i < json.length; i++) {
              var item = json[i], id = json[i]['id'];
              html += `<tr>`;
              html += `<td>${i+1}</td>`;
              html += `<td id="itema_${id}">${item['username']}</td>`;
            //   html += `<td id="itemb_${id}">${item['password']}</td>`;
              html += `<td id="itemc_${id}">${item['email']}</td>`;
              html += `<td id="itemd_${id}" value="${item['email_verified']}">${verifycode[item['email_verified']]}</td>`;
              html += `<td id="iteme_${id}" value="${item['role']}">${rolecode[item['role']]}</td>`;
              html += `<td id="itemf_${id}" value="${item['status']}">${statuscode[item['status']]}</td>`;
              html += `<td><a href="#" onclick="edit_user(${id})"><i class="fas fa-pencil-alt ms-text-primary"></i></a><a href="#"  class="`+cls+`" onclick="delete_user(${id})"><i class="far fa-trash-alt ms-text-danger"></i></a></td></tr>`;
            }
            $("#table_body").html(html);
            $("#data-table").DataTable();
        });
    }

    $(document).ready(function() {
      load_table();
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
</body>

</html>
