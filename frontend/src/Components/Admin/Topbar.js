const Topbar = () => {
    return (
        <div>
  <nav className="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div className="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      
    </div>
    <div className="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <button className="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span className="ti-view-list" />
      </button>
      <ul className="navbar-nav mr-lg-2">
        <li className="nav-item nav-search d-none d-lg-block">
          <div className="input-group">
            <div className="input-group-prepend hover-cursor" id="navbar-search-icon">
              <span className="input-group-text" id="search">
                <i className="ti-search" />
              </span>
            </div>
            <input type="text" className="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search" />
          </div>
        </li>
      </ul>
      <ul className="navbar-nav navbar-nav-right">
        
        
        <li className="nav-item nav-profile dropdown">
          <a className="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
            <img src="images/faces/face28.jpg" alt="profile" />
          </a>
          <div className="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a className="dropdown-item">
              <i className="ti-power-off text-primary" />
              Logout
            </a>
          </div>
        </li>
      </ul>
      <button className="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span className="ti-view-list" />
      </button>
    </div>
  </nav>
</div>

    );
    }
export default Topbar;