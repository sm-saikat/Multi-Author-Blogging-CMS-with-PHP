<!-- Sidebar -->
<div class="position-sticky">
    <div class="list-group list-group-flush mx-3 mt-4">
        <a href="/tech-blog/dashboard.php" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span>
        </a>
        <a href="/tech-blog/dashboard.php?section=create-post" class="list-group-item list-group-item-action py-2 ripple <?= ($section == 'create-post') ? 'active' : '' ?>">
            <i class="fas fa-chart-area fa-fw me-3"></i><span>Create Post</span>
        </a>
        <a href="/tech-blog/dashboard.php?section=all-post" class="list-group-item list-group-item-action py-2 ripple <?= ($section == 'all-post') ? 'active' : '' ?>"><i class="fas fa-lock fa-fw me-3"></i><span>All Post</span></a>
        <a href="/tech-blog/dashboard.php?section=profile" class="list-group-item list-group-item-action py-2 ripple <?= ($section == 'profile') ? 'active' : '' ?>">
            <i class="fas fa-chart-pie fa-fw me-3"></i><span>Profile</span>
        </a>
        <a href="/tech-blog/dashboard.php?section=change-password" class="list-group-item list-group-item-action py-2 ripple <?= ($section == 'change-password') ? 'active' : '' ?>"><i class="fas fa-chart-bar fa-fw me-3"></i><span>Change Password</span></a>
    </div>
</div>
<!-- Sidebar -->