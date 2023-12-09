<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-cat"></i>
        </div>
        <div class="sidebar-brand-text mx-3">CatShop.</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>ประวัติคำสั่งซื้อ</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        จัดการคำสั่งซื้อ
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-list"></i>
            <span>สถานะคำสั่งซื้อ</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="order_list.php?status=รอตรวจสอบ">รอตรวจสอบ</a>
                <a class="collapse-item" href="order_list.php?status=กำลังจัดเตรียม">กำลังจัดเตรียม</a>
                <a class="collapse-item" href="order_list.php?status=จัดส่งเเล้ว">จัดส่งเเล้ว</a>
                <a class="collapse-item" href="order_list.php?status=ยกเลิก">ยกเลิก</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-clipboard"></i>
            <span>รายงาน</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="report.php">รายงานเลือกตามช่วงเวลา</a>
                <a class="collapse-item" href="report-day.php">รายงานยอดขายตามวัน</a>
                <a class="collapse-item" href="report-month.php">รายงานยอดขายตามเดือน</a>
                <a class="collapse-item" href="report-year.php">รายงานยอดขายตามปี</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        จัดการ
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-cog"></i>
            <span>เว็บไซต์</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">สินค้า</h6>
                <a class="collapse-item" href="product.php">สินค้า</a>
                <a class="collapse-item" href="type.php">หมวดหมู่</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">อื่น ๆ</h6>
                <a class="collapse-item" href="payment.php">ช่องทางการชำระเงิน</a>
                <a class="collapse-item" href="blog.php">บทความ</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true"
            aria-controls="collapsePages2">
            <i class="fas fa-fw fa-user"></i>
            <span>บัญชีผู้ใช้</span>
        </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="user.php?status=Admin">Admin</a>
                <a class="collapse-item" href="user.php?status=User">ลูกค้า</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Nav Item - Charts -->
    <li class="nav-item">
                <a class="nav-link" href="contact.php">
                    <i class="fas fa-fw fa-headset"></i>
                    <span>ติดต่อเรา</span></a>
            </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>