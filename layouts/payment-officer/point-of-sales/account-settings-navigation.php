<link rel="stylesheet" type="text/css" href="../../layouts/payment-officer/point-of-sales/navigation.css">
<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <div style="width: 210px; height: 250px; border: 2px solid #fff;">
                    <img src="../../images/male avatar.png" style="width: 100%;">
                </div>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a><h2 ><i class="fas fa-tachometer-alt"></i> Dashboard</h2></a>
                </li>
                <li>
                    <a class="btn-personal"><i class="fas fa-user-cog"></i> Personal Settings</a>
                </li>
                <li>
                    <a class="btn-security"><i class="fas fa-user-lock"></i> Security Settings</a>
                </li>
            </ul>
        </nav>
        <div id="navbar-top">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <a href="../point-of-sales.php"><img src="../../images/Tess-Lane.png" style="width: 210px;"></a>
                </div>
            </nav>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>