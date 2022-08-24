import { Link } from "react-router-dom";
const SideBar = () => {
  return (
  <div>
  <nav className="sidebar sidebar-offcanvas" id="sidebar">
  <ul className="nav">
    <li className="nav-item">
      <a className="nav-link" href="<Link to={`/admin`}></Link>">
        <i className=" ti-home menu-icon" />
        <span className="menu-title">Dashboard</span>
      </a>
    </li>
    <li className="nav-item">
      <a className="nav-link" href="{{route('admin.profile')}}">
        <i className="ti-shield menu-icon" />
        <span className="menu-title">Admin Profile </span>
      </a>
    </li>
    <li className="nav-item">
      <a className="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i className="ti-user menu-icon" />
        <span className="menu-title">Users</span>
        <i className="menu-arrow" />
      </a>
      <div className="collapse" id="ui-basic">
        <ul className="nav flex-column sub-menu">
          <li className="nav-item"> <a className="nav-link" href="{{route('admin.users.all')}}">All User</a>
          </li>
          <li className="nav-item"> <a className="nav-link" href="{{route('admin.users.premium')}}">Premium
              User</a></li>
          <li className="nav-item"> <a className="nav-link" href="{{route('admin.users.admin')}}">Admin</a>
          </li>
          <li className="nav-item"> <a className="nav-link" href="{{route('admin.users.production')}}">Production House</a></li>
        </ul>
      </div>
    </li>
    <li className="nav-item">
      <a className="nav-link" href="{{route('MovieList')}}">
        <i className="ti-video-clapper  menu-icon" />
        <span className="menu-title">Movies</span>
      </a>
    </li>
    <li className="nav-item">
      <a className="nav-link" href="{{route('Statistics')}}">
        <i className=" ti-stats-up   menu-icon" />
        <span className="menu-title">statistics </span>
      </a>
    </li>
    <li className="nav-item">
      <a className="nav-link" href="{{route('admin.payment')}}">
        <i className="ti-video-clapper  menu-icon" />
        <span className="menu-title">Payment History</span>
      </a>
    </li>
    <li className="nav-item">
      <a className="nav-link" href="{{route('report')}}">
        <i className="ti-clipboard  menu-icon" />
        <span className="menu-title">Reports</span>
      </a>
    </li>
  </ul>
</nav>

</div>

  );
}
export default SideBar;