<nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      Noble<span>UI</span>
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">

      <li class="nav-item nav-category">Menu</li>
      <li class="nav-item {{ active_class('home') }}">
        <a href="{{ route('home') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item {{ active_class('client.phone-trackings.*') }}">
        <a href="{{ route('client.phone-trackings.index') }}" class="nav-link">
          <i class="link-icon" data-feather="phone"></i>
          <span class="link-title">Phone Trackings</span>
        </a>
      </li>
      <li class="nav-item {{ active_class('client.projects.*') }}">
        <a href="{{ route('client.projects.index') }}" class="nav-link">
          <i class="link-icon" data-feather="clipboard"></i>
          <span class="link-title">Signal Wire Projects</span>
        </a>
      </li>
      <li class="nav-item {{ active_class('client.system-settings.*') }}">
        <a href="{{ route('client.system-settings.index') }}" class="nav-link">
          <i class="link-icon" data-feather="settings"></i>
          <span class="link-title">System Settings</span>
        </a>
      </li>

      <!-- <li class="nav-item {{ active_class(['inquiries/']) }}">
        <a href="#" class="nav-link">
          <i class="link-icon" data-feather="file-text"></i>
          <span class="link-title">Inquiries</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['social/']) }}">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="link-icon" data-feather="facebook"></i>
          <span class="link-title">Social Media</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['billing/']) }}">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="link-icon" data-feather="credit-card"></i>
          <span class="link-title">Billing</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['resources/']) }}">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="link-icon" data-feather="layout"></i>
          <span class="link-title">Resources</span>
        </a>
      </li>
      <li class="nav-item nav-category">Reporting</li>
      <li class="nav-item {{ active_class(['billing/']) }}">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="link-icon" data-feather="copy"></i>
          <span class="link-title">Site Rankings</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['management/']) }}">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="link-icon" data-feather="pie-chart"></i>
          <span class="link-title">Site Analytics</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['billing/']) }}">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="link-icon" data-feather="align-justify"></i>
          <span class="link-title">Site Inquiries</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['billing/']) }}">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="link-icon" data-feather="mail"></i>
          <span class="link-title">Lead Generation</span>
        </a>
      </li>
      <li class="nav-item nav-category">Promoter</li>
      <li class="nav-item {{ active_class(['billing/']) }}">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="link-icon" data-feather="zap"></i>
          <span class="link-title">Promote Check In</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['billing/']) }}">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="link-icon" data-feather="settings"></i>
          <span class="link-title">Managements</span>
        </a>
      </li>
      <li class="nav-item nav-category">Settings</li>
      <li class="nav-item {{ active_class(['billing/']) }}">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="link-icon" data-feather="user"></i>
          <span class="link-title">Profile Account</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['management/']) }}">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="link-icon" data-feather="users"></i>
          <span class="link-title">User Management</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['billing/']) }}">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="link-icon" data-feather="mail"></i>
          <span class="link-title">Contact Us</span>
        </a>
      </li> -->

    </ul>
  </div>
</nav>
