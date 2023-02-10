<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed"  href="{{ route('customer.layaways.index') }}">
                <i class="bi bi-grid-fill"></i>
                <span>Layaway Plan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed"   href="{{ route('customer.invoices.index') }}">
                <i class="bi bi-calendar-fill"></i>
                <span>Invoices</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed"   href="{{ route('customer.settings.index') }}">
                <i class="bi bi-gear-fill"></i>
                <span>Profile Settings</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
            </a>
        </li>
    </ul>
</aside>